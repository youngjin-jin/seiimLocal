var worker_list = [];
var search_worker_list = [];
var add_worker_list = [];
var table_list = [];
var img_list = [];
var old_table_list = '';
var old_img_list = '';

var quill;
var toolbarOptions = [
	[{ 'header': [1, 2, 3, 4, 5, 6, false] }],
	['bold', 'italic', 'underline', 'strike'],        // toggled buttons
	[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
	[{ 'list': 'ordered'}, { 'list': 'bullet' }],     // text direction
	[{ 'align': [] }]
];

var edu_history_management_detail = (function () {
  
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

		get_cat1: function (selected_value=0, selected_siteId=0) {
			if (selected_value) {
				var siteId = selected_siteId;	
			} else {
				var siteId = $('#siteId option:selected').val();
			}

			$('#cat1').html('');

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
								if (selected_value && selected_value == element.id) html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
								else html += '<option value="'+element.id+'">'+element.name+'</option>';
							});
							
							$('#cat1').append(html).trigger('change');
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

		get_cat2: function (selected_value=0, selected_cat1=0) {
			if (selected_cat1) {
				var cat1 = selected_cat1;	
			} else {
				var cat1 = $('#cat1 option:selected').val();
			}

			$('#cat2').html('');

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

								if (selected_value && selected_value == element.id) html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
								else html += '<option value="'+element.id+'">'+element.name+'</option>';
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

		get_list: function () {
			var key = $('#key').val();
			
			table_list = [];
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'key' : key },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						/*adminId: 3
						attach: (3) [{…}, {…}, {…}]
						cat1: 2
						cat2: 4
						constructType: "공종2"
						createdAt: "2021-10-27T15:47:12.000Z"
						doc: null
						eduDate: "2021-10-27T15:45:38.000Z"
						eduName: "신규채용 교육"
						eduPlace: "대강당"
						endTime: "13:45:36"
						id: 3
						instructor: "노두현"
						memo: null
						siteId: 1212055764
						startTime: "12:12:32"
						sv: 3
						templateId: 2
						updatedAt: "2021-10-27T15:47:13.000Z"
						eduWorkerList: (2) [{…}, {…}]*/
						console.log(response.info.eduName);

						$('#eduName').val(response.info.eduName);
						$('#eduDate').val(response.info.eduDate.substring(0, 10));
						$('#eduPlace').val(response.info.eduPlace);
						$('#startTime').val(response.info.startTime.substring(0, 5));
						$('#endTime').val(response.info.endTime.substring(0, 5));
						$('#constructType').val(response.info.constructType);
						$('#instructor').val(response.info.instructor);
						$('#foredu').val(response.info.foredu);						
						
						var eduType = response.info.eduType;
						console.log('asdf');
						console.log(eduType);
						
						$(".eduType").each(function() {  
							console.log($.inArray($(this).val(), eduType));
							if($.inArray($(this).val(), eduType) != -1)
							{
								$(this).attr('checked', true);
							}
															
						});		

						if (response.info.doc == null) response.info.doc = '';
						var delta = quill.clipboard.convert(response.info.doc);
						quill.setContents(delta, 'silent');
						
						old_img_list = JSON.stringify(response.info.attach);

						response.info.attach.forEach(function(element){
							/*createdAt: "2021-10-27T14:57:34.000Z"
							id: 1
							path: "https://dev-storage.saiifedu.com/images.jpeg"
							updatedAt: "2021-10-27T14:57:33.000Z"*/

							

							img_list.push(element);
						});

						edu_history_management_detail.draw_img_list();
						console.log(response.info.eduWorkerList);
						response.info.eduWorkerList.forEach(function(element){
							/*accId: 34
							birth: "1988-03-02T00:00:00.000Z"
							createdAt: "2021-10-27T15:48:01.000Z"
							name: "아무개"*/
							//element.myCompanyname = element.myCompany;
							
							worker_list.push(element);
						});
						
						edu_history_management_detail.draw_worker_list();

						setTimeout(function(){
							$('#siteId').val(String(response.info.siteId)).prop('selected', true).prop('disabled', true);
							edu_history_management_detail.get_cat1(response.info.cat1);
							edu_history_management_detail.get_cat2(response.info.cat2, response.info.cat1);
						}, 400);
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

		draw_worker_list: function () {
			$('#worker_list').empty();
			var html = '';
			console.log("test" + worker_list)
			if (worker_list.length) {
				worker_list.forEach(function(element, index){
					/*accId: 34
					birth: "1988-03-02T00:00:00.000Z"
					createdAt: "2021-10-27T15:48:01.000Z"
					name: "아무개"*/
					
					html += '<tr>';
					html += '	<td>';
					html += '		<div class="inp-wrap">';
					html += '			<div class="inp-item">';
					html += '				<label for="worker_list_check_'+element.accId+'">';
					html += '					<input type="checkbox" id="worker_list_check_'+element.accId+'" class="check" value="'+element.accId+'" birth="'+element.birth.substring(0, 10)+'" name="'+element.name+'" myCompanyId="'+element.myCompanyId+'">';
					html += '					<p></p>';
					html += '				</label>';
					html += '			</div>';
					html += '		</div>';
					html += '	</td>';
					html += '	<td>'+(index+1)+'</td>';
					html += '	<td>'+element.name+'</td>';
					html += '	<td>'+element.birth.substring(0, 10)+'</td>';
					html += '	<td>'+element.myCompanyName+'</td>';
					html += '</tr>';
				});
			} 
			
			$('#worker_list').append(html);
		},

		draw_add_worker_list: function () {
			$('#add_worker_list').empty();
			var html = '';
			
			if (add_worker_list.length) {
				add_worker_list.forEach(function(element){
					/*accId: 34
					birth: "1988-03-02T00:00:00.000Z"
					myCompany: "수자원공사"
					name: "아무개"*/
					
					html += '<tr>';
					html += '	<td>';
					html += '		<div class="inp-wrap">';
					html += '			<div class="inp-item">';
					html += '				<label for="check_'+element.accId+'">';
					html += '					<input type="checkbox" id="check_'+element.accId+'" class="check" value="'+element.accId+'" birth="'+element.birth.substring(0, 10)+'" name="'+element.name+'" myCompany="'+element.myCompany+ '"myCompanyId="' + element.myCompanyId + '">';
					html += '					<p></p>';
					html += '				</label>';
					html += '			</div>';
					html += '		</div>';
					html += '	</td>';
					html += '	<td>'+element.birth.substring(0, 10)+'</td>';
					html += '	<td>'+element.name+'</td>';
					html += '	<td>'+element.myCompany+'</td>';
					html += '</tr>';
				});
			} 
			
			$('#add_worker_list').append(html);
		},
		
		draw_img_list: function () {
			$('#img_list').empty();
			var html = '';

			img_list.forEach(function(element, index){
				html += '<li style="width:120px;float:left;">';
				html += '	<div class="inp-wrap">';
				html += '		<div class="inp-item">';
				html += '			<label for="img_list_'+index+'">';
				html += '				<input type="checkbox" id="img_list_'+index+'" class="check" name="img_list_'+index+'" value="'+element.path+'">';
				html += '				<p></p>';
				html += '			</label>';
				html += '		</div>';
				html += '	</div>';
				html += '	<img src="'+element.path+'">';
				html += '</li>';
			});

			$('#img_list').append(html);
		},
		
		modal_close: function () {
			search_worker_list = [];
			add_worker_list = [];
			
			$('#search_worker_list').empty();
			$('#add_worker_list').empty();
			$('#all_check').prop('checked', false);
			$('#all_check2').prop('checked', false);
			
			popClose('addTrainee');
		},
		
		select_delete: function () {
			$('#worker_list .check:checked').each(function(){
				var accId		 = parseInt($(this).val());
				var birth		 = $(this).attr('birth');
				var myCompany	 = $(this).attr('myCompany');
				var name		 = $(this).attr('name');
				
				var index = worker_list.findIndex(x => x.accId === accId);
				worker_list.splice(index, 1);
	
				$(this).parent().parent().parent().parent().parent().remove();
			});

			popClose('alertDelete');
			edu_history_management_detail.draw_worker_list();
		},

		img_list_delete: function () {
			var del_file = '';

			$('#img_list .check:checked').each(function(){
				var filename = $(this).val();
				
				if (del_file) del_file += ',';
				del_file += filename;
			});

			run_progress();

			$.ajax({
				type: 'POST',
				url: '/controller/edu_history_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'img_list_delete', 'del_file' : del_file },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						$('#img_list .check:checked').each(function(){
							var filename = $(this).val();
							
							var index = img_list.findIndex(x => x.path === filename);
							img_list.splice(index, 1);
						});

						edu_history_management_detail.draw_img_list();
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

//근로자 검색 이벤트
$('#search_form').on('submit', function() {
	var siteId	 = $('#siteId option:selected').val();
	var name	 = $('#name').val();
	var svName	 = $('#svName').val();
	
	$('#search_worker_list').empty();
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/edu_history_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'search_worker', 'siteId' : siteId, 'name' : name, 'svName' : svName },
		success : function(response) {
			stop_progress();
			console.log(response);
			
			if (response.result) {
				search_worker_list = response.list;
				var html = '';
				
				if (search_worker_list.length) {
					search_worker_list.forEach(function(element, index){
						/*accId: 1
						birth: null
						myCompany: "수자원공사"
						name: "test"*/

						if (element.birth == null) element.birth = '';
						if (element.myCompany == null) element.myCompany = '';
					
						html += '<tr>';
						html += '	<td>';
						html += '		<div class="inp-wrap">';
						html += '			<div class="inp-item">';
						html += '				<label for="search_worker_list_check_'+index+'">';
						html += '					<input type="checkbox" id="search_worker_list_check_'+index+'" class="check" value="'+element.accId+'" birth="'+element.birth+'" myCompany="'+element.myCompany+'" name="'+element.name+'" myCompanyId="' + element.myCompanyId + '">';
						html += '					<p></p>';
						html += '				</label>';
						html += '			</div>';
						html += '		</div>';
						html += '	</td>';
						html += '	<td>'+element.birth.substring(0, 10)+'</td>';
						html += '	<td>'+element.name+'</td>';
						html += '	<td>'+element.myCompany+'</td>';
						html += '</tr>';
					});
				} else {
					html += '<tr><td colspan="4" style="padding:50px;background-color:#fff;">데이터가 없습니다.</td></tr>';
				}
				
				$('#search_worker_list').append(html);
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

//교육 이수자 <- 버튼 이벤트
$('#left_worker_btn').on('click', function () {
	var check_cnt = $('#add_worker_list').find('input[type="checkbox"]:checked').length;

	if (check_cnt) {
		$('#add_worker_list .check:checked').each(function(){
			var accId		 = $(this).val();
			var birth		 = $(this).attr('birth');
			var myCompany	 = $(this).attr('myCompany');
			var name		 = $(this).attr('name');
			
			var index = add_worker_list.findIndex(x => x.accId === accId);
			add_worker_list.splice(index, 1);

			$(this).parent().parent().parent().parent().parent().remove();
		});

		edu_history_management_detail.draw_add_worker_list();
	} else {
		alert('제거할 교육 이수자를 선택하세요.');
	}
});

//교육 이수자 -> 버튼 이벤트
$('#right_worker_btn').on('click', function () {
	var check_cnt = $('#search_worker_list').find('input[type="checkbox"]:checked').length;

	if (check_cnt) {
		var mbid = new Array();
		var over_mbid = new Array();
		var name_arr = new Array()

		$('#search_worker_list .check:checked').each(function(){
			var accId		 = $(this).val();
			var birth		 = $(this).attr('birth');
			var myCompany	 = $(this).attr('myCompany');
			var myCompanyId = $(this).attr('myCompanyId');
			var name		 = $(this).attr('name');
			
			var filter_data = add_worker_list.filter(function(item) { return item.accId == accId; });


			if(!mbid.includes(accId))
			{
				console.log(1);
				mbid.push(accId);
			}
			else
			{
				console.log(2);
				over_mbid.push(accId);
			}
		});
		

		var temp_arr = new Array();

		$('#search_worker_list .check:checked').each(function(){

			
			var accId		 = $(this).val();
			var birth		 = $(this).attr('birth');
			var myCompany	 = $(this).attr('myCompany');
			var myCompanyId	 = $(this).attr('myCompanyId');
			var name		 = $(this).attr('name');
			temp_arr.push(accId);
			var filter_data = add_worker_list.filter(function(item) { return item.accId == accId; });
			if (!filter_data.length && !over_mbid.includes(accId)) {
				var imsi = {
					"accId" : accId,
					"birth" : birth,
					"myCompany" : myCompany,
					"myCompanyId" : myCompanyId,
					"name" : name
				}
				add_worker_list.push(imsi);
			}
			else
			{	
				alert("이미 추가되어있는 근로자입니다. 소속업체를 확인해주세요")
				name_arr.push(name);
			}			
		});






		var removeOverLapArr1 = [];
		name_arr.forEach(function(item, index){
			if(!removeOverLapArr1.includes(item)){
				removeOverLapArr1.push(item);
			}
		});
		if(removeOverLapArr1.length != 0)
		{
			if(temp_arr.length != 1)
			{
				alert("여러 개의 소속정보를 가진 근로자가 있습니다.\n 소속업체를 선택해 입력해주세요. \n 해당 근로자명 :  " + removeOverLapArr1.join(","));
			}
		}


		$('#search_worker_list .check').prop('checked', false);
		edu_history_management_detail.draw_add_worker_list();
	} else {
		alert('추가할 교육수료자를 선택하세요.');
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

//추가 선택 이벤트
$('#add_worker_btn').on('click', function () {
	var check_cnt = $('#add_worker_list').find('input[type="checkbox"]').length;

	if (check_cnt) {
		
		$('#add_worker_list .check').each(function(){
			var accId		 = parseInt($(this).val());
			var birth		 = $(this).attr('birth');
			var myCompany	 = $(this).attr('myCompany');
			var myCompanyId	 = $(this).attr('myCompanyId');
			var name		 = $(this).attr('name');
			var myCompanyName		 = $(this).attr('mycompany');
			
			var filter_data = worker_list.filter(function(item) { return item.accId == accId; });

			if (!filter_data.length) {
				var imsi = {
					"accId" : accId,
					"birth" : birth,
					"createdAt" : "",
					"name" : name,
					"myCompanyId": myCompanyId,
					"myCompanyName" : myCompanyName,
					"myCompany": myCompany,
				}
				worker_list.push(imsi);
			}
		});

		edu_history_management_detail.modal_close();
		edu_history_management_detail.draw_worker_list();
	} else {
		alert('추가할 교육수료자를 선택하세요.');
	}
});

//현장 선택 이벤트
$('#siteId').on('change', function () {
	$('#cat2').html('');
	edu_history_management_detail.get_cat1();
});

//교육종류 선택 이벤트
$('#cat1').on('change', function () {
	var cat1 = $('#cat1 option:selected').val();

	if (cat1 != '-1') {
		edu_history_management_detail.get_cat2();
	} else {
		$('#cat2').html('').prop('disabled', true);
	}
});

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());
	popClose('viewCalendar', true);
});

//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//교육사진 추가 선택 이벤트
$('#add_img_btn').on('click', function () {
	$('#upload_file').trigger('click');
});

//교육수료 근로자 추가 선택 이벤트
$('#add_basic_worker_btn').on('click', function () {
	edu_history_management_detail.modal_close();
	popOpenAndDim('addTrainee', true);
});

//이미지 업로드
$(document).on('change', '#upload_file', function() {
	if ($(this).val()) {
		var file_data	 = new FormData();
		var fileList	 = $(this)[0].files;
		
		file_data.append('module', 'add_img');
		file_data.append('count', fileList.length);

		for (var i=0; i < fileList.length; i++) {
			var file = fileList[i];
			file_data.append('upload_file_'+i, file);
		}
		
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/edu_history_management_detail.php',
			dataType: 'json',
			cache: false,
			data: file_data,
			processData: false,
			contentType: false, 
			success : function(response) {
				stop_progress();
				console.log(response);
				
				if (navigator.userAgent.toLowerCase().indexOf('msie') != -1) {
					// ie 일때
					$('#upload_file').replaceWith($('#upload_file').clone(true));
				} else { 
					// other browser 일때 
					$('#upload_file').val('');
				}
				
				//console.log(response);

				if (response.result) {
					response.img.forEach(function(element){
						var imsi = {
							"createdAt" : "",
							"id" : "",
							"path" : element,
							"updatedAt" : "",
						}

						img_list.push(imsi);
					});

					edu_history_management_detail.draw_img_list();
				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			},
			error: function(request, status, error){
				stop_progress();
				alert(request+' '+status+' '+error);
			}	
		});
	}
});

//교육사진 삭제 선택 이벤트
$('#delete_img_btn').on('click', function () {
	var check_cnt = $('#img_list').find('input[type="checkbox"]:checked').length;
	
	if (check_cnt) {
		edu_history_management_detail.img_list_delete();
	} else {
		alert('삭제할 교육사진을 선택하세요.');
	}
});

//삭제 선택 이벤트
$('#delete_btn').on('click', function () {
	var check_cnt = $('#worker_list').find('input[type="checkbox"]:checked').length;
	
	if (check_cnt) {
		popOpenAndDim('alertDelete', true);
	} else {
		alert('삭제할 교육수료 근로자를 선택하세요.');
	}
});

//삭제 이벤트
$('#delete_run_btn').on('click', function () {
	edu_history_management_detail.select_delete();
});

//저장 이벤트
$('#add_form').on('submit', function() {
	var key				 = $('#key').val();
	var siteId			 = $('#siteId option:selected').val();
	var eduName			 = $('#eduName').val();
	var cat1			 = $('#cat1 option:selected').val();
	var cat2			 = $('#cat2 option:selected').val();
	var eduDate			 = $('#eduDate').val();
	var eduPlace		 = $('#eduPlace').val();
	var startTime		 = $('#startTime').val();
	var endTime			 = $('#endTime').val();
	var constructType	 = $('#constructType').val();
	var instructor		 = $('#instructor').val();
	var foredu		 	 = $('#foredu').val();


	var eduType = new Array();		

	

	$(".eduType").each(function() { 			
		if($(this).is(":checked"))
		{
			eduType.push($(this).val());
		}			
	});	




	var doc				 = quill.container.firstChild.innerHTML;
	var applyWorkers	 = '';
	var images			 = '';
	var delPicList		 = '';
	var attach			 = '';

	if (doc == '<p><br></p>') doc = '';
	var jsonArr = []
	worker_list.forEach(function(element){

		jsonArr.push({accId: element.accId, myCompany: element.myCompanyId})
	});

	applyWorkers = JSON.stringify(jsonArr)

	if (key) {
		var img_list_json = JSON.stringify(img_list);

		if (img_list_json != old_img_list) {
			old_img_list_json = JSON.parse(old_img_list);

			old_img_list_json.forEach(function(element){
				var filter_data = img_list.filter(function(item) { return item.path == element.path; });

				if (!filter_data.length && element.id) {
					if (delPicList) delPicList += ',';
					delPicList += element.id;
				}
			});

			//console.log(delPicList);

			img_list.forEach(function(element){
				var filter_data = old_img_list_json.filter(function(item) { return item.path == element.path; });

				if (filter_data.length) {
					if (attach) attach += ',';
					attach += element.id;
				} else {
					if (images) images += ',';
					images += element.path;
				}
			});

			//console.log(images);
		} else {
			img_list.forEach(function(element){
				if (attach) attach += ',';
				attach += element.id;
			});
		}

		//console.log(attach);
	} else {
		img_list.forEach(function(element){
			if (images) images += ',';
			images += element.path;
		});
	}
	
	if (startTime.length != 5) {
		alert('교육시간을 확인하세요.');
		$('#startTime').focus();
		return false;
	}
	if(eduType.length == 0)
	{
		alert("교육방법을 한개이상 선택해주세요");
		return false;
	}
	if (endTime.length != 5) {
		alert('교육시간을 확인하세요.');
		$('#startTime').focus();
		return false;
	}
	
	var imsi = startTime.split(':');
	
	if (parseInt(imsi[0]) < 0 || parseInt(imsi[0]) > 23 || parseInt(imsi[1]) < 0 || parseInt(imsi[1]) > 59) {
		alert('교육시간을 확인하세요.');
		$('#startTime').focus();
		return false;
	}
	
	var imsi = endTime.split(':');
	
	if (parseInt(imsi[0]) < 0 || parseInt(imsi[0]) > 23 || parseInt(imsi[1]) < 0 || parseInt(imsi[1]) > 59) {
		alert('교육시간을 확인하세요.');
		$('#endTime').focus();
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/edu_history_management_detail.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'key' : key, 'siteId' : siteId, 'eduName' : eduName, 'cat1' : cat1, 'cat2' : cat2, 'eduDate' : eduDate, 'eduPlace' : eduPlace, 'startTime' : startTime, 'endTime' : endTime, 'constructType' : constructType, 'instructor' : instructor, 'doc' : doc, 'applyWorkers' : applyWorkers, 'images' : images, 'delPicList' : delPicList, 'attach' : attach, 'foredu' : foredu, 'eduType' : eduType },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				location.href = 'edu_history_management.php';
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

	quill = new Quill('#doc', {
		modules: {
			toolbar: toolbarOptions
		},
		placeholder: '미작성시 교육 내용이 자동입력됩니다.',
		theme: 'snow'
	});
	$('#startTime').mask('00:00');
	$('#endTime').mask('00:00');
	
	edu_history_management_detail.get_query_site();
	if (!key){ 
		console.log("키가없음");
		$("#eduPlace").val('안전교육장');
		$(".eduType").eq(0).attr("checked", true);
	}
	if (key) edu_history_management_detail.get_list();
});