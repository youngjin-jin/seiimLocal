var upload_mode = link_img = '';

var profile_write = (function () {
  
	return {
		init : function() {
			var html = '';
			
			var date = new Date();
			var year = date.getFullYear();
			var key1_year = year - 80;
			var key2_year = year;
			
			for (i=key1_year; i<=key2_year; i++) {
				html += '<option value="'+i+'">'+i+'</option>';
			}
			
			$('#year').append(html);
			$('#safe_year').append(html);
			
			html = '';
			
			for (i=1; i<13; i++) {
				html += '<option value="'+i+'">'+i+'</option>';
			}
			
			$('#month').append(html);
			$('#safe_month').append(html);
			
			html = '';
			
			for (i=1; i<32; i++) {
				html += '<option value="'+i+'">'+i+'</option>';
			}
			
			$('#day').append(html);
			$('#safe_day').append(html);
			
			profile_write.get_profile_info();
			profile_write.get_profile_img('id_card');
			profile_write.get_profile_img('safe_certi');
			profile_write.get_profile_img('add_upload');
			profile_write.get_nationality();
		},
		
		get_nationality : function() {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/profile_write.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_nationality' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
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
		
		get_profile_info : function() {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/profile_write.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_profile_info' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.info.phone1) $('#phone1').text(autoHypenPhone(response.info.phone1));
						if (response.info.name) $('#name').val(response.info.name);
						if (!response.info.isMale) $('#sex').val('0').prop('selected', true); else $('#sex').val('1').prop('selected', true);
						if (response.info.birth) {
							var birth = response.info.birth.split('-');
							
							$('#year').val(birth[0]).prop('selected', true);
							$('#month').val(String(parseInt(birth[1]))).prop('selected', true);
							$('#day').val(String(parseInt(birth[2]))).prop('selected', true);
						}
						if (response.info.addr1) $('#adress1').val(response.info.addr1);
						if (response.info.addr2) $('#adress2').val(response.info.addr2);
						if (response.info.married) $('#married').val('1').prop('selected', true); else $('#married').val('0').prop('selected', true);
						if (response.info.national) {
							setTimeout(function(){ 
								$('#nationality').val(String(response.info.national)).prop('selected', true);
							}, 400);
						}
						if (response.info.phone2) $('#phone2').val(autoHypenPhone(response.info.phone2));
						if (response.info.profile) {
							$('#profile_img').attr('src', response.info.profile);
							$('#profile_img').addClass('link_img');
							
							$('#profile_img').off('click');
						} else {
							$('#profile_img').attr('src', '../img/no_image_150_150.jpg');
							$('#profile_img').removeClass('link_img');
							
							$('#profile_img').off().on('click', function() {
								upload_mode = 'profile_img';
								
								$('#upload_file').trigger('click');
							});
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
		
		get_profile_img : function(upload_mode, scroll=false) {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/profile_write.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_profile_img', 'upload_mode' : upload_mode },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (upload_mode == 'profile_img') {
							profile_write.get_profile_info();
						} else if (upload_mode == 'id_card') {
							if (response.info) {
								if (response.info.img) $('#id_card_div').html('<img src="'+response.info.img+'" id="id_card" class="link_img" />');
								else $('#id_card_div').html('');
							} else $('#id_card_div').html('');
						} else if (upload_mode == 'safe_certi') {
							if (response.info) {
								if (response.info.img) {
									var certDate = response.info.certDate.substring(0, 10).split('-');
									
									$('#safe_certi_div').html('<img src="'+response.info.img+'" id="safe_certi" class="link_img" />');
									$('#safe_year').val(certDate[0]).prop('selected', true);
									$('#safe_month').val(String(parseInt(certDate[1]))).prop('selected', true);
									$('#safe_day').val(String(parseInt(certDate[2]))).prop('selected', true);
								} else {
									$('#safe_certi_div').html('');
									$('#safe_year').val('').prop('selected', true);
									$('#safe_month').val('').prop('selected', true);
									$('#safe_day').val('').prop('selected', true);
								}
							} else {
								$('#safe_certi_div').html('');
								$('#safe_year').val('').prop('selected', true);
								$('#safe_month').val('').prop('selected', true);
								$('#safe_day').val('').prop('selected', true);
							}
						} else {
							var html = '';
							
							response.list.forEach(function(element, index){
								/*accId: 1
								createdAt: "2021-10-19T01:58:02.000Z"
								deletedAt: null
								id: 2
								img: "https://dev-storage.saiifedu.com/7859920375249758.jpg"
								updatedAt: "2021-10-19T01:58:02.000Z"*/
								if (index == 0) var mt20 = ''; else var mt20 = 'mt20';
								
								html += '<div class="photo-attach mt20">';
								html += '	<img src="'+element.img+'" id="add_upload_'+element.id+'" class="link_img">';
								html += '</div>';
							});
							
							$('#add_upload_div').html(html);
							
							if (scroll) $('html, body').scrollTop($(document).height());
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
	}
})();

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

//삭제 이벤트
$(document).on('click', '#delete_btn', function() {
	popOpen('checkDelete');
	popCloseAndDim('imgOption', false);
});

//이미지 삭제 이벤트
$(document).on('click', '#delete_run_btn', function() {
	if (link_img == 'profile_img' || link_img == 'id_card' || link_img == 'safe_certi') {
		var mode = link_img;
		var id = '';
	} else {
		var mode = 'add_upload';
		var id = link_img.replace('add_upload_', '');
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/profile_write.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'delete_profile_img', 'upload_mode' : mode, 'id' : id },
		success: function (response) {
			stop_progress();
			console.log(response);

			if (response.result) {
				profile_write.get_profile_img(mode, true);
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			stop_progress();
			alert(request+' '+status+' '+error);
		}	
	});
	
	popCloseAndDim('checkDelete', true);
});

//이미지 클릭 이벤트
$(document).on('click', '.link_img', function() {
	link_img = $(this).attr('id');
	
	popOpenAndDim('imgOption', true);
});


//이미지 업로드
$(document).on('change', '#upload_file', function() {
	if ($(this).val()) {
		var file_data = new FormData();
		
		if (upload_mode == 'safe_certi') {
			var safe_year	 = $('#safe_year option:selected').val();
			var safe_month	 = $('#safe_month option:selected').val();
			var safe_day	 = $('#safe_day option:selected').val();
			
			if (safe_year && safe_month && safe_day) {
				if ($('#safe_certi_div').find('img').length > 0) var safe_certi_mode = 'update'; else var safe_certi_mode = 'new';
				
				var safe_date = safe_year+'-'+safe_month+'-'+safe_day;
				file_data.append('safe_date', safe_date);
				file_data.append('safe_date', safe_date);
				file_data.append('safe_certi_mode', safe_certi_mode);
			} else {
				if (navigator.userAgent.toLowerCase().indexOf('msie') != -1) {
					// ie 일때
					$('#upload_file').replaceWith($('#upload_file').clone(true));
				} else { 
					// other browser 일때 
					$('#upload_file').val('');
				}
				
				alert(_lc['alert']['기초안전보건교육증이수일자를선택하세요']);
				return false;
			}
		}
		
		file_data.append('module', 'upload_file');
		file_data.append('upload_mode', upload_mode);
		file_data.append('upload_file', $('#upload_file')[0].files[0]);		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/profile_write.php',
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
					profile_write.get_profile_img(upload_mode, true);
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

//주소검색 이벤트
$('#adress1').on('click', function() {
	new daum.Postcode({
        oncomplete: function(data) {
        	console.log(data);
			
            //$('#zip_code').val(data.zonecode);
						if (data.userSelectedType == 'R'){
							$('#adress1').val(data.roadAddress);
						} else {
							$('#adress1').val(data.jibunAddress);
						}
      //       if (data.roadAddress){
			// 	$('#adress1').val(data.roadAddress);
      //       } else if(data.jibunAddress){
      //           $('#adress1').val(data.jibunAddress);
      //       } else if (data.address) {
			// 	$('#adress1').val(data.address);
			// }
			
			$('#adress2').focus();
        }
    }).open();
});

$('#id_card_upload_btn').on('click', function() {
	upload_mode = 'id_card';
	
	$('#upload_file').trigger('click');
});

$('#safe_certi_upload_btn').on('click', function() {
	upload_mode = 'safe_certi';
	
	$('#upload_file').trigger('click');
	/*if ($('#'+upload_mode+'_div').find('img').length) {
		alert(_lc['alert']['기존기초안전보건교육증을삭제하신후시도해주십시오']);
	} else {
		$('#upload_file').trigger('click');
	}*/
});

$('#add_upload_btn').on('click', function() {
	upload_mode = 'add_upload';
	$('#upload_file').trigger('click');
});

$('.ic-tooltip').on('click', function() {
	popOpenAndDim('checkIdHide', true)
})

$('#form').on('submit', function() {
	var name			 = $('#name').val();
	var sex				 = $('#sex option:selected').val();
	var year			 = $('#year option:selected').val();
	var month			 = $('#month option:selected').val();
	var day				 = $('#day option:selected').val();
	var adress1			 = $('#adress1').val();
	var adress2			 = $('#adress2').val();
	var married			 = $('#married option:selected').val();
	var nationality		 = $('#nationality option:selected').val();
	var phone2			 = $('#phone2').val().replace(/[^0-9]/g, '');
	
	if (year && month && day) {
		var birth = year+'-'+month+'-'+day;
	} else {
		popOpenAndDim('checkBlank', true);
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/profile_write.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'user_profile_write', 'name' : name, 'sex' : sex, 'birth' : birth, 'adress1' : adress1, 'adress2' : adress2, 'married' : married, 'nationality' : nationality, 'phone2' : phone2 },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				location.href = 'field_list.php';
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			stop_progress();
			alert(request+' '+status+' '+error);
		}
	});
	
	return false;
});

$(document).ready(function () {
	profile_write.init();
});