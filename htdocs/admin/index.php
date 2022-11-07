<?php
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING );

// 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');

include_once('../config/common_var.php'); //공통변수 설정파일

//==============================================================================
// SESSION 설정
//------------------------------------------------------------------------------
@ini_set('session.use_trans_sid', 0);    // PHPSESSID를 자동으로 넘기지 않음
@ini_set('url_rewriter.tags', ''); // 링크에 PHPSESSID가 따라다니는것을 무력화함 (해뜰녘님께서 알려주셨습니다.)

ini_set('session.cache_expire', 10); // 세션 캐쉬 보관시간 (분)
ini_set('session.gc_maxlifetime', 600); // session data의 garbage collection 존재 기간을 지정 (초)
ini_set('session.gc_probability', 1); // session.gc_probability는 session.gc_divisor와 연계하여 gc(쓰레기 수거) 루틴의 시작 확률을 관리합니다. 기본값은 1입니다. 자세한 내용은 session.gc_divisor를 참고하십시오.
ini_set('session.gc_divisor', 100); // session.gc_divisor는 session.gc_probability와 결합하여 각 세션 초기화 시에 gc(쓰레기 수거) 프로세스를 시작할 확률을 정의합니다. 확률은 gc_probability/gc_divisor를 사용하여 계산합니다. 즉, 1/100은 각 요청시에 GC 프로세스를 시작할 확률이 1%입니다. session.gc_divisor의 기본값은 100입니다.

session_set_cookie_params(0, '/');

session_start();

ob_start();

header('Content-Type: text/html; charset=utf-8');
$gmnow = gmdate('D, d M Y H:i:s') . ' GMT';
header('Expires: 0'); // rfc2616 - Section 14.21
header('Last-Modified: '.$gmnow);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0

$mobile_agent = '/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i';

if (preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) $device = 'mobile'; else $device = 'pc';

//로그인체크
if ($_SESSION['userId']) {
	if ($_SESSION['level'] == 100) {
		$device = 'mobile';
		setcookie('device', $device, time()+863000, '/');
		setcookie('member_type', 'user', time()+863000, '/');
		header('location: '.DOMAIN.'/view/user/mobile/html/field_list.php');
	} else {
		setcookie('device', $device, time()+863000, '/');
		setcookie('member_type', 'admin', time()+863000, '/');
		
		if ($device == 'pc') header('location: '.DOMAIN.'/view/admin/pc/html/dashboard.php');
		else header('location: '.DOMAIN.'/view/admin/mobile/html/field_list.php');
	}
} else {
	setcookie('device', $device, time()+863000, '/');
	setcookie('member_type', 'admin', time()+863000, '/');
	header('location: '.DOMAIN.'/view/admin/'.$device.'/html/login.php');
}
?>

<div class="fullBody">
    <div id="page-content">
		<div class="page-content-box">
			<div class="col-xs-12">
				<div class="form-group">
					<textarea class="form-control" style="min-height:200px;width:100%;"><?php print_r($_SESSION);?><?php print_r($_COOKIE);?></textarea>
				</div>
			</div>
		</div>
	</div>
</div>