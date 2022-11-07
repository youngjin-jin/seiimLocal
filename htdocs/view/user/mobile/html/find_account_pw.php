<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
			<h1 class="title"><?php echo $_lc['BTN']['비밀번호찾기']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="find-account">
			<p class="tit v2 mb6">ID</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<input type="text" id="user_id" placeholder="<?php echo $_lc['placeholder']['아이디']?>" autocomplete="off" minlength="4" maxlength="20" required>
				</div>
			</div>
			<p class="tit v2 mb6 mt20"><?php echo $_lc['TXT']['가입시입력한연락처']?></p>
			<div class="inp-wrap has-btn">
				<div class="inp-item">
					<input type="text" id="phone" class="phone" placeholder="<?php echo $_lc['placeholder']['연락처를입력해주세요']?>" autocomplete="off" minlength="13" maxlength="13">
				</div>
				<button id="request_code_btn" class="btn md rnd bg-white line-gray txt-gray"><?php echo $_lc['BTN']['인증번호']?></button>
			</div>
			<p class="tit v2 mb6 mt20"><?php echo $_lc['TXT']['인증번호입력']?></p>
			<div class="inp-wrap has-btn">
				<div class="inp-item">
					<input type="text" id="code" class="number" placeholder="<?php echo $_lc['placeholder']['인증번호를입력해주세요']?>" autocomplete="off" minlength="6" maxlength="6">
				</div>
				<button id="check_code_btn" class="btn md rnd bg-white line-gray txt-gray"><?php echo $_lc['BTN']['확인']?></button>
			</div>
			<p class="txt-guide mt65"><?php echo $_lc['TXT']['인증번호확인시가입된연락처로임시비밀번호가발송됩니다']?></p>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="find_id_btn" class="btn lg has-ic bg-navy"><i class="ic-find"></i><?php echo $_lc['BTN']['ID찾기']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<!-- popup(alert) - 임시 비밀번호 발송 -->
<div class="popup" id="sendTemporaryPW">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i>
				<p class="mt10"><?php echo $_lc['TXT']['입력하신연락처로임시비밀번호가발송되었습니다']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="login_btn" class="btn lg has-ic bg-navy"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 임시 비밀번호 발송 -->

<?php include_once('_tail.php'); ?>