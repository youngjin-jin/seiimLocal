<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

    <!-- content -->
    <div id="content p0">
        <div class="login-wrap">
            <div class="inner">
                <h1 class="logo"><?php echo TITLE?></h1>
                <div class="login-form">
					<form id="login_form" method="post">
						<p class="title"><?php echo $_lc['TXT']['안전솔루션']?></p>
						<div class="inp-wrap mb10">
							<div class="inp-item"><input type="text" id="user_id" placeholder="<?php echo $_lc['placeholder']['아이디']?>" autocomplete="off" minlength="4" maxlength="20" required></div>
						</div>
						<div class="inp-wrap mb10">
							<div class="inp-item"><input type="password" id="user_password" placeholder="<?php echo $_lc['placeholder']['비밀번호']?>" autocomplete="off" minlength="4" maxlength="30" required></div>
						</div>
						<button type="submit" class="btn md bg-navy txt-white has-ic fx-full m0 mb20"><i class="ic-login"></i><?php echo $_lc['BTN']['로그인']?></button>
						<div class="account-wrap">
							<a href="/view/admin/mobile/html/find_account_id.php"><i class="ic-acc-find"></i><?php echo $_lc['TXT']['ID/비밀번호찾기']?></a>
							<!--a href="/view/admin/<?php echo $device?>/html/writing_management.php"><i class="ic-join"></i><?php echo $_lc['TXT']['회원가입']?></a-->
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->
	
<?php
include_once('_tail.php');
?>