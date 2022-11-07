<?php
//한글인지 체크
function is_hangul($value) {
	for($i=0;$i<strlen($value);$i++) {
        $c = $value[$i];
        $oc = ord($c);

        // 한글
        if ($oc >= 0xA0 && $oc <= 0xFF) {
            $s .= $c . $value[$i+1] . $value[$i+2];
            $i+=2;
        }
    }
	
    return ($value == $s);
}

// 세션변수 생성
function set_session($session_name, $value) {
    if (PHP_VERSION < '5.3.0')
        session_register($session_name);
    // PHP 버전별 차이를 없애기 위한 방법
    $$session_name = $_SESSION[$session_name] = $value;
}

// 파일명에서 특수문자 제거
function get_safe_filename($name) {
    $pattern = '/["\'<>=#&!%\\\\(\)\*\+\?]/';
    $name = preg_replace($pattern, '', $name);

    return $name;
}

// unescape nl 얻기
function conv_unescape_nl($str) {
    $search = array('\\r', '\r', '\\n', '\n');
    $replace = array('', '', "\n", "\n");

    return str_replace($search, $replace, $str);
}

// 검색어 특수문자 제거
function get_search_string($stx) {
    $stx_pattern = array();
    $stx_pattern[] = '#\.*/+#';
    $stx_pattern[] = '#\\\*#';
    $stx_pattern[] = '#\.{2,}#';
    $stx_pattern[] = '#[/\'\"%=*\#\(\)\|\+\&\!\$~\{\}\[\]`;:\?\^\,]+#';

    $stx_replace = array();
    $stx_replace[] = '';
    $stx_replace[] = '';
    $stx_replace[] = '.';
    $stx_replace[] = '';

    $stx = preg_replace($stx_pattern, $stx_replace, $stx);

    return $stx;
}

// XSS 관련 태그 제거
function clean_xss_tags($str) {
    $str = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);

    return $str;
}

// XSS 어트리뷰트 태그 제거
function clean_xss_attributes($str) {
    $str = preg_replace('#(onabort|onactivate|onafterprint|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onblur|onbounce|oncellchange|onchange|onclick|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavaible|ondatasetchanged|ondatasetcomplete|ondblclick|ondeactivate|ondrag|ondragdrop|ondragend|ondragenter|ondragleave|ondragover|ondragstart|ondrop|onerror|onerrorupdate|onfilterupdate|onfinish|onfocus|onfocusin|onfocusout|onhelp|onkeydown|onkeypress|onkeyup|onlayoutcomplete|onload|onlosecapture|onmousedown|onmouseenter|onmouseleave|onmousemove|onmoveout|onmouseover|onmouseup|onmousewheel|onmove|onmoveend|onmovestart|onpaste|onpropertychange|onreadystatechange|onreset|onresize|onresizeend|onresizestart|onrowexit|onrowsdelete|onrowsinserted|onscroll|onselect|onselectionchange|onselectstart|onstart|onstop|onsubmit|onunload)\\s*=\\s*\\\?".*?"#is', '', $str);

    return $str;
}

// HTML 특수문자 변환 htmlspecialchars
function htmlspecialchars2($str) {
    $trans = array("\"" => "&#034;", "'" => "&#039;", "<"=>"&#060;", ">"=>"&#062;");
    $str = strtr($str, $trans);
    return $str;
}

// 휴대폰번호의 숫자만 취한 후 중간에 하이픈(-)을 넣는다.
function hyphen_hp_number($hp) {
    $hp = preg_replace("/[^0-9]/", "", $hp);
    return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $hp);
}

// CHARSET 변경 : euc-kr -> utf-8
function iconv_utf8($str) {
    return iconv('euc-kr', 'utf-8', $str);
}


// CHARSET 변경 : utf-8 -> euc-kr
function iconv_euckr($str) {
    return iconv('utf-8', 'euc-kr', $str);
}

// 한글 요일
function get_yoil($date, $full=0) {
    $arr_yoil = array ('일', '월', '화', '수', '목', '금', '토');

    $yoil = date("w", strtotime($date));
    $str = $arr_yoil[$yoil];
    if ($full) {
        $str .= '요일';
    }
    return $str;
}

function cut_str($str, $len, $suffix="…") {
    $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    $str_len = count($arr_str);

    if ($str_len >= $len) {
        $slice_str = array_slice($arr_str, 0, $len);
        $str = join("", $slice_str);

        return $str . ($str_len > $len ? $suffix : '');
    } else {
        $str = join("", $arr_str);
        return $str;
    }
}

