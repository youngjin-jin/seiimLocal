<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">업체 관리</h3>
<div class="filter-wrap">
	<div class="row">
		<div class="col" style="width: calc(50% - 20px);">
			<p class="tit v3 mb4">업체명</p>
			<div class="inp-wrap">
				<div class="inp-item"><input type="text" name="company_name" id="company_name" maxlength="30"></div>
			</div>
		</div>
		<div class="col" style="width: calc(50% - 20px);">
			<p class="tit v3 mb4">&nbsp;</p>
			<button id="search_btn" class="btn md bg-navy txt-white has-ic fx-full m0"><i class="ic-search"></i>검색</button></button>
		</div>
	</div>
</div>
<div class="tit-wrap v1">
	<p class="tit v2">검색 결과</p>
	<div class="btn-wrap">
		<!-- <button class="btn sm rnd line-gray txt-gray has-ic" id="edit_btn"><i class="ic-edit"></i>수정</button> -->
		<button class="btn sm rnd line-gray txt-gray has-ic" id="add_btn"><i class="ic-add"></i>추가</button>
		<button class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>삭제</button>
	</div>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 37px">
			<col style="width: 70px">
			<col>
			<col style="width: 40%">
			<col style="width: 70px">
		</colgroup>
		<thead>
			<tr ondblclick="location.href='company_management_detail.php';">
				<th>&nbsp;</th>
				<th>No.</th>
				<th>업체명</th>
				<th>사업자등록번호</th>
				<th></th>
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

<!-- popup - 업체 추가 -->
<div class="popup" id="addCompany">
	<form id="add_form" method="post">
		<input type="hidden" id="add_form_update_id" />
		
		<div class="pop-cont">
			<p class="tit v2 ta-c mb35">업체 추가</p>
			<div class="tbl-wrap v2">
				<table>
					<colgroup>
						<col style="width: 94px">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>업체명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="add_form_company_name" id="add_form_company_name" autocomplete="off" minlength="4" maxlength="20" required>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>사업자등록번호</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="add_form_company_number" id="add_form_company_number" placeholder="‘-‘없이 숫자로 입력" class="number" autocomplete="off" minlength="10" maxlength="10" required>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="pop-footer">
			<div class="btn-wrap">
				<button type="submit" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
				<button type="button" class="btn sm bg-black txt-white has-ic" id="cancel_btn"><i class="ic-cancle"></i>취소</button>
			</div>
		</div>
	</form>
</div>
<!-- // popup - 업체 추가 -->
<!-- popup - 업체 수정 -->
<div class="popup" id="editCompany">
	<form id="edit_form" method="post">
		<input type="hidden" id="add_form_update_id" />
		
		<div class="pop-cont">
			<p class="tit v2 ta-c mb35">업체 수정</p>
			<div class="tbl-wrap v2">
				<table>
					<colgroup>
						<col style="width: 94px">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>업체명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="edit_form_company_name" id="edit_form_company_name" value="SK건설" autocomplete="off" minlength="4" maxlength="20" required>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>사업자등록번호</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="edit_form_company_number" id="edit_form_company_number" value="1018234928" placeholder="‘-‘없이 숫자로 입력" class="number" autocomplete="off" minlength="10" maxlength="10" required>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="pop-footer">
			<div class="btn-wrap">
				<button type="submit" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
				<button type="button" class="btn sm bg-black txt-white has-ic" id="cancel_btn"><i class="ic-cancle"></i>취소</button>
			</div>
		</div>
	</form>
</div>
<!-- // popup - 업체 수정 -->

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
		<p class="txt">삭제할 업체를 선택하세요.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('select_alert')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->

<?php include_once('_tail.php'); ?>