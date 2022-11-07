var rows = 20;
var total_page = 0;
var page = 1;
var table_list = [];

var setting_equipment_management = (function () {
  
	return {
		get_list: function (link_page=0) {
			if (link_page) page = link_page;
			
			$('#tbody_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/setting_equipment_management.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'page' : page },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.list.length) {
							table_list = [];
							
							response.list.forEach(function(element, index){
								/*certCnt: 0
									createdAt: "2021-09-13T17:44:37.000Z"
									id: 21
									isActive: 1
									name: "공기압축기"
									updatedAt: null*/
								
								var no = (page - 1) * rows + (index + 1);
								var imsi = {
									"id" : element.id,
									"isActive" : element.isActive,
									"name" : element.name,
									"certCnt" : element.certCnt
								}
								table_list.push(imsi);
								
								if (element.isActive) {
									var isActive = '활성';
								} else {
									var isActive = '비활성';
								}
								
								html += '<tr>';
								html += '	<td>';
								html += '		<div class="inp-wrap">';
								html += '			<div class="inp-item">';
								html += '				<label for="cate_check_'+element.id+'">';
								html += '					<input type="checkbox" id="cate_check_'+element.id+'" class="check" value="'+element.id+'" count="'+element.cat2Cnt+'">';
								html += '					<p></p>';
								html += '				</label>';
								html += '			</div>';
								html += '		</div>';
								html += '	</td>';
								html += '	<td onclick="setting_equipment_management.edit_mode('+element.id+');" style="cursor:pointer;">'+no+'</td>';
								html += '	<td onclick="setting_equipment_management.edit_mode('+element.id+');" style="cursor:pointer;text-align:left;">'+element.name+'</td>';
								html += '	<td onclick="setting_equipment_management.edit_mode('+element.id+');" style="cursor:pointer;">'+isActive+'</td>';
								html += '</tr>';
							});
							
							console.log(table_list);
						} else {
							html += '<tr><td colspan="4" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
						}
						
						$('#tbody_list').append(html);
						
						total_page = Math.ceil(response.totCnt / rows);
						
						$('.paging').html(paging(10, page, total_page, 'setting_equipment_management.get_list'));
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
		
		edit_mode: function (id) {
			var filter_data = table_list.filter(function(item) { return item.id === id; });
		
			console.log(filter_data);

			if (filter_data.length) {
				$('#add_form_update_id').val(filter_data[0].id);
				$('#add_form_name').val(filter_data[0].name);
				
				if (filter_data[0].isActive) $('#add_form_activation').prop('checked', true);
				else $('#add_form_activation').prop('checked', false);
				
				$('#add_form .mb40').text('장비 수정');
				popOpenAndDim('addEquipmentkind', true);
			} else {
				alert('수정 정보를 불러오지 못했습니다.');
			}
		}, 
		
		modal_close: function () {
			$('#add_form .mb40').text('장비 추가');
			$('#add_form_update_id').val('');
			$('#add_form_name').val('');
			$('#add_form_activation').prop('checked', false);
			
			popClose('addEquipmentkind');
		}, 
		
		select_delete: function () {
			var select_list_str = '';
			var select_list = [];
			
			$('#tbody_list .check:checked').each(function(){
				var id = Number($(this).val());
				var filter_data = table_list.filter(function(item) { return item.id === id; });
				select_list.push(filter_data[0]);
				
				if (select_list_str) select_list_str += ',';
				select_list_str += id;
			});
			
			//console.log(select_list_str, select_list);
			
			var result = true;
			
			select_list.forEach(function(element){
				if (element.certCnt > 0) {
					alert(element.name+' 사용중으로 삭제가 불가능 합니다.');
					result = false;
				}
			});
			
			if (result) {
				$.ajax({
					type: 'POST',
					url: '/controller/setting_equipment_management.php',
					dataType: 'json',
					cache: false,
					data: { 'module' : 'select_delete', 'select_list_str' : select_list_str },
					success: function (response) {
						if (response.result) {
							popClose('alertDelete');
							setting_equipment_management.get_list();
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

//취소 이벤트
$('.cancel_btn').on('click', function () {
	setting_equipment_management.modal_close();
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	popOpenAndDim('addEquipmentkind', true);
});

//삭제 선택 이벤트
$('#delete_btn').on('click', function () {
	var check_cnt = $('#tbody_list .check:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		popOpenAndDim('select_alert', true);
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	setting_equipment_management.select_delete();
});

//추가 모달 저장 이벤트
$('#add_form').on('submit', function() {
	var update_id	 = $('#add_form_update_id').val();
	var name		 = $('#add_form_name').val();
	var activation	 = ($('#add_form_activation').is(':checked'))?1:0;
	
	//console.log(activation, name);
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/setting_equipment_management.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'update_id' : update_id, 'activation' : activation, 'name' : name },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				setting_equipment_management.modal_close();
				
				if (update_id) {
					setting_equipment_management.get_list();
				} else {
					setting_equipment_management.get_list(total_page);
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
	setting_equipment_management.get_list();
});