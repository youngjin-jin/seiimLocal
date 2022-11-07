var field_list = (function () {
  
	return {
		get_list: function () {
			$('#ul_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list' },
				success: function (response) {
					stop_progress();				
							
					if (response.result) {
						var html = '';
						var siteIds = new Array();
						var myCompanys = new Array();



						
						if (response.list.length) {
							response.list.forEach(function(element){
								siteIds.push(element.siteId);
								myCompanys.push(element.myCompany);

								/*contractor: "삼성물산"
									myCompany: "수자원공사"
									myCompanyId: 2
									owner: "서울시"
									siteId: 1212055764
									siteName: "공덕역B공구"
									status: 1*/
								
								if (element.status == 0) {
									var status = '<p class="status">진행중</p>';
								} else {
									var status = '<p class="status complete">완료</p>';
								}


								
								
								html += '<li onclick="field_list.detail('+element.siteId+', \''+element.siteName+'\', \''+element.owner+'\', \''+element.contractor+'\', \''+element.myCompany+'\', \''+element.myCompanyId+'\');">';
								html += '	<div class="list-head">';
								html += '		<p class="tit">'+element.siteName+'</p>';
								html += '		<div class="list-db">';
								html += '			<dl class="field-code">';
								html += '				<dt class="txt-lightgray">'+_lc['txt']['현장코드']+'</dt>';
								html += '				<dd class="txt-white">'+element.siteId+'</dd>';
								html += '			</dl>';
								html += status;
								status
								html += '		</div>';
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
								html += '						<th>'+_lc['txt']['발주처']+'</th>';
								html += '						<td>'+element.owner+'</td>';
								html += '					</tr>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['시공사']+'</th>';
								html += '						<td>'+element.contractor+'</td>';
								html += '					</tr>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['소속업체']+'</th>';
								html += '						<td>'+element.myCompany+'</td>';
								html += '					</tr>';
								html += '				</tbody>';
								html += '			</table>';
								html += '		</div>';
								html += '	</div>';
								html += '</li>';
							});
							$('#ul_list').append(html);
							$('.field-add').hide();
							$('.list_block').show();
							const result_1 = [...new Set(siteIds)];
							const result_2 = [...new Set(myCompanys)];
							if(response.list.length != 0 )
							{
								$("#fixedaaa").show();
							}
							else
							{
								
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
		
		detail: function (siteId, siteName, owner, contractor, myCompany, myCompanyId) {

			if (LEVEL == 0 || LEVEL == 1 || LEVEL == 2) {
				location.href = 'field_detail.php?key='+siteId+'&site_name='+encodeURIComponent(siteName)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&myCompanyId='+encodeURIComponent(myCompanyId);
			} else {
				$.ajax({
					type: 'POST',
					url: '/controller/safety_request.php',
					dataType: 'json',
					cache: false,
					data: { 'module' : 'get_count', 'key' : siteId, 'myCompanyId' : myCompanyId },
					success: function (response) {					
						if (response.result) {
							var isDone = 0;							
							response.list.forEach(function(element){
								if (element.isDone) isDone++;
							});							
							if (response.list.length) {
								if (response.list.length == isDone) location.href = 'field_detail.php?key='+siteId+'&site_name='+encodeURIComponent(siteName)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&myCompanyId='+encodeURIComponent(myCompanyId);
								else location.href = 'safety_request.php?key='+siteId+'&site_name='+encodeURIComponent(siteName)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&myCompanyId='+encodeURIComponent(myCompanyId);
							} else {
								alert(_lc['alert']['작성할안전문서가없습니다']);
							}
						} else {
							if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
						}
					},
					error: function (request, status, error) {
						alert(request+' '+status+' '+error);
					}
				});
			}
		}
	}
})();

//QR인증 선택 이벤트
$('#qr_btn').on('click', function () {
	location.href = 'qrscan.php';
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	location.href = 'field_list_add.php';
});

$(document).ready(function () {
	field_list.get_list();
});