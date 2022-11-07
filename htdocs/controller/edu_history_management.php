<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_sv_list') {
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/svList',
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

if ($_POST['module'] == 'get_cat2') {
	$cat1 = clean_xss_tags($_POST['cat1']);

	$curl_url = API_URL.'/ba/cat2List?cat1='.$cat1;
	
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
	//{"status":0,"msg":"성공","list":[{"id":1,"categoryId":1,"name":"근로자","memo":"","isActive":true,"createdAt":"2021-09-28T16:51:02.000Z","updatedAt":"2021-11-05T16:40:23.000Z"},{"id":2,"categoryId":1,"name":"관리감독자","memo":null,"isActive":true,"createdAt":"2021-09-28T16:51:02.000Z","updatedAt":"2021-09-28T16:51:03.000Z"},{"id":3,"categoryId":1,"name":"TBM","memo":"TBM / TBM / TBM","isActive":true,"createdAt":"2021-09-28T16:51:02.000Z","updatedAt":"2021-11-05T16:35:25.000Z"}]}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}

if ($_POST['module'] == 'get_cat1') {
	$siteId = clean_xss_tags($_POST['siteId']);

	$curl_url = API_URL.'/ba/cat1List?siteId='.$siteId;
	
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
	//{"status":0,"msg":"성공","list":[{"id":1,"name":"정기안전보건교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-10-04T08:46:44.000Z"},{"id":2,"name":"신규채용자교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":3,"name":"작업 변경 시 교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":4,"name":"특별안전보건교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":5,"name":"특수형태근로종사자 교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":6,"name":"물질안전보건(MSDS)교육\r\n","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":12,"name":"정기안전보건교육1","siteId":null,"isActive":true,"createdAt":"2021-10-04T07:20:41.000Z","updatedAt":"2021-10-04T07:20:41.000Z"},{"id":13,"name":"BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB1111111111","siteId":null,"isActive":true,"createdAt":"2021-10-04T08:00:58.000Z","updatedAt":"2021-10-04T08:00:58.000Z"},{"id":14,"name":"BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB1111","siteId":null,"isActive":true,"createdAt":"2021-10-04T08:05:11.000Z","updatedAt":"2021-10-04T08:05:11.000Z"},{"id":31,"name":"dgddffg","siteId":3510096238,"isActive":true,"createdAt":"2021-10-08T22:03:32.000Z","updatedAt":"2021-10-08T22:03:32.000Z"}]}
	
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
	
	$curl_data = array('delEduIds'=>$select_list_str);
	
	//echo print_r($curl_data);exit;
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/ba/delEdu',
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
	$startDate		 = clean_xss_tags($_POST['startDate']);
	$endDate		 = clean_xss_tags($_POST['endDate']);
	$eduName		 = clean_xss_tags($_POST['eduName']);
	$cat1			 = clean_xss_tags($_POST['cat1']);
	$cat2			 = clean_xss_tags($_POST['cat2']);
	$constructType	 = clean_xss_tags($_POST['constructType']);
	$instructor		 = clean_xss_tags($_POST['instructor']);
	
	$curl_url = API_URL.'/ba/searchEduHistory?page='.$page;
	
	if ($siteId != '') $curl_url .= '&siteId='.$siteId;
	if ($startDate) $curl_url .= '&startDate='.urlencode($startDate);
	if ($endDate) $curl_url .= '&endDate='.urlencode($endDate);
	if ($eduName) $curl_url .= '&eduName='.urlencode($eduName);
	if ($cat1) $curl_url .= '&cat1='.$cat1;
	if ($cat2) $curl_url .= '&cat2='.$cat2;
	if ($constructType) $curl_url .= '&constructType='.urlencode($constructType);
	if ($instructor) $curl_url .= '&instructor='.urlencode($instructor);
	
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


if ($_POST['module'] == 'get_construct_type') {
	
	$curl_url = API_URL.'/ba/consType';
	
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
	//{"status":0,"msg":"성공","info":{"eduCatCnt":[{"id":1,"name":"정기안전보건교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-10-04T08:46:44.000Z"},{"id":2,"name":"신규채용자교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":3,"name":"작업 변경 시 교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":4,"name":"특별안전보건교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":5,"name":"특수형태근로종사자 교육","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":6,"name":"물질안전보건(MSDS)교육\r\n","siteId":1212055764,"isActive":true,"createdAt":"2021-09-28T16:50:38.000Z","updatedAt":"2021-09-28T16:50:38.000Z"},{"id":12,"name":"정기안전보건교육1","siteId":null,"isActive":true,"createdAt":"2021-10-04T07:20:41.000Z","updatedAt":"2021-10-04T07:20:41.000Z"},{"id":13,"name":"BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB1111111111","siteId":null,"isActive":true,"createdAt":"2021-10-04T08:00:58.000Z","updatedAt":"2021-10-04T08:00:58.000Z"},{"id":14,"name":"BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB1111","siteId":null,"isActive":true,"createdAt":"2021-10-04T08:05:11.000Z","updatedAt":"2021-10-04T08:05:11.000Z"},{"id":31,"name":"dgddffg","siteId":3510096238,"isActive":true,"createdAt":"2021-10-08T22:03:32.000Z","updatedAt":"2021-10-08T22:03:32.000Z"}],"workerCnt":[{"id":34,"level":100,"name":"아무개","userId":"worker1","userPw":"$2b$04$Hf9.Nix83g8OYCJzZJdZ5ukcwKGadGmmC8erelH.K/UCR8qdF7cEa","phone1":"01023778152","phone2":"01023778152","profile":"https://dev-storage.saiifedu.com/8017526372367123.jpg","isTemp":false,"birth":"1988-03-02T00:00:00.000Z","addr1":"경기 용인시 기흥구 기흥단지로 5","addr2":"3층","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/5983480260862621.png","occupation":"직영근로자","createdAt":"2021-10-19T04:31:05.000Z","updatedAt":"2021-11-04T02:12:33.000Z","deletedAt":null},{"id":35,"level":100,"name":"최수종","userId":"worker2","userPw":"$2b$04$OPQ/OtWjqZ6qmWtABVufc.7AgMuttthlFbgA.qg.zoAwdgSntX2ZS","phone1":"01023778152","phone2":"","profile":"https://dev-storage.saiifedu.com/10373262181771747.jpg","isTemp":false,"birth":"1970-07-04T00:00:00.000Z","addr1":"서울 강남구 강남대로42길 11","addr2":"3층 3055호","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/9637691020315367.jpg","occupation":null,"createdAt":"2021-10-19T15:43:29.000Z","updatedAt":"2021-10-30T00:11:09.000Z","deletedAt":null},{"id":36,"level":100,"name":"강산애","userId":"worker3","userPw":"$2b$04$FuAJN7xLlapSb0r/5wS2Z.yuTKgUenNvgY5V9ptnAZEK89mqYI9W2","phone1":"01023778152","phone2":"","profile":null,"isTemp":false,"birth":"1983-12-15T00:00:00.000Z","addr1":"","addr2":"","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/25384114225777377.jpg","occupation":null,"createdAt":"2021-10-19T16:00:18.000Z","updatedAt":"2021-10-19T16:12:01.000Z","deletedAt":null},{"id":37,"level":100,"name":"노두현","userId":"worker10","userPw":"$2b$04$OF9KGJI9xoE.xYi/u3tiZ.Z3x.hi/7LffXlPVbQn3f/at7Sgl57SO","phone1":"01036159866","phone2":"01028282992","profile":"https://dev-storage.saiifedu.com/6311751944948638.jpg","isTemp":false,"birth":"1962-02-03T00:00:00.000Z","addr1":"서울 영등포구 국회대로53길 24","addr2":"국회의사당","national":1,"married":false,"isMale":true,"sign":"https://dev-storage.saiifedu.com/9363869900108497.jpg","occupation":null,"createdAt":"2021-10-20T01:33:19.000Z","updatedAt":"2021-10-20T01:46:01.000Z","deletedAt":null},{"id":38,"level":100,"name":"rdh","userId":"worker11","userPw":"$2b$04$P0vIZG4e4jpv6KS/qL7yJOdBnQhxNQhwFLgmjjsbb6i7BGkJIzioa","phone1":"01036159866","phone2":"0123123123","profile":null,"isTemp":false,"birth":"1998-03-04T00:00:00.000Z","addr1":"서울 강서구 대장로 39","addr2":"test","national":1,"married":false,"isMale":true,"sign":"https://dev-storage.saiifedu.com/7775277552231612.png","occupation":null,"createdAt":"2021-10-20T02:31:56.000Z","updatedAt":"2021-11-01T06:16:54.000Z","deletedAt":null},{"id":39,"level":100,"name":"","userId":"worker4","userPw":"$2b$04$VhsnDQ9JGumM8BnM6N6CY.YtcslaehuGL6CY9tmO5JJiJ6CrCLBYW","phone1":"01023778152","phone2":"","profile":null,"isTemp":false,"birth":null,"addr1":"","addr2":"","national":0,"married":false,"isMale":false,"sign":null,"occupation":null,"createdAt":"2021-10-20T03:00:21.000Z","updatedAt":"2021-10-20T03:00:21.000Z","deletedAt":null},{"id":40,"level":100,"name":"","userId":"worker5","userPw":"$2b$04$on8Rz6of0FznKDOcl1wL1OdI.LLN8gGgLQvB8Bm8kIyALCvcwQaiq","phone1":"01023778152","phone2":"","profile":null,"isTemp":false,"birth":null,"addr1":"","addr2":"","national":0,"married":false,"isMale":false,"sign":null,"occupation":null,"createdAt":"2021-10-29T01:24:54.000Z","updatedAt":"2021-10-29T01:24:54.000Z","deletedAt":null},{"id":41,"level":100,"name":"성주필_근로자","userId":"seongka2","userPw":"$2b$04$PwXpBTkBF8kIZdagtpVSzO6AzMpKHTRERSIEzEzQWR7Z7uWE./hZu","phone1":"01072716465","phone2":"01035988052","profile":"https://dev-storage.saiifedu.com/8228677175104153.jpg","isTemp":false,"birth":"1987-05-20T00:00:00.000Z","addr1":"서울 영등포구 양평로28가길 44","addr2":"203호","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/9571085644310109.png","occupation":null,"createdAt":"2021-11-01T05:58:38.000Z","updatedAt":"2021-11-01T06:03:15.000Z","deletedAt":null},{"id":42,"level":100,"name":"워커테스트01","userId":"workertest01","userPw":"$2b$04$moTscSKhJnAAVH1Hjhhf9.6shMqpgD0zJ6/6w7gPVs4V2VlOzfu26","phone1":"01072716465","phone2":"01072716465","profile":null,"isTemp":false,"birth":"1987-05-20T00:00:00.000Z","addr1":"서울 영등포구 양평로28가길 44","addr2":"203호","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/2256740322664823.png","occupation":null,"createdAt":"2021-11-05T01:36:35.000Z","updatedAt":"2021-11-05T01:38:53.000Z","deletedAt":null}],"companyCnt":[{"id":1,"name":"한국도로공사","phone":"023331111","businessId":"1201212222","memo":null,"createdAt":"2021-09-16T14:53:23.000Z","updatedAt":"2021-09-16T14:53:23.000Z"},{"id":2,"name":"수자원공사","phone":"023331111","businessId":"1441244444","memo":null,"createdAt":"2021-09-16T14:58:23.000Z","updatedAt":"2021-09-16T14:58:23.000Z"},{"id":3,"name":"철도시설공단","phone":"023331111","businessId":"1321212121","memo":null,"createdAt":"2021-09-16T14:59:23.000Z","updatedAt":"2021-09-16T14:59:23.000Z"},{"id":4,"name":"서울시","phone":"023331111","businessId":"12112423232","memo":null,"createdAt":"2021-09-16T14:59:42.000Z","updatedAt":"2021-09-16T14:59:42.000Z"},{"id":5,"name":"대림산업","phone":"023331111","businessId":"22233423232","memo":null,"createdAt":"2021-09-16T15:00:03.000Z","updatedAt":"2021-09-16T15:00:03.000Z"},{"id":6,"name":"삼성물산","phone":"023331111","businessId":"2333345677","memo":null,"createdAt":"2021-09-16T15:00:16.000Z","updatedAt":"2021-09-16T15:00:16.000Z"},{"id":7,"name":"SK건설","phone":"023331111","businessId":"2343356777","memo":null,"createdAt":"2021-09-16T15:00:41.000Z","updatedAt":"2021-09-16T15:00:41.000Z"},{"id":8,"name":"포스코건설","phone":"023331111","businessId":"2123343566","memo":null,"createdAt":"2021-09-16T15:01:04.000Z","updatedAt":"2021-09-16T15:01:04.000Z"},{"id":18,"name":"현대엔지니어링","phone":null,"businessId":"12131351","memo":null,"createdAt":"2021-10-10T18:08:24.000Z","updatedAt":"2021-10-10T18:08:24.000Z"},{"id":19,"name":"주식회사 새임","phone":null,"businessId":"2188125047","memo":null,"createdAt":"2021-10-15T06:47:04.000Z","updatedAt":"2021-10-15T06:47:04.000Z"}],"docCnt":[{"id":1,"siteId":1212055764,"name":"교육일지(관리감독자,근로자,msds,특수형태근로종사자)","createdAt":"2021-10-03T22:36:06.000Z","updatedAt":"2021-10-03T22:36:06.000Z"},{"id":2,"siteId":1212055764,"name":"금빛_신규채용자 관리대장(최최종)","createdAt":"2021-10-03T22:36:07.000Z","updatedAt":"2021-10-03T22:36:07.000Z"},{"id":3,"siteId":1212055764,"name":"특별안전교육(갑지)-최종","createdAt":"2021-10-03T22:36:08.000Z","updatedAt":"2021-10-03T22:36:09.000Z"}],"adminCnt":[{"id":4,"level":2,"name":"temppw","userId":"temppw","userPw":"$2b$04$moKJoc2tobUzZsRG50pCBeIGzNgAII9oN0UyMlilmkeBW85mwaPvC","phone1":"01023778152","phone2":"","profile":null,"isTemp":false,"birth":"1980-05-05T00:00:00.000Z","addr1":"서울 강남구 봉은사로 403","addr2":"11","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/4078807414094301.jpg","occupation":"","createdAt":"2021-09-09T22:41:58.000Z","updatedAt":"2021-11-04T03:32:53.000Z","deletedAt":null}]}}
	
	$curl_response = json_decode($curl_response, true);
	
	if ($http_code == 200) {
		$response = array('result'=>true, 'list'=>$curl_response['list'], 'status'=>$curl_response['status']);
	} else {
		$response = array('result'=>false, 'msg'=>"{$http_code} ERROR!, ".$curl_response['msg']);
	}
	
	echo json_encode($response);
	exit;
}
?>