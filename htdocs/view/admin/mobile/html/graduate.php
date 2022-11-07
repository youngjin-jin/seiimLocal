<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

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
			<h1 class="title">교육수료자목록</h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="graduate-wrap">
			<p class="tit v4" id="eduName"></p>
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
							<th>교육수료자</th>
							<td id="worker_cnt"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<ul class="img-list v2">
				<!--li>
					<div class="profile">
						<img src="../img/@temp_profile.png" alt="">
					</div>
					<div class="txt-wrap">
						<p class="name">홍길동</p>
						<p class="birthday">1987.05.23</p>
					</div>
				</li-->
			</ul>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="qr_btn" class="btn lg has-ic bg-navy"><i class="ic-qr-min"></i>교육대상자 QR 스캔</button>
		</div>
	</div>
</div>
<!-- // fixed -->

<?php include_once('_tail.php'); ?>