// TEXT 형식으로 변환
function get_text($str, $html=0, $restore=false) {
    $source[] = "<";
    $target[] = "&lt;";
    $source[] = ">";
    $target[] = "&gt;";
    $source[] = "\"";
    $target[] = "&#034;";
    $source[] = "\'";
    $target[] = "&#039;";

    if($restore)
        $str = str_replace($target, $source, $str);

    // 3.31
    // TEXT 출력일 경우 &amp; &nbsp; 등의 코드를 정상으로 출력해 주기 위함
    if ($html == 0) {
        $str = html_symbol($str);
    }

    if ($html) {
        $source[] = "\n";
        $target[] = "<br/>";
    }

    return str_replace($source, $target, $str);
}

// HTML SYMBOL 변환
// &nbsp; &amp; &middot; 등을 정상으로 출력
function html_symbol($str) {
    return preg_replace("/\&([a-z0-9]{1,20}|\#[0-9]{0,3});/i", "&#038;\\1;", $str);
}

// 메타태그를 이용한 URL 이동
// header("location:URL") 을 대체
function goto_url($url) {
    $url = str_replace('&amp;', '&', $url);
	
	if (strpos(strtolower($url), 'http') === false) {
		if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) $url = 'https://'.$_SERVER['HTTP_HOST'].$url; 
		else $url = 'http://'.$_SERVER['HTTP_HOST'].$url; 
	}
	
	echo '<script>';
	echo 'location.replace("'.$url.'");';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
	echo '</noscript>';
	
    exit;
}

//경고창 발생후 페이지 이동
function alert($message, $url='') {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.PHP_EOL;
	echo '<script>'.PHP_EOL;	
	echo 'alert("'.$message.'");'.PHP_EOL;
	
	if ($url) echo 'location.href = "'.$url.'";'.PHP_EOL; else echo 'history.back();'.PHP_EOL;
	
	echo '</script>'.PHP_EOL;
	exit;
}

//파일용량 출력
function filesize_fnc($bytes, $decimals=2) {
	$size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	$factor = floor((strlen($bytes) - 1) / 3);
	
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).' '.$size[$factor];
}

//테이블의 레코드 갯수를 얻는다.
function table_count($table, $where) {
	$sql = " select count(*) as cnt from $table where $where ";
	$row = sql_fetch($sql);
	
	return $row['cnt'];
}

// multi-dimensional array에 사용자지정 함수적용
function array_map_deep($fn, $array) {
    if(is_array($array)) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                $array[$key] = array_map_deep($fn, $value);
            } else {
                $array[$key] = call_user_func($fn, $value);
            }
        }
    } else {
        $array = call_user_func($fn, $array);
    }

    return $array;
}

// SQL Injection 대응 문자열 필터링
function sql_escape_string($str) {
	$pattern = '/(and|or).*(union|select|insert|update|delete|from|where|limit|create|drop).*/i';
	$replace = '';

	if($pattern) $str = preg_replace($pattern, $replace, $str);

    $str = call_user_func('addslashes', $str);

    return $str;
}

// 파일명 확장자 반환
function ext($path) {
	return (new SplFileInfo($path))->getExtension();
}

function dirFileCount($uploaddir) {	
	if(is_dir($uploaddir)==true) {
		$result=opendir($uploaddir); //opendir함수를 이용해서 bbs디렉토리의 핸들을 얻어옴
		// readdir함수를 이용해서 bbs디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
		$file_count = 0;
		while ($file=readdir($result)) {	 
		if($file=="."||$file=="..") {continue;} // file명이 ".", ".." 이면 무시함
			$fileInfo = pathinfo($file);
			$fileExt = $fileInfo['extension']; // 파일의 확장자를 구함

			if (empty($fileExt)) {
				$dir_count++; // 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
			} else {
				$file_count++;// 파일에 확장자가 있으면 file_count를 증가시킴
			}
		}
		//echo"Dir Count:".$dir_count."<br>";
		//echo"File Count:".$file_count;
		return $file_count;
	} else {
		$uploaddir = iconv("utf-8", "cp949", $uploaddir);
		
		$result=opendir($uploaddir); //opendir함수를 이용해서 bbs디렉토리의 핸들을 얻어옴
		// readdir함수를 이용해서 bbs디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
		$file_count = 0;
		while ($file=readdir($result)) {	 
			 if($file=="."||$file=="..") {continue;} // file명이 ".", ".." 이면 무시함
			 $fileInfo = pathinfo($file);
			 $fileExt = $fileInfo['extension']; // 파일의 확장자를 구함

			 if (empty($fileExt)){
					$dir_count++; // 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
			 } else {
					$file_count++;// 파일에 확장자가 있으면 file_count를 증가시킴
			 }
		 }
		 //echo"Dir Count:".$dir_count."<br>";
		 //echo"File Count:".$file_count;
		return $file_count;
	
	}
}

function session_burn($data) {
	foreach ( $data as $key => $value ) {
		//session_register($key);
		$_SESSION["$key"]=$value;
		//echo $key.":".$value;
	}
	//session_register("memberID");
	//$_SESSION["memberID"]=$mem_id;
}

