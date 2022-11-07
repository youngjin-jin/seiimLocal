<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>" />
<input type="hidden" id="site_name" value="<?php echo clean_xss_tags($_GET['site_name'])?>" />
<input type="hidden" id="owner" value="<?php echo clean_xss_tags($_GET['owner'])?>" />
<input type="hidden" id="contractor" value="<?php echo clean_xss_tags($_GET['contractor'])?>" />
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompany'])?>" />

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
            <h1 class="title"><?php echo $_lc['TXT']['교육내역']?></h1>
            <button class="btn-ic ic-filter" onclick="popOpenAndDim('addFilter', true);"><?php echo $_lc['BTN']['필터']?></button>
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
                    <!--li>
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
        <button class="btn-ic ic-cancle" onclick="popCloseAndDim('addFilter', true);"><?php echo $_lc['BTN']['닫기']?></button>
    </div>
    <div class="pop-cont">
        <div class="container pb35">
            <i class="ic-filter-lg"></i>
            <p class="tit v4 txt-navy"><?php echo $_lc['TXT']['교육내역필터']?></p>
            <p class="tit v2 mt15"><?php echo $_lc['TXT']['교육시작일']?></p>
            <div class="inp-wrap mt6">
                <div class="inp-item date calendar" target="start_date"><input type="text" name="start_date" id="start_date" disabled style="background-color:#fff;"></div>
            </div>
            <p class="tit v2 mt20"><?php echo $_lc['TXT']['교육종료일']?></p>
            <div class="inp-wrap mt6">
                <div class="inp-item date calendar" target="end_date"><input type="text" name="end_date" id="end_date" disabled style="background-color:#fff;"></div>
            </div>
            <p class="tit v2 mt20"><?php echo $_lc['TXT']['교육종류필터']?></p>
            <div class="inp-wrap mt6 mb10">
                <div class="inp-item">
                    <select name="filter_educategory" id="filter_educategory">
                        <option value=""><?php echo $_lc['TXT']['교육종류필터']?></option>
                    </select>
                </div>
            </div>
            <ul class="tag-list" id="filter_educategory_list"></ul>
        </div>
    </div>
    <div class="pop-footer">
        <div class="btn-wrap">
            <button class="btn lg has-ic bg-navy" id="filter_btn"><i class="ic-submit"></i><?php echo $_lc['TXT']['필터적용']?></button>
            <button class="btn lg has-ic bg-gray" id="filter_reset_btn"><i class="ic-close"></i><?php echo $_lc['TXT']['필터해제']?></button>
        </div>
    </div>
</div>
<!-- // popup - 필터 -->

<!-- popup - 날짜 선택 -->
<div class="popup" id="viewCalendar">
	<div class="pop-cont">
		<p class="tit v2 ta-c mb40" style="color:#343A40;font-size:16px;"><?php echo $_lc['TXT']['날짜선택']?></p>
		<div class="datepicker"></div>
	</div>
	<div class="pop-footer">
		<div class="btn-wrap" style="display:block;text-align:center;">
			<input type="hidden" id="date_target" />
			<button id="select_date_btn" class="btn sm bg-navy txt-white has-ic" style="height:32px;line-height:30px;font-size:12px;border-radius:4px;max-width:80px;margin-right:10px;"><i class="ic-submit2"></i><?php echo $_lc['BTN']['선택']?></button>
			<button class="btn sm bg-black txt-white has-ic" id="cancel_btn" style="height:32px;line-height:30px;font-size:12px;border-radius:4px;background-color:#343A40;max-width:80px;"><i class="ic-cancle2"></i><?php echo $_lc['BTN']['취소']?></button>
		</div>
	</div>
</div>
<!-- // popup - 날짜 선택 -->

<?php include_once('_tail.php'); ?>