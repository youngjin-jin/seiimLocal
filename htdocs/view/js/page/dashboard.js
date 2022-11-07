var rows = 10;
var total_page = 0;
var page = 1;
var del_id = '';

var dashboard = (function () {
  
	return {
		init : function() {
			dashboard.get_query_site();
		},
		
		get_query_site: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
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

						dashboard.get_edu_list();
						dashboard.get_safe_list();
						dashboard.get_site_list();
						dashboard.get_noti_list();
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
		
		get_edu_list: function () {
			var siteId = $('#query_site_select').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_edu_list', 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						/*eduCnt: 0
						eduWorkerCnt: 0
						newSignupCnt: 1*/
						$('#eduCnt').text(numberWithCommas(response.info.eduCnt));
						$('#eduWorkerCnt').text(numberWithCommas(response.info.eduWorkerCnt));
						$('#newSignupCnt').text(numberWithCommas(response.info.newSignupCnt));
						var datetime = response.datetime.split(' ');
						var yoil = getyoil(datetime[0]);
						$('#load_datetime_p').text(datetime[0]+' ('+yoil+') '+datetime[1]);
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
		
		get_safe_list: function () {
			var siteId = $('#query_site_select').val();

			$('.statistics-wrap').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_safe_list', 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*daily:
									docCnt: 0
									workerCnt: 0
								id: 1
								monthly:
									docCnt: 2
									workerCnt: "5"
								name: "정기안전보건교육"
								total:
									docCnt: 2
									workerCnt: "5"*/
								
								if (element.daily.docCnt == null) element.daily.docCnt = 0;
								if (element.daily.workerCnt == null) element.daily.daily = 0;
								if (element.total.docCnt == null) element.total.docCnt = 0;
								if (element.total.workerCnt == null) element.total.workerCnt = 0;
									
								html += '<div class="statistics">';
								html += '	<div class="head">';
								html += '		<p>'+element.name+'</p>';
								html += '	</div>';
								html += '	<div class="cont">';
								html += '		<dl>';
								html += '			<dt>금일</dt>';
								html += '			<dd>'+numberWithCommas(element.daily.docCnt)+'건</dd>';
								html += '			<dd>'+numberWithCommas(parseInt(element.daily.workerCnt))+'명</dd>';
								html += '		</dl>';
								html += '		<dl>';
								html += '			<dt>누적</dt>';
								html += '			<dd>'+numberWithCommas(element.total.docCnt)+'건</dd>';
								html += '			<dd>'+numberWithCommas(parseInt(element.total.workerCnt))+'명</dd>';
								html += '		</dl>';
								html += '	</div>';
								html += '</div>';
							});
						} else {
							html += '<div style="padding:50px;background-color:#fff;margin:0 auto;">데이터가 없습니다.</div>';
						}
						
						$('.statistics-wrap').append(html);
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
		
		get_site_list: function () {
			var siteId = $('#query_site_select').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_site_list', 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						/*adminCnt: 2
						companyCnt: 10
						docCnt: 3
						eduCatCnt: 9
						workerCnt: 6*/
						$('#site_info_edu').text(numberWithCommas(response.info.eduCatCnt));
						$('#site_info_worker').text(numberWithCommas(response.info.workerCnt));
						$('#site_info_com').text(numberWithCommas(response.info.companyCnt));
						$('#site_info_doc').text(numberWithCommas(response.info.docCnt));
						$('#site_info_admin').text(numberWithCommas(response.info.adminCnt));
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

		get_noti_list: function (link_page=0) {
			if (link_page) page = link_page;

			var siteId = $('#query_site_select').val();

			$('#noti_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_noti_list', 'page' : page, 'siteId' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*adminName: "test"
								board: "sdfasdf"
								createdAt: "2021-10-02T21:48:47.000Z"
								id: 4
								isDeletable: true
								likeCnt: 0
								name: ""
								profile: "https://dev-storage.saiifedu.com/9322085661328545.jpg"*/

								if (element.profile) var src = element.profile; else var src = '../img/avatar.jpg';
								if (element.likeCnt) {
									var on_class = 'on';
									var likeCnt = element.likeCnt;
								} else {
									var on_class = likeCnt = '';
								}

								if (element.isDeletable) {
									var btn = '<button class="btn-ic btn-delete" onclick="dashboard.del_noti_confirm('+element.id+');"></button>';
								} else {
									var btn = '';
								}
								
								html += '<li>';
								html += '	<div class="pofile">';
								html += '		<img src="'+src+'">';
								html += '	</div>';
								html += '	<div class="txt-wrap">';
								html += '		<div class="top">';
								html += '			<div class="left">';
								html += '				<p class="name">'+element.adminName+'</p>';
								html += '				<p class="date">'+element.createdAt.substring(0, 16).replace('T', ' ')+'</p>';
								html += '				<button onclick="dashboard.add_good('+element.id+');" class="btn btn-like '+on_class+'"><span>'+likeCnt+'</span><span class="tooltiptext">Tooltip text</span></button>';
								html += '			</div>';
								html += '			<div class="right">';
								html += '				'+btn;
								html += '			</div>';
								html += '		</div>';
								html += '		<div class="bottom">';
								html += '			<p class="txt">'+nl2br(element.board)+'</p>';
								html += '		</div>';
								html += '	</div>';
								html += '</li>';
							});
						} 
						
						$('#noti_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'dashboard.get_noti_list'));
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

		save_noti: function () {
			var siteId	 = $('#query_site_select').val();
			var msg		 = $('#noti').val();

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'save_noti', 'siteId' : siteId, 'msg' : msg },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						page = 1;
						dashboard.get_noti_list();
						$('#noti').val('');
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

		add_good: function (noticeId) {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'add_good', 'noticeId' : noticeId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						page = 1;
						dashboard.get_noti_list();
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

		del_noti_confirm: function (id) {
			del_id = id;

			popOpenAndDim('alertDelete', true);
		}, 

		del_noti: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/dashboard.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'del_noti', 'noticeId' : del_id },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						page = 1;
						dashboard.get_noti_list();
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
	}
})();

//현장 선택 이벤트
$('#query_site_select').on('change', function () {
	page = 1;

	dashboard.get_edu_list();
	dashboard.get_safe_list();
	dashboard.get_site_list();
	dashboard.get_noti_list();
});

//리로드 이벤트
$('#reload_btn').on('click', function () {
	page = 1;

	dashboard.get_edu_list();
	dashboard.get_safe_list();
	dashboard.get_site_list();
	dashboard.get_noti_list();
});

//전달 이벤트
$('#noti_save_btn').on('click', function () {
	var noti = $('#noti').val();

	if (noti) {
		dashboard.save_noti();
	} else {
		alert('전달할 내용을 입력하세요.');
		$('#noti').focus();
	}
});

$(document).ready(function () {
	$('.chosen').chosen();
	
	dashboard.init();
});

/*안녕하세요. 이사님
아래사항 확인 부탁드립니다.

1./ba/dashNotice 페이지당 10개씩 구현하는걸로 이야기 했는데 적용이 안되어있고 소팅이 되지 않습니다.

2.노티삭제 api 만들어 주세요. 버튼은 모두 표시하니 백단에서 권한에 따른 처리는 해야 할듯합니다.
*/