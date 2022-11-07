<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
include_once('_page_top.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">
<link href="/view/css/monokai-sublime.css" rel="stylesheet">

<style>
	.inp-item > label{display:inline-block;margin-right:5px;}
</style>

<h3 class="tit v1">교육 내역 상세</h3>
<div class="tit-wrap v1">
	<p class="tit v2">기본 정보</p>
</div>

<form id="add_form" method="post">
	<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>">
	
	<div class="db-wrap v1">
		<!-- 20210916 수정 -->
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
				<p class="tit v3 mb4">교육명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="eduName" id="eduName" maxlength="30" required></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col half">
				<p class="tit v3 mb4">교육대상</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="foredu" id="foredu" maxlength="50" required>
					</div>
				</div>
			</div>
			<div class="col half">
				<p class="tit v3 mb4">교육방법</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<label for="inp-how-1">
							<input type="checkbox" name="eduType" id="inp-how-1" value="강의식" class='eduType'>
							<p class="txt">강의식</p>
						</label>
						<label for="inp-how-2">
							<input type="checkbox" name="eduType" id="inp-how-2" value="토의식" class='eduType'>
							<p class="txt">토의식</p>
						</label>
						<label for="inp-how-3">
							<input type="checkbox" name="eduType" id="inp-how-3" value="시청각" class='eduType'>
							<p class="txt">시청각</p>
						</label>
						<label for="inp-how-4">
							<input type="checkbox" name="eduType" id="inp-how-4" value="기타" class='eduType'>
							<p class="txt">기 타</p>
						</label>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">교육종류</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="cat1" id="cat1" required></select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">교육세부종류</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="cat2" id="cat2" required disbled></select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">교육일</p>
				<div class="inp-wrap">
					<div class="inp-item date" target="eduDate"><input type="text" name="eduDate" id="eduDate" readonly required></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">교육장소</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="eduPlace" id="eduPlace" maxlength="50" required></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col half">
				<p class="tit v3 mb4">교육시간</p>
				<div class="inp-wrap time">
					<div class="inp-item"><input type="text" name="startTime" id="startTime" placeholder="13:00" required></div>
					<span>~</span>
					<div class="inp-item"><input type="text" name="endTime" id="endTime" placeholder="15:00" required></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">공종</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="constructType" id="constructType" maxlength="50"></div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">교육강사</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="instructor" id="instructor" maxlength="50"></div>
				</div>
			</div>
		</div>
		<!-- // 20210916 수정 -->
		<div class="row">
			<div class="col full">
				<p class="tit v3 mb4">교육내용</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<div id="doc"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt40">
			<div class="col half">
				<div class="tit-wrap v1 mb10">
					<p class="tit v2">교육수료 근로자</p>
					<div class="btn-wrap">
						<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="add_basic_worker_btn"><i class="ic-add"></i>추가</button>
						<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="delete_btn"><i class="ic-delete"></i>삭제</button>
					</div>
				</div>
				<div class="tbl-wrap v1">
					<table>
						<colgroup>
							<col style="width: 37px">
							<col style="width: 31px">
							<col style="width: 33.3333%">
							<col style="width: 33.3333%">
							<col style="width: 33.3333%">
						</colgroup>
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>No.</th>
								<th>근로자명</th>
								<th>생년월일</th>
								<th>소속업체</th>
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
								<td>1</td>
								<td>홍길동</td>
								<td>60-12-11</td>
								<td>&nbsp;</td>
							</tr-->
						</tbody>
					</table>
				</div>
			</div>
			<div class="col half">
				<div class="tit-wrap v1 mb10">
					<p class="tit v2">교육사진<span style="font-size:12px; letter-spacing:-1px;font-weight:400;">(서류에는 사진 2장만 출력됩니다)</span></p>
					<div class="btn-wrap">
						<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="add_img_btn"><i class="ic-add"></i>추가</button>
						<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="delete_img_btn"><i class="ic-delete"></i>삭제</button>
					</div>
				</div>
				<div class="img-list v1">
					<ul id="img_list" style="display:block;">
						<!--li>
							<div class="inp-wrap">
								<div class="inp-item">
									<label for="img01">
										<input type="checkbox" name="" id="img01">
										<p></p>
									</label>
								</div>
							</div>
							<img src="../img/@temp_thumnail.png">
						</li-->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="btn-wrap mt80 pb40">
		<button type="submit" class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
		<button type="button" id="back_btn" class="btn md long bg-black txt-white has-ic"><i class="ic-cancle"></i>취소</button>
	</div>
</form>

<input type="file" id="upload_file" accept="<?php echo IMAGES_EXTENSION_ARRAY?>" multiple="true" style="display:none;" />

<?php include_once('_page_bottom.php'); ?>

<script src="/view/js/highlight.pack.js"></script>
<script src="/view/js/quill.js"></script>

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

<!-- popup - 교육수료자 추가 -->
<div class="popup" id="addTrainee">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb40">교육수료자 추가</p>
		<div class="list-change mt35">
			<div class="left">
				<div class="tbl-wrap v2 mb15">
					<form id="search_form" method="post">
						<table>
							<tr>
								<td style="width:130px;padding-right:10px;">
									<div class="inp-wrap">
										<div class="inp-item">
											<input type="text" name="name" id="name" placeholder="근로자명" maxlength="10">
										</div>
									</div>
								</td>
								<td style="width:180px;">
									<div class="inp-wrap">
										<div class="inp-item">
											<input type="text" name="svName" id="svName" placeholder="소속업체명" maxlength="30">
										</div>
									</div>
								</td>
								<td class="ta-r"><button type="submit" class="btn sm rnd line-gray txt-gray has-ic m0 mt4"><i class="ic-search black"></i>검색</button></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="tbl-wrap v1" style="height:300px;overflow-y:auto;">
					<table>
						<colgroup>
							<col style="width: 37px">
							<col style="width: 30%">
							<col style="width: 30%">
							<col style="width: auto">
						</colgroup>
						<thead>
							<tr>
								<th>
									<div class="inp-wrap">
										<div class="inp-item">
											<label for="all_check">
												<input type="checkbox" name="all_check" id="all_check" class="all_check" target="search_worker_list">
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
						<tbody id="search_worker_list">
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
				<button id="right_worker_btn" class="btn-ic ic-move-right"></button>
				<button id="left_worker_btn" class="btn-ic ic-move-left"></button>
			</div>

			<div class="right">
				<p class="tit v3 mb20">교육 이수자 목록</p>
				<div class="tbl-wrap v1" style="height:300px;overflow-y:auto;">
					<table>
						<colgroup>
							<col style="width: 37px">
							<col style="width: 30%">
							<col style="width: 30%">
							<col style="width: auto">
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
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" id="add_worker_btn"><i class="ic-submit"></i>추가</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="edu_history_management_detail.modal_close();"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 교육수료자 추가 -->

<?php include_once('_tail.php'); ?>