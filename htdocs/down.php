<?php
ini_set('max_execution_time', 0);

include_once('config/common_var.php');
include_once('config/common_lib.php');

$mode		 = clean_xss_tags($_GET['mode']);
$temp_dir	 = $_SERVER['DOCUMENT_ROOT'].'/temp/';
$key		 = clean_xss_tags($_GET['key']);
$file_name	 = basename($key);

if (!$mode) {
	copy($key, $temp_dir.$file_name);
}

if (file_exists($temp_dir.$file_name)) {
	if (preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
		header("content-type: doesn/matter");
		header("content-length: ".filesize($temp_dir.$file_name));
		header("content-disposition: attachment; filename=\"$file_name\"");
		header("content-transfer-encoding: binary");
	} else if (preg_match("/Firefox/i", $_SERVER['HTTP_USER_AGENT'])){
		header("content-type: file/unknown");
		header("content-length: ".filesize($temp_dir.$file_name));
		header("content-disposition: attachment; filename=\"$file_name\"");
		header("content-description: php generated data");
	} else {
		header("content-type: file/unknown");
		header("content-length: ".filesize($temp_dir.$file_name));
		header("content-disposition: attachment; filename=\"$file_name\"");
		header("content-description: php generated data");
	}

	header("pragma: no-cache");
	header("expires: 0");

	$fp = fopen($temp_dir.$file_name, 'rb');
	fpassthru($fp);
	fclose($fp);
	
	@unlink($temp_dir.$file_name);
}
?>