$(document).ready(function(){
    /* 20210819 수정 */
    /* lnb on일 시 아이콘 이미지 변경 */
    $('.lnb-wrap .lnb-content > ul > li').each(function(){
        var thisBg = $(this).find('i').css("background-image");

        if($(this).hasClass('on') && (thisBg.indexOf('_on') == -1)){
    
            thisBg = thisBg.replace(".png","_on.png");
            $(this).find('i').css("background-image", thisBg);
        }
    })
    
    /* lnb hover시 아이콘 이미지 변경 */
    $('.lnb-wrap .lnb-content > ul > li').hover(function(){
        var thisBg = $(this).find('i').css("background-image");

        if((thisBg.indexOf('_on') == -1)){
            thisBg = thisBg.replace(".png","_on.png");
            $(this).find('i').css("background-image", thisBg);
        }
    }, function(){
        var thisBg = $(this).find('i').css("background-image");
        
        if((thisBg.indexOf('_on') !== -1) && ($(this).hasClass('on') == false)){
            thisBg = thisBg.replace("_on.png",".png");
            $(this).find('i').css("background-image", thisBg);
        }
    });
    /* // 20210819 수정 */

    /* 20210815 수정 */
    /* 달력 */
    $( ".datepicker" ).datepicker({
        changeYear: true,
        changeMonth: true,
        showMonthAfterYear:true,
        monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'],
        dayNamesMin: ['일','월','화','수','목','금','토']
    });
    
    /* tooltip */
    $('.ic-tooltip').tooltip({
        position: {
            my: "center bottom-8",
            at: "center top",
        },
        content: function(callback) {
            callback($(this).prop('title'));
        }
    });
    /* // 20210815 수정 */

    /* 20210819 수정 */
    /* 이미지 선택시 */
    $('.img-list.v1 ul li .inp-wrap input').click(function(){
        if($(this).is(":checked")==true){
            $(this).closest('li').addClass('on');
        } else{
            $(this).closest('li').removeClass('on');
        }
    });

    /* 이미지 뷰 슬라이드 */
    var imgViewSmall = new Swiper(".img-view .view-small", {
        spaceBetween: 10,
        slidesPerView: 4,
        // freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var imgViewBig = new Swiper(".img-view .view-big", {
        spaceBetween: 10,
        thumbs: {
            swiper: imgViewSmall,
        },
    });
    /* // 20210819 수정 */
});

/* 20210815 수정 */
// dim 생성
function dimMaker() {
    if($('body').find('.dim').length > 0){
        return;
    }
    $('body').append('<div class="dim"></div>');
    bodyHidden();
}

// dim 제거
function dimRemove() {
    $('.dim').remove();
    bodyAuto();
}

// body scroll hidden
function bodyHidden() {
    $('body').css('overflow', 'hidden');
}

// body scroll auto
function bodyAuto() {
    $('body').css('overflow', '')
}

// 팝업열기
function popOpen(id){
    var id;

    $("#" + id).addClass('on');
}

// 팝업닫기
function popClose(id) {
    var id;

    $("#" + id).removeClass('on');
    dimRemove();
}

/* 20210831 수정 */
// dim 옵션 팝업 열기
function popCloseAndDim(id, isDim){
    popClose(id);
    
    if(isDim == true){
        dimRemove();
    }
}
/* // 20210831 수정 */

// dim 옵션 팝업 열기
function popOpenAndDim(id, isDim){
    popOpen(id);
    
    if(isDim == true){
        dimMaker();
    }
}
/* // 20210815 수정 */