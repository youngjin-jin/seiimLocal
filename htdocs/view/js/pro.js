//페이징
function paging(write_pages, cur_page, total_page, function_name) {
	var str = '';
	
    if (cur_page > 1) {
        str += '<li class="front"><a href="javascript:'+function_name+'(1);">맨 앞으로</a></li>';
    }

    start_page = ( ( parseInt( (cur_page - 1 ) / write_pages ) ) * write_pages ) + 1;
    end_page = start_page + write_pages - 1;

    if (end_page >= total_page) end_page = total_page;

    if (start_page > 1) {
		str += '<li class="prev"><a href="javascript:'+function_name+'('+(start_page-1)+');">앞으로</a></li>';
	}

    if (total_page > 1) {
        for (k=start_page;k<=end_page;k++) {
            if (cur_page != k)
				str += '<li class="on"><a href="javascript:'+function_name+'('+k+');">'+k+'</li>';
            else
				str += '<li><a href="javascript:'+function_name+'('+k+');">'+k+'</li>';
        }
    }

    if (total_page > end_page) {
		str += '<li class="next"><a href="javascript:'+function_name+'('+(end_page+1)+');">뒤로</a></li>';
	}

    if (cur_page < total_page) {
		str += '<li class="back"><a href="javascript:'+function_name+'('+total_page+');">맨 뒤로</a></li>';
    }
	
	if (str) return '<ul>'+str+'</ul>'; else return '';
}

//페이징
function paging2(cur_page, total_page, function_name) {
	var str = '';

    if (cur_page > 1) {
		str += '<button class="btn-ic btn-prev" onclick="'+function_name+'('+(cur_page-1)+');">이전</button>';
	} else {
		str += '<button class="btn-ic btn-prev" disabled>이전</button>';
	}

    str += '<p class="page">'+cur_page+'/'+total_page+'</p>';

    if (cur_page < total_page) {
		str += '<button class="btn-ic btn-next" onclick="'+function_name+'('+(cur_page+1)+');">다음</button>';
    } else {
		str += '<button class="btn-ic btn-next" disabled>다음</button>';
	}
	
	return str;
}

//replaceAll prototype 선언
String.prototype.replaceAll = function(org, dest) {
    return this.split(org).join(dest);
}

//특수문자+영문+숫자 조합
function validatePassword(character) {
    return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}$/.test(character)
}

//영문자와 숫자 그리고 _ 검사
function check_wrestAlNum_(value){
   if (!value) return false;

   var pattern = /(^[a-zA-Z0-9\_]+$)/;

   if (!pattern.test(value)) {
       return false;
   } else {
	   return true;
   }
}

