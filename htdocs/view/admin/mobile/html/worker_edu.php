<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">
<link href="/view/css/monokai-sublime.css" rel="stylesheet">


<input type='hidden' id='siteId' value='<?php echo clean_xss_tags($_GET['key'])?>'>

<!-- header -->
<div id="header">
        <div class="inner">
            <div class="container">
                <button class="btn-ic ic-back" id='back_btn'>뒤로가기</button>
                <h1 class="title">근로자 교육이력</h1>
            </div>
        </div>
    </div>
    <!-- // header -->
  
    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="worker-wrap">
                <p class="tit v3"><?php echo $_GET['site_name']; ?></p>
                <dl class="field-code mt4">
                    <dt>현장코드</dt>
                    <dd><?php echo $_GET['key']; ?></dd>
                </dl>
                <div class="tbl-wrap v1 mt15">
                    <table>
                        <colgroup>
                            <col style="width: 80px;">
                            <col style="width: auto;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>근로자수</th>
                                <td id='peopleCnt'></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inp-wrap search mt15">
                    <div class="inp-item">
                        <input type="text" name="searchInput" id="searchInput" placeholder="근로자명을 입력해 주세요.">
                    </div>
                    <button class="btn-ic ic-search"></button>
                </div>
                <ul class="img-list v2 mt20" id='list'>
                    

                    
                </ul>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed" style="display: none;">
        <div class="inner">
            <div class="btn-wrap">
                <button class="btn lg has-ic bg-navy"><i class="ic-qr-min"></i>건설근로자 프로필 QR 스캔</button>
            </div>
        </div>
    </div>
    <!-- // fixed -->

<input type="file" id="upload_file" accept="image/*" multiple="true" style="display:none;" />

<!-- popup - 이미지 옵션 -->
<div class="popup" id="megascopeProfile">
	<div class="pop-cont">
		<img src="../img/@temp_id_card.png" id="detail_img">
		<button class="btn-txt has-ic txt-white" onclick="popCloseAndDim('megascopeProfile', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<!-- popup - 이미지 옵션 -->
<div class="popup" id="imgOption">
	<div class="pop-cont">
		<button class="btn lg rnd has-ic bg-white txt-navy" id="detail_img_btn"><i class="ic-megascope"></i>자세히 보기</button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="down_btn"><i class="ic-download"></i>다운로드</button>
		<button class="btn lg rnd has-ic bg-white txt-navy mt10" id="delete_img_btn"><i class="ic-delete"></i>삭제</button>
	</div>
</div>
<!-- // popup - 이미지 옵션 -->

<!-- popup(alert) - 삭제 -->
<div class="popup" id="checkDelete">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-question"></i>
				<p class="mt10">삭제하시겠습니까?</p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="del_run_btn"><i class="ic-submit"></i>삭제</button>
			<button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('checkDelete', true)"><i class="ic-close"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 삭제 -->

<?php include_once('_tail.php'); ?>