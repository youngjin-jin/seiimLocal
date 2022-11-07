var login = (function () {
  
	return {
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
							popOpen('changePW');
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
		
		logout : function() {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'logout' },
				success: function (response) {
					stop_progress();
					//console.log(response);
					
					if (response.result) {
						location.href = response.url;
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

$('#reset_btn').on('click', function() {
	popCloseAndDim('changePW', true);
	login.logout();
});

$('#change_password_form').on('submit', function() {
	var new_password = $('#new_password').val();
	var new_password_repeat = $('#new_password_repeat').val();
	
	if (new_password != new_password_repeat) {
		alert(_lc['alert']['입력한비밀번호가서로다릅니다']);
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/login.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'change_password', 'new_password' : new_password, 'new_password_repeat' : new_password_repeat },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				login.agree_check();
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