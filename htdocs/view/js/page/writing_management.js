var rows = 20;
var total_page = 0;
var page = 1;

var writing_management = (function () {
  
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
							
							$('#site').append(html);
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
			
			var start_date	 = $('#start_date').val();
			var end_date	 = $('#end_date').val();
			var site		 = $('#site option:selected').val();
			var name		 = $('#name').val();
			var doc_name	 = $('#doc_name').val();
			var sv_name		 = $('#sv_name').val();
			
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
				url: '/controller/writing_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'start_date' : start_date, 'end_date' : end_date, 'site' : site, 'name' : name, 'doc_name' : doc_name, 'sv_name' : sv_name },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						var no = response.totCnt-(20*(page-1));
						if (response.list.length) {
							response.list.forEach(function(element, index){
								/*birth: ""
								createdAt: "2021-10-27T01:23:35.000Z"
								docName: "안전수칙준수 서약서"
								eduDate: ""
								equips: ""
								national: ""
								safetyDocId: 1
								siteName: "공덕역B공구"
								svName: "수자원공사"
								userName: "아무개"*/
								
								//var no = (page - 1) * rows + (index + 1);

								if (element.createdAt == null) element.createdAt = '';
								
								html += '<tr>';
								html += '	<td>';
								html += '		<div class="inp-wrap">';
								html += '			<div class="inp-item">';
								html += '				<label for="check_'+index+'">';
								html += '					<input type="checkbox" id="check_'+index+'" class="check" value="'+element.accId+'" safetyDocId="'+element.safetyDocId+'">';
								html += '					<p></p>';
								html += '				</label>';
								html += '			</div>';
								html += '		</div>';
								html += '	</td>';
								html += '	<td onclick="writing_management.detail('+element.accId+', '+element.safetyDocId+');" style="cursor:pointer;">'+no+'</td>';
								html += '	<td onclick="writing_management.detail('+element.accId+', '+element.safetyDocId+');" style="cursor:pointer;">'+element.siteName+'</td>';
								html += '	<td onclick="writing_management.detail('+element.accId+', '+element.safetyDocId+');" style="cursor:pointer;">'+element.createdAt.substring(0, 10)+'</td>';
								html += '	<td onclick="writing_management.detail('+element.accId+', '+element.safetyDocId+');" style="cursor:pointer;">'+element.docName+'</td>';
								html += '	<td onclick="writing_management.detail('+element.accId+', '+element.safetyDocId+');" style="cursor:pointer;">'+element.svName+'</td>';
								html += '	<td onclick="writing_management.detail('+element.accId+', '+element.safetyDocId+');" style="cursor:pointer;">'+element.userName+'</td>';
								html += '</tr>';
								no--;
							});
						} else {
							html += '<tr><td colspan="7" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'writing_management.get_list'));
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
		
		detail: function (accId, safetyDocId) {
			location.href = 'writing_management_detail.php?key='+accId+'&safetyDocId='+safetyDocId;
		},

		select_delete: function () {
			var delete_list = [];

			$('#tbody_list .check:checked').each(function(){
				var accId		 = $(this).val();
				var safetyDocId	 = $(this).attr('safetyDocId');

				delete_list.push({"accId" : accId, "safetyDocId" : safetyDocId});
			});

			console.log(delete_list);

			$.ajax({
				type: 'POST',
				url: '/controller/writing_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'select_delete', 'delete_list' : JSON.stringify(delete_list) },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						location.reload();
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
})();

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	writing_management.select_delete();
});

//삭제 선택 이벤트
$('#delete_btn').on('click', function () {
	var check_cnt = $('#tbody_list').find('input[type="checkbox"]:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true)
	} else {
		alert('삭제할 문서를 선택하세요.');
	}
});

//검색 이벤트
$('#search_form').on('submit', function () {
	writing_management.get_list();
	
	return false;
});

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());
	popClose('viewCalendar', true);
});

$(document).ready(function () {
	writing_management.get_query_site();
	writing_management.get_list();
});