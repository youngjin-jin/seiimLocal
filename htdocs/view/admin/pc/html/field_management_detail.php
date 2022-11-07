<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');

if (empty($_GET['key'])) {
	$disabled = '';
} else {
	if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) $disabled = 'disabled'; else $disabled = '';
}
?>

<style>
.inp-item input { 
	background-color: #fff;
}
</style>

<?php if ($_SESSION['level'] == 0) { ?>
<form id="add_form" method="post">
<?php } ?>

<input type="hidden" id="json" value="<?php echo $_GET['json']?>" />

	<h3 class="tit v1">현장 관리</h3>
	<div class="tit-wrap v1">
		<p class="tit v2">기본 정보</p>
	</div>
	<div class="db-wrap v1">
		<div class="row">
			<div class="col half">
				<p class="tit v3 mb4">현장명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="site_name" id="site_name" autocomplete="off" minlength="2" maxlength="50" required <?php echo $disabled?>></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">현장코드</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="site_code" id="site_code" value="<?php echo clean_xss_tags($_GET['key'])?>" autocomplete="off" minlength="2" maxlength="50" <?php echo (clean_xss_tags($_GET['key']))?'required':''?> disabled></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col half">
				<p class="tit v3 mb4">공사기간</p>
				<div class="inp-wrap period">
					<div class="inp-item <?php echo ($_SESSION['level'] == 0)?'date':'';?>" target="start_date"><input type="text" name="start_date" id="start_date" disabled style="background-color:#fff;"></div>
					<span>~</span>
					<div class="inp-item <?php echo ($_SESSION['level'] == 0)?'date':'';?>" target="end_date"><input type="text" name="end_date" id="end_date" disabled style="background-color:#fff;"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">현장상태</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="site_status" id="site_status" required <?php echo $disabled?>>
							<option value="0">진행중</option>
							<option value="1">종료</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">발주처</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="owner" id="owner" required <?php echo $disabled?>>
							<option value="">발주처</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">시공사</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="contractor" id="contractor" required <?php echo $disabled?>>
							<option value="">시공사</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col half">
				<p class="tit v3 mb4">주소</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="addr" id="addr" autocomplete="off" minlength="2" maxlength="100" required <?php echo $disabled?>></div>
				</div>
			</div>
		</div>
	</div>
	<div class="tit-wrap v1">
		<p class="tit v2">협력사</p>
		<div class="btn-wrap">
			<?php if ($_SESSION['level'] == 0 && clean_xss_tags($_GET['key'])) { ?>
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="add_btn"><i class="ic-add"></i>추가</button>
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>삭제</button>
			<?php } ?>
		</div>
	</div>
	
<?php if (clean_xss_tags($_GET['key'])) { ?>
	<div id="partner_div">
		<div class="tbl-wrap v1">
			<table>
				<thead>
					<tr>
						<th style="width: 37px">&nbsp;</th>
						<th style="width: 70px">No.</th>
						<th>협력사명</th>
						<th>사업자번호</th>
					</tr>
				</thead>
				<tbody id="tbody_list"></tbody>
			</table>
		</div>
	</div>
	
<?php } ?>

	<div class="btn-wrap mt80 pb40">
		<?php if ($_SESSION['level'] == 0) { ?>
		<button type="submit" class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
		<?php } ?>
		<button type="button" class="btn md long bg-black txt-white has-ic" id="back_btn"><i class="ic-cancle"></i>이전으로</button>
	</div>
	
<?php if ($_SESSION['level'] == 0) { ?>
</form>
<?php } ?>

<?php include_once('_page_bottom.php'); ?>

<?php if ($_SESSION['level'] == 0) { ?>
<!-- popup - 관련 교육 내역 -->
<div class="popup" id="viewEduList">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb35">협력사</p>
		<div class="tbl-wrap v2">
			<form id="search_form" method="post">
				<table>
					<colgroup>
						<col style="width: 74px">
						<col>
						<col style="width: 92px">
					</colgroup>
					<tbody>
						<tr>
							<th>업체명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="company_name" id="company_name" autocomplete="off" maxlength="50">
									</div>
								</div>
							</td>
							<td class="ta-r"><button type="submit" class="btn sm rnd line-gray txt-gray has-ic m0 mt4"><i class="ic-search black"></i>검색</button></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="tbl-wrap v1 mt15" style="height:300px;overflow-y:auto;">
			<table>
				<colgroup>
					<col style="width: 37px">
					<col style="width: 50%">
					<col style="width: 50%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>업체명</th>
						<th>사업자번호</th>
					</tr>
				</thead>
				<tbody id="search_list"></tbody>
			</table>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" id="add_run_btn"><i class="ic-submit"></i>추가</button>
			<button class="btn sm bg-black txt-white has-ic" id="cancel_btn"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 현장 추가 -->

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
		<p class="txt">삭제할 협력사를 선택하세요.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('select_alert')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->
<!-- // popup(alert) - 삭제 -->
<?php } ?>

<?php include_once('_tail.php'); ?>