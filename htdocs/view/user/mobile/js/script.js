$(document).ready(function(){
    dropDown();
    openMenu();
    closeMenu();

    /* 배경 클릭시 닫기 */
    $(document).mouseup(function (e) {
        var dropDownClose = $('.drop-down .drop-list ul li a');
        var popImgOption = $('#imgOption');

        if (!dropDownClose.is(e.target) && dropDownClose.has(e.target).length === 0){
			$('.drop-down').removeClass('on');
		};

        if(popImgOption.length && popImgOption.hasClass('on')){
            if (!popImgOption.is(e.target) && popImgOption.has(e.target).length === 0){
                popImgOption.removeClass('on');
                dimRemove()
            };
        }
    });
    /* // 배경 클릭시 닫기 */

    $('.list-wrap.v3 li').click(function(){
        $('.list-wrap.v3 li').removeClass('on');
        $(this).addClass('on');
    })
});

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

    /* 20210831 수정 */
    if($("#" + id).height() > $(window).height()){
        $("#" + id).children('.pop-cont').css({
            'overflow': 'auto',
            'max-height': $(window).height() -  $("#" + id).children('.pop-header').outerHeight() - $("#" + id).children('.pop-footer').outerHeight() - 50
        });
    }
    /* // 20210831 수정 */
}

// 팝업닫기
function popClose(id) {
    var id;

    $("#" + id).removeClass('on');
}

// dim 옵션 팝업 열기
function popOpenAndDim(id, isDim){
    popOpen(id);
    
    if(isDim == true){
        dimMaker();
    }
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

// 탭 클릭시 컨텐츠 보여지기
function tab(){
    $('.tab-wrap .tab-btn-wrap .tab-btn').click(function(){
        $(this).addClass('on');
        $(this).siblings().removeClass('on');
    
        var tab = $(this).children().attr('data-tab');

        if(tab > 0){
            
            $(this).closest(".tab-wrap").children('.tab-cont-wrap').children(".tab-content[data-tab='"+ tab + "']").show();
            $(this).closest(".tab-wrap").children('.tab-cont-wrap').children(".tab-content[data-tab='"+ tab + "']").not().siblings('.tab-content').hide();
        }
    });    
    onToggle();
}

function toggleBtn(target){
    var target;

    $('.' + target).toggle();
}

function onToggle(){
    $('[onclick]').click(function(){
        $(this).toggleClass('on');
    })
    
}

// drop down
function dropDown(){
    $('.drop-down .btn-txt').click(function(){
        $(this).closest('.drop-down').addClass('on');
    });

    $('.drop-down .drop-list ul li a').click(function(){
        var choiceLang = $(this).text();

        $(this).closest('li').addClass('on');
        $(this).closest('li').siblings('li').removeClass('on');
        $(this).closest('.drop-down').removeClass('on');
        $(this).closest('.drop-list').siblings('.btn-txt').html('<i class="ic-drop-down"></i>' + choiceLang);
    })
}

// menu open
function openMenu(){
    $('#header .ic-menu').click(function(){
        $('.menu-wrap').addClass('on');

        dimMaker();
    });
}

// menu close
function closeMenu(){
    $('.menu-wrap .ic-close').click(function(){
        $('.menu-wrap').removeClass('on');

        dimRemove();
    });
}