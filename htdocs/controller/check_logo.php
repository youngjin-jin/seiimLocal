<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');
$accId = clean_xss_tags($_POST['accId']);
$curl_url = API_URL.'/ba/getLogo?accId='.$accId;
//echo $curl_url;exit;
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => $curl_url,
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
//{"status":0,"msg":"성공","list":[{"id":1,"name":"정기안전보건교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-10-04T08:46:44.000Z"},{"id":2,"name":"신규채용자교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":3,"name":"작업 변경 시 교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":4,"name":"특별안전보건교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":5,"name":"특수형태근로종사자 교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":6,"name":"물질안전보건(MSDS)교육\r\n","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":12,"name":"정기안전보건교육1","siteId":null,"isActive":true,"createdAt":"2021-10-04T07:20:41.000Z","updatedAt":"2021-10-04T07:20:41.000Z"},{"id":13,"name":"BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB1111111111","siteId":null,"isActive":true,"createdAt":"2021-10-04T08:00:58.000Z","updatedAt":"2021-10-04T08:00:58.000Z"},{"id":14,"name":"BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB1111","siteId":null,"isActive":true,"createdAt":"2021-10-04T08:05:11.000Z","updatedAt":"2021-10-04T08:05:11.000Z"},{"id":31,"name":"dgddffg","siteId":3510096238,"isActive":true,"createdAt":"2021-10-08T22:03:32.000Z","updatedAt":"2021-10-08T22:03:32.000Z"}]}

$curl_response = json_decode($curl_response, true);

if ($http_code == 200) {
	$response = array('result'=>true, 'bannerImg'=>$curl_response);
} else {
	$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
}

echo json_encode($response);
exit;
?>


