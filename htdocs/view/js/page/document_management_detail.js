var add_worker_list = [];
var relation_list = [];

var document_management_detail = (function () {
  
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
							
							$('#siteId').append(html).trigger('change');
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
			var siteId = $('#siteId option:selected').val();
			var docDiv = $('input[name="docDiv"]:checked').val();

			$('#templateId').html('');

			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/document_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_template', 'siteId' : siteId, 'docDiv' : docDiv },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var html = '';
							
							response.list.forEach(function(element){
								/*createdAt: "2021-09-28T16:50:38.000Z"
								docDiv: 0
								id: 2
								isActive: 1
								name: "신규채용자교육"
								siteId: 1212055764
								updatedAt: "2021-09-28T16:50:38.000Z"*/
								if ((docDiv == '-1' && (element.name != 'TBM'&& element.name != '2진아웃제' && element.name != '신규채용자 관리대장') || docDiv == '0' && element.name !='2진아웃제')) 
									html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#templateId').append(html).prop('disabled', false).trigger('change');
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

		draw_add_worker_list: function () {
			$('#add_worker_list').empty();
			var html = '';
			
			if (add_worker_list.length) {
				add_worker_list.forEach(function(element){
					/*birth: "1988-03-02T00:00:00.000Z"
					id: 34
					name: "아무개"
					svName: "수자원공사"*/
					
					html += '<tr>';
					html += '	<td>';
					html += '		<div class="inp-wrap">';
					html += '			<div class="inp-item">';
					html += '				<label for="check_'+element.id+'">';
					html += '					<input type="checkbox" id="check_'+element.id+'" class="check" value="'+element.id+'" birth="'+element.birth.substring(0, 10)+'" name="'+element.name+'" svName="'+element.svName+'">';
					html += '					<p></p>';
					html += '				</label>';
					html += '			</div>';
					html += '		</div>';
					html += '	</td>';
					html += '	<td>'+element.birth.substring(0, 10)+'</td>';
					html += '	<td>'+element.name+'</td>';
					html += '	<td>'+element.svName+'</td>';
					html += '</tr>';
				});
			} 
			
			$('#add_worker_list').append(html);
		},
		
		modal_close: function () {
			$('#search_relation').val();
			$('#relation_list').empty();
			
			popClose('viewEduList');
		},

		draw_relation_list: function () {
			$('#relation_ul').empty();
			var html = '';

			relation_list.forEach(function(element, index){
				html += '<li>';
				html += '	<p>'+element.eduName+'</p>';
				html += '	<button type="button" onclick="document_management_detail.relation_delete('+index+');" class="btn-ic ic-clear"></button>';
				html += '</li>';
			});

			$('#relation_ul').append(html);
		},

		relation_delete: function (index) {
			relation_list.splice(index, 1);
			document_management_detail.draw_relation_list();
		}
	}
})();

//템플릿명 선택 이벤트
$('#templateId').on('change', function () {
	relation_list = [];
	$('#relation_ul').empty();
	$('#relation_list').empty();
});

//기준 선택 이벤트
$('input[name="docDiv"]').on('click', function () {
	document_management_detail.get_template();
});

//현장 선택 이벤트
$('#siteId').on('change', function () {
	$('#templateId').html('').prop('disabled', true);
	document_management_detail.get_template();
});

//조건추가 선택 이벤트
$('#get_relation_btn').on('click', function() {
	popOpenAndDim('viewEduList', true);
});

//조건추가 이벤트
$('#add_relation_btn').on('click', function () {
	var check_cnt = $('#relation_list').find('input[type="radio"]:checked').length;

	if (check_cnt) {
		if (relation_list.length) {
			alert('이미 추가한 관련교육내역이 있습니다.');
			return false;
		}
		
		$('#relation_list .check:checked').each(function(){
			var id			 = parseInt($(this).val());
			var adminName	 = $(this).attr('adminName');
			var catName		 = $(this).attr('catName');
			var eduDate		 = $(this).attr('eduDate');
			var eduName		 = $(this).attr('eduName');
			var svName		 = $(this).attr('svName');
			
			var filter_data = relation_list.filter(function(item) { return item.id == id; });

			if (!filter_data.length) {
				var imsi = {
					"id" : id,
					"adminName" : adminName,
					"catName" : catName,
					"eduDate" : eduDate,
					"eduName" : eduName,
					"svName" : svName
				}
				relation_list.push(imsi);
			}
		});

		document_management_detail.modal_close();
		document_management_detail.draw_relation_list();
	} else {
		alert('추가할 관련교육을 선택하세요.');
	}
});

//관련교육 검색 이벤트
$('#search_form').on('submit', function() {
	var siteId			 = $('#siteId option:selected').val();
	var templateId		 = $('#templateId option:selected').val();
	var search_eduName	 = $('#search_eduName').val();

	if (!templateId) {
		alert('근로자 템플릿명을 선택하세요.');
		$('#templateId').focus();
		return false;
	}
	
	$('#relation_list').empty();
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/document_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'get_relation', 'siteId' : siteId, 'templateId' : templateId, 'search_eduName' : search_eduName },
		success : function(response) {
			stop_progress();
			console.log(response);
			
			if (response.result) {
				var html = '';
				
				if (response.list.length) {
					response.list.forEach(function(element, index){
						/*adminName: "saiifedu"
						catName: "신규채용자교육"
						eduDate: "2021-10-27T15:45:38.000Z"
						eduName: "신규채용 교육"
						id: 3
						svName: "철도시설공단"*/
					
						html += '<tr>';
						html += '	<td>';
						html += '		<div class="inp-wrap">';
						html += '			<div class="inp-item">';
						html += '				<label for="relation_list_check_'+index+'">';
						html += '					<input type="radio" id="relation_list_check_'+index+'" name="relation_list_check" class="check" value="'+element.id+'" adminName="'+element.adminName+'" catName="'+element.catName+'" eduDate="'+element.eduDate+'" eduName="'+element.eduName+'" svName="'+element.svName+'">';
						html += '					<p></p>';
						html += '				</label>';
						html += '			</div>';
						html += '		</div>';
						html += '	</td>';
						html += '	<td style="padding:0 5px;">'+element.eduDate.substring(0, 10)+'</td>';
						html += '	<td style="padding:0 5px;">'+element.catName+'</td>';
						html += '	<td style="padding:0 5px;">'+element.eduName+'</td>';
						html += '	<td style="padding:0 5px;">'+element.adminName+'</td>';
						html += '	<td style="padding:0 5px;">'+element.svName+'</td>';
						html += '</tr>';
					});
				} else {
					html += '<tr><td colspan="6" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
				}
				
				$('#relation_list').append(html);
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

//근로자 엔터키 이벤트
$('#search_worker').on('keyup', function (event) {
	if (event.keyCode === 13) {
		$('#search_worker_btn').trigger('click');
	}
});

//근로자 검색 이벤트
$('#search_worker_btn').on('click', function () {
	var siteId			 = $('#siteId option:selected').val();
	var search_worker	 = $('#search_worker').val();
	var eduIds			 = '';

	relation_list.forEach(function(element, index){
		var id = element.id;

		if (eduIds) eduIds += ',';
		eduIds += id;
	});

	if (!eduIds) {
		alert('관련교육내역을 추가하신 후 시도해 주세요.');
		return false;
	}

	$('#worker_list').empty();

	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/document_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'get_relation_worker', 'siteId' : siteId, 'search_worker' : search_worker, 'eduIds' : eduIds },
		success: function (response) {
			stop_progress();
			console.log(response);
			
			if (response.result) {
				if (response.list.length) {
					var html = '';
					
					response.list.forEach(function(element){
						/*birth: "1988-03-02T00:00:00.000Z"
						id: 34
						name: "아무개"
						svName: "수자원공사"*/

						if (search_worker) {
							if (element.name.indexOf(search_worker) != -1) {
								html += '<tr>';
								html += '	<td>';
								html += '		<div class="inp-wrap">';
								html += '			<div class="inp-item">';
								html += '				<label for="worker_list_check_'+element.id+'">';
								html += '					<input type="checkbox" id="worker_list_check_'+element.id+'" class="check" value="'+element.id+'" birth="'+element.birth+'" name="'+element.name+'" svName="'+element.svName+'">';
								html += '					<p></p>';
								html += '				</label>';
								html += '			</div>';
								html += '		</div>';
								html += '	</td>';
								html += '	<td>'+element.birth.substring(0, 10)+'</td>';
								html += '	<td>'+element.name+'</td>';
								html += '	<td>'+element.svName+'</td>';
								html += '</tr>';
							}
						} else {
							html += '<tr>';
							html += '	<td>';
							html += '		<div class="inp-wrap">';
							html += '			<div class="inp-item">';
							html += '				<label for="worker_list_check_'+element.id+'">';
							html += '					<input type="checkbox" id="worker_list_check_'+element.id+'" class="check" value="'+element.id+'" birth="'+element.birth+'" name="'+element.name+'" svName="'+element.svName+'">';
							html += '					<p></p>';
							html += '				</label>';
							html += '			</div>';
							html += '		</div>';
							html += '	</td>';
							html += '	<td>'+element.birth.substring(0, 10)+'</td>';
							html += '	<td>'+element.name+'</td>';
							html += '	<td>'+element.svName+'</td>';
							html += '</tr>';
						}
					});
					
					$('#worker_list').append(html);
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
});

//교육 이수자 <- 버튼 이벤트
$('#left_worker_btn').on('click', function () {
	var check_cnt = $('#add_worker_list').find('input[type="checkbox"]:checked').length;

	if (check_cnt) {
		$('#add_worker_list .check:checked').each(function(){
			var id			 = $(this).val();
			var birth		 = $(this).attr('birth');
			var name		 = $(this).attr('name');
			var svName		 = $(this).attr('svName');
			
			var index = add_worker_list.findIndex(x => x.id === id);
			add_worker_list.splice(index, 1);

			$(this).parent().parent().parent().parent().parent().remove();
		});

		document_management_detail.draw_add_worker_list();
	} else {
		alert('제거할 교육 이수자를 선택하세요.');
	}
});

//교육 이수자 -> 버튼 이벤트
$('#right_worker_btn').on('click', function () {
	var check_cnt = $('#worker_list').find('input[type="checkbox"]:checked').length;

	if (check_cnt) {
		$('#worker_list .check:checked').each(function(){
			var id			 = $(this).val();
			var birth		 = $(this).attr('birth');
			var name		 = $(this).attr('name');
			var svName		 = $(this).attr('svName');
			
			var filter_data = add_worker_list.filter(function(item) { return item.id == id; });

			if (!filter_data.length) {
				var imsi = {
					"id" : id,
					"birth" : birth,
					"name" : name,
					"svName" : svName
				}
				add_worker_list.push(imsi);
			}
		});

		$('#worker_list .check').prop('checked', false);
		document_management_detail.draw_add_worker_list();
	} else {
		alert('추가할 교육 이수자를 선택하세요.');
	}
});

//전체선택 이벤트
$('.all_check').on('click', function () {
	var target = $(this).attr('target');

	if ($(this).is(':checked')) {
		$('#'+target+' .check').prop('checked', true);
	} else {
		$('#'+target+' .check').prop('checked', false);
	}
});

//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//교육사진 추가 선택 이벤트
$('#add_img_btn').on('click', function () {
	$('#upload_file').trigger('click');
});

//저장 이벤트
$('#submit_btn').on('click', function () {
	$('#add_form').trigger('submit');
});

//저장 이벤트
$('#add_form').on('submit', function() {
	var key				 = $('#key').val();
	var siteId			 = $('#siteId option:selected').val();
	var docDiv			 = $('input[name="docDiv"]:checked').val();
	var templateId		 = $('#templateId option:selected').val();
	var docName			 = $('#docName').val();
	var workerIds		 = '';
	var eduId			 = relation_list[0].id;

	add_worker_list.forEach(function(element){
		if (workerIds) workerIds += ',';
		workerIds += element.id;
	});

	if (!docName) {
		alert('문서명을 입력하세요.');
		$('#docName').focus();
		return false;
	}

	if (!workerIds) {
		alert('교육 이수자를 추가하신 후 저장해 주세요.');
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/document_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'key' : key, 'siteId' : siteId, 'docDiv' : docDiv, 'templateId' : templateId, 'docName' : docName, 'workerIds' : workerIds, 'eduId' : eduId },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				location.href = 'document_management.php';
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
	var key = $('#key').val();

	document_management_detail.get_query_site();

	if (key) document_management_detail.get_list();
});