<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_query_site') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/siteList',
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
	//{"status":0,"msg":"성공","list":[{"id":1212055764,"name":"공덕역B공구","owner":4,"contractor":6,"joinCompany":[{"memo":"","comId":"1"},{"memo":"","comId":"2"},{"memo":"","comId":"3"}],"status":1,"closeDate":"2021-10-13T18:10:57.000Z","startDate":"2021-07-29T00:00:00.000Z","endDate":"2021-09-24T00:00:00.000Z","addr":"공덕역 1번길","createdAt":"2021-09-16T15:13:53.000Z","updatedAt":"2021-10-13T18:11:04.000Z","deletedAt":null},{"id":3510096238,"name":"공덕역A공구","owner":1,"contractor":5,"joinCompany":[{"memo":"","comId":"5"},{"memo":"","comId":"8"},{"memo":"","comId":"18"}],"status":0,"closeDate":null,"startDate":"2020-03-04T00:00:00.000Z","endDate":"2021-12-29T00:00:00.000Z","addr":"공덕역 2번길","createdAt":"2021-09-16T15:13:20.000Z","updatedAt":"2021-10-29T23:34:47.000Z","deletedAt":null},{"id":3539032470,"name":"향동 7구역","owner":4,"contractor":8,"joinCompany":[{"memo":"BBBBBBBBBBB","comId":18}],"status":0,"closeDate":null,"startDate":"2020-01-01T00:00:00.000Z","endDate":"2021-12-29T13:22:11.000Z","addr":"향동302길","createdAt":"2021-09-16T15:14:53.000Z","updatedAt":"2021-10-06T18:03:28.000Z","deletedAt":null}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_equipment') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/equipList',
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
	//{"status":0,"msg":"성공","list":[{"id":1,"name":"불도저","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":2,"name":"굴착기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":3,"name":"로더","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":4,"name":"지게차","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":5,"name":"스크레이퍼","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":6,"name":"덤프트럭","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":7,"name":"기중기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":8,"name":"모터그레이더","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":9,"name":"롤러","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":11,"name":"콘크리트뱃칭플랜트","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":12,"name":"콘크리트피니셔","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":16,"name":"아스팔트믹싱플랜트","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":17,"name":"아스팔트피니셔","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":18,"name":"아스팔트살포기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":19,"name":"골재살포기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":20,"name":"쇄석기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":21,"name":"공기압축기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":22,"name":"천공기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":23,"name":"항타 및 항발기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":24,"name":"자갈채취기","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":25,"name":"준설선","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":26,"name":"특수건설기계","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":27,"name":"타워크레인","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":28,"name":"기타","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_national') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/nationalList',
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
	//{"status":0,"msg":"성공","list":[{"id":1,"name":"대한민국(Republic of Korea)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":2,"name":"중국(China)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":3,"name":"베트남(Vietnam)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":4,"name":"태국(Thailand)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":5,"name":"캄보디아(Cambodia)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":6,"name":"미얀마(Myanmar)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null},{"id":7,"name":"기타(English)","isActive":true,"createdAt":"2021-09-13T17:44:37.000Z","updatedAt":null}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_list') {
	//data: { 'module' : 'get_list', 'page' : page, 'start_date' : start_date, 'end_date' : end_date, 'name' : name, 'national' : national, 'site' : site, 'equipment' : equipment },
	$page			 = clean_xss_tags($_POST['page']);
	$start_date		 = clean_xss_tags($_POST['start_date']);
	$end_date		 = clean_xss_tags($_POST['end_date']);
	$birth			 = clean_xss_tags($_POST['birth']);
	$name			 = clean_xss_tags($_POST['name']);
	$national		 = clean_xss_tags($_POST['national']);
	$site			 = clean_xss_tags($_POST['site']);
	$equipment		 = clean_xss_tags($_POST['equipment']);
	
	$curl_url = API_URL.'/ba/findWorker?page='.$page;
	
	if ($name) $curl_url .= '&name='.urlencode($name);
	if ($birth) $curl_url .= '&birth='.urlencode($birth);
	if ($national) $curl_url .= '&national='.$national;
	if ($equipment) $curl_url .= '&equipId='.$equipment;
	if ($site != '') $curl_url .= '&siteId='.$site;
	if ($start_date) $curl_url .= '&startTime='.$start_date;
	if ($end_date) $curl_url .= '&endTime='.$end_date;
	
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


if ($_POST['module'] == 'get_company') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/companyList',
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
	//{"status":0,"msg":"성공","list":[{"id":1212055764,"name":"공덕역B공구","owner":4,"contractor":6,"joinCompany":[{"memo":"","comId":"1"},{"memo":"","comId":"2"},{"memo":"","comId":"3"}],"status":1,"closeDate":"2021-10-13T18:10:57.000Z","startDate":"2021-07-29T00:00:00.000Z","endDate":"2021-09-24T00:00:00.000Z","addr":"공덕역 1번길","createdAt":"2021-09-16T15:13:53.000Z","updatedAt":"2021-10-13T18:11:04.000Z","deletedAt":null},{"id":3510096238,"name":"공덕역A공구","owner":1,"contractor":5,"joinCompany":[{"memo":"","comId":"5"},{"memo":"","comId":"8"},{"memo":"","comId":"18"}],"status":0,"closeDate":null,"startDate":"2020-03-04T00:00:00.000Z","endDate":"2021-12-29T00:00:00.000Z","addr":"공덕역 2번길","createdAt":"2021-09-16T15:13:20.000Z","updatedAt":"2021-10-29T23:34:47.000Z","deletedAt":null},{"id":3539032470,"name":"향동 7구역","owner":4,"contractor":8,"joinCompany":[{"memo":"BBBBBBBBBBB","comId":18}],"status":0,"closeDate":null,"startDate":"2020-01-01T00:00:00.000Z","endDate":"2021-12-29T13:22:11.000Z","addr":"향동302길","createdAt":"2021-09-16T15:14:53.000Z","updatedAt":"2021-10-06T18:03:28.000Z","deletedAt":null}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>