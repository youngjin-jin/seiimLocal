<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'add_detail') {
	$update_id		 = clean_xss_tags($_POST['update_id']);
	$site			 = clean_xss_tags($_POST['site']);
	$cate			 = clean_xss_tags($_POST['cate']);
	$name			 = clean_xss_tags($_POST['name']);
	$memo			 = clean_xss_tags($_POST['memo']);
	$activation		 = clean_xss_tags($_POST['activation']);
	
	if ($_FILES['upload_file']['tmp_name']) {
		$tmp_file  = $_FILES['upload_file']['tmp_name'];
		$filename  = $_FILES['upload_file']['name'];
		$extension = ext($filename);
		$filesize = filesize($tmp_file);
		
		$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
		
		$imsi_file_name = rand_str().'.'.$extension;
		move_uploaded_file($tmp_file, $temp_dir.$imsi_file_name);
		
		$tmp_filetype	 = mime_content_type($temp_dir.$imsi_file_name);
		$cfile			 = new CURLFile(realpath($temp_dir.$imsi_file_name), $tmp_filetype, $imsi_file_name);
	}

	if ($update_id) {
		$curl_url = API_URL.'/ba/editCat';
		
		$curl_data = array(
			'doc' =>$cfile,
			'catId'=>$update_id,
			'catType'=>1,
			'name'=>$name,
			'memo'=>$memo,
			'categoryId'=>$cate,
			'active'=>$activation
		);
	} else {
		$curl_url = API_URL.'/ba/regCat';
		
		$curl_data = array(
			'doc' =>$cfile,
			'siteId'=>$site,
			'catType'=>1,
			'name'=>$name,
			'memo'=>$memo,
			'categoryId'=>$cate,
			'active'=>$activation
		);
	}
	
	//echo print_r($curl_data);exit;
	
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
	//{"status":0,"msg":"성공","token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjMwOTEwOTU3fQ.ckVMIA8F5YlDvaipGI2E4y2DZqpA0QxVGd6_tIJdud0","level":0}
	
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

if ($_POST['module'] == 'get_query_site_cate') {
	$site = clean_xss_tags($_POST['site']);
	
	$curl_url = API_URL.'/ba/cat1List?siteId='.$site;
	
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
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'select_delete') {
	$catType		 = clean_xss_tags($_POST['catType']);
	$select_list_str = clean_xss_tags($_POST['select_list_str']);
	
	$curl_data = array(
		'catId'=>$select_list_str,
		'catType'=>$catType
	);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/delCat',
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

if ($_POST['module'] == 'add_cate') {
	$update_id		 = clean_xss_tags($_POST['update_id']);
	$site			 = clean_xss_tags($_POST['site']);
	$name			 = clean_xss_tags($_POST['name']);
	$cert_img	 = basename(clean_xss_tags($_POST['cert_img']));
	
	if ($_FILES['upload_file']['tmp_name']) {
		$tmp_file  = $_FILES['upload_file']['tmp_name'];
		$filename  = $_FILES['upload_file']['name'];
		$extension = ext($filename);
		$filesize = filesize($tmp_file);
		
		$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
		
		$imsi_file_name = rand_str().'.'.$extension;
		move_uploaded_file($tmp_file, $temp_dir.$imsi_file_name);
		
		$tmp_filetype	 = mime_content_type($temp_dir.$imsi_file_name);
		$cfile			 = new CURLFile(realpath($temp_dir.$imsi_file_name), $tmp_filetype, $imsi_file_name);
	}

	if ($update_id) {
		$curl_url = API_URL.'/ba/editCat';
		
		$curl_data = array(
			'doc' =>$cfile,
			'catId'=>$update_id,
			'catType'=>0,
			'name'=>$name
		);
	} else {
		$curl_url = API_URL.'/ba/regCat';
		
		$curl_data = array(
			'doc' =>$cfile,
			'siteId'=>$site,
			'catType'=>0,
			'name'=>$name
		);
	}
	
	//echo print_r($curl_data);exit;
	
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
	//{"status":0,"msg":"성공","token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjMwOTEwOTU3fQ.ckVMIA8F5YlDvaipGI2E4y2DZqpA0QxVGd6_tIJdud0","level":0}
	
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

if ($_POST['module'] == 'get_list') {
	$page	 = clean_xss_tags($_POST['page']);
	$site	 = clean_xss_tags($_POST['site']);
	$catType = clean_xss_tags($_POST['catType']);
	
	$curl_url = API_URL.'/ba/eduCategory?page='.$page.'&siteId='.$site.'&catType='.$catType;
	
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