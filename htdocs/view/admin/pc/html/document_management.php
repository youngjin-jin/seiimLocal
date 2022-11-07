<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">문서 관리</h3>

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
				<p class="tit v3 mb4">템플릿</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="templateId" id="templateId">
							<option value="0">전체템플릿</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">작성일자</p>
				<div class="inp-wrap period">
					<div class="inp-item date" target="startDate"><input type="text" name="startDate" id="startDate" disabled style="background-color:#fff;"></div>
					<span>~</span>
					<div class="inp-item date" target="endDate"><input type="text" name="endDate" id="endDate" disabled style="background-color:#fff;"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">작성자</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="adminName" id="adminName" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">문서명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="docName" id="docName" maxlength="30"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">&nbsp;</p>
				<button type="submit" class="btn md bg-navy txt-white has-ic fx-full m0"><i class="ic-search"></i>검색</button>
			</div>
		</div>
	</div>
</form>

<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
		<!--button class="btn sm txt-gray has-ic p0 btn-export"><i class="ic-export"></i>추출</button-->
		<button id="print_btn" class="btn sm txt-gray has-ic p0 btn-print"><i class="ic-print"></i>인쇄</button>
		<button id="write_btn" class="btn sm rnd line-gray txt-gray has-ic"><i class="ic-add"></i>작성</button>
		<button id="del_btn" class="btn sm rnd line-gray txt-gray has-ic"><i class="ic-delete"></i>삭제</button>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 28px">
			<col style="width: 25px">
			<col style="width: 25%">
			<col style="width: 10%">
			<col style="width: 10%">
			<col style="width: 20%">
			<col style="width: 13.5%">
			<col style="width: 13.5%">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장</th>
				<th>기준</th>
				<th>작성일자</th>
				<th>문서명</th>
				<th>작성자</th>
				<th>대상</th>
				
			</tr>
		</thead>
		<tbody id="tbody_list">
			<!--tr ondblclick="location.href='document_management_detail.php';">
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
				<td>교육</td>
				<td>2021.01.01</td>
				<td>22일 1차 안전교육일지</td>
				<td>22일 1차 정기교육</td>
				<td>홍길동</td>
				<td>공덕역 A 공구</td>
			</tr-->
		</tbody>
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