<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<div class="login">
	
	<form id="login_form" method="post" style="width:100%;">
		<div class="login-form">
			<h1 class="logo"><?php echo TITLE?></h1>
			
			<p class="title"><?php echo $_lc['TXT']['안전솔루션']?></p>
			
			<div class="inp-wrap">
				<div class="inp-item id">
					<input type="text" id="user_id" placeholder="<?php echo $_lc['placeholder']['아이디']?>" autocomplete="off" minlength="4" maxlength="20" required>
				</div>
			</div>
			
			<div class="inp-wrap mt12">
				<div class="inp-item pw">
					<input type="password" id="user_password" placeholder="<?php echo $_lc['placeholder']['비밀번호']?>" autocomplete="off" minlength="4" maxlength="30" required>
				</div>
			</div>
			
			<button type="submit" class="btn md rnd has-ic bg-navy mt40"><i class="ic-login"></i><?php echo $_lc['BTN']['로그인']?></button>
			
			<div class="btn-wrap fx jc-c mt20">
				<a href="/view/user/<?php echo $device?>/html/find_account_id.php" class="btn-txt has-ic" style="text-align:center;"><i class="ic-find-account"></i><?php echo $_lc['TXT']['ID/비밀번호찾기']?></a>
				<a href="/view/user/<?php echo $device?>/html/join.php" class="btn-txt has-ic" style="text-align:center;"><i class="ic-join"></i><?php echo $_lc['TXT']['회원가입']?></a>
			</div>
		</div>
	</form>
	
	<div class="drop-down top">
		<button class="btn-txt has-ic"><i class="ic-drop-down"></i><span id="language_name_span"><?php echo $locale_name?><span></button>
		<div class="drop-list">
			<ul id="language_ul">
				<li id="kr_btn" <?php echo ($_COOKIE['locale'] == 'kr')?'class="on"':''?>><a href="javascript:change_language('kr');">한국어</a></li>
				<li id="en_btn" <?php echo ($_COOKIE['locale'] == 'en')?'class="on"':''?>><a href="javascript:change_language('en');">English</a></li>
				<li id="ch_btn" <?php echo ($_COOKIE['locale'] == 'ch')?'class="on"':''?>><a href="javascript:change_language('ch');">Chinese</a></li>
				<li id="vn_btn" <?php echo ($_COOKIE['locale'] == 'vn')?'class="on"':''?>><a href="javascript:change_language('vn');">Vietnamese</a></li>
			</ul>
		</div>
	</div>
	
</div>

<?php include_once('_tail.php'); ?>



