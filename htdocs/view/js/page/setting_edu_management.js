var rows = 20;
var total_page = 0;
var page = 1;
var site = [];
var site_cate = [];
var cate_list = [];
var detail_list = [];

var quill;
var toolbarOptions = [
	[{ 'header': [1, 2, 3, 4, 5, 6, false] }],
	['bold', 'italic', 'underline', 'strike'],        // toggled buttons
	[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
	[{ 'list': 'ordered'}, { 'list': 'bullet' }],     // text direction
	[{ 'align': [] }]
];

var setting_edu_management = (function () {
  
	return {
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
					//console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							site = response.list;
							console.log(site);
							
							var html = '';
							
							response.list.forEach(function(element){
								/*addr: "공덕역 1번길"
								contractor: 6
								createdAt: "2021-09-16T15:13:53.000Z"
								endDate: "2021-09-24T13:21:27.000Z"
								id: 1212055764
								joinCompany: []
								name: "공덕역B공구"
								owner: 1
								startDate: "2021-07-29T13:21:22.000Z"
								status: 1
								updatedAt: "2021-09-16T15:13:53.000Z"*/
								html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#add_cate_form_site').append(html);
							$('#add_detail_form_site').append(html);
							$('#query_site_select').append(html);
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
		
		get_query_site_cate: function () {
			var site = $('#query_site_select option:selected').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/setting_edu_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_query_site_cate', 'site' : site },
				success: function (response) {
					stop_progress();
					//console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							site_cate = response.list;
							console.log(site_cate);
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
			setting_edu_management.get_query_site_cate();
			
			if (link_page) page = link_page;
			
			var site = $('#query_site_select option:selected').val();
			
			if ($('#cate').hasClass('active')) {
				var tale_id = 'cate_table';
				var catType = 0;
			} else {
				var tale_id = 'detail_table';
				var catType = 1;
			}
			
			$('#'+tale_id+' .tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/setting_edu_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page, 'site' : site, 'catType' : catType },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							
							if (catType == 0) {
								cate_list = [];
								
								response.list.forEach(function(element, index){
									/*cat2Cnt: 4
										catActive: 1
										catId: 1
										catName: "정기안전보건교육"
										code1: "1212055764A"
										code2: "1212055764A3"
										eduCnt: 1
										name: "공덕역B공구"*/
									
									var no = (page - 1) * rows + (index + 1);
									var imsi = {
										"catId" : element.catId,
										"catName" : element.catName,
										"cat2Cnt" : element.cat2Cnt,
										"name" : element.name,
										"code1" : element.code1
									}
									cate_list.push(imsi);
									
									html += '<tr>';
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="cate_check_'+element.catId+'">';
									html += '					<input type="checkbox" id="cate_check_'+element.catId+'" class="check" value="'+element.catId+'" count="'+element.cat2Cnt+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
									html += '	<td onclick="setting_edu_management.edit_cate('+element.catId+');" style="cursor:pointer;">'+no+'</td>';
									html += '	<td onclick="setting_edu_management.edit_cate('+element.catId+');" style="cursor:pointer;">'+element.name+'</td>';
									html += '	<td onclick="setting_edu_management.edit_cate('+element.catId+');" style="cursor:pointer;">'+element.code1.substring(`${element.siteId}`.length, element.code1.length)+'</td>';
									html += '	<td onclick="setting_edu_management.edit_cate('+element.catId+');" style="cursor:pointer;text-align:left;">'+element.catName+'</td>';
									html += '	<td onclick="setting_edu_management.edit_cate('+element.catId+');" style="cursor:pointer;">'+element.cat2Cnt+'</td>';
									html += '</tr>';
								});
								
								console.log(cate_list);
							} else {
								detail_list = [];
								
								response.list.forEach(function(element, index){
									/*cat2Active: 1
										cat2Id: 3
										cat2Name: "TBM"
										catActive: 1
										catId: 1
										catName: "정기안전보건교육"
										code1: "1212055764A"
										code2: "1212055764A3"
										eduCnt: 1
										memo: "TBM / TBM / TBM"*/
									var no = (page - 1) * rows + (index + 1);
									
									var imsi = {
										"cat2Active" : element.cat2Active,
										"cat2Id" : element.cat2Id,
										"cat2Name" : element.cat2Name,
										"catId" : element.catId,
										"catName" : element.catName,
										"code1" : element.code1,
										"code2" : element.code2,
										"eduCnt": element.eduCnt,
										"memo": element.memo
									}
									
									detail_list.push(imsi);
									
									if (element.cat2Active) {
										var cat2Active = '활성';
									} else {
										var cat2Active = '비활성';
									}
									
									html += '<tr>';
									html += '	<td>';
									html += '		<div class="inp-wrap">';
									html += '			<div class="inp-item">';
									html += '				<label for="detail_check_'+element.cat2Id+'">';
									html += '					<input type="checkbox" id="detail_check_'+element.cat2Id+'" class="check" value="'+element.cat2Id+'">';
									html += '					<p></p>';
									html += '				</label>';
									html += '			</div>';
									html += '		</div>';
									html += '	</td>';
									html += '	<td onclick="setting_edu_management.edit_detail('+element.cat2Id+');" style="cursor:pointer;">'+no+'</td>';
									html += '	<td onclick="setting_edu_management.edit_detail('+element.cat2Id+');" style="cursor:pointer;">'+element.name+'</td>';
									html += '	<td onclick="setting_edu_management.edit_detail('+element.cat2Id+');" style="cursor:pointer;">'+element.code2.substring(`${element.siteId}`.length, element.code2.length)+'</td>';
									html += '	<td onclick="setting_edu_management.edit_detail('+element.cat2Id+');" style="cursor:pointer;">'+element.catName+'</td>';
									html += '	<td onclick="setting_edu_management.edit_detail('+element.cat2Id+');" style="cursor:pointer;text-align:left;">'+element.cat2Name+'</td>';
									html += '	<td onclick="setting_edu_management.edit_detail('+element.cat2Id+');" style="cursor:pointer;">'+cat2Active+'</td>';
									html += '</tr>';
								});
								
								console.log(detail_list);
							}
						} else {
							if (catType == 0) {
								html += '<tr><td colspan="6" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
							} else {
								html += '<tr><td colspan="7" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
							}
						}
						
						$('#'+tale_id+' .tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'setting_edu_management.get_list'));
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
		
		edit_detail: function (cat2Id) {
			var filter_data = detail_list.filter(function(item) { return item.cat2Id === cat2Id; });
		
			console.log(filter_data);

			if (filter_data.length) {
				var filter_data2 = cate_list.filter(function(item) { return item.catId === filter_data[0].catId; });
				var filter_data3 = site.filter(function(item) { return item.name === filter_data2[0].name; });
			
				console.log(filter_data2, filter_data3);

				if (filter_data.length && filter_data3.length) {
					$('#add_detail_form_update_id').val(filter_data[0].cat2Id);
					$('#add_detail_form_site').val(filter_data3[0].id).prop('selected', true).prop('disabled', true);
					
					var html = '<option value="">교육종류를 선택해주세요.</option>';
					$('#add_detail_form_cate').empty();
					var filter_data4 = site_cate.filter(function(item) { return item.siteId === filter_data3[0].id; });
					filter_data4.forEach(function(element){
						if (filter_data2[0].catId == element.id) html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
						else html += '<option value="'+element.id+'">'+element.name+'</option>';
					});
					$('#add_detail_form_cate').append(html);
					
					$('#add_detail_form_name').val(filter_data[0].cat2Name);
					//$('#add_detail_form_memo').val(filter_data[0].memo);
					
					var delta = quill.clipboard.convert(filter_data[0].memo);
					quill.setContents(delta, 'silent');
					
					if (filter_data[0].cat2Active) $('#add_detail_form_activation').prop('checked', true);
					else $('#add_detail_form_activation').prop('checked', false);
					
					$('#add_detail .mb40').text('교육 세부종류 수정');
					popOpenAndDim('add_detail', true);
				} else {
					alert('수정 정보를 불러오지 못했습니다.');
				}
			} else {
				alert('수정 정보를 불러오지 못했습니다.');
			}
		}, 
		
		edit_cate: function (catId) {
			var filter_data = cate_list.filter(function(item) { return item.catId === catId; });
		
			console.log(filter_data);

			if (filter_data.length) {
				var filter_data2 = site.filter(function(item) { return item.name === filter_data[0].name; });
				
				if (filter_data.length) {
					$('#add_cate_form_update_id').val(filter_data[0].catId);
					$('#add_cate_form_site').val(filter_data2[0].id).prop('selected', true).prop('disabled', true);
					$('#add_cate_form_name').val(filter_data[0].catName);
					
					$('#add_cate .mb40').text('교육종류 수정');
					popOpenAndDim('add_cate', true);
				} else {
					alert('수정 정보를 불러오지 못했습니다.');
				}
			} else {
				alert('수정 정보를 불러오지 못했습니다.');
			}
		}, 
		
		modal_close: function () {
			if ($('#add_cate').is(':visible')) {
				$('#add_cate .mb40').text('교육종류 추가');
				$('#add_cate_form_update_id').val('');
				$('#add_cate_form_site').val('').prop('selected', true).prop('disabled', false);
				$('#add_cate_form_name').val('');
				
				popClose('add_cate');
			} else {
				$('#add_detail .mb40').text('교육 세부종류 추가');
				$('#add_detail_form_update_id').val('');
				$('#add_detail_form_site').val('').prop('selected', true).prop('disabled', false);
				$('#add_detail_form_cate').html('<option value="">교육종류를 선택해주세요.</option>');
				$('#add_detail_form_name').val('');
				//$('#add_detail_form_memo').val('');
				quill.container.firstChild.innerHTML = '';
				$('#add_detail_form_activation').prop('checked', false);
				
				popClose('add_detail');
			}
		}, 
		
		select_delete: function () {
			if ($('#cate').hasClass('active')) {
				var tale_id = 'cate_table';
				var catType = 0;
			} else {
				var tale_id = 'detail_table';
				var catType = 1;
			}
			
			var select_list_str = '';
			var select_list = [];
			
			$('#'+tale_id+' .check:checked').each(function(){
				var catId = Number($(this).val());
				
				if ($('#cate').hasClass('active')) {
					var filter_data = cate_list.filter(function(item) { return item.catId === catId; });
				} else {
					var filter_data = detail_list.filter(function(item) { return item.cat2Id === catId; });
				}
				
				select_list.push(filter_data[0]);
				
				if (select_list_str) select_list_str += ',';
				select_list_str += catId;
			});
			
			console.log(select_list_str, select_list);
			
			var result = true;
			
			if ($('#cate').hasClass('active')) {
				select_list.forEach(function(element){
					if (element.cat2Cnt > 0) {
						alert(element.catName+' 교육은 세부종류가 있어 삭제가 불가능 합니다.');
						result = false;
					}
				});
			} else {
				select_list.forEach(function(element){
					if (element.eduCnt > 0) {
						alert(element.catName+' 생성된 교육 이력이 있어 삭제가 불가능 합니다.');
						result = false;
					}
				});
			}
			
			if (result) {
				$.ajax({
					type: 'POST',
					url: '/controller/setting_edu_management.php',
					dataType: 'json',
					cache: false,
					data: { 'module' : 'select_delete', 'catType' : catType, 'select_list_str' : select_list_str },
					success: function (response) {
						if (response.result) {
							popClose('alertDelete');
							setting_edu_management.get_query_site_cate();
							setting_edu_management.get_list();
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
	}
})();

//현장 선택 이벤트
$('#add_detail_form_site').on('change', function () {
	var site = Number($('#add_detail_form_site option:selected').val());
	var html = '<option value="">교육종류를 선택해주세요.</option>';
	
	$('#add_detail_form_cate').empty();
	
	if (site) {
		var filter_data = site_cate.filter(function(item) { return item.siteId === site; });

		console.log(site, site_cate, filter_data);

		if (filter_data.length) {
			filter_data.forEach(function(element){
				/*createdAt: "2021-09-28T16:50:38.000Z"
				id: 1
				isActive: true
				name: "정기안전보건교육"
				siteId: 1212055764
				updatedAt: "2021-10-04T08:46:44.000Z"*/
				html += '<option value="'+element.id+'">'+element.name+'</option>';
			});
		} else {
			alert('교육종류 정보를 불러오지 못했습니다.');
		}
	}
	
	$('#add_detail_form_cate').append(html);
});

//탭버튼 이벤트
$('.tab').on('click', function () {
	$('.tab').removeClass('active');
	$(this).addClass('active');
	
	$('.table').hide();
	$('#'+$(this).attr('id')+'_table').show();
	
	setting_edu_management.get_list(1);
});

//취소 이벤트
$('.cancel_btn').on('click', function () {
	setting_edu_management.modal_close();
});

//현장 선택 이벤트
$('#query_site_select').on('change', function () {
	$('#cate').trigger('click');
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	if ($('#cate').hasClass('active')) {
		popOpenAndDim('add_cate', true);
	} else {
		popOpenAndDim('add_detail', true);
	}
});

//삭제 선택 이벤트
$('#delete_btn').on('click', function () {
	if ($('#cate').hasClass('active')) {
		var tale_id = 'cate_table';
	} else {
		var tale_id = 'detail_table';
	}
	
	var check_cnt = $('#'+tale_id+' .check:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		popOpenAndDim('select_alert', true);
	}
});

// 교육종류 문서 추가 버튼 이벤트
$('#add_doc_btn').on('click', function () {
	$('#upload_file').trigger('click')
})

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	setting_edu_management.select_delete();
});

//추가 모달 저장 이벤트
$('#add_cate_form').on('submit', function() {
	var update_id	 = $('#add_cate_form_update_id').val();
	var site		 = $('#add_cate_form_site option:selected').val();
	var name		 = $('#add_cate_form_name').val();
	
	//console.log(site, name);
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/setting_edu_management.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_cate', 'update_id' : update_id, 'site' : site, 'name' : name },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				setting_edu_management.modal_close();
				
				if (update_id) {
					setting_edu_management.get_list();
				} else {
					setting_edu_management.get_list(total_page);
				}
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			stop_progress();
			alert(request+' '+status+' '+error);
		}	
	});
	
	return false;
});

//세부 추가 모달 저장 이벤트
$('#add_detail_form').on('submit', function() {
	var update_id	 = $('#add_detail_form_update_id').val();
	var site		 = $('#add_detail_form_site option:selected').val();
	var cate		 = $('#add_detail_form_cate option:selected').val();
	var name		 = $('#add_detail_form_name').val();
	//var memo		 = $('#add_detail_form_memo').val();
	var memo		 = quill.container.firstChild.innerHTML;
	var activation	 = ($('#add_detail_form_activation').is(':checked'))?1:0;
	
	if (memo == '<p><br></p>') memo = '';
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/setting_edu_management.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_detail', 'update_id' : update_id, 'site' : site, 'cate' : cate, 'name' : name, 'memo' : memo, 'activation' : activation },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				setting_edu_management.modal_close();
				
				if (update_id) {
					setting_edu_management.get_list();
				} else {
					setting_edu_management.get_list(total_page);
				}
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function(request, status, error){
			stop_progress();
			alert(request+' '+status+' '+error);
		}	
	});
	
	return false;
});

$(document).ready(function () {
	quill = new Quill('#add_detail_form_memo', {
		modules: {
			toolbar: toolbarOptions
		},
		placeholder: '교육내용을 작성해주세요.',
		theme: 'snow'
	});
	
	setting_edu_management.get_query_site();
	setting_edu_management.get_list();
});