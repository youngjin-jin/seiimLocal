<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>
<h3 class="tit v1">교육 내역 관리 </h3>
<form id="search_form" method="post">
	<div class="filter-wrap">
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">현장</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="siteId" id="siteId">
							<option value="0">전체현장</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">교육수료일</p>
				<div class="inp-wrap period">
					<div class="inp-item date" target="startDate"><input type="text" name="startDate" id="startDate" disabled style="background-color:#fff;"></div>
					<span>~</span>
					<div class="inp-item date" target="endDate"><input type="text" name="endDate" id="endDate" disabled style="background-color:#fff;"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">교육명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="eduName" id="eduName" maxlength="30"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">교육종류</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="cat1" id="cat1" disabled>
							<option value="-1">전체</option>
						</select>
					</div>
				</div>
			</div>
			<!-- 20210916 수정 -->
			<div class="col">
				<p class="tit v3 mb4">교육세부종류</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="cat2" id="cat2" disabled>
							<option value="-1">전체</option>
						</select>
					</div>
				</div>
			</div>
			<!-- <div class="col">
				<p class="tit v3 mb4">공종</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select id="query_site_select" data-placeholder="공종" class="chosen">
							<option value="0">전체 현장</option>
						</select>
					</div>
				</div>
			</div> -->
		</div>
		<div class="row">
			<!-- <div class="col">
				<p class="tit v3 mb4">교육주관</p>
				<div class="inp-wrap"0>
					<div class="inp-item">
						<select name="svName" id="svName">
							<option value="">전체</option>
						</select>
					</div>
				</div>
			</div> -->
			<div class="col">
				<p class="tit v3 mb4">교육진행자</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="instructor" id="instructor" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">&nbsp;</p>
				<button type="submit" class="btn md bg-navy txt-white has-ic fx-full m0"><i class="ic-search"></i>검색</button>
			</div>
			<!-- // 20210916 수정 -->
		</div>
	</div>
</form>

<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
	<button id="print_btn" class="btn sm txt-gray has-ic p0 btn-print"><i class="ic-print"></i>인쇄</button>
		<button id="excel_btn" class="btn sm txt-gray has-ic p0 btn-export"><i class="ic-export"></i>엑셀추출</button>
		<button id="write_btn" class="btn sm rnd line-gray txt-gray has-ic"><i class="ic-add"></i>작성</button>
		<button id="del_btn" class="btn sm rnd line-gray txt-gray has-ic"><i class="ic-delete"></i>삭제</button>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<!-- 20210916 수정 -->
		<colgroup>
			<col style="width: 28px">
			<col style="width: 25px">
			<col style="width: 25%">
			<col style="width: 20%">
			<col style="width: 8%">
			<col style="width: 8%">
			<col style="width: 8%">
			<col style="width: 17%">
			<col style="width: 15%">
			<col style="width: 5%">
			<col style="width: 5%">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장</th>
				<th>교육명</th>
				<th>교육일</th>
				<th>교육시각</th>
				<th>교육진행자</th>								
				<th>교육종류</th>
				<th>교육세부종류</th>
				<th>공종</th>
				<th>교육이수인원</th>
			</tr>
		</thead>
		<tbody id="tbody_list"> 
			<!--tr>
				<td>
					<div class="inp-wrap">
						<div class="inp-item">
							<label for="check01">
								<input type="checkbox" name="" id="check01">
								<p></p>
							</label>
						</div>
					</div>
				</td>
				<td>1</td>
				<td>공덕역 A공구 신규입사자 안전교육</td>
				<td>2021.05.22</td>
				<td>13:01</td>
				<td>성주필</td>
				<td>공덕역 A공구</td>
				<td>신규입사자 교육</td>
				<td>내용내용내용</td>
				<td>내용내용내용</td>
			</tr-->
		</tbody>
		<!-- // 20210916 수정 -->
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

<?php include_once('_tail.php'); ?>