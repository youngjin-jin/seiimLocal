var table_list = [];

var edu_list = (function () {
  
	return {
		get_category: function () {
			var key = $('#key').val();

			$.ajax({
				type: 'POST',
				url: '/controller/edu_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_category', 'siteId' : key },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*createdAt: "2021-09-28T16:50:38.000Z"
									id: 1
									isActive: true
									name: "정기안전보건교육"
									siteId: 1212055764
									subCats: Array(3)
									0: {id: 1, categoryId: 1, name: '근로자', memo: null, isActive: true, …}
									1: {id: 2, categoryId: 1, name: '관리감독자', memo: null, isActive: true, …}
									2: {id: 3, categoryId: 1, name: 'TBM', memo: 'TBM / TBM / TBM', isActive: true, …}
									length: 3
									[[Prototype]]: Array(0)
									updatedAt: "2021-10-04T08:46:44.000Z"*/
								
								html += '<option value="'+element.name+'">'+element.name+'</option>';
							});
						}
						
						$('#filter_educategory').append(html);
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});

			edu_list.get_list();
		},

		get_list: function () {
			var key = $('#key').val();
			
			$('#edu_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'siteId' : key },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list == null) response.list = [];
						
						table_list = response.list;
						console.log(table_list);
						
						edu_list.draw_list();
						
						/*if (response.list.length) {
							table_list = response.list;
							console.log(table_list);

							response.list.forEach(function(element){
								/*eduCnt: 3
								eduDate: "2021-10-01T01:34:52.000Z"
								eduName: "테스트 교육"
								id: 2
								name: "정기안전보건교육"*/
								
								/*html += '<li onclick="edu_list.edu_detail('+element.id+');">';
								html += '	<div class="list-head">';
								html += '		<p class="tit">'+element.eduName+'</p>';
								html += '	</div>';
								html += '	<div class="list-body">';
								html += '		<div class="tbl-wrap v1">';
								html += '			<table>';
								html += '				<colgroup>';
								html += '					<col style="width: 76px;">';
								html += '					<col style="width: auto;">';
								html += '				</colgroup>';
								html += '				<tbody>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['교육종류']+'</th>';
								html += '						<td>'+element.name+'</td>';
								html += '					</tr>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['교육일']+'</th>';
								html += '						<td>'+element.eduDate.substring(0, 10)+'</td>';
								html += '					</tr>';
								html += '					<tr>';
								html += '						<th>'+_lc['txt']['교육인원']+'</th>';
								html += '						<td>'+element.eduCnt+_lc['txt']['명']+'</td>';
								html += '					</tr>';
								html += '				</tbody>';
								html += '			</table>';
								html += '		</div>';
								html += '	</div>';
								html += '</li>';
							});
						} else {
							html += '<li><p class="tit" style="padding:50px;text-align:center;">'+_lc['txt']['데이터가없습니다']+'</p></li>';
						}
						
						$('#edu_list').append(html);*/
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

		edu_detail: function (id) {
			var key			 = $('#key').val();
			var site_name	 = encodeURIComponent($('#site_name').val());
			var owner		 = encodeURIComponent($('#owner').val());
			var contractor	 = encodeURIComponent($('#contractor').val());
			var myCompany	 = encodeURIComponent($('#myCompany').val());

			location.href = 'edu_detail.php?key='+key+'&site_name='+site_name+'&owner='+owner+'&contractor='+contractor+'&myCompany='+myCompany+'&eduId='+id;
		},

		draw_list: function () {
			$('#edu_list').empty();

			var html = '';
			
			if (table_list.length) {
				var date_range = '';
				var cate_array = [];

				if ($('#filter_educategory_list li').length) {
					$('#filter_educategory_list li').each(function() {
						var value = $(this).find('p').text();

						if (value.indexOf(' ~ ') != -1) {
							date_range = value;
						} else {
							cate_array.push(value);
						}
					});
				}

				table_list.forEach(function(element){
					/*eduCnt: 3
					eduDate: "2021-10-01T01:34:52.000Z"
					eduName: "테스트 교육"
					id: 2
					name: "정기안전보건교육"*/

					if (date_range || cate_array.length) {
						if (date_range && cate_array.length) {
							var imsi		 = date_range.split(' ~ ');
							var start_date	 = new Date(imsi[0]);
							var end_date	 = new Date(imsi[1]);
							var eduDate		 = new Date(element.eduDate.substring(0, 10));

							if (eduDate >= start_date && eduDate <= end_date && $.inArray(element.name, cate_array) != -1) {
								html += make_html(element);
							}
						} else if (date_range) {
							var imsi		 = date_range.split(' ~ ');
							var start_date	 = new Date(imsi[0]);
							var end_date	 = new Date(imsi[1]);
							var eduDate		 = new Date(element.eduDate.substring(0, 10));

							if (eduDate >= start_date && eduDate <= end_date) {
								html += make_html(element);
							}
						} else {
							if ($.inArray(element.name, cate_array) != -1) {
								html += make_html(element);
							}
						}
					} else {
						html += make_html(element);
					}
				});

				if (!html) html += '<li><p class="tit" style="padding:50px;text-align:center;">'+_lc['txt']['데이터가없습니다']+'</p></li>';
			} else {
				html += '<li><p class="tit" style="padding:50px;text-align:center;">'+_lc['txt']['데이터가없습니다']+'</p></li>';
			}
			
			$('#edu_list').append(html);
		}
	}
})();

