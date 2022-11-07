var table_list = [];

var edu_management = (function () {
  
	return {
		get_category: function () {
			var siteId = $('#key').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/new_edu.php',
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
								/*createdAt: "2021-09-28T16:50:38.000Z"
								docDiv: 1
								id: 1
								isActive: true
								name: "정기안전보건교육"
								siteId: 1212055764
								subCats: (3) [{…}, {…}, {…}]
								updatedAt: "2021-10-04T08:46:44.000Z"*/

								html += '<option value="'+element.name+'">'+element.name+'</option>';
							});
							
							$('#filter_educategory').append(html).trigger('change');
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

		get_list: function () {
			var key = $('#key').val();
			
			$('#edu_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'siteId' : key },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						table_list = response.list;
						console.log(table_list);

						edu_management.draw_list();
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
					/*adminId: 2
					attach: (3) [1, 2, 3]
					cat1: 1
					cat2: 3
					catName: "정기안전보건교육(근로자)"
					constructType: "공종이다"
					createdAt: "2021-10-01T01:34:28.000Z"
					doc: null
					eduDate: "2021-10-01T01:34:52.000Z"
					eduName: "테스트 교육"
					eduPlace: "교육장"
					endTime: "00:00:00"
					id: 1
					instructor: "성주필"
					memo: null
					siteId: 1212055764
					startTime: "00:00:00"
					sv: 3
					updatedAt: "2021-10-01T01:34:30.000Z"
					workerId: (2) [4, 3]
					workerName: "saiifedu,temppw"*/

					if (element.workerId == null) element.workerId = [];
					if (element.workerName == null) element.workerName = '';

					if (date_range || cate_array.length) {
						if (date_range && cate_array.length) {
							var imsi		 = date_range.split(' ~ ');
							var start_date	 = new Date(imsi[0]);
							var end_date	 = new Date(imsi[1]);
							var eduDate		 = new Date(element.eduDate.substring(0, 10));
							var workerName	 = element.workerName.split(',');
							var find_worker	 = false;

							for (i=0; i<workerName.length; i++) {
								if ($.inArray(workerName[i], cate_array) != -1) {
									find_worker = true;
									break;
								}
							}

							if (eduDate >= start_date && eduDate <= end_date && ($.inArray(element.catName, cate_array) != -1 || find_worker)) {
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
							var workerName	 = element.workerName.split(',');
							var find_worker	 = false;

							for (i=0; i<workerName.length; i++) {
								if ($.inArray(workerName[i], cate_array) != -1) {
									find_worker = true;
									break;
								}
							}

							if ($.inArray(element.catName, cate_array) != -1 || find_worker) {
								html += make_html(element);
							}
						}
					} else {
						html += make_html(element);
					}
				});

				if (!html) html += '<li><p class="tit" style="padding:50px;text-align:center;">데이터가 없습니다.</p></li>';
			} else {
				html += '<li><p class="tit" style="padding:50px;text-align:center;">데이터가 없습니다.</p></li>';
			}
			
			$('#edu_list').append(html);

			//교육 롱클릭 이벤트
			$('.long_click_obj').enableLongClick(function() {
				console.log();
				popOpenAndDim('copyEdu', true);
			}, 800);
			
			//교육 클릭 이벤트
			$('.long_click_obj').on('click', function () {
				var id = $(this).attr('id');
			
				edu_management.edu_detail(id);
			});
		}
	}
})();

//필터 리스트 그리기
function make_html(element) {
	var html = '';

	if (element.workerId == null) element.workerId = [];
	
	html += '<li id="'+element.id+'" class="long_click_obj">';
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
	html += '						<th>교육종류</th>';
	html += '						<td>'+element.catName+'</td>';
	html += '					</tr>';
	html += '					<tr>';
	html += '						<th>교육일</th>';
	html += '						<td>'+element.eduDate.substring(0, 10)+'</td>';
	html += '					</tr>';
	html += '					<tr>';
	html += '						<th>'+_lc['txt']['교육인원']+'</th>';
	html += '						<td>'+element.workerId.length+'명</td>';
	html += '					</tr>';
	html += '				</tbody>';
	html += '			</table>';
	html += '		</div>';
	html += '	</div>';
	html += '</li>';

	return html;
}

//복사 이벤트
$('#copy_btn').on('click', function () {
	var eduId = $('#copy_id').val();

	if (eduId) {
		var filter_data = table_list.filter(function(item) { return item.id == eduId; });

		if (filter_data.length) {
			var key			 = $('#key').val();
			var site_name	 = encodeURIComponent($('#site_name').val());
			var owner		 = encodeURIComponent($('#owner').val());
			var contractor	 = encodeURIComponent($('#contractor').val());
			var myCompany	 = encodeURIComponent($('#myCompany').val());

			location.href = 'new_edu.php?key='+key+'&site_name='+site_name+'&owner='+owner+'&contractor='+contractor+'&myCompany='+myCompany+'&eduId='+eduId+'&eduName='+encodeURIComponent(filter_data[0].eduName)+'&cat1='+filter_data[0].cat1+'&cat2='+filter_data[0].cat2+'&constructType='+encodeURIComponent(filter_data[0].constructType)+'&eduPlace='+encodeURIComponent(filter_data[0].eduPlace)+'&instructor='+encodeURIComponent(filter_data[0].instructor);
		}
	} else {
		alert('복사할 ID가 없습니다.');
	}
});

//교육종류 필터 선택 이벤트
$('#filter_educategory').on('change', function () {
	var value		 = $('#filter_educategory option:selected').val();
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

//포함 수료자 이름 이벤트
$('#workerName').on('blur', function () {
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

	edu_management.draw_list();
});

//필터 해제 이벤트
$('#filter_reset_btn').on('click', function () {
	$('#filter_title').empty();
	$('#filter_educategory_list').empty();
	$('#start_date').val('');
	$('#end_date').val('');
	$('#filter_educategory').val('').prop('selected', true);

	popCloseAndDim('addFilter', true);

	edu_management.draw_list();
});

$(document).ready(function () {
	edu_management.get_category();
	edu_management.get_list();
});