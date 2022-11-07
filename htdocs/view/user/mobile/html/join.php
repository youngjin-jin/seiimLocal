<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<form id="join_form" method="post">
	<!-- content -->
	<div id="content">
		<div class="container">
			<div class="join">
				<p class="tit v1 mb50"><?php echo $_lc['TXT']['회원가입']?></p>
				<dl>
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['회원유형']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item"><input type="text" name="" id="" value="<?php echo $_lc['TXT']['근로자']?>" disabled></div>
						</div>
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['placeholder']['아이디']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="text" id="user_id" placeholder="<?php echo $_lc['placeholder']['아이디']?>" autocomplete="off" minlength="4" maxlength="20" required>
							</div>
						</div>
						<!-- case1: 사용불가능 아이디 -->
						<p id="id_wrong_help" class="txt-wrong help_p" style="margin-top:10px;display:none;"><img src="../img/icon/ic_guide.png" align="left" height="20px" style="margin-right:5px;" /> <?php echo $_lc['TXT']['이미사용중이거나탈퇴한아이디입니다']?></p>
						<!-- case2: 사용가능 아이디 -->
						<p id="id_correct_help" class="txt-correct help_p" style="margin-top:10px;display:none;"><?php echo $_lc['TXT']['회원가입이가능한ID입니다']?></p>
						<p id="id_input_help" class="txt-wrong help_p" style="margin-top:10px;display:none;"><img src="../img/icon/ic_guide.png" align="left" height="20px" style="margin-right:5px;" /> <?php echo $_lc['TXT']['ID를입력하세요']?></p>
					</dd>
				</dl>
				<dl class="mt10">
					<dt>
						<p class="tit v2"><?php echo $_lc['placeholder']['비밀번호']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="password" id="user_password" placeholder="<?php echo $_lc['placeholder']['비밀번호']?>" autocomplete="off" minlength="4" maxlength="30" required>
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
								<input type="password" id="user_password_repeat" placeholder="<?php echo $_lc['TXT']['비밀번호확인']?>" autocomplete="off" minlength="4" maxlength="30" required>
							</div>
						</div>
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['연락처']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap has-btn">
							<div class="inp-item">
								<input type="text" id="phone" class="phone" placeholder="<?php echo $_lc['placeholder']['연락처를입력해주세요']?>" autocomplete="off" minlength="13" maxlength="13" required>
							</div>
							<button type="button" id="request_code_btn" class="btn md rnd bg-white line-gray txt-gray"><?php echo $_lc['BTN']['인증번호']?></button>
						</div>
						<!-- case1: 인증번호 입력전 -->
						<div class="inp-wrap has-btn mt10">
							<div class="inp-item">
								<input type="text" id="code" class="number" placeholder="<?php echo $_lc['placeholder']['인증번호를입력해주세요']?>" autocomplete="off" minlength="6" maxlength="6">
							</div>
							<button type="button" id="check_code_btn" class="btn md rnd bg-white line-gray txt-gray"><?php echo $_lc['BTN']['확인']?></button>
						</div>
						<!-- case2: 인증번호 입력후 -->
						<!-- <div class="inp-wrap has-btn">
							<div class="inp-item">
								<input type="text" name="" id="" placeholder="인증번호를 입력해 주세요." value="1234" disabled>
							</div>
							<button class="btn md rnd bg-lightgray line-lightgray txt-green">인증완료</button>
						</div> -->
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
				<button type="submit" class="btn lg has-ic bg-navy"><i class="ic-next"></i><?php echo $_lc['BTN']['다음']?></button>
			</div>
		</div>
	</div>
	<!-- // header -->
</form>

<!-- popup(alert) - 인증번호 확인 -->
<div class="popup" id="checkCertificationNum">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i>
				<p class="mt10"><?php echo $_lc['TXT']['인증번호를다시확인해주세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkCertificationNum', true);"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 비밀번호 변경 -->

<?php include_once('_tail.php'); ?>