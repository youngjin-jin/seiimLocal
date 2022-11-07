<link href="/view/css/print_dl.css" rel="stylesheet" type="text/css">

<!--<?php print_r($element['eduDoc']); ?>-->
<?php
if ($element['eduDoc']['cat1Id'] == 95) {
	//1: 정기안전보건교육(근로자)
?>
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_new_doc/dl_doc_01.jpg" style="margin:0 auto;">
		<div style="margin-top:-1306px;margin-left:214px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:12px;margin-left:588px;">
			<div class="row" style="display:flex;">
				<!--<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>-->
				<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
			</div>
		</div>
		<div style="margin-top:9px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:233px;margin-left:102px;padding-top:20px;;text-align:center;height:44px;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:-8px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?>명</div>
			</div>
		</div>
		<div style="margin-top:27px;margin-left:223px;">
			<div class="row" style="display:flex;height:30px;">
				<div class="col" style="flex:none;width:323px;text-align:left;"><?php echo $element['eduDoc']['foredu'] ?></div>				
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:86px;margin-left:538px;margin-bottom:35px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:443px;height:589px;padding-top:22px"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
		<div style="margin-top:48px;margin-left:93px;margin-bottom:153px;height:246px">
			<div class="row" style="display:flex;height:100%;">
				<div class="col" style="width:441px">
					<?php if($element['eduDoc']['attach'][0]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][0]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>
				</div>				
				<div class="col" style="width:445px">
					<?php if($element['eduDoc']['attach'][1]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][1]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>					
				</div>				
			</div>
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
							<div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
							<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
} else if ($element['eduDoc']['cat1Id'] == 96) {
	//2. 정기안전보건교육(관리감독자)
?>
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_new_doc/dl_doc_02.jpg" style="margin:0 auto;">
		<div style="margin-top:-1306px;margin-left:214px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:12px;margin-left:588px;">
			<div class="row" style="display:flex;">
				<!--<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>-->
				<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
			</div>
		</div>
		<div style="margin-top:9px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:233px;margin-left:102px;padding-top:20px;;text-align:center;height:44px;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:-8px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?>명</div>
			</div>
		</div>
		<div style="margin-top:27px;margin-left:223px;">
			<div class="row" style="display:flex;height:30px;">
				<div class="col" style="flex:none;width:323px;text-align:left;"><?php echo $element['eduDoc']['foredu'] ?></div>				
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:86px;margin-left:538px;margin-bottom:35px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:443px;height:589px;padding-top:22px"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
		<div style="margin-top:48px;margin-left:93px;margin-bottom:153px;height:246px">
			<div class="row" style="display:flex;height:100%;">
				<div class="col" style="width:441px">
					<?php if($element['eduDoc']['attach'][0]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][0]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>
				</div>				
				<div class="col" style="width:445px">
					<?php if($element['eduDoc']['attach'][1]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][1]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>					
				</div>				
			</div>
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
							<div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
							<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
} else if ($element['eduDoc']['cat1Id'] == 94) {
	//3: 신규채용자안전보건교육
?>
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_new_doc/dl_doc_03.jpg" style="margin:0 auto;">
		<div style="margin-top:-1306px;margin-left:214px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:12px;margin-left:588px;">
			<div class="row" style="display:flex;">
				<!--<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>-->
				<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
			</div>
		</div>
		<div style="margin-top:9px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:233px;margin-left:102px;padding-top:20px;;text-align:center;height:44px;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:-8px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?>명</div>
			</div>
		</div>
		<div style="margin-top:27px;margin-left:223px;">
			<div class="row" style="display:flex;height:30px;">
				<div class="col" style="flex:none;width:323px;text-align:left;"><?php echo $element['eduDoc']['foredu'] ?></div>				
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:86px;margin-left:538px;margin-bottom:35px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:443px;height:589px;padding-top:22px"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
		<div style="margin-top:48px;margin-left:93px;margin-bottom:153px;height:246px">
			<div class="row" style="display:flex;height:100%;">
				<div class="col" style="width:441px">
					<?php if($element['eduDoc']['attach'][0]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][0]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>
				</div>				
				<div class="col" style="width:445px">
					<?php if($element['eduDoc']['attach'][1]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][1]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>					
				</div>				
			</div>
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
							<div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
							<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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




	<div class="print_page" style="padding:50px 20px;min-height: 1521px;">
		<img src="/view/images/dl_new_doc/dl_doc_pic.jpg" style="margin:0 auto;">

	<?php

	 foreach ($element['mgrDoc'] as $key => $mgrDoc) {
		//$mgrDoc['userInfo']['oshImg']
		//$mgrDoc['userInfo']['idcard']
		$cnt = $key + 1;
	?>
		<?php if($cnt % 2 == 0) { ?>
			<div style="display:flex;margin-top:66px;margin-left:101px;font-size:20pt;margin-bottom:18px;width:830px;height:607px;">
			
		<?php } else { ?>
			<div style="display:flex;margin-top:-1397px;margin-left:101px;font-size:20pt;margin-bottom:18px;width:830px;height:607px;">
		<?php } ?>
			<div class="row" style="display:flex;height:100%;width:100%;">
				<div class="col" style="display: flex;justify-content: center;align-items: center;width: 100%;">
					<img src='<?php echo $mgrDoc['userInfo']['oshImg'] ?>' style='margin:auto;object-fit:scale-down;max-height:100%' />
				</div>					
			</div>				
		</div>		
		<?php if($cnt % 2 == 0 &&  $cnt != count($element['mgrDoc'])) { ?>
		</div>
		<div class="print_page" style="padding:50px 20px;min-height: 1521px;">
			<img src="/view/images/dl_new_doc/dl_doc_pic.jpg" style="margin:0 auto;">
		<?php } ?>
	<?php
	} ?>

	</div>

	<!-- asdf -->
	
<?php
if (count($element['mgrDoc']) > 0) {
    foreach ($element['mgrDoc'] as $key => $mgrDoc) {
        //print_r($mgrDoc['userInfo']);		
		//$mgrDoc['userInfo']['birth']
		foreach($mgrDoc['safetyDocs'] as $val)
		{
			if($val['templateType'] == 8)
			{
				$gear_1 = $val['content']['input1'];
				$gear_2 = $val['content']['input2'];
				$gear_3 = $val['content']['input3'];
				$gear_4 = $val['content']['input4'];
				$gear_5 = $val['content']['input5'];
				$gear_6 = $val['content']['input6'];
				$gear_etc = $val['content']['input7'];
				$upDate = $val['updatedAt'];
			}
			if($val['templateType'] == 9)
			{
				$userSign = $val['sign'];
				

			}
			if($val['templateType'] == 10)
			{
				$testVal = $val['content']['input1'];
				$upDateTest = $val['updatedAt'];				

			}
			if($val['templateType'] == 11)
			{
				
				$jobType = $val['content']['input2'];
				$jobCaptain = $val['content']['input3'];

				$bloodTypes = $val['content']['input4'];
				$baseHealth = $val['content']['input5'];
				$baseHealthlev = $val['content']['input6'];
				$beforeSurgeon = $val['content']['input7'];
				$beforeSurgeonw = $val['content']['input8'];
				$beforeSj = $val['content']['input9'];
				$beforeSjw = $val['content']['input10'];
				$smoked = $val['content']['input11'];
				$drinked = $val['content']['input12'];
				$sleeped = $val['content']['input13'];
				

				$jobYear = $val['content']['input14_1'];
				$jobMonth = $val['content']['input14_2'];
				$telHome = $val['content']['input15'];
				$emergencyPhone = $val['content']['input16'];
				$emergencyWho = $val['content']['input17'];

				$upDateMd = $val['updatedAt'];


				
			}
			if($val['templateType'] == 12)
			{
				
				$birth_time   = strtotime($userBirth);
				$nowTime          = date('Ymd');
				$birthdayCal     = date('Ymd' , $birth_time);
				$userAge           = floor(($nowTime - $birthdayCal) / 10000);

				$nowWorkname = $val['content']['input1_1'];
				$nowWorkyear = $val['content']['input1_2'];
				$nowWorkmonth = $val['content']['input1_3'];
				$workTime = $val['content']['input2_1'];
				$workRestmin = $val['content']['input2_2'];
				$workRestnum = $val['content']['input2_3'];
				$beforeWorkname = $val['content']['input3_1'];
				$beforeWorkyear = $val['content']['input3_2'];
				$beforeWorkmonth = $val['content']['input3_3'];
				
				$mq1 = $val['content']['input4_1'];
				$mq1_etc = $val['content']['input4_2'];

				$mq2 = $val['content']['input5'];
				
				$mq3 = $val['content']['input6_1'];
				$mq3_now = $val['content']['input6_3'];
				$mq3_what = $val['content']['input6_2'];
				
				$mq4 = $val['content']['input7_1'];
				$mq4_what = $val['content']['input7_2'];

				$mq5 = $val['content']['input8'];
				
				$mq6 = $val['content']['input9'];
				
				$pain_where = $val['content']['input10'];
				
				
				$neck_q1 = $val['content']['part_1_1_value'];
				$neck_q2 = $val['content']['part_1_2_value'];
				$neck_q3 = $val['content']['part_1_3_value'];
				$neck_q4 = $val['content']['part_1_4_value'];
				$neck_q5 = $val['content']['part_1_5_value'];
				$neck_q5_etc = $val['content']['part_1_6_value'];

				$shoulder_q1 = $val['content']['part_2_1_value'];
				$shoulder_q2 = $val['content']['part_2_2_value'];
				$shoulder_q3 = $val['content']['part_2_3_value'];
				$shoulder_q4 = $val['content']['part_2_4_value'];
				$shoulder_q5 = $val['content']['part_2_5_value'];
				$shoulder_q6 = $val['content']['part_2_6_value'];
				$shoulder_q6_etc = $val['content']['part_2_7_value'];

				$arm_q1 = $val['content']['part_3_1_value'];
				$arm_q2 = $val['content']['part_3_2_value'];
				$arm_q3 = $val['content']['part_3_3_value'];
				$arm_q4 = $val['content']['part_3_4_value'];
				$arm_q5 = $val['content']['part_3_5_value'];
				$arm_q6 = $val['content']['part_3_6_value'];
				$arm_q6_etc = $val['content']['part_3_7_value'];

				$hand_q1 = $val['content']['part_4_1_value'];
				$hand_q2 = $val['content']['part_4_2_value'];
				$hand_q3 = $val['content']['part_4_3_value'];
				$hand_q4 = $val['content']['part_4_4_value'];
				$hand_q5 = $val['content']['part_4_5_value'];
				$hand_q6 = $val['content']['part_4_6_value'];
				$hand_q6_etc = $val['content']['part_4_7_value'];

				$back_q1 = $val['content']['part_5_1_value'];
				$back_q2 = $val['content']['part_5_2_value'];
				$back_q3 = $val['content']['part_5_3_value'];
				$back_q4 = $val['content']['part_5_4_value'];
				$back_q5 = $val['content']['part_5_5_value'];
				$back_q5_etc = $val['content']['part_5_6_value'];

				$leg_q1 = $val['content']['part_6_1_value'];
				$leg_q2 = $val['content']['part_6_2_value'];
				$leg_q3 = $val['content']['part_6_3_value'];
				$leg_q4 = $val['content']['part_6_4_value'];
				$leg_q5 = $val['content']['part_6_5_value'];
				$leg_q6 = $val['content']['part_6_6_value'];
				$leg_q6_etc = $val['content']['part_6_7_value'];

				$upDateMed = $val['updatedAt'];


				


				
			}
			if($val['templateType'] == 13)
			{
				$haveDs = $val['content']['input1'];
				$beforeDs = $val['content']['input2'];
				$beforeMed = $val['content']['input3'];
				$docSay = $val['content']['input4'];
				$healthNow = $val['content']['input5'];

				$blood_max = $val['content']['input6'];
				$blood_min = $val['content']['input7'];
				$bloodSugar = $val['content']['input8'];
				$oneLeg = $val['content']['input9'];
				$standWalk = $val['content']['input10'];
				$straight = $val['content']['input11'];

				$upDatemtest = $val['updatedAt'];

				
			}
		}

		$birth_array = explode('-', substr($mgrDoc['userInfo']['birth'], 0, 10));
		$userBirth = $birth_array[0] . '년 ' . $birth_array[1] . '월 ' . $birth_array[2] . '일';


	
?>


	<!--신규_새폼-->

    <div class="print_page" style="padding:0px 0;position:relative">
		<img src="/view/images/dl_doc/dl_doc_01.jpg" style="margin:0 auto;width:100%">
		<div class="pwrap" style="position: absolute;top:145px;left:80px;">
			<div class="box"style="margin-top:53px;margin-left: 307px;height:25px;">
				<?php if($mgrDoc['userInfo']['national'] == "대한민국(Republic of Korea)"){ ?>
					<span class="chk1">✔</span>
				<?php } else { ?>
					<span class="chk2"  style="position:absolute;left:436px;">✔</span>										
				<?php } ?>	
				<span class="txt1" style="position: absolute;left: 766px;font-size: 17px;">
					<?php if($mgrDoc['userInfo']['national'] == "대한민국(Republic of Korea)"){ ?>
						대한민국
					<?php } else { ?>
						<?php echo $mgrDoc['userInfo']['national'] ?>									
					<?php } ?>											
				</span>
			</div>
			<div class="box type1">
				<div class="row" style="margin-top: 6px;" >
					<div class="name"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></div>
					<div class="birth"style=""><span><?php echo $userBirth; ?></div>
				</div>
				<div class="row">
					<div class="type"><?php echo $jobType; ?></div>
					<div class="com"><?php echo $mgrDoc['userInfo']['svName'] ?></div>
				</div>			
				<div class="row" style="margin-top: 19px;">
					<div class="tdate">
						<span><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
					</div>
					<div class="ttime"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
					<div class="tteach">
						<span><?php echo $element['eduDoc']['instructor'] ?></span>
						<span> </span>
					</div>
				</div>
				<div class="row"style="margin-top:20px;">
					<div class="add">
						<?php echo $mgrDoc['userInfo']['addr1'] . ' ' . $mgrDoc['userInfo']['addr2'] ?>
					</div>
					<div class="tel">
						<?php echo add_hyphen($mgrDoc['userInfo']['phone1']) ?>
					</div>
				</div>				
			</div>
			<div class="box type2">
				<div class="row">
					<div class="equipbox">
						
						<!--지급받았을시-->
						<?php if($gear_1 == "현장지급"){ ?><span class="date"><?php echo date( 'Y.m.d', strtotime($upDate)); ?></span><?php } ?>
						<!--보유체크했을 시-->
						<?php if($gear_1 == "개인보유"){ ?><span class="circle"></span><?php } ?>
						<div class="sign">
							<?php if($gear_1 == "해당없음"){ ?>
								
							<?php } else { ?>
								<img src="<?php echo $userSign; ?>" alt="">
							<?php } ?>
						</div>
					</div>
					<div class="equipbox">
						<!--지급받았을시-->
						<?php if($gear_2 == "현장지급"){ ?><span class="date"><?php echo date( 'Y.m.d', strtotime($upDate)); ?></span><?php } ?>
						<!--보유체크했을 시-->
						<?php if($gear_2 == "개인보유"){ ?><span class="circle"></span><?php } ?>
						<div class="sign">
							<?php if($gear_2 == "해당없음"){ ?>
								
							<?php } else { ?>
								<img src="<?php echo $userSign; ?>" alt="">
							<?php } ?>
						</div>
					</div>
					<div class="equipbox">
						<!--지급받았을시-->
						<?php if($gear_3 == "현장지급"){ ?><span class="date"><?php echo date( 'Y.m.d', strtotime($upDate)); ?></span><?php } ?>
						<!--보유체크했을 시-->
						<?php if($gear_3 == "개인보유"){ ?><span class="circle"></span><?php } ?>
						<div class="sign">
							<?php if($gear_3 == "해당없음"){ ?>
								
							<?php } else { ?>
								<img src="<?php echo $userSign; ?>" alt="">
							<?php } ?>
						</div>
					</div>
					<div class="equipbox">
						<!--지급받았을시-->
						<?php if($gear_4 == "현장지급"){ ?><span class="date"><?php echo date( 'Y.m.d', strtotime($upDate)); ?></span><?php } ?>
						<!--보유체크했을 시-->
						<?php if($gear_4 == "개인보유"){ ?><span class="circle"></span><?php } ?>
						<div class="sign">
							<?php if($gear_4 == "해당없음"){ ?>
								
							<?php } else { ?>
								<img src="<?php echo $userSign; ?>" alt="">
							<?php } ?>
						</div>
					</div>
					<div class="equipbox">
						<!--지급받았을시-->
						<?php if($gear_5 == "현장지급"){ ?><span class="date"><?php echo date( 'Y.m.d', strtotime($upDate)); ?></span><?php } ?>
						<!--보유체크했을 시-->
						<?php if($gear_5 == "개인보유"){ ?><span class="circle"></span><?php } ?>
						<div class="sign">
							<?php if($gear_5 == "해당없음"){ ?>
								
							<?php } else { ?>
								<img src="<?php echo $userSign; ?>" alt="">
							<?php } ?>
						</div>
					</div>
					<div class="equipbox">
						<!--지급받았을시-->
						<?php if($gear_6 == "현장지급"){ ?><span class="date"><?php echo date( 'Y.m.d', strtotime($upDate)); ?></span><?php } ?>
						<!--보유체크했을 시-->
						<?php if($gear_6 == "개인보유"){ ?><span class="circle"></span><?php } ?>
						<div class="sign">
							<?php if($gear_6 == "해당없음"){ ?>
								
							<?php } else { ?>
								<img src="<?php echo $userSign; ?>" alt="">
							<?php } ?>
						</div>
					</div>
					<div class="equipbox">
						<span class="date" style="font-size: 14px;"><?php echo $gear_etc; ?></span>
					</div>


				</div>

			</div>
			<div class="box type3">
				<div class="row">
					<span class="test1"><?php echo $testVal; ?></span>
					<span class="test2"></span>
				</div>
				<div class="subbox">
					<span class="temp"></span>
					<span class="date"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
					<span class="name"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
				</div>
			</div>
			<div class="box type4">
				<div class="row btype circletype">
					<?php if($bloodTypes == "A"){ ?><span class="A"></span><?php } ?>
					<?php if($bloodTypes == "B"){ ?><span class="B"></span><?php } ?>
					<?php if($bloodTypes == "O"){ ?><span class="O"></span><?php } ?>
					<?php if($bloodTypes == "AB"){ ?><span class="AB"></span><?php } ?>
				</div>
				<div class="row">				
					<div class="health1 circletype" style="width:52%;height: 50px;">
						<?php if($baseHealth == "O"){ ?><span class="Y"></span><?php } ?>
						<?php if($baseHealth == "X"){ ?><span class="N"></span><?php } ?>
					</div>
					<div class="health2 circletype"style="width:48%;height: 50px;">
						<?php if($baseHealthlev == "High"){ ?><span class="H"></span><?php } ?>
						<?php if($baseHealthlev == "Middle"){ ?><span class="M"></span><?php } ?>
						<?php if($baseHealthlev == "Low"){ ?><span class="L"></span><?php } ?>
					</div>					
				</div>
				<div class="subbox">
					<div class="circletype" style="width:30%;height: 30px;">
						<?php if($beforeSurgeon == "O"){ ?><span class="Y"></span><?php } ?>
						<?php if($beforeSurgeon == "X"){ ?><span class="N"></span><?php } ?>
					</div>
					<span class="dname"><?php echo $beforeSurgeonw; ?></span>
					<span class="sign"><img src="<?php echo $userSign ?>" alt=""></span>
				</div>
				<div class="subbox">
					<div class="circletype" style="width:30%;height: 30px;">
						<?php if($beforeSj == "O"){ ?><span class="Y"></span><?php } ?>
						<?php if($beforeSj == "X"){ ?><span class="N"></span><?php } ?>

					</div>
					<span class="dname"><?php echo $beforeSjw; ?></span>
					<span class="sign"><img src="<?php echo $userSign ?>" alt=""></span>
				</div>
				<div class="subbox"style="height:30px;">
					<span class="smoke"><?php echo $smoked; ?></span>
					<span class="drink"><?php echo $drinked; ?></span>
					<span class="sleep"><?php echo $sleeped; ?></span>
				</div>
				<div class="row">
					<span class="year"><?php echo $jobYear; ?></span>
					<span class="telfam"><?php echo $emergencyPhone; ?><span><?php echo $emergencyWho; ?></span></span>
				</div>

			</div>

		</div>
		

	</div>

	<div class="print_page" style="padding:0px 0;position: relative;">
		<img src="/view/images/dl_doc/dl_doc_02.jpg" style="margin:0 auto;width:100%">
		<span class="p2 chk1 Y">✔</span>
		<!--<span class="p2 chk1 N">✔</span>-->

		<span class="p2 chk2 Y">✔</span>
		<!--<span class="p2 chk2 N">✔</span>-->

		<span class="p2 chk3 Y">✔</span>
		<!--<span class="p2 chk3 N">✔</span>-->

		<span class="p2 chk4 Y">✔</span>
		<!--<span class="p2 chk4 N">✔</span>-->

		<span class="p2 date"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
		<span class="p2 name"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
		
	</div>
	<!--신규채용자 문서끝-->
	<!--자율안전서약서(신규근로자) 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_03.jpg" style="margin:0 auto;width:100%">
		<div class="p3 pwrap" style="position: absolute;top:192px;left:60px;">
			<div class="row" style="height:58px;width:100%;">
				<span class="name"><?php echo $mgrDoc['userInfo']['name'] ?></span>
				<span class="birth"><?php echo $userBirth; ?>(<?php echo $userAge; ?>세)</span>
			</div>
			<div class="row" style="height:55px;width:100%;">
				<div class="nation">
					<?php if($mgrDoc['userInfo']['national'] == "대한민국(Republic of Korea)"){ ?>
						<span class="chk1">✔</span>
					<?php } else { ?>
						<span class="chk2">✔</span>					
						<span class="namenation"><?php echo $mgrDoc['userInfo']['national'] ?></span>
					<?php } ?>					
				</div>
				<div class="job">
					<span><?php echo $jobType; ?></span>
				</div>
			</div>
			<div class="row" style="height:56px;width:100%;">
				<span class="addr"><?php echo $mgrDoc['userInfo']['addr1'] ?>, <?php echo $mgrDoc['userInfo']['addr2'] ?></span>
			</div>
			<div class="row" style="height:56px;width:100%;">
				<span class="mtel"><?php echo add_hyphen($mgrDoc['userInfo']['phone1']) ?></span>
				<span class="ftel"><?php echo $emergencyPhone; ?></span>
			</div>
			<div class="row" style="margin-top: 770px;width:100%;">
				<div class="sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></div>
				<div class="sname"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></div>
			</div>
			
		</div>
		
	</div>

	<!--자율안전서약서(신규근로자) 문서끝-->
	<!--동의서 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_04.jpg" style="margin:0 auto;width:100%">
		
		<span class="p4 sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
		<span class="p4 include"><?php echo $mgrDoc['userInfo']['svName'] ?></span>
		<span class="p4 sname"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
		
	</div>
	<!--동의서 문서끝-->
	<!--자율안전서약서(신규장비) 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_05.jpg" style="margin:0 auto;width:100%">
		<div class="p3 pwrap" style="position: absolute;top:192px;left:60px;">
			<div class="row" style="height:58px;width:100%;">
				<span class="name"><?php echo $mgrDoc['userInfo']['name'] ?></span>
				<span class="birth"><?php echo $userBirth; ?>(<?php echo $userAge; ?>세)</span>
			</div>
			<div class="row" style="height:55px;width:100%;">
				<div class="nation">
					<?php if($mgrDoc['userInfo']['national'] == "대한민국(Republic of Korea)"){ ?>
						<span class="chk1">✔</span>
					<?php } else { ?>
						<span class="chk2">✔</span>					
						<span class="namenation"><?php echo $mgrDoc['userInfo']['national'] ?></span>
					<?php } ?>	
				</div>
				<div class="job">
					<span><?php echo $jobType; ?></span>
				</div>
			</div>
			<div class="row" style="height:56px;width:100%;">
				<span class="addr"><?php echo $mgrDoc['userInfo']['addr1'] ?>, <?php echo $mgrDoc['userInfo']['addr2'] ?></span>
			</div>
			<div class="row" style="height:56px;width:100%;">
				<span class="mtel"><?php echo add_hyphen($mgrDoc['userInfo']['phone1']) ?></span>
				<span class="ftel"><?php echo $emergencyPhone; ?></span>
			</div>
			<div class="row" style="margin-top: 788px;width:100%;">
				<div class="sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></div>
				<div class="sname"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></div>
			</div>
			
		</div>
	</div>
	<!--자율안전서약서(신규장비) 문서끝-->
	<!--동의서(신규장비) 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_06.jpg" style="margin:0 auto;width:100%">
		<span class="p6 sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
		<span class="p6 include"><?php echo $mgrDoc['userInfo']['svName'] ?></span>
		<span class="p6 sname"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
	</div>
	<!--동의서(신규장비) 문서끝-->
	<!--근골격계질환 증상조사표 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_07.jpg" style="margin:0 auto;width:100%">
		<div class="p7 pwrap" style="position: absolute;top:234px;left:60px;">
			<div class="box"style="width:964px;text-align:right;">
				<span class="sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDateMed)); ?></span>
				<div class="row">
					<div class="name"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></div>
					<div class="age"><?php echo $userAge; ?></div>
				</div>
				<div class="row">
					<div class="sex">
						<?php if($mgrDoc['userInfo']['isMale'] == "1"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($mgrDoc['userInfo']['isMale'] == "0"){ ?><span class="chk2">✔</span><?php } ?>						
					</div>
					<div class="exp">
						<span class="year"><?php echo $jobYear; ?></span>
						<span class="month"><?php echo $jobMonth; ?></span>
					</div>				
				</div>
				<div class="row"style="height:78px;">
					<div class="lc">
						<span class="comp"><?php echo $mgrDoc['userInfo']['svName'] ?></span>
						<span class="type"><?php echo $jobType; ?></span>
					</div>
					<div class="marry">
						<?php if($mgrDoc['userInfo']['married'] == "1"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($mgrDoc['userInfo']['married'] == "0"){ ?><span class="chk2">✔</span><?php } ?>						
					</div>					
				</div>
				<div class="subbox">
					<span class="workname"><?php echo $nowWorkname; ?></span>
					<span class="workhist">
						<span class="year"><?php echo $nowWorkyear; ?></span>
						<span class="month"><?php echo $nowWorkmonth; ?></span>
					</span>
				</div>
				<div class="subbox">
					<span class="time"><?php echo $workTime; ?></span>
					<span class="min"><?php echo $workRestmin; ?></span>
					<span class="rest"><?php echo $workRestnum; ?></span>
				</div>
				<div class="subbox" style="margin-top: 20px;">
					<span class="workname"><?php echo $beforeWorkname; ?></span>
					<span class="workhist">
						<span class="year"><?php echo $beforeWorkyear; ?></span>
						<span class="month"><?php echo $beforeWorkmonth; ?></span>
					</span>
				</div>

			</div>

			<div class="chk_box c1">
				<?php if($mq1 == '컴퓨터 관련활동'){ ?><span class="chk1">✔</span><?php } ?>
				<?php if($mq1 == '악기연주(피아노, 바이올린 등)'){ ?><span class="chk2">✔</span><?php } ?>
				<?php if($mq1 == '테니스/배드민턴/스쿼시'){ ?><span class="chk3">✔</span><?php } ?>
				<?php if($mq1 == '축구/족구/농구/스키'){ ?><span class="chk4">✔</span><?php } ?>
				<?php if($mq1 == '해당사항 없음'){ ?><span class="chk5">✔</span><?php } ?>
				<?php if($mq1 == '기타'){ ?>
					<span class="chk6">✔</span>
					<span><?php echo $mq1_etc; ?></span>					
				<?php } ?>				
			</div>


			<div class="chk_box c2">
			<?php if($mq2 == '거의 하지 않는다'){ ?><span class="chk1">✔</span><?php } ?>
			<?php if($mq2 == '1시간 미만'){ ?><span class="chk2">✔</span><?php } ?>
			<?php if($mq2 == '1~2시간 미만'){ ?><span class="chk3">✔</span><?php } ?>
			<?php if($mq2 == '2-3시간 미만'){ ?><span class="chk4">✔</span><?php } ?>
			<?php if($mq2 == '3시간 이상'){ ?><span class="chk5">✔</span><?php } ?>
			</div>

			<div class="chk_box c3">


				
				<div class="jboption">
				<?php if($mq3 == "Y"){ ?>
					<?php if($mq3_what == '류머티스 관절염'){ ?><span class="chk1">✔</span><?php } ?>
					<?php if($mq3_what == '당뇨병'){ ?><span class="chk2">✔</span><?php } ?>
					<?php if($mq3_what == '루프스병'){ ?><span class="chk3">✔</span><?php } ?>
					<?php if($mq3_what == '통풍'){ ?><span class="chk4">✔</span><?php } ?>
					<?php if($mq3_what == '알코올중독'){ ?><span class="chk5">✔</span><?php } ?>
				<?php } ?>
				</div>
				
				<div class="jbmain">
					<?php if($mq3 == "Y"){ ?>
					<span class="chk2">✔</span>
					<?php } else { ?>
					<span class="chk1">✔</span>
					<?php } ?>
					<?php if($mq3_now == "N") { ?>
					<span class="chk3">✔</span>
					<?php } else { ?>
					<span class="chk4">✔</span>
					<?php } ?>
				</div>				
			</div>
			

			
			<div class="chk_box c4">
				<div class="hurtmain">
					<?php if($mq4 == "Y"){ ?>
					<span class="chk1">✔</span>
					<?php } else { ?>
					<span class="chk2">✔</span>					
					<?php } ?>
				</div>
				<!--위 chk2 일시 아래 활성화-->
				<div class="hurtoption">
					<?php if($mq4_what == '손/손가락/손목'){ ?><span class="chk1">✔</span><?php } ?>
					<?php if($mq4_what == '팔/팔꿈치'){ ?><span class="chk2">✔</span><?php } ?>
					<?php if($mq4_what == '어깨'){ ?><span class="chk3">✔</span><?php } ?>
					<?php if($mq4_what == '목'){ ?><span class="chk4">✔</span><?php } ?>
					<?php if($mq4_what == '허리'){ ?><span class="chk5">✔</span><?php } ?>
					<?php if($mq4_what == '다리/발'){ ?><span class="chk6">✔</span><?php } ?>
				</div>								
			</div>
			<div class="chk_box c5">
				<?php if($mq5 == '전혀 힘들지 않음'){ ?><span class="chk1">✔</span><?php } ?>
				<?php if($mq5 == '견딜만 함'){ ?><span class="chk2">✔</span><?php } ?>
				<?php if($mq5 == '약간 힘듦'){ ?><span class="chk3">✔</span><?php } ?>
				<?php if($mq5 == '매우 힘듦'){ ?><span class="chk4">✔</span><?php } ?>
			</div>
		</div>
	</div>

	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_08.jpg" style="margin:0 auto;width:100%">
		<div class="p8 pwrap" style="position: absolute;top:202px;left:55px;">
			<div class="subbox">				
				<?php if($mq6 == 'Y'){ ?><span class="chk2">✔</span><?php } ?>
				<?php if($mq6 == 'N'){ ?><span class="chk1">✔</span><?php } ?>
			</div>
			<?php if($mq6){ ?>
			<!--chk2 일경우 아래 활성화-->
			<div class="tb_box">
				<div class="column neck">
					<div class="where">
						<?php if(in_array("목", $pain_where)) { ?>
						✔
						<?php } ?>
					</div>
					<div class="q1">

					</div>
					<div class="q2">
						<?php if($neck_q1 == "1일 미만"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($neck_q1 == "1일~1주일 미만"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($neck_q1 == "1주일~1달 미만"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($neck_q1 == "1달~6개월 미만"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($neck_q1 == "6개월 이상"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q3">
						<?php if($neck_q2 == "약한 통증"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($neck_q2 == "중간 통증"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($neck_q2 == "심한 통증"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($neck_q2 == "매우 심한 통증"){ ?><span class="chk4">✔</span><?php } ?>
					</div>
					<div class="q4">
						<?php if($neck_q3 == "6개월에 1번"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($neck_q3 == "2~3달에 1번"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($neck_q3 == "1달에 1번"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($neck_q3 == "1주일에 1번"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($neck_q3 == "매일"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q5">
						<?php if($neck_q4 == "아니오"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($neck_q4 == "예"){ ?><span class="chk2">✔</span><?php } ?>
					</div>
					<div class="q6">
						<?php if($neck_q5 == "병원·한의원 치료"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($neck_q5 == "약국치료"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($neck_q5 == "병가,산책"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($neck_q5 == "작업 전환"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($neck_q5 == "해당사항없음"){ ?><span class="chk5">✔ <span><?php echo $neck_q5_etc; ?></span></span><?php } ?>
					</div>

				</div>

				<div class="column shoulder">
					<div class="where">
						<?php if(in_array("어깨", $pain_where)) { ?>
						✔
						<?php } ?>
					</div>
					<div class="q1">
						<?php if($shoulder_q1 == "오른쪽"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($shoulder_q1 == "왼쪽"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($shoulder_q1 == "양쪽 모두"){ ?><span class="chk3">✔</span><?php } ?>
					</div>
					<div class="q2">
						<?php if($shoulder_q2 == "1일 미만"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($shoulder_q2 == "1일~1주일 미만"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($shoulder_q2 == "1주일~1달 미만"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($shoulder_q2 == "1달~6개월 미만"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($shoulder_q2 == "6개월 이상"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q3">
						<?php if($shoulder_q3 == "약한 통증"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($shoulder_q3 == "중간 통증"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($shoulder_q3 == "심한 통증"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($shoulder_q3 == "매우 심한 통증"){ ?><span class="chk4">✔</span><?php } ?>
					</div>
					<div class="q4">
						<?php if($shoulder_q4 == "6개월에 1번"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($shoulder_q4 == "2~3달에 1번"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($shoulder_q4 == "1달에 1번"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($shoulder_q4 == "1주일에 1번"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($shoulder_q4 == "매일"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q5">
						<?php if($shoulder_q5 == "N"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($shoulder_q5 == "Y"){ ?><span class="chk2">✔</span><?php } ?>
					</div>
					<div class="q6">
						<?php if($shoulder_q6 == "병원·한의원 치료"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($shoulder_q6 == "약국치료"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($shoulder_q6 == "병가,산책"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($shoulder_q6 == "작업 전환"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($shoulder_q6 == "해당사항없음"){ ?><span class="chk5">✔ <span><?php echo $neck_q5_etc; ?></span></span><?php } ?>
					</div>

				</div>

				<div class="column arm">
					<div class="where">
						<?php if(in_array("팔/팔꿈치", $pain_where)) { ?>
						✔
						<?php } ?>
					</div>
					<div class="q1">
						<?php if($arm_q1 == "오른쪽"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($arm_q1 == "왼쪽"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($arm_q1 == "양쪽 모두"){ ?><span class="chk3">✔</span><?php } ?>
					</div>
					<div class="q2">
						<?php if($arm_q2 == "1일 미만"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($arm_q2 == "1일~1주일 미만"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($arm_q2 == "1주일~1달 미만"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($arm_q2 == "1달~6개월 미만"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($arm_q2 == "6개월 이상"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q3">
						<?php if($arm_q3 == "약한 통증"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($arm_q3 == "중간 통증"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($arm_q3 == "심한 통증"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($arm_q3 == "매우 심한 통증"){ ?><span class="chk4">✔</span><?php } ?>
					</div>
					<div class="q4">
						<?php if($arm_q4 == "6개월에 1번"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($arm_q4 == "2~3달에 1번"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($arm_q4 == "1달에 1번"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($arm_q4 == "1주일에 1번"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($arm_q4 == "매일"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q5">
						<?php if($arm_q5 == "N"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($arm_q5 == "Y"){ ?><span class="chk2">✔</span><?php } ?>
					</div>
					<div class="q6">
						<?php if($arm_q6 == "병원·한의원 치료"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($arm_q6 == "약국치료"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($arm_q6 == "병가,산책"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($arm_q6 == "작업 전환"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($arm_q6 == "해당사항없음"){ ?><span class="chk5">✔ <span><?php echo $neck_q5_etc; ?></span></span><?php } ?>
					</div>
				</div>

				<div class="column hand">
					<div class="where">
						<?php if(in_array("손/손목/손가락", $pain_where)) { ?>
						✔
						<?php } ?>
					</div>
					<div class="q1">
						<?php if($hand_q1 == "오른쪽"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($hand_q1 == "왼쪽"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($hand_q1 == "양쪽 모두"){ ?><span class="chk3">✔</span><?php } ?>
					</div>
					<div class="q2">
						<?php if($hand_q2 == "1일 미만"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($hand_q2 == "1일~1주일 미만"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($hand_q2 == "1주일~1달 미만"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($hand_q2 == "1달~6개월 미만"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($hand_q2 == "6개월 이상"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q3">
						<?php if($hand_q3 == "약한 통증"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($hand_q3 == "중간 통증"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($hand_q3 == "심한 통증"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($hand_q3 == "매우 심한 통증"){ ?><span class="chk4">✔</span><?php } ?>
					</div>
					<div class="q4">
						<?php if($hand_q4 == "6개월에 1번"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($hand_q4 == "2~3달에 1번"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($hand_q4 == "1달에 1번"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($hand_q4 == "1주일에 1번"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($hand_q4 == "매일"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q5">
						<?php if($hand_q5 == "N"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($hand_q5 == "Y"){ ?><span class="chk2">✔</span><?php } ?>
					</div>
					<div class="q6">
						<?php if($hand_q6 == "병원·한의원 치료"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($hand_q6 == "약국치료"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($hand_q6 == "병가,산책"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($hand_q6 == "작업 전환"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($hand_q6 == "해당사항없음"){ ?><span class="chk5">✔ <span><?php echo $neck_q5_etc; ?></span></span><?php } ?>
					</div>

				</div>

				<div class="column back">
					<div class="where">
						<?php if(in_array("허리", $pain_where)) { ?>
						✔
						<?php } ?>
					</div>
					<div class="q1">

					</div>
					<div class="q2">
						<?php if($back_q1 == "1일 미만"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($back_q1 == "1일~1주일 미만"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($back_q1 == "1주일~1달 미만"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($back_q1 == "1달~6개월 미만"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($back_q1 == "6개월 이상"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q3">
						<?php if($back_q2 == "약한 통증"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($back_q2 == "중간 통증"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($back_q2 == "심한 통증"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($back_q2 == "매우 심한 통증"){ ?><span class="chk4">✔</span><?php } ?>
					</div>
					<div class="q4">
						<?php if($back_q3 == "6개월에 1번"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($back_q3 == "2~3달에 1번"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($back_q3 == "1달에 1번"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($back_q3 == "1주일에 1번"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($back_q3 == "매일"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q5">
						<?php if($back_q4 == "N"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($back_q4 == "Y"){ ?><span class="chk2">✔</span><?php } ?>
					</div>
					<div class="q6">
						<?php if($back_q5 == "병원·한의원 치료"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($back_q5 == "약국치료"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($back_q5 == "병가,산책"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($back_q5 == "작업 전환"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($back_q5 == "해당사항없음"){ ?><span class="chk5">✔ <span><?php echo $neck_q5_etc; ?></span></span><?php } ?>
					</div>

				</div>

				<div class="column leg">
					<div class="where">
						<?php if(in_array("다리/발", $pain_where)) { ?>
						✔
						<?php } ?>
					</div>
					<div class="q1">
						<?php if($leg_q1 == "오른쪽"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($leg_q1 == "왼쪽"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($leg_q1 == "양쪽 모두"){ ?><span class="chk3">✔</span><?php } ?>
					</div>
					<div class="q2">
						<?php if($leg_q2 == "1일 미만"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($leg_q2 == "1일~1주일 미만"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($leg_q2 == "1주일~1달 미만"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($leg_q2 == "1달~6개월 미만"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($leg_q2 == "6개월 이상"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q3">
						<?php if($leg_q3 == "약한 통증"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($leg_q3 == "중간 통증"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($leg_q3 == "심한 통증"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($leg_q3 == "매우 심한 통증"){ ?><span class="chk4">✔</span><?php } ?>
					</div>
					<div class="q4">
						<?php if($leg_q4 == "6개월에 1번"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($leg_q4 == "2~3달에 1번"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($leg_q4 == "1달에 1번"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($leg_q4 == "1주일에 1번"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($leg_q4 == "매일"){ ?><span class="chk5">✔</span><?php } ?>
					</div>
					<div class="q5">
						<?php if($leg_q5 == "N"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($leg_q5 == "Y"){ ?><span class="chk2">✔</span><?php } ?>
					</div>
					<div class="q6">
						<?php if($leg_q6 == "병원·한의원 치료"){ ?><span class="chk1">✔</span><?php } ?>
						<?php if($leg_q6 == "약국치료"){ ?><span class="chk2">✔</span><?php } ?>
						<?php if($leg_q6 == "병가,산책"){ ?><span class="chk3">✔</span><?php } ?>
						<?php if($leg_q6 == "작업 전환"){ ?><span class="chk4">✔</span><?php } ?>
						<?php if($leg_q6 == "해당사항없음"){ ?><span class="chk5">✔ <span><?php echo $neck_q5_etc; ?></span></span><?php } ?>
					</div>
				</div>				
			</div>
			<?php } ?>
		</div>
	</div>
	<!--근골격계질환 증상조사표 문서끝-->
	<!--간이 건강검진표 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_09.png" style="margin:0 auto;width:100%">
		<div class="p9 pwrap" style="position: absolute;top:250px;left:226px;">
			<div class="row" style="height:50px;width:100%;">
				<span class="name"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
				<span class="cate"><?php echo $jobType; ?></span>
				<span class="teamcap"><?php echo $jobCaptain; ?></span>
			</div>
			<div class="row" style="height:49px;width:100%;">
				<span class="birth"><?php echo $userBirth; ?></span>
				<span class="addr"><?php echo $mgrDoc['userInfo']['addr1'] ?>, <?php echo $mgrDoc['userInfo']['addr2'] ?></span>

			</div>
			<div class="row" style="height:49px;width:100%;display: flex;">
				<span class="nation">
					<?php if($mgrDoc['userInfo']['national'] == "대한민국(Republic of Korea)"){ ?>
						대한민국
					<?php } else { ?>
						<?php echo $mgrDoc['userInfo']['national'] ?>									
					<?php } ?>						
				</span>
				<div class="tels">
					<span class="mtel"><?php echo add_hyphen($mgrDoc['userInfo']['phone1']) ?></span>
					<span class="ftel"><?php echo $emergencyPhone; ?></span>
				</div>
			</div>	
			<!--2번-->		
			<div class="he2">
				<div class="row" style="height:45px;width:100%;">
					<span class="year"><?php echo $nowWorkyear; ?></span>
					<span class="month"><?php echo $nowWorkmonth; ?></span>
				</div>
				<div class="row haveacc" style="height:45px;width:100%;">
					<?php if($haveDs == "O"){ ?><span class="chk1">✔</span><?php } ?>
					<?php if($haveDs == "X"){ ?><span class="chk2">✔</span><?php } ?>					
				</div>
				<div class="row hist" style="height:45px;width:100%;">
					<?php if($beforeDs == "O"){ ?><span class="chk1">✔</span><?php } ?>
					<?php if($beforeDs == "X"){ ?><span class="chk2">✔</span><?php } ?>
				</div>
				<div class="row med" style="height:41px;width:100%;">
					<?php if($beforeMed == "O"){ ?><span class="chk1">✔</span><?php } ?>
					<?php if($beforeMed == "X"){ ?><span class="chk2">✔</span><?php } ?>
				</div>
				<div class="row docsay circletype" style="height:45px;width:100%;">
					<?php if($docSay == "hbp"){ ?><span class="blood"></span><?php } ?>
					<?php if($docSay == "heart"){ ?><span class="heart"></span><?php } ?>
					<?php if($docSay == "diabetes"){ ?><span class="sugar"></span><?php } ?>
					<?php if($docSay == "disc"){ ?><span class="disk"></span><?php } ?>
					<?php if($docSay == "etcs"){ ?><span class="etc"></span><?php } ?>
					<?php if($docSay == "X"){ ?><span class="none"></span><?php } ?>
				</div>
				<div class="row nowhealth circletype" style="height:45px;width:100%;">
					<?php if($healthNow == "High"){ ?><span class="good"></span><?php } ?>	
					<?php if($healthNow == "Middle"){ ?><span class="normal"></span><?php } ?>	
					<?php if($healthNow == "Low"){ ?><span class="bad"></span><?php } ?>	
				</div>
			</div>
			<!--3번-->
			<div class="he3">
				<div class="row test01">
					<div class="num"><?php echo $blood_min; ?> ~ <?php echo $blood_max; ?></div>
					<div class="warnchk">
						<?php if($blood_max >= 140){ ?>
						<span class="chk1">✔</span>
						<?php } else { ?>
						<span class="chk2">✔</span>					
						<?php } ?>
					</div>

				</div>
				<div class="row test02">
					<div class="num"><?php echo $bloodSugar; ?></div>
					<div class="warnchk">
						<?php if($bloodSugar >= 126){ ?>
						<span class="chk1">✔</span>
						<?php } else { ?>
						<span class="chk2">✔</span>					
						<?php } ?>
					</div>
				</div>
				<div class="row test03">
					<div class="num"><?php echo $oneLeg; ?></div>
					<div class="warnchk">
						<?php if($oneLeg <= 2){ ?>
						<span class="chk1">✔</span>
						<?php } else { ?>
						<span class="chk2">✔</span>					
						<?php } ?>
					</div>
				</div>
				<div class="row test04">
					<div class="num"><?php echo $standWalk; ?></div>
					<div class="warnchk">
						<?php if($standWalk >= 40){ ?>
						<span class="chk1">✔</span>
						<?php } else { ?>
						<span class="chk2">✔</span>					
						<?php } ?>
					</div>
				</div>
				<div class="row test05">
					<div class="num"><?php echo $straight; ?></div>
					<div class="warnchk">
						<?php if($straight <= 2){ ?>
						<span class="chk1">✔</span>
						<?php } else { ?>
						<span class="chk2">✔</span>					
						<?php } ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!--간이 건강검진표 문서끝-->
	<!--근로자 자기보호권 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_10.jpg" style="margin:0 auto;width:100%">
		<span class="p10 sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
		<span class="p10 sname"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
	</div>
	<!--근로자 자기보호권 문서끝-->
	<!--2진아웃 문서-->
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_doc/dl_doc_11.jpg" style="margin:0 auto;width:100%">
		<span class="p11 sdate"><?php echo date( 'Y년 m월 d일', strtotime($upDate)); ?></span>
		<span class="p11 sname"><?php echo $mgrDoc['userInfo']['name'] ?> <img src="<?php echo $userSign; ?>" alt=""></span>
	</div>
	<!--2진아웃 문서끝-->

<?php } 
} ?>
<!-- asdf -->
	
	
	






<?php
} else if ($element['eduDoc']['cat1Id'] == 999) {
	//none: 작업 변경 시 교육
?>
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/doc_5.jpg" style="margin:0 auto;">
		<div style="margin-top:-1224px;margin-left:44px;">현장명 : <?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:13px;margin-left:640px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:392px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
			</div>
		</div>
		<div style="margin-top:175px;margin-left:218px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:135px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:150px;margin-left:12px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:220px;margin-left:15px;text-align:center;"><?php echo $element['eduDoc']['constructType'] ?></div>
				<div class="col" style="flex:none;width:273px;margin-left:15px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>
			</div>
		</div>
		<div style="margin-top:60px;margin-left:216px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:296px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
				<div class="col" style="flex:none;width:224px;margin-left:15px;margin-top:-10px;text-align:center;line-height:24px;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?><br /><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:280px;margin-left:10px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div>
			</div>
		</div>
		<div style="margin-top:75px;margin-left:535px;margin-bottom:50px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:495px;height:725px;"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
	</div>
<?php
} else if ($element['eduDoc']['cat1Id'] == 99) {
	//4: 특별안전보건교육
?>
	<div class="print_page" style="padding:0 0px;">
		<img src="/view/images/dl_new_doc/dl_doc_04.jpg" style="margin:0 auto;">
		<div style="margin-top:-1306px;margin-left:214px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:12px;margin-left:588px;">
			<div class="row" style="display:flex;">
				<!--<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>-->
				<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
			</div>
		</div>
		<div style="margin-top:9px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:233px;margin-left:102px;padding-top:20px;;text-align:center;height:44px;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:-8px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?>명</div>
			</div>
		</div>
		<div style="margin-top:27px;margin-left:223px;">
			<div class="row" style="display:flex;height:30px;">
				<div class="col" style="flex:none;width:323px;text-align:left;"><?php echo $element['eduDoc']['foredu'] ?></div>				
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:86px;margin-left:538px;margin-bottom:35px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:443px;height:589px;padding-top:22px"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
		<div style="margin-top:48px;margin-left:93px;margin-bottom:153px;height:246px">
			<div class="row" style="display:flex;height:100%;">
				<div class="col" style="width:441px">
					<?php if($element['eduDoc']['attach'][0]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][0]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>
				</div>				
				<div class="col" style="width:445px">
					<?php if($element['eduDoc']['attach'][1]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][1]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>					
				</div>				
			</div>
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
							<div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
							<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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

	<div class="print_page" style="padding:50px 20px;">
		<img src="/view/images/dl_new_doc/dl_doc_pic.jpg" style="margin:0 auto;">

	<?php

	 foreach ($element['mgrDoc'] as $key => $mgrDoc) {
		//$mgrDoc['userInfo']['oshImg']
		//$mgrDoc['userInfo']['idcard']
		$cnt = $key + 1;
	?>
		<?php if($cnt % 2 == 0) { ?>
			<div style="display:flex;margin-top:66px;margin-left:101px;font-size:20pt;margin-bottom:18px;width:830px;height:607px;">
			
		<?php } else { ?>
			<div style="display:flex;margin-top:-1397px;margin-left:101px;font-size:20pt;margin-bottom:18px;width:830px;height:607px;">
		<?php } ?>
			<div class="row" style="display:flex;height:100%;width:100%;">
				<div class="col" style="display: flex;justify-content: center;align-items: center;width: 100%;">
					<img src='<?php echo $mgrDoc['userInfo']['oshImg'] ?>' style='margin:auto;object-fit:scale-down;max-height:100%' />
				</div>					
			</div>				
		</div>		
		<?php if($cnt % 2 == 0 &&  $cnt != count($element['mgrDoc'])) { ?>
		</div>
		<div class="print_page" style="padding:50px 20px;">
			<img src="/view/images/dl_new_doc/dl_doc_pic.jpg" style="margin:0 auto;">
		<?php } ?>
	<?php
	} ?>

	</div>

<?php
} else if ($element['eduDoc']['cat1Id'] == 100) {
	//5: 특수형태근로종사자 교육
?>
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_new_doc/dl_doc_05.jpg" style="margin:0 auto;">
		<div style="margin-top:-1306px;margin-left:214px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:12px;margin-left:588px;">
			<div class="row" style="display:flex;">
				<!--<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>-->
				<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
			</div>
		</div>
		<div style="margin-top:9px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:233px;margin-left:102px;padding-top:20px;;text-align:center;height:44px;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:-8px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?>명</div>
			</div>
		</div>
		<div style="margin-top:27px;margin-left:223px;">
			<div class="row" style="display:flex;height:30px;">
				<div class="col" style="flex:none;width:323px;text-align:left;"><?php echo $element['eduDoc']['foredu'] ?></div>				
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:86px;margin-left:538px;margin-bottom:35px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:443px;height:589px;padding-top:22px"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>




		<div style="margin-top:48px;margin-left:93px;margin-bottom:153px;height:246px">
			<div class="row" style="display:flex;height:100%;">
				<div class="col" style="width:441px">
					<?php if($element['eduDoc']['attach'][0]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][0]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>
				</div>				
				<div class="col" style="width:445px">
					<?php if($element['eduDoc']['attach'][1]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][1]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>					
				</div>				
			</div>
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
							<div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
							<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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




	<div class="print_page" style="padding:50px 20px;">
		<img src="/view/images/dl_new_doc/dl_doc_pic.jpg" style="margin:0 auto;">

	<?php

	 foreach ($element['mgrDoc'] as $key => $mgrDoc) {
		//$mgrDoc['userInfo']['oshImg']
		//$mgrDoc['userInfo']['idcard']
		$cnt = $key + 1;
	?>
		<?php if($cnt % 2 == 0) { ?>
			<div style="display:flex;margin-top:66px;margin-left:101px;font-size:20pt;margin-bottom:18px;width:830px;height:607px;">
			
		<?php } else { ?>
			<div style="display:flex;margin-top:-1397px;margin-left:101px;font-size:20pt;margin-bottom:18px;width:830px;height:607px;">
		<?php } ?>
			<div class="row" style="display:flex;height:100%;width:100%;">
				<div class="col" style="display: flex;justify-content: center;align-items: center;width: 100%;">
					<img src='<?php echo $mgrDoc['userInfo']['oshImg'] ?>' style='margin:auto;object-fit:scale-down;max-height:100%' />
				</div>					
			</div>				
		</div>		
		<?php if($cnt % 2 == 0 &&  $cnt != count($element['mgrDoc'])) { ?>
		</div>
		<div class="print_page" style="padding:50px 20px;">
			<img src="/view/images/dl_new_doc/dl_doc_pic.jpg" style="margin:0 auto;">
		<?php } ?>
	<?php
	} ?>

	</div>

<?php
} else if ($element['eduDoc']['cat1Id'] == 101) {
	//6: 물질안전보건(MSDS)교육
?>
	<div class="print_page" style="padding:0px 0;">
		<img src="/view/images/dl_new_doc/dl_doc_06.jpg" style="margin:0 auto;">
		<div style="margin-top:-1306px;margin-left:214px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:12px;margin-left:588px;">
			<div class="row" style="display:flex;">
				<!--<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>-->
				<div class="col" style="flex:none;width:454px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
			</div>
		</div>
		<div style="margin-top:9px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
				<div class="col" style="flex:none;width:233px;margin-left:102px;padding-top:20px;;text-align:center;height:44px;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:-8px;margin-left:224px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?> (<?php echo substr( $element['eduDoc']['eduTime'], 0, 2 ) ?> 시간)</div>
				<div class="col" style="flex:none;width:115px;margin-left:130px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?>명</div>
			</div>
		</div>
		<div style="margin-top:27px;margin-left:223px;">
			<div class="row" style="display:flex;height:30px;">
				<div class="col" style="flex:none;width:323px;text-align:left;"><?php echo $element['eduDoc']['foredu'] ?></div>				
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:86px;margin-left:538px;margin-bottom:35px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:443px;height:589px;padding-top:22px"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
		<div style="margin-top:48px;margin-left:93px;margin-bottom:153px;height:246px">
			<div class="row" style="display:flex;height:100%;">
				<div class="col" style="width:441px">
					<?php if($element['eduDoc']['attach'][0]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][0]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>
				</div>				
				<div class="col" style="width:445px">
					<?php if($element['eduDoc']['attach'][1]['path']) { ?>              
						<img src='<?php echo $element['eduDoc']['attach'][1]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
					<?php } ?>					
				</div>				
			</div>
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
							<div class="col" style="flex:none;width:140px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
							<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['workers'][$w  + (50 * $i)]['name']) echo $element['eduDoc']['svName'] ?></div>
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
	
<?php } ?>