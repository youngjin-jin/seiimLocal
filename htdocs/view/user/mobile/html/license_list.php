<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include_once('_head.php');
?>

<!-- header -->
<div id="header">
    <div class="inner">
        <div class="container">
            <button id="add_btn" class="btn-ic ic-add"><?php echo $_lc['BTN']['추가']?></button>
			<h1 class="title"><?php echo $_lc['TXT']['자격증목록']?></h1>
			<button class="btn-ic ic-menu"><?php echo $_lc['BTN']['메뉴']?></button>
        </div>
    </div>
</div>
<!-- // header -->

<?php include_once('_menu.php'); ?>

<!-- content -->
<div id="content">
    <div class="container">
        <div class="license-wrap">
            <!-- case1: 자격증 목록 없음 -->
            <div class="license-add">
                <p class="txt1"><?php echo $_lc['TXT']['등록된장비자격증이없습니다']?></p>
                <p class="txt2"><?php echo $_lc['TXT']['좌측상단버튼을눌러장비자격증을추가해주세요']?></p>
            </div>

            <!-- case2: 자격증 목록 있음 -->
            <div class="list-wrap v1 list_block" style="display:none;">
                <ul id="ul_list">
                    <!--li>
                        <div class="list-head">
                            <p class="tit">자격증명자격증명자격증명자격증명</p>
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
                                            <th>장비종류</th>
                                            <td>3톤미만 지게차</td>
                                        </tr>
                                        <tr>
                                            <th>발급년월일</th>
                                            <td>2021.06.05</td>
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

<!-- 현장 목록이 있는 경우 -->
<!-- fixed -->
<div id="fixed">
    <div class="inner">
        <div class="btn-wrap">
            <button id="qr_btn" class="btn lg has-ic bg-navy"><i class="ic-qr"></i><?php echo $_lc['BTN']['QR인증']?></button>
        </div>
    </div>
</div>
<!-- // header -->

<?php include_once('_tail.php'); ?>