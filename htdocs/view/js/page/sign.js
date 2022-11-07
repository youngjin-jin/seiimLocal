var login = (function () {
  
	return {
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

$('#save_btn').on('click', function() {
	if(signature.isEmpty()) {
		alert(_lc['alert']['서명을해주세요']);
	} else {
		var data = signature.toDataURL('image/png');
		console.log('<img src="'+data+'" />');
		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/login.php',
			dataType: 'json',
			cache: false,
			data: { 'module' : 'signature_submit', 'img' : data },
			success: function (response) {
				stop_progress();
				//console.log(response);
				
				if (response.result) {
					if (LEVEL == 0 || LEVEL == 1 || LEVEL == 2) {
						if (DEVICE == 'pc') location.href = '/view/admin/'+DEVICE+'/html/dashboard.php'; 
						else location.href = '/view/admin/'+DEVICE+'/html/field_list.php';
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
	}
});

$('#reset_btn').on('click', function() {
	signature.clear();
});

function resizeCanvas(){
	var height = $(window).height();
	height -= $('#sign_p1').outerHeight(true);
	height -= $('#fixed').outerHeight(true);
	
	$('#signature').css('height', (height - 200)+'px');
	
	canvas = $('#signature')[0];
	
	signature = new SignaturePad(canvas, {
		minWidth : 2,
		maxWidth : 2,
		penColor : 'rgb(0, 0, 0)'
	});
	
	var ratio =  Math.max(window.devicePixelRatio || 1, 1);
	canvas.width = canvas.offsetWidth * ratio;
	canvas.height = canvas.offsetHeight * ratio;
	canvas.getContext('2d').scale(ratio, ratio);
}
 
$(window).on('resize', function(){
	resizeCanvas();
});

var canvas, signature;

$(document).ready(function () {
	resizeCanvas();
});