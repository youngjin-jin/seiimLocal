<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back">뒤로가기</button>
			<h1 class="title">현장상세관리</h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="field-wrap">
			<p class="tit v3"><?php echo clean_xss_tags($_GET['site_name'])?></p>
			<dl class="field-code mt4">
				<dt>현장코드</dt>
				<dd><?php echo clean_xss_tags($_GET['key'])?></dd>
			</dl>
			<div class="tbl-wrap v1 mt15">
				<table>
					<colgroup>
						<col style="width: 76px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<tr>
							<th>발주처</th>
							<td><?php echo clean_xss_tags($_GET['owner'])?></td>
						</tr>
						<tr>
							<th>시공사</th>
							<td><?php echo clean_xss_tags($_GET['contractor'])?></td>
						</tr>
						<tr>
							<th>소속업체</th>
							<td><?php echo clean_xss_tags($_GET['myCompany'])?></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<a href="new_edu.php?key=<?php echo clean_xss_tags($_GET['key'])?>&site_name=<?php echo clean_xss_tags($_GET['site_name'])?>&owner=<?php echo clean_xss_tags($_GET['owner'])?>&contractor=<?php echo clean_xss_tags($_GET['contractor'])?>&myCompany=<?php echo clean_xss_tags($_GET['myCompany'])?>" class="bx-link mt35">
				<i class="ic-edu"></i>
				<p>신규교육진행</p>
            </a>

			<a href="edu_management.php?key=<?php echo clean_xss_tags($_GET['key'])?>&site_name=<?php echo clean_xss_tags($_GET['site_name'])?>&owner=<?php echo clean_xss_tags($_GET['owner'])?>&contractor=<?php echo clean_xss_tags($_GET['contractor'])?>&myCompany=<?php echo clean_xss_tags($_GET['myCompany'])?>" class="bx-link mt10">
				<i class="ic-list"></i>
				<p>교육내역관리</p>
            </a>

			<a href="worker_edu.php?key=<?php echo clean_xss_tags($_GET['key'])?>&site_name=<?php echo clean_xss_tags($_GET['site_name'])?>&owner=<?php echo clean_xss_tags($_GET['owner'])?>&contractor=<?php echo clean_xss_tags($_GET['contractor'])?>&myCompany=<?php echo clean_xss_tags($_GET['myCompany'])?>" class="bx-link mt10"" class="bx-link mt10">
				<i class="ic-worker"></i>
				<p>근로자 교육이력</p>
			</a>

		</div>
	</div>
</div>
<!-- // content -->
<div id="fixed">
    <div class="inner">
        <div class="btn-wrap">
            <button id="qr_btn" class="btn lg has-ic bg-navy"><i class="ic-qr"></i><?php echo $_lc['BTN']['QR인증관리감독']?></button>
        </div>
    </div>
</div>
<?php include_once('_tail.php'); ?>