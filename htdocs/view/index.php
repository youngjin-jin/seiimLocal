<?php 
include_once('inc/config.php');
include_once('inc/template_start.php');
include_once('inc/page_head.php');
?>

<div class="fullBody">
	<!-- TOP Header -->
    <?php include_once('inc/page_top.php'); ?>
    <!-- TOP Header -->

    <div id="page-content" style="padding:0px 0px 0px; margin-top:51px; background-color:#fff;">
		<div class="page-content-box">
			<div class="col-xs-12">
				<div class="form-group">
					<textarea class="form-control" style="min-height:200px;"><?php print_r($_SESSION);?><?php print_r($_COOKIE);?></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php
include_once('inc/page_footer.php');
include_once('inc/template_scripts.php');
include_once('inc/template_end.php');
?>