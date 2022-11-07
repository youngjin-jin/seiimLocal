var link_img = '';
var worker_token
var graduate = (function () {

	return {
		get_data: function () {
			var eduId = $('#eduId').val();

			$.ajax({
				type: 'POST',
				url: '/controller/edu_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module': 'edu_detail', 'eduDocId': eduId },
				success: function (response) {
					console.log(response);

					if (response.result) {
						/*adminId: 2
						attach: Array(3)
							0: {id: 1, path: 'https://dev-storage.saiifedu.com/images.jpeg', createdAt: '2021-10-27T14:57:34.000Z', updatedAt: '2021-10-27T14:57:33.000Z'}
							1: {id: 2, path: 'https://dev-storage.saiifedu.com/images (1).jpeg', createdAt: '2021-10-27T14:57:34.000Z', updatedAt: '2021-10-27T14:57:33.000Z'}
							2: {id: 3, path: 'https://dev-storage.saiifedu.com/images (2).jpeg', createdAt: '2021-10-27T14:57:34.000Z', updatedAt: '2021-10-27T14:57:33.000Z'}
						length: 3
						cat1: 1
						cat2: 3
						constructType: "공종이다현1"
						createdAt: "2021-10-09T01:34:28.000Z"
						doc: null
						eduDate: "2021-10-01T01:34:52.000Z"
						eduName: "테스트 교육"
						eduPlace: "교육장"
						endTime: "15:38:26"
						id: 2
						instructor: "성주필"
						memo: null
						siteId: 1212055764
						startTime: "15:38:20"
						sv: 3
						templateId: 1
						updatedAt: "2021-10-01T01:34:30.000Z"
						workerId: (3) [34, 35, 36]*/

						$('#eduName').text(response.info.eduName);
						$('#eduDate').text(response.info.eduDate.substring(0, 10));
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request + ' ' + status + ' ' + error);
				}
			});
		},

		get_list: function () {
			var eduId = $('#eduId').val();

			$('.img-list').empty();

			$.ajax({
				type: 'POST',
				url: '/controller/graduate.php',
				dataType: 'json',
				cache: false,
				data: { 'module': 'get_list', 'eduId': eduId },
				success: function (response) {
					console.log(response);

					if (response.result) {
						$('#worker_cnt').text(response.list.length + '명');

						var html = '';

						if (response.list.length) {
							response.list.forEach(function (element, index) {
								/*addr1: "경기 용인시 기흥구 기흥단지로 5"
								addr2: "3층"
								birth: "1988-03-02T00:00:00.000Z"
								createdAt: "2021-10-19T04:31:05.000Z"
								deletedAt: null
								id: 34
								isMale: true
								isTemp: false
								level: 100
								married: true
								name: "아무개"
								national: 1
								occupation: "직영근로자"
								phone1: "01023778152"
								phone2: "01023778152"
								profile: "https://dev-storage.saiifedu.com/8017526372367123.jpg"
								sign: "https://dev-storage.saiifedu.com/5983480260862621.png"
								updatedAt: "2021-11-11T12:03:33.000Z"
								userId: "worker1"
								userPw: "$2b$04$Hf9.Nix83g8OYCJzZJdZ5ukcwKGadGmmC8erelH.K/UCR8qdF7cEa"*/

								if (element.profile) var src = element.profile; else var src = '/view/images/avatar.jpg';
								if (element.birth == null) element.birth = '&nbsp;';

								html += '<li onclick="graduate.detail(' + element.id + ');">';
								html += '	<div class="profile">';
								html += '		<img src="' + src + '" alt="">';
								html += '	</div>';
								html += '	<div class="txt-wrap">';
								html += '		<p class="name">' + element.name + '</p>';
								html += '		<p class="birthday">' + element.birth.substring(0, 10) + '</p>';
								html += '	</div>';
								html += '</li>';
							});
						}

						$('.img-list').append(html);
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					alert(request + ' ' + status + ' ' + error);
				}
			});
		},

		detail: function (workerId) {
			var key = $('#key').val();
			var site_name = $('#site_name').val();
			var owner = $('#owner').val();
			var contractor = $('#contractor').val();
			var myCompany = $('#myCompany').val();
			var eduId = $('#eduId').val();

			location.href = 'profile.php?key=' + key + '&site_name=' + site_name + '&owner=' + owner + '&contractor=' + contractor + '&myCompany=' + myCompany + '&eduId=' + eduId + '&workerId=' + workerId;
		},
	}
})();

//QR 이벤트
$('#qr_btn').on('click', function () {
	var key = $('#key').val();
	var site_name = $('#site_name').val();
	var owner = $('#owner').val();
	var contractor = $('#contractor').val();
	var myCompany = $('#myCompany').val();
	var eduId = $('#eduId').val();

	if (window.SAIIFEDU_EVENT) {
		window.SAIIFEDU_EVENT.callBackEvent('REQ_QRSCAN', '')
	} else if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.SAIIFEDU_EVENT) {
		const param = { type: 'REQ_QRSCAN', data: '' }
		window.webkit.messageHandlers.SAIIFEDU_EVENT.postMessage(param);
	}

	// location.href = 'qrscan.php?key='+key+'&site_name='+site_name+'&owner='+owner+'&contractor='+contractor+'&myCompany='+myCompany+'&eduId='+eduId;
});

//뒤로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});

$(document).ready(function () {
	graduate.get_data();
	graduate.get_list();

	window.recvQR = function (code) {

		if (!worker_token) {
			worker_token = code;

			var eduId = $('#eduId').val();

			$.ajax({
				type: 'POST',
				url: '/controller/qrscan.php',
				dataType: 'json',
				cache: false,
				data: { 'module': 'add_worker', 'eduId': eduId, 'worker_token': worker_token },
				success: function (response) {
					console.log(response);

					setTimeout(function () {
						worker_token = undefined
					}, 1000)

					if (response.result) {
						//0:성공 , -1이미등록 -2 회원정보없음 -3 토큰 오류
						// if (response.status == 0) {
						// 	$('.error').html('<span style="color:#08B39A;">교육등록에 성공 하였습니다.</span>');
						// } else if (response.status == -1) {
						// 	$('.error').html('<span style="color:#ff5562ff;">이미등록한 근로자 입니다.</span>');
						// } else if (response.status == -2 || response.status == -3) {
						// 	$('.error').html('<span style="color:#ff5562ff;">회원정보가 존재하지 않습니다.</span>');
						// } else {
						// 	$('.error').html('<span style="color:#ff5562ff;">알수없는 오류 입니다.</span>');
						// }

						// $('.error').fadeIn(400).delay(1000).fadeOut(400);

						if (window.SAIIFEDU_EVENT) {
							window.SAIIFEDU_EVENT.callBackEvent('REG_RESULT', response.status)
						} else if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.SAIIFEDU_EVENT) {
							const param = { type: 'REG_RESULT', data: response.status }
							window.webkit.messageHandlers.SAIIFEDU_EVENT.postMessage(param);
						}


					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else {
							if (window.SAIIFEDU_EVENT) {
								window.SAIIFEDU_EVENT.callBackEvent('REG_RESULT', response.status)
							} else if (window.webkit && window.webkit.messageHandlers && window.webkit.messageHandlers.SAIIFEDU_EVENT) {
								const param = { type: 'REG_RESULT', data: response.status }
								window.webkit.messageHandlers.SAIIFEDU_EVENT.postMessage(param);
							}

						}
					}
				},
				error: function (request, status, error) {
					alert(request + ' ' + status + ' ' + error);
				}
			});
		}
	}
});