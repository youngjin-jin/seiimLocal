var qr_code, rap, timer;
var worker_token = '';
var rows = 20;
var total_page = 0;
var page = 1;
var scanner;
var camera_type = 1;

var qrscan = (function () {
  
	return {
		get_qr : function(is_timer=false) {
			var myCompany = $('#myCompany').val();
			$.ajax({
				type: 'POST',
				url: '/controller/qrscan.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_qr', 'myCompany' : myCompany },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						if (response.status == 0) {
							rap = 16;
							$('#count_span').text(rap);
							
							qr_code.clear();
							qr_code.makeCode(response.token);
							
							if (is_timer) timer = setInterval(myTimer, 1000);
						} else {
							clearInterval(timer);
						}
					} else {
						clearInterval(timer);
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});
		},

		get_category: function () {
			var siteId = $('#key').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/new_edu.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_cat1', 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*createdAt: "2021-09-28T16:50:38.000Z"
								docDiv: 1
								id: 1
								isActive: true
								name: "정기안전보건교육"
								siteId: 1212055764
								subCats: (3) [{…}, {…}, {…}]
								updatedAt: "2021-10-04T08:46:44.000Z"*/

								html += '<option value="'+element.name+'">'+element.name+'</option>';
							});
							
							$('#filter_educategory').append(html).trigger('change');
						}
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});
		},

		modal_close: function () {
			page = 1;

			$('#workerName').text('');
			$('#workerBirth').text('');
			$('#filter_educategory').val('').prop('selected', true);
			$('#eduCnt').text('0명');
			$('#edu_list').empty();
			
			$('#scanSubject').hide();
		},

		get_list: function (link_page=0) {
			if (link_page) page = link_page;
			
			var siteId = $('#key').val();
			var filter_educategory = $('#filter_educategory option:selected').val();
			
			$('#edu_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/qrscan.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'siteId' : siteId, 'filter_educategory' : filter_educategory, 'worker_token' : worker_token },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*cat2Name: "TBM"
								catName: "정기안전보건교육"
								constructType: "공종이다"
								eduDate: "2021-10-01T01:34:52.000Z"
								eduName: "테스트 교육"
								id: 1
								instructor: "성주필"
								siteName: "공덕역B공구"
								startTime: "00:00:00"*/

								/*html += '<tr>';
								html += '	<td>'+no+'</td>';
								html += '	<td><a href="javascript:edu_history_management.detail('+element.id+');" style="font-size:12px;">'+element.eduName+'</a></td>';
								html += '	<td>'+element.eduDate.substring(0, 10)+'</td>';
								html += '	<td>'+element.startTime.substring(0, 5)+'</td>';
								html += '	<td>'+element.instructor+'</td>';
								html += '	<td>'+element.siteName+'</td>';
								html += '	<td>'+element.catName+'</td>';
								html += '	<td>'+element.cat2Name+'</td>';
								html += '	<td>'+element.constructType+'</td>';
								html += '</tr>';*/
							});
						} else {
							html += '<li><p class="tit" style="padding:50px;">교육수료내역이 없습니다.</p></li>';
						}
						
						$('#edu_list').append(html);
						$('#eduCnt').text(response.totCnt);

						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging2(page, total_page, 'qrscan.get_list'));

						$('#scanSubject').show();
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});
		},

		add_worker: function () {
			var eduId = $('#eduId').val();

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/qrscan.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'add_worker', 'eduId' : eduId, 'worker_token' : worker_token },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						alert('교육수료자 등록하였습니다.');
						location.reload();
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});
		}
	}
})();

function myTimer() {
	rap--;
	$('#count_span').text(rap);
	if (rap == 0) {
		qrscan.get_qr();
	}
}

//교육종류 선택 이벤트
$('#filter_educategory').on('click', function() {
	page = 1;

	qrscan.get_list();
});

//교육수료 이벤트
$('#add_btn').on('click', function() {
	var eduId = $('#eduId').val();

	$.ajax({
		type: 'POST',
		url: '/controller/qrscan.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_worker', 'eduId' : eduId, 'worker_token' : worker_token },
		success: function (response) {
			console.log(response);
			
			if (response.result) {
				edu_detail.modal_close();
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			alert(request+' '+status+' '+error);
		}
	});
});

$('#back_btn').on('click', function() {
	history.back();
});

