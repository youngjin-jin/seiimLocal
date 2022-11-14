<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_cat1') {
	$siteId = clean_xss_tags($_POST['siteId']);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/eduCategory?siteId='.$siteId,
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
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_cat2') {
	$cat1 = clean_xss_tags($_POST['cat1']);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/cat2List?cat1='.$cat1,
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
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'add_form') {
	$siteId			 = clean_xss_tags($_POST['siteId']);
	$cat1			 = clean_xss_tags($_POST['cat1']);
	$cat2			 = clean_xss_tags($_POST['cat2']);
	$eduName		 = clean_xss_tags($_POST['eduName']);
	$eduDate		 = clean_xss_tags($_POST['eduDate']);
	$startTime		 = clean_xss_tags($_POST['startTime']);
	$endTime		 = clean_xss_tags($_POST['endTime']);
	$constructType	 = clean_xss_tags($_POST['constructType']);
	$eduPlace		 = clean_xss_tags($_POST['eduPlace']);
	$instructor		 = clean_xss_tags($_POST['instructor']);
	$doc			 = clean_xss_tags($_POST['doc']);
	$foredu			 = clean_xss_tags($_POST['foredu']);
	$eduType 		 = json_encode(clean_xss_tags($_POST['eduType']));
	$curl_data = array(
		'siteId'=>$siteId,
		'cat1'=>$cat1,
		'cat2'=>$cat2,
		'eduName'=>$eduName,
		'eduDate'=>$eduDate,
		'startTime'=>$startTime,
		'endTime'=>$endTime,
		'constructType'=>$constructType,
		'eduPlace'=>$eduPlace,
		'instructor'=>$instructor,
		'doc'=>$doc,
		'foredu' => $foredu,
		'eduType' => $eduType
	);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/doEdu',
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
		if ($curl_response['status'] == 0) $response = array('result'=>true); 
		else if ($curl_response['msg']) $response = array('result'=>false, 'msg'=>$curl_response['msg']);
		else $response = array('result'=>false, 'msg'=>'데이터 저장에 실패하였습니다.');
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".'데이터 저장에 실패하였습니다.');
	}
	
	echo json_encode($response);
	exit;
}
?>