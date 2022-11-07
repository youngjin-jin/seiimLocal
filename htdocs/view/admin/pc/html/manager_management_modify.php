<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">관리자 수정</h3>
<div class="tit-wrap v1">
	<p class="tit v2">기본 정보</p>
</div>
<div class="db-wrap v1">
	<div class="row">
		<div class="col">
			<p class="tit v3 mb4">이름</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<input type="text" name="" id="">
				</div>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">ID</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<input type="text" name="" id="">
				</div>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb8">PW</p>
			<button class="btn sm rnd line-gray txt-gray has-ic fx-full m0" onclick="popOpenAndDim('alertTemporaryPw', true)"><i class="ic-pw"></i>임시 비밀번호 발송</button>
		</div>
		<div class="col">
			<p class="tit v3 mb4">관리레벨</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<select name="" id="">
						<option value="">호스트관리자</option>
						<option value="">호스트관리자</option>
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
					<input type="text" name="" id="">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="tit-wrap v1">
	<p class="tit v2">현장</p>
	<div class="btn-wrap">
		<button class="btn sm rnd line-gray txt-gray has-ic" onclick="popOpenAndDim('alertAddField', true)"><i class="ic-add"></i>추가</button>
		<button class="btn sm rnd line-gray txt-gray has-ic"><i class="ic-leave"></i>이탈</button>
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
		<tbody>
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
				<td>대림산업</td>
				<td>2021.01.01</td>
				<td>2021.01.01</td>
			</tr-->
		</tbody>
	</table>
</div>
<div class="paging">
	<ul>
		<li class="front"><a href="javascript:;">맨 앞으로</a></li>
		<li class="prev"><a href="javascript:;">앞으로</a></li>
		<li class="on"><a href="javascript:;">1</a></li>
		<li><a href="javascript:;">2</a></li>
		<li class="next"><a href="javascript:;">뒤으로</a></li>
		<li class="back"><a href="javascript:;">맨 뒤로</a></li>
	</ul>
</div>
<div class="btn-wrap mt80 pb40">
	<button class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
	<button class="btn md long bg-black txt-white has-ic"><i class="ic-cancle"></i>취소</button>
</div>

<?php include_once('_page_bottom.php'); ?>

<!-- popup(alert) - 업체정보 체크 -->
<div class="popup alert" id="alertCheckBelong">
	<div class="pop-cont">
		<p class="txt">소속업체 정보를 확인해주세요</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="popClose('alertCheckBelong'); popOpenAndDim('alertAddField', true)"><i class="ic-submit"></i>확인</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 업체정보 체크 -->

<!-- popup - 현장 추가 -->
<div class="popup" id="alertAddField">
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
									<input type="text" name="" id="">
								</div>
							</div>
						</td>
						<td class="ta-r"><button class="btn sm rnd line-gray txt-gray has-ic m0 mt4"><i class="ic-search black"></i>검색</button></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="tbl-wrap v1 mt15">
			<table>
				<colgroup>
					<col style="width: 37px">
					<col style="width: 31px">
					<col style="width: 20%">
					<col style="width: 20%">
					<col style="width: 13%">
					<col style="width: auto">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>No.</th>
						<th>현장명</th>
						<th>발주처</th>
						<th>시공사</th>
						<th>
							소속업체
							<i class="ic-tooltip" title="<i class='ic-info'></i><p>선택 시 작성자와 동일한 소속업체를 <br>알맞게 선택하시기 바랍니다. </p>"></i>
						</th>
					</tr>
				</thead>
				<tbody>
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
						<td>공덕역 A공구</td>
						<td>한국도로공사</td>
						<td>대림산업</td>
						<td>OO개발</td>
					</tr>
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
						<td>공덕역 A공구</td>
						<td>한국도로공사</td>
						<td>대림산업</td>
						<td>OO개발</td>
					</tr>
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
						<td>공덕역 A공구</td>
						<td>한국도로공사</td>
						<td>대림산업</td>
						<td>OO개발</td>
					</tr>
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
						<td>공덕역 A공구</td>
						<td>한국도로공사</td>
						<td>대림산업</td>
						<td>OO개발</td>
					</tr>
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
						<td>공덕역 A공구</td>
						<td>한국도로공사</td>
						<td>대림산업</td>
						<td>OO개발</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="popClose('alertAddField'); popOpenAndDim('alertCheckBelong', true)"><i class="ic-submit"></i>추가</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertAddField')"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 현장 추가 -->

<!-- popup(alert) - 임시 비밀번호 발송 -->
<div class="popup alert" id="alertTemporaryPw">
	<div class="pop-cont">
		<p class="txt">임시 비밀번호를 등록된 <br>연락처로 발송하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="popClose('alertTemporaryPw')"><i class="ic-submit"></i>선택</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertTemporaryPw')"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 임시 비밀번호 발송 -->

<?php include_once('_tail.php'); ?>