//관리자 저장 이벤트
$('#add_form').on('submit', function() {
	var code = $('#code').val();
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/field_list_add.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'code' : code },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				if (response.status == 0) {
					location.href = 'relative_list.php?key='+code;
				} else if (response.status == -1) {
					popOpenAndDim('checkField', true);
				} else {
					popOpenAndDim('already_regi', true);
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

//뒤로가기 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//닫기 이벤트
$('#close_btn').on('click', function () {
	popCloseAndDim('checkField', true);
});