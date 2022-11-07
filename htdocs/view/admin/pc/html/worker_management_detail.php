<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">근로자 관리 상세</h3>
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
						<input type="text" name="name" id="name" autocomplete="off" minlength="2" maxlength="30" readonly required>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">생년월일</p>
				<div class="inp-wrap">
					<!-- 20210815 수정 -->
					<div class="inp-item">
						<input type="text" name="birth" id="birth" maxlength="10">
					</div>
					<!-- // 20210815 수정 -->
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">ID</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="userId" id="userId" autocomplete="off" minlength="4" maxlength="30" readonly required>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">PW</p>
				<button type="button" class="btn sm rnd line-gray txt-gray has-ic fx-full m0" onclick="popOpenAndDim('alertTemporaryPw', true)"><i class="ic-pw"></i>임시 비밀번호 발송</button>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">성별</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="sex" id="sex">
							<option value="1">남</option>
							<option value="0">여</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">결혼여부</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="married" id="married">
							<option value="0">미혼</option>
							<option value="1">기혼</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">직종</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="occupation" id="occupation" autocomplete="off" maxlength="30">
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">국적</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="nationality" id="nationality"></select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="tit v3 mb4">연락처</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="phone1" id="phone1" class="phone" autocomplete="off" minlength="13" maxlength="13" required>
					</div>
				</div>
			</div>
			<div class="col">
				<p class="tit v3 mb4">비상연락처</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="phone2" id="phone2" class="phone" autocomplete="off" minlength="13" maxlength="13">
					</div>
				</div>
			</div>
			<div class="col half">
				<p class="tit v3 mb4">주소</p>
				<div class="inp-wrap address">
					<div class="inp-item">
						<input type="text" name="addr1" id="addr1" placeholder="주소검색" readonly>
					</div>
					<div class="inp-item">
						<input type="text" name="addr2" id="addr2" placeholder="상세주소" autocomplete="off" maxlength="50">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="tit-wrap v1">
		<p class="tit v2">장비 자격증</p>
		<div class="btn-wrap">
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="add_cert"><i class="ic-add"></i>추가</button><!-- 20210815 수정 -->
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="cert_select_del_btn"><i class="ic-delete"></i>삭제</button><!-- 20210815 수정 -->
		</div>
	</div>
	<div class="tbl-wrap v1">
		<table>
			<colgroup>
				<col style="width: 37px">
				<col style="width: 31px">
				<col style="width: 20%">
				<col style="width: 30%">
				<col style="width: 15%">
				<col style="width: auto">
			</colgroup>
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>No.</th>
					<th>장비 종류</th>
					<th>자격증 명칭</th>
					<th>발급 년월일</th>
					<th>자격증 보기</th>
				</tr>
			</thead>
			<tbody id="cert_list">
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
					<td>지게차</td>
					<td>지게차운전면허증</td>
					<td>2020.06.01</td>
					<td>
						<button class="btn sm rnd line-gray txt-gray" onclick="popOpenAndDim('alertView', true)">보기</button>
					</td>
					<td>&nbsp;</td>
				</tr-->
			</tbody>
		</table>
	</div>
	<div class="tit-wrap v1 mt40">
		<p class="tit v2">현장/소속 업체</p>
		<div class="btn-wrap">
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" onclick="popOpenAndDim('alertAddField', true)"><i class="ic-add"></i>추가</button><!-- 20210815 수정 -->
			<button type="button" class="btn sm rnd line-gray txt-gray has-ic" id="site_del_btn"><i class="ic-delete"></i>이탈</button><!-- 20210815 수정 -->
		</div>
	</div>
	<div class="tbl-wrap v1">
		<table>
			<colgroup>
				<col style="width: 37px">
				<col style="width: 31px">
				<col style="width: 21.5%">
				<col style="width: 15%">
				<col style="width: 15%">
				<col style="width: 15%">
				<col style="width: 16%">
				<col style="width: 18%">
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
					<td>공덕역 A공구</td>
					<td>한국도로공사</td>
					<td>대림산업</td>
					<td>A 협력사</td>
					<td>2017.01.01</td>
					<td>2017.01.01</td>
				</tr-->
			</tbody>
		</table>
	</div>
	<div class="tit-wrap v1 mt40">
		<p class="tit v2">교육 내역</p>
	</div>
	<div class="tbl-wrap v1">
		<table>
			<colgroup>
				<col style="width: 37px">
				<col style="width: 70px">
				<col style="width: auto">
				<col style="width: 20%">
				<col style="width: 15%">
				<col style="width: 15%">
				<col style="width: 37px">
			</colgroup>
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>No.</th>
					<th>교육명</th>
					<th>교육종류</th>
					<th>교육주관</th>
					<th>교육수료일</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody id="edu_list">
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
					<td>신규입사자교육 17차</td>
					<td>신규입사자교육</td>
					<td>대림산업</td>
					<td>2018.02.05</td>
					<td>&nbsp;</td>
				</tr-->
			</tbody>
		</table>
	</div>
	<div class="btn-wrap mt80 pb40">
		<button type="submit" class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button><!-- 20210819 수정 -->
		<button type="button" class="btn md long bg-black txt-white has-ic" onclick="popOpenAndDim('alertEditingOut', true)"><i class="ic-cancle"></i>취소</button><!-- 20210819 수정 -->
	</div>
