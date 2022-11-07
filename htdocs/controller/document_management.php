<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_template') {
	$siteId = clean_xss_tags($_POST['siteId']);

	if ($siteId == '0') $siteId = '-1';
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/getDocTemplateList?siteId='.$siteId.'&docDiv=-1',
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
	//{"status":0,"msg":"성공","list":[{"id":1,"name":"한국도로공사"},{"id":4,"name":"서울시"},{"id":5,"name":"대림산업"},{"id":6,"name":"삼성물산"},{"id":8,"name":"포스코건설"},{"id":18,"name":"현대엔지니어링"}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'select_delete') {
	$select_list_str = clean_xss_tags($_POST['select_list_str']);
	
	$curl_data = array('historyIds'=>$select_list_str);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/delDocHistory',
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
	$siteId			 = clean_xss_tags($_POST['siteId']);
	$templateId		 = clean_xss_tags($_POST['templateId']);
	$startDate		 = clean_xss_tags($_POST['startDate']);
	$endDate		 = clean_xss_tags($_POST['endDate']);
	$adminName		 = clean_xss_tags($_POST['adminName']);
	$docName		 = clean_xss_tags($_POST['docName']);
	
	$curl_url = API_URL.'/ba/searchDocHistory?page='.$page;
	
	if ($siteId != '') $curl_url .= '&siteId='.$siteId;
	if ($templateId != '') $curl_url .= '&templateId='.$templateId;
	if ($startDate) $curl_url .= '&startDate='.urlencode($startDate);
	if ($endDate) $curl_url .= '&endDate='.urlencode($endDate);
	if ($adminName) $curl_url .= '&adminName='.urlencode($adminName);
	if ($docName) $curl_url .= '&docName='.urlencode($docName);
	
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
	//{"status":0,"msg":"성공","list":[{"id":1,"eduName":"테스트 교육","eduDate":"2021-10-01T01:34:52.000Z","startTime":"00:00:00","instructor":"성주필","name":"정기안전보건교육"},{"id":2,"eduName":"테스트 교육","eduDate":"2021-10-01T01:34:52.000Z","startTime":"15:38:20","instructor":"성주필","name":"정기안전보건교육"},{"id":3,"eduName":"신규채용 교육","eduDate":"2021-10-27T15:45:38.000Z","startTime":"12:12:32","instructor":"노두현","name":"신규채용자교육"}],"rowCnt":3,"totCnt":3}
	
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