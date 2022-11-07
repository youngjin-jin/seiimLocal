<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- content -->
<div id="content">
	<div class="container">
		<div class="terms-wrap">
			<p class="tit v1"><?php echo $_lc['TXT']['이용약관에동의해주세요']?></p>
			<div class="inp-wrap mb20">
				<div class="inp-item">
					<label for="allCheck">
						<input type="checkbox" id="allCheck">
						<p class="txt"><?php echo $_lc['TXT']['약관에모두동의']?></p>
					</label>
				</div>
			</div>
			<div class="terms-item">
				<div class="inp-wrap">
					<div class="inp-item">
						<label for="termsCheck01">
							<input type="checkbox" id="termsCheck01" class="agree_check">
							<p class="txt"><?php echo $_lc['TXT']['서비스이용약관동의']?></p>
						</label>
					</div>
				</div>
				<button id="termsCheck01_link_btn" class="btn-ic ic-link black" link_url=""></button>
			</div>
			<div class="terms-item">
				<div class="inp-wrap">
					<div class="inp-item">
						<label for="termsCheck02">
							<input type="checkbox" id="termsCheck02" class="agree_check">
							<p class="txt"><?php echo $_lc['TXT']['개인정보수집및이용동의']?></p>
						</label>
					</div>
				</div>
				<button id="termsCheck02_link_btn" class="btn-ic ic-link black" link_url=""></button>
			</div>
			<div class="terms-item">
				<div class="inp-wrap">
					<div class="inp-item">
						<label for="termsCheck03">
							<input type="checkbox" id="termsCheck03" class="agree_check">
							<p class="txt"><?php echo $_lc['TXT']['제3자제공동의']?></p>
						</label>
					</div>
				</div>
				<button id="termsCheck03_link_btn" class="btn-ic ic-link black" link_url=""></button>
			</div>
			<div class="terms-item">
				<div class="inp-wrap">
					<div class="inp-item">
						<label for="termsCheck04">
							<input type="checkbox" id="termsCheck04" class="agree_check">
							<p class="txt"><?php echo $_lc['TXT']['이벤트/마케팅정보수신동의']?></p>
						</label>
					</div>
				</div>
				<button id="termsCheck04_link_btn" class="btn-ic ic-link black" link_url=""></button>
			</div>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="agree_submit_btn" class="btn lg has-ic bg-navy"><i class="ic-submit"></i><?php echo $_lc['BTN']['완료']?></button>
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
			<button id="complete_join_btn" class="btn lg has-ic bg-navy"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 회원가입 완료 -->

<!-- popup(alert) - 필수 약관 동의 -->
<div class="popup" id="checkRequiredTerms">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-warning"></i>
				<p class="mt18"><?php echo $_lc['TXT']['필수약관에모두동의해주세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkRequiredTerms', true);"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 필수 약관 동의 -->

<?php include_once('_tail.php'); ?>