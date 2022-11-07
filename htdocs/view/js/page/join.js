var login = (function () {
  
	return {
		auto_login : function() {
			var user_id = $('#user_id').val();
			var user_password = $('#user_password').val();
			
			$.ajax({
				type: 'POST',
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'user_login', 'user_id' : user_id, 'user_password' : user_password },
				success: function (response) {
					stop_progress();
					//console.log(response);
					
					if (response.result) {
						if (response.isTemp) {
							location.href = 'pw_setting.php';
						} else {
							level = Number(response.level);
							login.agree_check();
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
		
		agree_check : function() {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'agree_check' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.status == -1) {
							location.href = 'terms.php';
						} else {
							login.sign_check();
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
		
		sign_check : function() {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'sign_check' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.status == -1) {
							location.href = 'sign.php';
						} else {
							if (level == 0 || level == 1 || level == 2) {
								if (DEVICE == 'pc') location.href = '/view/admin/'+DEVICE+'/html/dashboard.php';
								else location.href = '/view/admin/'+DEVICE+'/html/field_list.php';
							} else {
								location.href = 'field_list.php';
							}
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

$('#join_form').on('submit', function() {
	var user_id = $('#user_id').val();
	var user_password = $('#user_password').val();
	var user_password_repeat = $('#user_password_repeat').val();
	var phone = $('#phone').val();
	var check_code_btn = $('#check_code_btn').text();
	
	if (user_password != user_password_repeat) {
		alert(_lc['alert']['입력한비밀번호가서로다릅니다']);
		return false;
	}
	
	if (check_code_btn != _lc['txt']['인증완료']) {
		alert(_lc['alert']['연락처인증을받으신후시도해주십시오']);
		return false;
	}
	
	$.ajax({
		type: 'POST',
		url: '/controller/login.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'join_form', 'user_id' : user_id, 'user_password' : user_password, 'phone' : phone.replace(/[^0-9]/g, '') },
		success : function(response) {
			//console.log(response);
			
			if (response.result) {
				login.auto_login();
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			alert(request+' '+status+' '+error);
		}	
	});
	
	return false;
});

$('#user_id').on('blur', function() {
	$('.help_p').hide();
	
	var user_id = $('#user_id').val();
	
	if (user_id) {
		$.ajax({
			type: 'POST',
			url: '/controller/login.php',
			dataType: 'json',
			cache: false,
			data: { 'module' : 'id_check', 'user_id' : user_id },
			success : function(response) {
				//console.log(response);
				
				if (response.result) {
					$('#id_correct_help').show();
				} else {
					$('#id_wrong_help').show();
					$('#user_id').focus();
				}
			},
			error: function(request, status, error){
				alert(request+' '+status+' '+error);
			}	
		});
	} else {
		$('#id_input_help').show();
	}
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