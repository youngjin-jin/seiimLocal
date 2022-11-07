<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>
<input type="hidden" id="myCompany" value="<?php echo clean_xss_tags($_GET['myCompanyId'])?>" />
<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="back_btn" class="btn-ic ic-back"><?php echo $_lc['BTN']['뒤로가기']?></button>
            <h1 class="title"><?php echo $_lc['TXT']['현장상세']?></h1>
            <button class="btn-ic ic-menu"><?php echo $_lc['BTN']['메뉴']?></button>
        </div>
    </div>
</div>
<!-- // header -->

<?php include_once('_menu.php'); ?>

<!-- content -->
<div id="content">
    <div class="container">
        <div class="field-wrap">
            <p class="tit v3"><?php echo clean_xss_tags($_GET['site_name'])?></p>
            <div class="tbl-wrap v1 mt15">
                <table>
                    <colgroup>
                        <col style="width: 76px;">
                        <col style="width: auto;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th><?php echo $_lc['TXT']['현장코드']?></th>
                            <td><?php echo clean_xss_tags($_GET['key'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['발주처']?></th>
                            <td><?php echo clean_xss_tags($_GET['owner'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['TXT']['시공사']?></th>
                            <td><?php echo clean_xss_tags($_GET['contractor'])?></td>
                        </tr>
                        <tr>
                            <th><?php echo $_lc['BTN']['소속업체']?></th>
                            <td><?php echo clean_xss_tags($_GET['myCompany'])?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!--a href="javascript:;" class="bx-link mt35">
                <i class="ic-edu-record"></i>
                <p><?php echo $_lc['BTN']['신규교육진행']?></p>
            </a-->
            <a href="edu_list.php?key=<?php echo clean_xss_tags($_GET['key'])?>&site_name=<?php echo clean_xss_tags($_GET['site_name'])?>&owner=<?php echo clean_xss_tags($_GET['owner'])?>&contractor=<?php echo clean_xss_tags($_GET['contractor'])?>&myCompany=<?php echo clean_xss_tags($_GET['myCompany'])?>" class="bx-link mt40">
                <i class="ic-safety-document"></i>
                <p><?php echo $_lc['BTN']['교육내역확인']?></p>
            </a>

            <a href="safety_list.php?key=<?php echo clean_xss_tags($_GET['key'])?>&site_name=<?php echo clean_xss_tags($_GET['site_name'])?>&owner=<?php echo clean_xss_tags($_GET['owner'])?>&contractor=<?php echo clean_xss_tags($_GET['contractor'])?>&myCompany=<?php echo clean_xss_tags($_GET['myCompany'])?>&myCompanyId=<?php echo clean_xss_tags($_GET['myCompanyId'])?>&readFlag=1" class="bx-link mt40">
                <i class="ic-safety-document"></i>
                <p><?php echo $_lc['BTN']['안전문서목록']?></p>
            </a>

            

        </div>
    </div>
</div>
<!-- // content -->

<!-- fixed -->
<div id="fixed">
    <div class="inner">
        <div class="btn-wrap">
            <button id="qr_btn2" class="btn lg has-ic bg-navy"><i class="ic-qr"></i><?php echo $_lc['BTN']['QR인증']?></button>
        </div>
    </div>
</div>
<!-- // header -->

<?php include_once('_tail.php'); ?>