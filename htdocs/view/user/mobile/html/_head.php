<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo TITLE?></title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
	
	<!-- Favicon -->
    <link rel="icon" type="image/png" sizes="96x96" href="/view/images/favicon.png">

	<!-- reset css -->
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/fonts.css" rel="stylesheet" type="text/css">
	
	<!-- dist/css -->
    <link href="../dist/css/swiper-bundle.min.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css">

    <!-- custom css -->
    <link href="../css/common.css?ver=<?php echo time()?>" rel="stylesheet" type="text/css">
    <link href="../css/utility.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css?ver=<?php echo time()?>" rel="stylesheet" type="text/css">
	
	<link href="/view/css/chosen.css" rel="stylesheet" type="text/css">
	<link href="/view/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="/view/css/custom.css?ver=<?php echo time()?>" rel="stylesheet" type="text/css">

    <!-- jquery -->
    <!--script src="../js/jquery-3.5.1.min.js"></script-->
	<script src="/view/js/jquery-1.12.4.min.js"></script>
	
	<!-- dist/js -->
    <script src="../dist/js/swiper-bundle.min.js"></script>
    <script src="../dist/js/jquery-ui.js"></script>
	<script src="/view/js/jquery.oLoader.min.js"></script>
	<script src="/view/js/chosen.jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    
    <!-- custom js -->
	<script src="/view/js/pro.js?v=<?php echo JS_VERSION?>"></script>
    <script src="../js/script.js?v=<?php echo JS_VERSION?>"></script>
	
	<script>
		var API_URL = '<?php echo API_URL?>';
		var ACCEPTED_FILES = '<?php echo ACCEPTED_FILES?>';
		var IMAGES_EXTENSION_ARRAY = [<?php echo IMAGES_EXTENSION_ARRAY?>];
		var EXCEL_EXTENSION_ARRAY = [<?php echo EXCEL_EXTENSION_ARRAY?>];
		var WORD_EXTENSION_ARRAY = [<?php echo WORD_EXTENSION_ARRAY?>];
		var POWERPOINT_EXTENSION_ARRAY = [<?php echo POWERPOINT_EXTENSION_ARRAY?>];
		var PDF_EXTENSION_ARRAY = [<?php echo PDF_EXTENSION_ARRAY?>];
		var ARCHIVE_EXTENSION_ARRAY = [<?php echo ARCHIVE_EXTENSION_ARRAY?>];
		var member_type = '<?php echo $_COOKIE['member_type']?>';
		var locale = '<?php echo ($_COOKIE['locale'])?$_COOKIE['locale']:'kr'?>';
		var prop_file = '<?php echo $prop_file?>';
		var DEVICE = '<?php echo $device?>';
		var LEVEL = <?php echo ($_SESSION['userId'])?$_SESSION['level']:'100'?>;
	</script>
	
	<?php
	if ($_COOKIE['locale']) {
		if (file_exists($_SERVER['DOCUMENT_ROOT'].'/view/js/locale/lc_'.$_COOKIE['locale'].'.js')) echo '<script src="/view/js/locale/lc_'.$_COOKIE['locale'].'.js?v='.JS_VERSION.'"></script>';
		else echo '<script src="/view/js/locale/lc_kr.js?v='.JS_VERSION.'"></script>';
	} else echo '<script src="/view/js/locale/lc_kr.js?v='.JS_VERSION.'"></script>';
	?>
</head>
<body>