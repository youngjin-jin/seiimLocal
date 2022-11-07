var link_img = '';

var profile = (function () {
  
	return {
		get_data: function () {
			var workerId = $('#workerId').val();

			$.ajax({
				type: 'POST',
				url: '/controller/profile.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_data', 'workerId' : workerId },
				success: function (response) {
					console.log(response);
					
					if (response.result) {
						/*addr1: "경기 용인시 기흥구 기흥단지로 5"
						addr2: "3층"
						birth: "1988-03-02T00:00:00.000Z"
						certList: (2) [{…}, {…}]
						createdAt: "2021-10-19T04:31:05.000Z"
						deletedAt: null
						id: 34
						identity: {accId: 34, img: 'https://dev-storage.saiifedu.com/9027428004767295.jpg', createdAt: '2021-10-19T11:03:53.000Z', updatedAt: '2021-10-20T03:03:39.000Z', deletedAt: null}
						isMale: true
						isTemp: false
						level: 100
						married: true
						name: "아무개"
						national: "대한민국(Republic of Korea)"
						occupation: "직영근로자"
						phone1: "01023778152"
						phone2: "01023778152"
						profile: "https://dev-storage.saiifedu.com/8017526372367123.jpg"
						sign: "https://dev-storage.saiifedu.com/5983480260862621.png"
						updatedAt: "2021-11-11T12:03:33.000Z"
						userId: "worker1"
						userPw: "$2b$04$Hf9.Nix83g8OYCJzZJdZ5ukcwKGadGmmC8erelH.K/UCR8qdF7cEa"*/
						
						if (response.info.profile) {
							$('#profile_img').attr('src', response.info.profile);
							$('#profile_img').addClass('link_img');
						} else {
							$('#profile_img').attr('src', '/view/images/avatar.jpg');
							$('#profile_img').removeClass('link_img');
						}
						if (response.info.name) $('#name').text(response.info.name);
						if (response.info.phone1) $('#phone1').text(autoHypenPhone(response.info.phone1));
						if (!response.info.isMale) $('#sex').text('여자'); else $('#sex').text('남자'); 
						if (response.info.birth) $('#birth').text(response.info.birth.substring(0, 10));
						if (response.info.addr2) response.info.addr1 += '<br/>'+response.info.addr2;
						if (response.info.addr1) $('#adress1').html(response.info.addr1);
						if (response.info.married) $('#married').text('기혼'); else $('#married').text('미혼');
						if (response.info.national) $('#nationality').text(response.info.national);

						if (response.info.national) $('#nationality').text(response.info.national);


						//response.info.basicOSH.substr(0, 1);


						if (response.info.phone2) {
							$('#phone2').text(autoHypenPhone(response.info.phone2));
							$('#phone2').parent().show();
						} else {
							$('#phone2').parent().hide();
						}
						if (response.info.identity) {
							if (response.info.identity.img) $('#id_card').html('<img src="'+response.info.identity.img+'" class="link_img" style="border-radius:5px;">');
						}
						console.log(response.info.basicOSH);
						if (response.info.basicOSH) {
							
							if (response.info.basicOSH.certDate) $('#gradu-date').html(response.info.basicOSH.certDate.substring(0, 10));
							if (response.info.basicOSH.img) $('#safe_certi').html('<img src="'+response.info.basicOSH.img+'" class="link_img" style="border-radius:5px;">');
						}
						var html = '';	

						console.log(response.info.certList);
						var certList = response.info.certList[0];
						
						certList.forEach(function(element, index){
							/*accId: 34
							certDate: "1988-12-12T00:00:00.000Z"
							certName: "불도저"
							createdAt: "2021-10-01T01:30:00.000Z"
							deletedAt: null
							id: 1
							img: "https://dev-storage.saiifedu.com/0004740986346083442.jpg"
							type: 1
							updatedAt: "2021-11-01T02:05:09.000Z"*/
							if (index == 0) var mt20 = ''; else var mt20 = 'mt20';
							html += '<div class="certi_image_box">';
							html += '<p>'+element.name+'</p>';
							html += '<img src="'+element.img+'" alt="">';
							html += '</div>';
						});	
						$('#certi_image').html(html);
						var etc_html = '';
						response.info.etc.forEach(function(element, index){
							/*accId: 34
							certDate: "1988-12-12T00:00:00.000Z"
							certName: "불도저"
							createdAt: "2021-10-01T01:30:00.000Z"
							deletedAt: null
							id: 1
							img: "https://dev-storage.saiifedu.com/0004740986346083442.jpg"
							type: 1
							updatedAt: "2021-11-01T02:05:09.000Z"*/
							if (index == 0) var mt20 = ''; else var mt20 = 'mt20';							
							etc_html += '<div class="'+mt20+'">';
							etc_html += '	<img src="'+element.img+'" class="link_img">';
							etc_html += '</div>';
						});		
						$("#add_upload").html(etc_html);				
						
						

							
						
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request+' '+status+' '+error);
				}
			});
		}
	}
})();

//전화걸기 이벤트
$('.call_btn').on('click', function () {
	location.href = 'tel:'+$(this).prev().text();
});

//이미지 클릭 이벤트
$(document).on('click', '.link_img', function() {
	$('#detail_img').attr('src', $(this).attr('src'))
	
	popOpenAndDim('megascopeProfile', true);
});

//뒤로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	profile.get_data();
});