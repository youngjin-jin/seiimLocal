<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<input type="hidden" id="eduId" value="<?php echo clean_xss_tags($_GET['eduId'])?>" />
<input type="hidden" id="workerId" value="<?php echo clean_xss_tags($_GET['workerId'])?>" />

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<h1 class="title">프로필</h1>
			<button id="back_btn" class="btn-ic ic-cancle">뒤로가기</button>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="profile-wrap">
			<div class="profile"><img src="/view/images/avatar.jpg" id="profile_img"></div>
			<p class="txt-phone mt8"><span id="phone1"></span><button class="btn-ic ic-phone call_btn"></button></p>
			<dl class="mt20">
				<dt>
					<p class="tit v2">이름</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="name"></span>

					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">성별</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="sex"></span>

					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">주소</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="adress1"></span>

					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">결혼여부</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="married"></span>

					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">국적</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="nationality"></span>
					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">비상 휴대폰번호</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<p class="txt-phone jc-fs p0"><span id="phone2"></span><button class="btn-ic ic-phone call_btn"></button></p>
					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">기초안전보건교육 이수</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="gradu-date"></span>
					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">기초안전보건교육증</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<span id="safe_certi"></span>
					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">자격증 목록</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<div id="certi_image">
							<div class="certi_image_box">
								<p>자격증제목</p>
								<img src="../img/img_smile.png" alt="">
							</div>
						</div>
					</div>
				</dd>
			</dl>
			<dl class="mt20">
				<dt>
					<p class="tit v2">추가서류</p>
				</dt>
				<dd class="mt6">
					<div class="inp-wrap">
						<p id="add_upload">
						</p>
					</div>
				</dd>
			</dl>


			
			<div class="tbl-wrap v1 mt40" style="display:none;">
				<table>
					<colgroup>
						<col style="width: 125px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<!--<tr>
							<th>이름</th>
							<td id="name"></td>
						</tr>-->
						<tr>
							<th>성별</th>
							<td id="sex"></td>
						</tr>
						<tr>
							<th>생년월일</th>
							<td id="birth"></td>
						</tr>
						<tr>
							<th>주소</th>
							<td id="adress1"></td>
						</tr>
						<tr>
							<th>결혼여부</th>
							<td id="married"></td>
						</tr>
						<tr>
							<th>국적</th>
							<td id="nationality">말레이시아</td>
						</tr>
						<tr>
							<th>비상 휴대폰번호</th>
							<td>
								<p class="txt-phone jc-fs p0"><span id="phone2"></span><button class="btn-ic ic-phone call_btn"></button></p>
							</td>
						</tr>
						<tr>
							<th>기초안전보건교육 이수</th>
							<td id="gradu-date"></td>
						</tr>
						<tr style='display:none'>
							<th>신분증</th>
							<td id="id_card"></td>
						</tr>
						<tr>
							<th>기초안전보건교육증</th>
							<td id="safe_certi"></td>
						</tr>
						
						<tr>
							<th>자격증 목록</th>
							<td id="certi_image">
								<div class="certi_image_box">
									<p>자격증제목</p>
									<img src="../img/img_smile.png" alt="">
								</div>
							</td>
						</tr>



						<tr>
							<th>추가서류</th>
							<td id="add_upload"></td>
						</tr>
						


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- // content -->

<!-- popup - 이미지 옵션 -->
<div class="popup" id="megascopeProfile">
	<div class="pop-cont">
		<img src="../img/@temp_id_card.png" id="detail_img">
		<button class="btn-txt has-ic txt-white" onclick="popCloseAndDim('megascopeProfile', true)"><i class="ic-close"></i>닫기</button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<?php include_once('_tail.php'); ?>