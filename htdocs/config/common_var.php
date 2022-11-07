<?php
/** 상수 셋팅 */

if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) define('DOMAIN', 'https://'.trim($_SERVER['HTTP_HOST'])); 
else define('DOMAIN', 'http://'.trim($_SERVER['HTTP_HOST']));

define('TITLE', 'SAIIFEDU');

define('ACCEPTED_FILES', '.jpg,.png,.jpeg,.bmp,.gif,.hwp,.xls,.xlsx,.doc,.docx,.pdf,.ppt,.pptx,.zip,.rar,.arj,.cab,.gz,.lzh,.tgz,.pak,.psz');
define('IMAGES_EXTENSION_ARRAY', '"jpg", "png", "jpeg", "gif"');
define('EXCEL_EXTENSION_ARRAY', '"xls", "xlsx"');
define('WORD_EXTENSION_ARRAY', '"doc", "docx"');
define('POWERPOINT_EXTENSION_ARRAY', '"ppt", "pptx"');
define('PDF_EXTENSION_ARRAY', '"pdf"');
define('ARCHIVE_EXTENSION_ARRAY', '"zip", "rar", "arj", "cab", "gz", "lzh", "tgz", "pak", "psz"');

define('SERVER_TIME', time());
define('TIME_YMDHIS', date('Y-m-d H:i:s', SERVER_TIME));
define('TIME_YMD', substr(TIME_YMDHIS, 0, 10));
define('TIME_HIS', substr(TIME_YMDHIS, 11, 8));

define('JS_VERSION', strtotime(date('Y-m-d H:i', SERVER_TIME)));

// 내부 private ip 기준으로 설정한다.
if($_SERVER['SERVER_ADDR'] == "172.26.4.177") define('API_URL', 'https://api-staging.saiifedu.com');
else define('API_URL', 'https://api.saiifedu.com');
define('COOKIE_FILE', $_SERVER['DOCUMENT_ROOT'].'/temp/'.$_COOKIE['PHPSESSID'].'.txt');
?>