$(document).ready(function () {
	if (LEVEL == 100) {
		qr_code = new QRCode('qr_code', {
			width: 260,
			height: 260,
			colorDark : '#000000',
			colorLight : '#ffffff',
			correctLevel : QRCode.CorrectLevel.H
		});

		qrscan.get_qr(true);
	} else {
		qrscan.get_category();
		//qrscan.get_list();
		
		var video = document.createElement("video");
		var canvasElement = document.getElementById("canvas");
		var canvas = canvasElement.getContext("2d");

		function drawLine(begin, end, color) {
			canvas.beginPath();
			canvas.moveTo(begin.x, begin.y);
			canvas.lineTo(end.x, end.y);
			canvas.lineWidth = 4;
			canvas.strokeStyle = color;
			canvas.stroke();
		}

		// Use facingMode: environment to attemt to get the front camera on phones
		navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
			video.srcObject = stream;
			video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
			video.play();
			requestAnimationFrame(tick);
		});

		function tick() {
			$('.error').html('<span style="color:#ff5562ff;">⌛ QR CODE를 화면에 비춰 주세요.</span>');
			$('.error').fadeIn(400).delay(1000).fadeOut(400);
			
			if (video.readyState === video.HAVE_ENOUGH_DATA) {
				canvasElement.hidden = false;

				canvasElement.height = video.videoHeight;
				canvasElement.width = video.videoWidth;
				canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
				var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
				var code = jsQR(imageData.data, imageData.width, imageData.height, {
					inversionAttempts: "dontInvert",
				});
				
				if (code) {
					drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#28a745");
					drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#28a745");
					drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#28a745");
					drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#28a745");
					
					worker_token = code.data;
					
					var eduId = $('#eduId').val();

					$.ajax({
						type: 'POST',
						url: '/controller/qrscan.php',
						dataType: 'json',
						cache: false,
						data: { 'module' : 'add_worker', 'eduId' : eduId, 'worker_token' : worker_token },
						success: function (response) {
							console.log(response);
							
							if (response.result) {
								//0:성공 , -1이미등록 -2 회원정보없음 -3 토큰 오류
								if (response.status == 0) {
									$('.error').html('<span style="color:#08B39A;">교육등록에 성공 하였습니다.</span>');
								} else if (response.status == -1) {
									$('.error').html('<span style="color:#ff5562ff;">이미등록한 근로자 입니다.</span>');
								} else if (response.status == -2 || response.status == -3) {
									$('.error').html('<span style="color:#ff5562ff;">회원정보가 존재하지 않습니다.</span>');
								} else {
									$('.error').html('<span style="color:#ff5562ff;">알수없는 오류 입니다.</span>');
								}

								$('.error').fadeIn(400).delay(1000).fadeOut(400);
							} else {
								if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
							}
						},
						error: function (request, status, error) {
							alert(request+' '+status+' '+error);
						}
					});
				}
			}
			
			requestAnimationFrame(tick);
		}

		/*scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
		scanner.addListener('scan',function(content){
			//alert(content);
			worker_token = content;
			
			var eduId = $('#eduId').val();

			$.ajax({
				type: 'POST',
				url: '/controller/qrscan.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'add_worker', 'eduId' : eduId, 'worker_token' : worker_token },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						//0:성공 , -1이미등록 -2 회원정보없음 -3 토큰 오류
						if (response.status == 0) {
							$('.error').html('<span style="color:#08B39A;">교육등록에 성공 하였습니다.</span>');
						} else if (response.status == -1) {
							$('.error').html('<span style="color:#ff5562ff;">이미등록한 근로자 입니다.</span>');
						} else if (response.status == -2 || response.status == -3) {
							$('.error').html('<span style="color:#ff5562ff;">회원정보가 존재하지 않습니다.</span>');
						} else {
							$('.error').html('<span style="color:#ff5562ff;">알수없는 오류 입니다.</span>');
						}

						$('.error').fadeIn(400).delay(1000).fadeOut(400);
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});
		});

		Instascan.Camera.getCameras().then(function (cameras){
			if (cameras.length > 0) {
				if (camera_type == 1) {
					if (cameras[0] != '') scanner.start(cameras[0]); else alert('카메라에 접근할 수 없습니다.');
				} else {
					if (cameras[1] != '') scanner.start(cameras[1]); else alert('카메라에 접근할 수 없습니다.');
				}

				$('#cange_camera_btn').on('click',function(){
					if (camera_type == 1){
						camera_type = 2;
					} else {
						camera_type = 1;
					}

					if (camera_type == 1) {
						if (cameras[0] != '') scanner.start(cameras[0]); else alert('카메라에 접근할 수 없습니다.');
					} else {
						if (cameras[1] != '') scanner.start(cameras[1]); else alert('카메라에 접근할 수 없습니다.');
					}
				});
			} else {
				console.error('No cameras found.');
				alert('카메라에 접근할 수 없습니다.');
			}
		}).catch(function(e){
			console.error(e);
			alert('카메라에 접근할 수 없습니다.');
		});*/
	}
});