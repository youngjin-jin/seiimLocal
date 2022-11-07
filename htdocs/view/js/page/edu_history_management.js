var rows = 20;
var total_page = 0;
var page = 1;

var edu_history_management = (function () {
  
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

		get_cat1: function () {
			var siteId = $('#siteId option:selected').val();

			$('#cat1').html('<option value="-1">전체</option>');

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_cat1', 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*cat2Name: "TBM"
								catName: "정기안전보건교육"
								constructType: "공종이다"
								eduDate: "2021-10-01T01:34:52.000Z"
								eduName: "테스트 교육"
								id: 1
								instructor: "성주필"
								siteName: "공덕역B공구"
								startTime: "00:00:00"*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#cat1').append(html).prop('disabled', false);
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

		get_cat2: function () {
			var cat1 = $('#cat1 option:selected').val();

			$('#cat2').html('<option value="-1">전체</option>');

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_cat2', 'cat1' : cat1 },
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
							
							$('#cat2').append(html).prop('disabled', false);
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
		
		get_sv_list: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_sv_list' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*id: 1
								name: "한국도로공사"*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#svName').append(html);
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
			var startDate		 = $('#startDate').val();
			var endDate			 = $('#endDate').val();
			var eduName			 = $('#eduName').val();
			var cat1			 = $('#cat1 option:selected').val();
			var cat2			 = $('#cat2 option:selected').val();
			var constructType	 = $('#constructType').val();
			var instructor		 = $('#instructor').val();
			
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
				url: '/controller/edu_history_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'siteId' : siteId, 'startDate' : startDate, 'endDate' : endDate, 'eduName' : eduName, 'cat1' : cat1, 'cat2' : cat2, 'constructType' : constructType, 'instructor' : instructor },
				success: function (response) {
					stop_progress();
					console.log(response);
					var no = response.totCnt-(20*(page-1));
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element, index){
								/*cat2Name: "TBM"
								catName: "정기안전보건교육"
								constructType: "공종이다"
								eduDate: "2021-10-01T01:34:52.000Z"
								eduName: "테스트 교육"
								id: 1
								instructor: "성주필"
								siteName: "공덕역B공구"
								startTime: "00:00:00"*/
								
								//var no = (page - 1) * rows + (index + 1);
								var work = element.workerId;
								console.log(work);

								html += '<tr>';
								html += '	<td>';
								html += '		<div class="inp-wrap">';
								html += '			<div class="inp-item">';
								html += '				<label for="cate_check_'+element.id+'">';
								html += '					<input type="checkbox" id="cate_check_'+element.id+'" class="check" value="'+element.id+'">';
								html += '					<p></p>';
								html += '				</label>';
								html += '			</div>';
								html += '		</div>';
								html += '	</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+no+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.siteName+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.eduName+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.eduDate.substring(0, 10)+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+(Number(element.endTime.substring(0, 2))-Number(element.startTime.substring(0, 2)))+'시간</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.instructor+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.catName+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.cat2Name+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+element.constructType+'</td>';
								html += '	<td onclick="edu_history_management.detail('+element.id+');" style="cursor:pointer;">'+work.length+'명</td>';
								html += '</tr>';
								no--;
							});
						} else {
							html += '<tr><td colspan="10" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'edu_history_management.get_list'));
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
		get_construct_type: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_construct_type' },
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
								joinCompany: [{memo: "", comId: "1"}, {memo: "", comId: "2"}, {memo: "", comId: "3"}]
								name: "공덕역B공구"
								owner: 4
								startDate: "2021-07-29T00:00:00.000Z"
								status: 1
								updatedAt: "2021-10-13T18:11:04.000Z"*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#query_site_select').append(html).trigger('chosen:updated');
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
			location.href = 'edu_history_management_detail.php?key='+id;
		}, 
		
		select_delete: function () {
			var select_list_str = '';
			
			$('#tbody_list .check:checked').each(function(){
				var id = ($(this).val());

				if (select_list_str) select_list_str += ',';
				select_list_str += id;
			});
			
			//console.log(select_list_str);
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'select_delete', 'select_list_str' : select_list_str },
				success: function (response) {
					if (response.result) {
						page = 1;

						edu_history_management.get_list();

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

		excel_list: function () {
			var siteId			 = $('#siteId option:selected').val();
			var startDate		 = $('#startDate').val();
			var endDate			 = $('#endDate').val();
			var eduName			 = encodeURIComponent($('#eduName').val());
			var cat1			 = $('#cat1 option:selected').val();
			var cat2			 = $('#cat2 option:selected').val();
			var constructType	 = encodeURIComponent($('#constructType').val());
			var instructor		 = encodeURIComponent($('#instructor').val());
			
			location.href = '/excel.php?siteId='+siteId+'&startDate='+startDate+'&endDate='+endDate+'&eduName='+eduName+'&cat1='+cat1+'&cat2='+cat2+'&constructType='+constructType+'&instructor='+instructor;
		},
	}
})();

//현장 선택 이벤트
$('#siteId').on('change', function () {
	page = 1;
	
	edu_history_management.get_cat1();
	edu_history_management.get_list();
});

//교육종류 선택 이벤트
$('#cat1').on('change', function () {
	var cat1 = $('#cat1 option:selected').val();

	if (cat1 != '-1') {
		edu_history_management.get_cat2();
	} else {
		$('#cat2').html('<option value="-1">전체</option>').prop('disabled', true);
	}
});

//엑셀추출 이벤트
$('#excel_btn').on('click', function () {
	edu_history_management.excel_list();
});

//작성 이벤트
$('#write_btn').on('click', function () {
	location.href = 'edu_history_management_detail.php';
});

//검색 이벤트
$('#search_form').on('submit', function () {
	page = 1;
	
	edu_history_management.get_list();
	
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
	location.href = 'edu_history_management_detail.php';
});

//삭제 선택 이벤트
$('#del_btn').on('click', function () {
	var check_cnt = $('#tbody_list .check:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		alert('삭제할 교육내역을 선택하세요.');
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	edu_history_management.select_delete();
});

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

$(document).ready(function () {
	$('.chosen').chosen({
		search_contains: true
	});
	edu_history_management.get_query_site();
	edu_history_management.get_cat1();
	edu_history_management.get_sv_list();
	edu_history_management.get_list();
	edu_history_management.get_construct_type();
});