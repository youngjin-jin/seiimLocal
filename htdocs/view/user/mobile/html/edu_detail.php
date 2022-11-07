<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<input type="hidden" id="eduId" value="<?php echo clean_xss_tags($_GET['eduId'])?>" />

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
            <h1 class="title"><?php echo $_lc['TXT']['교육내역상세']?></h1>
        </div>
    </div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
    <div class="container">
        <div class="edu-list">
            <p class="tit v4 mb6" id="eduName"></p>
            <div class="tbl-wrap v1 mt40">
                <table>
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: auto;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th><?php echo $_lc['TXT']['교육일']?></th>
                            <td id="eduDate"></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['시작시각']?></th>
                            <td id="startTime"></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['종료시각']?></th>
                            <td id="endTime"></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['공종']?></th>
                            <td id="constructType"></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['교육장소']?></th>
                            <td id="eduPlace"></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['교육강사']?></th>
                            <td id="instructor"></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['비고']?></th>
                            <td id="memo" class="ql-editor"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><?php echo $_lc['TXT']['첨부사진']?></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <ul class="img-list v1"></ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
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