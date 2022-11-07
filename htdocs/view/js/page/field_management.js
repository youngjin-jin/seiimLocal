var rows = 20;
var total_page = 0;
var page = 1;
var table_list = [];

var field_management = (function () {
  
	return {
		get_list: function (link_page=0) {
			if (link_page) page = link_page;
			
			var site_name	 = $('#site_name').val();
			var site_status	 = $('#site_status option:selected').val();
			var owner		 = $('#owner').val();
			var contractor	 = $('#contractor').val();
			var start_date	 = $('#start_date').val();
			var end_date	 = $('#end_date').val();
			
			if (start_date && end_date) {
				var tdate = new Date();
				var sdate = new Date(start_date);
				var edate = new Date(end_date);
				
				if (sdate > edate) {
					alert('날짜를 확인하여 주세요.');
					return false;
				}
				if (tdate < sdate) {
					alert('날짜를 확인하여 주세요.');
					return false;
				}
			} else if (start_date) {
				var tdate = new Date();
				var sdate = new Date(start_date);
				
				if (tdate < sdate) {
					alert('날짜를 확인하여 주세요.');
					return false;
				}
			}
			
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'site_name' : site_name, 'site_status' : site_status, 'owner' : owner, 'contractor' : contractor, 'start_date' : start_date, 'end_date' : end_date },
				success: function (response) {
					stop_progress();
					console.log(response);
					var no = response.totCnt-(20*(page-1));
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							table_list = [];
							
							response.list.forEach(function(element, index){
								/*addr: "공덕역 1번길"
									contractorName: "삼성물산"
									endDate: "2021-09-24T13:21:27.000Z"
									ownerName: "한국도로공사"
									siteId: 1212055764
									siteName: "공덕역B공구"
									startDate: "2021-07-29T13:21:22.000Z"
									status: 1*/
									
								if (element.startDate == null) element.startDate = '';
								if (element.endDate == null) element.endDate = '';
								
								//var no = (page - 1) * rows + (index + 1);
								var imsi = {
									"addr" : element.addr,
									"contractorName" : element.contractorName,
									"endDate" : element.endDate,
									"ownerName" : element.ownerName,
									"siteId" : element.siteId,
									"siteName" : element.siteName,
									"startDate" : element.startDate,
									"status" : element.status
								}
								table_list.push(imsi);
								
								if (element.status == 0) {
									var status = '진행중';
								} else {
									var status = '종료';
								}
								
								html += '<tr>';
								if (LEVEL == 0) {
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="cate_check_'+element.siteId+'">';
									html += '					<input type="checkbox" id="cate_check_'+element.siteId+'" class="check" value="'+element.siteId+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
								} else {
									html += '	<td></td>';
								}
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+no+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+element.siteId+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;text-align:left;">'+element.siteName+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+element.ownerName+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+element.contractorName+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+status+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+element.startDate.substring(0, 10)+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;">'+element.endDate.substring(0, 10)+'</td>';
								html += '	<td onclick="field_management.detail('+element.siteId+');" style="cursor:pointer;text-align:left;">'+element.addr+'</td>';
								html += '</tr>';
								no--;
							});
							
							console.log(table_list);
						} else {
							html += '<tr><td colspan="10" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'field_management.get_list'));
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
		
		detail: function (siteId) {
			var filter_data = table_list.filter(function(item) { return item.siteId === siteId; });
			var string = encodeURIComponent(JSON.stringify(filter_data[0]).replace(/"/gi, "'"));
			
			location.href = 'field_management_detail.php?key='+siteId+'&json='+string;
		}, 
		
		select_delete: function () {
			var select_list_str = '';
			
			$('#tbody_list .check:checked').each(function(){
				var id = ($(this).val());
				var filter_data = table_list.filter(function(item) { return item.siteId === id; });
				
				if (select_list_str) select_list_str += ',';
				select_list_str += id;
			});
			
			//console.log(select_list_str);
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'select_delete', 'select_list_str' : select_list_str },
				success: function (response) {
					if (response.result) {
						popClose('alertDelete');
						field_management.get_list();
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

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());
	popClose('viewCalendar', true);
});

//검색 이벤트
$('#search_btn').on('click', function () {
	field_management.get_list();
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	location.href = 'field_management_detail.php';
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
	field_management.select_delete();
});

$(document).ready(function () {
	field_management.get_list();
});