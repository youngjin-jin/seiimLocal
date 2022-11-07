//QR인증 선택 이벤트
$('#qr_btn').on('click', function () {
	location.href = 'qrgo.php';
});


//QR인증 선택 이벤트
$('#qr_btn2').on('click', function () {
	location.href = 'qrscan.php';
});


//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});