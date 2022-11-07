var cert_list = [];
var table_list = [];
var equipment = [];
var select_obj = '';
var new_win = '';

var worker_management_detail = (function () {
  
	return {
		get_national: function () {
			run_progress();

			$.ajax({
				type: 'POST',
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_national' },
				success: function (response) {
					stop_progress();
					//console.log(response);

					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*createdAt: "2021-09-13T17:44:37.000Z"
								id: 1
								isActive: true
								name: "대한민국(Republic of Korea)"
								updatedAt: null*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#nationality').append(html);
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

		get_equipment: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_equipment' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							equipment = response.list;

							var html = '';
							
							equipment.forEach(function(element){
								/*createdAt: "2021-09-13T17:44:37.000Z"
								id: 1
								isActive: true
								name: "불도저"
								updatedAt: null*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#cert_type').append(html);
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

		get_list: function () {
			var update_id = $('#update_id').val();
			
			table_list = [];
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/worker_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'update_id' : update_id },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.status == 0) {
							$('#name').val(response.info.name);
							if (response.info.birth) $('#birth').val(response.info.birth.substring(0, 10));
							$('#userId').val(response.info.userId);
							$('#sex').val((response.info.isMale)?'1':'0').prop('selected', true);
							$('#married').val((response.info.married)?'1':'0').prop('selected', true);
							$('#phone1').val(autoHypenPhone(response.info.phone1));
							if (response.info.phone2) $('#phone2').val(autoHypenPhone(response.info.phone2));
							if (response.info.addr1) $('#addr1').val(response.info.addr1);
							if (response.info.addr2) $('#addr2').val(response.info.addr2);
							if (response.info.occupation) $('#occupation').val(response.info.occupation);

							if (response.info.national) {
								setTimeout(function(){ 
									$('#nationality').val(response.info.national).prop('selected', true);
								}, 400);
							}

							if (response.info.certs) {
								cert_list = response.info.certs;
								setTimeout(function(){ 
									worker_management_detail.draw_cert_table();
								}, 400);
							}
							
							response.info.sites.forEach(function(element, index){
								if (element.createdAt == null) var createdAt = ''; else var createdAt = element.createdAt.substring(0, 10);
								if (element.deletedAt == null) var deletedAt = ''; else var deletedAt = element.deletedAt.substring(0, 10);

								var imsi = {
									"contractorName" : element.contractorName,
									"deletedAt" : deletedAt,
									"myCompName" : element.myCompName,
									"ownerName" : element.ownerName,
									"myCompany": element.myCompany,
									"siteId" : element.siteId,
									"siteName" : element.siteName,
									"createdAt": createdAt,
									"status": element.status
								}
								table_list.push(imsi);
							});

							var html = '';

							response.info.edus.forEach(function(element, index){
								html += '<tr>';
								html += '	<td></td>';
								html += '	<td>'+(index+1)+'</td>';
								html += '	<td>'+element.eduName+'</td>';
								html += '	<td>'+element.catName+'</td>';
								html += '	<td>'+element.svName+'</td>';
								html += '	<td>'+element.eduDate.substring(0,10)+'</td>';
								html += '	<td></td>';
								html += '</tr>';
							});

							if (!html) {
								html += '<tr><td colspan="7" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
							}

							$('#edu_list').append(html);
							
							worker_management_detail.draw_table();
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
		
		draw_table: function () {
			$('#tbody_list').empty();
			var html = '';
			
			if (table_list.length) {
				table_list.forEach(function(element, index){
					/*addr: "공덕역 1번길"
					contractorName: "삼성물산"
					deletedAt: "2021-09-24T00:00:00.000Z"
					myCompName: "수자원공사"
					ownerName: "서울시"
					siteId: 1212055764
					siteName: "공덕역B공구"
					createdAt: "2021-07-29T00:00:00.000Z"
					status: 1*/
					
					var no = index + 1;
					
					if (element.createdAt == '') element.createdAt = '-';
					if (element.deletedAt == '') element.deletedAt = '-';
					
					html += '<tr>';
					html += '	<td>';
					html += '		<div class="inp-wrap">';
					html += '			<div class="inp-item">';
					html += '				<label for="check_'+index+'">';
					html += '					<input type="checkbox" id="check_'+index+'" class="check" value="'+index+'">';
					html += '					<p></p>';
					html += '				</label>';
					html += '			</div>';
					html += '		</div>';
					html += '	</td>';
					html += '	<td>'+no+'</td>';
					html += '	<td>'+element.siteName+'</td>';
					html += '	<td>'+element.ownerName+'</td>';
					html += '	<td>'+element.contractorName+'</td>';
					html += '	<td>'+element.myCompName+'</td>';
					html += '	<td>'+element.createdAt+'</td>';
					html += '	<td>'+element.deletedAt+'</td>';
					html += '</tr>';
				});
			} else {
				html += '<tr><td colspan="8" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
			}
			
			$('#tbody_list').append(html);			
			//console.log(table_list);
		},

		draw_cert_table: function () {
			$('#cert_list').empty();
			var html = '';
			
			if (cert_list.length) {
				cert_list.forEach(function(element, index){
					/*accId: 34
					certDate: "1988-12-12T00:00:00.000Z"
					certName: "불도저"
					createdAt: "2021-10-01T01:30:00.000Z"
					deletedAt: null
					id: 1
					img: "https://dev-storage.saiifedu.com/0004740986346083442.jpg"
					type: 1
					updatedAt: "2021-11-01T02:05:09.000Z"*/
					
					var no = index + 1;

					var filter_data = equipment.filter(function(item) { return item.id === element.type; });
					
					if (filter_data.length) {
						var type_name = filter_data[0].name;
					} else {
						var type_name = element.certName;
					}

					if (element.img) {
						var btn = '<button type="button" class="btn sm rnd line-gray txt-gray" onclick="worker_management_detail.view_cert('+element.id+');">보기</button>';
					} else {
						var btn = '-';
					}
					
					html += '<tr>';
					html += '	<td>';
					html += '		<div class="inp-wrap">';
					html += '			<div class="inp-item">';
					html += '				<label for="cert_check_'+index+'">';
					html += '					<input type="checkbox" id="cert_check_'+index+'" class="check" value="'+index+'">';
					html += '					<p></p>';
					html += '				</label>';
					html += '			</div>';
					html += '		</div>';
					html += '	</td>';
					html += '	<td>'+no+'</td>';
					html += '	<td>'+type_name+'</td>';
					html += '	<td>'+element.certName+'</td>';
					html += '	<td>'+element.certDate.substring(0, 10)+'</td>';
					html += '	<td>'+btn+'</td>';
					html += '</tr>';
				});
			} else {
				html += '<tr><td colspan="6" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
			}
			
			$('#cert_list').append(html);
		},

		view_cert: function (id) {
			var filter_data = cert_list.filter(function(item) { return item.id === id; });
			
			if (filter_data.length) {
				$('#cert_img_div').html('<img src="'+filter_data[0].img+'" style="max-height:180px;margin:0 auto;" />');
				popOpenAndDim('alertView', true);
			}
		},
		
		cert_modal_close: function () {
			$('#cert_name').val('');
			$('#year').val('').prop('selected', true);
			$('#month').val('').prop('selected', true);
			$('#day').val('').prop('selected', true);
			$('#cert_img_add_btn').show();
			$('#cert_img_add_div').empty();
			
			popClose('alertAddCertificate');
		},
		
		site_modal_close: function () {
			$('#site_name').val('');
			$('#site_list .check').prop('checked', false);
			$('#site_list tr').show();

			popClose('alertAddField');
		},
		
		add_site: function () {
			var update_id = $('#update_id').val();
			
			if ($('#site_list .check:checked').length) {
				var contractor	 = $('#site_list .check:checked').attr('contractor');
				var myCompanyId	 = $('#site_list .check:checked').attr('myCompanyId');
				var myCompany	 = $('#site_list .check:checked').attr('myCompany');
				var owner		 = $('#site_list .check:checked').attr('owner');
				var siteId		 = Number($('#site_list .check:checked').attr('siteId'));
				var siteName	 = $('#site_list .check:checked').attr('siteName');
				
				//console.log(contractor, myCompany, myCompanyId, owner, siteId, siteName);
				
				var filter_data = table_list.filter(function(item) { return item.siteId == siteId; });
		
				//console.log(filter_data);

				if (filter_data.length) {
					alert('이미 추가된 현장입니다.');
				} else {
					$.ajax({
						type: 'POST',
						url: '/controller/worker_management_detail.php',
						dataType: 'json',
						cache: false,
						data: { 'module' : 'add_site', 'accId' : update_id, 'siteId' : siteId, 'myCompany' : myCompanyId },
						success: function (response) {
							console.log(response);
							
							if (response.result) {
								location.reload();
							} else {
								if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
								return false;
							}
						},
						error: function (request, status, error) {
							alert(request+' '+status+' '+error);
						}
					});
				}
			} else {
				alert('현장을 선택하세요.');
			}
		},
		
		select_delete: function () {
			var update_id = $('#update_id').val();
			
			if (select_obj == 'cert_list') {
				$('#cert_list .check:checked').each(function(){
					var index = $(this).val();
					//console.log(cert_list[index]);

					$.ajax({
						type: 'POST',
						url: '/controller/worker_management_detail.php',
						dataType: 'json',
						cache: false,
						data: { 'module' : 'cert_select_delete', 'certId' : cert_list[index].id },
						success: function (response) {
							console.log(response);
							
							if (!response.result) {
								if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
								return false;
							}
						},
						error: function (request, status, error) {
							alert(request+' '+status+' '+error);
						}
					});
				});

				location.reload();
			} else {
				$('#tbody_list .check:checked').each(function(){
					var index = $(this).val();
					//console.log(table_list[index]);

					//if (table_list[index].status != 0) {
						$.ajax({
							type: 'POST',
							url: '/controller/worker_management_detail.php',
							dataType: 'json',
							cache: false,
							data: { 'module' : 'select_delete', 'update_id' : update_id, 'siteId' : table_list[index].siteId, 'myCompany': table_list[index].myCompany },
							success: function (response) {
								console.log(response);
								
								if (!response.result) {
									if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
									return false;
								}
							},
							error: function (request, status, error) {
								alert(request+' '+status+' '+error);
							}
						});
					//}
				});

				location.reload();
			}
		},
		
		temp_pass: function () {
			var user_id = $('#userId').val();
			
			if (user_id) {
				run_progress();
				
				$.ajax({
					type: 'POST',
					url: '/controller/login.php',
					dataType: 'json',
					cache: false,
					data: { 'module' : 'temp_pass', 'user_id' : user_id },
					success: function (response) {
						stop_progress();
						console.log(response);
						
						if (response.result) {
							popClose('alertTemporaryPw');
						} else {
							if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
						}
					},
					error: function (request, status, error) {
						stop_progress();
						alert(request+' '+status+' '+error);
					}
				});
			} else {
				alert('ID가 없습니다.');
				popClose('alertTemporaryPw');
			}
		}
	}
})();

//장비 저장 이벤트
$('#cert_add_form').on('submit', function() {
	var update_id	 = $('#update_id').val();
	var cert_type	 = $('#cert_type option:selected').val();
	var cert_name	 = $('#cert_name').val();
	var year		 = $('#year option:selected').val();
	var month		 = $('#month option:selected').val();
	var day			 = $('#day option:selected').val();
	var cert_img	 = $('#cert_img').val();
	
	if (!cert_img) {
		alert('자격증사진이 없습니다.');
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/worker_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'cert_add_form', 'update_id' : update_id, 'cert_type' : cert_type, 'cert_name' : cert_name, 'year' : year, 'month' : month, 'day' : day, 'cert_img' : cert_img },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				if (response.status == 0) {
					location.reload();
				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			stop_progress();
			alert(request+' '+status+' '+error);
		}	
	});
	
	return false;
});