function session_des() {
	session_destroy();
}

//디렉토리 싹 지우는 함수
function rmdirAll($dir) {	
	if (is_dir($dir)) {
	   $dirs = dir($dir);
	   while(false !== ($entry = $dirs->read())) {
		  if(($entry != '.') && ($entry != '..')) {
			 if(is_dir($dir.'/'.$entry)) {
				rmdirAll($dir.'/'.$entry);
			 } else {
				@unlink($dir.'/'.$entry);
			 }
		   }
		}
		$dirs->close();
		@rmdir($dir);
	}

	return true;
}

//디렉토리 통채로 복사하는 함수
function xcopy($source, $dest, $permissions = 0755) {
	// Check for symlinks
	if (is_link($source)) {
		return symlink(readlink($source), $dest);
	}

	// Simple copy for a file
	if (is_file($source)) {
		return copy($source, $dest);
	}

	// Make destination directory
	if (!is_dir($dest)) {
		mkdir($dest, $permissions);
	}

	// Loop through the folder
	$dir = dir($source);
	while (false !== $entry = $dir->read()) {
		// Skip pointers
		if ($entry == '.' || $entry == '..') {
			continue;
		}

		// Deep copy directories
		xcopy("$source/$entry", "$dest/$entry", $permissions);
	}
	// Clean up
	$dir->close();	
	
   
    return true;
}

//임시파일명 생성
function rand_str(){
	$str = "";
	$alp = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	for ( $i=0; $i < 4; $i++ ) {
		$str .= $alp[rand(0,25)];
	}
	list($usec, $sec) = explode(" ", microtime());
	$str .= date('ms') . str_replace("0.","",(string)(float)$usec); // 분초 . 마이크로타임
	return $str;
}

// 파일명 확장자 배열로 반환
function get_filename($fname) {
	$fext  = array_pop(explode('.', $fname)); // 확장자
	$fname = basename($fpath, '.'.$fext); // 파일명
	$return = array($fname, $fext);
	return $return;
}

// 전체 스페이스 구하기
function hdd_space_check() {
	$total_disk = disk_total_space(".");
	$total_disk=intval($total_disk/1024/1024/1024);

	$FreeDiskSpace=Disk_Free_space(".");
	$FreeDiskSpace=intval($FreeDiskSpace/1024/1024/1024);

	$NoFreeDiskSpace=$total_disk-$FreeDiskSpace; 

	$result = "전체:".$total_disk." 사용:".$NoFreeDiskSpace." 남은:".$FreeDiskSpace;
	return $result;
}

function encrypt($string, $key) {
    $result = '';
    for($i=0; $i<strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key))-1, 1);
        $char = chr(ord($char)+ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function decrypt($string, $key) {
    $result = '';
    $string = base64_decode($string);
    for($i=0; $i<strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key))-1, 1);
        $char = chr(ord($char)-ord($keychar));
        $result .= $char;
    }
    return $result;
}

//이미지 리사이즈(이미지경로, 변경할가로길이)
function img_limit_resize($source_file, $target_size) {
	$img_info = @getimagesize($source_file);
	$img_wid = $img_info[0];
	$img_hei = $img_info[1];
	$img_type = $img_info[2];
	
	if($img_wid > $target_size){ //업로드이미지가 기준사이즈보다 클경우 이미지 사이즈 축소저장
		
		$re_hei = (int)(($img_hei * $target_size) / $img_wid);
		$im = ImageCreate($target_size, $re_hei); //이미지의 크기를 정합니다.
		
		if ($img_type == 1) $im2 = imagecreatefromgif($source_file);
		else if ($img_type == 2) $im2 = imagecreatefromjpeg($source_file);
		else if ($img_type == 3) $im2 = imagecreatefrompng($source_file);
		else return;
		
		imagecopyresized($im, $im2, 0, 0, 0, 0, $target_size, $re_hei, $img_wid, $img_hei);
		ImagePNG($im, $source_file); //ImagePNG(이미지, 저장될파일)
		ImageDestroy($im); // 이미지에 사용한 메모리 제거
	}
}

// 에디터 이미지 얻기
function get_editor_image($contents, $view=true) {
    if(!$contents)
        return false;

    // $contents 중 img 태그 추출
    if ($view)
        $pattern = "/<img([^>]*)>/iS";
    else
        $pattern = "/<img[^>]*src=[\'\"]?([^>\'\"]+[^>\'\"]+)[\'\"]?[^>]*>/i";
    preg_match_all($pattern, $contents, $matchs);

    return $matchs;
}

//에디터 이미지 삭제
function editor_img_del($imgs) {
	for($i=0;$i<count($imgs[1]);$i++) {
		$destfile = getcwd().$imgs[1][$i];

		if(is_file($destfile)) @unlink($destfile);
	}
}

