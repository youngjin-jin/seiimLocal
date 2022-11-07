<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>

<style>
#tbody_list tr:hover { background-color : #fff; }
</style>

<h3 class="tit v1">업체 상세</h3>
<div class="tit-wrap v1">
	<p class="tit v2">기본 정보</p>
</div>
<div class="db-wrap v1">
	<div class="row">
		<div class="col half">
			<p class="tit v3 mb4">업체명</p>
			<div class="txt">
				<p id="company_name"><?php echo clean_xss_tags($_GET['name'])?></p>
			</div>
		</div>
		<div class="col half">
			<p class="tit v3 mb4">사업자등록번호</p>
			<div class="txt">
				<p id="company_number"><?php echo clean_xss_tags($_GET['businessId'])?></p>
			</div>
		</div>
	</div>
</div>

<div class="tit-wrap v1">
	<p class="tit v2">현장</p>
</div>
<div class="tbl-wrap v1">
	<table>
		<colgroup>
			<col style="width: 70px">
			<col style="width: 70px">
			<col style="width: 70px">
			<col>
			<col style="width: 150px">
			<col style="width: 100px">
		</colgroup>
		<thead>
			<tr>
				<th>No.</th>
				<th>현장코드</th>
				<th>현장상태</th>
				<th>현장명</th>
				<th>발주처</th>
				<th>시공사</th>
			</tr>
		</thead>
		<tbody id="tbody_list"></tbody>
	</table>
</div>

<div class="btn-wrap mt80 pb40">
	<button id="back_btn" class="btn md middle line-gray has-ic"><i class="ic-back"></i>이전으로</button>
</div>

<script>
var key = '<?php echo clean_xss_tags($_GET['key'])?>';
</script>

<?php
include_once('_page_bottom.php');
include_once('_tail.php');
?>