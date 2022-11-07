var rows = 20;
var total_page = 0;
var page = 1;
var table_list = [];

var manager_management = (function () {
  
	return {		
		get_list: function (link_page=0) {
			if (link_page) page = link_page;
			
			var site_name	 = $('#site_name').val();
			var owner		 = $('#owner').val();
			var contractor	 = $('#contractor').val();
			var company_name = $('#company_name').val();
			var name		 = $('#name').val();
			var phone		 = $('#phone').val();
			var level		 = $('#level option:selected').val();
			
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/manager_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'site_name' : site_name, 'owner' : owner, 'contractor' : contractor, 'company_name' : company_name, 'name' : name, 'phone' : phone.replace(/[^0-9]/g, ''), 'level' : level },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						var no = response.totCnt-(20*(page-1));
						if (response.list.length) {
							table_list = [];
							
							response.list.forEach(function(element, index){
								/*accId: 1
									contractor: "삼성물산"
									endDate: ""
									level: 0
									myCompany: "수자원공사"
									name: "test"
									owner: "서울시"
									phone1: "01023778152"
									siteId: 1212055764
									siteName: "공덕역B공구"
									startDate: ""
									status: 1
									userId: "test"*/
									
								if (element.startDate == null) element.startDate = '';
								if (element.endDate == null) element.endDate = '';
								
								if (element.level == 0) {
									var level = '슈퍼 관리자';
								} else if (element.level == 1) {
									var level = '호스트 관리자';
								} else {
									var level = '일반 관리자';
								}
								
								html += '<tr>';
								
								if (LEVEL == 0 || LEVEL == 1) {
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="cate_check_'+element.userId+'">';
									html += '					<input type="checkbox" id="cate_check_'+element.userId+'" class="check" value="'+element.userId+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
									
									var html_code = 'onclick="manager_management.detail('+element.accId+');" style="cursor:pointer;"';
								} else {
									html += '	<td></td>';
									var html_code = 'onclick="alert(\'권한이 없습니다.\');" style="cursor:pointer;"';
								}
								
								//var no = (page - 1) * rows + (index + 1);
								var imsi = {
									"accId" : element.accId,
									"contractor" : element.contractor,
									"endDate" : element.endDate,
									"level" : element.level,
									"myCompany" : element.myCompany,
									"name" : element.name,
									"owner" : element.owner,
									"phone1" : element.phone1,
									"siteId" : element.siteId,
									"siteName" : element.siteName,
									"startDate" : element.startDate,
									"status" : element.status,
									"userId" : element.userId
								}
								table_list.push(imsi);
									
								html += '	<td '+html_code+'>'+no+'</td>';
								html += '	<td '+html_code+'>'+element.siteName+'</td>';
								html += '	<td '+html_code+'>'+element.owner+'</td>';
								html += '	<td '+html_code+'>'+element.contractor+'</td>';
								html += '	<td '+html_code+'>'+element.myCompany+'</td>';
								html += '	<td '+html_code+'>'+element.userId+'</td>';
								html += '	<td '+html_code+'">'+element.name+'</td>';
								html += '	<td '+html_code+'>'+element.phone1+'</td>';
								html += '	<td '+html_code+'>'+level+'</td>';
								html += '</tr>';
								no--;
							});
							
							console.log(table_list);
						} else {
							html += '<tr><td colspan="10" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'manager_management.get_list'));
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
		
		detail: function (accId) {
			location.href = 'manager_management_detail.php?key='+accId;
		}, 
		
		select_delete: function () {
			var select_list_str = '';
			
			$('#tbody_list .check:checked').each(function(){
				var id = ($(this).val());
				var filter_data = table_list.filter(function(item) { return item.userId === id; });
				
				if (select_list_str) select_list_str += ',';
				select_list_str += filter_data[0].accId;
			});
			
			//console.log(select_list_str);
			
			$.ajax({
				type: 'POST',
				url: '/controller/manager_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'select_delete', 'select_list_str' : select_list_str },
				success: function (response) {
					if (response.result) {
						popClose('alertDelete');
						manager_management.get_list();
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

//검색 이벤트
$('#search_form').on('submit', function () {
	manager_management.get_list();
	
	return false;
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	location.href = 'manager_management_detail.php';
});

//삭제 선택 이벤트
$('#delete_btn').on('click', function () {
	var check_cnt = $('#tbody_list .check:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		popOpenAndDim('select_alert', true);
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	manager_management.select_delete();
});

$(document).ready(function () {
	manager_management.get_list();
});