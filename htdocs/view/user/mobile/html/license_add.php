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
                <h1 class="title">자격증 추가</h1>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="license-wrap">
                <p class="tit v2 mb6">장비종류</p>
                <div class="inp-wrap">
                    <div class="inp-item">
                        <select name="" id="">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <p class="tit v2 mb6 mt20">자격증명칭</p>
                <div class="inp-wrap">
                    <div class="inp-item">
                        <input type="text" name="" id="">
                    </div>
                </div>
                <p class="tit v2 mb6 mt20">발급년월일</p>
                <div class="inp-wrap date">
                    <div class="inp-item">
                        <select name="" id="">
                            <option value="">2000</option>
                        </select>
                    </div>
                    <div class="inp-item">
                        <select name="" id="">
                            <option value="">01</option>
                        </select>
                    </div>
                    <div class="inp-item">
                        <select name="" id="">
                            <option value="">25</option>
                        </select>
                    </div>
                </div>
                <div class="fx jc-sb ai-c mb6 mt20">
                    <p class="tit v2">자격증</p>
                    <button class="btn circle sm has-ic bg-white line-gray txt-gray fx-none"><i class="ic-plus"></i>사진첨부</button>
                </div>
                <div class="photo-attach">
                    <img src="../img/@temp_id_card.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy" onclick="popOpenAndDim('checkSave', true)"><i class="ic-submit"></i>저장</button>
            </div>
        </div>
    </div>
    <!-- // header -->

    <!-- popup(alert) - 공란 체크 -->
    <div class="popup" id="checkBlank">
        <div class="pop-cont">
            <div class="msg-wrap">
                <div class="inner">
                    <i class="ic-alarm"></i>
                    <p class="mt10">입력하지 않은 부분이 있습니다.</p>
                    <p class="mt20">모든 영역을 입력해 주세요.</p>
                </div>
            </div>
        </div>
        <div class="pop-footer">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkBlank', true)"><i class="ic-close"></i>닫기</button>
            </div>
        </div>
    </div>
    <!-- // popup(alert) - 공란 체크 -->

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