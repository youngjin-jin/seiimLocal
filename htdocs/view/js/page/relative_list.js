var relative_list = (function () {
  
	return {
		get_list: function () {
			var siteId = $('#siteId').val();
			
			$('#ul_list').empty();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/field_list_add.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'add_form', 'code' : siteId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						var html = '';
						
						if (response.info != null) {
							$('.owner').text(response.info.ownerName);
							$('.contractor').text(response.info.contractorName);
							
							response.info.joinCompany.forEach(function(element){
								/*addr: "공덕역 1번길"
								contractorName: "삼성물산"
								endDate: "2021-09-24T00:00:00.000Z"
								joinCompany: (3) [
									businessId: "1201212222"
									createdAt: "2021-09-16T14:53:23.000Z"
									id: 1
									memo: null
									name: "한국도로공사"
									phone: "023331111"
									updatedAt: "2021-09-16T14:53:23.000Z"
								]
								ownerName: "서울시"
								siteId: 1212055764
								siteName: "공덕역B공구"
								startDate: "2021-07-29T00:00:00.000Z"
								status: 1*/
								
								html += '<li id="com_'+element.id+'" onclick="relative_list.add_site('+element.id+', \''+element.name+'\');" class="li_content" data-val="'+element.name+'">';
								if(element.contractType == 0) {
									html += '	<p class="category bg-green">'+_lc['txt']['발주처']+'</p>';
								} else if(element.contractType == 1){
									html += '	<p class="category bg-green">'+_lc['txt']['시공사']+'</p>';
								} else {
									html += '	<p class="category bg-green">'+_lc['txt']['협력사']+'</p>';
								}
								html += '	<p class="tit">'+element.name+'</p>';


								let str = element.businessId;
								let first_no = str.substr(0, 3);
								let second_no = str.substr(3, 2);
								let third_no = str.substr(5, 5);
								html += '	<p class="tit">'+first_no+'-'+second_no+'-'+third_no+'</p>';								
								html += '</li>';
							});							
							$('#ul_list').append(html);
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
		
		add_site: function (comId, company) {
			$('#ul_list li').removeClass('on');
			$('#com_'+comId).addClass('on');
			$('#comId').val(comId);
			$('.company').text(company);
		}
	}
})();

//뒤로가기 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

//추가 선택 이벤트
$('#add_btn').on('click', function () {
	var comId = $('#comId').val();
	
	if (comId) popOpenAndDim('addRelative', true); else popOpenAndDim('empty_company', true);
});

//추가 선택 이벤트
$('#add_run_btn').on('click', function () {
	var siteId	 = $('#siteId').val();
	var comId	 = $('#comId').val();
	var agree	 = ($('#agree').is(':checked'))?true:false;
	
	if (!agree) {
		popCloseAndDim('addRelative', true); 
		popOpenAndDim('checkAgreement', true);
		return false;
	}
	
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/relative_list.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'siteId' : siteId, 'comId' : comId, 'agree' : agree },
		success: function (response) {
			stop_progress();
			console.log(response);
			
			if (response.result) {
				if (response.status == 0) {
					location.href = 'field_list.php';
				} else if (response.status == -1) {
					popCloseAndDim('addRelative', true);
					popOpenAndDim('guideFinish', true);
				} else {
					popCloseAndDim('addRelative', true);
					popOpenAndDim('guideOverlap', true);
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





$('#searchInput').on('keyup', function () {
	var _this = $(this);
	if(_this.val())
	{
		$(".li_content").each(function(index, item){
			var val_1 = $(this).data("val");
			var val_2 = _this.val();
			if(val_1.toUpperCase().includes(val_2.toUpperCase()))
			{
				$(this).show();
			}
			else
			{
				$(this).hide();
			}
		});
	}
	else
	{
		$(".li_content").show();
	}
});

$(document).ready(function () {
	relative_list.get_list();
});