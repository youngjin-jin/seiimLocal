<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<style>
#sign_p1 { margin-bottom:40px; }
#signature { width:100%; border:1px solid #CED4DA; background:#ffffff; }
#sign_p2 { position:absolute; left:50%; top:50%; transform:translate(-50%, -50%); color:#CED4DA; font-size:18px; font-weight:700; margin-top:70px; }
</style>

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
            <h1 class="title"><?php echo $_lc['TXT']['서명관리']?></h1>
        </div>
    </div>
</div>
<!-- // header -->

<div id="sign_view_div">
    <!-- content -->
    <div id="content">
        <div class="container mt20">
            <div class="sign-wrap pt0">
                <p class="tit v2">서명 이미지</p>
                <div class="sign-area mt10 disabled">
                    <img id="sign_img" src="../img/@temp_sign.png" style="display:none;">
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button id="update_btn" class="btn lg has-ic bg-navy"><i class="ic-edit white"></i><?php echo $_lc['BTN']['수정']?></button>
            </div>
        </div>
    </div>
    <!-- // header -->
</div>

<div id="sign_update_div" style="display:none;">
    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="sign-wrap">
                <p id="sign_p1" class="tit v1 mb20"><?php echo $_lc['TXT']['서명패드에서명을진행해주세요']?></p>
                <canvas id="signature"></canvas>
                <p id="sign_p2"><?php echo $_lc['TXT']['서명란']?></p>
            </div>
        </div>
    </div>
    <!-- // content -->

    <!-- fixed -->
    <div id="fixed">
        <div class="inner">
            <div class="btn-wrap">
                <button id="reset_btn" class="btn lg has-ic bg-gray"><i class="ic-reset"></i><?php echo $_lc['BTN']['초기화']?></button>
                <button id="save_btn" class="btn lg has-ic bg-navy"><i class="ic-submit"></i><?php echo $_lc['BTN']['완료']?></button>
            </div>
        </div>
    </div>
    <!-- // header -->
</div>

<?php include_once('_tail.php'); ?>