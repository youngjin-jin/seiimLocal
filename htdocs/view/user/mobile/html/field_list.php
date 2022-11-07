<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="add_btn" class="btn-ic ic-add"><?php echo $_lc['BTN']['추가']?></button>
			<h1 class="title"><?php echo $_lc['TXT']['현장목록']?></h1>
			<button class="btn-ic ic-menu"><?php echo $_lc['BTN']['메뉴']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<?php include_once('_menu.php'); ?>

<!-- content -->
<div id="content">
	<div class="container" style="padding-bottom:100px;">
		<div class="field-wrap">
			<!-- case1: 현장 목록 없음 -->
			<div class="field-add">
				<p class="txt1"><?php echo $_lc['TXT']['등록된시공현장이없습니다']?></p>
				<p class="txt2"><?php echo $_lc['TXT']['좌측상단버튼을눌러현장을추가해주세요']?></p>
			</div>
			<!-- case2: 현장 목록 있음 -->
			<div class="list-wrap v1 list_block" style="display:none;">
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
			<!-- 20210914 수정 -->
			<!-- case3: 소속업체가 달라졌을 경우 -->
			<p class="txt-guide mt40 list_block" style="display:none;"><?php echo $_lc['TXT']['소속업체가달라졌을경우현장을새롭게등록해야합니다']?></p>
			<!-- // 20210914 수정 -->
		</div>
	</div>
</div>
<!-- // content -->

<!-- 현장 목록이 있는 경우 -->
<!-- fixed -->


<div id="fixedbbb" class="list_block22" style="display:none;">
	<div class="inner">
		<div class="btn-wrap">
			<button id="qr_btn" class="btn lg has-ic bg-navy"><i class="ic-qr"></i><?php echo $_lc['BTN']['QR인증']?></button>
		</div>
	</div>
</div>


<div id="fixedaaa" class="list_block22" style="display:none;width:100%;">
	<div class="inner">
		<div class="btn-wrap">
			<a href='edu_status.php' style="width:100%;">
			<button id="" class="btn lg has-ic bg-navy"><i class="ic-qr"></i>교육이수 현장 확인</button>
			</a>
		</div>
	</div>
</div>
<!-- // header -->

<?php include_once('_tail.php'); ?>