//파일첨부 이벤트
$('#cert_img_add_btn').on('click', function() {
	$('#upload_file').trigger('click');
});

//이미지 업로드
$(document).on('change', '#upload_file', function() {
	if ($(this).val()) {
		var update_id	 = $('#update_id').val();
		var file_data	 = new FormData();
		
		file_data.append('module', 'upload_file');
		file_data.append('update_id', update_id);
		file_data.append('upload_file', $('#upload_file')[0].files[0]);
		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/worker_management_detail.php',
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
					$('#cert_img').val(response.url);
					$('#cert_img_add_div').html('<img src="'+response.url+'" style="max-height:180px;margin:0 auto;" />');
					$('#cert_img_add_btn').hide();
					$('#cert_img_add_div').show();
				} else {
					$('#cert_img').val('');
					$('#cert_img_add_div').html('');
					$('#cert_img_add_btn').show();
					$('#cert_img_add_div').hide();
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

//현장 검색 이벤트
$('#search_form').on('submit', function() {
	var site_name = $('#site_name').val();
	
	$('#site_list').empty();
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/worker_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'search_site', 'site_name' : site_name },
		success : function(response) {
			stop_progress();
			console.log(response);
			
			if (response.result) {
				var html = '';
				
				if (response.list.length) {
					response.list.forEach(function(element, index){
						/*contractor: "삼성물산"
						myCompany: null
						myCompanyId: 0
						owner: "서울시"
						siteId: 1212055764
						siteName: "공덕역B공구"
						status: 1*/
						//if (element.myCompanyId) {
							html += '<tr>';
							html += '	<td>';
							html += '		<div class="inp-wrap">';
							html += '			<div class="inp-item">';
							html += '				<label for="site_list_check_'+index+'">';
							html += '					<input type="radio" id="site_list_check_'+index+'" name="check_radio" class="check" value="'+index+'" contractor="'+element.contractor+'" myCompany="'+element.myCompany+'" myCompanyId="'+element.myCompanyId+'" owner="'+element.owner+'" siteId="'+element.siteId+'" siteName="'+element.siteName+'">';
							html += '					<p></p>';
							html += '				</label>';
							html += '			</div>';
							html += '		</div>';
							html += '	</td>';
							html += '	<td style="text-align:left;">'+element.siteName+'</td>';
							html += '	<td>'+element.owner+'</td>';
							html += '	<td>'+element.contractor+'</td>';
							html += '	<td>'+element.myCompany+'</td>';
							html += '</tr>';
						//}
					});
				} else {
					html += '<tr><td colspan="5" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
				}
				
				$('#site_list').append(html);
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			stop_progress();
			alert(request+' '+status+' '+error);
		}	
	});
	
	return false;
});

//장비 추가 이벤트
$('#add_cert').on('click', function () {
	popOpenAndDim('alertAddCertificate', true);
});

//장비 삭제 선택 이벤트
$('#cert_select_del_btn').on('click', function () {
	var check_cnt = $('#cert_list').find('input[type="checkbox"]:checked').length;
	
	if (check_cnt) {
		select_obj = 'cert_list';
		$('#delete_modal_title').text('삭제 하시겠습니까?');
		popOpenAndDim('alertDelete', true)
	} else {
		alert('삭제할 장비 자격증을 선택하세요.');
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	worker_management_detail.select_delete();
});

//취소 이벤트
$('#cancel_btn').on('click', function () {
	worker_management_detail.site_modal_close();
});

//현장 추가 이벤트
$('#site_add_run_btn').on('click', function () {
	worker_management_detail.add_site();
});

//현장 추가 선택 이벤트
$('#add_btn').on('click', function () {
	popOpenAndDim('alertAddField', true);
});

//현장 삭제 선택 이벤트
$('#site_del_btn').on('click', function () {
	var check_cnt = $('#tbody_list').find('input[type="checkbox"]:checked').length;
	
	if (check_cnt) {
		select_obj = 'tbody_list';
		$('#delete_modal_title').text('이탈 하시겠습니까?');
		popOpenAndDim('alertDelete', true)
	} else {
		alert('이탈할 현장을 선택하세요.');
	}
});

//저장 이벤트
$('#add_form').on('submit', function() {
	var update_id	 = $('#update_id').val();
	var name		 = $('#name').val();
	var birth		 = $('#birth').val();
	var userId		 = $('#userId').val();
	var sex			 = $('#sex option:selected').val();
	var married		 = $('#married option:selected').val();
	var occupation	 = $('#occupation').val();
	var nationality	 = $('#nationality option:selected').val();
	var phone1		 = $('#phone1').val().replace(/[^0-9]/g, '');
	var phone2		 = $('#phone2').val().replace(/[^0-9]/g, '');
	var addr1		 = $('#addr1').val();
	var addr2		 = $('#addr2').val();
	
	if (!update_id) {
		alert('근로자 키값이 없습니다.');
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/worker_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'update_id' : update_id, 'name' : name, 'birth' : birth, 'userId' : userId, 'sex' : sex, 'married' : married, 'occupation' : occupation, 'nationality' : nationality, 'phone1' : phone1, 'phone2' : phone2, 'addr1' : addr1, 'addr2' : addr2 },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				if (response.status == 0) {
					location.reload();
				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			stop_progress();
			alert(request+' '+status+' '+error);
		}	
	});
	
	return false;
});

