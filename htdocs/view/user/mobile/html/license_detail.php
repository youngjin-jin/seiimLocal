<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
            <h1 class="title"><?php echo $_lc['TXT']['자격증상세']?></h1>
        </div>
    </div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
    <div class="container">
        <div class="license-wrap">
            <!--img src="../img/@temp_license.png" alt="">
            <div class="tbl-wrap v1 mt40">
                <table>
                    <colgroup>
                        <col style="width: 81px;">
                        <col style="width: auto;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th>장비종류</th>
                            <td>3톤미만 지게차</td>
                        </tr>
                        <tr>
                            <th>자격증명</th>
                            <td>건설기계조종사 면허증</td>
                        </tr>
                        <tr>
                            <th>발급년월일</th>
                            <td>2018.03.21</td>
                        </tr>
                    </tbody>
                </table>
            </div-->
        </div>
    </div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
    <div class="inner">
        <div class="btn-wrap">
            <button class="btn lg has-ic bg-navy" id="update_btn"><i class="ic-edit white"></i><?php echo $_lc['BTN']['수정']?></button>
        </div>
    </div>
</div>
<!-- // header -->

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