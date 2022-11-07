<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

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
<input type="hidden" id="copy_id" value="" />

<!-- header -->
<div id="header">
	<div class="inner">
		<div class="container">
			<button id="back_btn" class="btn-ic ic-back">뒤로가기</button>
			<h1 class="title">교육내역관리</h1>
			<button class="btn-ic ic-filter" onclick="popOpenAndDim('addFilter', true);">필터</button>
		</div>
	</div>
</div>
<!-- // header -->

<!-- content -->
<div id="content">
	<div class="container">
		<div class="edu-list">
			<ul class="tag-list" id="filter_title"></ul>
			<div class="list-wrap v1 mt20">
				<ul id="edu_list">
					<!--li onclick="">
						<div class="list-head">
							<p class="tit">초기세팅된교육명_YYMMDD_1차</p>
						</div>
						<div class="list-body">
							<div class="tbl-wrap v1">
								<table>
									<colgroup>
										<col style="width: 76px;">
										<col style="width: auto;">
									</colgroup>
									<tbody>
										<tr>
											<th>교육종류</th>
											<td>신규교육채용</td>
										</tr>
										<tr>
											<th>교육일</th>
											<td>2021.05.08</td>
										</tr>
										<tr>
											<th>교육인원</th>
											<td>50명</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li-->
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- // content -->

<!-- popup - 필터 -->
<div class="popup" id="addFilter">
    <div class="pop-header">
        <button class="btn-ic ic-cancle" onclick="popCloseAndDim('addFilter', true);">닫기</button>
    </div>
    <div class="pop-cont">
        <div class="container">
            <i class="ic-filter-lg"></i>
            <p class="tit v4 txt-navy">교육내역필터</p>
            <p class="tit v2" style="padding-top:10px;">교육시작일</p>
            <div class="inp-wrap mt6">
                <div class="inp-item date calendar" target="start_date"><input type="text" name="start_date" id="start_date" disabled style="background-color:#fff;"></div>
            </div>
            <p class="tit v2" style="padding-top:10px;">교육종료일</p>
            <div class="inp-wrap mt6">
                <div class="inp-item date calendar" target="end_date"><input type="text" name="end_date" id="end_date" disabled style="background-color:#fff;"></div>
            </div>
            <p class="tit v2" style="padding-top:10px;">교육종류필터</p>
            <div class="inp-wrap mt6 mb10">
                <div class="inp-item">
                    <select name="filter_educategory" id="filter_educategory">
                        <option value="">교육종류필터</option>
                    </select>
                </div>
            </div>
			<p class="tit v2" style="padding-top:10px;">포함 수료자 이름</p>
			<div class="inp-wrap mt6">
				<div class="inp-item"><input type="text" name="workerName" id="workerName" placeholder="홍길동"></div>
			</div>
            <ul class="tag-list" id="filter_educategory_list" style="margin-top:10px;"></ul>
        </div>
    </div>
    <div class="pop-footer">
        <div class="btn-wrap">
            <button class="btn lg has-ic bg-navy" id="filter_btn"><i class="ic-submit"></i>필터적용</button>
            <button class="btn lg has-ic bg-gray" id="filter_reset_btn"><i class="ic-close"></i>필터해제</button>
        </div>
    </div>
</div>
<!-- // popup - 필터 -->

<!-- popup(alert) - 복사 -->
<div class="popup" id="copyEdu">
	<div class="pop-cont">
		<div class="msg-wrap">
			<div class="inner">
				<i class="ic-question"></i>
				<p class="mt10">기존 교육 내용을 복사하여 <br>새롭게 교육을 진행하시겠습니까?</p>
			</div>
		</div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<button class="btn lg has-ic bg-navy" id="copy_btn"><i class="ic-submit"></i>복사</button>
			<button class="btn lg has-ic bg-gray" onclick="popCloseAndDim('copyEdu', true)"><i class="ic-close"></i>취소</button>
		</div>
	</div>
</div>
<!-- // popup(alert) - 복사 -->

<!-- popup - 날짜 선택 -->
<div class="popup" id="viewCalendar">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb40">날짜 선택</p>
		<div class="datepicker"></div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap">
			<input type="hidden" id="date_target" />
			<button id="select_date_btn" class="btn sm bg-navy txt-white has-ic" style="height:32px;line-height: 30px;font-size: 12px;border-radius:5px;"><i class="fa fa-check" style="color:#fff;"></i> 선택</button>&nbsp;&nbsp;
			<button class="btn sm bg-black txt-white has-ic" id="cancel_btn" style="background-color: #343A40 !important;height:32px;line-height: 30px;font-size: 12px;border-radius:5px;"><i class="fa fa-times" style="color:#fff;"></i> 취소</button>
		</div>
	</div>
</div>
<!-- // popup - 날짜 선택 -->

<?php include_once('_tail.php'); ?>