<?php
include_once('config/config.php');

setcookie('token', '', time()+863000, '/');

session_destroy();
session_start();
@unlink(COOKIE_FILE);

if (strpos(DOMAIN, 'localhost')) {
	if ($_COOKIE['member_type'] == 'admin') $url = '/admin'; else $url = '/';
} else {
	$url = DOMAIN;
}
	
goto_url($url);	
?>