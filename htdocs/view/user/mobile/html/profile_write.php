<?php
  header("Progma:no-cache");
  header("Cache-Control:no-cache,must-revalidate");
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<h1 class="title"><?php echo $_lc['TXT']['프로필']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<form id="form" method="post">
	<!-- content -->
	<div id="content">
		<div class="container">
			<div class="profile-wrap">
				<div class="profile"><img src="../img/no_image_150_150.jpg" id="profile_img" /></div>
				<p class="txt-phone mt8"><span id="phone1">010-1234-5678</span><a href="https://pf.kakao.com/_rxmPWs/chat" class="btn sm bg-green txt-white circle"><?php echo $_lc['BTN']['변경요청']?></a></p>
				<div class="fx mt45">
					<dl class="fx3">
						<dt>
							<p class="tit v2"><?php echo $_lc['TXT']['이름']?></p>
						</dt>
						<dd class="mt6">
							<div class="inp-wrap">
								<div class="inp-item">
									<input type="text" id="name" placeholder="<?php echo $_lc['placeholder']['이름을입력해주세요']?>" autocomplete="off" minlength="2" maxlength="25" required>
								</div>
							</div>
						</dd>
					</dl>
					<dl class="fx-none">
						<dt>
							<p class="tit v2"><?php echo $_lc['TXT']['성별']?></p>
						</dt>
						<dd class="mt6">
							<div class="inp-wrap">
								<div class="inp-item">
									<select name="sex" id="sex" required>
										<option value="1"><?php echo $_lc['TXT']['남성']?></option>
										<option value="0"><?php echo $_lc['TXT']['여성']?></option>
									</select>
								</div>
							</div>
						</dd>
					</dl>
				</div>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['생년월일']?></p>
					</dt>
					<dd class="mt6">
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
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['주소']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="text" name="adress1" id="adress1" placeholder="<?php echo $_lc['placeholder']['주소검색']?>" readonly required>
							</div>
						</div>
					</dd>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="text" name="adress2" id="adress2" placeholder="<?php echo $_lc['placeholder']['상세주소']?>" autocomplete="off" maxlength="50" required>
							</div>
						</div>
					</dd>
				</dl>
				<div class="fx mt20">
					<dl>
						<dt>
							<p class="tit v2"><?php echo $_lc['TXT']['결혼여부']?></p>
						</dt>
						<dd class="mt6">
							<div class="inp-wrap">
								<div class="inp-item">
									<select name="married" id="married" required>
										<option value="0"><?php echo $_lc['TXT']['미혼']?></option>
										<option value="1"><?php echo $_lc['TXT']['기혼']?></option>
									</select>
								</div>
							</div>
						</dd>
					</dl>
					<dl>
						<dt>
							<p class="tit v2"><?php echo $_lc['TXT']['국적']?></p>
						</dt>
						<dd class="mt6">
							<div class="inp-wrap">
								<div class="inp-item">
									<select name="nationality" id="nationality" required></select>
								</div>
							</div>
						</dd>
					</dl>
				</div>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['비상휴대폰번호']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item"><input type="text" name="phone2" id="phone2" class="phone" placeholder="<?php echo $_lc['placeholder']['연락처를입력해주세요']?>" autocomplete="off" minlength="13" maxlength="13" required></div>
						</div>
					</dd>
				</dl>
				<dl class="mt15">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['신분증']?><i class="ic-tooltip"></i></p>
						<button type="button" id="id_card_upload_btn" class="btn circle sm has-ic bg-white line-gray txt-gray"><i class="ic-plus"></i><?php echo $_lc['TXT']['사진첨부']?></button>
					</dt>
					<dd class="mt6">
						<div id="id_card_div" class="photo-attach">
							<!--img src="../img/@temp_id_card.png" alt=""-->
						</div>
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['기초안전보건교육이수년월일']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<select name="safe_year" id="safe_year" required>
									<option value=""><?php echo $_lc['TXT']['연도']?></option>
								</select>
							</div>
							<div class="inp-item">
								<select name="safe_month" id="safe_month" required>
									<option value=""><?php echo $_lc['TXT']['월']?></option>
								</select>
							</div>
							<div class="inp-item">
								<select name="safe_day" id="safe_day" required>
									<option value=""><?php echo $_lc['TXT']['일']?></option>
								</select>
							</div>
						</div>
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['기초안전보건교육증']?></p>
						<button type="button" id="safe_certi_upload_btn" class="btn circle sm has-ic bg-white line-gray txt-gray"><i class="ic-plus"></i><?php echo $_lc['TXT']['사진첨부']?></button>
					</dt>
					<dd class="mt6">
						<div id="safe_certi_div" class="photo-attach">
							<!--img src="../img/@temp_certificate.png" alt=""-->
						</div>
					</dd>
				</dl>
				<dl class="mt20">
					<dt>
						<p class="tit v2"><?php echo $_lc['TXT']['추가서류']?></p>
						<button type="button" id="add_upload_btn" class="btn circle sm has-ic bg-white line-gray txt-gray"><i class="ic-plus"></i><?php echo $_lc['TXT']['사진첨부']?></button>
					</dt>
					<dd id="add_upload_div" class="mt6">
						<!--div class="photo-attach">
							<img src="../img/@temp_id_card.png" alt="" onclick="popOpenAndDim('imgOption', true)">
						</div>
						<div class="photo-attach mt20">
							<img src="../img/@temp_id_card.png" alt="" onclick="popOpenAndDim('imgOption', true)">
						</div-->
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
				<button type="submit" class="btn lg has-ic bg-navy"><i class="ic-submit"></i><?php echo $_lc['BTN']['저장']?></button>
			</div>
		</div>
	</div>
	<!-- // header -->
</form>

<input type="file" id="upload_file" accept="image/*" style="display:none;" />
<!--input type="file" id="upload_file" accept="<?php echo IMAGES_EXTENSION_ARRAY?>" style="display:none;" /-->

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<!-- popup - 이미지 옵션 -->
<div class="popup" id="imgOption">
	<div class="pop-cont">
		<button class="btn lg rnd has-ic bg-white txt-navy" id="detail_img_btn"><i class="ic-megascope"></i><?php echo $_lc['TXT']['자세히보기']?></button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="down_btn"><i class="ic-download"></i><?php echo $_lc['TXT']['다운로드']?></button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="delete_btn"><i class="ic-delete"></i><?php echo $_lc['BTN']['삭제']?></button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<!-- popup(alert) - 삭제 -->
<div class="popup" id="checkDelete">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-question"></i>
				<p class="mt10"><?php echo $_lc['TXT']['삭제하시겠습니까']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="delete_run_btn" class="btn lg has-ic bg-navy"><i class="ic-submit"></i><?php echo $_lc['BTN']['삭제']?></button>
			<button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkDelete', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['취소']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

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

<!-- popup(alert) - 신분증 확인 -->
<div class="popup" id="checkIdHide">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i>
				<p class="mt10">주민번호 뒷자리는 가려주세요</p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkIdHide', true);"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<?php include_once('_tail.php'); ?>