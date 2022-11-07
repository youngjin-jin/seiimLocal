var revId = '';

var login = (function () {
  
	return {
		agree_load : function() {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'agree_load' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						revId = response.list.id;
						//console.log(revId);
						
						$('#termsCheck01_link_btn').attr('link_url', response.list.agreement);
						$('#termsCheck02_link_btn').attr('link_url', response.list.privacy);
						$('#termsCheck03_link_btn').attr('link_url', response.list.thirdparty);
						$('#termsCheck04_link_btn').attr('link_url', response.list.marketing);
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
							login.profile_check();
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
				url: '/controller/login.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'profile_check' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.status == -1) {
							location.href = 'profile_write.php';
						} else {
							popOpen('completeJoin');
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
		
		reset : function() {
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

$('#complete_join_btn').on('click', function() {
	popCloseAndDim('completeJoin', true);
	if (LEVEL == 0 || LEVEL == 1 || LEVEL == 2) {
		if (DEVICE == 'pc') location.href = '/view/admin/'+DEVICE+'/html/dashboard.php'; 
		else location.href = '/view/admin/'+DEVICE+'/html/field_list.php';
	} else location.href = 'field_list.php';
});

$('.ic-link').on('click', function() {
	var link_url = $(this).attr('link_url');
	
	if (link_url) {
		location.href = link_url;
	}
});

$('#allCheck').on('click', function() {
	if ($(this).is(':checked')) {
		$('#termsCheck01').prop('checked', true);
		$('#termsCheck02').prop('checked', true);
		$('#termsCheck03').prop('checked', true);
		$('#termsCheck04').prop('checked', true);
	} else {
		$('#termsCheck01').prop('checked', false);
		$('#termsCheck02').prop('checked', false);
		$('#termsCheck03').prop('checked', false);
		$('#termsCheck04').prop('checked', false);
	}
});

$('.agree_check').on('click', function() {
	var termsCheck01 = ($('#termsCheck01').is(':checked'))?true:false;
	var termsCheck02 = ($('#termsCheck02').is(':checked'))?true:false;
	var termsCheck03 = ($('#termsCheck03').is(':checked'))?true:false;
	var termsCheck04 = ($('#termsCheck04').is(':checked'))?true:false;
	
	if (termsCheck01 && termsCheck02 && termsCheck03 && termsCheck04) {
		$('#allCheck').prop('checked', true);
	} else {
		$('#allCheck').prop('checked', false);
	}
});

$('#agree_submit_btn').on('click', function() {
	var termsCheck01 = ($('#termsCheck01').is(':checked'))?true:false;
	var termsCheck02 = ($('#termsCheck02').is(':checked'))?true:false;
	var termsCheck03 = ($('#termsCheck03').is(':checked'))?true:false;
	var termsCheck04 = ($('#termsCheck04').is(':checked'))?true:false;
	
	if (!(termsCheck01 && termsCheck02 && termsCheck03)) {
		popOpenAndDim('checkRequiredTerms', true);
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/login.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'agree_submit', 'revId' : revId, 'termsCheck01' : termsCheck01, 'termsCheck02' : termsCheck02, 'termsCheck03' : termsCheck03, 'termsCheck04' : termsCheck04 },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				login.sign_check();
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

$(document).ready(function () {
	login.agree_load();
});