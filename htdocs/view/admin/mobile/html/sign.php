<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<style>
#sign_p1 { margin-bottom:40px; }
#signature { width:100%; border:1px solid #CED4DA; background:#ffffff; }
#sign_p2 { position:absolute; left:50%; top:50%; transform:translate(-50%, -50%); color:#CED4DA; font-size:18px; font-weight:700; margin-top:70px; }
</style>

<!-- content -->
<div id="content">
	<div class="container">
		<div class="sign-wrap">
			<p id="sign_p1" class="tit v1 mb20"><?php echo $_lc['TXT']['서명패드에서명을진행해주세요']?></p>
            <p class="txt-guide mb20"><?php echo $_lc['TXT']['고객님께서참여하는안전교육에서명이자동입력됩니다']?></p>
			<canvas id="signature"></canvas>
			<p id="sign_p2"><?php echo $_lc['TXT']['서명란']?></p>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="reset_btn" class="btn lg has-ic bg-gray"><i class="ic-reset"></i><?php echo $_lc['BTN']['초기화']?></button>
			<button id="save_btn" class="btn lg has-ic bg-navy"><i class="ic-submit"></i><?php echo $_lc['BTN']['완료']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<!-- popup(alert) - 회원가입 완료 -->
<div class="popup" id="completeJoin">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-smile"></i>
				<p class="mt18"><?php echo $_lc['TXT']['회원가입이완료되었습니다']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="complete_join_btn" class="btn lg has-ic bg-navy" onclick="popCloseAndDim('completeJoin', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 회원가입 완료 -->
	
<?php include_once('_tail.php'); ?>