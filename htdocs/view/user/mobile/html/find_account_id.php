<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
			<h1 class="title"><?php echo $_lc['TXT']['ID찾기']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="find-account">
			<p class="tit v2 mb6"><?php echo $_lc['TXT']['가입시입력한연락처']?></p>
			<div class="inp-wrap has-btn">
				<div class="inp-item">
					<input type="text" id="phone" class="phone" placeholder="<?php echo $_lc['placeholder']['연락처를입력해주세요']?>" autocomplete="off" minlength="13" maxlength="13">
				</div>
				<button id="request_code_btn" class="btn md rnd bg-white line-gray txt-gray"><?php echo $_lc['BTN']['인증번호']?></button>
			</div>
			<p class="tit v2 mb6 mt20"><?php echo $_lc['TXT']['인증번호입력']?></p>
			<div class="inp-wrap has-btn">
				<div class="inp-item">
					<input type="text" id="code" class="number" placeholder="<?php echo $_lc['placeholder']['인증번호를입력해주세요']?>" autocomplete="off" minlength="6" maxlength="6">
				</div>
				<button id="check_code_btn" class="btn md rnd bg-white line-gray txt-gray"><?php echo $_lc['BTN']['확인']?></button>
			</div>
			<!-- 인증후 -->
			<div id="result_div" style="display:none;">
				<p class="tit v1 mt60"><?php echo $_lc['TXT']['해당연락처로가입한계정은아래와같습니다']?></p>
				<div class="find-result mt20">
					<table>
						<colgroup>
							<col style="width: 50%">
							<col style="width: 50%">
						</colgroup>
						<thead>
							<tr>
								<th><?php echo $_lc['TXT']['가입된ID']?></th>
								<th><?php echo $_lc['TXT']['회원유형']?></th>
							</tr>
						</thead>
						<tbody id="result_tbody">
							<!--tr>
								<td>ABCDEFG</td>
								<td>근로자</td>
							</tr>
							<tr>
								<td>ABCDEFG</td>
								<td>근로자</td>
							</tr-->
						</tbody>
					</table>
				</div>
			</div>
			<!-- // 인증후 -->
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button id="find_password_btn" class="btn lg has-ic bg-navy"><i class="ic-find"></i><?php echo $_lc['BTN']['비밀번호찾기']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<?php include_once('_tail.php'); ?>