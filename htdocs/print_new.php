<?php
if ($element['eduDoc']['cat1Id'] == 10) {
    //1: 정기안전보건교육(근로자)
?>
    <div class="print_page newTable" style="padding:0px 50px ;position:relative;">
        <table class="pr_tb">
            <tr style='border:0;'>
                <td class="td_toptit" style="" rowspan="1" colspan="6">정기안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style='border:0;'>
                <td colspan="5" class="td_topsname" style="">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;">호반산업</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</td>
                <td colspan="1" class="td_name" style="width:8%;">교육방법</td>
                <td colspan="4">
                    <div class="ed_type">
                        <p class="on"><span></span> 강의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 토의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 시청각</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 기 타</p>
                    </div>
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style="height:40px;font-size: 18px;font-weight: 600;">교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2" style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>- 산업안전 및 사고 예방에 관한 사항</p>
                    <p>- 산업보건 및 직업병 예방에 관한 사항</p>
                    <p>- 건강증진 질병 예방에 관한 사항</p>
                    <p>- 유해·위험 작업환경 관리에 관한 사항</p>
                    <p>- 산업안전보건법령 및 산업재해보상보험 제도에 관한 사항</p>
                    <p>- 직무스트레스예방 및 관리에 관한 사항</p>
                    <p>- 직장 내 괴롭힘, 고객의 폭언 등으로 인한 건강장해 예방 및 관리에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="2" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>위험성평가회의 결과 Feed-back 사항</p>
                    <p>예상 위험요인 및 예방대책에 관한 사항</p>
                </td>
            </tr>
            <tr>
                <td colspan="9" style="height:40px;font-size: 18px;font-weight: 600;">교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class=""style="text-align:center;padding:2px;">
                <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:450px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        
                    </td>
                    <td style="height:80px;"></td>
                </tr>
            </table>
        </div>
    </div>








    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

<?php
	for ($i = 0; $i < ceil(count($element['eduDoc']['attach']) / 2); $i++) {
	?>
		<div class="print_page" style="padding:50px 20px;">
			<img src="/view/images/doc_13.png" style="margin:0 auto;">
			<div style="display:flex;margin-top:-1315px;margin-left:250px;font-size:20pt;margin-bottom:18px;">
				<?php echo $element['eduDoc']['siteName'] ?>
			</div>
			<?php
			for ($w = $i * 2; $w < ($i + 1) * 2; $w++) {
			?>
				<div style='height:550px;width:950px;margin:auto;'>
					<img src='<?php echo $element['eduDoc']['attach'][$w]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
				</div>
				<div style="display:flex;margin-left:110px;">
					<div class="row" style="display:flex;height:72px;">
						<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['constructType'] ?></div>
						<div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 100px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['svName'] ?></div>
						<div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 90px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
						<div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 90px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['instructor'] ?></div>
					</div>
				</div>

			<?php
			}
			?>
		</div>
	<?php
	}
	?>

    
<?php
} else if ($element['eduDoc']['cat1Id'] == 11) {
    //2. 정기안전보건교육(관리감독자)
?>
    <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td class="td_toptit" rowspan="1" colspan="6">정기안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5" class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;">호반산업</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">교육방법</td>
                <td colspan="4">
                    <div class="ed_type">
                        <p class="on"><span></span> 강의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 토의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 시청각</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 기 타</p>
                    </div>
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>- 산업안전 및 사고 예방에 관한 사항</p>
                    <p>- 산업보건 및 직업병 예방에 관한 사항</p>
                    <p>- 작업공정의 유해〮위험과 재해 예방대책에 관한 사항</p>
                    <p>- 유해·위험 작업환경 관리에 관한 사항</p>
                    <p>- 산업안전보건법령 및 산업재해보상보험 제도에 관한 사항</p>
                    <p>- 직무스트레스예방 및 관리에 관한 사항</p>
                    <p>- 표준안전작업방법 및 지도 요령에 관한 사항</p>
                    <p>- 관리감독자의 역할과 임무에 관한 사항</p>
                    <p>- 직장 내 괴롭힘, 고객의 폭언 등으로 인한 건강장해 예방 및 관리에 관한 사항</p>
                    <p>- 안전보건교육 능력 배양에 관한 사항<br>- 현장근로자와의 의사소통능력 향상, 강의능력 향상, 기타 안전보건교육 능력 배양 등에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="2" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                </td>
                
            </tr>
            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    
    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

<?php
	for ($i = 0; $i < ceil(count($element['eduDoc']['attach']) / 2); $i++) {
	?>
		<div class="print_page" style="padding:50px 20px;">
			<img src="/view/images/doc_13.png" style="margin:0 auto;">
			<div style="display:flex;margin-top:-1315px;margin-left:250px;font-size:20pt;margin-bottom:18px;">
				<?php echo $element['eduDoc']['siteName'] ?>
			</div>
			<?php
			for ($w = $i * 2; $w < ($i + 1) * 2; $w++) {
			?>
				<div style='height:550px;width:950px;margin:auto;'>
					<img src='<?php echo $element['eduDoc']['attach'][$w]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
				</div>
				<div style="display:flex;margin-left:110px;">
					<div class="row" style="display:flex;height:72px;">
						<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['constructType'] ?></div>
						<div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 100px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['svName'] ?></div>
						<div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 90px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
						<div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 90px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['instructor'] ?></div>
					</div>
				</div>

			<?php
			}
			?>
		</div>
	<?php
	}
	?>

    
<?php
} else if ($element['eduDoc']['cat1Id'] == 12) {
    //9: 신규채용자안전보건교육
?>
    <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td class="td_toptit"  rowspan="1" colspan="6">신규채용자 안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5" class="td_topsname"style="">
                    <p style='font-size:;'>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;">호반산업</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">교육방법</td>
                <td colspan="4">
                    <div class="ed_type">
                        <p class="on"><span></span> 강의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 토의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 시청각</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 기 타</p>
                    </div>
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>- 산업안전 및 사고 예방에 관한 사항</p>
                    <p>- 산업보건 및 직업병 예방에 관한 사항</p>
                    <p>- 산업안전보건법령 및 산업재해보상보험 제도에 관한 사항</p>
                    <p>- 직무스트레스예방 및 관리에 관한 사항</p>
                    <p>- 직장 내 괴롭힘, 고객의 폭언 등으로 인한 건강장해 예방 및 관리에 관한 사항</p>
                    <p>- 기계 기구의 위험성과 작업의 순서 및 동선에 관한 사항</p>
                    <p>- 작업 개시 전 점검에 관한 사항</p>
                    <p>- 정리정돈 및 청소에 관한 사항</p>
                    <p>- 사고 발생 시 긴급조치에 관한 사항</p>
                    <p>- 물질안전보건자료에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="2" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                </td>
                
            </tr>
            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

    <?php
    for ($i = 0; $i < ceil(count($element['eduDoc']['attach']) / 2); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_11.png" style="margin:0 auto;">
            <div style="display:flex;margin-top:-1315px;margin-left:250px;font-size:20pt;margin-bottom:18px;">
                <?php echo $element['eduDoc']['siteName'] ?>
            </div>
            <?php
            for ($w = $i * 2; $w < ($i + 1) * 2; $w++) {
            ?>
                <div style='height:550px;width:950px;margin:auto;'>
                    <img src='<?php echo $element['eduDoc']['attach'][$w]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
                </div>
                <div style="display:flex;margin-left:110px;">
                    <div class="row" style="display:flex;height:72px;">
                        <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['constructType'] ?></div>
                        <div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 100px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['svName'] ?></div>
                        <div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 90px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
                        <div class="col" style="flex:none;width:160px;text-align:center;margin:auto 0 auto 90px;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['instructor'] ?></div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
<?php
} else if ($element['eduDoc']['cat1Id'] == 13) {
    //5: 작업 변경 시 교육
?>
    <div class="print_page newTable" style="padding:0px 50px ;position:relative;">
        <table class="pr_tb">
            <tr style='border:0;'>
                <td class="td_toptit"   rowspan="1" colspan="6">작업내용변경 시 안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style='border:0;'>
                <td colspan="5" class="td_topsname"style="">
                    <p style='font-size:;'>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;">호반산업</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">교육방법</td>
                <td colspan="4">
                    <div class="ed_type">
                        <p class="on"><span></span> 강의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 토의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 시청각</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 기 타</p>
                    </div>
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style="height:40px;font-size: 18px;font-weight: 600;">교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2" style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>- 산업안전 및 사고 예방에 관한 사항</p>
                    <p>- 산업보건 및 직업병 예방에 관한 사항</p>
                    <p>- 산업안전보건법령 및 산업재해보상보험 제도에 관한 사항</p>
                    <p>- 직무스트레스예방 및 관리에 관한 사항</p>
                    <p>- 직장 내 괴롭힘, 고객의 폭언 등으로 인한 건강장해 예방 및 관리에 관한 사항</p>
                    <p>- 기계·기구의 위험성과 작업의 순서 및 동선에 관한 사항</p>
                    <p>- 작업 개시 전 점검에 관한 사항</p>
                    <p>- 정리정돈 및 청소에 관한 사항</p>
                    <p>- 사고 발생 시 긴급조치에 관한 사항</p>
                    <p>- 물질안전보건자료에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="2" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                </td>
            </tr>
            <tr>
                <td colspan="9" style="height:40px;font-size: 18px;font-weight: 600;">교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class=""style="text-align:center;padding:2px;">
                <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:450px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        
                    </td>
                    <td style="height:80px;"></td>
                </tr>
            </table>
        </div>
    </div>




    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
<?php
} else if ($element['eduDoc']['cat1Id'] == 14) {
    //6: 특별안전보건교육
?>
    <?php if($element['eduDoc']['cat2Name'] == '1톤 이상 또는 1톤 미만 크레인 사용 작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제33조제1항 관련)</p>
                    <p>▶ 1톤 이상의 크레인을 사용하는 작업 또는 1톤 미만의 크레인 또는 호이스트를 5대 이상 보유한 사업장에서 해당 기계로 하는 작업(제40호의 작업은 제외한다)</p>
                    <p>- 방호장치의 종류, 기능 및 취급에 관한 사항</p>
                    <p>- 걸고리·와이어로프 및 비상정지장치 등의 기계·기구점검에 관한 사항</p>
                    <p>- 화물의 취급 및 안전작업방법에 관한 사항</p>
                    <p>- 신호방법 및 공동작업에 관한 사항</p>
                    <p>- 인양 물건의 위험성 및 낙하·비래(飛來)·충돌재해 </p>
                    <p>- 인양물이 적재될 지반의 조건, 인양하중, 풍압 등이 인양물과 타워크레인에 미치는 영향</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '거푸집 동바리의 설치 해체 정리(형틀작업)') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제33조제1항 관련)</p>
                    <p>▶ 거푸집 동바리의 조립 또는 해체작업</p>
                    <p>- 동바리의 조립방법 및 작업 절차에 관한 사항</p>
                    <p>- 조립재료의 취급방법 및 설치기준에 관한 사항</p>
                    <p>- 조립 해체 시의 사고 예방에 관한 사항</p>
                    <p>- 보호구 착용 및 점검에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '거푸집 동바리의 설치 해체 정리(시스템설치작업)') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제33조제1항 관련)</p>
                    <p>▶ 거푸집 동바리의 조립 또는 해체작업</p>
                    <p>- 동바리의 조립방법 및 작업 절차에 관한 사항</p>
                    <p>- 조립재료의 취급방법 및 설치기준에 관한 사항</p>
                    <p>- 조립 해체 시의 사고 예방에 관한 사항</p>
                    <p>- 보호구 착용 및 점검에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '건설용 리프트·곤돌라를 이용한 작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제29조 관련)</p>
                    <p>▶ 건설용 리프트·곤돌라를 이용한 작업</p>
                    <p>- 방호장치의 기능 및 사용에 관한 사항</p>
                    <p>- 기계, 기구, 달기체인 및 와이어 등의 점검에 관한 사항</p>
                    <p>- 화물의 권상·권하 작업방법 및 안전작업 지도에 관한 사항</p>
                    <p>- 기계·기구에 특성 및 동작원리에 관한 사항</p>
                    <p>- 신호방법 및 공동작업에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '굴착면의 높이가 2미터 이상이 되는 지반 굴착') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제33조제1항 관련)</p>
                    <p>▶ 굴착면의 높이가 2미터 이상이 되는 지반 굴착(터널 및 수직갱 외의 갱 굴착은 제외한다)작업</p>
                    <p>- 지반의 형태·구조 및 굴착 요령에 관한 사항</p>
                    <p>- 지반의 붕괴재해 예방에 관한 사항</p>
                    <p>- 붕괴 방지용 구조물 설치 및 작업방법에 관한 사항</p>
                    <p>- 보호구의 종류 및 사용에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '금속의 용접·용단 또는 가열작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제19조 관련)</p>
                    <p style='margin-bottom:7px'>▶ 아세틸렌 용접장치 또는 가스집합 용접장치를 사용하는 금속의 용접·용단 또는 가열작업(발생기·도관 등에 의하여 구성되는 용접장치만 해당한다)</p>
                    <p>- 용접 흄, 분진 및 유해광선 등의 유해성에 관한 사항</p>
                    <p>- 가스용접기, 압력조정기, 호스 및 취관두(불꽃이 나오는 용접기의 앞부분) 등의 기기점검에 관한 사항</p>
                    <p>- 작업방법·순서 및 응급처치에 관한 사항</p>
                    <p>- 안전기 및 보호구 취급에 관한 사항</p>
                    <p>- 화재예방 및 초기대응에 관한사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '높이가 2미터 이상인 물건을 쌓거나 무너뜨리는 작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제29조 관련)</p>
                    <p>▶ 높이가 2미터 이상인 물건을 쌓거나 무너뜨리는 작업(하역기계로만 하는 작업은 제외한다)</p>
                    <p>- 원부재료의 취급 방법 및 요령에 관한 사항</p>
                    <p>- 물건의 위험성·낙하 및 붕괴재해 예방에 관한 사항</p>
                    <p>- 적재방법 및 전도 방지에 관한 사항</p>
                    <p>- 보호구 착용에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '비계의 조립·해체 또는 변경작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제29조 관련)</p>
                    <p>▶ 비계의 조립·해체 또는 변경작업</p>
                    <p>- 비계의 조립순서 및 방법에 관한 사항</p>
                    <p>- 비계작업의 재료 취급 및 설치에 관한 사항</p>
                    <p>- 추락재해 방지에 관한 사항</p>
                    <p>- 보호구 착용에 관한 사항</p>
                    <p>- 비계상부 작업 시 최대 적재하중에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '운반용 및 하역운반기계를 5대 이상 보유') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>1. 운반하역기계 및 부속설비의 점검에 관한 사항</p>
                    <p>2. 작업순서와 방법에 관한 사항</p>
                    <p>3. 안전운전방법에 관한 사항</p>
                    <p>4. 화물의 취급 및 작업신호에 관한 사항</p>
                    <p>5. 그 밖에 안전ㆍ보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>해당 작업관련 위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '전압이 75V 이상인 정전 및 활선작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제29조 관련)</p>
                    <p>▶ 전압이 75볼트 이상인 정전 및 활선작업</p>
                    <p>- 전기의 위험성 및 전격 방지에 관한 사항	</p>
                    <p>- 해당 설비의 보수 및 점검에 관한 사항	</p>
                    <p>- 정전작업·활선작업 시의 안전작업방법 및 순서에 관한 사항	</p>
                    <p>- 절연용 보호구, 절연용 보호구 및 활선작업용 기구등의 사용에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '콘크리트 파쇄기를 사용하여 하는 파쇄작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>1. 콘크리트 해체 요령과 방호거리에 관한 사항</p>
                    <p>2. 작업안전조치 및 안전기준에 관한 사항</p>
                    <p>3. 파쇄기의 조작 및 공통작업 신호에 관한 사항</p>
                    <p>4. 보호구 및 방호장비 등에 관한 사항</p>
                    <p>5. 그 밖에 안전ㆍ보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>해당 작업 관련 위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '타워크레인 설치, 인상, 해체, 작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제29조 관련)</p>
                    <p>▶ 타워크레인을 설치(상승작업을 포함한다)·해체하는 작업</p>
                    <p>- 붕괴·추락 및 재해 방지에 관한 사항</p>
                    <p>- 설치·해체 순서 및 안전작업방법에 관한 사항</p>
                    <p>- 부재의 구조·재질 및 특성에 관한 사항</p>
                    <p>- 신호방법 및 요령에 관한 사항</p>
                    <p>- 이상 발생 시 응급조치에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '호이스트 설치, 인상, 해체, 작업') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶ 사업 내 안전/보건교육(제29조 관련)</p>
                    <p>▶ 건설용 리프트·곤돌라를 이용한 작업</p>
                    <p>- 방호장치의 기능 및 사용에 관한 사항</p>
                    <p>- 기계, 기구, 달기체인 및 와이어 등의 점검에 관한 사항</p>
                    <p>- 화물의 권상·권하 작업방법 및 안전작업 지도에 관한 사항</p>
                    <p>- 기계·기구에 특성 및 동작원리에 관한 사항</p>
                    <p>- 신호방법 및 공동작업에 관한 사항</p>
                    <p>- 그 밖에 안전·보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                    <p>위험성평가에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                    <p>※특별교육자료 별도 보관</p>
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    



    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

    


    

    
