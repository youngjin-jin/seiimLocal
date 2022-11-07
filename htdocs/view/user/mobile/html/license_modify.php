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
            <h1 class="title"><?php echo (clean_xss_tags($_GET['key']))?$_lc['TXT']['자격증수정']:$_lc['TXT']['자격증추가']?></h1>
        </div>
    </div>
</div>
<!-- // header -->

<form id="form" method="post">
    <!-- content -->
    <div id="content">
        <div class="container mt20">
            <div class="license-wrap">
                <p class="tit v2 mb6"><?php echo $_lc['TXT']['장비종류']?></p>
                <div class="inp-wrap">
                    <div class="inp-item">
                        <select name="type" id="type" required></select>
                    </div>
                </div>
                <p class="tit v2 mb6 mt20"><?php echo $_lc['TXT']['자격증명칭']?></p>
                <div class="inp-wrap">
                    <div class="inp-item">
                        <input type="text" id="certName" placeholder="<?php echo  $_lc['TXT']['자격증명칭']?>" autocomplete="off" minlength="2" maxlength="25" required>
                    </div>
                </div>
                <p class="tit v2 mb6 mt20"><?php echo $_lc['TXT']['발급년월일']?></p>
                <div class="inp-wrap">
                    <div class="inp-item">
                        <select name="year" id="year" required>
                            <option value=""><?php echo $_lc['TXT']['연도']?></option>
                        </select>
                    </div>
                    <div class="inp-item">
                        <select name="month" id="month" required>
                            <option value=""><?php echo $_lc['TXT']['월']?></option>
                        </select>
                    </div>
                    <div class="inp-item">
                        <select name="day" id="day" required>
                            <option value=""><?php echo $_lc['TXT']['일']?></option>
                        </select>
                    </div>
                </div>
                <div class="fx jc-sb ai-c mb6 mt20">
                    <p class="tit v2"><?php echo $_lc['TXT']['자격증']?></p>
                    <button type="button" id="upload_btn" class="btn circle sm has-ic bg-white line-gray txt-gray"><i class="ic-plus"></i><?php echo $_lc['TXT']['사진첨부']?></button>
                </div>
                <div id="attach_div" class="photo-attach">
                    <!--img src="../img/@temp_id_card.png" alt=""-->
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button type="submit" class="btn lg has-ic bg-navy"><i class="ic-submit"></i><?php echo $_lc['BTN']['저장']?></button>
            </div>
        </div>
    </div>
    <!-- // header -->
</form>

<input type="file" id="upload_file" accept="image/*" style="display:none;" />

<!-- popup(alert) - 페이지 벗어남 체크 -->
<div class="popup" id="checkLeave">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i>
				<p class="mt10"><?php echo $_lc['TXT']['수정된내용을저장하지않았습니다']?></p>
				<p class="mt20"><?php echo $_lc['TXT']['페이지를벗어나시겠습니까']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="back_run_btn"><i class="ic-submit"></i><?php echo $_lc['TXT']['예']?></button>
			<button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkLeave', true);"><i class="ic-close"></i><?php echo $_lc['TXT']['아니오']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 페이지 벗어남 체크 -->

<!-- popup(alert) - 저장 확인 -->
<div class="popup" id="checkSave">
    <div class="pop-cont">
        <div class="msg-wrap">
            <div class="inner">
                <i class="ic-alarm"></i>
                <p class="mt20"><?php echo $_lc['TXT']['저장하시겠습니까']?></p>
            </div>
        </div>
    </div>
    <div class="pop-footer">
        <div class="btn-wrap">
            <button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkSave', true)"><i class="ic-submit"></i><?php echo $_lc['TXT']['예']?></button>
            <button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkSave', true)"><i class="ic-close"></i><?php echo $_lc['TXT']['아니오']?></button>
        </div>
    </div>
</div>
<!-- // popup(alert) - 저장 확인 -->

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

<!-- popup(alert) - 공란 체크 -->
<div class="popup" id="checkBlank">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i>
				<p class="mt10"><?php echo $_lc['TXT']['입력하지않은부분이있습니다']?></p>
				<p class="mt20"><?php echo $_lc['TXT']['모든영역을입력해주세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkBlank', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 공란 체크 -->

<?php include_once('_tail.php'); ?>