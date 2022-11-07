<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_PORT', '3306');
define('MYSQL_DB', 'safe');
define('MYSQL_ID', 'root');
define('MYSQL_PASSWORD', 'autoset');

$DB_CONNECT = mysqli_connect(MYSQL_HOST, MYSQL_ID, MYSQL_PASSWORD, MYSQL_DB, MYSQL_PORT);

if (!$DB_CONNECT) {
	$error = mysqli_connect_error();
    $errno = mysqli_connect_errno();
	
	if (basename(__FILE__) == 'ajax.php') {
		$json_data = array('result'=>false, 'message'=>"$errno: $error");
		echo json_encode($json_data);
	} else {
		print "$errno: $error".'<br />';
	}
	
    exit();
} else {
	mysqli_query('set session character_set_connection=utf8;');
	mysqli_query('set session character_set_results=utf8;');
	mysqli_query('set session character_set_client=utf8;');
	date_default_timezone_set('Asia/Seoul');
}
?>