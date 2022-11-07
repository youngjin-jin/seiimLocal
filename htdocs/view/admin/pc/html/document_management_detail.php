<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">문서 상세</h3>
<div class="tit-wrap v1">
	<p class="tit v2">문서 정보</p>
</div>

<form id="add_form" method="post">

	<div class="db-wrap v1">
		<div class="row">
			<div class="col half">
				<p class="tit v3 mb4">현장</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="siteId" id="siteId" required></select>
					</div>
				</div>
			</div>
			<div class="col half">
				<p class="tit v3 mb4">기준</p>
				<div class="inp-wrap">
					<div class="inp-item fx-none">
						<label for="docDiv1">
							<input type="radio" name="docDiv" id="docDiv1" value="0" checked>
							<p class="txt"><span>근로자</span></p>
						</label>
					</div>
					<div class="inp-item fx-none">
						<label for="docDiv2">
							<input type="radio" name="docDiv" id="docDiv2" value="-1">
							<p class="txt"><span>교육</span></p>
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col half">
				<p class="tit v3 mb4">문서 템플릿명</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="templateId" id="templateId" required disabled></select>
					</div>
				</div>
			</div>
			<div class="col half">
				<p class="tit v3 mb4">문서명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="docName" id="docName" minlength="2" maxlength="30" required></div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn sm rnd line-gray txt-gray has-ic" style="display:none;"><i class="ic-search black"></i>저장</button>
		<div class="row" style="margin-top:20px;">
			<div class="col full">
				<p class="tit v3 mb8">관련교육내역</p>
				<div class="qualification-wrap">
					<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="get_relation_btn"><i class="ic-add"></i>조건추가</button>
					<ul id="relation_ul">
						<!--li>
							<p>신규입사자 교육_210624_1차</p>
							<button type="button" class="btn-ic ic-clear delete_relation_btn"></button>
						</li-->
					</ul>
				</div>
			</div>
		</div>
	</form>

	<div class="list-change mt35">
		<div class="left">
			<div class="tit-wrap v1 mb10">
				<p class="tit v2">근로자명</p>
				<div class="inp-wrap search">
					<div class="inp-item">
						<input type="text" name="search_worker" id="search_worker">
					</div>
					<button type="button" id="search_worker_btn" class="btn sm rnd line-gray txt-gray has-ic"><i class="ic-search black"></i>검색</button>
				</div>
			</div>
			<div class="tbl-wrap v1" style="height:300px;overflow-y:auto;">
				<table>
					<colgroup>
						<col style="width: 37px">
						<col style="width: 33.3333%">
						<col style="width: 33.3333%">
						<col style="width: 33.3333%">
					</colgroup>
					<thead>
						<tr>
							<th>
								<div class="inp-wrap">
									<div class="inp-item">
										<label for="all_check">
											<input type="checkbox" name="all_check" id="all_check" class="all_check" target="worker_list">
											<p></p>
										</label>
									</div>
								</div>
							</th>
							<th>생년월일</th>
							<th>근로자명</th>
							<th>소속</th>
						</tr>
					</thead>
					<tbody id="worker_list">
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
							<td>60-12-11</td>
							<td>홍길동</td>
							<td>OO토건</td>
						</tr-->
					</tbody>
				</table>
			</div>
		</div>
		<div class="controller">
			<button type="button" id="right_worker_btn" class="btn-ic ic-move-right"></button>
			<button type="button" id="left_worker_btn" class="btn-ic ic-move-left"></button>
		</div>
		<div class="right">
			<div class="tit-wrap v1 mb10">
				<p class="tit v2">교육 이수자 목록</p>
			</div>
			<div class="tbl-wrap v1" style="height:300px;overflow-y:auto;">
				<table>
					<colgroup>
						<col style="width: 37px">
						<col style="width: 33.3333%">
						<col style="width: 33.3333%">
						<col style="width: 33.3333%">
					</colgroup>
					<thead>
						<tr>
							<th>
								<div class="inp-wrap">
									<div class="inp-item">
										<label for="all_check2">
											<input type="checkbox" name="all_check2" id="all_check2" class="all_check" target="add_worker_list">
											<p></p>
										</label>
									</div>
								</div>
							</th>
							<th>생년월일</th>
							<th>근로자명</th>
							<th>소속</th>
						</tr>
					</thead>
					<tbody id="add_worker_list">
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
							<td>60-12-11</td>
							<td>홍길동</td>
							<td>OO토건</td>
						</tr-->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="btn-wrap mt80 pb40">
	<button type="button" id="submit_btn" class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
	<button type="button" id="back_btn" class="btn md long bg-black txt-white has-ic"><i class="ic-cancle"></i>취소</button>
</div>

<?php include_once('_page_bottom.php'); ?>

<!-- popup - 관련 교육 내역 -->
<div class="popup" id="viewEduList">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb35">관련 교육 내역</p>
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
							<th>교육명</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="search_eduName" id="search_eduName" maxlength="30">
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
					<col style="width: 20%">
					<col style="width: 20%">
					<col style="width: 20%">
					<col style="width: 20%">
					<col style="width: 20%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>교육일자</th>
						<th>교육종류</th>
						<th>교육명</th>
						<th>교육생성자</th>
						<th>주관업체</th>
					</tr>
				</thead>
				<tbody id="relation_list">
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
						<td>2021.05.11</td>
						<td>신규입사자교육</td>
						<td>가나다라</td>
						<td>오필진</td>
						<td>대림산업</td-->
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button type="button" class="btn sm bg-navy txt-white has-ic" id="add_relation_btn"><i class="ic-submit"></i>추가</button>
			<button type="button" class="btn sm bg-black txt-white has-ic" onclick="document_management_detail.modal_close();"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 현장 추가 -->


<?php include_once('_tail.php'); ?>