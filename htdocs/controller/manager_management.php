<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'select_delete') {
	$select_list_str = clean_xss_tags($_POST['select_list_str']);
	
	$curl_data = array('accId'=>$select_list_str);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ha/delSu',
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
	//{"status":0,"msg":"성공","token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjMwOTEwOTU3fQ.ckVMIA8F5YlDvaipGI2E4y2DZqpA0QxVGd6_tIJdud0","level":0}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		if ($curl_response['status'] == 0) $response = array('result'=>true); 
		else if ($curl_response['msg']) $response = array('result'=>false, 'msg'=>$curl_response['msg']);
		else $response = array('result'=>false, 'msg'=>'삭제에 실패하였습니다.');
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".'삭제에 실패하였습니다.');
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_list') {
	$page			 = clean_xss_tags($_POST['page']);
	$site_name		 = clean_xss_tags($_POST['site_name']);
	$owner			 = clean_xss_tags($_POST['owner']);
	$contractor		 = clean_xss_tags($_POST['contractor']);
	$company_name	 = clean_xss_tags($_POST['company_name']);
	$name			 = clean_xss_tags($_POST['name']);
	$phone			 = clean_xss_tags($_POST['phone']);
	$level			 = clean_xss_tags($_POST['level']);
	
	$curl_url = API_URL.'/ha/searchAdmin?page='.$page;
	
	if ($site_name) $curl_url .= '&siteName='.urlencode($site_name);
	if ($owner) $curl_url .= '&ownerName='.urlencode($owner);
	if ($contractor) $curl_url .= '&contractorName='.urlencode($contractor);
	if ($company_name) $curl_url .= '&myCompName='.urlencode($company_name);
	if ($name) $curl_url .= '&name='.urlencode($name);
	if ($phone) $curl_url .= '&phone1='.$phone;
	$curl_url .= '&level='.$level;
	
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
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list'], 'rowCnt'=>$curl_response['rowCnt'], 'totCnt'=>$curl_response['totCnt']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>