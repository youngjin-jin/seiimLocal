<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">
<link href="/view/css/monokai-sublime.css" rel="stylesheet">

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<input type="hidden" id="eduId" value="<?php echo clean_xss_tags($_GET['eduId'])?>" />

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back">뒤로가기</button>
			<h1 class="title">교육내역상세</h1>
			<button id="qr_btn" class="btn-txt btn-qr">QR</button>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="edu-list">
			<p class="tit v4 mb6" id="eduName"></p>
			<div class="tbl-wrap v1 mt40">
				<table>
					<colgroup>
						<col style="width: 80px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<tr>
							<th>교육일</th>
							<td id="eduDate"></td>
						</tr>
						<tr>
							<th>시작시각</th>
							<td id="startTime"></td>
						</tr>
						<tr>
							<th>종료시각</th>
							<td id="endTime">14:00</td>
						</tr>
						<tr>
							<th>공종</th>
							<td id="constructType">정주토건/굴착기.직원</td>
						</tr>
						<tr>
							<th>교육장소</th>
							<td id="eduPlace">안전교육장</td>
						</tr>
						<tr>
							<th>교육강사</th>
							<td id="instructor">김창진 차장, 주동현 부장</td>
						</tr>
						<tr>
							<th>교육내용</th>
							<td></td>
						</tr>
						<tr>
							<td colspan="2">
								<div id="doc" style="border-radius:8px;background-color:#fff;"></div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<ul class="img-list v1"></ul>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="worker_btn" class="btn lg has-ic bg-gray"><i class="ic-people"></i>교육수료자 목록</button>
			<button id="add_img_btn" class="btn lg has-ic bg-navy"><i class="ic-photo"></i>사진첨부</button>
		</div>
	</div>
</div>
<!-- // fixed -->

<input type="file" id="upload_file" accept="image/*" multiple="true" style="display:none;" />

<!-- popup - 이미지 옵션 -->
<div class="popup" id="megascopeProfile">
	<div class="pop-cont">
		<img src="../img/@temp_id_card.png" id="detail_img">
		<button class="btn-txt has-ic txt-white" onclick="popCloseAndDim('megascopeProfile', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<!-- popup - 이미지 옵션 -->
<div class="popup" id="imgOption">
	<div class="pop-cont">
		<button class="btn lg rnd has-ic bg-white txt-navy" id="detail_img_btn"><i class="ic-megascope"></i>자세히 보기</button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="down_btn"><i class="ic-download"></i>다운로드</button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="delete_img_btn"><i class="ic-delete"></i>삭제</button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<!-- popup(alert) - 삭제 -->
<div class="popup" id="checkDelete">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-question"></i>
				<p class="mt10">삭제하시겠습니까?</p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="del_run_btn"><i class="ic-submit"></i>삭제</button>
			<button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkDelete', true)"><i class="ic-close"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

<?php include_once('_tail.php'); ?>