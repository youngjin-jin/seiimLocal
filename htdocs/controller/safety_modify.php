<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'add_form') {
	$siteId			 = clean_xss_tags($_POST['key']);
	$docId			 = clean_xss_tags($_POST['docId']);
	$templateType	 = clean_xss_tags($_POST['templateType']);
	$accId	 = clean_xss_tags($_POST['accId']);
	$myCompanyId	 = clean_xss_tags($_POST['myCompanyId']);
	
	if ($templateType == '0') $curl_url = API_URL.'/app/submitEditEquip';

	else if ($templateType == '1') $curl_url = API_URL.'/app/submitEditSafe2';
	else if ($templateType == '5') $curl_url = API_URL.'/app/submitEditSafe2';
	else if ($templateType == '9') $curl_url = API_URL.'/app/submitEditSafe2';
	else if ($templateType == '2') $curl_url = API_URL.'/app/submitBasicEditTest';
	else $curl_url = API_URL.'/app/submitEditInterview2';

	$curl_data = array(
		'safetyDocId'=>$docId,
		'siteId'=>$siteId,
		'content'=>$_POST['content'],
		'accId'=>$_POST['accId'],
		'myCompanyId' => $myCompanyId
	);
	
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
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => json_encode($curl_data),
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
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_data') {
	$siteId			 = clean_xss_tags($_POST['key']);
	$docId			 = clean_xss_tags($_POST['docId']);
	$templateType	 = clean_xss_tags($_POST['templateType']);
	$myCompanyId	 = clean_xss_tags($_POST['myCompanyId']);


	if ($templateType == '1') $curl_url = API_URL.'/app/mySign';
	else if($templateType == '5') $curl_url = API_URL.'/app/mySign';
	else if($templateType == '9') $curl_url = API_URL.'/app/mySign';

	else $curl_url = API_URL.'/app/userSafetyDoc?siteId='.$siteId.'&safetyDocId='.$docId.'&myCompanyId='.$myCompanyId;

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
	//{"status":0,"msg":"성공","info":{"id":5,"accId":34,"path":"https://dev-storage.saiifedu.com/8333838288709794.jpg","createdAt":"2021-10-19T10:39:17.000Z"}}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'status'=>$curl_response['status'], 'info'=>$curl_response['info']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>