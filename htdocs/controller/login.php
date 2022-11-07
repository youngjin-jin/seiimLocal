<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'join_form') {
    $user_id		 = clean_xss_tags($_POST['user_id']);
	$user_password	 = clean_xss_tags($_POST['user_password']);
	$phone			 = clean_xss_tags($_POST['phone']);
	/*{
	  "userId": "회원아이디",
	  "userPw": "회원암호",
	  "name": "회원명",
	  "birth": "생년월일 YYYY-MM-DD",
	  "phone1": "기본 전화번호",
	  "phone2": "비상전화번호",
	  "addr1": "기본주소",
	  "addr2": "상세주소",
	  "national": "국가 ID(숫자)",
	  "married": "결혼여부 0:미혼 1: 기혼",
	  "isMale": "성별 0:여자 1:남자",
	  "revId": "약관id"
	}*/
	$curl_data = array(
		'userId'=>$user_id,
		'userPw'=>$user_password,
		'phone1'=>$phone,
		'name'=>'',
		'birth'=>'',
		'phone2'=>'',
		'addr1'=>'',
		'addr2'=>'',
		'national'=>'',
		'married'=>'',
		'isMale'=>'1',
		'revId'=>''
	);
	
	//echo print_r($curl_data);exit;
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/signup',
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
		if ($curl_response['status'] == 0) $Response = array('result'=>true, 'status'=>$curl_response['status']);
		else $Response = array('result'=>false, 'status'=>$curl_response['status'], 'msg'=>$curl_response['msg']);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['회원가입실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'id_check') {
    $user_id = clean_xss_tags($_POST['user_id']);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/chkDup?userId='.$user_id,
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
		if ($curl_response['status'] == 0) $Response = array('result'=>true, 'status'=>$curl_response['status']);
		else $Response = array('result'=>false, 'status'=>$curl_response['status'], 'msg'=>$curl_response['msg']);
	} else {
		$Response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['비밀번호변경실패']);
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['module'] == 'user_login') {
    $user_id		 = clean_xss_tags($_POST['user_id']);
	$user_password	 = clean_xss_tags($_POST['user_password']);
	
	$curl_data = array(
		'username'=>$user_id,
		'password'=>$user_password
	);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/login',
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
	/*{
	  "status": "int",
	  "token": "string",
	  "msg": "string",
	  "info": {
		"id": "integer",
		"level": {
		  "0": "SU_ADMIN",
		  "1": "HOST_ADMIN",
		  "2": "BASIC_ADMIN",
		  "100": "WORKER"
		},
		"name": "이름",
		"userId": "아이디",
		"phone1": "기본연락처",
		"phone2": "비상연락처",
		"profile": "프로필 사진경로",
		"isTemp": "임시비번 여부",
		"birth": "생년월일",
		"addr1": "기본주소",
		"addr2": "상세주소",
		"national": "국적",
		"married": "결혼여부",
		"isMale": "성별",
		"sign": "서명이미지 경로"
	  }
	}*/
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$_SESSION['id']			 = $curl_response['info']['id'];
		$_SESSION['userId']		 = $curl_response['info']['userId'];
		$_SESSION['name']		 = $curl_response['info']['name'];
		$_SESSION['level']		 = $curl_response['info']['level'];
		$_SESSION['phone1']		 = $curl_response['info']['phone1'];
		$_SESSION['phone2']		 = $curl_response['info']['phone2'];
		$_SESSION['profile']	 = $curl_response['info']['profile'];
		$_SESSION['birth']		 = $curl_response['info']['birth'];
		$_SESSION['addr1']		 = $curl_response['info']['addr1'];
		$_SESSION['addr2']		 = $curl_response['info']['addr2'];
		$_SESSION['national']	 = $curl_response['info']['national'];
		$_SESSION['married']	 = $curl_response['info']['married'];
		$_SESSION['isMale']		 = $curl_response['info']['isMale'];
		$_SESSION['sign']		 = $curl_response['info']['sign'];
		$_SESSION['token']		 = $curl_response['token'];
		setcookie('token', $_SESSION['token'], time()+863000, '/');
		
		$response = array('result'=>true, 'level'=>$_SESSION['level'], 'isTemp'=>$curl_response['info']['isTemp']);
	} else if ($curl_response['status'] == -2) {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['아이디없음']);
	} else if ($curl_response['status'] == -1) {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['비밀번호다름']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'logout') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/logout',
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
	//{"status":0,"msg":"성공"}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		setcookie('token', '', time()+863000, '/');
		
		session_destroy();
		session_start();
		@unlink(COOKIE_FILE);
		
		if (strpos(DOMAIN, 'localhost')) {
			if ($_COOKIE['member_type'] == 'admin') $url = '/admin'; else $url = '/';
		} else {
			$url = DOMAIN;
		}
		
		$response = array('result'=>true, 'url'=>$url);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['로그아웃실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'change_language') {
    $language = clean_xss_tags($_POST['language']);
	
	if (file_exists('../config/locale/lc_'.$language.'_d.php')) {
		setcookie('locale', $language, time()+863000, '/');
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>$_lc['ERR']['언어팩없음']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'change_password') {
    $newPassword		 = clean_xss_tags($_POST['new_password']);
	$confirmation		 = clean_xss_tags($_POST['new_password_repeat']);
	
	$curl_data = array('pw'=>$newPassword);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/resetPw',
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
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['비밀번호변경실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'agree_check') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/agree',
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
		$response = array('result'=>true, 'status'=>$curl_response['status']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['약관동의여부실패']);
	}
	
	echo json_encode($response);	
	exit;
}

if ($_POST['module'] == 'sign_check') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/qrySign',
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
		$response = array('result'=>true, 'status'=>$curl_response['status']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['서명여부실패']);
	}
	
	echo json_encode($response);	
	exit;
}

