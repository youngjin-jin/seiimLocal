var table_list = [];
var old_table_list = '';

var manager_management_detail = (function () {
  
	return {
		get_list: function () {
			var update_id = $('#update_id').val();
			
			table_list = [];
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/manager_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'update_id' : update_id },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						$('#name').val(response.info.userInfo.name);
						$('#id').val(response.info.userInfo.userId);
						$('#level').val(response.info.userInfo.level).prop('selected', true);
						$('#phone').val(autoHypenPhone(response.info.userInfo.phone1));
						
						response.info.siteList.forEach(function(element, index){
							var imsi = {
								"contractor" : element.contractor,
								"myCompany" : element.myCompany,
								"myCompanyId" : element.myCompanyId,
								"owner" : element.owner,
								"siteId" : element.siteId,
								"siteName" : element.siteName,
								"createdAt": element.createdAt,
								"deletedAt": element.deletedAt,
								"company_list" : element.company_list
							}
							table_list.push(imsi);
						});
						
						old_table_list = JSON.stringify(table_list);
						manager_management_detail.draw_table();
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
		
		draw_table: function () {
			$('#tbody_list').empty();
			var html = '';
			
			if (table_list.length) {
				table_list.forEach(function(element, index){
					/*contractor: "삼성물산"
						createdAt: "2021-09-29T13:11:10.000Z"
						deletedAt: null
						myCompany: "수자원공사",
						myCompanyId: 3,
						owner: "서울시"
						siteId: 1212055764
						siteName: "공덕역B공구"
						status: 1*/
					
					var no = index + 1;
					
					if (element.createdAt == null) var createdAt = '-'; else var createdAt = element.createdAt;
					if (element.deletedAt == null) var deletedAt = '-'; else var deletedAt = element.deletedAt;
					
					html += '<tr>';
					if (LEVEL == 0 || LEVEL == 1) {
						html += '	<td>';
						html += '		<div class="inp-wrap">';
						html += '			<div class="inp-item">';
						html += '				<label for="check_'+index+'">';
						html += '					<input type="checkbox" id="check_'+index+'" class="check" value="'+index+'">';
						html += '					<p></p>';
						html += '				</label>';
						html += '			</div>';
						html += '		</div>';
						html += '	</td>';
					} else {
						html += '	<td></td>';
					}
					
					var myCompany = '<div class="inp-item"><select id="select_'+index+'">';
					
					element.company_list.forEach(function(item){
						if (element.myCompanyId && element.myCompanyId == item.id) myCompany += '<option value="'+item.id+'" selected>'+item.name+'</option>';
						else myCompany += '<option value="'+item.id+'">'+item.name+'</option>';
					});
					
					myCompany += '</select></div>';
					
					html += '	<td>'+no+'</td>';
					html += '	<td>'+element.siteName+'</td>';
					html += '	<td>'+element.owner+'</td>';
					html += '	<td>'+element.contractor+'</td>';
					html += '	<td>'+myCompany+'</td>';
					html += '	<td>'+createdAt.substring(0, 10)+'</td>';
					html += '	<td>'+deletedAt.substring(0, 10)+'</td>';
					html += '</tr>';
				});
			} else {
				if (LEVEL == 0) html += '<tr><td colspan="8" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
				else html += '<tr><td colspan="7" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
			}
			
			$('#tbody_list').append(html);			
			console.log(table_list);
		},
		
		modal_close: function () {
			$('#site_name').val('');
			$('#site_list').empty();
			
			popClose('alertAddField');
		},
		
		add_site: function () {
			var update_id = $('#update_id').val();
			
			if ($('#site_list .check:checked').length) {
				var contractor	 = $('#site_list .check:checked').attr('contractor');
				//var myCompanyId	 = $('#site_list .check:checked').attr('myCompanyId');
				//var myCompany	 = $('#site_list .check:checked').attr('myCompany');
				var owner		 = $('#site_list .check:checked').attr('owner');
				var siteId		 = Number($('#site_list .check:checked').attr('siteId'));
				var siteName	 = $('#site_list .check:checked').attr('siteName');
				
				//console.log(contractor, myCompany, myCompanyId, owner, siteId, siteName);
				
				var filter_data = table_list.filter(function(item) { return item.siteId == siteId; });
		
				//console.log(filter_data);

				if (filter_data.length) {
					alert('이미 추가된 현장입니다.');
				} else {
					$.ajax({
						type: 'POST',
						url: '/controller/manager_management_detail.php',
						dataType: 'json',
						cache: false,
						data: { 'module' : 'get_company_list', 'siteId' : siteId },
						success: function (response) {
							stop_progress();
							console.log(response);
							
							if (response.result) {
								if (response.list == null) response.list = [];
								
								var company_list = response.list;
								
								var imsi = {
									"contractor" : contractor,
									//"myCompany" : myCompany,
									//"myCompanyId" : myCompanyId,
									"owner" : owner,
									"siteId" : siteId,
									"siteName" : siteName,
									"createdAt" : null,
									"deletedAt" : null,
									"company_list" : company_list,
									"myCompanyId" : null
								}
								table_list.push(imsi);
								
								manager_management_detail.modal_close();
								manager_management_detail.draw_table();
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
			} else {
				alert('현장을 선택하세요.');
			}
		},
		
		select_delete: function () {
			var update_id = $('#update_id').val();
			
			if (update_id) {
				var ajax_result = false;
				
				$('#tbody_list .check:checked').each(function(){
					var index = $(this).val();
					
					if (table_list[index].createdAt == null) {					
						$(this).parent().parent().parent().parent().parent().remove();
					} else {
						if (table_list[index].deletedAt == null) {
							var siteId = table_list[index].siteId;
							
							$.ajax({
								type: 'POST',
								url: '/controller/manager_management_detail.php',
								dataType: 'json',
								cache: false,
								data: { 'module' : 'select_delete', 'accId' : update_id, 'siteId' : siteId, 'myCompany': $(`#select_${index}`).val() },
								success: function (response) {
									console.log(response);
									
									if (response.result) {
										ajax_result = true;
									} else {
										if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
									}
								},
								error: function (request, status, error) {
									alert(request+' '+status+' '+error);
								}
							});
						} else {
							alert(table_list[index].siteName+'은(는) 이미 이탈한 현장입니다.');
						}
					}
				});
				
				popClose('alertDelete');
				manager_management_detail.get_list();
			} else {
				$('#tbody_list .check:checked').each(function(){
					$(this).parent().parent().parent().parent().parent().remove();
				});
				
				var imsi = [];
				
				$('#tbody_list .check').each(function(){
					var index = $(this).val();
					
					imsi.push(table_list[index]);
				});
				
				table_list = imsi;
				//console.log(table_list);
				
				popClose('alertDelete');
				manager_management_detail.draw_table();
			}
		},
		
		temp_pass: function () {
			var user_id = $('#id').val();
			
			if (user_id) {
				run_progress();
				
				$.ajax({
					type: 'POST',
					url: '/controller/login.php',
					dataType: 'json',
					cache: false,
					data: { 'module' : 'temp_pass', 'user_id' : user_id },
					success: function (response) {
						stop_progress();
						console.log(response);
						
						if (response.result) {
							popClose('alertTemporaryPw');
						} else {
							if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
						}
					},
					error: function (request, status, error) {
						stop_progress();
						alert(request+' '+status+' '+error);
					}
				});
			} else {
				alert('ID가 없습니다.');
				popClose('alertTemporaryPw');
			}
		}
	}
})();

//현장 검색 이벤트
$('#search_form').on('submit', function() {
	var site_name = $('#site_name').val();
	
	$('#site_list').empty();
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/manager_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'search_site', 'site_name' : site_name },
		success : function(response) {
			stop_progress();
			console.log(response);
			
			if (response.result) {
				var html = '';
				
				if (response.list.length) {
					response.list.forEach(function(element, index){
						/*contractor: "삼성물산"
							myCompany: "수자원공사"
							myCompanyId: 2
							owner: "서울시"
							siteId: 1212055764
							siteName: "공덕역B공구"
							status: 1*/
						//if (element.myCompanyId) {
							html += '<tr>';
							html += '	<td>';
							html += '		<div class="inp-wrap">';
							html += '			<div class="inp-item">';
							html += '				<label for="site_list_check_'+index+'">';
							html += '					<input type="radio" id="site_list_check_'+index+'" name="check_radio" class="check" value="'+index+'" contractor="'+element.contractor+'" owner="'+element.owner+'" siteId="'+element.siteId+'" siteName="'+element.siteName+'">';
							html += '					<p></p>';
							html += '				</label>';
							html += '			</div>';
							html += '		</div>';
							html += '	</td>';
							html += '	<td style="text-align:left;">'+element.siteName+'</td>';
							html += '	<td>'+element.owner+'</td>';
							html += '	<td>'+element.contractor+'</td>';
							//html += '	<td>'+element.myCompany+'</td>';
							html += '</tr>';
						//}
					});
				} else {
					html += '<tr><td colspan="5" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
				}
				
				$('#site_list').append(html);
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

//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//취소 이벤트
$('#cancel_btn').on('click', function () {
	manager_management_detail.modal_close();
});

//협력사 추가 이벤트
$('#add_run_btn').on('click', function () {
	manager_management_detail.add_site();
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	var level = $('#level option:selected').val();
	
	if (level == '0') {
		alert('슈퍼 관리자는 현장을 추가하실수 없습니다.');
		return false;
	} else {
		popOpenAndDim('alertAddField', true);
	}
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
	manager_management_detail.select_delete();
});

//관리자 저장 이벤트
$('#add_form').on('submit', function() {
	var update_id	 = $('#update_id').val();
	var name		 = $('#name').val();
	var id			 = $('#id').val();
	var level		 = $('#level option:selected').val();
	var phone		 = $('#phone').val();
	var siteList	 = '';
	
	if (!update_id) {
		if (level == '0') {
			if (table_list.length) {
				alert('슈퍼 관리자는 현장을 추가하실수 없습니다.');
				return false;
			}
		} else {
			if (!table_list.length) {
				alert('현장을 추가하신 후 시도해 주십시오.');
				return false;
			}
		}
	}
	
	var imsi = [];
	
	table_list.forEach(function(element, index){
		var myCompanyId = $('#select_'+index+' option:selected').val();
		imsi.push({ "siteId" : element.siteId, "myCompanyId" : parseInt(myCompanyId) });
	});
	
	siteList = JSON.stringify(imsi);
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/manager_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'update_id' : update_id, 'name' : name, 'id' : id, 'level' : level, 'phone' : phone.replace(/[^0-9]/g, ''), 'siteList' : siteList },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				location.href = document.referrer;
			} else {
				//popOpenAndDim('alertCheckBelong', true);
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

$(document).ready(function () {
	var update_id = $('#update_id').val();
	
	if (update_id) manager_management_detail.get_list();
});