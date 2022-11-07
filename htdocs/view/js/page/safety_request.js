var safety_request = (function () {
  
	return {
		get_count: function () {
			var key = $('#key').val();
			var myCompanyId = $("#myCompanyId").val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/safety_request.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_count', 'key' : key, 'myCompanyId': myCompanyId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						$('#name_span').text(response.name);
						
						var list = response.list;
						
						var count = 0;
						var filter_data = list.filter(function(item) { return item.isDone == false; });
						
						count = filter_data.length;
						
						$('#count_span').text(count);

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

//안전문서작성 선택 이벤트
$('#write_btn').on('click', function () {
	var count		 = parseInt($('#count_span').text());
	var key			 = $('#key').val();
	var site_name	 = $('#site_name').val();
	var owner	 = $('#owner').val();
	var contractor	 = $('#contractor').val();
	var myCompany	 = $('#myCompany').val();
	var myCompanyId	 = $('#myCompanyId').val();
	if (count) {
		location.href = 'safety_list.php?key='+key+'&site_name='+encodeURIComponent(site_name)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&myCompanyId='+encodeURIComponent(myCompanyId);
	} else {
		alert(_lc['alert']['작성할안전문서가없습니다']);
	}
});

$(document).ready(function () {
	safety_request.get_count();
});