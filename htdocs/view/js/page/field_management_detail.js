var rows = 20;
var total_page = 0;
var page = 1;
var table_list = [];
var ownerName = contractorName = '';

var field_management_detail = (function () {
  
	return {
		get_info: function () {
			var json = JSON.parse(decodeURIComponent($('#json').val().replace(/'/gi, '"')));
			console.log(json);
			
			$('#site_name').val(json.siteName);
			$('#start_date').val(json.startDate.substring(0, 10));
			$('#end_date').val(json.endDate.substring(0, 10));
			$('#site_status').val(json.status.toString()).prop('selected', true);
			$('#addr').val(json.addr);
			ownerName			 = json.ownerName;
			contractorName		 = json.contractorName;
			
			field_management_detail.get_owner();
		},
		
		get_owner: function () {
			var site_code = $('#site_code').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_owner' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							site = response.list;
							console.log(site);
							
							var html = owner_html = contractor_html = '';
							
							response.list.forEach(function(element, index){
								/*businessId: "1201212222"
									createdAt: "2021-09-16T14:53:23.000Z"
									id: 1
									memo: null
									name: "한국도로공사"
									phone: "023331111"
									updatedAt: "2021-09-16T14:53:23.000Z"
								updatedAt: "2021-09-16T14:53:23.000Z"*/
								if (site_code) {
									if (element.name == ownerName) owner_html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
									else owner_html += '<option value="'+element.id+'">'+element.name+'</option>';
									
									if (element.name == contractorName) contractor_html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
									else contractor_html += '<option value="'+element.id+'">'+element.name+'</option>';
									
									/*var no = (page - 1) * rows + (index + 1);
									var imsi = {
										"businessId" : element.businessId,
										"id" : element.id,
										"name" : element.name
									}
									table_list.push(imsi);
									
									html += '<tr>';
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="check_'+element.id+'">';
									html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
									html += '	<td>'+no+'</td>';
									html += '	<td style="text-align:left;">'+element.name+'</td>';
									html += '	<td>'+element.businessId+'</td>';
									html += '</tr>';*/
								} else {
									owner_html += '<option value="'+element.id+'">'+element.name+'</option>';
									contractor_html += '<option value="'+element.id+'">'+element.name+'</option>';
								}
							});
							
							$('#owner').append(owner_html);
							$('#contractor').append(contractor_html);
							
							//$('#tbody_list').append(html);
							
							if (site_code) {
								field_management_detail.get_list();
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
		
		get_list: function (link_page=0) {
			if (link_page) page = link_page;

			var site_code = $('#site_code').val();
			
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'siteId' : site_code, 'page': page },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							table_list = [];
							
							response.list.forEach(function(element, index){
								/*businessId: "1441244444"
									id: 2
									name: "수자원공사"*/
								
								var no = index + 1 + ((page - 1) * 20);
								var imsi = {
									"businessId" : element.businessId,
									"id" : element.id,
									"name" : element.name
								}
								table_list.push(imsi);
								
								html += '<tr>';
								if (LEVEL == 0) {
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="check_'+element.id+'">';
									html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
								} else {
									html += '	<td></td>';
								}
								html += '	<td>'+no+'</td>';
								html += '	<td style="text-align:left;">'+element.name+'</td>';
								html += '	<td>'+element.businessId+'</td>';
								html += '</tr>';
							});
							
							console.log(table_list);

									
						total_page = Math.ceil(response.totCnt / rows);
						
						// $('.paging').html(paging(10, page, total_page, 'field_management_detail.get_list'));

						} else {
							if (LEVEL == 0) html += '<tr><td colspan="4" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
							else html += '<tr><td colspan="3" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
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
		},
		
		modal_close: function () {
			$('#company_name').val('');
			$('#search_list').empty();
			
			popClose('viewEduList');
		},
		
		add_company: function () {
			var site_name	 = $('#site_name').val();
			var site_code	 = $('#site_code').val();
			var start_date	 = $('#start_date').val();
			var end_date	 = $('#end_date').val();
			var site_status	 = $('#site_status option:selected').val();
			var owner		 = $('#owner option:selected').val();
			var contractor	 = $('#contractor option:selected').val();
			var addr		 = $('#addr').val();
			
			var joinCompany = '';
			
			$('#tbody_list .check').each(function(){
				var id = Number($(this).val());
				var filter_data = table_list.filter(function(item) { return item.id === id; });
				
				if (joinCompany) joinCompany += ',';
				joinCompany += id;
			});
			
			$('#search_list .check:checked').each(function(){
				var id = $(this).val();
				
				if (joinCompany) joinCompany += ',';
				joinCompany += id;
			});
			
			//console.log(joinCompany);
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'add_company', 'joinCompany' : joinCompany, 'site_name' : site_name, 'site_code' : site_code, 'start_date' : start_date, 'end_date' : end_date, 'site_status' : site_status, 'owner' : owner, 'contractor' : contractor, 'addr' : addr },
				success: function (response) {
					if (response.result) {
						field_management_detail.modal_close();
						field_management_detail.get_list();
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
		
		select_delete: function () {
			var site_name	 = $('#site_name').val();
			var site_code	 = $('#site_code').val();
			var start_date	 = $('#start_date').val();
			var end_date	 = $('#end_date').val();
			var site_status	 = $('#site_status option:selected').val();
			var owner		 = $('#owner option:selected').val();
			var contractor	 = $('#contractor option:selected').val();
			var addr		 = $('#addr').val();
			
			var joinCompany = '';
			
			$('#tbody_list .check').each(function(){
				if (!$(this).is(':checked')) {
					var id = $(this).val();
					
					if (joinCompany) joinCompany += ',';
					joinCompany += id;
				}
			});
			
			//console.log(joinCompany);
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'add_company', 'joinCompany' : joinCompany, 'site_name' : site_name, 'site_code' : site_code, 'start_date' : start_date, 'end_date' : end_date, 'site_status' : site_status, 'owner' : owner, 'contractor' : contractor, 'addr' : addr },
				success: function (response) {
					if (response.result) {
						popClose('alertDelete');
						field_management_detail.get_list();
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

//협력사 검색 이벤트
$('#search_form').on('submit', function() {
	if (LEVEL == 0) {
		var company_name = $('#company_name').val();
		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/field_management_detail.php',
			dataType: 'json',
			cache: false,
			data: { 'module' : 'search_company', 'company_name' : company_name },
			success : function(response) {
				stop_progress();
				//console.log(response);
				
				if (response.result) {
					var html = '';
					
					if (response.list.length) {
						response.list.forEach(function(element, index){
							var filter_data = table_list.filter(function(item) { return item.id === element.id; });
							
							if (!filter_data.length) {
								if (company_name) {
									if (element.name.indexOf(company_name) != -1) {
										html += '<tr>';
										html += '	<td>';
										html += '		<div class="inp-wrap">';
										html += '			<div class="inp-item">';
										html += '				<label for="check_'+element.id+'">';
										html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'">';
										html += '					<p></p>';
										html += '				</label>';
										html += '			</div>';
										html += '		</div>';
										html += '	</td>';
										html += '	<td style="text-align:left;">'+element.name+'</td>';
										html += '	<td>'+element.businessId+'</td>';
										html += '</tr>';
									}
								} else {
									html += '<tr>';
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="check_'+element.id+'">';
									html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
									html += '	<td style="text-align:left;">'+element.name+'</td>';
									html += '	<td>'+element.businessId+'</td>';
									html += '</tr>';
								}
							}
						});
						
						console.log(table_list);
					} else {
						html += '<tr><td colspan="3" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
					}
					
					$('#search_list').append(html);
				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			},
			error: function(request, status, error){
				stop_progress();
				alert(request+' '+status+' '+error);
			}	
		});
	}
	
	return false;
});

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());
	popClose('viewCalendar');
});

//이전으로 이벤트
$('#back_btn').on('click', function () {
	location.href = 'field_management.php';
});

//취소 이벤트
$('#cancel_btn').on('click', function () {
	field_management_detail.modal_close();
});

//협력사 추가 이벤트
$('#add_run_btn').on('click', function () {
	field_management_detail.add_company();
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	popOpenAndDim('viewEduList', true);
});

//삭제 선택 이벤트
$('#delete_btn').on('click', function () {
	var check_cnt = $('#tbody_list').find('input[type="checkbox"]:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		popOpenAndDim('select_alert', true);
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	field_management_detail.select_delete();
});

//현장 저장 이벤트
$('#add_form').on('submit', function() {
	if (LEVEL == 0) {
		var site_name		 = $('#site_name').val();
		var site_code		 = $('#site_code').val();
		var start_date		 = $('#start_date').val();
		var end_date		 = $('#end_date').val();
		var site_status		 = $('#site_status option:selected').val();
		var owner			 = $('#owner option:selected').val();
		var owner_name		 = $('#owner option:selected').text();
		var contractor		 = $('#contractor option:selected').val();
		var contractor_name	 = $('#contractor option:selected').text();
		var addr			 = $('#addr').val();
		var joinCompany		 = '';
		
		if (owner == contractor) {
			alert('발주처와 시공사가 같을 수 없습니다.');
			return false;
		}
		if (start_date && end_date) {
			var sdate = new Date(start_date);
			var edate = new Date(end_date);
			
			if (sdate > edate) {
				alert('날짜를 확인하여 주세요.');
				return false;
			}
		}
		
		$('#tbody_list .check').each(function(){
			var id = Number($(this).val());
			var filter_data = table_list.filter(function(item) { return item.id === id; });
			
			if (joinCompany) joinCompany += ',';
			joinCompany += id;
		});
		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/field_management_detail.php',
			dataType: 'json',
			cache: false,
			data: { 'module' : 'add_form', 'site_name' : site_name, 'site_code' : site_code, 'start_date' : start_date, 'end_date' : end_date, 'site_status' : site_status, 'owner' : owner, 'contractor' : contractor, 'addr' : addr, 'joinCompany' : joinCompany },
			success : function(response) {
				stop_progress();
				//console.log(response);
				
				if (response.result) {
					if (site_code) {
						var url = location.href;
					} else {
						/*addr: "sdvwergve"
						contractor: 7
						createdAt: "2021-10-12T23:38:08.000Z"
						deletedAt: null
						endDate: "2021-10-01T00:00:00.000Z"
						id: 1582607072
						joinCompany: [{memo: "", comId: ""}]
						name: "hgrttrytr"
						owner: 4
						startDate: "2020-10-01T00:00:00.000Z"
						status: 0
						updatedAt: "2021-10-12T23:38:08.000Z"*/
						
						var imsi = {
							"addr" : addr,
							"contractorName" : contractor_name,
							"endDate" : end_date,
							"ownerName" : owner_name,
							"siteId" : response.info.id,
							"siteName" : site_name,
							"startDate" : start_date,
							"status" : site_status
						}
						
						var string = encodeURIComponent(JSON.stringify(imsi).replace(/"/gi, "'"));
						
						var url = 'field_management_detail.php?key='+response.info.id+'&json='+string;
					}
					
					location.replace(url);
				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			},
			error: function(request, status, error){
				stop_progress();
				alert(request+' '+status+' '+error);
			}	
		});
	}
	
	return false;
});

$(document).ready(function () {
	var json = $('#json').val();
	
	if (json) field_management_detail.get_info(); else field_management_detail.get_owner();
});