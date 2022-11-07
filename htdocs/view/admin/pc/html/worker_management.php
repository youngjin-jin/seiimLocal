<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">근로자 관리</h3>

<form id="search_form" method="post">
	<div class="filter-wrap">
		<div class="row">
			<!--div class="col">
				<p class="tit v3 mb4">교육 수료일</p>
				<div class="inp-wrap period">
					<div class="inp-item date" target="start_date"><input type="text" name="start_date" id="start_date" disabled style="background-color:#fff;"></div>
					<span>~</span>
					<div class="inp-item date" target="end_date"><input type="text" name="end_date" id="end_date" disabled style="background-color:#fff;"></div>
				</div>
			</div-->
			<div class="col">
				<p class="tit v3 mb4">이름</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="name" id="name" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">생년월일</p>
				<div class="inp-wrap"><!-- 20210819 수정 -->
					<div class="inp-item"><input type="text" name="birth" id="birth" maxlength="10"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">국적</p>
				<div class="inp-wrap"><!-- 20210819 수정 -->
					<div class="inp-item">
						<select name="national" id="national">
							<option value="-1">전체</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">현장</p>
				<div class="inp-wrap"><!-- 20210819 수정 -->
					<div class="inp-item">
						<select name="site" id="site">
							<option value="0">전체</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">장비종류</p>
				<div class="inp-wrap"> <!-- 20210819 수정 -->
					<div class="inp-item">
						<select name="equipment" id="equipment">
							<option value="-1">전체</option>
						</select>
					</div>
				</div>
			</div> 
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">연락처</p>
				<div class="inp-wrap">
	
					<div class="inp-item"><input type="text" name="phone" id="phone" maxlength="30"></div>
				
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">&nbsp;</p>
				<button type="submit" class="btn md bg-navy fx-full txt-white has-ic"><i class="ic-search"></i>검색</button>
			</div>
			<!-- <div class="col">
				<p class="tit v3 mb4">소속회사</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select id="query_site_select" data-placeholder="소속회사" class="chosen">
							<option value="0">전체</option>
						</select>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</form>

<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
		<button id="excel_btn" onclick="location.href='/excel_edu.php';" class="btn sm txt-gray has-ic p0 btn-export"><i class="ic-export"></i>엑셀추출</button>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 50px;">
			<col style="width: 27%;">
			
			<col style="width: 12%;">
			<col style="width: 12%;">
			<col style="width: 12%;">
			<col style="width: auto;">
		</colgroup>
		<thead>
			<tr>
				<th>No.</th>
				<th>현장</th>
				<!--th>교육수료일</th-->				
				<th>이름</th>
				<th>연락처</th>
				<th>생년월일</th>
				<th>국적</th>

				<!-- 개발중이라 임시로 숨김 RDH-->
				<!-- <th>기초정보등록</th>
				<th>QR</th>
				<th>장비종류</th>
				<th>소속회사</th> -->
				</tr>
		</thead>
		<tbody id="tbody_list"></tbody>
	</table>
</div>

<div class="paging"></div>

<?php include_once('_page_bottom.php'); ?>

<!-- popup - 날짜 선택 -->
<div class="popup" id="viewCalendar">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb40">날짜 선택</p>
		<div class="datepicker"></div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<input type="hidden" id="date_target" />
			<button id="select_date_btn" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>선택</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('viewCalendar');"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 날짜 선택 -->

<?php include_once('_tail.php'); ?>