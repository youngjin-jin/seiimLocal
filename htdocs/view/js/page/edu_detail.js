var link_img = '';
var table_list = [];

var quill;
var worker_token;
var edu_detail = (function () {

	return {
		get_data: function () {
			var eduId = $('#eduId').val();

			$('.img-list').empty();

			$.ajax({
				type: 'POST',
				url: '/controller/edu_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'edu_detail', 'eduDocId' : eduId },
				success: function (response) {
					console.log(response);

					if (response.result) {
						/*adminId: 2
						attach: Array(3)
							0: {id: 1, path: 'https://dev-storage.saiifedu.com/images.jpeg', createdAt: '2021-10-27T14:57:34.000Z', updatedAt: '2021-10-27T14:57:33.000Z'}
							1: {id: 2, path: 'https://dev-storage.saiifedu.com/images (1).jpeg', createdAt: '2021-10-27T14:57:34.000Z', updatedAt: '2021-10-27T14:57:33.000Z'}
							2: {id: 3, path: 'https://dev-storage.saiifedu.com/images (2).jpeg', createdAt: '2021-10-27T14:57:34.000Z', updatedAt: '2021-10-27T14:57:33.000Z'}
						length: 3
						cat1: 1
						cat2: 3
						constructType: "공종이다현1"
						createdAt: "2021-10-09T01:34:28.000Z"
						doc: null
						eduDate: "2021-10-01T01:34:52.000Z"
						eduName: "테스트 교육"
						eduPlace: "교육장"
						endTime: "15:38:26"
						id: 2
						instructor: "성주필"
						memo: null
						siteId: 1212055764
						startTime: "15:38:20"
						sv: 3
						templateId: 1
						updatedAt: "2021-10-01T01:34:30.000Z"
						workerId: (3) [34, 35, 36]*/

						if (response.info.constructType == null) response.info.constructType = '';
						if (response.info.doc == null) response.info.doc = '';

						$('#eduName').text(response.info.eduName);
						$('#eduDate').text(response.info.eduDate.substring(0, 10));
						$('#startTime').text(response.info.startTime.substring(0, 5));
						$('#endTime').text(response.info.endTime.substring(0, 5));
						$('#constructType').text(response.info.constructType);
						$('#eduPlace').text(response.info.eduPlace);
						$('#instructor').text(response.info.instructor);

						if (response.info.doc == null) response.info.doc = '';
						
						if (LEVEL != 100) {
							var delta = quill.clipboard.convert(response.info.doc);
						quill.setContents(delta, 'silent');
						} else {
							$('#memo').html(response.info.doc);
						}

						var html = '';

						if (response.info.attach.length) {
							response.info.attach.forEach(function(element, index){
								html += '<li><img id="link_img_'+element.id+'" src="'+element.path+'" class="link_img" 1style="min-height:auto;"></li>';
							});
						}

						$('.img-list').append(html);
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
})();

//QR 이벤트
$('#qr_btn').on('click', function () {
	var key			 = $('#key').val();
	var site_name	 = $('#site_name').val();
	var owner		 = $('#owner').val();
	var contractor	 = $('#contractor').val();
	var myCompany	 = $('#myCompany').val();
	var eduId		 = $('#eduId').val();

	
	if (window.SAIIFEDU_EVENT) {
		window.SAIIFEDU_EVENT.callBackEvent('REQ_QRSCAN', '')
	} else if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.SAIIFEDU_EVENT) {
		const param = { type: 'REQ_QRSCAN', data: '' }
		window.webkit.messageHandlers.SAIIFEDU_EVENT.postMessage(param);
	}

	// location.href = 'qrscan.php?key='+key+'&site_name='+encodeURIComponent(site_name)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&eduId='+eduId;});
});

//교육수료자 목록 이벤트
$('#worker_btn').on('click', function () {
	var key			 = $('#key').val();
	var site_name	 = $('#site_name').val();
	var owner		 = $('#owner').val();
	var contractor	 = $('#contractor').val();
	var myCompany	 = $('#myCompany').val();
	var eduId		 = $('#eduId').val();

	location.href = 'graduate.php?key='+key+'&site_name='+encodeURIComponent(site_name)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&eduId='+eduId;
});

//이미지 업로드
$(document).on('change', '#upload_file', function() {
	if ($(this).val()) {
		var eduId		 = $('#eduId').val();
		var file_data	 = new FormData();
		var fileList	 = $(this)[0].files;

		file_data.append('module', 'add_img');
		file_data.append('eduId', eduId);
		file_data.append('count', fileList.length);

		for (var i=0; i < fileList.length; i++) {
			var file = fileList[i];
			file_data.append('upload_file_'+i, file);
		}

		run_progress();

		$.ajax({
			type: 'POST',
			url: '/controller/edu_detail.php',
			dataType: 'json',
			cache: false,
			data: file_data,
			processData: false,
			contentType: false,
			success : function(response) {
				stop_progress();
				console.log(response);

				if (navigator.userAgent.toLowerCase().indexOf('msie') != -1) {
					// ie 일때
					$('#upload_file').replaceWith($('#upload_file').clone(true));
				} else {
					// other browser 일때 
					$('#upload_file').val('');
				}

				//console.log(response);

				if (response.result) {
					edu_detail.get_data();
				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			},
			error: function(request, status, error){
				stop_progress();
				alert(request+' '+status+' '+error);
			}
		});
	}
});

//교육사진 추가 선택 이벤트
$('#add_img_btn').on('click', function () {
	$('#upload_file').trigger('click');
});

//삭제 이벤트
$('#del_run_btn').on('click', function () {
	var eduId = $('#eduId').val();

	$.ajax({
		type: 'POST',
		url: '/controller/edu_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'delete_img', 'eduId' : eduId, 'attachId' : link_img.replace('link_img_', '') },
		success: function (response) {
			console.log(response);

			if (response.result) {
				popCloseAndDim('checkDelete', true);
				edu_detail.get_data();
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			alert(request+' '+status+' '+error);
		}
	});
});

//삭제 클릭 이벤트
$('#delete_img_btn').on('click', function () {
	popCloseAndDim('imgOption', true);
	popOpenAndDim('checkDelete', true);
});

//다운로드 이벤트
$(document).on('click', '#down_btn', function() {
	var src = $('#'+link_img).attr('src');

	popCloseAndDim('imgOption', true);

	location.href = '/down.php?key='+src;
});

//자세히 보기 이벤트
$(document).on('click', '#detail_img_btn', function() {
	popCloseAndDim('imgOption', true);

	$('#detail_img').attr('src', $('#'+link_img).attr('src'));

	popOpenAndDim('megascopeProfile', true);
});

//이미지 클릭 이벤트
$(document).on('click', '.link_img', function() {
	link_img = $(this).attr('id');

	popOpenAndDim('imgOption', true);
});

//뒤로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	if (LEVEL != 100) {
	quill = new Quill('#doc', {
		modules: {
			toolbar: false
		},
		theme: 'snow'
	});
	}

	edu_detail.get_data();

	window.recvQR = function (code) {

		if (!worker_token) {
			worker_token = code;

			var eduId = $('#eduId').val();

			$.ajax({
				type: 'POST',
				url: '/controller/qrscan.php',
				dataType: 'json',
				cache: false,
				data: { 'module': 'add_worker', 'eduId': eduId, 'worker_token': worker_token },
				success: function (response) {
					console.log(response);

					setTimeout(function () {
						worker_token = undefined
					}, 1000)

					if (response.result) {
						//0:성공 , -1이미등록 -2 회원정보없음 -3 토큰 오류
						// if (response.status == 0) {
						// 	$('.error').html('<span style="color:#08B39A;">교육등록에 성공 하였습니다.</span>');
						// } else if (response.status == -1) {
						// 	$('.error').html('<span style="color:#ff5562ff;">이미등록한 근로자 입니다.</span>');
						// } else if (response.status == -2 || response.status == -3) {
						// 	$('.error').html('<span style="color:#ff5562ff;">회원정보가 존재하지 않습니다.</span>');
						// } else {
						// 	$('.error').html('<span style="color:#ff5562ff;">알수없는 오류 입니다.</span>');
						// }

						// $('.error').fadeIn(400).delay(1000).fadeOut(400);

						if (window.SAIIFEDU_EVENT) {
							window.SAIIFEDU_EVENT.callBackEvent('REG_RESULT', response.status)
						} else if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.SAIIFEDU_EVENT) {
							const param = { type: 'REG_RESULT', data: response.status }
							window.webkit.messageHandlers.SAIIFEDU_EVENT.postMessage(param);
						}


					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else {
							if (window.SAIIFEDU_EVENT) {
								window.SAIIFEDU_EVENT.callBackEvent('REG_RESULT', response.status)
							} else if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.SAIIFEDU_EVENT) {
								const param = { type: 'REG_RESULT', data: response.status }
								window.webkit.messageHandlers.SAIIFEDU_EVENT.postMessage(param);
							}

						}
					}
				},
				error: function (request, status, error) {
					alert(request + ' ' + status + ' ' + error);
				}
			});
		}
	}
});