//주소검색 이벤트
$('#addr1').on('click', function() {
	if (!new_win) {
		new_win = 'open';
		
		new daum.Postcode({
			oncomplete: function(data) {
				console.log(data);
				
				//$('#zip_code').val(data.zonecode);
				if (data.userSelectedType == 'R'){
					$('#addr1').val(data.roadAddress);
				} else {
					$('#addr1').val(data.jibunAddress);
				}
				// if (data.roadAddress){
				// 	$('#addr1').val(data.roadAddress);
				// } else if(data.jibunAddress){
				// 	$('#addr1').val(data.jibunAddress);
				// } else if (data.address) {
				// 	$('#addr1').val(data.address);
				// }
				
				new_win = '';
				$('#addr2').focus();
			},
			onclose: function(state) {
				new_win = '';
			}
		}).open();
	}
});

$(document).ready(function () {
	var html = '';
	var date = new Date();
	var year = date.getFullYear();
	var key1_year = year - 50;
	var key2_year = year;
	
	for (i=key1_year; i<=key2_year; i++) {
		html += '<option value="'+i+'">'+i+'</option>';
	}
	
	$('#year').append(html);
	
	html = '';
	
	for (i=1; i<13; i++) {
		html += '<option value="'+i+'">'+i+'</option>';
	}
	
	$('#month').append(html);
	
	html = '';
	
	for (i=1; i<32; i++) {
		html += '<option value="'+i+'">'+i+'</option>';
	}
	
	$('#day').append(html);
	$('#birth').mask('0000-00-00');
	
	worker_management_detail.get_national();
	worker_management_detail.get_equipment();
	worker_management_detail.get_list();
});