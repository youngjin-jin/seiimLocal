<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<input type="hidden" id="myCompanyId" value="<?php echo clean_xss_tags($_GET['myCompanyId'])?>" />



<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<h1 class="title"><?php echo $_lc['TXT']['안전문서작성요청']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="safety-wrap">
			<div class="field-bx">
				<p id="site_name"><?php echo clean_xss_tags($_GET['site_name'])?></p>
			</div>
			<p class="tit v4 mt20" style="white-space:normal;"><?php echo $_lc['TXT']['위현장에대한님이작성해야할문서가남아있습니다']?></p>
			<p class="txt-accent mt20"><?php echo $_lc['TXT']['미작성문서']?> : <span id="count_span" style="color:#FF6200;font-size:16px;"></span> <?php echo $_lc['TXT']['개']?></p>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="write_btn" class="btn lg has-ic bg-navy"><i class="ic-document"></i><?php echo $_lc['TXT']['안전문서작성']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<?php include_once('_tail.php'); ?>