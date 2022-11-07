var type = key = '';

var license_detail = (function () {
  
	return {
		get_category: function () {
			$.ajax({
				type: 'POST',
				url: '/controller/license_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_category' },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						/*createdAt: "2021-09-13T17:44:37.000Z"
						id: 1
						isActive: true
						name: "불도저"
						updatedAt: null*/
						type = response.list;

						license_detail.get_list();
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});
		},

		get_list: function () {
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/license_list.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list' },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							response.list.forEach(function(element){
								/*accId: 34
								certDate: "1988-12-12T00:00:00.000Z"
								certName: "불도저"
								createdAt: "2021-10-01T01:30:00.000Z"
								deletedAt: null
								id: 1
								img: "https://dev-storage.saiifedu.com/0004740986346083442.jpg"
								type: 1
								updatedAt: "2021-10-01T01:30:02.000Z"*/

								if (parseInt(key) == element.id) {
									var filter_data = type.filter(function(item) { return item.id === element.type; });
									
									if (filter_data.length) {
										var type_name = filter_data[0].name;
									} else {
										var type_name = element.certName;
									}

									html += '<img id="img_'+element.id+'" src="'+element.img+'" class="link_img">';
									html += '<div class="tbl-wrap v1 mt40">';
									html += '	<table>';
									html += '		<colgroup>';
									html += '			<col style="width: 81px;">';
									html += '			<col style="width: auto;">';
									html += '		</colgroup>';
									html += '		<tbody>';
									html += '			<tr>';
									html += '				<th>'+_lc['txt']['장비종류']+'</th>';
									html += '				<td>'+type_name+'</td>';
									html += '			</tr>';
									html += '			<tr>';
									html += '				<th>'+_lc['txt']['자격증명']+'</th>';
									html += '				<td>'+element.certName+'</td>';
									html += '			</tr>';
									html += '			<tr>';
									html += '				<th>'+_lc['txt']['발급년월일']+'</th>';
									html += '				<td>'+element.certDate.substring(0, 10)+'</td>';
									html += '			</tr>';
									html += '		</tbody>';
									html += '	</table>';
									html += '</div>';

									$('.license-wrap').append(html);
								}
							});
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
		}
	}
})();

//다운로드 이벤트
$(document).on('click', '#down_btn', function() {
	var src = $('#'+link_img).attr('src');
	
	popCloseAndDim('imgOption', true);
	
	location.href = '/down.php?key='+src;
});

//자세히 보기 이벤트
$(document).on('click', '#detail_img_btn', function() {
	popCloseAndDim('imgOption', true);
	
	$('#detail_img').attr('src', $('#'+link_img).attr('src'));
	
	popOpenAndDim('megascopeProfile', true); 
});

//이미지 클릭 이벤트
$(document).on('click', '.link_img', function() {
	link_img = $(this).attr('id');
	
	popOpenAndDim('imgOption', true);
});

//수정 이벤트
$('#update_btn').on('click', function () {
	location.href = 'license_modify.php?key='+key;
});

//뒤로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	key = $('#key').val();

	if (key) license_detail.get_category();
});