// 쿼리를 실행
function sql_query($sql) {
	global $DB_CONNECT;
	
    $link = $DB_CONNECT;

    // Blind SQL Injection 취약점 해결
    $sql = trim($sql);

    $sql = preg_replace("#^select.*from.*[\s\(]+union[\s\)]+.*#i ", "select 1", $sql);
    // `information_schema` DB로의 접근을 허락하지 않습니다.
    $sql = preg_replace("#^select.*from.*where.*`?information_schema`?.*#i", "select 1", $sql);

    $result = @mysqli_query($link, $sql);

    return $result;
}

// 쿼리를 실행한 후 결과값에서 한행을 얻는다.
function sql_fetch($sql) {
	global $DB_CONNECT;
	
    $link = $DB_CONNECT;

    $result = sql_query($sql);
    $row = sql_fetch_array($result);
	
    return $row;
}

// 결과값에서 한행 연관배열(이름으로)로 얻는다.
function sql_fetch_array($result) {
    $row = @mysqli_fetch_assoc($result);
    return $row;
}

// auto_increment 값 가져오기
function sql_insert_id() {
    global $DB_CONNECT;
	
    $link = $DB_CONNECT;

    return mysqli_insert_id($link);
}

// DB 연관배열 => JSON 
function sql_to_json($obj) {
	$return_obj = array();
	
	while ($row=sql_fetch_array($obj)) {
		$return_obj[] = $row;
	}
	
    return $return_obj;
}

//UNIQUE CODE 생성
function get_code($table) {
	$codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($codeAlphabet);
	$code_true = false;
	
	while ($code_true == false) {
		$code = '';
		
		for ($i=0; $i < 10; $i++) {
			$code .= $codeAlphabet[random_int(0, $max-1)];
		}
		
		$cnt = table_count($table, " code = '$code' ");
		
		if ($cnt == 0) {
			$code_true = true;
			break;
		}
	}

	return $code;
}

//파일서버 파일 다운로드 후 프론트 파일 리턴
function get_profile_image($code) {
	$sql = " select idx, hash_name, download_path from files where code = '$code' and status = '1' ";
	$sql_result = sql_fetch($sql);
	
	if ($sql_result['idx']) {
		$file_path = $_SERVER['DOCUMENT_ROOT'].'/temp/'.$code;
		
		if (!file_exists($file_path)) {
			$file = fopen($file_path, 'w');
			
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
				CURLOPT_URL => $sql_result['download_path'],
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_BINARYTRANSFER => true,
				CURLOPT_TIMEOUT => 300,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSLVERSION => 4,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_HTTPHEADER => array(
					'cache-control: no-cache',
					'X-T-RISE-UP-api-key:'.APP_KEY
				)
			));
			
			$data = curl_exec($curl);
			$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);
			
			if ($http_code == 200) {
				fwrite($file, $data);
				fclose($file);
				
				$profile_image = '/temp/'.$code;
			}
		} else {
			$profile_image = '/temp/'.$code;
		}
	} else {
		$profile_image = '/temp/'.$code;
	}

	return $profile_image;
}



//파일서버 파일 다운로드 후 프론트 파일 리턴
function get_licence_image($code) {
	$sql = " select idx, hash_name, download_path, extension from files where code = '$code' and status = '1' ";
	$sql_result = sql_fetch($sql);
	
	if ($sql_result['idx']) {
		$file_path = $_SERVER['DOCUMENT_ROOT'].'/temp/LICENCE_IMAGE/';
		
		if(!is_dir($file_path)){
			mkdir($file_path);
		}
		
		$file_path .= $code.'.'.$sql_result['extension'];
		
		if (!file_exists($file_path)) {
			$file = fopen($file_path, 'w');
			
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
				CURLOPT_URL => $sql_result['download_path'],
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_BINARYTRANSFER => true,
				CURLOPT_TIMEOUT => 300,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_SSLVERSION => 4,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_HTTPHEADER => array(
					'cache-control: no-cache',
					'X-T-RISE-UP-api-key:'.APP_KEY
				)
			));
			
			$data = curl_exec($curl);
			$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);
			
			if ($http_code == 200) {
				fwrite($file, $data);
				fclose($file);
				
				$profile_image = '/temp/LICENCE_IMAGE/'.$code.'.'.$sql_result['extension'];
			}
		} else {
			$profile_image = '/temp/LICENCE_IMAGE/'.$code.'.'.$sql_result['extension'];
		}
	} else {
		$profile_image = '/temp/LICENCE_IMAGE/'.$code.'.'.$sql_result['extension'];
	}

	return $profile_image;
}

