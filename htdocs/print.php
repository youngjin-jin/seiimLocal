<?php
ini_set('max_execution_time', 0);

include_once('config/common_var.php');
include_once('config/common_lib.php');

$key = clean_xss_tags($_GET['key']);

$curl_data = array('eduIds' => $key);

//echo print_r($curl_data);exit;

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => API_URL . '/ba/printEdu',
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
//{"status":0,"msg":"성공","list":[{"id":2,"docHashId":1965975935,"docDiv":0,"docName":"안전수칙 준수계약서","safetyDocs":[{"accId":41,"safetyDocId":12,"siteId":2881092027,"templateType":1,"content":{"signature":"https://dev-storage.saiifedu.com/9571085644310109.png"},"sign":"https://dev-storage.saiifedu.com/9571085644310109.png","createdAt":"2021-11-02T03:38:34.000Z","updatedAt":"2021-11-02T03:38:34.000Z"}]},{"eduDoc":{"adminName":"test","siteName":"공덕역B공구","cat1Name":"특별안전보건교육","cat2Name":"고압실내 작업","svName":"수자원공사","startTime":"13:00:00","endTime":"15:00:00","eduDate":"2021-11-15T00:00:00.000Z","doc":"","constructType":"테스트공종","instructor":"김찬호","eduPlace":"제3 교육장","eduName":"콘크리트 파쇄 방법 교육","memo":null,"attach":[{"id":28,"path":"https://dev-storage.saiifedu.com/4176771637253476.jpg","createdAt":"2021-11-09T11:26:15.000Z","updatedAt":"2021-11-09T11:26:15.000Z"},{"id":29,"path":"https://dev-storage.saiifedu.com/7473299558780355.jpg","createdAt":"2021-11-09T11:26:15.000Z","updatedAt":"2021-11-09T11:26:15.000Z"}]}}]}

if (!($http_code == 200 && count($curl_response['list']))) {
	alert('문서를 불러오지 못했습니다. 관리자에게 문의해 주십시오.', '/admin');
}

$curl_response = json_decode($curl_response, true);
?>

<!DOCTYPE HTML>
<html>

