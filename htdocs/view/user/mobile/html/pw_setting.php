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
    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="pw-setting">
                <p class="tit v1 mb80">비밀번호 설정</p>
                <p class="txt01">임시비밀번호로 로그인 하셨습니다.</p>
                <p class="txt02">비밀번호를 설정해 주세요.</p>
                <dl>
                    <dt>
                        <p class="tit v2">비밀번호</p>
                    </dt>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item"><input type="password" name="" id="" placeholder="비밀번호를 입력해 주세요"></div>
                        </div>
                    </dd>
                </dl>
                <dl class="mt20">
                    <dt>
                        <p class="tit v2">비밀번호 확인</p>
                    </dt>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item"><input type="password" name="" id="" placeholder="비밀번호를 입력해 주세요"></div>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy" onclick="popOpenAndDim('changePW', true)"><i class="ic-next"></i>다음</button><!-- 20210831 수정 -->
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- popup(alert) - 비밀번호 변경 -->
    <div class="popup" id="changePW">
        <div class="pop-cont">
            <div class="msg-wrap">
                <div class="inner">
                    <i class="ic-alarm"></i><!-- 20210831 수정 -->
                    <p class="mt10">비밀번호가 변경되었습니다.</p>
                    <p class="mt20">다시 로그인해 주세요.</p>
                </div>
            </div>
        </div>
        <div class="pop-footer">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('changePW', true)"><i class="ic-close"></i>닫기</button>
            </div>
        </div>
    </div>
    <!-- // popup(alert) - 비밀번호 변경 -->
</body>
</html>