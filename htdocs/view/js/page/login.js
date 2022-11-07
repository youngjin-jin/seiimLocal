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
							if (level == 0 || level == 1 || level == 2) {
								if (DEVICE == 'pc') location.href = '/view/admin/'+DEVICE+'/html/dashboard.php';
								else location.href = '/view/admin/'+DEVICE+'/html/field_list.php';
							} else {
								login.profile_check();
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
		},
		
		profile_check : function() {
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
						if (!(response.info.name && response.info.birth && response.info.national)) {
							location.href = 'profile_write.php';
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

var level;

$('#login_form').on('submit', function() {
	var user_id = $('#user_id').val();
	var user_password = $('#user_password').val();
	
	run_progress();
	
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
					location.href = '/view/admin/mobile/html/pw_setting.php';
				} else {
					//{ "SU_ADMIN": 0, "HOST_ADMIN": 1, "BASIC_ADMIN": 2, "WORKER": 100 }
					/*if (Number(response.level) == 0 || Number(response.level) == 1 || Number(response.level) == 2) {
						if (DEVICE == 'pc') location.href = '/view/admin/'+DEVICE+'/html/dashboard.php';
						else location.href = '/view/admin/'+DEVICE+'/html/field_list.php';
					} else {
						location.href = '/view/user/'+DEVICE+'/html/mypage.php';
					}*/
					
					level = Number(response.level);
					if (DEVICE == 'pc' && (level == 0 || level == 1 || level == 2)) {
						location.href = '/view/admin/'+DEVICE+'/html/dashboard.php';
					} else {
						login.agree_check();
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
	
	return false;
});