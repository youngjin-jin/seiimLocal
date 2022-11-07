<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config_ajax.php');

if ($_POST['module'] == 'get_list') {
	$eduId = clean_xss_tags($_POST['eduId']);

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'/app/eduCertList?eduId='.$eduId,
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
	//{"status":0,"msg":"성공","list":[{"id":34,"level":100,"name":"아무개","userId":"worker1","userPw":"$2b$04$Hf9.Nix83g8OYCJzZJdZ5ukcwKGadGmmC8erelH.K/UCR8qdF7cEa","phone1":"01023778152","phone2":"01023778152","profile":"https://dev-storage.saiifedu.com/8017526372367123.jpg","isTemp":false,"birth":"1988-03-02T00:00:00.000Z","addr1":"경기 용인시 기흥구 기흥단지로 5","addr2":"3층","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/5983480260862621.png","occupation":"직영근로자","createdAt":"2021-10-19T04:31:05.000Z","updatedAt":"2021-11-11T12:03:33.000Z","deletedAt":null},{"id":41,"level":100,"name":"성주필_근로자","userId":"seongka2","userPw":"$2b$04$PwXpBTkBF8kIZdagtpVSzO6AzMpKHTRERSIEzEzQWR7Z7uWE./hZu","phone1":"01072716465","phone2":"01035988052","profile":"https://dev-storage.saiifedu.com/8228677175104153.jpg","isTemp":false,"birth":"1987-05-20T00:00:00.000Z","addr1":"서울 영등포구 양평로28가길 44","addr2":"203호","national":1,"married":true,"isMale":true,"sign":"https://dev-storage.saiifedu.com/9571085644310109.png","occupation":null,"createdAt":"2021-11-01T05:58:38.000Z","updatedAt":"2021-11-01T06:03:15.000Z","deletedAt":null}]}
	
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