<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button class="btn-ic ic-edit navy">입력</button><!-- 20210914 -->
			<h1 class="title">프로필</h1>
			<button class="btn-ic ic-menu">메뉴</button>
		</div>
	</div>
</div>
<!-- // header -->

<div class="menu-wrap">
	<div class="container">
		<button class="btn-ic ic-close"></button>
		<div class="user-profile">
			<img src="../img/@temp_profile.png" alt="">
		</div>
		<p class="name"><strong>홍길동</strong>님</p>
		<ul class="menu">
			<li>
				<a href="javascript:;">
					<i class="ic-field-list"></i>
					<p>현장목록</p>
					<i class="ic-link black"></i>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<i class="ic-user"></i>
					<p>프로필</p>
					<i class="ic-link black"></i>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<i class="ic-user"></i>
					<p>장비자격증 등록</p>
					<i class="ic-link black"></i>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<i class="ic-setting"></i>
					<p>설정</p>
					<i class="ic-link black"></i>
				</a>
			</li>
		</ul>
	</div>
</div>

<!-- content -->
<div id="content">
	<div class="container">
		<div class="profile-wrap">
			<div class="profile" onclick="popOpenAndDim('megascopeProfile', true)"><img src="../img/@temp_profile.png" alt=""></div>
			<p class="name mt10">홍길동</p>
			<p class="phone">010-1234-5678</p>
			<div class="tbl-wrap v1 mt20">
				<table>
					<colgroup>
						<col style="width: 125px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<tr>
							<th>성별</th>
							<td>남</td>
						</tr>
						<tr>
							<th>생년월일</th>
							<td>1987년 5월 20일</td>
						</tr>
						<tr>
							<th>주소</th>
							<td>서울특별시 강남구 서초동 <br>압구정 현대아파트 101동 101호</td>
						</tr>
						<tr>
							<th>결혼여부</th>
							<td>기혼</td>
						</tr>
						<tr>
							<th>국적</th>
							<td>말레이시아</td>
						</tr>
						<tr>
							<th>비상 휴대폰번호</th>
							<td>010-1234-5678</td>
						</tr>
						<tr>
							<th>신분증</th>
							<td>
								<img src="../img/@temp_id_card.png" alt="">
							</td>
						</tr>
						<tr>
							<th>기초안전보건교육증</th>
							<td>
								<img src="../img/@temp_certificate.png" alt="" class="mb8">
								이수년월일 &nbsp;2021년 4월 23일
							</td>
						</tr>
						<tr>
							<th>추가서류</th>
							<td></td>
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
		<img src="../img/@temp_profile.png" alt="">
		<button class="btn-txt has-ic txt-white" onclick="popCloseAndDim('megascopeProfile', true)"><i class="ic-close"></i>닫기</button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<?php include_once('_tail.php'); ?>