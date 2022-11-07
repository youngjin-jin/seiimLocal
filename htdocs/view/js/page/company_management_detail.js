var company_management_detail = (function () {
  
	return {
		get_list: function () {
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/company_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'key' : key },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							table_list = [];
							
							response.list.forEach(function(element, index){
								/*contractor: "포스코건설"
									owner: "서울시"
									siteId: 3539032470
									siteName: "향동 7구역"
									status: 0*/
								
								var no = index + 1;
								
								if (element.status == 0) var status = '진행중'; else var status = '종료';
								
								html += '<tr>';
								html += '	<td>'+no+'</td>';
								html += '	<td>'+element.siteId+'</td>';
								html += '	<td>'+status+'</td>';
								html += '	<td>'+element.siteName+'</td>';
								html += '	<td>'+element.owner+'</td>';
								html += '	<td>'+element.contractor+'</td>';
								html += '</tr>';
							});
							
							console.log(table_list);
						} else {
							html += '<tr><td colspan="6" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
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

//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	company_management_detail.get_list();
});