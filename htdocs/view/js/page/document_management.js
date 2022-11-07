var rows = 20;
var total_page = 0;
var page = 1;

var document_management = (function () {
  
	return {
		get_query_site: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_query_site' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*addr: "공덕역 1번길"
								closeDate: "2021-10-13T18:10:57.000Z"
								contractor: 6
								createdAt: "2021-09-16T15:13:53.000Z"
								deletedAt: null
								endDate: "2021-09-24T00:00:00.000Z"
								id: 1212055764
								joinCompany: (3) [{…}, {…}, {…}]
								name: "공덕역B공구"
								owner: 4
								startDate: "2021-07-29T00:00:00.000Z"
								status: 1
								updatedAt: "2021-10-13T18:11:04.000Z"*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#siteId').append(html);
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
		
		get_template: function () {
			$('#templateId').html('<option value="0">전체템플릿</option>');

			var siteId = $('#siteId option:selected').val();

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/document_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_template', 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*addr: "공덕역 1번길"
								closeDate: "2021-10-13T18:10:57.000Z"
								contractor: 6
								createdAt: "2021-09-16T15:13:53.000Z"
								deletedAt: null
								endDate: "2021-09-24T00:00:00.000Z"
								id: 1212055764
								joinCompany: (3) [{…}, {…}, {…}]
								name: "공덕역B공구"
								owner: 4
								startDate: "2021-07-29T00:00:00.000Z"
								status: 1
								updatedAt: "2021-10-13T18:11:04.000Z"*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#templateId').append(html);
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
			
			var siteId			 = $('#siteId option:selected').val();
			var templateId		 = $('#templateId option:selected').val();
			var startDate		 = $('#startDate').val();
			var endDate			 = $('#endDate').val();
			var adminName		 = $('#adminName').val();
			var docName			 = $('#docName').val();
			
			if (startDate && endDate) {
				var tdate = new Date();
				var sdate = new Date(startDate);
				var edate = new Date(endDate);
				
				if (sdate > edate) {
					alert('날짜를 확인하여 주세요.');
					return false;
				}
				if (tdate < sdate) {
					alert('날짜를 확인하여 주세요.');
					return false;
				}
			} else if (startDate) {
				var tdate = new Date();
				var sdate = new Date(startDate);
				
				if (tdate < sdate) {
					alert('날짜를 확인하여 주세요.');
					return false;
				}
			}
			
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/document_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'siteId' : siteId, 'templateId' : templateId, 'startDate' : startDate, 'endDate' : endDate, 'adminName' : adminName, 'docName' : docName },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element, index){
								/*adminName: "test"
								cat1: 4
								catName: "신규채용자교육"
								createdAt: "2021-11-08T20:33:52.000Z"
								docDiv: 1
								docHashId: 2226203566
								docName: "콘크리트 파쇄 방법 교육"
								id: 1
								name: "공덕역B공구"
								siteId: 1212055764
								workerName: "아무개"*/
								
								var no = (page - 1) * rows + (index + 1);

								if (element.adminName == null) element.adminName = '';

								if (element.docDiv == 1) {
									var docDiv = '교육';
								} else {
									var docDiv = '근로자';
								}

								html += '<tr>';
								html += '	<td>';
								html += '		<div class="inp-wrap">';
								html += '			<div class="inp-item">';
								html += '				<label for="check_'+element.id+'">';
								html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'" docHashId="'+element.docHashId+'">';
								html += '					<p></p>';
								html += '				</label>';
								html += '			</div>';
								html += '		</div>';
								html += '	</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+no+'</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+element.name+'</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+docDiv+'</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+element.createdAt.substring(0, 10)+'</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+element.docName+'</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+element.adminName+'</td>';
								html += '	<td onclick="document_management.detail('+element.id+');" style="cursor:pointer;">'+element.workerName+'</td>';
								html += '</tr>';
							});
						} else {
							html += '<tr><td colspan="8" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'document_management.get_list'));
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
			location.href = 'document_management_detail.php?key='+id;
		}, 
		
		select_delete: function () {
			var count = 0;
			var select_list_str = '[';
			
			$('#tbody_list .check:checked').each(function(){
				var id			 = ($(this).val());
				var docHashId	 = ($(this).attr('docHashId'));

				if (count) select_list_str += ', ';
				select_list_str += '{ "docHashId" : '+docHashId+', "id" : '+id+' }';
				count++;
			});

			select_list_str += ']';
			
			//console.log(select_list_str);
			
			$.ajax({
				type: 'POST',
				url: '/controller/document_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'select_delete', 'select_list_str' : select_list_str },
				success: function (response) {
					if (response.result) {
						page = 1;

						document_management.get_list();

						popClose('alertDelete');
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

		get_print: function () {
			var select_list_str = '';
			
			$('#tbody_list .check:checked').each(function(){
				var id = ($(this).val());

				if (select_list_str) select_list_str += ',';
				select_list_str += id;
			});
			
			//console.log(select_list_str);

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/document_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_print', 'select_list_str' : select_list_str },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						/*if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*addr: "공덕역 1번길"
								closeDate: "2021-10-13T18:10:57.000Z"
								contractor: 6
								createdAt: "2021-09-16T15:13:53.000Z"
								deletedAt: null
								endDate: "2021-09-24T00:00:00.000Z"
								id: 1212055764
								joinCompany: (3) [{…}, {…}, {…}]
								name: "공덕역B공구"
								owner: 4
								startDate: "2021-07-29T00:00:00.000Z"
								status: 1
								updatedAt: "2021-10-13T18:11:04.000Z"*/

								/*html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#siteId').append(html);
						}*/
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
	}
})();

//인쇄 선택 이벤트
$('#print_btn').on('click', function () {
	var check_cnt = $('#tbody_list .check:checked').length;
	
	if (check_cnt) {
		var select_list_str = '';
		
		$('#tbody_list .check:checked').each(function(){
			var id = ($(this).val());

			if (select_list_str) select_list_str += ',';
			select_list_str += id;
		});

		print_win = window.open('/print.php?key='+select_list_str);
	} else {
		alert('인쇄할 문서를 선택하세요.');
	}
});

//창닫기
function close_print_win() {
	print_win.close();
	console.log('print_win_close');
}

//현장 선택 이벤트
$('#siteId').on('change', function () {
	page = 1;
	
	document_management.get_template();
	document_management.get_list();
});

//작성 이벤트
$('#write_btn').on('click', function () {
	location.href = 'document_management_detail.php';
});

//검색 이벤트
$('#search_form').on('submit', function () {
	page = 1;
	
	document_management.get_list();
	
	return false;
});

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());
	popClose('viewCalendar', true);
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	location.href = 'document_management_detail.php';
});

//삭제 선택 이벤트
$('#del_btn').on('click', function () {
	var check_cnt = $('#tbody_list .check:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		alert('삭제할 문서를 선택하세요.');
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	document_management.select_delete();
});

$(document).ready(function () {
	document_management.get_query_site();
	document_management.get_template();	
	document_management.get_list();
});