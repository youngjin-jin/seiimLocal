<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'add_img') {
	$eduId		 = clean_xss_tags($_POST['eduId']);
	$count		 = (int)clean_xss_tags($_POST['count']);
	$img		 = array();
	$temp_dir	 = $_SERVER['DOCUMENT_ROOT'].'/temp/';

	if ($count) {
		for ($i=0; $i<$count; $i++) {
			$tmp_file  = $_FILES['upload_file_'.$i]['tmp_name'];
			$filename  = $_FILES['upload_file_'.$i]['name'];
			$extension = ext($filename);
			$filesize = filesize($tmp_file);
			
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

			$tmp_filetype	 = mime_content_type($temp_dir.$imsi_file_name);
			$cfile			 = new CURLFile(realpath($temp_dir.$imsi_file_name), $tmp_filetype, $imsi_file_name);
			$file			 = array('eduId'=>$eduId, 'image'=>$cfile);

			//echo print_r($file);exit;

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => API_URL.'/app/regEduAttach',
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
			
			@unlink($temp_dir.$imsi_file_name);
		}
	}
	
	$response = array('result'=>true);
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'delete_img') {
	$eduId		 = (int)clean_xss_tags($_POST['eduId']);
	$attachId	 = (int)clean_xss_tags($_POST['attachId']);

	$curl_data = array('eduId'=>$eduId, 'attachId'=>$attachId);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/delEduAttach',
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
		else $response = array('result'=>false, 'msg'=>'삭제에 실패하였습니다.');
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".'삭제에 실패하였습니다.');
	}
	
	echo json_encode($response);
}

if ($_POST['module'] == 'edu_detail') {
	$eduDocId = clean_xss_tags($_POST['eduDocId']);

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/myEduDetail?eduDocId='.$eduDocId,
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
	//{"status":0,"msg":"성공","info":{"id":2,"adminId":2,"workerId":[34,35,36],"siteId":1212055764,"startTime":"15:38:20","endTime":"15:38:26","eduDate":"2021-10-01T01:34:52.000Z","templateId":1,"attach":[{"id":1,"path":"https://dev-storage.saiifedu.com/images.jpeg","createdAt":"2021-10-27T14:57:34.000Z","updatedAt":"2021-10-27T14:57:33.000Z"},{"id":2,"path":"https://dev-storage.saiifedu.com/images (1).jpeg","createdAt":"2021-10-27T14:57:34.000Z","updatedAt":"2021-10-27T14:57:33.000Z"},{"id":3,"path":"https://dev-storage.saiifedu.com/images (2).jpeg","createdAt":"2021-10-27T14:57:34.000Z","updatedAt":"2021-10-27T14:57:33.000Z"}],"doc":null,"constructType":"공종이다현1","instructor":"성주필","eduPlace":"교육장","eduName":"테스트 교육","cat1":1,"cat2":3,"sv":3,"memo":null,"createdAt":"2021-10-09T01:34:28.000Z","updatedAt":"2021-10-01T01:34:30.000Z"}}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'info'=>$curl_response['info']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>