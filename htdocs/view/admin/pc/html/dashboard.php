<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('관리자만 접근 가능한 페이지 입니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<h3 class="tit v1">대시보드</h3>
<div class="tit-wrap v1">
	<div class="left fx ai-c">
		<p class="tit v3">현장</p>
		<div class="inp-wrap">
			<div class="inp-item">
				<select id="query_site_select" data-placeholder="현장" class="chosen">
					<option value="0">전체 현장</option>
				</select>
			</div>
		</div>
	</div>
	<div class="right fx ai-c">
		<p id="load_datetime_p" class="now">2021.08.11 (수) 12:00:01 기준</p>
		<button id="reload_btn" class="btn-ic btn-reset"></button>
	</div>
</div>
<div class="db-wrap v1">
	<div class="row">
		<div class="col half">
			<p class="tit v2">교육 현황<span>오늘 기준</span></p>
			<div class="status-wrap">
				<div class="status">
					<p class="value">
						<strong id="eduCnt">0</strong>건
					</p>
					<p class="tit">총 교육 생성수</p>
				</div>
				<div class="status">
					<p class="value">
						<strong id="eduWorkerCnt">0</strong>명
					</p>
					<p class="tit">교육 이수자</p>
				</div>
				<div class="status">
					<p class="value">
						<strong id="newSignupCnt">0</strong>명
					</p>
					<p class="tit">신규 가입자</p>
				</div>
			</div>
		</div>
		<div class="col half">
			<p class="tit v2">Notice board</p>
			<div class="inp-wrap notice">
				<div class="inp-item"><textarea name="noti" id="noti" placeholder="동료들에게 새로운 소식을 전하세요."></textarea></div>
			</div>
			<div class="btn-wrap mt10"><button id="noti_save_btn" class="btn md has-ic bg-navy long txt-white"><i class="ic-submit"></i>전달</button></div>
		</div>
	</div>
	<div class="row mt35">
		<div class="col half">
			<p class="tit v2">안전교육 통계</p>
			<div class="statistics-wrap">
				<!--div class="statistics">
					<div class="head">
						<p>신규 교육</p>
					</div>
					<div class="cont">
						<dl>
							<dt>금일</dt>
							<dd>10건</dd>
							<dd>100명</dd>
						</dl>
						<dl>
							<dt>누적</dt>
							<dd>100건</dd>
							<dd>1000명</dd>
						</dl>
					</div>
				</div>
				<div class="statistics">
					<div class="head">
						<p>신규 교육</p>
					</div>
					<div class="cont">
						<dl>
							<dt>금일</dt>
							<dd>10건</dd>
							<dd>100명</dd>
						</dl>
						<dl>
							<dt>누적</dt>
							<dd>100건</dd>
							<dd>1000명</dd>
						</dl>
					</div>
				</div>
				<div class="statistics">
					<div class="head">
						<p>신규 교육</p>
					</div>
					<div class="cont">
						<dl>
							<dt>금일</dt>
							<dd>10건</dd>
							<dd>100명</dd>
						</dl>
						<dl>
							<dt>누적</dt>
							<dd>100건</dd>
							<dd>1000명</dd>
						</dl>
					</div>
				</div>
				<div class="statistics">
					<div class="head">
						<p>신규 교육</p>
					</div>
					<div class="cont">
						<dl>
							<dt>금일</dt>
							<dd>10건</dd>
							<dd>100명</dd>
						</dl>
						<dl>
							<dt>누적</dt>
							<dd>100건</dd>
							<dd>1000명</dd>
						</dl>
					</div>
				</div-->
			</div>
			<p class="tit v2 mt40">현장 현황<span>누적집계</span></p>
			<div class="filed-status mt10">
				<div class="filed-item">
					<div class="value-wrap">
						<div class="inner">
							<p class="value"><strong id="site_info_edu">0</strong>건</p>
						</div>
					</div>
					<p class="tit">교육종류</p>
				</div>
				<div class="filed-item">
					<div class="value-wrap">
						<div class="inner">
							<p class="value"><strong id="site_info_worker">0</strong>명</p>
						</div>
					</div>
					<p class="tit">건설근로자</p>
				</div>
				<div class="filed-item">
					<div class="value-wrap">
						<div class="inner">
							<p class="value"><strong id="site_info_com">0</strong>개사</p>
						</div>
					</div>
					<p class="tit">업체등록</p>
				</div>
				<div class="filed-item">
					<div class="value-wrap">
						<div class="inner">
							<p class="value"><strong id="site_info_doc">0</strong>건</p>
						</div>
					</div>
					<p class="tit">문서양식</p>
				</div>
				<div class="filed-item">
					<div class="value-wrap">
						<div class="inner">
							<p class="value"><strong id="site_info_admin">0</strong>명</p>
						</div>
					</div>
					<p class="tit">안전관리자</p>
				</div>
			</div>
		</div>
		<div class="col half">
			<ul id="noti_list" class="list-wrap v2">
				<!--li>
					<div class="pofile">
						<img src="../img/@temp_profile.png" alt="">
					</div>
					<div class="txt-wrap">
						<div class="top">
							<div class="left">
								<p class="name">새임 관리자</p>
								<p class="date">2021.05.12</p>
								<button class="btn btn-like"><span></span></button>
							</div>
							<div class="right">
								<button class="btn-ic btn-delete" onclick="popOpenAndDim('alertDelete', true)"></button>
							</div>
						</div>
						<div class="bottom">
							<p class="txt">오늘은 크레인 작업 있습니다. 담당자 확인 부탁드립니다. 그리고 내용
								내용내용내용내용내용내용내용내용내용내용내용내용내용내용</p>
						</div>
					</div>
				</li>
				<li>
					<div class="pofile">
						<img src="../img/@temp_profile.png" alt="">
					</div>
					<div class="txt-wrap">
						<div class="top">
							<div class="left">
								<p class="name">새임 관리자</p>
								<p class="date">2021.05.12</p>
								<button class="btn btn-like on"><span>2</span></button>
							</div>
							<div class="right">
								<button class="btn-ic btn-delete" onclick="popOpenAndDim('alertDelete', true)"></button>
							</div>
						</div>
						<div class="bottom">
							<p class="txt">오늘은 크레인 작업 있습니다. 담당자 확인 부탁드립니다. </p>
						</div>
					</div>
				</li-->
			</ul>
			<div class="paging"></div>
		</div>
	</div>
</div>

<?php include_once('_page_bottom.php'); ?>

<!-- popup(alert) - 삭제 -->
<div class="popup alert" id="alertDelete">
	<div class="pop-cont">
		<p class="txt">삭제하시겠습니까?</p>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn sm bg-navy txt-white has-ic" onclick="dashboard.del_noti();"><i class="ic-submit"></i>예</button>
			<button class="btn sm bg-black txt-white has-ic" onclick="popClose('alertDelete');"><i class="ic-cancle"></i>아니오</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

<?php include_once('_tail.php'); ?>