<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
			<h1 class="title"><?php echo $_lc['TXT']['관계사목록']?></h1>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="relative-wrap">
			<p class="tit v3 site_name"></p>
			<dl class="relative-code mt4">
				<dt><?php echo $_lc['TXT']['현장코드']?></dt>
				<dd><?php echo $_GET['key']?></dd>
			</dl>
			<div class="tbl-wrap v1 mt15">
				<table>
					<colgroup>
						<col style="width: 76px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<tr>
							<th><?php echo $_lc['TXT']['발주처']?></th>
							<td class="owner"></td>
						</tr>
						<tr>
							<th><?php echo $_lc['TXT']['시공사']?></th>
							<td class="contractor"></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="inp-wrap search mt15">
				<div class="inp-item">
					<input type='text' id='searchInput' value="" />
				</div>
				<button class="btn-ic ic-search"></button>
			</div>

			<ul id="ul_list" class="list-wrap v3 mt40">


				<!--li>
					<p class="category bg-green">협력사</p>
					<p class="tit">협력사명협력사명협력사명협력사명</p>
				</li>
				<li>
					<p class="category bg-orange">협력사</p>
					<p class="tit">협력사명협력사명협력사명협력사명</p>
				</li-->
			</ul>
		</div>
	</div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
	<div class="inner">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="add_btn"><i class="ic-submit"></i><?php echo $_lc['BTN']['소속설정']?></button>
		</div>
	</div>
</div>
<!-- // header -->

<!-- popup(alert) - 중복 -->
<div class="popup" id="empty_company">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i><!-- 20210831 수정 -->
				
				<p class="mt20"><?php echo $_lc['TXT']['소속업체를선택하세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('empty_company', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 중복 -->

<!-- popup - 협력사 추가 -->
<div class="popup" id="addRelative">
	<div class="pop-cont">
		<div class="container pb50 pt20">
			<dl class="relative-code mb4">
				<dt><?php echo $_lc['TXT']['현장코드']?></dt>
				<dd><?php echo $_GET['key']?></dd>
			</dl>
			<p class="tit v3 site_name"></p>
			<div class="tbl-wrap v1 mt20">
				<table>
					<colgroup>
						<col style="width: 76px;">
						<col style="width: auto;">
					</colgroup>
					<tbody>
						<tr>
							<th><?php echo $_lc['TXT']['발주처']?></th>
							<td class="owner"></td>
						</tr>
						<tr>
							<th><?php echo $_lc['TXT']['시공사']?></th>
							<td class="contractor"></td>
						</tr>
						<tr>
							<th><?php echo $_lc['BTN']['소속업체']?></th>
							<td class="company"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr class="mt20 mb40">
			<p class="tit v4 txt-navy"><?php echo $_lc['TXT']['현장을추가하시겠습니까']?></p>
			<div class="inp-wrap jc-c mt20">
				<div class="inp-item fx-none">
					<label for="agree"><input type="checkbox" name="agree" id="agree" value="1"><p class="txt"><?php echo $_lc['TXT']['안전교육이수정보를제출합니다필수']?></p></label>
					<input type="hidden" id="siteId" value="<?php echo $_GET['key']?>" />
					<input type="hidden" id="comId" value="" />
				</div>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="add_run_btn"><i class="ic-submit"></i><?php echo $_lc['BTN']['추가']?></button>
			<button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('addRelative', true)"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup - 협력사 추가 -->

<!-- popup(alert) - 동의 체크 -->
<div class="popup" id="checkAgreement">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i><!-- 20210831 수정 -->
				
				<p class="mt20"><?php echo $_lc['TXT']['안전교육이수정보제출에동의해주세요']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="popCloseAndDim('checkAgreement', true);popOpenAndDim('addRelative', true);"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 동의 체크 -->

<!-- popup(alert) - 중복 -->
<div class="popup" id="guideOverlap">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i><!-- 20210831 수정 -->
				
				<p class="mt20"><?php echo $_lc['TXT']['이미등록된현장입니다']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="history.back();"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 중복 -->

<!-- popup(alert) - 종료 -->
<div class="popup" id="guideFinish">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-alarm"></i><!-- 20210831 수정 -->
				
				<p class="mt20"><?php echo $_lc['TXT']['종료된현장입니다']?></p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" onclick="history.back();"><i class="ic-close"></i><?php echo $_lc['BTN']['닫기']?></button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 종료 -->

<?php include_once('_tail.php'); ?>