<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<style>
.error { 
	width: 300px; 
	height:auto; 
	position: fixed; 
	left: 50%; 
	margin-left:-150px; 
	bottom: 100px; 
	z-index: 9999; 
	background-color: #fff; 
	font-size: 15px; 
	font-weight: bold;
	padding: 20px; 
	text-align:center; 
	border-radius: 2px; 
	-webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1); 
	-moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1); 
	box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
}
</style>

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
			<h1 class="title">교육대상자 QR스캔</h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="qrscan-wrap">
			<!--video id="preview" style="width:100%;height:calc(100vh - 80px);"></video-->
			<canvas id="canvas" hidden style="width:100%;"></canvas>
		</div>
	</div>
</div>

<!--button id="cange_camera_btn" style="position:absolute;bottom:20px;right:20px;z-index:99;background-color:#fff;width:50px;height:50px;border-radius:25px;text-align:center;">
	<i class="fa fa-camera" style="font-size:34px;color:#08B39A;margin-bottom:3px;margin-right:1px;"></i>
</button-->

<div class='error' style='display:none'></div>
<!-- // content -->

<!-- popup - 필터 -->
<div class="popup" id="scanSubject" style="display:none;">
	<div class="pop-header">
		<button onclick="qrscan.modal_close();" class="btn-ic ic-cancle">닫기</button>
	</div>
	<div class="pop-cont">
		<div class="container pb15">
			<p class="tit v4" id="workerName">홍길동</p>
			<div class="tbl-wrap v1 mt15">
				<table>
					<colgroup>
						<col style="width: 80px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<tr>
							<th>생년월일</th>
							<td id="workerBirth">1987-05-11</td>
						</tr>
						<tr>
							<th class="va-m pt6">교육 종류</th>
							<td>
								<div class="inp-wrap">
									<div class="inp-item">
										<select name="filter_educategory" id="filter_educategory">
											<option value="">교육종류</option>
										</select>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<p class="tit v2 mt10">교육수료내역<span class="cnt" id="eduCnt">0</span></p>
			<div class="list-wrap v2 mt6">
				<ul id="edu_list">
					<li>
						<p class="tit">교육제목제목제목제목제목제목제목</p>
						<p class="db">2021-01-01 대림산업</p>
					</li>
				</ul>
			</div>
			<div class="paging mt15">
				<!--button class="btn-ic btn-prev">이전</button>
				<p class="page">1/10</p>
				<button class="btn-ic btn-next">다음</button-->
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button id="add_btn" class="btn lg has-ic bg-navy"><i class="ic-submit"></i>교육수료</button>
			<button onclick="qrscan.modal_close();" class="btn lg has-ic bg-gray"><i class="ic-close"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup - 필터 -->

<?php include_once('_tail.php'); ?>