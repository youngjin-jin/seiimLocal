var key = '';

var license_modify = (function () {
  
	return {
		get_category: function () {
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

			$.ajax({
				type: 'POST',
				url: '/controller/license_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_category' },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						var html = '';

						if (response.list.length) {
							response.list.forEach(function(element){
								/*createdAt: "2021-09-13T17:44:37.000Z"
								id: 1
								isActive: true
								name: "불도저"
								updatedAt: null*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
						}

						$('#type').append(html);

						if (key) license_modify.get_list();
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});
		},

		get_list: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/license_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*accId: 34
								certDate: "1988-12-12T00:00:00.000Z"
								certName: "불도저"
								createdAt: "2021-10-01T01:30:00.000Z"
								deletedAt: null
								id: 1
								img: "https://dev-storage.saiifedu.com/0004740986346083442.jpg"
								type: 1
								updatedAt: "2021-10-01T01:30:02.000Z"*/

								if (parseInt(key) == element.id) {
									$('#type').val(element.type).prop('selected', true);
									$('#certName').val(element.certName);

									var certDate = element.certDate.substring(0, 10).split('-');
									$('#year').val(certDate[0]).prop('selected', true);
									$('#month').val(String(parseInt(certDate[1]))).prop('selected', true);
									$('#day').val(String(parseInt(certDate[2]))).prop('selected', true);

									if (element.img) {
										$('#attach_div').append('<img id="img_'+element.id+'" src="'+element.img+'" class="link_img">');
									}
								}
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
		}
	}
})();

$('#upload_btn').on('click', function() {
	$('#upload_file').trigger('click');
});

$('#form').on('submit', function() {
	var type			 = $('#type option:selected').val();
	var certName		 = $('#certName').val();
	var year			 = $('#year option:selected').val();
	var month			 = $('#month option:selected').val();
	var day				 = $('#day option:selected').val();
	
	if (year && month && day) {
		var certDate = year+'-'+month+'-'+day;
	} else {
		popOpenAndDim('checkBlank', true);
		return false;
	}

	if (!$('#attach_div').find('img').length) {
		popOpenAndDim('checkBlank', true);
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/license_modify.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'update', 'type' : type, 'certName' : certName, 'certDate' : certDate, 'certId' : key },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				if (key) location.reload(); else location.href = document.referrer;
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

//이미지 업로드
$(document).on('change', '#upload_file', function() {
	if ($(this).val()) {
		var type			 = $('#type option:selected').val();
		var certName		 = $('#certName').val();
		var year			 = $('#year option:selected').val();
		var month			 = $('#month option:selected').val();
		var day				 = $('#day option:selected').val();
		
		if (!(type && certName && year && month && day)) {
			if (navigator.userAgent.toLowerCase().indexOf('msie') != -1) {
				// ie 일때
				$('#upload_file').replaceWith($('#upload_file').clone(true));
			} else { 
				// other browser 일때 
				$('#upload_file').val('');
			}
			
			popOpenAndDim('checkBlank', true);
			return false;
		}

		var file_data	 = new FormData();
		var certDate	 = year+'-'+month+'-'+day;
		
		file_data.append('type', type);
		file_data.append('certName', certName);
		file_data.append('certDate', certDate);
		file_data.append('certId', key);
		file_data.append('module', 'update');
		file_data.append('upload_file', $('#upload_file')[0].files[0]);
		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/license_modify.php',
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
					if (key) location.reload(); else location.href = document.referrer;
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

//수정 이벤트
$('#update_btn').on('click', function () {
	location.href = 'license_modify.php?key='+key;
});

//뒤로가기 선택 이벤트
$('#back_btn').on('click', function () {
	popOpenAndDim('checkLeave', true);
});

//뒤로가기 이벤트
$('#back_run_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	key = $('#key').val();

	license_modify.get_category();
});