</form>

<?php include_once('_page_bottom.php'); ?>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<!-- popup(alert) - 임시 비밀번호 발송 -->
<div class="popup alert" id="alertTemporaryPw">
	<div class="pop-cont">
		<p class="txt">임시 비밀번호를 등록된 <br>연락처로 발송하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="worker_management_detail.temp_pass();"><i class="ic-submit"></i>선택</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertTemporaryPw')"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 임시 비밀번호 발송 -->

<!-- popup(alert) - 삭제 -->
<div class="popup alert" id="alertDelete">
	<div class="pop-cont">
		<p class="txt" id="delete_modal_title">삭제 하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="delete_run_btn" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>예</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertDelete')"><i class="ic-cancle"></i>아니오</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

<!-- popup(alert) - 자격증 보기 -->
<div class="popup alert" id="alertView">
	<div class="pop-cont">
		<div class="img-wrap" id="cert_img_div" style="background:none;border-radius:none;"></div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertView')"><i class="ic-cancle"></i>닫기</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 자격증 보기 -->

<!-- popup - 장비 자격증 추가 -->
<div class="popup" id="alertAddCertificate">
	<form id="cert_add_form" method="post">
		<div class="pop-cont">
			<p class="tit v2 ta-c mb35">장비 자격증 추가</p>
			<div class="tbl-wrap v2">
				<table>
					<colgroup>
						<col style="width: 74px">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>장비 종류</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<select name="cert_type" id="cert_type"></select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>자격증 명칭</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<input type="text" name="cert_name" id="cert_name" autocomplete="off" minlength="2" maxlength="30" required>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>발급년월일</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<select name="year" id="year" required>
											<option value="">연도</option>
										</select>
									</div>
									<div class="inp-item">
										<select name="month" id="month" required>
											<option value="">월</option>
										</select>
									</div>
									<div class="inp-item">
										<select name="day" id="day" required>
											<option value="">일</option>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>자격증사진</th>
							<td>
								<input type="hidden" name="cert_img" id="cert_img">
								<input type="file" name="upload_file" id="upload_file" accept="<?php echo IMAGES_EXTENSION_ARRAY?>" style="display:none;">
								<button type="button" id="cert_img_add_btn" class="btn sm rnd line-gray txt-gray has-ic m0" style="height:38px;"><i class="ic-file"></i>파일첨부</button>
								<div id="cert_img_add_div" class="img-wrap mt10" style="display:none;border-radius:none;background:none;"></div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="pop-footer">
			<div class="btn-wrap">
				<button type="submit" class="btn sm bg-navy txt-white has-ic"><i class="ic-submit"></i>추가</button>
				<button type="button" class="btn sm bg-black txt-white has-ic" onclick="worker_management_detail.cert_modal_close();"><i class="ic-cancle"></i>취소</button>
			</div>
		</div>
	</form>
</div>
<!-- // popup - 장비 자격증 추가 -->

<!-- popup - 현장 추가 -->
<div class="popup" id="alertAddField">
	<form id="search_form" method="post">
		<div class="pop-cont">
			<p class="tit v2 ta-c mb35">현장 추가</p>
			<div class="tbl-wrap v2">
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
			</div>
		</form>

		<div class="tbl-wrap v1 mt15">
			<table>
				<colgroup>
					<col style="width: 37px">
					<col style="width: 20%">
					<col style="width: 20%">
					<col style="width: 13%">
					<col>
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>현장명</th>
						<th>발주처</th>
						<th>시공사</th>
						<th>
							소속업체
							<i class="ic-tooltip" title="<i class='ic-info'></i><p>선택 시 작성자와 동일한 소속업체를<br>알맞게 선택하시기 바랍니다. </p>"></i>
						</th>
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
			<button id="site_add_run_btn" class="btn sm bg-navy txt-white has-ic" id="add_run_btn"><i class="ic-submit"></i>추가</button>
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

<!-- 20210819 수정 -->
<!-- popup(alert) - 수정중 페이지 이탈 -->
<div class="popup alert" id="alertEditingOut">
	<div class="pop-cont">
		<p class="txt">저장되지 않습니다. <br>나가시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="history.back();"><i class="ic-submit"></i>예</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertEditingOut')"><i class="ic-cancle"></i>아니오</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 수정중 페이지 이탈 -->
<!-- // 20210819 수정 -->

<?php include_once('_tail.php'); ?>