<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">
<link href="/view/css/monokai-sublime.css" rel="stylesheet">

<h3 class="tit v1">교육종류 관리</h3>
<div class="tit-wrap v1" style="border-bottom:none;">
    <div class="left fx ai-c">
		<p class="tit v3">현장</p>
		<div class="inp-wrap">
			<div class="inp-item">
				<select id="query_site_select">
					<?php if ($_SESSION['level'] == 0) { ?>
					<option value="0">전체</option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
</div>

<div style="border-bottom:1px solid #CED4DA;margin-bottom:10px;">
	<div style="float:left;width:50%;">
		<button class="tab active" id="cate">교육 종류</button>
		<button class="tab" id="detail">교육 세부종류</button>
	</div>
	<div style="float:right;width:50%;text-align:right;">
		<button class="btn sm rnd line-gray txt-gray has-ic" id="add_btn"><i class="ic-add"></i>추가</button>
		<button class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn" style="margin-right:0;"><i class="ic-delete"></i>삭제</button>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="tbl-wrap v1">
	<table id="cate_table" class="table">
		<colgroup>
			<col style="width: 37px">
			<col style="width: 70px">
			<col style="width: 20%">
			<col style="width: 70px">
			<col>
			<col style="width: 100px">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장명</th>
				<th>code1</th>
				<th>교육명(교육종류)</th>
				<th>교육 세부종류 수</th>
			</tr>
		</thead>
		<tbody class="tbody_list">
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
				<td>공덕역B공구</td>
				<td>A00</td>
				<td>신규입사자교육</td>
				<td>3</td>
			</tr>
		</tbody>
	</table>
	
	<table id="detail_table" class="table" style="display:none;">
		<colgroup>
			<col style="width: 37px">
			<col style="width: 70px">
			<col style="width: 150px">
			<col style="width: 70px">
			<col style="width: 150px">
			<col>
			<col style="width: 70px">
		</colgroup>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>No.</th>
				<th>현장명</th>
				<th>code2</th>
				<th>교육명(교육종류)</th>
				<th>교육 세부종류</th>
				<th>상태</th>
			</tr>
		</thead>
		<tbody class="tbody_list">
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
				<td>공덕역B공구</td>
				<td>A00</td>
				<td>신규입사자교육</td>
				<td>근로자</td>
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

<script src="/view/js/highlight.pack.js"></script>
<script src="/view/js/quill.js"></script>

<!-- popup - 교육종류 추가 -->
<div class="popup" id="add_cate">
	<form id="add_cate_form" method="post">
		<input type="hidden" id="add_cate_form_update_id" />
		
		<div class="pop-cont">
			<p class="tit v2 ta-c mb40">교육종류 추가</p>
			<div class="tbl-wrap v2">
				<table>
					<colgroup>
						<col style="width: 83px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>현장</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<select name="add_cate_form_site" id="add_cate_form_site" required>
											<option value="">현장을 선택하세요.</option>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>교육종류명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item"><input type="text" name="add_cate_form_name" id="add_cate_form_name" autocomplete="off" minlength="2" maxlength="100" required></div>
								</div>
							</td>
						</tr>
							<!-- 개발중이라 임시로 숨김 RDH-->
						<!-- <tr>
							<th>문서양식 등록</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item" style="display: flex;">
									<input type="hidden" name="doc_file" id="doc_file">
										<input type="file" id="upload_file" accept=<?php echo IMAGES_EXTENSION_ARRAY.",".EXCEL_EXTENSION_ARRAY.",".WORD_EXTENSION_ARRAY.",".POWERPOINT_EXTENSION_ARRAY ?> multiple="false" style="display: none;"/>
										<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="add_doc_btn"><i class="ic-add"></i>추가</button>
										<label>반영여부: 미등록</label>
										<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="preview_btn"><i class="ic-find"></i>미리보기</button>
									</div>
								</div>
							</td>
						</tr> -->
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

<!-- popup - 교육종류 추가 -->
<div class="popup" id="add_detail">
	<form id="add_detail_form" method="post">
		<input type="hidden" id="add_detail_form_update_id" />
		
		<div class="pop-cont">
			<p class="tit v2 ta-c mb40">교육 세부종류 추가</p>
			<div class="tbl-wrap v2">
				<table>
					<colgroup>
						<col style="width: 83px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>현장</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<select name="add_detail_form_site" id="add_detail_form_site" required>
											<option value="">현장을 선택하세요.</option>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>교육종류</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<select name="add_detail_form_cate" id="add_detail_form_cate" required>
											<option value="">교육종류를 선택해주세요.</option>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>교육세부종류</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item"><input type="text" name="add_detail_form_name" id="add_detail_form_name" autocomplete="off" minlength="2" maxlength="100" required></div>
								</div>
							</td>
						</tr>
						<tr>
							<th>교육내용</th>
							<td><div>
									<div id="add_detail_form_memo"></div>
								</div>
							</td>
						</tr>
						<tr>
							<th>활성화여부</th>
							<td>
								<div class="inp-wrap pt8">
									<div class="inp-item">
										<label for="add_detail_form_activation">
											<input type="checkbox" name="add_detail_form_activation" id="add_detail_form_activation" value="1">
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