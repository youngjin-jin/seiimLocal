<!DOCTYPE HTML>
<html>
<head>
	<title>안전솔루션</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />

	<!-- reset css -->
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/fonts.css" rel="stylesheet" type="text/css">

    <!-- custom css -->
    <link href="../css/common.css" rel="stylesheet" type="text/css">
    <link href="../css/utility.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- jquery -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    
    <!-- custom js -->
    <script src="../js/common.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <!-- header -->
    <div id="header">
        <div class="inner">
            <div class="container">
                <button class="btn-ic ic-back">뒤로가기</button>
                <h1 class="title">서명 관리</h1>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="sign-wrap pt0">
                <p class="tit v2">서명 이미지</p>
                <div class="sign-area mt10">
                    <p>서명란</p>
                    <img src="../img/@temp_sign.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-gray"><i class="ic-reset"></i>초기화</button>
                <button class="btn lg has-ic bg-navy"onclick="popOpenAndDim('checkSave', true)"><i class="ic-submit white"></i>저장</button>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- popup(alert) - 저장 확인 -->
    <div class="popup" id="checkSave">
        <div class="pop-cont">
            <div class="msg-wrap">
                <div class="inner">
                    <i class="ic-alarm"></i>
                    <p class="mt20">저장하시겠습니까?</p>
                </div>
            </div>
        </div>
        <div class="pop-footer">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkSave', true)"><i class="ic-submit"></i>예</button>
                <button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkSave', true)"><i class="ic-close"></i>아니오</button>
            </div>
        </div>
    </div>
    <!-- // popup(alert) - 저장 확인 -->
</body>
</html>