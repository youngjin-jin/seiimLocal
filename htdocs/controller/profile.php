<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_data') {
	$workerId = clean_xss_tags($_POST['workerId']);

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/getWorkerProfile?accId='.$workerId,
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
	//{"status":0,"msg":"성공","info":{"id":34,"level":100,"name":"아무개","userId":"worker1","userPw":"$2b$04$Hf9.Nix83g8OYCJzZJdZ5ukcwKGadGmmC8erelH.K/UCR8qdF7cEa","phone1":"01023778152","phone2":"01023778152","profile":"https://dev-storage.saiifedu.com/8017526372367123.jpg","isTemp":false,"birth":"1988-03-02T00:00:00.000Z","addr1":"경기 용인시 기흥구 기흥단지로 5","addr2":"3층","national":"대한민국(Republic of Korea)","married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/5983480260862621.png","occupation":"직영근로자","createdAt":"2021-10-19T04:31:05.000Z","updatedAt":"2021-11-11T12:03:33.000Z","deletedAt":null,"identity":{"accId":34,"img":"https://dev-storage.saiifedu.com/9027428004767295.jpg","createdAt":"2021-10-19T11:03:53.000Z","updatedAt":"2021-10-20T03:03:39.000Z","deletedAt":null},"certList":[{"id":1,"accId":34,"img":"https://dev-storage.saiifedu.com/0004740986346083442.jpg","type":1,"certName":"불도저","certDate":"1988-12-12T00:00:00.000Z","createdAt":"2021-10-01T01:30:00.000Z","updatedAt":"2021-11-01T02:05:09.000Z","deletedAt":null},{"id":4,"accId":34,"img":"https://dev-storage.saiifedu.com/0004740986346083442.jpg","type":4,"certName":"2급 지게차 운전 기능사","certDate":"2020-11-28T00:00:00.000Z","createdAt":"2021-10-01T01:30:04.000Z","updatedAt":"2021-10-30T03:35:20.000Z","deletedAt":null}]}}
	
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