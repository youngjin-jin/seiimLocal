var login = (function () {
  
	return {
		find_id : function() {
			var phone = $('#phone').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'find_id', 'phone' : phone.replace(/[^0-9]/g, '') },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						response.list.forEach(function(element){
							if (element.level == 0) var user_type = _lc['txt']['슈퍼관리자']; 
							else if (element.level == 1) var user_type = _lc['txt']['호스트관리자'];
							else if (element.level == 2) var user_type = _lc['txt']['일반관리자'];
							else var user_type = _lc['txt']['근로자'];
							
							html += '<tr>'
							html += '	<td>'+element.userId+'</td>';
							html += '	<td>'+user_type+'</td>';
							html += '</tr>';
						});
						
						$('#result_tbody').html(html);
						$('#result_div').show();
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

$('#back_btn').on('click', function() {
	history.back();
});

$('#find_password_btn').on('click', function() {
	location.href = 'find_account_pw.php';
});

$('#request_code_btn').on('click', function() {
	var phone = $('#phone').val();
	
	if (phone.length < 13) {
		alert(_lc['alert']['연락처를정확하게입력해주세요']);
		$('#phone').focus();
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/login.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'request_code', 'phone' : phone.replace(/[^0-9]/g, '') },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				$('#request_code_btn').text(_lc['txt']['재요청']);
				alert(_lc['alert']['인증번호를발송하였습니다']);
				
				time_check = true;
				console.log(time_check);
				
				setTimeout(function(){ 
					time_check = false;
					console.log(time_check);
				}, 60000);
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			stop_progress();
			alert(request+' '+status+' '+error);
		}
	});
});

$('#check_code_btn').on('click', function() {
	var phone = $('#phone').val();
	var code = $('#code').val();
	
	if (phone.length < 13) {
		alert(_lc['alert']['연락처를정확하게입력해주세요']);
		$('#phone').focus();
		return false;
	}
	
	if (code.length < 6) {
		alert(_lc['alert']['인증번호를정확하게입력해주세요']);
		$('#code').focus();
		return false;
	}
	
	if (!time_check) {
		alert(_lc['alert']['인증번호유효시간이종료되었습니다']);
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/login.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'check_code', 'phone' : phone.replace(/[^0-9]/g, ''), 'code' : code },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				$('#check_code_btn').text(_lc['txt']['인증완료']);
				$('#phone').prop('disabled', true).addClass('disabled');
				$('#request_code_btn').prop('disabled', true).addClass('disabled');
				$('#code').prop('disabled', true).addClass('disabled');
				$('#check_code_btn').prop('disabled', true).addClass('disabled');
				
				login.find_id();
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			stop_progress();
			alert(request+' '+status+' '+error);
		}
	});
});

var time_check = false;