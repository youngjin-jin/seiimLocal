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
                <button class="btn-ic ic-back" onclick="popOpenAndDim('checkLeave', true)">뒤로 가기</button>
                <h1 class="title">보호구 지급</h1>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="protective-gear">
                <p class="tit v2 mb6">보호구1</p>
                <div class="inp-wrap">
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">개인보유</p>
                        </label>
                    </div>
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">현장지급</p>
                        </label>
                    </div>
                </div>
                <p class="tit v2 mb6 mt30">보호구2</p>
                <div class="inp-wrap">
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">개인보유</p>
                        </label>
                    </div>
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">현장지급</p>
                        </label>
                    </div>
                </div>
                <p class="tit v2 mb6 mt30">보호구3</p>
                <div class="inp-wrap">
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">개인보유</p>
                        </label>
                    </div>
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">현장지급</p>
                        </label>
                    </div>
                </div>
                <p class="tit v2 mb6 mt30">보호구4</p>
                <div class="inp-wrap">
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="">
                            <p class="txt">개인보유</p>
                        </label>
                    </div>
                    <div class="inp-item radio">
                        <label for="">
                            <input type="radio" name="" id="" checked>
                            <p class="txt">현장지급</p>
                        </label>
                    </div>
                </div>
                <p class="tit v2 mb6 mt30">기타</p>
                <div class="inp-wrap">
                    <div class="inp-item"><input type="text" name="" id=""></div>
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy"><i class="ic-submit"></i>제출</button>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- popup(alert) - 페이지 벗어남 체크 -->
    <div class="popup" id="checkLeave">
        <div class="pop-cont">
            <div class="msg-wrap">
                <div class="inner">
                    <i class="ic-alarm"></i>
                    <p class="mt10">수정된 내용을 저장하지 않았습니다.</p>
                    <p class="mt20">페이지를 벗어나시겠습니까?</p>
                </div>
            </div>
        </div>
        <div class="pop-footer">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkLeave', true)"><i class="ic-submit"></i>예</button>
                <button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkLeave', true)"><i class="ic-close"></i>아니오</button>
            </div>
        </div>
    </div>
    <!-- // popup(alert) - 페이지 벗어남 체크 -->
</body>
</html>