<head>
	<title><?php echo TITLE ?></title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1,maximum-scale=1.0,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="96x96" href="/view/images/favicon.png">

	<link href="/view/css/quill.snow.css" rel="stylesheet">
	<link href="/view/css/monokai-sublime.css" rel="stylesheet">

	<!-- reset css -->
	<link href="/view/admin/pc/css/reset.css?ver=122" rel="stylesheet" type="text/css">
	<link href="/view/admin/pc/css/fonts.css" rel="stylesheet" type="text/css">

	<!-- custom css -->
	<link href="/view/admin/pc/css/common.css" rel="stylesheet" type="text/css">
	<link href="/view/admin/pc/css/utility.css" rel="stylesheet" type="text/css">
	<link href="/view/admin/pc/css/style.css" rel="stylesheet" type="text/css">

	<link href="/view/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="/view/css/custom.css?v=<?php echo JS_VERSION ?>" rel="stylesheet" type="text/css">

	<!-- jquery -->
	<script src="/view/js/jquery-1.12.4.min.js"></script>

	<!-- custom js -->
	<script src="/view/js/pro.js?v=<?php echo JS_VERSION ?>"></script>

	<script>
		var locale = '<?php echo ($_COOKIE['locale']) ? $_COOKIE['locale'] : 'kr' ?>';
		var DEVICE = '<?php echo $device ?>';
	</script>

	<style>
		* {
			box-sizing: border-box;
		}

		body {
			min-width: 1100px;
			background-color: #fff;
		}

		div {
			font-size: 18px;
		}

		.print_page {
			position: relative;
			width: 1080px;
			/*margin: 0 auto;*/
			background: white;
			border: 1px solid #000;
			margin-bottom: 50px;
		}

		.print_page.newTable {
			padding-top: 20px !important;
		}

		.pr_tb {
			width: 100%;
			border-collapse: collapse;
			margin-top: 0px;
		}

		.pr_tb>tr {}

		.pr_tb tr td {
			vertical-align: middle;
		}

		.tr_tt td {
			border: 1px solid #000;
			text-align: center;
			font-size: 20px;
			height: 40px;
		}

		.ed_type {
			display: inline-block;
			margin-right: 15px;
		}

		.ed_type p {
			margin: 0;
			padding: 0;
			vertical-align: middle;
			font-size: 20px;
			position: relative;
		}

		.ed_type p span {
			border-radius: 100%;
			width: 10px;
			height: 10px;
			border: 1px solid #000;
			display: inline-block;
			vertical-align: middle;
			position: absolute;
			top: 11px;
			left: -13px;
		}

		.ed_type p.on span {
			background-color: #000;
		}

		.td_toptit {
			width: 50%;
			font-size: 28px;
			height: 70px;
			border: 1px solid #000;
			font-weight: 600;
			text-align: center;
			background-color: #ffff99;
		}

		.td_topsname {
			text-align: left;
			font-size: 18px;
			border: 0;
		}

		.td_topsname>p {
			font-size: 18px;
			font-weight: 600;
			margin-top: 10px;
		}

		.td_name {
			background-color: #b9ffff;
		}

		.td_name2 {
			background-color: #fcd5b4;
		}

		.confirmBox {
			position: absolute;
			top: 20px;
			right: 50px;
		}

		.confirmBox table {
			border: 1px solid #000;
			border-collapse: collapse;
		}

		.confirmBox table td {
			border: 1px solid #000;
			text-align: center;
			font-size: 20px;
		}

		.insign td img {
			max-height: 60px;
		}

		.tr_tpline {
			padding-left: 5px;
		}

		.tr_tpline>p {
			margin: 0px 0;
			font-size: 20px;
		}

		.secondSt .tr_tpline>p {
			margin: 0px 0;
			font-size: 20px;
		}

		.pr_tb tr td.tr_tt td {
			vertical-align: top;
		}

		.pr_tb tr td.td_docs {
			vertical-align: top;
		}

		.td_docs>p {
			font-size: 20px;
		}

		.new_grouttit {
			text-align: left;
			font-size: 20px;
			font-weight: 600;
			font-style: italic;
		}

		.new_datetop {
			border: 3px double #000;
			padding: 5px 0;
		}

		.new_datetop p {
			margin: 0;
		}

		.new_datetop .wrap {
			position: relative;
			display: flex;
			align-items: center;
		}

		.new_datetop .wrap .leftbox {
			float: left;
			width: 30%;
			vertical-align: middle;
			display: inline-block;
			text-align: center;
			font-size: 16px;
		}

		.new_datetop .wrap .rightbox {
			float: right;
			width: 70%;
			vertical-align: middle;
			display: inline-block;
			text-align: center;
			font-size: 16px;
		}

		.td_name_new {
			width: 11%;
		}

		.tr_tt td.td_name_new {
			font-size: 17px;
			background-color: #f5f5f5;
		}

		.tr_tt td.new_tdtxt {
			width: 20%;
			font-size: 17px;
		}

		.new_datetop.bpbox {
			border: 0;
		}

		.new_datetop.bpbox .wrap {
			margin: 5px 0;
			border: 1px dotted #000;
			padding: 5px 0;
			text-align: center;
			display: block;
		}

		.tr_tt td.td_name_new_sm {
			font-size: 17px;
			text-align: left;
			padding: 10px 0 10px 5px
		}

		.myitem_table {
			border-collapse: collapse;
			width: 100%;
		}

		.myitem_hd {}

		.myitem_hd th {
			text-align: center;
			border: 1px solid #000;
			font-size: 14px;
			width: calc(100% / 7);
		}

		.myitem_td td {
			text-align: center;
			border: 1px solid #000;
			height: 80px;
		}

		.myitem_td img {
			width: auto;
			display: inline-block;
			height: 100px;
			max-width: 100%;
		}
		ul{list-style: disc;    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;}

		@media print {

			html,
			body {
				-webkit-print-color-adjust: exact !important;
			}

			.print_page {
				page-break-after: always;
				border: none;
				margin-bottom: 0px;
			}
		}
	</style>
</head>

<body>

	<?php

	foreach ($curl_response['list'] as $element) {
		if($_SERVER['SERVER_ADDR'] == "172.26.4.177") { // 스테이징 분리
			// 대림 현장(세종안성)의 경우로 한정 
			if ($element['eduDoc']['siteId'] == 4100913787) {
				//구형
				include("print_old.php");
			} else if ($element['eduDoc']['siteId'] == 4256564307) {
				include("print_dl.php");
			} else if ($element['eduDoc']['siteId'] == 1037548003) {
				//신형
				include("print_new.php");
			} else {
				//구형
				include("print_old.php");
			}
		} else {
			// 대림 현장(세종안성)의 경우로 한정 
			if ($element['eduDoc']['siteId'] == 825609712) {
				//신형
				include("print_new.php");
			} else if ($element['eduDoc']['siteId'] == 4100913787) {
				include("print_dl.php");
			} else {
				//구형
				include("print_old.php");
			}
		}
	}
	?>
	<script src="/view/js/page/print.js?v=<?php echo JS_VERSION ?>"></script>

</body>

</html>