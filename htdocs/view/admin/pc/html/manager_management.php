<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">관리자 관리</h3>

<form id="search_form" method="post">
	<div class="filter-wrap">
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">현장</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="site_name" id="site_name" autocomplete="off" maxlength="50">
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">발주처</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="owner" id="owner" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">시공사</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="contractor" id="contractor" maxlength="30"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">소속업체</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="company_name" id="company_name" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">이름</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="name" id="name" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">연락처</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="phone" id="phone" class="number" maxlength="30"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">관리자등급</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="level" id="level">
							<option value="0">전체</option>
							<option value="1">호스트 관리자</option>
							<option value="2">일반 관리자</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">&nbsp;</p>
				<button type="submit" class="btn md bg-navy txt-white has-ic fx-full m0"><i class="ic-search"></i>검색</button></button>
			</div>
		</div>
	</div>
</form>

<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
		<?php if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) { ?>
		<button class="btn sm rnd line-gray txt-gray has-ic" id="add_btn"><i class="ic-add"></i>추가</button>
		<button class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>삭제</button>
		<?php } else { ?>
		<button class="btn sm rnd line-gray txt-gray has-ic" onclick="popOpenAndDim('alertCheckAuthority', true);"><i class="ic-add"></i>추가</button>
		<!-- case 1: 슈퍼, 호스트 관리자일 경우 접속, case 2: 일반 관리자일 경우 alert -->
		<button class="btn sm rnd line-gray txt-gray has-ic" onclick="popOpenAndDim('alertCheckAuthority', true);"><i class="ic-delete"></i>삭제</button>
		<?php } ?>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 28px">
			<col style="width: 25px">
			<col style="width: 25%">
			<col style="width: 15%">
			<col style="width: 8%">
			<col style="width: 15%">
			<col style="width: 8%">
			<col style="width: 12%">
			<col style="width: 10%">
			<col style="width: 10%">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장명</th>
				<th>발주처</th>
				<th>시공사</th>
				<th>소속업체</th>
				<th>ID</th>
				<th>이름</th>
				<th>연락처</th>
				<th>관리자등급</th>
			</tr>
		</thead>
		<tbody id="tbody_list"></tbody>
	</table>
</div>

<div class="paging"></div>

<?php include_once('_page_bottom.php'); ?>

<!-- popup(alert) - 삭제 -->
<div class="popup alert" id="alertDelete">
	<div class="pop-cont">
		<p class="txt">삭제하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="delete_run_btn" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>예</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertDelete')"><i class="ic-cancle"></i>아니오</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

<!-- popup(alert) - 권한 체크 -->
<div class="popup alert" id="alertCheckAuthority">
	<div class="pop-cont">
		<p class="txt">권한이 없습니다.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertCheckAuthority')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->

<!-- popup(alert) - 권한 체크 -->
<div class="popup alert" id="select_alert" style="width:300px;">
	<div class="pop-cont">
		<p class="txt">삭제할 관리자를 선택하세요.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('select_alert')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->

<?php include_once('_tail.php'); ?>