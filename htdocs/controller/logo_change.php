<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');


$accId		 = clean_xss_tags($_POST['accId']);
$curl_url = API_URL.'/app/logoImg';
$tmp_file  = $_FILES['upload_file']['tmp_name'];
$filename  = $_FILES['upload_file']['name'];
$extension = ext($filename);
$filesize = filesize($tmp_file);
$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
$imsi_file_name = rand_str().'.'.$extension;
move_uploaded_file($tmp_file, $temp_dir.$imsi_file_name);
imageAlphaBlending($temp_dir.$imsi_file_name, false);
imageSaveAlpha($temp_dir.$imsi_file_name,true);
ImageColorAllocate($temp_dir.$imsi_file_name , 255, 255, 255);
$tmp_filetype	 = mime_content_type($temp_dir.$imsi_file_name);
$cfile			 = new CURLFile(realpath($temp_dir.$imsi_file_name), $tmp_filetype, $imsi_file_name);
$curl_data = array(
	'image'=>$cfile,
	'accId'=>$accId
);
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => $curl_url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 300,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSLVERSION => 4,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_SAFE_UPLOAD => true,
	CURLOPT_POSTFIELDS => $curl_data,
	CURLOPT_COOKIEJAR => COOKIE_FILE,
	CURLOPT_COOKIEFILE => COOKIE_FILE,
	CURLOPT_SAFE_UPLOAD => true,
	CURLOPT_HTTPHEADER => array('Content-Type: multipart/form-data')
));

$curl_response = curl_exec($curl);
$err = curl_error($curl);    
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$curl_response = json_decode($curl_response, true);
@unlink($temp_dir.$imsi_file_name);
if ($http_code == 200) {
	$response = array('result'=>true, 'data' => $curl_response);
} else {
	$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['업로드실패']);
}

echo json_encode($response);
exit;

?>