<?php
} else if ($element['eduDoc']['cat1Id'] == 15) {
    //7: 특수형태근로종사자 교육
?>
    
    <?php if($element['eduDoc']['cat2Name'] == '굴삭기운전원(2m이상 굴착 없음)' || $element['eduDoc']['cat2Name'] == '덤프트럭' || $element['eduDoc']['cat2Name'] == '펌프카' || $element['eduDoc']['cat2Name'] == '바브켓' || $element['eduDoc']['cat2Name'] == '살수차' ) { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">최초노무 제공시 교육</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상작업</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>○ 산업안전 및 사고 예방에 관한 사항</p>
                    <p>○ 산업보건 및 직업병 예방에 관한 사항</p>
                    <p>○ 건강증진 및 질병 예방에 관한 사항</p>
                    <p>○ 유해·위험 작업환경 관리에 관한 사항</p>
                    <p>○ 산업안전보건법령 및 산업재해보상보험 제도에 관한 사항</p>
                    <p>○ 직무스트레스 예방 및 관리에 관한 사항</p>
                    <p>○ 직장 내 괴롭힘, 고객의 폭언 등으로 인한 건강장해 예방 및 관리에 관한 사항</p>
                    <p>○ 기계·기구의 위험성과 작업의 순서 및 동선에 관한 사항</p>
                    <p>○ 작업 개시 전 점검에 관한 사항</p>
                    <p>○ 정리정돈 및 청소에 관한 사항</p>
                    <p>○ 사고 발생 시 긴급조치에 관한 사항</p>
                    <p>○ 물질안전보건자료에 관한 사항</p>
                    <p>○ 교통안전 및 운전안전에 관한 사항</p>
                    <p>○ 보호구 착용에 관한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;min-height: 100px;;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;padding-left:10px;">
                    <p>안전방침 및 목표에 관한 사항</p>
                    <p>당해 작업의 위험요인 및 예방대책에 관한 사항</p>
                    <p>현장 위험요인 및 예방대핵에 관한 사항</p>
                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;">
                </td>

            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>





<?php
} else if ($element['eduDoc']['cat1Id'] == 16) {
    //8: 물질안전보건(MSDS)교육
?>
    <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td   class="td_toptit"   rowspan="1" colspan="6">MSDS(물질안전보건자료) 교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5" class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;">호반산업</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">교육방법</td>
                <td colspan="4">
                    <div class="ed_type">
                        <p class="on"><span></span> 강의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 토의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 시청각</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 기 타</p>
                    </div>
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="5" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>▶제품명 : 레디믹스트콘트리트</p>
                    <p>▶제품용도 : 타설트</p>
                    <p>▶공급자 정보 : </p>
                    <p>유진기업, 02-3704-3300</p>
                    <p>아세아시멘트, 02-527-6400</p>
                    <p>선일기업, 02-3462-0900</p>
                    <p>남성기업, 031-353-8400</p>
                    <p>고려레미콘, 031-353-2114</p>
                    <p>태형기업, 031-354-6660</p>
                    <p>금강레미콘, 043-644-6000</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="1" class=""style="text-align: left"></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
        ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

    
<?php

} else if ($element['eduDoc']['cat1Id'] == 18 ) {
    //10: 2-out 교육일지
?>
    <div class="print_page newTable"  style="padding:0px 50px ;position:relative;">
        <table class="pr_tb">
            <tr style='border:0;'>
                <td class="td_toptit" rowspan="1" colspan="6">특별안전보건(2-out)교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style='border:0;'>
                <td colspan="5" class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;">2-OUT 캠페인 경고장(1회) 발부 근로자</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    거정건설
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style="height:40px;font-size: 18px;font-weight: 600;">교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2" style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">교육<br>사항</td>
                <td colspan="4" rowspan="" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>- 근로자가 알아야 할 기본적인 안전 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="1" class=""style="text-align: left"></td>
            </tr>

            <tr>
                <td colspan="9" style="height:40px;font-size: 18px;font-weight: 600;">교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class=""style="text-align:center;padding:2px;">
                <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:450px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        
                    </td>
                    <td style="height:80px;"></td>
                </tr>
            </table>
        </div>
    </div>
    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

    
<?php

    
}else if ($element['eduDoc']['cat1Id'] == 19 ) {
    //11: 기타교육
?>
    <?php if($element['eduDoc']['cat2Name'] == '안전조회 미참석') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전교육일지(미참석자)</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="1" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>근로자가 지켜야 할 기본적인 안전 사항</p>


                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>


            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '신호수') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">신호수 안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">교육방법</td>
                <td colspan="4">
                    <div class="ed_type">
                        <p class="on"><span></span> 강의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 토의식</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 시청각</p>
                    </div>
                    <div class="ed_type">
                        <p class=""><span></span> 기 타</p>
                    </div>
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="4" class="td_name2"style="width:30%;">교 육 항 목</td>
                <td colspan="3" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">법적<br>교육<br>사항</td>
                <td colspan="4" rowspan="1" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>1. 크레인의 기계적 특성 및 방호장치 등에 관한 사항</p>
                    <p>2. 화물의 취급 및 안전작업방법에 관한 사항</p>
                    <p>3. 신호방법 및 요령에 관한 사항</p>
                    <p>4. 인양 물건의 위험성 및 낙하ㆍ비래ㆍ충돌재해 예방에 관한 사항</p>
                    <p>5. 인양물이 적재될 지반의 조건, 인양하중, 풍압 등이 인양물과 타워크레인에 미치는 영향</p>
                    <p>6. 그 밖에 안전ㆍ보건관리에 필요한 사항</p>

                </td>
                <td colspan="3" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="1" class=""style="text-align: left"></td>					
            </tr>


            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '작업지휘자') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="7" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">교육<br>내용</td>
                
                <td colspan="7" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="7" rowspan="1" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>- 하역운반기계(페이로더) 작업시 신호수 배치 및 작업지휘하에 작업</p>
                    <p>- 크롤러크레인 작업 전 와이어로프 소선상태 및 샤클, 클립 훼손상태 확인</p>
                    <p>- 파일 항타작업시 철판 10cm 이내 이격상태 관리</p>
                    <p>- 파일 2단 이하 적재 및 쐐기목 2개소 이상 설치 확인</p>
                </td>
                
            </tr>


            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if($element['eduDoc']['cat2Name'] == '화재감시자') { ?>
        <div class="print_page newTable" style="padding:0 50px;position:relative;">
        <table class="pr_tb secondSt">
            <tr >
                <td  class="td_toptit"  rowspan="1" colspan="6">특별안전보건교육일지</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr style="border:0;">
                <td colspan="5"  class="td_topsname">
                    <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    
                    
                </td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">특별교육대상</td>
                <td colspan="7" style="width:90%;text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['constructType'] ?></td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name" style="width:8%">교육일시</td>
                <td colspan="2" style="width:%;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?> (<?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?>)</td>
                <td colspan="1" class="td_name" style="width:8%;">협력사명</td>
                <td colspan="4">
                    협력사명
                </td>
            </tr>
            <tr class="tr_tt">
                <td colspan="2" class="td_name"style="width:8%">교육장소</td>
                <td colspan="2" style="width:;"><?php echo $element['eduDoc']['eduPlace'] ?></td>
                <td colspan="1" class="td_name"style="width:8%">교육인원</td>
                <td colspan="1" class=""style="width:10%;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</td>                
                <td colspan="1"  class="td_name" style="width:8%">강사</td>
                <td colspan="2" class=""style=""><?php echo $element['eduDoc']['instructor'] ?></td>
            </tr>

            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 항</td>
            </tr>
            <tr class="tr_tt">
                <td class="td_name2" style="width: 5%;">구 분</td>
                <td colspan="7" class="td_name2" style="width:30%;">교 육 내 용</td>
                <td class="td_name2" style="width:5%">비 고</td>
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">교육<br>내용</td>
                
                <td colspan="7" rowspan="1" class="td_docs" style="text-align: left;padding-left:10px;"><?php echo $element['eduDoc']['doc'] ?></td>
                <td rowspan="2" class=""style="text-align: left"></td>					
            </tr>
            <tr class="tr_tt">
                <td rowspan="" class="td_name2" style="font-size:14px;">현장<br>위험<br>관리<br>사항</td>
                <td colspan="7" rowspan="1" class="tr_tpline" style="text-align: left;height:250px;overflow-wrap: anywhere;padding-left:10px;">
                    <p>1. 가을,겨울철 화재사고 빈번히 일어나는 계절임. 화재감시자 본연의 임무 이행</p>
                    <p>2. 화재감시자 복장 (주황조끼) 준수</p>
                    <p>3. 화재감시자 장구류(확성기,휴대용소화기,조명,방독마스크, 가스농도측정기) 등</p>
                    <p>4. 화기작업 주변 11m 이내 가연성물질 제거 여부</p>
                </td>
                
            </tr>


            <tr>
                <td colspan="9" style='height:40px;font-size: 18px;font-weight: 600;'>교 육 사 진</td>
            </tr>
            <tr class="tr_tt">
                <td colspan="9" class="" style='padding:2px;'>
                    <?php
                    for ($i = 0; $i < ceil(count($element['eduDoc']['attach'])); $i++) {
                    ?>
                    
                    
                    
                    <img src='<?php echo $element['eduDoc']['attach'][$i]['path'] ?>' style='height:390px;margin:auto;' />	

                        
                    <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
        <!--최삳단서명-->
        <div class="confirmBox">
            <table>
                <tr>
                    <td rowspan="2" style="width:30px;vertical-align:middle;">결<br><br>재</td>
                    <td rowspan="1" style="width:100px;" >담 당</td>
                    <td rowspan="1" style="width:100px;">소 장</td>
                </tr>
                <tr class="insign">
                    <td style="height:80px;">
                        <img src="sample_sign.png" alt="">
                    </td>
                    <td style="height:80px;"><img src="sample_sign.png" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>




    <?php

    for ($i = 0; $i < ceil(count($element['eduDoc']['workers']) / 50); $i++) {
    ?>
        <div class="print_page" style="padding:50px 20px;">
            <img src="/view/images/doc_10.png" style="margin:0 auto;">
            <div style='margin-top:-1375px;margin-left:800px;font-size:17pt;'><?php echo str_replace("-", ".&nbsp&nbsp", substr($element['eduDoc']['eduDate'], 0, 10)) ?></div>
            <?php
            for ($w = 0; $w < 50; $w++) {
            ?>
                <?php if ($w < 25) { ?>
                    <div style="display:flex;margin-top:<?php if ($w == 0) echo 100 ?>px;margin-left:17px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div style="display:flex;margin-top:-<?php if ($w == 25) echo 1225 ?>px;margin-left:499px;">
                        <div class="row" style="display:flex;height:49px;">
                            <div class="col" style="flex:none;width:66px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $w + 1 + (50 * $i) ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['workers'][$w + (50 * $i)]['svName'] ?></div>
                            <div class="col" style="flex:none;width:155px;text-align:center;margin:auto;vertical-align:middle;"><?php echo $element['eduDoc']['workers'][$w + (50 * $i)]['name'] ?></div>
                            <div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><img src='<?php echo $element['eduDoc']['workers'][$w  + (50 * $i)]['sign'] ?>' style="margin:auto;height:49px"></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>

    
<?php
}

if (count($element['mgrDoc']) > 0) {
    foreach ($element['mgrDoc'] as $key => $mgrDoc) {
        
    ?>

    <?php
    foreach($mgrDoc['safetyDocs'] as $val)
    {
    
        if($val['templateType'] == 5)
        {
            $signature_n = $val['content']['signature'];				
        }

        if($val['templateType'] == 6)
        {
            $input1_value = $val['content']['input1_value'];	
            $input2_value = $val['content']['input2_value'];	
            $input3_value = $val['content']['input3_value'];	
            $input3_1_value = $val['content']['input3_1_value'];	
            $input4_value = $val['content']['input4_value'];	
            $input5_value = $val['content']['input5_value'];	
            $input6_value = $val['content']['input6_value'];	
            $input7_1_value = $val['content']['input7_1_value'];	
            $input7_2_value = $val['content']['input7_2_value'];	
            $input8_value = $val['content']['input8_value'];	
            $input9_value = $val['content']['input9_value'];	
            $input9_3_value = $val['content']['input9_3_value'];	
            $input10_value = $val['content']['input10_value'];	
            $input11_value = $val['content']['input11_value'];	
            $input12_value = $val['content']['input12_value'];	
            $input13_value = $val['content']['input13_value'];	
            $input14_address1 = $val['content']['adress1'];	
            $input14_address2 = $val['content']['adress2'];	
        
            if($val['content']['input4_value'] == 'High')
            {
                $mycondition = "✔ 좋음 / 보통 / 안좋음";
                $mycondition_ch = "✔ 好 / 普通 / 不好";						
            }
            else if($val['content']['input4_value'] == 'Middle')
            {
                $mycondition = "좋음 / ✔ 보통 / 안좋음";
                $mycondition_ch = "好 / ✔ 普通 / 不好";			
            }
            else if($val['content']['input4_value'] == 'Low')
            {
                $mycondition = "좋음 / 보통 / ✔ 안좋음";
                $mycondition_ch = "好 / 普通 / ✔ 不好";		
            }


            if($val['content']['input10_value'] == 'X')
            {
                $havedisease = "있다  ( 고혈압, 심장, 당뇨, 디스크, 기타 ) / ✔ 없다";
                $havedisease_ch = "YES  (血压高，心脏，糖尿，关节, 其他...) / ✔ NO";
                
            }
            else
            {
                if($val['content']['input10_value'] == 'disc')
                {
                    $havedisease = "있다  (고혈압, 심장, 당뇨, ✔ 디스크, 기타) / 없다";
                    $havedisease_ch = "YES  (血压高，心脏，糖尿，✔ 关节, 其他...) / NO";
                }
                else if($val['content']['input10_value'] == 'heart')
                {
                    $havedisease = "있다  (고혈압, ✔ 심장, 당뇨, 디스크, 기타) / 없다";
                    $havedisease_ch = "YES  (血压高，✔ 心脏，糖尿，关节, 其他...) / NO";
                }	
                else if($val['content']['input10_value'] == 'hbp')
                {
                    $havedisease = "있다  (✔ 고혈압, 심장, 당뇨, 디스크, 기타) / 없다";
                    $havedisease_ch = "YES (✔ 血压高，心脏，糖尿，关节, 其他...) / NO";
                }
                else if($val['content']['input10_value'] == 'diabetes')
                {
                    $havedisease = "있다  (고혈압, 심장, ✔ 당뇨, 디스크, 기타) / 없다";
                    $havedisease_ch = "YES  (血压高，心脏，✔ 糖尿，关节, 其他...) / NO";
                }
                else if($val['content']['input10_value'] == 'etcs')
                {
                    $havedisease = "있다  ( 고혈압, 심장, 당뇨, 디스크, ✔ 기타 ) / 없다";
                    $havedisease_ch = "YES  (血压高，心脏，糖尿，关节, ✔ 其他...) / NO";
                }

    
            }

            if($val['content']['input8_value'] == 'O')
            {
                $haveaccident = "✔ YES 있다 / NO 없다";						
            }
            else
            {
                $haveaccident = "YES 있다 / ✔ NO 없다";
            }

            if($val['content']['input9_value'] == 'O')
            {
                $haveaccidentcom = "✔ YES 있다 / NO 없다";						
            }
            else
            {
                $haveaccidentcom = "YES 있다 / ✔ NO 없다";
            }


        }

        if($val['templateType'] == 4)
        {
            $chk_input_1 = $val['content']['input1'];				
            $chk_input_2 = $val['content']['input2'];				
            $chk_input_3 = $val['content']['input3'];				
            $chk_input_4 = $val['content']['input4'];				
            $chk_input_5 = $val['content']['input5'];				
            $chk_input_6 = $val['content']['input6'];				
            $chk_input_7 = $val['content']['input7'];				
        }
    }
    ?>
    
        
        <div class="print_page newTable" style="padding:0px 15px ;position:relative;">
            <table class="pr_tb">
                <tr style='border:0;'>
                    <td class="td_toptit full" style="" rowspan="1" colspan="9">신규채용자 안전보건교육 이수확인서 新雇用者的安全保健教育进修证书 </td>

                </tr>
                <tr style='border:0;'>
                    <td colspan="4" class="td_topsname" style="">
                        <p style=''>현장명 : <?php echo $element['eduDoc']['siteName'] ?></p>	
                    </td>
                    <td style="width:10%;">&nbsp;</td>
                    
                    <td  colspan="4" class="td_topsname2" style="">
                        ※ 신분증/기초안전보건교육증은 확인 후 돌려드립니다.
                    </td>
                </tr>
                <tr>
                    <td  colspan="4" class="new_grouttit" style="">
                        1. 기본 인적 사항
                    </td>
                    
                    <td  colspan="5" class="new_datetop" style="">
                        <div class="wrap">
                            <div class="leftbox">
                                <p>신규교육일</p>
                                <p>新规定教育日</p>
                            </div>
                            <div class="rightbox">
                                <p>
                                    
                                    <?php echo date("Y년(年) m월(月) d일(日)", strtotime( $element['eduDoc']['eduDate'] ) ); ?>

                                </p>                            
                            </div>
                        </div>
                    </td>
                    
                </tr>
                <tr class="tr_tt">
                    <td colspan="1" class="td_name_new"style="">소 속<br>所属</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $element['eduDoc']['workers'][$key]["svName"]; ?></td>
                    <td colspan="1" class="td_name_new"style="">직 종<br>工种</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $input1_value; ?></td>
                    <td colspan="1" class="td_name_new"style="">팀 장<br>部长</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $input11_value; ?></td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="1" class="td_name_new"style="">성 명<br>姓名</td>
                    <td colspan="2" class="new_tdtxt td_tar" style=""><?php echo $element['eduDoc']['workers'][$key]["name"]; ?> &nbsp;&nbsp;&nbsp;(인)</td>
                    <td colspan="1" class="td_name_new"style="">주 소<br>地址</td>
                    <td colspan="5" class="new_tdtxt " style=""><?php echo $input14_address1; ?><?php echo $input14_address2; ?></td></td>

                    
                </tr>
                <tr class="tr_tt">
                    <td colspan="1" class="td_name_new"style="">생년월일<br>出生日期</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo date("Y년 m월 d일", strtotime( $mgrDoc['userInfo']['birth'] ) ); ?></td>
                    <td colspan="1" class="td_name_new"style="">연락처<br>联络处</td>
                    <td colspan="2" class="new_tdtxt" style="">(H.P) <?php echo $input12_value; ?></td>
                    <td colspan="1" class="td_name_new"style="">자 택<br>私宅</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $input13_value; ?></td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="1" class="td_name_new"style="">국 적<br>国籍</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $mgrDoc['userInfo']['national']; ?></td>
                    <td colspan="1" class="td_name_new"style="">긴급연락처<br>紧急联络处</td>
                    <td colspan="2" class="new_tdtxt" style="">(성명姓名) <?php echo $input3_value; ?><br>(관계关系) <?php echo $input3_1_value; ?></td>
                    <td colspan="1" class="td_name_new"style="">전 화<br>电話</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $input2_value; ?></td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="1" class="td_name_new"style="">현재 건강상태<br>目前的健康</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $mycondition; ?><br><?php echo $mycondition_ch; ?></td>
                    <td colspan="1" class="td_name_new"style="">혈액형<br>血型</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $input5_value; ?></td>
                    <td colspan="1" class="td_name_new"style="">혈 압<br>血压</td>
                    <td colspan="2" class="new_tdtxt" style=""><?php echo $input6_value; ?> (mmHg)</td>
                </tr>
                <tr>
                    <td  colspan="5" class="new_grouttit" style="">
                        2. 자격 / 과거병력 资格 / 过去兵力
                    </td>
                    
                    <td  colspan="4" class="new_datetop bpbox" style="">
                        <div class="wrap" style="font-size: 16px">
                            혈압용지 부착 血压用地 附着地 附着
                            
                        </div>
                    </td>
                    
                </tr>
                <tr class="tr_tt">
                    <td colspan="4" class="td_name_new2"style="">1. 이 일(작업)을 시작한 지 얼마나 되었습니까?<br>你是怎么开始做这个？</td>
                    <td colspan="5" class="new_tdtxt2" style=""><?php echo $input7_1_value; ?> 년年   <?php echo $input7_2_value; ?> 개월月</td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="4" class="td_name_new2"style="">2. 과거에 작업 중 재해를 입은 적이 있습니까?<br>你在过去的工作中不断遭遇意外？</td>
                    <td colspan="5" class="new_tdtxt2" style=""><?php echo $haveaccident; ?><!--✔ 있다YES  없다NO--></td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="4" class="td_name_new2"style="">있다면, 과거에 산재처리를 한 적 있습니까?<br>如果有曾在过去零星的治疗？</td>
                    <td colspan="2" class="new_tdtxt2" style=""><?php echo $haveaccidentcom; ?><!--✔ 있다YES  없다NO--></td>
                    <td colspan="1" class="new_tdtxt2" style="">부위명 :<br>网站名称</td>
                    <td colspan="2" class="new_tdtxt2" style=""><?php echo $input9_3_value; ?></td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="4" class="td_name_new2"style="">3. 의사에게 주의를 받은 병이 있습니까?<br>这是否收到病厉医生照顾？</td>
                    <td colspan="5" class="new_tdtxt2" style=""><?php echo $havedisease; ?><br><?php echo $havedisease_ch; ?></td>
                </tr>
                <tr>
                    <td  colspan="5" class="new_grouttit" style="padding:10px 0;">
                        3. 안전수칙준수서약서 安全守则遵守誓约书
                    </td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="8" class="td_name_new2"style="text-align:left;font-size: 16px;">■ 본인 확인란 : 작업자 본인이 필히 확인 후 " V " 표시해 주세요. 签名盖章</td>
                    <td colspan="1" class="new_tdtxt2" style="width:9%;font-size: 15px;">본인확인<br>本人证实</td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="8" class="td_name_new_sm"style="">1.작업장내에서는 안전보호구(안전모,턱끈, 안전벨트, 안전화, 보안경, 방진마스크,각반등) 를 반드시 착용하겠습니다.<br>在我的工作场所的安全防护装备（头盔，颏带，安全带，安全鞋，防护眼镜，防尘口罩，打底裤等）将被磨损。</td>
                    <td colspan="1" class="new_tdtxt2" style="width:9%;">✔</td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="8" class="td_name_new_sm"style="">2.안전조회는 반드시 참석하겠습니다.(안전조회장)<br>我们必须参加安全调查。</td>
                    <td colspan="1" class="new_tdtxt2" style="width:9%;">✔</td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="8" class="td_name_new_sm"style="">3.작업 중 흡연 및 음주 후 절대 작업하지 않겠습니다.<br>我不想在操作过程中吸烟和饮酒。</td>
                    <td colspan="1" class="new_tdtxt2" style="width:9%;">✔</td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="8" class="td_name_new_sm"style="">4.정해진 작업발판[폭 40CM이상], 사다리[전도방지대] , B/T 비계[난간,아웃트리거등]를 사용하겠습니다.<br>固定脚手架的工作（宽40厘米及以上），我们将使用梯子（预防跌倒），B / T脚手架（栏杆，支腿等）</td>
                    <td colspan="1" class="new_tdtxt2" style="width:9%;">✔</td>
                </tr>
                <tr class="tr_tt">
                    <td colspan="8" class="td_name_new_sm"style="">5.기타 호반캠폐인 4무 4행 4금 운동 및  현장 안전관리규정과 작업안전수칙을 철저히 준수하겠습니다.<br>其他运动湖滨四无四行四禁运动，并会完全遵守安全规则和工作现场的安全。</td>
                    <td colspan="1" class="new_tdtxt2" style="width:9%;">✔</td>
                </tr>
                <tr>
                    <td  colspan="9" class="new_grouttit" style="padding:10px 0;">
                        4. 개인보호구 수령확인서 个人防护收到确认
                    </td>
                </tr>
                <tr class="tr_tt">
                    <td  colspan="9" class=""  style="padding:10px;">
                        <table class="myitem_table">
                            <tr class="myitem_hd">
                                <th>안전모 安全帽</th>
                                <th>안전화 安全鞋</th>
                                <th>안전벨트 安全带</th>
                                <th>각반 绑腿</th>
                                <th>방진마스크 防尘面具</th>
                                <th>보안경 保护镜</th>
                                <th>기타 其他</th>
                            </tr>
                            <tr class="myitem_td">
                                <td><?php if($chk_input_1 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>
                                <td><?php if($chk_input_2 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>
                                <td><?php if($chk_input_3 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>
                                <td><?php if($chk_input_4 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>
                                <td><?php if($chk_input_5 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>
                                <td><?php if($chk_input_6 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>
                                <td><?php if($chk_input_7 == '현장지급'){ ?> <img src="<?php echo $signature_n; ?>" alt=""><?php } ?></td>                            
                            </tr>

                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td  colspan="9" class="new_grouttit" style="padding:10px 0;">
                        ※ 특이사항 : 
                    </td>
                </tr>
                <tr>
                    <td  colspan="9" class="new_grouttit" style="font-size: 13px;padding:10px 0 20px">
                        [개인정보동의관련] 제출된 안전서류는 작업안전관리 · 작업원의 적정배치 · 긴급시의 각 연락 · 그외 현장 안전 운영의 목적 이외에는 이용하지 않습니다.
                        
                    </td>
                </tr>


                
            </table>

        </div>
<?php
    }
}

?>
