<div class="menu-wrap">
	<div class="container">
		<button class="btn-ic ic-close"></button>
		<div class="user-profile">
			<img src="<?php echo $_SESSION['profile']?>" />
		</div>
		<p class="name"><strong><?php echo $_SESSION['name']?></strong><?php echo $_lc['TXT']['님']?></p>
		<ul class="menu">
			<li>
				<a href="field_list.php">
					<i class="ic-field-list"></i>
					<p><?php echo $_lc['TXT']['현장목록']?></p>
					<i class="ic-link black"></i>
				</a>
			</li>
			<li>
				<a href="profile_write_admin.php">
					<i class="ic-user"></i>
					<p><?php echo $_lc['TXT']['프로필']?></p>
					<i class="ic-link black"></i>
				</a>
			</li>
			<li>
				<a href="setting.php">
					<i class="ic-setting"></i>
					<p><?php echo $_lc['TXT']['설정']?></p>
					<i class="ic-link black"></i>
				</a>
			</li>
		</ul>
	</div>
</div>