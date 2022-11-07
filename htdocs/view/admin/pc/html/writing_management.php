<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">근로자 작성문서 관리 </h3>

<form id="search_form" method="post">
	<div class="filter-wrap">
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">현장</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="site" id="site">
							<option value="0">현장</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">작성일</p>
				<div class="inp-wrap period">
					<div class="inp-item date" target="start_date"><input type="text" name="start_date" id="start_date" disabled style="background-color:#fff;"></div>
					<span>~</span>
					<div class="inp-item date" target="end_date"><input type="text" name="end_date" id="end_date" disabled style="background-color:#fff;"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">작성자</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="name" id="name" maxlength="30"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">문서명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="doc_name" id="doc_name" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<!--p class="tit v3 mb4">소속업체</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="sv_name" id="sv_name" maxlength="30"></div>
				</div-->
			</div>
			<div class="col">
				<p class="tit v3 mb4">&nbsp;</p>
				<button class="btn md bg-navy txt-white has-ic fx-full m0"><i class="ic-search"></i>검색</button></button>
			</div>
		</div>
	</div>
</form>

<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
		<button class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>삭제</button>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 28px">
			<col style="width: 25px">
			<col style="width: 25%">
			<col style="width: 15%">
			<col style="width: 30%">
			<col style="width: 15%">
			<col style="width: 15%">
		</colgroup>
		<thead>
			<tr ondblclick="location.href='writing_management_detail.php';">
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장</th>
				<th>작성일자</th>
				<th>문서명</th>
				<th>소속업체</th>
				<th>작성자</th>				
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

<!-- popup(alert) - 삭제 -->
<div class="popup alert" id="alertDelete">
	<div class="pop-cont">
		<p class="txt">삭제 하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="delete_run_btn" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>예</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertDelete')"><i class="ic-cancle"></i>아니오</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

<?php include_once('_tail.php'); ?>