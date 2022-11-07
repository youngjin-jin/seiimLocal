var sign_view = (function () {
  
	return {
		get_sign: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/sign_view.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_sign' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						/*accId: 34
						createdAt: "2021-10-19T10:50:40.000Z"
						id: 6
						path: "https://dev-storage.saiifedu.com/9492879584642899.jpg"*/
						if (response.info.path) {
							$('#sign_img').attr('src', response.info.path);
							$('#sign_img').show();
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
					//location.href = document.referrer;
					location.reload();
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

//수정 이벤트
$('#update_btn').on('click', function () {
	$('#sign_view_div').hide();
	$('#sign_update_div').show();
	resizeCanvas();
});

//뒤로가기 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	sign_view.get_sign();
});