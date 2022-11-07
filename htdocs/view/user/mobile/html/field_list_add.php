<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['TXT']['현장목록']?></button>
			<h1 class="title"><?php echo $_lc['TXT']['현장추가']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="field-wrap">
			<form id="add_form" method="post">
				<div class="field-add">
					<p class="txt1"><?php echo $_lc['TXT']['현장코드를입력해주세요']?></p>
					<div class="inp-wrap mt10">
						<div class="inp-item"><input type="text" name="code" id="code" autocomplete="off" minlength="9" maxlength="10" required></div>
					</div>
				</div>
				<button class="btn md circle bg-navy mt20"><?php echo $_lc['BTN']['진입']?></button>
			</form>
		</div>
	</div>
</div>
<!-- // content -->

<!-- popup(alert) - 현장 코드 체크 -->
<div class="popup" id="already_regi">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i>
				<p class="mt10"><?php echo $_lc['TXT']['이미등록된현장입니다']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('already_regi', true);"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 현장 코드 체크 -->

<!-- popup(alert) - 현장 코드 체크 -->
<div class="popup" id="checkField">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i><!-- 20210831 수정 -->
				<p class="mt10"><?php echo $_lc['TXT']['해당하는현장이없습니다']?></p>
				<p class="mt20"><?php echo $_lc['TXT']['현장코드를다시확인해주세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="close_btn"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 현장 코드 체크 -->

<?php include_once('_tail.php'); ?>