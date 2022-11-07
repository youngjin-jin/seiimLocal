<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">문서 상세</h3>
<div class="tit-wrap v1">
	<p class="tit v2">문서 정보</p>
</div>
<div class="db-wrap v1">
	<div class="row">
		<div class="col half">
			<p class="tit v3 mb4">현장</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<select name="" id="">
						<option value="">공덕역A공구</option>
						<option value="">공덕역A공구</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col half">
			<p class="tit v3 mb4">기준</p>
			<div class="inp-wrap">
				<div class="inp-item fx-none">
					<label for="radio1">
						<input type="radio" name="standard" id="radio1">
						<p class="txt"><span>근로자</span></p>
					</label>
				</div>
				<div class="inp-item fx-none">
					<label for="radio2">
						<input type="radio" name="standard" id="radio2">
						<p class="txt"><span>교육</span></p>
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col half">
			<p class="tit v3 mb4">근로자 템플릿명</p>
			<div class="inp-wrap">
				<div class="inp-item">
					<select name="" id="">
						<option value="">신규입사자 관리대장</option>
						<option value="">신규입사자 관리대장</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col half">
			<p class="tit v3 mb4">문서명</p>
			<div class="inp-wrap">
				<div class="inp-item"><input type="text" name="" id=""></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col full">
			<p class="tit v3 mb8">관련교육내역</p>
			<div class="qualification-wrap">
				<button class="btn sm rnd line-gray txt-gray has-ic" onclick="popOpenAndDim('viewEduList', true)"><i class="ic-add"></i>조건추가</button>
				<ul>
					<li>
						<p>신규입사자 교육_210624_1차</p>
						<button class="btn-ic ic-clear"></button>
					</li>
					<li>
						<p>신규입사자 교육_210624_1차</p>
						<button class="btn-ic ic-clear"></button>
					</li>
					<li>
						<p>신규입사자 교육_210624_1차</p>
						<button class="btn-ic ic-clear"></button>
					</li>
					<li>
						<p>신규입사자 교육_210624_1차</p>
						<button class="btn-ic ic-clear"></button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="btn-wrap mt80 pb40">
	<button class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
	<button class="btn md long bg-black txt-white has-ic"><i class="ic-cancle"></i>취소</button>
</div>

<?php include_once('_page_bottom.php'); ?>

<!-- popup - 관련 교육 내역 -->
<div class="popup" id="viewEduList">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb35">관련 교육 내역</p>
		<div class="tbl-wrap v2">
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
						<td>2021.05.11</td>
						<td>신규입사자교육</td>
						<td>가나다라</td>
						<td>오필진</td>
						<td>대림산업</td>
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
						<td>2021.05.11</td>
						<td>신규입사자교육</td>
						<td>가나다라</td>
						<td>오필진</td>
						<td>대림산업</td>
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
						<td>2021.05.11</td>
						<td>신규입사자교육</td>
						<td>가나다라</td>
						<td>오필진</td>
						<td>대림산업</td>
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
						<td>2021.05.11</td>
						<td>신규입사자교육</td>
						<td>가나다라</td>
						<td>오필진</td>
						<td>대림산업</td>
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
						<td>2021.05.11</td>
						<td>신규입사자교육</td>
						<td>가나다라</td>
						<td>오필진</td>
						<td>대림산업</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="popClose('viewEduList')"><i class="ic-submit"></i>추가</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('viewEduList')"><i class="ic-cancle"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 현장 추가 -->

<?php include_once('_tail.php'); ?>