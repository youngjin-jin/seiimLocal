var rows = 20;
var total_page = 0;
var page = 1;

var worker_management = (function () {
  
	return {
		get_national: function () {
			run_progress();

			$.ajax({
				type: 'POST',
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_national' },
				success: function (response) {
					stop_progress();
					//console.log(response);

					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*createdAt: "2021-09-13T17:44:37.000Z"
								id: 1
								isActive: true
								name: "대한민국(Republic of Korea)"
								updatedAt: null*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#national').append(html);
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

		get_equipment: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_equipment' },
				success: function (response) {
					stop_progress();
					//console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*createdAt: "2021-09-13T17:44:37.000Z"
									id: 1
									isActive: true
									name: "불도저"
									updatedAt: null*/

								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#equipment').append(html);
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
		get_company: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_company' },
				success: function (response) {
					stop_progress();
					//console.log(response);
					
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

		get_list: function (link_page=0) {
			if (link_page) page = link_page;
			
			var start_date	 = $('#start_date').val();
			var end_date	 = $('#end_date').val();
			var birth		 = $('#birth').val();
			var name		 = $('#name').val();
			var national	 = $('#national option:selected').val();
			var site		 = $('#site option:selected').val();
			var equipment	 = $('#equipment option:selected').val();
			
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
				url: '/controller/worker_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'start_date' : start_date, 'end_date' : end_date, 'birth' : birth, 'name' : name, 'national' : national, 'site' : site, 'equipment' : equipment },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						var no = response.totCnt-(20*(page-1));
						
						if (response.list.length) {
							response.list.forEach(function(element, index){
								
								/*birth: "1988-03-02T00:00:00.000Z"
								eduDate: "2021-10-27T15:39:05.000Z"
								equips: "모터그레이더,모터그레이더,스크레이퍼,스크레이퍼,불도저,불도저,굴착기,굴착기,로더,로더,지게차,지게차,모터그레이더,모터그레이더"
								national: "대한민국(Republic of Korea)"
								phone1: "01023778152"
								siteName: "공덕역B공구"
								userName: "아무개"*/
								
								//var no = (page - 1) * rows + (index + 1);

								if (element.eduDate == null) element.eduDate = '';
								if (element.birth == null) element.birth = '';
								if (element.national == null) element.national = '';
								if (element.equips == null) element.equips = '';
								

								
								//$data['Number'] = $config['total_rows']-($offset*($page - 1));		

								
								html += '<tr onclick="worker_management.detail('+element.accId+');" style="cursor:pointer;">';
								html += '	<td>'+no+'</td>';
								html += '	<td>'+element.siteName+'</td>';
								//html += '	<td>'+element.eduDate.substring(0, 10)+'</td>';								
								html += '	<td>'+element.userName+'</td>';
								html += '	<td>'+autoHypenPhone(element.phone1)+'</td>';
								html += '	<td>'+element.birth.substring(0, 10)+'</td>';
								html += '	<td>'+element.national+'</td>';
								html += '</tr>';
								no--;
							});
						} else {
							html += '<tr><td colspan="7" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'worker_management.get_list'));
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
			location.href = 'worker_management_detail.php?key='+accId;
		}
	}
})();

//검색 이벤트
$('#search_form').on('submit', function () {
	worker_management.get_list();
	
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
	$('#birth').mask('0000-00-00');
	$('.chosen').chosen({
		search_contains: true
	});
	worker_management.get_national();
	worker_management.get_query_site();
	worker_management.get_equipment();
	worker_management.get_list();
	worker_management.get_company();
});