<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">장비종류 관리</h3>
<div class="tit-wrap v1">
	<p class="tit v2">장비종류 리스트</p>
	<div class="btn-wrap">
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
			<col style="width: 70px">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>장비명</th>
				<th>상태</th>
			</tr>
		</thead>
		<tbody id="tbody_list">
			<tr>
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
				<td>지게차</td>
				<td>활성</td>
			</tr>
		</tbody>
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

<!-- popup - 장비관리 추가 -->
<div class="popup" id="addEquipmentkind">
	<form id="add_form" method="post">
		<input type="hidden" id="add_form_update_id" />
		
		<div class="pop-cont">
			<p class="tit v2 ta-c mb40">장비 추가</p>
			<div class="tbl-wrap v2">
				<table>
					<colgroup>
						<col style="width: 83px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>장비명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item"><input type="text" name="add_form_name" id="add_form_name" autocomplete="off" minlength="2" maxlength="100" required></div>
								</div>
							</td>
						</tr>
						<tr>
							<th>활성화여부</th>
							<td>
								<div class="inp-wrap pt8">
									<div class="inp-item">
										<label for="add_form_activation">
											<input type="checkbox" name="add_form_activation" id="add_form_activation" value="1">
											<p class="txt">활성</p>
										</label>
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
				<button type="button" class="btn sm bg-black txt-white has-ic cancel_btn"><i class="ic-cancle"></i>취소</button>
			</div>
		</div>
	</form>
</div>
<!-- // popup - 교육종류 추가 -->

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
		<p class="txt">삭제할 데이터를 선택하세요.</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('select_alert')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 권한 체크 -->

<?php include_once('_tail.php'); ?>