//프론트 파일 삭제
function delete_file($code) {
	$file_path = $_SERVER['DOCUMENT_ROOT'].'/temp/'.$code;
	
	if (file_exists($file_path)) {
		@unlink($file_path);
	}
}

//프론트 파일 삭제
function delete_licence_file($code) {
	$sql = " select extension from files where code = '$code' and status = '1' ";
	$sql_result = sql_fetch($sql);
	
	$file_path = $_SERVER['DOCUMENT_ROOT'].'/temp/LICENCE_IMAGE/'.$code.'.'.$sql_result['extension'];
	
	if (file_exists($file_path)) {
		@unlink($file_path);
	}
}

//차량 이미지 디렉토리 추출
function get_vehicle_directory_code() {
	$sql = " select code from directory where depth = '0' and name = 'CHAUFFEUR_SEREVICE_VEHICLE_IMAGES' and access_level = 'GUEST' ";
	$sql_result = sql_fetch($sql);

	return $sql_result['code'];
}

//거리 KM,마일 출력
function print_distance($distance, $type) {
	if ($type == 'Km') {
		return round($distance / 1000, 1);
	} else {
		return round($distance / 1609.344, 2);
	}
}

function thumbnail($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_crop=false, $crop_mode='center', $is_sharpen=false, $um_value='80/0.5/3') {

    if(!$thumb_width && !$thumb_height)
        return;

    $source_file = "$source_path/$filename";

    if(!is_file($source_file)) // 원본 파일이 없다면
        return;
    
        // 리사이징 관련 로직 비활성
    return basename($source_file);

    $size = @getimagesize($source_file);
    if($size[2] < 1 || $size[2] > 3) // gif, jpg, png 에 대해서만 적용
        return;

    if (!is_dir($target_path)) {
        @mkdir($target_path, 0755);
        @chmod($target_path, 0755);
    }

    // 디렉토리가 존재하지 않거나 쓰기 권한이 없으면 썸네일 생성하지 않음
    if(!(is_dir($target_path) && is_writable($target_path)))
        return '';

    // Animated GIF는 썸네일 생성하지 않음
    if($size[2] == 1) {
        if(is_animated_gif($source_file))
            return basename($source_file);
    }

    $thumb_filename = preg_replace("/\.[^\.]+$/i", "", $filename); // 확장자제거
    $thumb_file = "{$target_path}/{$filename}";

    // 원본파일의 GD 이미지 생성
    $src = null;
    $degree = 0;

    if ($size[2] == 1) {
        $src = @imagecreatefromgif($source_file);
        $src_transparency = @imagecolortransparent($src);
    } else if ($size[2] == 2) {
        $src = @imagecreatefromjpeg($source_file);

        if(function_exists('exif_read_data')) {
            // exif 정보를 기준으로 회전각도 구함
            $exif = @exif_read_data($source_file);
            if(!empty($exif['Orientation'])) {
                switch($exif['Orientation']) {
                    case 8:
                        $degree = 90;
                        break;
                    case 3:
                        $degree = 180;
                        break;
                    case 6:
                        $degree = -90;
                        break;
                }

                // 회전각도 있으면 이미지 회전
                if($degree) {
                    $src = imagerotate($src, $degree, 0);

                    // 세로사진의 경우 가로, 세로 값 바꿈
                    if($degree == 90 || $degree == -90) {
                        $tmp = $size;
                        $size[0] = $tmp[1];
                        $size[1] = $tmp[0];
                    }
                }
            }
        }
    } else if ($size[2] == 3) {
        $src = @imagecreatefrompng($source_file);
        @imagealphablending($src, true);
    } else {
        return;
    }

    if(!$src)
        return;

    $is_large = true;
    // width, height 설정

    if($thumb_width) {
        if(!$thumb_height) {
            $thumb_height = round(($thumb_width * $size[1]) / $size[0]);
        } else {
            if($size[0] < $thumb_width || $size[1] < $thumb_height)
                $is_large = false;
        }
    } else {
        if($thumb_height) {
            $thumb_width = round(($thumb_height * $size[0]) / $size[1]);
        }
    }

    $dst_x = 0;
    $dst_y = 0;
    $src_x = 0;
    $src_y = 0;
    $dst_w = $thumb_width;
    $dst_h = $thumb_height;
    $src_w = $size[0];
    $src_h = $size[1];

    $ratio = $dst_h / $dst_w;

    if($is_large) {
        // 크롭처리
        if($is_crop) {
            switch($crop_mode)
            {
                case 'center':
                    if($size[1] / $size[0] >= $ratio) {
                        $src_h = round($src_w * $ratio);
                        $src_y = round(($size[1] - $src_h) / 2);
                    } else {
                        $src_w = round($size[1] / $ratio);
                        $src_x = round(($size[0] - $src_w) / 2);
                    }
                    break;
                default:
                    if($size[1] / $size[0] >= $ratio) {
                        $src_h = round($src_w * $ratio);
                    } else {
                        $src_w = round($size[1] / $ratio);
                    }
                    break;
            }

            $dst = imagecreatetruecolor($dst_w, $dst_h);

            if($size[2] == 3) {
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
            } else if($size[2] == 1) {
                $palletsize = imagecolorstotal($src);
                if($src_transparency >= 0 && $src_transparency < $palletsize) {
                    $transparent_color   = imagecolorsforindex($src, $src_transparency);
                    $current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                    imagefill($dst, 0, 0, $current_transparent);
                    imagecolortransparent($dst, $current_transparent);
                }
            }
        } else { // 비율에 맞게 생성
            $dst = imagecreatetruecolor($dst_w, $dst_h);
            $bgcolor = imagecolorallocate($dst, 255, 255, 255); // 배경색

            if ( !((defined('G5_USE_THUMB_RATIO') && false === G5_USE_THUMB_RATIO) || (defined('G5_THEME_USE_THUMB_RATIO') && false === G5_THEME_USE_THUMB_RATIO)) ){
                if($src_w > $src_h) {
                    $tmp_h = round(($dst_w * $src_h) / $src_w);
                    $dst_y = round(($dst_h - $tmp_h) / 2);
                    $dst_h = $tmp_h;
                } else {
                    $tmp_w = round(($dst_h * $src_w) / $src_h);
                    $dst_x = round(($dst_w - $tmp_w) / 2);
                    $dst_w = $tmp_w;
                }
            }

            if($size[2] == 3) {
                $bgcolor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
                imagefill($dst, 0, 0, $bgcolor);
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
            } else if($size[2] == 1) {
                $palletsize = imagecolorstotal($src);
                if($src_transparency >= 0 && $src_transparency < $palletsize) {
                    $transparent_color   = imagecolorsforindex($src, $src_transparency);
                    $current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                    imagefill($dst, 0, 0, $current_transparent);
                    imagecolortransparent($dst, $current_transparent);
                } else {
                    imagefill($dst, 0, 0, $bgcolor);
                }
            } else {
                imagefill($dst, 0, 0, $bgcolor);
            }
        }
    } else {
        $dst = imagecreatetruecolor($dst_w, $dst_h);
        $bgcolor = imagecolorallocate($dst, 255, 255, 255); // 배경색

        if ( ((defined('G5_USE_THUMB_RATIO') && false === G5_USE_THUMB_RATIO) || (defined('G5_THEME_USE_THUMB_RATIO') && false === G5_THEME_USE_THUMB_RATIO)) ){
            //이미지 썸네일을 비율 유지하지 않습니다.  (5.2.6 버전 이하에서 처리된 부분과 같음)

            if($src_w < $dst_w) {
                if($src_h >= $dst_h) {
                    $dst_x = round(($dst_w - $src_w) / 2);
                    $src_h = $dst_h;
                    if( $dst_w > $src_w ){
                        $dst_w = $src_w;
                    }
                } else {
                    $dst_x = round(($dst_w - $src_w) / 2);
                    $dst_y = round(($dst_h - $src_h) / 2);
                    $dst_w = $src_w;
                    $dst_h = $src_h;
                }
            } else {
                if($src_h < $dst_h) {
                    $dst_y = round(($dst_h - $src_h) / 2);
                    $dst_h = $src_h;
                    $src_w = $dst_w;
                }
            }

        } else {
            //이미지 썸네일을 비율 유지하며 썸네일 생성합니다.
            if($src_w < $dst_w) {
                if($src_h >= $dst_h) {
                    if( $src_h > $src_w ){
                        $tmp_w = round(($dst_h * $src_w) / $src_h);
                        $dst_x = round(($dst_w - $tmp_w) / 2);
                        $dst_w = $tmp_w;
                    } else {
                        $dst_x = round(($dst_w - $src_w) / 2);
                        $src_h = $dst_h;
                        if( $dst_w > $src_w ){
                            $dst_w = $src_w;
                        }
                    }
                } else {
                    $dst_x = round(($dst_w - $src_w) / 2);
                    $dst_y = round(($dst_h - $src_h) / 2);
                    $dst_w = $src_w;
                    $dst_h = $src_h;
                }
            } else {
                if($src_h < $dst_h) {
                    if( $src_w > $dst_w ){
                        $tmp_h = round(($dst_w * $src_h) / $src_w);
                        $dst_y = round(($dst_h - $tmp_h) / 2);
                        $dst_h = $tmp_h;
                    } else {
                        $dst_y = round(($dst_h - $src_h) / 2);
                        $dst_h = $src_h;
                        $src_w = $dst_w;
                    }
                }
            }
        }

        if($size[2] == 3) {
            $bgcolor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
            imagefill($dst, 0, 0, $bgcolor);
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        } else if($size[2] == 1) {
            $palletsize = imagecolorstotal($src);
            if($src_transparency >= 0 && $src_transparency < $palletsize) {
                $transparent_color   = imagecolorsforindex($src, $src_transparency);
                $current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                imagefill($dst, 0, 0, $current_transparent);
                imagecolortransparent($dst, $current_transparent);
            } else {
                imagefill($dst, 0, 0, $bgcolor);
            }
        } else {
            imagefill($dst, 0, 0, $bgcolor);
        }
    }

    imagecopyresampled($dst, $src, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

    // sharpen 적용
    if($is_sharpen && $is_large) {
        $val = explode('/', $um_value);
        UnsharpMask($dst, $val[0], $val[1], $val[2]);
    }

    if($size[2] == 1) {
        imagegif($dst, $thumb_file);
    } else if($size[2] == 3) {
        if(!defined('G5_THUMB_PNG_COMPRESS'))
            $png_compress = 5;
        else
            $png_compress = G5_THUMB_PNG_COMPRESS;

        imagepng($dst, $thumb_file, $png_compress);
    } else {
        if(!defined('G5_THUMB_JPG_QUALITY'))
            $jpg_quality = 90;
        else
            $jpg_quality = G5_THUMB_JPG_QUALITY;

        imagejpeg($dst, $thumb_file, $jpg_quality);
    }

    chmod($thumb_file, 0755); // 추후 삭제를 위하여 파일모드 변경

    imagedestroy($src);
    imagedestroy($dst);

    return basename($thumb_file);
}

function UnsharpMask($img, $amount, $radius, $threshold)    {

/*
출처 : http://vikjavev.no/computing/ump.php
New:
- In version 2.1 (February 26 2007) Tom Bishop has done some important speed enhancements.
- From version 2 (July 17 2006) the script uses the imageconvolution function in PHP
version >= 5.1, which improves the performance considerably.


Unsharp masking is a traditional darkroom technique that has proven very suitable for
digital imaging. The principle of unsharp masking is to create a blurred copy of the image
and compare it to the underlying original. The difference in colour values
between the two images is greatest for the pixels near sharp edges. When this
difference is subtracted from the original image, the edges will be
accentuated.

The Amount parameter simply says how much of the effect you want. 100 is 'normal'.
Radius is the radius of the blurring circle of the mask. 'Threshold' is the least
difference in colour values that is allowed between the original and the mask. In practice
this means that low-contrast areas of the picture are left unrendered whereas edges
are treated normally. This is good for pictures of e.g. skin or blue skies.

Any suggenstions for improvement of the algorithm, expecially regarding the speed
and the roundoff errors in the Gaussian blur process, are welcome.

*/

////////////////////////////////////////////////////////////////////////////////////////////////
////
////                  Unsharp Mask for PHP - version 2.1.1
////
////    Unsharp mask algorithm by Torstein Hønsi 2003-07.
////             thoensi_at_netcom_dot_no.
////               Please leave this notice.
////
///////////////////////////////////////////////////////////////////////////////////////////////



    // $img is an image that is already created within php using
    // imgcreatetruecolor. No url! $img must be a truecolor image.

    // Attempt to calibrate the parameters to Photoshop:
    if ($amount > 500)    $amount = 500;
    $amount = $amount * 0.016;
    if ($radius > 50)    $radius = 50;
    $radius = $radius * 2;
    if ($threshold > 255)    $threshold = 255;

    $radius = abs(round($radius));     // Only integers make sense.
    if ($radius == 0) {
        return $img; imagedestroy($img);        }
    $w = imagesx($img); $h = imagesy($img);
    $imgCanvas = imagecreatetruecolor($w, $h);
    $imgBlur = imagecreatetruecolor($w, $h);


    // Gaussian blur matrix:
    //
    //    1    2    1
    //    2    4    2
    //    1    2    1
    //
    //////////////////////////////////////////////////


    if (function_exists('imageconvolution')) { // PHP >= 5.1
            $matrix = array(
            array( 1, 2, 1 ),
            array( 2, 4, 2 ),
            array( 1, 2, 1 )
        );
        $divisor = array_sum(array_map('array_sum', $matrix));
        $offset = 0;

        imagecopy ($imgBlur, $img, 0, 0, 0, 0, $w, $h);
        imageconvolution($imgBlur, $matrix, $divisor, $offset);
    }
    else {

    // Move copies of the image around one pixel at the time and merge them with weight
    // according to the matrix. The same matrix is simply repeated for higher radii.
        for ($i = 0; $i < $radius; $i++)    {
            imagecopy ($imgBlur, $img, 0, 0, 1, 0, $w - 1, $h); // left
            imagecopymerge ($imgBlur, $img, 1, 0, 0, 0, $w, $h, 50); // right
            imagecopymerge ($imgBlur, $img, 0, 0, 0, 0, $w, $h, 50); // center
            imagecopy ($imgCanvas, $imgBlur, 0, 0, 0, 0, $w, $h);

            imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 1, $w, $h - 1, 33.33333 ); // up
            imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 0, 0, $w, $h, 25); // down
        }
    }

    if($threshold>0){
        // Calculate the difference between the blurred pixels and the original
        // and set the pixels
        for ($x = 0; $x < $w-1; $x++)    { // each row
            for ($y = 0; $y < $h; $y++)    { // each pixel

                $rgbOrig = ImageColorAt($img, $x, $y);
                $rOrig = (($rgbOrig >> 16) & 0xFF);
                $gOrig = (($rgbOrig >> 8) & 0xFF);
                $bOrig = ($rgbOrig & 0xFF);

                $rgbBlur = ImageColorAt($imgBlur, $x, $y);

                $rBlur = (($rgbBlur >> 16) & 0xFF);
                $gBlur = (($rgbBlur >> 8) & 0xFF);
                $bBlur = ($rgbBlur & 0xFF);

                // When the masked pixels differ less from the original
                // than the threshold specifies, they are set to their original value.
                $rNew = (abs($rOrig - $rBlur) >= $threshold)
                    ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig))
                    : $rOrig;
                $gNew = (abs($gOrig - $gBlur) >= $threshold)
                    ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig))
                    : $gOrig;
                $bNew = (abs($bOrig - $bBlur) >= $threshold)
                    ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig))
                    : $bOrig;



                if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew)) {
                        $pixCol = ImageColorAllocate($img, $rNew, $gNew, $bNew);
                        ImageSetPixel($img, $x, $y, $pixCol);
                    }
            }
        }
    }
    else{
        for ($x = 0; $x < $w; $x++)    { // each row
            for ($y = 0; $y < $h; $y++)    { // each pixel
                $rgbOrig = ImageColorAt($img, $x, $y);
                $rOrig = (($rgbOrig >> 16) & 0xFF);
                $gOrig = (($rgbOrig >> 8) & 0xFF);
                $bOrig = ($rgbOrig & 0xFF);

                $rgbBlur = ImageColorAt($imgBlur, $x, $y);

                $rBlur = (($rgbBlur >> 16) & 0xFF);
                $gBlur = (($rgbBlur >> 8) & 0xFF);
                $bBlur = ($rgbBlur & 0xFF);

                $rNew = ($amount * ($rOrig - $rBlur)) + $rOrig;
                    if($rNew>255){$rNew=255;}
                    elseif($rNew<0){$rNew=0;}
                $gNew = ($amount * ($gOrig - $gBlur)) + $gOrig;
                    if($gNew>255){$gNew=255;}
                    elseif($gNew<0){$gNew=0;}
                $bNew = ($amount * ($bOrig - $bBlur)) + $bOrig;
                    if($bNew>255){$bNew=255;}
                    elseif($bNew<0){$bNew=0;}
                $rgbNew = ($rNew << 16) + ($gNew <<8) + $bNew;
                    ImageSetPixel($img, $x, $y, $rgbNew);
            }
        }
    }
    imagedestroy($imgCanvas);
    imagedestroy($imgBlur);

    return true;

}

