<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_list') {
	$accId			 = clean_xss_tags($_POST['accId']);
	$safetyDocId	 = clean_xss_tags($_POST['safetyDocId']);
	
	$curl_url = API_URL.'/ba/getUserDoc?accId='.$accId.'&safetyDocId='.$safetyDocId;
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
	//{"status":0,"msg":"성공","info":{"content":{"signature":"https://dev-storage.saiifedu.com/8333838288709794.jpg"},"sign":"https://dev-storage.saiifedu.com/9492879584642899.jpg","createdAt":"2021-10-27T01:23:35.000Z","docType":0,"templateType":null,"docName":"안전수칙준수 서약서","siteName":"공덕역B공구","userName":"아무개","svName":"수자원공사"}}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'info'=>$curl_response['info'], 'status'=>$curl_response['status']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>