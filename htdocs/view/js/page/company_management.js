var rows = 20;
var total_page = 0;
var page = 1;
var table_list = [];

var company_management = (function () {
  
	return {
		get_list: function (link_page=0) {
			if (link_page) page = link_page;
			
			var company_name = $('#company_name').val();
			
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/company_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'company_name' : company_name },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						var no = response.totCnt-(20*(page-1));
						if (response.list.length) {
							table_list = [];
							
							response.list.forEach(function(element, index){
								/*businessId: "1441244444"
									comType: 2
									id: 2
									memo: "말단업체"
									name: "수자원공사"
									siteId: 1212055764
									siteName: "공덕역B공구"*/
								
								//var no = (page - 1) * rows + (index + 1);
								var imsi = {
									"businessId" : element.businessId,
									"id" : element.id,
									"name" : element.name
								}
								table_list.push(imsi);
								
								if (element.comType == 0) var type = '발주처';
								else if (element.comType == 1) var type = '시공사';
								else var type = '협력사';
								
								html += '<tr>';
								html += '	<td>';
								html += '		<div class="inp-wrap">';
								html += '			<div class="inp-item">';
								html += '				<label for="check_'+element.id+'">';
								html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'" count="'+element.cat2Cnt+'">';
								html += '					<p></p>';
								html += '				</label>';
								html += '			</div>';
								html += '		</div>';
								html += '	</td>';
								html += '	<td onclick="company_management.edit_mode('+element.id+');" style="cursor:pointer;">'+no+'</td>';
								html += '	<td onclick="company_management.edit_mode('+element.id+');" style="cursor:pointer;text-align:left;">'+element.name+'</td>';
								html += '	<td onclick="company_management.edit_mode('+element.id+');" style="cursor:pointer;">'+element.businessId+'</td>';
								html += '	<td><a href="javascript:company_management.detail('+element.id+', \''+element.name+'\', \''+element.businessId+'\');" style="font-size:12px;text-decoration:underline;">현장보기</a></td>';
								html += '</tr>';
								no--;
							});
							
							console.log(table_list);
						} else {
							html += '<tr><td colspan="4" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'company_management.get_list'));
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
		
		edit_mode: function (id) {
			var filter_data = table_list.filter(function(item) { return item.id === id; });
		
			console.log(filter_data);

			if (filter_data.length) {
				$('#add_form_update_id').val(filter_data[0].id);
				$('#add_form_company_name').val(filter_data[0].name);
				$('#add_form_company_number').val(filter_data[0].businessId);
				
				$('#add_form .mb35').text('업체 수정');
				popOpenAndDim('addCompany', true);
			} else {
				alert('수정 정보를 불러오지 못했습니다.');
			}
		}, 
		
		detail: function (id, name, businessId) {
			location.href = 'company_management_detail.php?key='+id+'&name='+encodeURIComponent(name)+'&businessId='+businessId;
		}, 
		
		modal_close: function () {
			$('#add_form .mb35').text('업체 추가');
			$('#add_form_update_id').val('');
			$('#add_form_company_name').val('');
			$('#add_form_company_number').val('');
			
			popClose('addCompany');
		}, 
		
		select_delete: function () {
			var select_list_str = '';
			var select_list = [];
			
			$('#tbody_list .check:checked').each(function(){
				var id = Number($(this).val());
				var filter_data = table_list.filter(function(item) { return item.id === id; });
				select_list.push(filter_data[0]);
				
				if (select_list_str) select_list_str += ',';
				select_list_str += id;
			});
			
			//console.log(select_list_str, select_list);
			
			var result = true;
			
			select_list.forEach(function(element){
				if (element.certCnt > 0) {
					alert(element.name+' 사용중으로 삭제가 불가능 합니다.');
					result = false;
				}
			});
			
			if (result) {
				$.ajax({
					type: 'POST',
					url: '/controller/company_management.php',
					dataType: 'json',
					cache: false,
					data: { 'module' : 'select_delete', 'select_list_str' : select_list_str },
					success: function (response) {
						if (response.result) {
							popClose('alertDelete');
							company_management.get_list();
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
	}
})();

//취소 이벤트
$('#cancel_btn').on('click', function () {
	company_management.modal_close();
});

//업체 클릭 이벤트
$('.detail_link').on('click', function () {
	var company_key = $(this).attr('key');
	
	location.href = 'company_management_detail.php?company_key='+company_key;
});

//검색 이벤트
$('#search_btn').on('click', function () {
	company_management.get_list();
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	popOpenAndDim('addCompany', true);
});

//수정 선택 이벤트
$('#edit_btn').on('click', function () {
	popOpenAndDim('editCompany', true);
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
	company_management.select_delete();
});

//업체 추가 모달 저장 이벤트
$('#add_form').on('submit', function() {
	var update_id		 = $('#add_form_update_id').val();
	var company_name	 = $('#add_form_company_name').val();
	var company_number	 = $('#add_form_company_number').val();
	
	//console.log(company_name, company_number, site, note);
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/company_management.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'update_id' : update_id, 'company_name' : company_name, 'company_number' : company_number },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				company_management.modal_close();
				company_management.get_list();
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

$(document).ready(function () {
	company_management.get_list();
});