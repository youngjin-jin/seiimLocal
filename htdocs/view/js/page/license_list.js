var type = [];

var license_list = (function () {
  
	return {
		get_category: function () {
			$.ajax({
				type: 'POST',
				url: '/controller/license_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_category' },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						/*createdAt: "2021-09-13T17:44:37.000Z"
						id: 1
						isActive: true
						name: "불도저"
						updatedAt: null*/
						type = response.list;

						license_list.get_list();
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});
		},

		get_list: function () {
			$('#ul_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/license_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*accId: 34
								certDate: "1988-12-12T00:00:00.000Z"
								certName: "불도저"
								createdAt: "2021-10-01T01:30:00.000Z"
								deletedAt: null
								id: 1
								img: "https://dev-storage.saiifedu.com/0004740986346083442.jpg"
								type: 1
								updatedAt: "2021-10-01T01:30:02.000Z"*/

								var filter_data = type.filter(function(item) { return item.id === element.type; });
								
								if (filter_data.length) {
									var type_name = filter_data[0].name;
								} else {
									var type_name = element.certName;
								}
								
								html += '<li onclick="license_list.detail('+element.id+');">';
								html += '	<div class="list-head">';
								html += '		<p class="tit">'+element.certName+'</p>';
								html += '	</div>';
								html += '	<div class="list-body">';
								html += '		<div class="tbl-wrap v1">';
								html += '			<table>';
								html += '				<colgroup>';
								html += '					<col style="width: 76px;">';
								html += '					<col style="width: auto;">';
								html += '				</colgroup>';
								html += '				<tbody>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['장비종류']+'</th>';
								html += '						<td>'+type_name+'</td>';
								html += '					</tr>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['발급년월일']+'</th>';
								html += '						<td>'+element.certDate.substring(0, 10)+'</td>';
								html += '					</tr>';
								html += '				</tbody>';
								html += '			</table>';
								html += '		</div>';
								html += '	</div>';
								html += '</li>';
							});
							
							$('#ul_list').append(html);
							$('.license-add').hide();
							$('.list_block').show();
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
		
		detail: function (id) {
			location.href = 'license_detail.php?key='+id;
		}
	}
})();

//QR인증 선택 이벤트
$('#qr_btn').on('click', function () {
	location.href = 'qrscan.php';
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	location.href = 'license_modify.php';
});

$(document).ready(function () {
	license_list.get_category();
});