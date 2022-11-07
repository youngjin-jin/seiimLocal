<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <h1 class="title"><?php echo $_lc['TXT']['설정']?></h1>
            <button class="btn-ic ic-menu"><?php echo $_lc['BTN']['메뉴']?></button>
        </div>
    </div>
</div>
<!-- // header -->

<?php include_once('_menu.php'); ?>

<!-- content -->
<div id="content">
    <div class="container">
        <div class="setting-wrap">
            <a href="sign_view.php" class="bx-link">
                <i class="ic-sign"></i>
                <p><?php echo $_lc['TXT']['서명관리']?></p>
            </a>

            <a href="https://pf.kakao.com/_rxmPWs/chat" class="bx-link">
                <i class="ic-enquiry"></i>
                <p><?php echo $_lc['TXT']['1:1문의']?></p>
            </a>
            <a href="javascript:logoutConfirm();" class="bx-link">
                <i class="ic-secession"></i>
                <p><?php echo $_lc['BTN']['로그아웃']?></p>
            </a>

            <a href="https://pf.kakao.com/_rxmPWs/chat" class="bx-link">
                <i class="ic-secession"></i>
                <p><?php echo $_lc['TXT']['회원탈퇴']?></p>
            </a>
        </div>
    </div>
</div>
<!-- // content -->



<script>
    function logoutConfirm()
    {
        if(confirm("로그아웃 하시겠습니까?"))
        {
            location.href="logout.php";
        }
    }
</script>
<?php include_once('_tail.php'); ?>