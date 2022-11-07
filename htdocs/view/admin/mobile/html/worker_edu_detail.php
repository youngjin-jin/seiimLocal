<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">


<input type="hidden" id="accId" value="<?php echo clean_xss_tags($_GET['accId'])?>" />

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
            <h1 class="title"><?php echo $_lc['TXT']['교육이수현황확인']?></h1>
        </div>
    </div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
    <div class="container">
        <div class="edu-status">
            <div class="profileBox">
                <a href="#">
                    <div class="profile_img" style="background-image:url(../img/no_image_150_150.jpg)"></div>
                    <div class="profile_txt">
                        <p id='name'>김일번</p>
                        <span id='birth'>1985-09-10</span>
                    </div>
                </a>
            </div>
            <div class="filterbox fx">
                <div class="inp-wrap">
                    <div class="inp-item">
                        <select name="catesel" id="filter_cate" required="">
                            <option value="">전 체</option>
                            <option value="site">현장별</option>
                            <option value="company">업체별</option>                            
                        </select>
                    </div>
                </div>
                <div class="inp-wrap">
                    <div class="inp-item ">
                        <select name="sitesel" id="filter_site" required="" style='display:none'>
                           
                        </select>
                    </div>
                </div>
                <!--
                <select name="filter_cate" id="filter_cate">
                    <option value="전체">전 체</option>
                    <option value="현장별">현장별</option>
                    <option value="업체별">업체별</option>
                </select>
                <select name="filter_site" id="filter_site">
                    <option value="현장1">현장1</option>
                    <option value="현장2">현장2</option>
                </select>
-->
            </div>



            <div class="graphBox">                
                <p class="tit mt10 mb10">근무 현장 수 : <span id='siteCnt'></span>개소, 교육 이수 시간 : <span id='totalTime'></span></p>
                <div class="graphIn">                     
                    <canvas id="myChart" width="" height="200" style="width:100%"></canvas>

                    
                </div>

                <div id='chartlabel'>
                        
                 </div>
            </div>

        </div>
    </div>
</div>
<!-- // content -->

<!-- popup - 이미지 옵션 -->
<div class="popup" id="imgOption">
	<div class="pop-cont">
		<button class="btn lg rnd has-ic bg-white txt-navy" id="detail_img_btn"><i class="ic-megascope"></i><?php echo $_lc['TXT']['자세히보기']?></button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="down_btn"><i class="ic-download"></i><?php echo $_lc['TXT']['다운로드']?></button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<!-- popup - 이미지 옵션 -->
<div class="popup" id="megascopeProfile">
	<div class="pop-cont">
		<img src="../img/@temp_id_card.png" id="detail_img">
		<button class="btn-txt has-ic txt-white" onclick="popCloseAndDim('megascopeProfile', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<?php include_once('_tail.php'); ?>