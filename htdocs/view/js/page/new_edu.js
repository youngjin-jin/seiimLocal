var quill;

var new_edu = (function () {
  
	return {
		get_cat1: function () {
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
							var cat1 = $('#query_cat1').val();
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
								if (cat1 && cat1 == element.id) html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
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
		
		get_cat2: function () {
			var cat1 = $('#cat1 option:selected').val();
			$('#cat2').empty();

			run_progress();

			$.ajax({
				type: 'POST',
				url: '/controller/new_edu.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_cat2', 'cat1' : cat1 },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						if (response.list.length) {
							var cat2 = $('#query_cat2').val();
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

								if (cat1 && cat1 == element.id) html += '<option value="'+element.id+'" selected>'+element.name+'</option>';
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
		}
	}
})();

//날자 선택 이벤트
$('#select_date_btn').on('click', function () {
	var date_target = $('#date_target').val();
	var currentDate = $('.datepicker').datepicker('getDate');
	
	$('#'+date_target).val(currentDate.yyyymmdd());
	popCloseAndDim('viewCalendar', true);
});

//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//취소 이벤트
$('#cancel_btn').on('click', function () {
	popClose('viewCalendar');
});

//교육종류 선택 이벤트
$('#cat1').on('change', function () {
	new_edu.get_cat2();
});

//교육진행 이벤트
$('#add_form').on('submit', function() {
	var siteId			 = $('#key').val();
	var site_name		 = $('#site_name').val();
	var owner			 = $('#owner').val();
	var contractor		 = $('#contractor').val();
	var myCompany		 = $('#myCompany').val();
	var cat1			 = $('#cat1 option:selected').val();
	var cat2			 = $('#cat2 option:selected').val();
	var eduName			 = $('#eduName').val();
	var eduDate			 = $('#eduDate').val();
	var startTime		 = $('#startTime').val();
	var endTime			 = $('#endTime').val();
	var constructType	 = $('#constructType').val();
	var eduPlace		 = $('#eduPlace').val();
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

	if (doc == '<p><br></p>') doc = '';
	
	if (startTime.length != 5) {
		alert('교육시간을 확인하세요.');
		$('#startTime').focus();
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
	if(eduType.length == 0)
	{
		alert("교육방법을 한개이상 선택해주세요");
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/new_edu.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'siteId' : siteId, 'cat1' : cat1, 'cat2' : cat2, 'eduName' : eduName, 'eduDate' : eduDate, 'startTime' : startTime, 'endTime' : endTime, 'constructType' : constructType, 'eduPlace' : eduPlace, 'instructor' : instructor, 'doc' : doc, 'foredu' : foredu, 'eduType' : eduType },
		success : function(response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				alert('신규 교육을 생성하였습니다.');
				
				var url = 'edu_management.php?key='+siteId+'&site_name='+encodeURIComponent(site_name)+'&owner='+encodeURIComponent(owner)+'&contractor='+encodeURIComponent(contractor)+'&myCompany='+encodeURIComponent(myCompany);
				
				location.href = url;
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
	$('#startTime').mask('00:00');
	$('#endTime').mask('00:00');

	new_edu.get_cat1();

	quill = new Quill('#doc', {
		modules: {
			toolbar: false
		},
		placeholder: '미작성시 교육 내용이 자동입력됩니다.',
		theme: 'snow'
	});

	var query_doc = $('#query_doc').val();
	var delta = quill.clipboard.convert(query_doc);
	quill.setContents(delta, 'silent');
});