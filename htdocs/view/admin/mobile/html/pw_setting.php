<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<form id="change_password_form" method="post">
	<!-- content -->
	<div id="content">
		<div class="container">
			<div class="pw-setting">
				<p class="tit v1 mb80"><?php echo $_lc['TXT']['비밀번호설정']?></p>
				<p class="txt01"><?php echo $_lc['TXT']['임시비밀번호로로그인하셨습니다']?></p>
				<p class="txt02"><?php echo $_lc['TXT']['비밀번호를설정해주세요']?></p>
				<dl>
					<dt>
						<p class="tit v2"><?php echo $_lc['placeholder']['비밀번호']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="password" name="new_password" id="new_password" placeholder="<?php echo $_lc['placeholder']['비밀번호']?>" autocomplete="off" minlength="4" maxlength="30" required>
							</div>
						</div>
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['비밀번호확인']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="password" name="new_password_repeat" id="new_password_repeat" placeholder="<?php echo $_lc['placeholder']['비밀번호']?>" autocomplete="off" minlength="4" maxlength="30" required>
							</div>
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
				<button type="submit" class="btn lg has-ic bg-navy"><i class="ic-next"></i><?php echo $_lc['BTN']['다음']?></button><!-- 20210831 수정 -->
			</div>
		</div>
	</div>
	<!-- // header -->
</form>

<!-- popup(alert) - 비밀번호 변경 -->
<div class="popup" id="changePW">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i><!-- 20210831 수정 -->
				<p class="mt10"><?php echo $_lc['TXT']['비밀번호가변경되었습니다']?></p>
				<p class="mt20"><?php echo $_lc['TXT']['다시로그인해주세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="reset_btn" class="btn lg has-ic bg-navy"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 비밀번호 변경 -->

<?php include_once('_tail.php'); ?>