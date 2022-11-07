<!-- header -->
<div id="header">
	<div class="inner">
		<h1 class="logo" style="cursor:pointer;"><?php echo TITLE?></h1>
		<div class="util">
			<div class="user">
				<div class="profile">
					<i class="ic-user"></i>
					<p><?php echo $_SESSION['name']?>님</p>
				</div>
				<button id="log_out_btn" class="btn has-ic sm txt-white"><i class="ic-logout"></i><?php echo $_lc['BTN']['로그아웃']?></button>
			</div>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="lnb-wrap">
			<?php include_once('_left.php'); ?>
		</div>
		<div class="page-content">