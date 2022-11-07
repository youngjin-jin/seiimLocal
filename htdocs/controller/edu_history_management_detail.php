<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'search_worker') {
	$siteId	 = clean_xss_tags($_POST['siteId']);
	$name	 = clean_xss_tags($_POST['name']);
	$svName	 = clean_xss_tags($_POST['svName']);

	$curl_url = API_URL.'/ba/searchWorker?siteId='.$siteId;

	if ($name) $curl_url .= '&name='.urlencode($name);
	else if ($svName) $curl_url .= '&svName='.urlencode($svName);
	
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
	//{"status":0,"msg":"성공","list":[{"accId":1,"name":"test","birth":null,"myCompnay":"수자원공사"},{"accId":1,"name":"test","birth":null,"myCompnay":"수자원공사"},{"accId":1,"name":"test","birth":null,"myCompnay":"수자원공사"},{"accId":4,"name":"temppw","birth":"1980-05-05T00:00:00.000Z","myCompnay":"철도시설공단"},{"accId":4,"name":"temppw","birth":"1980-05-05T00:00:00.000Z","myCompnay":"주식회사 새임"},{"accId":4,"name":"temppw","birth":"1980-05-05T00:00:00.000Z","myCompnay":"수자원공사"},{"accId":4,"name":"temppw","birth":"1980-05-05T00:00:00.000Z","myCompnay":"수자원공사"},{"accId":5,"name":"당당3333","birth":null,"myCompnay":null},{"accId":6,"name":"test1","birth":null,"myCompnay":null},{"accId":7,"name":"test2","birth":null,"myCompnay":null},{"accId":8,"name":"ww","birth":null,"myCompnay":null},{"accId":9,"name":"test3","birth":null,"myCompnay":"수자원공사"},{"accId":10,"name":"test4","birth":null,"myCompnay":"수자원공사"},{"accId":10,"name":"test4","birth":null,"myCompnay":"수자원공사"},{"accId":10,"name":"test4","birth":null,"myCompnay":"수자원공사"},{"accId":11,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":12,"name":"test2","birth":null,"myCompnay":"수자원공사"},{"accId":12,"name":"test2","birth":null,"myCompnay":"수자원공사"},{"accId":13,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":13,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":13,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":14,"name":"test1","birth":null,"myCompnay":"철도시설공단"},{"accId":14,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":14,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":15,"name":"성주필","birth":null,"myCompnay":"수자원공사"},{"accId":15,"name":"성주필","birth":null,"myCompnay":null},{"accId":15,"name":"성주필","birth":null,"myCompnay":"수자원공사"},{"accId":16,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":16,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":16,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":17,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":17,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":17,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":23,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":23,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":23,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":24,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":24,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":24,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":27,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":27,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":27,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":28,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":28,"name":"test1","birth":null,"myCompnay":"수자원공사"},{"accId":34,"name":"아무개","birth":"1988-03-02T00:00:00.000Z","myCompnay":"수자원공사"},{"accId":34,"name":"아무개","birth":"1988-03-02T00:00:00.000Z","myCompnay":"한국도로공사"},{"accId":34,"name":"아무개","birth":"1988-03-02T00:00:00.000Z","myCompnay":"포스코건설"},{"accId":34,"name":"아무개","birth":"1988-03-02T00:00:00.000Z","myCompnay":"수자원공사"},{"accId":35,"name":"최수종","birth":"1970-07-04T00:00:00.000Z","myCompnay":"한국도로공사"},{"accId":35,"name":"최수종","birth":"1970-07-04T00:00:00.000Z","myCompnay":"포스코건설"},{"accId":35,"name":"최수종","birth":"1970-07-04T00:00:00.000Z","myCompnay":"수자원공사"},{"accId":36,"name":"강산애","birth":"1983-12-15T00:00:00.000Z","myCompnay":"한국도로공사"},{"accId":38,"name":"rdh","birth":"1998-03-04T00:00:00.000Z","myCompnay":"주식회사 새임"},{"accId":41,"name":"성주필_근로자","birth":"1987-05-20T00:00:00.000Z","myCompnay":"한국도로공사"},{"accId":41,"name":"성주필_근로자","birth":"1987-05-20T00:00:00.000Z","myCompnay":"주식회사 새임"}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'img_list_delete') {
	$del_file = explode(',', clean_xss_tags($_POST['del_file']));

	$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';

	for ($i=0; $i<count($del_file); $i++) {
		if (file_exists($temp_dir.$del_file[$i])) @unlink($temp_dir.$del_file[$i]);
	}
	
	$response = array('result'=>true);
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'add_img') {
	$count = (int)clean_xss_tags($_POST['count']);
	$img = array();

	if ($count) {
		for ($i=0; $i<$count; $i++) {
			$tmp_file  = $_FILES['upload_file_'.$i]['tmp_name'];
			$filename  = $_FILES['upload_file_'.$i]['name'];
			$extension = ext($filename);
			$filesize = filesize($tmp_file);
			
			$temp_dir = $_SERVER['DOCUMENT_ROOT'].'/temp/';
			
			$imsi_file_name = rand_str().'.'.$extension;
			move_uploaded_file($tmp_file, $temp_dir.$imsi_file_name);

			// 이미지나 플래시 파일에 악성코드를 심어 업로드 하는 경우를 방지
			$timg = @getimagesize($temp_dir.$imsi_file_name);
			
			if (preg_match("/\.(gif|jpg|jpeg|png)$/i", $filename)) {
				if ($timg[2] < 1 || $timg[2] > 3) {
					@unlink($temp_dir.$imsi_file_name);
					$file_upload_msg = '"'.$filename.'" 파일은 이미지 파일이 아닙니다.';
					$json_data = array('result'=>false, 'msg'=>$file_upload_msg);
					echo json_encode($json_data);
					exit;
				} 
			} else {
				@unlink($temp_dir.$imsi_file_name);
				$file_upload_msg = '"'.$filename.'" 파일은 이미지 파일이 아닙니다.';
				$json_data = array('result'=>false, 'msg'=>$file_upload_msg);
				echo json_encode($json_data);
				exit;
			}
			
			//thumbnail($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_crop=false, $crop_mode='center', $is_sharpen=false, $um_value='80/0.5/3')
			$imsi_file_name	= thumbnail($imsi_file_name, $temp_dir, $temp_dir, 720, 480, true, 'center', true);

			array_push($img, '/temp/'.$imsi_file_name);
		}
	}
	
	$response = array('result'=>true, 'img'=>$img);
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'add_form') {
	$key			 = clean_xss_tags($_POST['key']);
	$siteId			 = clean_xss_tags($_POST['siteId']);
	$eduName		 = clean_xss_tags($_POST['eduName']);
	$cat1			 = clean_xss_tags($_POST['cat1']);
	$cat2			 = clean_xss_tags($_POST['cat2']);
	$eduDate		 = clean_xss_tags($_POST['eduDate']);
	$eduPlace		 = clean_xss_tags($_POST['eduPlace']);
	$startTime		 = clean_xss_tags($_POST['startTime']);
	$endTime		 = clean_xss_tags($_POST['endTime']);
	$constructType	 = clean_xss_tags($_POST['constructType']);
	$instructor		 = clean_xss_tags($_POST['instructor']);
	$doc			 = clean_xss_tags($_POST['doc']);
	$applyWorkers	 = clean_xss_tags($_POST['applyWorkers']);
	$images			 = clean_xss_tags($_POST['images']);
	$delPicList		 = clean_xss_tags($_POST['delPicList']);
	$attach			 = clean_xss_tags($_POST['attach']);
	$foredu			 = clean_xss_tags($_POST['foredu']);
	$eduType 		 = json_encode(clean_xss_tags($_POST['eduType']));
	
	$temp_dir		 = $_SERVER['DOCUMENT_ROOT'].'/temp/';

	if ($images) {
		$images_array = explode(',', $images);
		$img = array();

		for ($i=0; $i<count($images_array); $i++) {
			$tmp_filetype	 = mime_content_type($temp_dir.basename($images_array[$i]));
			$file			 = array('image'=>new CURLFile(realpath($temp_dir.basename($images_array[$i])), $tmp_filetype, basename($images_array[$i])));

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => API_URL.'/ba/regAttach',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 300,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSLVERSION => 4,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_SAFE_UPLOAD => true,
				CURLOPT_POSTFIELDS => $file,
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
			//{"status":0,"msg":"성공","info":{"attachId":12}}
			
			$curl_response = json_decode($curl_response, true);
			
			if ($http_code == 200) {
				@unlink($temp_dir.basename($images_array[$i]));

				if ($attach) $attach .= ',';
				$attach .= $curl_response['info']['attachId'];
			}
		}
	}

	$curl_data = array(
		'startTime'=>$startTime,
		'endTime'=>$endTime,
		'eduDate'=>$eduDate,
		'cat1'=>$cat1,
		'cat2'=>$cat2,
		'eduName'=>$eduName,
		'constructType'=>$constructType,
		'eduPlace'=>$eduPlace,
		'doc'=>$doc,
		'instructor'=>$instructor,
		'applyWorkers'=>$applyWorkers,
		'attach'=>$attach,
		'foredu' => $foredu,
		'eduType' => $eduType
	);

	if ($key) {
		$curl_url = API_URL.'/ba/editEdu';
		
		$curl_data['eduId'] = $key;

		if ($delPicList) $curl_data['delPicList'] = $delPicList;
	} else {
		$curl_url = API_URL.'/ba/doEdu';
		
		$curl_data['siteId'] = $siteId;
	}

	//echo print_r($curl_data);exit;
	
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
	//{"status":0,"msg":"성공"}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".'데이터 저장에 실패하였습니다.');
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_list') {
	$key = clean_xss_tags($_POST['key']);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/getEduDetail?eduDocId='.$key,
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
	//{"status":0,"msg":"성공","info":{"id":3,"adminId":3,"workerId":[34,35,36,37,38],"siteId":1212055764,"startTime":"12:12:32","endTime":"13:45:36","eduDate":"2021-10-27T15:45:38.000Z","templateId":2,"attach":[1,2,3],"doc":null,"constructType":"공종2","instructor":"노두현","eduPlace":"대강당","eduName":"신규채용 교육","cat1":2,"cat2":4,"sv":3,"memo":null,"createdAt":"2021-10-27T15:47:12.000Z","updatedAt":"2021-10-27T15:47:13.000Z"}}
	
	$curl_response = json_decode($curl_response, true);
	$curl_response['info']['eduType'] = json_decode($curl_response['info']['eduType']);
	if ($http_code == 200) {
		$response = array('result'=>true, 'info'=>$curl_response['info']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>