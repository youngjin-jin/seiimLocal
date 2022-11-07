<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'cert_select_delete') {
	$certId = clean_xss_tags($_POST['certId']);
	
	$curl_data = array('certId'=>$certId);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/delWorkerCert',
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
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, 삭제에 실패하였습니다.");
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'cert_add_form') {
	$update_id	 = clean_xss_tags($_POST['update_id']);
	$cert_type	 = clean_xss_tags($_POST['cert_type']);
	$cert_name	 = clean_xss_tags($_POST['cert_name']);
	$year		 = clean_xss_tags($_POST['year']);
	$month		 = clean_xss_tags($_POST['month']);
	$day		 = clean_xss_tags($_POST['day']);
	$cert_img	 = basename(clean_xss_tags($_POST['cert_img']));
	$temp_dir	 = $_SERVER['DOCUMENT_ROOT'].'/temp/';
	
	$tmp_filetype	 = mime_content_type($temp_dir.$cert_img);
	$cfile			 = new CURLFile(realpath($temp_dir.$cert_img), $tmp_filetype, $cert_img);
	
	$curl_data = array(
		'image'=>$cfile,
		'accId'=>$update_id,
		'certType'=>$cert_type,
		'certName'=>$cert_name,
		'certDate'=>"$year-$month-$day"
	);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/regWorkerCert',
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
	
	/*echo "http_code = $http_code<br/>";
	echo print_r($curl_response);exit;*/
	//{"status":0,"msg":"성공"}
	
	$curl_response = json_decode($curl_response, true);
	@unlink($temp_dir.$cert_img);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'status'=>$curl_response['status'], 'msg'=>$curl_response['msg']); 
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".'데이터 저장에 실패하였습니다.');
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'upload_file') {
    $upload_mode	 = clean_xss_tags($_POST['upload_mode']);
	$update_id		 = clean_xss_tags($_POST['update_id']);
	
	$tmp_file  = $_FILES['upload_file']['tmp_name'];
	$filename  = $_FILES['upload_file']['name'];
	$extension = ext($filename);
	$filesize = filesize($tmp_file);
	
	$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
	
	$imsi_file_name = rand_str().'.'.$extension;
	move_uploaded_file($tmp_file, $temp_dir.$imsi_file_name);
	
	//thumbnail($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_crop=false, $crop_mode='center', $is_sharpen=false, $um_value='80/0.5/3')
	$imsi_file_name	= thumbnail($imsi_file_name, $temp_dir, $temp_dir, 720, 480, true, 'center', true);

	$response = array('result'=>true, 'url'=>'/temp/'.$imsi_file_name);
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'select_delete') {
	$accId = clean_xss_tags($_POST['update_id']);
	$siteId = clean_xss_tags($_POST['siteId']);
	$myCompany = clean_xss_tags($_POST['myCompany']);
	
	$curl_data = array('accId'=>$accId, 'siteId'=>$siteId, 'myCompany'=>$myCompany);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/siteEnd',
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
		else $response = array('result'=>false, 'msg'=>'현장 이탈에 실패하였습니다.');
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, 현장 이탈에 실패하였습니다.");
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'add_site') {
	$accId		 = clean_xss_tags($_POST['accId']);
	$siteId		 = clean_xss_tags($_POST['siteId']);
	$myCompany	 = clean_xss_tags($_POST['myCompany']);

	$curl_data = array(
		'accId'=>$accId,
		'siteId'=>$siteId,
		'myCompany'=>$myCompany
	);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/regWorkerSite',
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

if ($_POST['module'] == 'search_site') {
	$site_name = clean_xss_tags($_POST['site_name']);
	
	$curl_url = API_URL.'/ba/searchMySite';
	
	if ($site_name) $curl_url .= '?name='.urlencode($site_name);
	
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

if ($_POST['module'] == 'add_form') {
	$update_id	 = clean_xss_tags($_POST['update_id']);
	$name		 = clean_xss_tags($_POST['name']);
	$birth		 = clean_xss_tags($_POST['birth']);
	$userId		 = clean_xss_tags($_POST['userId']);
	$sex		 = clean_xss_tags($_POST['sex']);
	$married	 = clean_xss_tags($_POST['married']);
	$occupation	 = clean_xss_tags($_POST['occupation']);
	$nationality = clean_xss_tags($_POST['nationality']);
	$phone1		 = clean_xss_tags($_POST['phone1']);
	$phone2		 = clean_xss_tags($_POST['phone2']);
	$addr1		 = clean_xss_tags($_POST['addr1']);
	$addr2		 = clean_xss_tags($_POST['addr2']);
	
	$curl_data = array(
		'accId'=>$update_id,
		'birth'=>$birth,
		'phone1'=>$phone1,
		'phone2'=>$phone2,
		'addr1'=>$addr1,
		'addr2'=>$addr2,
		'national'=>$nationality,
		'married'=>$married,
		'isMale'=>$sex,
		'occupation'=>$occupation
	);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/setWorkerInfo',
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
		$response = array('result'=>true, 'status'=>$curl_response['status'], 'msg'=>$curl_response['msg']); 
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".'데이터 저장에 실패하였습니다.');
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_list') {
	$update_id = clean_xss_tags($_POST['update_id']);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/getWorkerInfo?accId='.$update_id,
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
		$response = array('result'=>true, 'status'=>$curl_response['status'], 'info'=>$curl_response['info']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>