if ($_POST['module'] == 'agree_load') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/agreement',
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
	//{"status":0,"msg":"성공","list":{"id":1,"agreement":"약관내용","privacy":"개인정보정책","thirdparty":"제삼자 제공동의","marketing":"마케팅/이벤트동의내용\n","createdAt":"2021-09-11T18:12:57.000Z","updatedAt":"2021-09-11T18:13:02.000Z"}}1
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'status'=>$curl_response['status'], 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['약관로드실패']);
	}
	
	echo json_encode($response);	
	exit;
}

if ($_POST['module'] == 'agree_submit') {
    $revId			 = clean_xss_tags($_POST['revId']);
	$termsCheck01	 = (clean_xss_tags($_POST['termsCheck01']) == 'true')?1:0;
	$termsCheck02	 = (clean_xss_tags($_POST['termsCheck02']) == 'true')?1:0;
	$termsCheck03	 = (clean_xss_tags($_POST['termsCheck03']) == 'true')?1:0;
	$termsCheck04	 = (clean_xss_tags($_POST['termsCheck04']) == 'true')?1:0;
	
	$curl_data = array('revId'=>$revId, 'eventAgree'=>$termsCheck04);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/setAgree',
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
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['약관동의실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'signature_submit') {
    $img = clean_xss_tags($_POST['img']);
	
	$src = explode(',', $img);
	$img_result = base64_decode($src[1]);
	
	$imsi_file_name	 = rand_str().'.png';
	$temp_file		 = $_SERVER['DOCUMENT_ROOT'].'/temp/'.$imsi_file_name;
	
	file_put_contents($temp_file, $img_result);
	
	$tmp_filetype	 = mime_content_type($temp_file);
	$cfile			 = new CURLFile(realpath($temp_file), $tmp_filetype, $imsi_file_name);
	
	$curl_data = array('image'=>$cfile);
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/regSign',
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
	@unlink($temp_file);
	
	if ($http_code == 200) {
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['서명저장실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'request_code') {
    $phone = clean_xss_tags($_POST['phone']);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/authNum?phone='.$phone,
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
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['인증번호발송실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'check_code') {
    $phone	 = clean_xss_tags($_POST['phone']);
	$code	 = clean_xss_tags($_POST['code']);
	
	$curl_data = array('phone'=>$phone, 'authNum'=>$code);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/chkAuth',
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
		if ($curl_response['status'] == 0) $response = array('result'=>true); else $response = array('result'=>false, 'msg'=>$_lc['ERR']['인증번호다름']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['인증번호다름']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'find_id') {
    $phone = clean_xss_tags($_POST['phone']);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/myAcc?phone='.$phone,
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
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['ID찾기실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'temp_pass') {
    $user_id = clean_xss_tags($_POST['user_id']);
	
	$curl_data = array('userId'=>$user_id);
    
    $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/reqTmpPw',
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
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$_lc['ERR']['임시비번발급요청실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'user_info_update') {
    $firstName			 = clean_xss_tags($_POST['firstName']);
    $lastName			 = clean_xss_tags($_POST['lastName']);
	$mobileNumber		 = clean_xss_tags($_POST['mobileNumber']);
	$phoneNumber		 = clean_xss_tags($_POST['phoneNumber']);
	$position			 = clean_xss_tags($_POST['position']);
	$securityLevel		 = $_SESSION['securityLevel'];
	$email				 = clean_xss_tags($_POST['email']);
	$headquarters_code	 = get_headquarters_code();
    
    $sql = " select idx from system_user where company_code = '{$_SESSION['company_code']}' and id = '{$_SESSION['id']}' ";
	$sql_result = sql_fetch($sql);
	
	if (!$sql_result['idx']) {
		$Response = array('result'=>false, 'code'=>'loading', 'err'=>$_lc['systemUsers']['회원로딩실패']);
		echo json_encode($Response);
		exit;
	}
	
	$sql = " update system_user set 
				first_name 			= HEX(AES_ENCRYPT('$firstName', '".SECRET_KEY."')),
				last_name 			= HEX(AES_ENCRYPT('$lastName', '".SECRET_KEY."')), 
				position 			= '$position', 
				phone 				= HEX(AES_ENCRYPT('$phoneNumber', '".SECRET_KEY."')), 
				mobile 				= HEX(AES_ENCRYPT('$mobileNumber', '".SECRET_KEY."')), 
				email 				= HEX(AES_ENCRYPT('$email', '".SECRET_KEY."'))
			 where company_code = '{$_SESSION['company_code']}' and id = '{$_SESSION['id']}'; ";
	$sql_result = sql_query($sql);
	
	if ($_SESSION['first_name'] != $firstName || $_SESSION['last_name'] != $lastName) {
		if ($_SESSION['first_name'] != $firstName) {
			$_SESSION['first_name'] = $firstName;
		}
		
		if ($_SESSION['last_name'] != $lastName) {
			$_SESSION['last_name'] = $lastName;
		}
		
		$code = 'rename';
		
		if ($_SESSION['first_name'] && $_SESSION['last_name']) {
			if ($_COOKIE['locale'] == 'kr' && is_hangul($_SESSION['last_name'].$_SESSION['first_name'])) {
				$login_user_name = $_SESSION['last_name'].$_SESSION['first_name'];
			} else {
				$login_user_name = $_SESSION['first_name'].' '.$_SESSION['last_name'];
			}
		} else if ($_SESSION['first_name']) {
			$login_user_name = $_SESSION['first_name'];
		} else if ($_SESSION['last_name']) {
			$login_user_name = $_SESSION['last_name'];
		} else {
			$login_user_name = $_SESSION['id'];
		}
	}
	
	if ($sql_result) {
		$response = array('result'=>true, 'code'=>$code, 'login_user_name'=>$login_user_name);
	} else {
		$response = array('result'=>false, 'code'=>'', 'err'=>$_lc['common']['저장실패']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'login_user_file_delete') {
	$sql = " select idx, hash_name from files where code = '{$_SESSION['profileImageCode']}' and access_level = 'OTHER' and status = '1' ";
	$sql_result = sql_fetch($sql);
	
	if (!$sql_result['idx']) {
		$response = array('result'=>false, 'code'=>'', 'err'=>$_lc['ufiles']['로딩실패']);
		echo json_encode($response);
		exit;
	}
	
	$url = FILE_PATH.'/api/v1/common/file-management/truncating/hashed-filenames/'.$sql_result['hash_name'];
	
	$curl_data = json_encode($fields);
	$curl_result = send_curl('DELETE', true, $url, '');
	$jsonObj = json_decode($curl_result, true);
	
	/*echo $curl_result;
	exit;*/

	if (!$jsonObj['result']) {
		$code = $jsonObj['code'];
		
		if ($code == 400) {
			$Response = array('result'=>false, 'code'=>$code, 'err'=>'입력 파라미터가 잘못 되었거나 헤더를 찾을 수 없습니다. 관리자에게 문의 바랍니다.');
		} else if ($code == 401) {
			$Response = array('result'=>false, 'code'=>$code, 'err'=>'T-RISE-UP 개발 API KEY 또는 FILE PASSWORD 인증에 실패하였습니다. 재접속 후 시도해 주십시오.');
		} else if ($code == 404) {
			$Response = array('result'=>false, 'code'=>$code, 'err'=>'파일 시스템에서 파일 ID를 찾을 수 없습니다. 관리자에게 문의 바랍니다.');
		} else if ($code == 500) {
			$Response = array('result'=>false, 'code'=>$code, 'err'=>'서버에서 장애가 발생 하였습니다. 관리자에게 문의 바랍니다.');
		} else {
			$Response = array('result'=>false, 'code'=>$code, 'err'=>$jsonObj['err']);
		}
	} else {		
		if ($jsonObj['res']['deleted'] == true) {
			$sql = " delete from files where code = '{$_SESSION['profileImageCode']}'; ";
			sql_query($sql);
			
			$sql = " update system_user set profile_file_code = null where unique_id = '{$_SESSION['unique_id']}'; ";
			sql_query($sql);
			
			delete_file($_SESSION['profileImageCode']);
			
			$_SESSION['profileImageCode'] = '';
			$_SESSION['profileImageUrl'] = '';
			$_SESSION['profileImageFilename'] = '';
			$_SESSION['profileImageDirectory'] = '';
			
			$Response = array('result'=>true);
		} 
	}
	
	echo json_encode($Response);
	exit;
}

if ($_POST['action_mode'] == 'login_user_file_upload') {
	if (is_uploaded_file($_FILES['file']['tmp_name'])) {
		$tmp_file  = $_FILES['file']['tmp_name'];
		$filename  = $_FILES['file']['name'];
		$extension = ext($filename);
		$size = filesize($tmp_file);
		
		// 업로드
		$cfile = new CURLFile(realpath($tmp_file));
		
		$url = FILE_PATH.'/api/v1/common/file-management/upload/permissions/OTHER/filenames/'.urlencode($filename);
		$curl_result = file_send_curl('POST', false, $url, array('file'=>$cfile));
		$jsonObj = json_decode($curl_result, true);
		
		/*echo $curl_result;
		exit;*/
		
		if (!$jsonObj['result']) {
			$code = $jsonObj['code'];
			
			if ($code == 400) {
				$Response = array('result'=>false, 'code'=>$code, 'err'=>'입력 파라미터가 잘못 되었거나 헤더를 찾을 수 없습니다. 관리자에게 문의 바랍니다.');
			} else if ($code == 401) {
				$Response = array('result'=>false, 'code'=>$code, 'err'=>'유효한 API KEY(T-RISE-UP 개발자 API KEY)가 아닙니다. 재접속 후 시도해 주십시오.');
			} else if ($code == 500) {
				$Response = array('result'=>false, 'code'=>$code, 'err'=>'서버에서 장애가 발생 하였습니다. 관리자에게 문의 바랍니다.');
			} else {
				$Response = array('result'=>false, 'code'=>$code, 'err'=>$jsonObj['err']);
			}
		} else {
			$hashName = $jsonObj['res']['hashName'];
			$password = ($jsonObj['res']['password'])?" , access_key='{$jsonObj['res']['password']}' ":'';
			$downloadPath = $jsonObj['res']['downloadPath'];
			$streamingPath = ($jsonObj['res']['streamingPath'])?"'{$jsonObj['res']['streamingPath']}'":'null';
			$code = get_code('files');
			
			$sql = " insert into files set
						code 					= '$code', 
						directory_code			= '{$_SESSION['profileImageDirectory']}', 
						company_code 			= '{$_SESSION['company_code']}', 
						category	 			= 'OPS_USER_PROFILE_IMAGE', 
						access_level	 		= 'OTHER',
						hash_name	 			= '$hashName', 
						name		 			= '$filename', 
						extension	 			= '$extension', 
						size	 				= '$size', 
						download_path			= '$downloadPath', 
						streaming_path			= $streamingPath, 
						reg_date 				= '".TIME_YMDHIS."', 
						reg_unique_id 			= '{$_SESSION['unique_id']}'
						$password; ";
			sql_query($sql);
			
			$sql = " update system_user set profile_file_code = '$code' where unique_id = '{$_SESSION['unique_id']}'; ";
			sql_query($sql);
			
			$_SESSION['profileImageCode'] = $code;
			$_SESSION['profileImageUrl'] = get_profile_image($code);
			$_SESSION['profileImageFilename'] = $filename;
		
			$Response = array('result'=>true, 'profileImageUrl'=>$_SESSION['profileImageUrl']);
		}
	}
	
	echo json_encode($Response);
	exit;
}
?>