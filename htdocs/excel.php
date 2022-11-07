<?php
ini_set('max_execution_time', 0);

include_once('config/common_var.php');
include_once('config/common_lib.php');

$siteId			 = clean_xss_tags($_GET['siteId']);
$startDate		 = clean_xss_tags($_GET['startDate']);
$endDate		 = clean_xss_tags($_GET['endDate']);
$eduName		 = clean_xss_tags($_GET['eduName']);
$cat1			 = clean_xss_tags($_GET['cat1']);
$cat2			 = clean_xss_tags($_GET['cat2']);
$constructType	 = clean_xss_tags($_GET['constructType']);
$instructor		 = clean_xss_tags($_GET['instructor']);

$curl_url = API_URL.'/ba/exportEduExcel?siteId='.$siteId;

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
//{"status":0,"msg":"성공","list":[{"eduName":"테스트 교육","eduDate":"2021-10-01T01:34:52.000Z","startTime":"00:00:00","instructor":"성주필","siteName":"공덕역B공구","catName":"정기안전보건교육","constructType":"공종이다","cat2Name":"TBM"},{"eduName":"신규채용 교육","eduDate":"2021-10-27T15:45:38.000Z","startTime":"12:12:32","instructor":"노두현","siteName":"공덕역B공구","catName":"신규채용자교육","constructType":"공종2","cat2Name":"해당없음"}]}

$curl_response = json_decode($curl_response, true);

if ($http_code == 200) {
	include_once($_SERVER['DOCUMENT_ROOT'].'/config/PHPExcel.php');

	$objPHPExcel = new PHPExcel();
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->duplicateStyleArray(array('fill' => array('type'  => PHPExcel_Style_Fill::FILL_SOLID,	'color' => array('rgb'=>'B2EBF4'))),'A1:I1');
	$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '번호')
										->setCellValue('B1', '교육명')
										->setCellValue('C1', '교육일')
										->setCellValue('D1', '교육시각')
										->setCellValue('E1', '교육진행자')
										->setCellValue('F1', '현장')
										->setCellValue('G1', '교육종류')										
										->setCellValue('H1', '교육세부종류')
										->setCellValue('I1', '공종');
	
	$ii=2;
	
	foreach($curl_response['list'] as $element) {
		/*cat2Name: "TBM"
		catName: "정기안전보건교육"
		constructType: "공종이다"
		eduDate: "2021-10-01T01:34:52.000Z"
		eduName: "테스트 교육"
		id: 1
		instructor: "성주필"
		siteName: "공덕역B공구"
		startTime: "00:00:00"*/
		
		$eduDate = substr($element['eduDate'], 0, 10);
		$startTime = substr($element['startTime'], 0, 5);
		$endTime = substr($element['endTime'], 0, 5);
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue("A$ii", (string)($ii-1))
					->setCellValue("B$ii", "$element[eduName]")
					->setCellValue("C$ii", "$eduDate")
					->setCellValue("D$ii", "$startTime ~ $endTime")
					->setCellValue("E$ii", "$element[instructor]")
					->setCellValue("F$ii", "$element[siteName]")
					->setCellValue("G$ii", "$element[catName]")
					->setCellValue("H$ii", "$element[cat2Name]")
					->setCellValue("I$ii", "$element[constructType]");
		$ii++;
	}

	$filename = TIME_YMD.'_교육내역_다운';

	// 시트이름
	$objPHPExcel->getActiveSheet()->setTitle($filename);

	$objPHPExcel->setActiveSheetIndex(0);

	// 파일명
	$filename = urlencode($filename);

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}
?>