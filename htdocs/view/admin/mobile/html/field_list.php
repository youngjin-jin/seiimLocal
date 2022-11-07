<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<h1 class="title">현장목록</h1>
			<button class="btn-ic ic-menu"><?php echo $_lc['BTN']['메뉴']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<?php include_once('_menu.php'); ?>

<!-- content -->
<div id="content">
	<div class="container">
		<div class="field-wrap">
			<div class="list-wrap v1">
				<ul id="ul_list">
					<!--li>
						<div class="list-head">
							<p class="tit">현장명현장명현장명현장명현장명</p>
							<div class="list-db">
								<dl class="field-code">
									<dt class="txt-lightgray">현장코드</dt>
									<dd class="txt-white">ABCD1234</dd>
								</dl>
								<p class="status">진행중</p>
							</div>
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
											<th>발주처</th>
											<td>한국도로교통공사</td>
										</tr>
										<tr>
											<th>시공사</th>
											<td>대림산업</td>
										</tr>
										<tr>
											<th>소속업체</th>
											<td>대림산업</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li>
					<li>
						<div class="list-head">
							<p class="tit">현장명현장명현장명현장명현장명</p>
							<div class="list-db">
								<dl class="field-code">
									<dt class="txt-lightgray">현장코드</dt>
									<dd class="txt-white">ABCD1234</dd>
								</dl>
								<p class="status complete">완료</p>
							</div>
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
											<th>발주처</th>
											<td>한국도로교통공사</td>
										</tr>
										<tr>
											<th>시공사</th>
											<td>대림산업</td>
										</tr>
										<tr>
											<th>소속업체</th>
											<td>대림산업</td>
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