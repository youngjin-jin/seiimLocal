<?php
include_once('config/config.php');

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => API_URL.'/logout',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 5,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSLVERSION => 4,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_COOKIEJAR => COOKIE_FILE,
	CURLOPT_COOKIEFILE => COOKIE_FILE,
	CURLOPT_HTTPHEADER => array('Content-Type: application/json')
));

$curl_response = curl_exec($curl);
$err = curl_error($curl);    
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

/*echo "http_code = $http_code<br/>";
echo print_r($curl_response);exit;*/
//{"status":0,"msg":"성공"}

setcookie('token', '', time()+863000, '/');

session_destroy();
session_start();
@unlink(COOKIE_FILE);

if (strpos(DOMAIN, 'localhost')) {
	if ($_COOKIE['member_type'] == 'admin') $url = '/admin'; else $url = '/';
} else {
	$url = DOMAIN;
}
	
goto_url($url);	
?>