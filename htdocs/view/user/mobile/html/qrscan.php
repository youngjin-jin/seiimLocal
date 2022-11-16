<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
			<h1 class="title"><?php echo $_lc['BTN']['QR인증']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="qrscan-wrap">
			<p class="txt">
				<?php echo $_lc['TXT']['개인인증을위한QR입니다']?><br><br>
				<?php echo $_lc['TXT']['교육담당자에게해당화면을보여주세요']?>
			</p>
			<div class="qr mt40" style="background-color:#fff;">
				<div class="txt" style="padding:20px 0px;"><i class="fa fa-clock" style="font-size:18px;"></i> <?php echo $_lc['TXT']['남은시간']?> <span id="count_span" style="font-size:18px;color:#FF6200;"></span><?php echo $_lc['TXT']['초']?></div>
				<div style="padding-bottom:30px;margin:0 auto;text-align:center;">
					<div id="qr_code"></div>
				</div>
				<!--img id="qr_img" src="../img/@temp_qr_checkin.png" /-->
			</div>
		</div>
	</div>
</div>
<!-- // content -->

<script src="/view/js/qrcode.js"></script>

<?php include_once('_tail.php'); ?>