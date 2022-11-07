<?php
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
				<dl class="mt20">
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
                <dl class="mt20">
                    <dt>
                        <p class="tit v2"><?php echo $_lc['TXT']['아이디']?></p>
                    </dt>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item"><input type="text" name="id" id="id" class="" placeholder="<?php echo $_lc['placeholder']['아이디']?>" autocomplete="off" readonly required></div>
                        </div>
                    </dd>
                </dl>
                
                <dl class="mt20">
                    <dt>
                        <p class="tit v2"><?php echo $_lc['TXT']['비밀번호변경']?></p>
                    </dt>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item"><input type="password" name="pw" id="pw" class="" placeholder="<?php echo $_lc['placeholder']['비밀번호']?>" autocomplete="off" ></div>
                        </div>
                    </dd>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item"><input type="password" name="pw_re" id="pw_re" class="" placeholder="<?php echo $_lc['placeholder']['비밀번호재입력']?>" autocomplete="off" ></div>
                        </div>
                    </dd>
                </dl>

                <dl class="mt20">
                    <dt>
                        <p class="tit v2"><?php echo $_lc['TXT']['직급']?></p>
                    </dt>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item"><input type="text" name="position" id="position" class="" placeholder="<?php echo $_lc['placeholder']['직급']?>" autocomplete="off" required></div>
                        </div>
                    </dd>
                </dl>

                <dl class="mt20">
                    <dt>
                        <p class="tit v2"><?php echo $_lc['TXT']['관리레벨']?></p>
                    </dt>
                    <dd class="mt6">
                        <div class="inp-wrap">
                            <div class="inp-item">
                                <select name="rankLev" id="rankLev" required disabled>
                                    <option value="0"><?php echo $_lc['TXT']['호스트']?></option>
                                    <option value="1"><?php echo $_lc['TXT']['일반']?></option>
                                </select>
                            </div>
                        </div>
                    </dd>
                </dl>
				
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