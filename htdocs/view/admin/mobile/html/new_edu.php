<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<link href="/view/css/quill.snow.css" rel="stylesheet">
<link href="/view/css/monokai-sublime.css" rel="stylesheet">

<style>
	.popup{ border: 0; border-radius: 0; border-top: 4px solid #08B39A; z-index: 99; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #ffffff; display: none; }
	.popup.on{ display: block; }

	.popup .pop-cont{ padding: 20px; }
	.popup .pop-cont .tit.v2{ padding-top: 20px; }
	.popup .pop-cont .img-wrap{ width: 100%; height: 180px; border-radius: 8px; background: #F0F3F5; }

	.popup.alert{ padding: 0; margin: 0; }
	.popup.alert .pop-cont{ display: -ms-flexbox; display: -webkit-flex; display: flex; align-items: center; min-height: 150px; }
	.popup.alert .pop-cont:after{ content:''; min-height:inherit; font-size:0; }
	.popup.alert .pop-cont .txt{ text-align: center; flex: none; width: 100%; text-align: center; }

	.popup .pop-footer{ padding: 20px; border-top: 1px solid #CED4DA; }
	.popup .pop-footer .btn-wrap .btn{ padding: 0; min-width: 80px; }
</style>

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />
<input type="hidden" id="eduId" value="<?php echo clean_xss_tags($_GET['eduId'])?>" />
<input type="hidden" id="query_cat1" value="<?php echo clean_xss_tags($_GET['cat1'])?>" />
<input type="hidden" id="query_cat2" value="<?php echo clean_xss_tags($_GET['cat2'])?>" />
<input type="hidden" id="query_doc" value="<?php echo clean_xss_tags($_GET['doc'])?>" />

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back">뒤로가기</button>
			<h1 class="title">신규교육진행</h1>
		</div>
	</div>
</div>
<!-- // header -->

<form id="add_form" method="post">
	<!-- content -->
	<div id="content">
		<div class="container">
			<div class="new-edu">
				<p class="tit v2 mb6">교육종류</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="cat1" id="cat1" required></select>
					</div>
				</div>
				<p class="tit v2 mb6 mt20">교육세부종류</p>
				<div class="inp-wrap">
					<div class="inp-item">
						<select name="cat2" id="cat2" required disabled></select>
					</div>
				</div>
				<p class="tit v2 mb6 mt20">교육명</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="eduName" id="eduName" value="<?php echo clean_xss_tags($_GET['eduName'])?>" placeholder="교육명" autocomplete="off" minlength="2" maxlength="30" required></div>
				</div>
				<p class="tit v2 mb6 mt20">교육일</p>
				<div class="inp-wrap">
					<div class="inp-item calendar date" target="eduDate"><input type="text" name="eduDate" id="eduDate" placeholder="교육일" disabled style="background-color:#fff;" required></div>
				</div>
				<div class="fx mt20">
					<div class="fx1">
						<p class="tit v2 mb6">시작시간</p>
						<div class="inp-wrap">
							<div class="inp-item"><input type="text" name="startTime" id="startTime" placeholder="09:00" autocomplete="off" minlength="5" maxlength="5" required></div>
						</div>
					</div>
					<div class="fx1">
						<p class="tit v2 mb6">종료시간</p>
						<div class="inp-wrap">
							<div class="inp-item"><input type="text" name="endTime" id="endTime" placeholder="10:00" autocomplete="off" minlength="5" maxlength="5" required></div>
						</div>
					</div>
				</div>
				<p class="tit v2 mb6 mt20">공종</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="constructType" id="constructType" value="<?php echo clean_xss_tags($_GET['constructType'])?>" placeholder="공종" autocomplete="off" minlength="2" maxlength="30" required></div>
				</div>
				<p class="tit v2 mb6 mt20">교육장소</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="eduPlace" id="eduPlace" value="<?php echo clean_xss_tags($_GET['eduPlace'])?>" placeholder="교육장소" autocomplete="off" minlength="2" maxlength="30" required></div>
				</div>
				<p class="tit v2 mb6 mt20">교육강사</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="instructor" id="instructor" value="<?php echo clean_xss_tags($_GET['instructor'])?>" placeholder="교육강사" autocomplete="off" minlength="2" maxlength="30" required></div>
				</div>
				<p class="tit v2 mb6 mt20">비고</p>
				<div class="inp-wrap">
					<div class="inp-item"><div id="doc" style="border-radius:8px;background-color:#fff;min-height:150px;"></div></div>
				</div>
			</div>
		</div>
	</div>
	<!-- // content -->

	<!-- fixed -->
	<div id="fixed">
		<div class="inner">
			<div class="btn-wrap">
				<button type="submit" class="btn lg has-ic bg-navy"><i class="ic-submit"></i>교육진행</button>
			</div>
		</div>
	</div>
<!-- // fixed -->
</form>

<!-- popup - 날짜 선택 -->
<div class="popup" id="viewCalendar">
	<div class="pop-cont" style="min-height:407px;">
		<p class="tit v2 ta-c mb40">날짜 선택</p>
		<div class="datepicker"></div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<input type="hidden" id="date_target" />
			<button id="select_date_btn" class="btn sm bg-navy txt-white has-ic" style="height:32px;line-height: 30px;font-size: 12px;border-radius:5px;"><i class="fa fa-check" style="color:#fff;"></i> 선택</button>&nbsp;&nbsp;
			<button class="btn sm bg-black txt-white has-ic" onclick="popCloseAndDim('viewCalendar', true);" style="background-color: #343A40 !important;height:32px;line-height: 30px;font-size: 12px;border-radius:5px;"><i class="fa fa-times" style="color:#fff;"></i> 취소</button>
		</div>
	</div>
</div>
<!-- // popup - 날짜 선택 -->

<?php include_once('_tail.php'); ?>