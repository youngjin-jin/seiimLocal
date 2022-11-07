var safety_list = (function () {
  
	return {
		get_list: function () {
			var key			 = $('#key').val();
			var site_name	 = $('#site_name').val();
			var myCompanyId	 = $('#myCompanyId').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/safety_request.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_count', 'key' : key, 'myCompanyId' : myCompanyId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*createdAt: "2021-10-22T14:40:27.000Z"
								docType: 0
								id: 1
								isDone: false
								name: "안전수칙준수 서약서"
								siteId: 1212055764
								templateType: 1
								updatedAt: "2021-10-22T14:40:28.000Z"*/
								//0:동의서, 1: 질의응답, 2:기초테스트
							
								if (element.docType == 0) var docType = _lc['txt']['동의서']; else if (element.docType == 1) var docType = _lc['txt']['질의응답']; else var docType = _lc['txt']['기초테스트'];
								if (element.isDone) {
									var bg = '';
									var status = _lc['txt']['작성'];
									var link = ' onclick="safety_list.modify('+$('#key').val()+', \''+$('#site_name').val()+'\', '+element.id+', '+element.templateType+', '+myCompanyId+');"';
									var txt_class = 'on';
									var txt = '작성완료';
								} else {
									var bg = 'bg-grapefruit';
									var status = _lc['txt']['미작성'];
									var link = ' onclick="safety_list.detail('+$('#key').val()+', \''+$('#site_name').val()+'\', '+element.id+', '+element.templateType+', '+myCompanyId+');"';
									var txt_class = 'off';
									var txt = 'Click';
								}
								
								html += '<li '+link+'>';
								html += '	<div class="list-head '+bg+'">';
								html += '		<p class="tit">'+element.name+'</p>';
								html += '		<span class="txt '+txt_class+'">'+txt+'</span>';
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
								html += '						<th>'+_lc['txt']['유형']+'</th>';
								html += '						<td>'+docType+'</td>';
								html += '					</tr>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['작성현황']+'</th>';
								html += '						<td>'+status+'</td>';
								html += '					</tr>';
								html += '				</tbody>';
								html += '			</table>';
								html += '		</div>';
								html += '	</div>';
								html += '</li>';
							
							});
							
							$('#ul_list').append(html);

							if (response.list.length > 0 && response.list.filter(function(item) { return item.isDone == true; }).length == response.list.length) {
								var key			 = $('#key').val();
								var site_name	 = $('#site_name').val();
								var owner		 = $('#owner').val();
								var contractor	 = $('#contractor').val();
								var myCompany	 = $('#myCompany').val();
								var readFlag =$("#readFlag").val();
								if(!readFlag)
								{
									location.href = 'field_detail.php?key='+key+'&site_name='+encodeURIComponent(site_name)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany)+'&myCompanyId='+encodeURIComponent(myCompanyId);
								}
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
		detail: function (siteId, siteName, docId, templateType, myCompanyId) {
			location.href = 'safety_write.php?key='+siteId+'&site_name='+encodeURIComponent(siteName)+'&docId='+docId+'&templateType='+templateType+'&myCompanyId='+myCompanyId;
		},
		modify: function (siteId, siteName, docId, templateType, myCompanyId) {
			location.href = 'safety_modify.php?key='+siteId+'&site_name='+encodeURIComponent(siteName)+'&docId='+docId+'&templateType='+templateType+'&myCompanyId='+myCompanyId;
		}
	}
})();

//이전으로 이벤트
$('#back_btn').on('click', function () {
	/*
	if($("#readFlag").val())
	{
		location.replace("https://staging-m.saiifedu.com/view/user/mobile/html/field_detail.php?key="+$("#key").val()+"&site_name="+$("#site_name").val()+"&owner="+$("#owner").val()+"&contractor="+$("#contractor").val()+"&myCompany="+$("#myCompany").val()+"&myCompanyId="+$("#myCompanyId").val())		
	}
	else
	{
		location.replace("https://staging-m.saiifedu.com/view/user/mobile/html/safety_request.php?key="+$("#key").val()+"&site_name="+$("#site_name").val()+"&owner="+$("#owner").val()+"&contractor="+$("#contractor").val()+"&myCompany="+$("#myCompany").val()+"&myCompanyId="+$("#myCompanyId").val())
	}
	*/
	history.back();
});

$(document).ready(function () {
	safety_list.get_list();
});