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
                <h1 class="title">안전수칙준수 서약</h1>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="pledge-wrap">
                <p class="tit v5">안전수칙 준수 서약</p>
                <ul class="list-wrap v4 mt20">
                    <li>
                        <p class="num">1</p>
                        <p class="txt">나는 모든 작업에 임함에 있어 제반 안전수칙을 지키는데 모범을 보이겠다. </p>
                    </li>
                    <li>
                        <p class="num">2</p>
                        <p class="txt">나는 작업 중 나타난 불안전한 상태에 대해서 즉시 시정하겠다.</p>
                    </li>
                    <li>
                        <p class="num">3</p>
                        <p class="txt">나는 작업장내에서 항시 안전모, 안전화 작용에 철저하겠다.</p>
                    </li>
                    <li>
                        <p class="num">4</p>
                        <p class="txt">나는 모든 작업에 임함에 있어 제반 안전수칙을 지키는데 모범을 보이겠다. </p>
                    </li>
                    <li>
                        <p class="num">5</p>
                        <p class="txt">나는 모든 작업에 임함에 있어 제반 안전수칙을 지키는데 모범을 보이겠다. </p>
                    </li>
                    <li>
                        <p class="num">6</p>
                        <p class="txt">나는 모든 작업에 임함에 있어 제반 안전수칙을 지키는데 모범을 보이겠다. </p>
                    </li>
                    <li>
                        <p class="num">7</p>
                        <p class="txt">나는 모든 작업에 임함에 있어 제반 안전수칙을 지키는데 모범을 보이겠다. </p>
                    </li>
                    <li>
                        <p class="num">8</p>
                        <p class="txt">나는 모든 작업에 임함에 있어 제반 안전수칙을 지키는데 모범을 보이겠다. </p>
                    </li>
                </ul>
                <p class="tit v5 mt40">안전수칙 준수 서약</p>
                <ul class="list-wrap v4 mt20">
                    <li>
                        <p class="num">1</p>
                        <p class="txt">나는 안전조회(교육)에 100% 참석한다.</p>
                    </li>
                    <li>
                        <p class="num">2</p>
                        <p class="txt">나는 안전모 턱끈을 반드시 조인다.</p>
                    </li>
                    <li>
                        <p class="num">3</p>
                        <p class="txt">나는 통로가 안전한지 확인하고 이동한다.</p>
                    </li>
                    <li>
                        <p class="num">4</p>
                        <p class="txt">나는 통로가 안전한지 확인하고 이동한다.</p>
                    </li>
                    <li>
                        <p class="num">5</p>
                        <p class="txt">나는 통로가 안전한지 확인하고 이동한다.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy"><i class="ic-pledge"></i>서명</button>
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