//필터 리스트 그리기
function make_html(element) {
	var html = '';

	html += '<li onclick="edu_list.edu_detail('+element.id+');">';
	html += '	<div class="list-head">';
	html += '		<p class="tit">'+element.eduName+'</p>';
	html += '	</div>';
	html += '	<div class="list-body">';
	html += '		<div class="tbl-wrap v1">';
	html += '			<table>';
	html += '				<colgroup>';
	html += '					<col style="width: 76px;">';
	html += '					<col style="width: auto;">';
	html += '				</colgroup>';
	html += '				<tbody>';
	html += '					<tr>';
	html += '						<th>'+_lc['txt']['교육종류']+'</th>';
	html += '						<td>'+element.name+'</td>';
	html += '					</tr>';
	html += '					<tr>';
	html += '						<th>'+_lc['txt']['교육일']+'</th>';
	html += '						<td>'+element.eduDate.substring(0, 10)+'</td>';
	html += '					</tr>';
	html += '					<tr>';
	html += '						<th>'+_lc['txt']['교육인원']+'</th>';
	html += '						<td>'+element.eduCnt+_lc['txt']['명']+'</td>';
	html += '					</tr>';
	html += '				</tbody>';
	html += '			</table>';
	html += '		</div>';
	html += '	</div>';
	html += '</li>';

	return html;
}

//교육종류 필터 선택 이벤트
$('#filter_educategory').on('change', function () {
	var value		 = $(this).val();
	var find_value	 = false;

	if (value) {
		$('#filter_educategory_list li').each(function() {
			if ($(this).find('p').text() == value) {
				find_value = true;
			}
		});

		if (!find_value) {
			var html = '<li><p>'+value+'</p><button class="btn-ic ic-cancle" onclick="$(this).parent().remove();"></button></li>';

			$('#filter_educategory_list').append(html);
		}
	}
});

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());

	popCloseAndDim('viewCalendar', true);
	popOpenAndDim('addFilter', true);

	var start_date	 = $('#start_date').val();
	var end_date	 = $('#end_date').val();

	if (start_date && end_date) {
		$('#filter_educategory_list li').each(function() {
			if ($(this).find('p').text().indexOf(' ~ ') != -1) {
				$(this).remove();
			}
		});

		var html = '<li><p>'+start_date+' ~ '+end_date+'</p><button class="btn-ic ic-cancle" onclick="$(this).parent().remove();"></button></li>';

		$('#filter_educategory_list').append(html);
	}
});

//취소 이벤트
$('#cancel_btn').on('click', function () {
	popCloseAndDim('viewCalendar', true);
	popOpenAndDim('addFilter', true);
});

//뒤로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//필터 적용 이벤트
$('#filter_btn').on('click', function () {
	$('#filter_title').empty();
	$('#filter_educategory').val('').prop('selected', true);

	var html = '';

	$('#filter_educategory_list li').each(function() {
		html += ' <li>'+$(this).find('p').html()+'</li>';
	});

	$('#filter_title').append(html);

	popCloseAndDim('addFilter', true);

	edu_list.draw_list();
});

//필터 해제 이벤트
$('#filter_reset_btn').on('click', function () {
	$('#filter_title').empty();
	$('#filter_educategory_list').empty();
	$('#start_date').val('');
	$('#end_date').val('');
	$('#filter_educategory').val('').prop('selected', true);

	popCloseAndDim('addFilter', true);

	edu_list.draw_list();
});

$(document).ready(function () {
	edu_list.get_category();
});