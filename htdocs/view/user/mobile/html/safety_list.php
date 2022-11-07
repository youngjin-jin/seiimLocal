<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<input type="hidden" id="readFlag" value="<?php echo clean_xss_tags($_GET['readFlag'])?>" />
<input type="hidden" id="myCompanyId" value="<?php echo clean_xss_tags($_GET['myCompanyId'])?>" />

<input type="hidden" id="readFlag" value="<?php echo clean_xss_tags($_GET['readFlag'])?>" />


<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
			<h1 class="title"><?php echo $_lc['TXT']['안전문서']?></h1>
			<button class="btn-ic ic-menu"><?php echo $_lc['BTN']['메뉴']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<?php include_once('_menu.php'); ?>

<!-- content -->
<div id="content">
	<div class="container">
		<div class="safety-wrap">
			<div class="list-wrap v5">
				<ul id="ul_list">
					<!--li>
						<div class="list-head bg-grapefruit">
							<p class="tit">안전수칙준수 서약서</p>
						</div>
						<div class="list-body">
							<div class="tbl-wrap v1">
								<table>
									<colgroup>
										<col style="width: 76px;">
										<col style="width: auto;">
									</colgroup>
									<tbody>
										<tr>
											<th>유형</th>
											<td>동의서</td>
										</tr>
										<tr>
											<th>작성현황</th>
											<td>미작성</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li>
					<li>
						<div class="list-head bg-grapefruit">
							<p class="tit">면접 및 면담 진행 현황</p>
						</div>
						<div class="list-body">
							<div class="tbl-wrap v1">
								<table>
									<colgroup>
										<col style="width: 76px;">
										<col style="width: auto;">
									</colgroup>
									<tbody>
										<tr>
											<th>유형</th>
											<td>질의응답(20문항)</td>
										</tr>
										<tr>
											<th>작성현황</th>
											<td>미작성</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li>
					<li>
						<div class="list-head">
							<p class="tit">보호구 지급</p>
						</div>
						<div class="list-body">
							<div class="tbl-wrap v1">
								<table>
									<colgroup>
										<col style="width: 76px;">
										<col style="width: auto;">
									</colgroup>
									<tbody>
										<tr>
											<th>유형</th>
											<td>질의응답(20문항)</td>
										</tr>
										<tr>
											<th>작성현황</th>
											<td>작성완료(2021.03.31)</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li>
					<li>
						<div class="list-head">
							<p class="tit">근로자 2진 아웃제</p>
						</div>
						<div class="list-body">
							<div class="tbl-wrap v1">
								<table>
									<colgroup>
										<col style="width: 76px;">
										<col style="width: auto;">
									</colgroup>
									<tbody>
										<tr>
											<th>유형</th>
											<td>동의서</td>
										</tr>
										<tr>
											<th>작성현황</th>
											<td>작성완료(2021.03.31)</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li>
					<li>
						<div class="list-head">
							<p class="tit">자율안전 서약서(신규 근로자)</p>
						</div>
						<div class="list-body">
							<div class="tbl-wrap v1">
								<table>
									<colgroup>
										<col style="width: 76px;">
										<col style="width: auto;">
									</colgroup>
									<tbody>
										<tr>
											<th>유형</th>
											<td>동의서</td>
										</tr>
										<tr>
											<th>작성현황</th>
											<td>작성완료(2021.03.31)</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li-->
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- // content -->

<?php include_once('_tail.php'); ?>