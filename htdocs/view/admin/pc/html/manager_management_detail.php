<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">관리자 생성</h3>
<div class="tit-wrap v1">
	<p class="tit v2">기본 정보</p>
</div>

<form id="add_form" method="post">
	<input type="hidden" id="update_id" value="<?php echo clean_xss_tags($_GET['key'])?>">
	
	<div class="db-wrap v1">
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">이름</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="name" id="name" autocomplete="off" minlength="2" maxlength="30" required>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">ID</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="id" id="id" autocomplete="off" minlength="4" maxlength="30" required>
					</div>
				</div>
			</div>
			<?php if (clean_xss_tags($_GET['key'])) { ?>
			<div class="col">
				<p class="tit v3 mb8">PW</p>
				<button type="button" class="btn sm rnd line-gray txt-gray has-ic fx-full m0" onclick="popOpenAndDim('alertTemporaryPw', true)"><i class="ic-pw"></i>임시 비밀번호 발송</button>
			</div>
			<?php } else { ?>
			<div class="col">
				<p class="tit v3 mb4">PW</p>
				<div class="guide">
					<p>생성시, 임시 비밀번호가 자동 발송됩니다.</p>
				</div>
			</div>
			<?php } ?>
			<div class="col">
				<p class="tit v3 mb4">관리레벨</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="level" id="level">
							<?php if ($_SESSION['level'] == 0) { ?>
							<option value="0">슈퍼 관리자</option>
							<?php } ?>
							<?php if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) { ?>
							<option value="1">호스트 관리자</option>
							<?php } ?>
							<option value="2">일반 관리자</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">연락처</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" id="phone" class="phone" autocomplete="off" minlength="13" maxlength="13" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tit-wrap v1">
		<p class="tit v2">현장</p>
		<div class="btn-wrap">
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="add_btn"><i class="ic-add"></i>추가</button>
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>이탈</button>
		</div>
	</div>
	<div class="tbl-wrap v1">
		<table>
			<colgroup>
				<col style="width: 37px">
				<col style="width: 31px">
				<col style="width: 20%">
				<col style="width: 15%">
				<col style="width: 15%">
				<col style="width: 15%">
				<col style="width: auto">
				<col style="width: auto">
			</colgroup>
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>No.</th>
					<th>현장명</th>
					<th>발주처</th>
					<th>시공사</th>
					<th>소속업체</th>
					<th>현장 추가일</th>
					<th>현장 이탈일</th>
				</tr>
			</thead>
			<tbody id="tbody_list"></tbody>
		</table>
	</div>
	<div class="btn-wrap mt80 pb40">
		<button type="submit" class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
		<button type="button" class="btn md long bg-black txt-white has-ic" id="back_btn"><i class="ic-cancle"></i>이전으로</button>
	</div>
</form>

<?php include_once('_page_bottom.php'); ?>

<!-- popup(alert) - 업체정보 체크 -->
<div class="popup alert" id="alertCheckBelong">
	<div class="pop-cont">
		<p class="txt">소속업체 정보를 확인해주세요</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="popClose('alertCheckBelong');"><i class="ic-submit"></i>확인</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 업체정보 체크 -->

<!-- popup - 현장 추가 -->
<div class="popup" id="alertAddField">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb35">현장 추가</p>
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
							<th>현장명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="site_name" id="site_name" autocomplete="off" maxlength="50">
									</div>
								</div>
							</td>
							<td class="ta-r"><button type="submit" class="btn sm rnd line-gray txt-gray has-ic m0 mt4"><i class="ic-search black"></i>검색</button></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="tbl-wrap v1 mt15">
			<table>
				<colgroup>
					<col style="width: 37px">
					<col style="width: auto">
					<col style="width: 20%">
					<col style="width: 20%">
					<!--col-->
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>현장명</th>
						<th>발주처</th>
						<th>시공사</th>
						<!--th>
							소속업체
							<i class="ic-tooltip" title="<i class='ic-info'></i><p>선택 시 작성자와 동일한 소속업체를 <br>알맞게 선택하시기 바랍니다. </p>"></i>
						</th-->
					</tr>
				</thead>
				<tbody id="site_list">
					<!--tr>
						<td>
							<div class="inp-wrap">
								<div class="inp-item">
									<label for="radio01">
										<input type="radio" name="radio" id="radio01">
										<p></p>
									</label>
								</div>
							</div>
						</td>
						<td>공덕역 A공구</td>
						<td>한국도로공사</td>
						<td>대림산업</td>
						<td>OO개발</td>
					</tr-->
				</tbody>
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

<!-- popup(alert) - 삭제 -->
<div class="popup alert" id="alertDelete">
	<div class="pop-cont">
		<p class="txt">이탈 하시겠습니까?</p>
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
		<p class="txt">이탈할 현장을 선택하세요.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('select_alert')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->
<!-- // popup(alert) - 삭제 -->

<!-- popup(alert) - 임시 비밀번호 발송 -->
<div class="popup alert" id="alertTemporaryPw">
	<div class="pop-cont">
		<p class="txt">임시 비밀번호를 등록된 <br>연락처로 발송하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="manager_management_detail.temp_pass();"><i class="ic-submit"></i>선택</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertTemporaryPw')"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 임시 비밀번호 발송 -->

<?php include_once('_tail.php'); ?>