function is_animated_gif($filename) {
    if(!($fh = @fopen($filename, 'rb')))
        return false;
    $count = 0;
    // 출처 : http://www.php.net/manual/en/function.imagecreatefromgif.php#104473
    // an animated gif contains multiple "frames", with each frame having a
    // header made up of:
    // * a static 4-byte sequence (\x00\x21\xF9\x04)
    // * 4 variable bytes
    // * a static 2-byte sequence (\x00\x2C) (some variants may use \x00\x21 ?)

    // We read through the file til we reach the end of the file, or we've found
    // at least 2 frame headers
    while(!feof($fh) && $count < 2) {
        $chunk = fread($fh, 1024 * 100); //read 100kb at a time
        $count += preg_match_all('#\x00\x21\xF9\x04.{4}\x00(\x2C|\x21)#s', $chunk, $matches);
   }

    fclose($fh);
    return $count > 1;
}

function add_hyphen($tel) {
    $tel = preg_replace("/[^0-9]/", "", $tel);    // 숫자 이외 제거
    if (substr($tel,0,2)=='02')
        return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $tel);
    else if (strlen($tel)=='8' && (substr($tel,0,2)=='15' || substr($tel,0,2)=='16' || substr($tel,0,2)=='18'))
        // 지능망 번호이면
        return preg_replace("/([0-9]{4})([0-9]{4})$/", "\\1-\\2", $tel);
    else
        return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $tel);
}
?>