<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">현장 관리</h3>
<div class="filter-wrap">
	<div class="row">
		<div class="col">
			<p class="tit v3 mb4">현장명</p>
			<div class="inp-wrap">
				<div class="inp-item"><input type="text" name="site_name" id="site_name" maxlength="30" <?php echo ($_SESSION['level'] == 0)?'':'disabled'?>></div>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">현장상태</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<select name="site_status" id="site_status">
						<option value="">전체</option>
						<option value="0">진행중</option>
						<option value="1">종료</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">공사기간</p>
			<div class="inp-wrap period">
				<div class="inp-item date" target="start_date"><input type="text" name="start_date" id="start_date" disabled style="background-color:#fff;"></div>
				<span>~</span>
				<div class="inp-item date" target="end_date"><input type="text" name="end_date" id="end_date" disabled style="background-color:#fff;"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p class="tit v3 mb4">발주처</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<input type="text" name="owner" id="owner" maxlength="30">
				</div>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">시공사</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<input type="text" name="contractor" id="contractor" maxlength="30">
				</div>
			</div>
		</div>		
	</div>
	<div class="btn-wrap"><button id="search_btn" class="btn md bg-navy txt-white has-ic"><i class="ic-search"></i>검색</button></div>
</div>
<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
		<?php if ($_SESSION['level'] == 0) { ?>
		<button class="btn sm rnd line-gray txt-gray has-ic" id="add_btn"><i class="ic-add"></i>추가</button>
		<button class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>삭제</button>
		<?php } ?>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 28px">
			<col style="width: 25px">
			<col style="width: 11%">
			<col style="width: 23%">
			<col style="width: 10%">
			<col style="width: 10%">
			<col style="width: 6%">
			<col style="width: 9%">
			<col style="width: 9%">
			<col style="width: 22%">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장코드</th>
				<th>현장명</th>
				<th>발주처</th>
				<th>시공사</th>
				<th>현장상태</th>
				<th>착공일</th>
				<th>종료일</th>
				<th>주소</th>
			</tr>
		</thead>
		<tbody id="tbody_list"></tbody>
	</table>
</div>
<div class="paging">
	<!--ul>
		<li class="front"><a href="javascript:;">맨 앞으로</a></li>
		<li class="prev"><a href="javascript:;">앞으로</a></li>
		<li class="on"><a href="javascript:;">1</a></li>
		<li><a href="javascript:;">2</a></li>
		<li class="next"><a href="javascript:;">뒤으로</a></li>
		<li class="back"><a href="javascript:;">맨 뒤로</a></li>
	</ul-->
</div>

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

<!-- popup(alert) - 권한 체크 -->
<div class="popup alert" id="select_alert" style="width:300px;">
	<div class="pop-cont">
		<p class="txt">삭제할 현장을 선택하세요.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('select_alert')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->
<!-- // popup(alert) - 삭제 -->

<?php include_once('_tail.php'); ?>