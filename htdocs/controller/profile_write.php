<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'delete_profile_img') {
	$upload_mode = clean_xss_tags($_POST['upload_mode']);
    $id			 = clean_xss_tags($_POST['id']);
	
	if ($upload_mode == 'profile_img') $curl_url = API_URL.'/app/delPfImg';
	else if ($upload_mode == 'id_card') $curl_url = API_URL.'/app/delMyId';
	else if ($upload_mode == 'safe_certi') $curl_url = API_URL.'/app/delOSH';
	else $curl_url = API_URL.'/app/delEtcCert';
	
	$curl = curl_init();
	
	if ($upload_mode == 'add_upload') {
		$curl_data = array('id'=>$id);
		
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
	} else {
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
			CURLOPT_COOKIEJAR => COOKIE_FILE,
			CURLOPT_COOKIEFILE => COOKIE_FILE,
			CURLOPT_HTTPHEADER => array('Content-Type: application/json')
		));
	}
	
	$curl_response = curl_exec($curl);
	$err = curl_error($curl);    
	$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	
	/*echo "http_code = $http_code<br/>";
	echo print_r($curl_response);exit;*/
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		if ($upload_mode == 'profile_img') $_SESSION['profile']	= '';

		$Response = array('result'=>true);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['삭제실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'user_profile_write') {
    $name = clean_xss_tags($_POST['name']);
	$sex = clean_xss_tags($_POST['sex']);
	$birth = clean_xss_tags($_POST['birth']);
	$adress1 = clean_xss_tags($_POST['adress1']);
	$adress2 = clean_xss_tags($_POST['adress2']);
	$married = clean_xss_tags($_POST['married']);
	$nationality = clean_xss_tags($_POST['nationality']);
	$phone2 = clean_xss_tags($_POST['phone2']);
	
	$curl_data = array(
		'name'=>$name,
		'birth'=>$birth,
		'addr1'=>$adress1,
		'addr2'=>$adress2,
		'married'=>$married,
		'national'=>$nationality,
		'isMale'=>$sex,
		'phone2'=>$phone2
	);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/updateProfile',
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
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$_SESSION['name']		 = $name;
		$_SESSION['phone2']		 = $phone2;
		$_SESSION['birth']		 = $birth;
		$_SESSION['addr1']		 = $adress1;
		$_SESSION['addr2']		 = $adress2;
		$_SESSION['national']	 = $nationality;
		$_SESSION['married']	 = $married;
		$_SESSION['isMale']		 = $sex;
		
		$Response = array('result'=>true, 'info'=>$curl_response['info']);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['프로필정보저장실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'get_profile_img') {
    $upload_mode = clean_xss_tags($_POST['upload_mode']);
	
	if ($upload_mode == 'id_card') $curl_url = API_URL.'/app/myId';
	else if ($upload_mode == 'safe_certi') $curl_url = API_URL.'/app/myOSH';
	else $curl_url = API_URL.'/app/myEtcCert';
	
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
		if ($upload_mode == 'add_upload') $Response = array('result'=>true, 'list'=>$curl_response['list']);
		else $Response = array('result'=>true, 'info'=>$curl_response['info']);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['프로필정보로드실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'get_profile_info') {    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/profile',
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
		if ($curl_response['info']['profile']) $_SESSION['profile'] = $curl_response['info']['profile']; else $_SESSION['profile'] = '../img/no_image_150_150.jpg';
		$_SESSION['name'] = $curl_response['info']['name'];
		
		$Response = array('result'=>true, 'info'=>$curl_response['info']);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['프로필정보로드실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'get_nationality') {    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/nationalList',
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
		$Response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['국적로드실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'upload_file') {
    $upload_mode	 = clean_xss_tags($_POST['upload_mode']);
	$safe_date		 = clean_xss_tags($_POST['safe_date']);
	$safe_certi_mode = clean_xss_tags($_POST['safe_certi_mode']);
	
	if ($upload_mode == 'profile_img') $curl_url = API_URL.'/app/updatePfImg';
	else if ($upload_mode == 'id_card') $curl_url = API_URL.'/app/regId';
	else if ($upload_mode == 'safe_certi') $curl_url = API_URL.'/app/regOSH';
	else $curl_url = API_URL.'/app/regEtcCert';
	
	//echo $curl_url;exit;
	
	$tmp_file  = $_FILES['upload_file']['tmp_name'];
	$filename  = $_FILES['upload_file']['name'];
	$extension = ext($filename);
	$filesize = filesize($tmp_file);
	
	$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
	
	$imsi_file_name = rand_str().'.'.$extension;
	move_uploaded_file($tmp_file, $temp_dir.$imsi_file_name);
	
	//thumbnail($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_crop=false, $crop_mode='center', $is_sharpen=false, $um_value='80/0.5/3')
	if ($upload_mode == 'profile_img') $imsi_file_name = thumbnail($imsi_file_name, $temp_dir, $temp_dir, 500, 500, true, 'center', true);
	else $imsi_file_name = thumbnail($imsi_file_name, $temp_dir, $temp_dir, 720, 480, true, 'center', true);
	
	$tmp_filetype	 = mime_content_type($temp_dir.$imsi_file_name);
	$cfile			 = new CURLFile(realpath($temp_dir.$imsi_file_name), $tmp_filetype, $imsi_file_name);
	
	if ($upload_mode == 'safe_certi') {
		$curl_data = array(
			'image'=>$cfile,
			'certDate'=>$safe_date
		);
		
		//echo $curl_data;exit;
	} else {
		$curl_data = array('image'=>$cfile);
	}
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $curl_url,
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
	
	$curl_response = json_decode($curl_response, true);
	@unlink($temp_dir.$imsi_file_name);
	
	if ($http_code == 200) {
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['업로드실패']);
	}
	
	echo json_encode($response);
	exit;
}
?>