//한글체크
function is_hangul(value) {
	var regexp = /[a-z0-9]|[ \[\]{}()<>?|`~!@#$%^&*-_+=,.;:\"'\\]/g;
	
	if (regexp.test(value)) {
   		return false
   	} else {
    	return true
   	}
}

//날자출력
Date.prototype.yyyymmdd = function(){
    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth() + 1).toString();
    var dd = this.getDate().toString();
    return yyyy + '-' + (mm[1] ? mm : '0'+mm[0]) + '-' + (dd[1] ? dd : '0'+dd[0]);
};

//요일출력
function getyoil(date) {
    var week = new Array('일', '월', '화', '수', '목', '금', '토');
    var tday = new Date(date);
    var tLabel = week[tday.getDay()];
    
    return tLabel;
}

//일수/시간계산
function date_diff(d1, d2, type) {
	var date1 = new Date(d1);
	var date2 = new Date(d2);
	
	var diff = date1 - date2;
	
	if (type == 'day') {
		var result = diff / (24 * 60 * 60 * 1000);// 시 * 분 * 초 * 밀리세컨
	} else {
		var result = diff / (60 * 60 * 1000);// 시 * 분 * 초 * 밀리세컨
	}
	
	return result;
}

//시분초 출력
function hms(val) {
	var hours   = Math.floor(val / 3600);
    var minutes = Math.floor((val - (hours * 3600)) / 60);
    var seconds = val - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = '0'+hours;}
    if (minutes < 10) {minutes = '0'+minutes;}
    if (seconds < 10) {seconds = '0'+seconds;}
    return hours+':'+minutes+':'+seconds;
}

//줄바꿈
function nl2br(str){  
    return str.replace(/\n/g, "<br />");  
}

//Attribute 출력 function
function showAttribute(obj, view_type){
	try{
		var data = '';
		
		for (var attr in obj) {
			if (typeof(obj[attr]) == 'string' || typeof(obj[attr]) == 'number') {
				data = data + 'Attr Name : ' + attr + ', 		Value : ' + obj[attr] + ',		 Type : ' + typeof(obj[attr]) + '\n';
			} else {
				data = data + 'Attr Name : ' + attr + ', 		Type : ' + typeof(obj[attr]) + '\n';
			}
		}
		
		if(view_type == 'alert') {
			alert(data);
		} else {
			$("body").append("<textarea style='width:100%;height:200px;'>" + data + "</textarea>");
		}
	} catch(e) {
		alert(e.message);	
	}
}

//천단위 콤마
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

//바이트 체크
function byteCheck(imsi){
    var codeByte = 0;
    for (var idx = 0; idx < imsi.length; idx++) {
        var oneChar = escape(imsi.charAt(idx));
        if ( oneChar.length == 1 ) {
            codeByte ++;
        } else if (oneChar.indexOf("%u") != -1) {
            codeByte += 2;
        } else if (oneChar.indexOf("%") != -1) {
            codeByte ++;
        }
    }
    return codeByte;
}

//전화번호 000-0000-0000 체크함수
function autoHypenPhone(str){
	str = str.replace(/[^0-9]/g, '');
	var tmp = '';
	if (str.length < 4) {
		return str;
	} else if (str.length < 7) {
		tmp += str.substr(0, 3);
		tmp += '-';
		tmp += str.substr(3);
		return tmp;
	} else if (str.length < 11) {
		tmp += str.substr(0, 3);
		tmp += '-';
		tmp += str.substr(3, 3);
		tmp += '-';
		tmp += str.substr(6);
		return tmp;
	} else {              
		tmp += str.substr(0, 3);
		tmp += '-';
		tmp += str.substr(3, 4);
		tmp += '-';
		tmp += str.substr(7);
		return tmp;
	}
	return str;
}

//숫자만 입력
$(document).on('keyup', '.number', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
});

//전화번호 이벤트
$(document).on('keyup', '.phone', function() {
	var _val = $(this).val();
	$(this).val(autoHypenPhone(_val));
});

//사업자번호 이벤트
$(document).on('keyup', '.num', function() {
	var _val = $(this).val();
	$(this).val(autoHypenBusinessNumber(_val));
});

//숫자만 입력 천단위 ,
$(document).on('keyup', '.money', function() {
    $(this).val(numberWithCommas($(this).val().replace(/[^0-9]/g, '')));
});

//숫자만 입력 천단위 ,
$(document).on('keyup', '.money2', function() {
	var imsi = numberWithCommas($(this).val().replace(/[^\.0-9]/g, ''));	
	var imsi_array = imsi.split('.');	
	if (imsi_array[1]) $(this).val(imsi_array[0]+'.'+imsi_array[1].substr(0, 2)); else $(this).val(imsi);
});

//달력
$(document).on('click', '.date', function() {
	var target = $(this).attr('target');
	$('#date_target').val(target);
	
	$('.datepicker').datepicker({
        changeYear: true,
        changeMonth: true,
        showMonthAfterYear:true,
        monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
		format: 'YYYY-MM-DD'
	});
	
	popCloseAndDim('addFilter', true);
	popOpenAndDim('viewCalendar', true);
});

//거리 KM,마일 출력
function print_distance(distance, type) {
	if (type == 'Km') {
		return Math.round(distance / 1000, 1);
	} else {
		return Math.round(distance / 1609.344, 2);
	}
}

$(document).on("show.bs.modal", ".modal", function (event) {
  var zIndex = 1040 + 10 * $(".modal:visible").length;
  $(this).css("z-index", zIndex);
  setTimeout(function () {
    $(".modal-backdrop")
      .not(".modal-stack")
      .css("z-index", zIndex - 1)
      .addClass("modal-stack");
  }, 0);
});

var isEmpty = function (value) {
	if (value == "" || value == null || value == "null" || value == undefined || (value != null && typeof value == "object" && !Object.keys(value).length)) {
		return true;
	} else {
		return false;
	}
};

//쿠키생성
function setCookie(cookieName, cookieValue, cookieExpire, cookiePath, cookieDomain, cookieSecure){
	var expire = new Date();
	expire.setDate(expire.getDate() + cookieExpire);
    var cookieText = escape(cookieName) + '=' + escape(cookieValue);
    cookieText += (cookieExpire ? '; EXPIRES=' + expire.toGMTString() : '');
    cookieText += (cookiePath ? '; PATH=' + cookiePath : '');
    cookieText += (cookieDomain ? '; DOMAIN=' + cookieDomain : '');
    cookieText += (cookieSecure ? '; SECURE' : '');
    document.cookie = cookieText;
}
 
//쿠키값 얻기
function getCookie(cookieName){
    var cookieValue = null;
    if(document.cookie){
        var array = document.cookie.split((escape(cookieName) + '='));
        if(array.length >= 2){
            var arraySub = array[1].split(';');
            cookieValue = unescape(arraySub[0]);
        }
    }
    return cookieValue;
}
 
//쿠키삭제
function deleteCookie(cookieName){
    var temp = getCookie(cookieName);
    if(temp){
        setCookie(cookieName, temp, (new Date(1)));
    }
}

function run_progress() {
	$('html').oLoader();
}

function stop_progress() {
	$('html').oLoader('hide');
}

//팝업 닫기 이벤트
$(document).on('click', '.dim', function() {
	if (typeof(quill) !== 'undefined') quill.container.firstChild.innerHTML = '';
	$('.menu-wrap').removeClass('on');
	$('.popup').removeClass('on');
    dimRemove();
});

//팝업 닫기 이벤트
$(document).keyup(function(e) {
	if (e.keyCode == 27) {
		if (typeof(quill) !== 'undefined') quill.container.firstChild.innerHTML = '';
		$('.menu-wrap').removeClass('on');
		$('.popup').removeClass('on');
		dimRemove();
	}
});

//로그아웃 이벤트
$(document).on('click', '#log_out_btn', function() {
	if (confirm(_lc["confirm"]["로그아웃"])) {
		run_progress();
		
		$.ajax({
			type: 'POST',
			url: '/controller/login.php',
			dataType: 'json',
			cache: false,
			data: { 'module' : 'logout' },
			success: function (response) {
				stop_progress();
				console.log(response);
				
				if (response.result) {
					location.href = response.url;
				} else {
					alert(response.msg);
				}
			},
			error: function (request, status, error) {
				stop_progress();
				alert(request+' '+status+' '+error);
			}
		});
	}
});

function auto_log_out() {
	location.href = '/logout2.php';
}

function change_language(language) {
	run_progress();
	
	$.ajax({
		type: 'POST',
		url: '/controller/login.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'change_language', 'language': language },
		success: function (response) {
			stop_progress();
			//console.log(response);
			
			if (response.result) {
				locale = language;
				location.reload();
			} else {
				$('#language_ul li').removeClass('on');
				alert(response.msg);
				change_language('kr');
			}
		},
		error: function (request, status, error) {
			stop_progress();
			alert(request+' '+status+' '+error);
		}
	});
}

$(document).ready(function () {
	$('h1').click(function () {
		window.location = '/'
 })
	console.log(locale, DEVICE, getCookie('member_type'));
});