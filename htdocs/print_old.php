<?php
if ($element['eduDoc']['cat1Id'] == 1 || $element['eduDoc']['cat1Id'] == 42  || $element['eduDoc']['cat1Id'] == 52  || $element['eduDoc']['cat1Id'] == 62  || $element['eduDoc']['cat1Id'] == 72) {
	//1: 정기안전보건교육(근로자)
?>
	<div class="print_page" style="padding:50px 0;">
		<img src="/view/images/doc_1.png" style="margin:0 auto;">
		<div style="margin-top:-1323px;margin-left:130px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:95px;margin-left:574px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:508px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>
			</div>
		</div>
		<div style="margin-top:17px;margin-left:205px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:158px;margin-left:4px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
			</div>
		</div>
		<div style="margin-top:60px;margin-left:186px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:323px;text-align:center;"><?php echo $element['eduDoc']['instructor'] ?></div>
				<!-- <div class="col" style="flex:none;width:238px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:260px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div> -->
			</div>
		</div>
		<div style="margin-top:87px;margin-left:520px;margin-bottom:50px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:495px;height:940px;"><?php echo $element['eduDoc']['memo'] ?></div>
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
						<div class="col" style="flex:none;width:150px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo $element['eduDoc']['eduPlace'] ?></div>
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
} else if ($element['eduDoc']['cat1Id'] == 2 || $element['eduDoc']['cat1Id'] == 43 || $element['eduDoc']['cat1Id'] == 53  || $element['eduDoc']['cat1Id'] == 63  || $element['eduDoc']['cat1Id'] == 73) {
	//2. 정기안전보건교육(관리감독자)
?>
	<div class="print_page" style="padding:50px 0;">
		<img src="/view/images/doc_2.png" style="margin:0 auto;">
		<div style="margin-top:-1363px;margin-left:114px;"> <?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:105px;margin-left:770px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:112px;text-align:right;"><?php echo $element['eduDoc']['svName'] ?></div>
			</div>
		</div>
		<div style="margin-top:15px;margin-left:210px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:175px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:167px;margin-left:0px;text-align:center;"><?php echo substr($element['eduDoc']['eduWorkerCnt'], 0, 5) ?></div>

			</div>
		</div>
		<div style="display:flex;margin-top:62px;margin-left:164px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:367px;text-align:center;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<!-- 		
		<div style="margin-top:-36px;margin-left:546px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:242px;text-align:center;line-height:24px;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?><br/><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
			</div>
		</div> -->
		<div style="margin-top:77px;margin-left:515px;margin-bottom:30px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:495px;height:940px;"><?php echo $element['eduDoc']['memo'] ?></div>
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
	for ($i = 0; $i < ceil(count($element['eduDoc']['attach']) / 2); $i++) {
	?>
		<div class="print_page" style="padding:50px 20px;">
			<img src="/view/images/doc_12.png" style="margin:0 auto;">
			<div style="display:flex;margin-top:-1315px;margin-left:250px;font-size:20pt;margin-bottom:18px;">
				<?php echo $element['eduDoc']['siteName'] ?>
			</div>
			<?php
			for ($w = $i * 2; $w < ($i + 1) * 2; $w++) {
			?>
				<div style='height:550px;width:950px;margin:auto;'>
					<img src='<?php echo $element['eduDoc']['attach'][$w]['path'] ?>' style='margin:auto;object-fit:scale-down;height:100%' />
				</div>
				<div style="display:flex;margin-left:90px;">
					<div class="row" style="display:flex;height:72px;">
						<div class="col" style="flex:none;width:130px;text-align:center;margin:auto;vertical-align:middle;"><?php if ($element['eduDoc']['attach'][$w]['path']) echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>

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
} else if ($element['eduDoc']['cat1Id'] == 9 || $element['eduDoc']['cat1Id'] == 50 || $element['eduDoc']['cat1Id'] == 60  || $element['eduDoc']['cat1Id'] == 70  || $element['eduDoc']['cat1Id'] == 80) {
	//9: 신규채용자안전보건교육
?>
	<div class="print_page" style="padding:50px 0;">
		<img src="/view/images/doc_9.png" style="margin:0 auto;">
		<div style="margin-top:-1410px;margin-left:120px;"> <?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:105px;margin-left:730px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:300px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>
			</div>
		</div>
		<div style="margin-top:18px;margin-left:182px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10)  ?></div>
				<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
			</div>
		</div>
		<div style="margin-top:65px;margin-left:200px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:320px;text-align:center;"><?php echo $element['eduDoc']['instructor'] ?></div>

			</div>
		</div>
		<div style="margin-top:67px;margin-left:535px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:495px;height:1000px;"><?php echo $element['eduDoc']['memo'] ?></div>
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
} else if ($element['eduDoc']['cat1Id'] == 5 || $element['eduDoc']['cat1Id'] == 46 || $element['eduDoc']['cat1Id'] == 56  || $element['eduDoc']['cat1Id'] == 66  || $element['eduDoc']['cat1Id'] == 76) {
	//5: 작업 변경 시 교육
?>
	<div class="print_page" style="padding:50px 0;">
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
} else if ($element['eduDoc']['cat1Id'] == 6 || $element['eduDoc']['cat1Id'] == 47 || $element['eduDoc']['cat1Id'] == 57  || $element['eduDoc']['cat1Id'] == 67  || $element['eduDoc']['cat1Id'] == 77) {
	//6: 특별안전보건교육
?>
	<div class="print_page" style="padding:0 50px;">
		<img src="/view/images/doc_6.png" style="margin:0 auto;">
		<div style="margin-top:-1355px;margin-left:104px;"><?php echo $element['eduDoc']['siteName'] ?></div>
		<!-- <div style="display:flex;margin-top:19px;margin-left:598px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:386px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
			</div>
		</div> -->
		<div style="display:flex;margin-top:120px;margin-left:605px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:380px;margin-left:7px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>
			</div>
		</div>
		<div style="display:flex;margin-top:15px;margin-left:111px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:232px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['eduDate'], 0, 10) ?></div>
				<div class="col" style="flex:none;width:172px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?></div>
			</div>
		</div>
		<div style="display:flex;margin-top:55px;margin-left:198px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:186px;text-align:center;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="margin-top:57px;margin-left:508px;margin-bottom:40px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:365px;height:990px;"><?php echo $element['eduDoc']['memo'] ?></div>
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
} else if ($element['eduDoc']['cat1Id'] == 7 || $element['eduDoc']['cat1Id'] == 48 || $element['eduDoc']['cat1Id'] == 58  || $element['eduDoc']['cat1Id'] == 68  || $element['eduDoc']['cat1Id'] == 78) {
	//7: 특수형태근로종사자 교육
?>
	<div class="print_page" style="padding:50px 0;">
		<img src="/view/images/doc_7.jpg" style="margin:0 auto;">
		<div style="margin-top:-1300px;margin-left:76px;">현장명 : <?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:19px;margin-left:604px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:401px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
			</div>
		</div>
		<div style="display:flex;margin-top:18px;margin-left:604px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:401px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;토의식□&nbsp;&nbsp;&nbsp;시청각식□</div>
			</div>
		</div>
		<div style="display:flex;margin-top:36px;margin-left:604px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:401px;text-align:center;"><?php echo $element['eduDoc']['instructor'] ?></div>
			</div>
		</div>
		<div style="display:flex;margin-top:8px;margin-left:190px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:316px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</div>
			</div>
		</div>
		<div style="margin-top:115px;margin-left:615px;margin-bottom:30px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:380px;height:940px;"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
	</div>
<?php
} else if ($element['eduDoc']['cat1Id'] == 8 || $element['eduDoc']['cat1Id'] == 49 || $element['eduDoc']['cat1Id'] == 59  || $element['eduDoc']['cat1Id'] == 69  || $element['eduDoc']['cat1Id'] == 79) {
	//8: 물질안전보건(MSDS)교육
?>
	<div class="print_page" style="padding:50px 0;">
		<img src="/view/images/doc_8.jpg" style="margin:0 auto;">
		<div style="margin-top:-1344px;margin-left:60px;">현장명 : <?php echo $element['eduDoc']['siteName'] ?></div>
		<div style="display:flex;margin-top:137px;margin-left:650px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:372px;text-align:center;"><?php echo $element['eduDoc']['adminName'] ?></div>
			</div>
		</div>
		<div style="margin-top:135px;margin-left:510px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:87px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</div>
				<div class="col" style="flex:none;width:78px;margin-left:5px;text-align:center;"><?php echo $element['eduDoc']['eduWorkerCnt'] ?> 명</div>
				<div class="col" style="flex:none;width:164px;margin-left:5px;text-align:center;"><?php echo $element['eduDoc']['constructType'] ?></div>
				<div class="col" style="flex:none;width:172px;margin-left:4px;text-align:center;"><?php echo $element['eduDoc']['svName'] ?></div>
			</div>
		</div>
		<div style="margin-top:67px;margin-left:163px;">
			<div class="row" style="display:flex;">
				<div class="col" style="flex:none;width:343px;text-align:center;"><?php echo $element['eduDoc']['eduPlace'] ?></div>
				<div class="col" style="flex:none;width:252px;margin-left:4px;text-align:center;"><?php echo substr($element['eduDoc']['startTime'], 0, 5) ?> ~ <?php echo substr($element['eduDoc']['endTime'], 0, 5) ?></div>
				<div class="col" style="flex:none;width:250px;margin-left:7px;text-align:center;">강의식□&nbsp;&nbsp;&nbsp;시청각식□</div>
			</div>
		</div>
		<div style="margin-top:87px;margin-left:520px;margin-bottom:50px;">
			<div class="row" style="display:flex;">
				<div class="col ql-editor" style="flex:none;width:495px;height:760px;"><?php echo $element['eduDoc']['memo'] ?></div>
			</div>
		</div>
	</div>
	<?php
}
if (count($element['mgrDoc']) > 0) {
	foreach ($element['mgrDoc'] as $mgrDoc) {
		//3: 신규채용자 관리대장(기존)
		$national = explode('(', $mgrDoc['userInfo']['national']);

		if ($national[0] == '대한민국') {
			$korean = '■';
			$foreigner = '□';
		} else {
			$korean = '□';
			$foreigner = '■';
		}

		$imsi_array = explode('-', substr($mgrDoc['userInfo']['birth'], 0, 10));
		$birth = $imsi_array[0] . '년 ' . $imsi_array[1] . '월 ' . $imsi_array[2] . '일';

		$signature = '';

		$index = array_search(1, array_column($mgrDoc['safetyDocs'], 'templateType'));
		if ($mgrDoc['safetyDocs'][$index]['content']['signature']) $signature = '<img src="' . $mgrDoc['safetyDocs'][$index]['content']['signature'] . '" style="width:100%;" />';

		$imsi_array = explode('-', substr($mgrDoc['userInfo']['eduDate'], 0, 10));
		$eduDate = $imsi_array[0] . '년 ' . $imsi_array[1] . '월 ' . $imsi_array[2] . '일';

		$index = array_search(0, array_column($mgrDoc['safetyDocs'], 'templateType'));
		if ($mgrDoc['safetyDocs'][$index]['content']['radio1'] == '현장지급') {
			$hat1 = substr($mgrDoc['safetyDocs'][$index]['updatedAt'], 0, 10);
			$hat2 = '<span style="color:#ddd;">보유</span>';
		} else {
			$hat1 = '&nbsp;';
			$hat2 = '✔ 보유';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['radio2'] == '현장지급') {
			$belt1 = substr($mgrDoc['safetyDocs'][$index]['updatedAt'], 0, 10);
			$belt2 = '<span style="color:#ddd;">보유</span>';
		} else {
			$belt1 = '&nbsp;';
			$belt2 = '✔ 보유';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['radio3'] == '현장지급') {
			$boots1 = substr($mgrDoc['safetyDocs'][$index]['updatedAt'], 0, 10);
			$boots2 = '<span style="color:#ddd;">보유</span>';
		} else {
			$boots1 = '&nbsp;';
			$boots2 = '✔ 보유';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['radio4'] == '현장지급') {
			$leggings1 = substr($mgrDoc['safetyDocs'][$index]['updatedAt'], 0, 10);
			$leggings2 = '<span style="color:#ddd;">보유</span>';
		} else {
			$leggings1 = '&nbsp;';
			$leggings2 = '✔ 보유';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['radio5'] == '현장지급') {
			$glasses1 = substr($mgrDoc['safetyDocs'][$index]['updatedAt'], 0, 10);
			$glasses2 = '<span style="color:#ddd;">보유</span>';
		} else {
			$glasses1 = '&nbsp;';
			$glasses2 = '✔ 보유';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['radio6'] == '현장지급') {
			$vest1 = substr($mgrDoc['safetyDocs'][$index]['updatedAt'], 0, 10);
			$vest2 = '<span style="color:#ddd;">보유</span>';
		} else {
			$vest1 = '&nbsp;';
			$vest2 = '✔ 보유';
		}

		$index = array_search(2, array_column($mgrDoc['safetyDocs'], 'templateType'));
		$point = $mgrDoc['safetyDocs'][$index]['content']['input1'];

		$index = array_search(3, array_column($mgrDoc['safetyDocs'], 'templateType'));
		if ($mgrDoc['safetyDocs'][$index]['content']['input1'] == 'A') {
			$abo1 = '✔';
			$abo2 = $abo3 = $abo4 = '&nbsp;';
		} else if ($mgrDoc['safetyDocs'][$index]['content']['input1'] == 'B') {
			$abo2 = '✔';
			$abo1 = $abo3 = $abo4 = '&nbsp;';
		} else if ($mgrDoc['safetyDocs'][$index]['content']['input1'] == 'O') {
			$abo3 = '✔';
			$abo1 = $abo2 = $abo4 = '&nbsp;';
		} else if ($mgrDoc['safetyDocs'][$index]['content']['input1'] == 'AB') {
			$abo4 = '✔';
			$abo1 = $abo2 = $abo3 = '&nbsp;';
		} else {
			$abo1 = $abo2 = $abo3 = $abo4 = '&nbsp;';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['input2'] == 'X') {
			$normal2 = '✔';
			$normal1 = '&nbsp;';
		} else if ($mgrDoc['safetyDocs'][$index]['content']['input2'] == 'O') {
			$normal1 = '✔';
			$normal2 = '&nbsp;';
		} else {
			$normal1 = '&nbsp;';
			$normal2 = '&nbsp;';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['input3'] == 'High') {
			$stamina = '✔ 상&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;중&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;하';
		} else if ($mgrDoc['safetyDocs'][$index]['content']['input1'] == 'Middle') {
			$stamina = '상&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;✔ 중&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;하';
		} else if ($mgrDoc['safetyDocs'][$index]['content']['input1'] == 'low') {
			$stamina = '상&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;중&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;✔ 하';
		} else {
			$stamina = '상&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;중&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;하';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['input4_1_value']) {
			$input4 = '✔ 유&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;<span style="color:#ddd;font-size:18px;">무</span>&nbsp;&nbsp;&nbsp;해당부위(병명) : ' . $mgrDoc['safetyDocs'][$index]['content']['input4_1_value'];
		} else {
			$input4 = '<span style="color:#ddd;font-size:18px;">유</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;✔ 무&nbsp;&nbsp;&nbsp;해당부위(병명) : ';
		}
		if ($mgrDoc['safetyDocs'][$index]['content']['input5_1_value']) {
			$input5 = '✔ 유&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;<span style="color:#ddd;font-size:18px;">무</span>&nbsp;&nbsp;&nbsp;해당부위(병명) : ' . $mgrDoc['safetyDocs'][$index]['content']['input5_1_value'];
		} else {
			$input5 = '<span style="color:#ddd;font-size:18px;">유</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;✔ 무&nbsp;&nbsp;&nbsp;해당부위(병명) : ';
		}
		$input6 = '흡 연 : ' . $mgrDoc['safetyDocs'][$index]['content']['input6_1_value'] . ' 갑/1일 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 주 량 : ' . $mgrDoc['safetyDocs'][$index]['content']['input6_2_value'] . ' 회/1주 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 수면시간 : ' . $mgrDoc['safetyDocs'][$index]['content']['input6_3_value'] . ' 시간/1일';

		if (!$mgrDoc['safetyDocs'][$index]['content']['input7_1_value']) $mgrDoc['safetyDocs'][$index]['content']['input7_1_value'] = '&nbsp;';
		if (!$mgrDoc['safetyDocs'][$index]['content']['input7_2_value']) $mgrDoc['safetyDocs'][$index]['content']['input7_2_value'] = '&nbsp;';
		if (!$mgrDoc['safetyDocs'][$index]['content']['input7_3_value']) $mgrDoc['safetyDocs'][$index]['content']['input7_3_value'] = '&nbsp;';

		$check = '✔';
	?>
		<div class="print_page" style="padding:50px 0;">
			<img src="/view/images/doc_3_1.jpg" style="margin:0 auto;">
			<div style="display:flex;margin-top:-1304px;margin-left:378px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:134px;"><?php echo $korean ?></div>
					<div class="col" style="flex:none;width:340px;"><?php echo $foreigner ?></div>
					<div class="col" style="flex:none;width:178px;text-align:center;margin-left:5px;"><?php echo $national[0] ?> </div>
				</div>
			</div>
			<div style="margin-top:8px;margin-left:250px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:180px;text-align:center;"><?php echo $mgrDoc['userInfo']['name'] ?></div>
					<div class="col" style="flex:none;width:290px;margin-left:300px;text-align:center;"><?php echo $birth ?></div>
				</div>
			</div>
			<div style="margin-top:11px;margin-left:225px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:323px;text-align:center;"><?php echo $mgrDoc['userInfo']['occupation'] ?></div>
					<div class="col" style="flex:none;width:294px;margin-left:180px;text-align:center;"><?php echo $mgrDoc['userInfo']['svName'] ?></div>
				</div>
			</div>
			<div style="margin-top:20px;margin-left:224px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:164px;text-align:center;"><?php echo $eduDate ?></div>
					<div class="col" style="flex:none;width:150px;margin-left:175px;text-align:center;"><?php echo substr($mgrDoc['userInfo']['startTime'], 0, 5) ?> ~ <?php echo substr($mgrDoc['userInfo']['endTime'], 0, 5) ?></div>
					<div class="col" style="flex:none;width:181px;margin-left:130px;margin-top:7px;text-align:center;">&nbsp;</div>
				</div>
			</div>
			<div style="margin-top:12px;margin-left:225px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:470px;"><?php echo $mgrDoc['userInfo']['addr1'] . ' ' . $mgrDoc['userInfo']['addr2'] ?></div>
					<div class="col" style="flex:none;width:260px;margin-left:50px;text-align:center;"><?php echo add_hyphen($mgrDoc['userInfo']['phone1']) ?></div>
				</div>
			</div>
			<div style="margin-top:92px;margin-left:186px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:116px;">
						<div style="font-size:14px;"><?php echo $hat1 ?></div>
						<div style="font-size:14px;text-align:right;margin-right:5px;"><?php echo $hat2 ?></div>
					</div>
					<div class="col" style="flex:none;width:116px;margin-left:5px;">
						<div style="font-size:14px;"><?php echo $belt1 ?></div>
						<div style="font-size:14px;text-align:right;margin-right:5px;"><?php echo $belt2 ?></div>
					</div>
					<div class="col" style="flex:none;width:116px;margin-left:4px;">
						<div style="font-size:14px;"><?php echo $boots1 ?></div>
						<div style="font-size:14px;text-align:right;margin-right:5px;"><?php echo $boots2 ?></div>
					</div>
					<div class="col" style="flex:none;width:116px;margin-left:4px;">
						<div style="font-size:14px;"><?php echo $leggings1 ?></div>
						<div style="font-size:14px;text-align:right;margin-right:5px;"><?php echo $leggings2 ?></div>
					</div>
					<div class="col" style="flex:none;width:116px;margin-left:4px;">
						<div style="font-size:14px;"><?php echo $glasses1 ?></div>
						<div style="font-size:14px;text-align:right;margin-right:5px;"><?php echo $glasses2 ?></div>
					</div>
					<div class="col" style="flex:none;width:116px;margin-left:4px;">
						<div style="font-size:14px;"><?php echo $vest1 ?></div>
						<div style="font-size:14px;text-align:right;margin-right:5px;"><?php echo $vest2 ?></div>
					</div>
					<div class="col" style="flex:none;width:116px;margin-left:4px;"><?php echo $mgrDoc['safetyDocs'][$index]['content']['etc'] ?></div>
				</div>
			</div>
			<div style="margin-top:485px;margin-left:245px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:217px;text-align:center;"><?php echo ($point) ? $point : '&nbsp;' ?></div>
				</div>
			</div>
			<div style="margin-top:72px;text-align:right;margin-right:90px;"><?php echo $eduDate ?></div>
			<div style="margin-top:3px;text-align:right;margin-right:200px;"><?php echo $mgrDoc['userInfo']['name'] ?></div>
			<div style="margin-top:74px;margin-left:265px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:25px;text-align:center;"><?php echo $abo1 ?></div>
					<div class="col" style="flex:none;width:25px;margin-left:188px;text-align:center;"><?php echo $abo2 ?></div>
					<div class="col" style="flex:none;width:25px;margin-left:185px;text-align:center;"><?php echo $abo3 ?></div>
					<div class="col" style="flex:none;width:25px;margin-left:178px;text-align:center;"><?php echo $abo4 ?></div>
				</div>
			</div>
			<div style="margin-top:14px;margin-left:306px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:25px;text-align:center;"><?php echo $normal1 ?></div>
					<div class="col" style="flex:none;width:25px;margin-left:52px;text-align:center;"><?php echo $normal2 ?></div>
					<div class="col" style="flex:none;width:392px;margin-left:225px;text-align:center;"><?php echo $stamina ?></div>
				</div>
			</div>
			<div style="margin-top:17px;margin-left:220px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:405px;"><?php echo $input4 ?></div>
					<div class="col" style="flex:none;width:240px;margin-left:6px;">현재 작업 이상무 : <?php echo $mgrDoc['userInfo']['name'] ?></div>
				</div>
			</div>
			<div style="margin-top:5px;margin-left:220px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:405px;"><?php echo $input5 ?></div>
					<div class="col" style="flex:none;width:240px;margin-left:6px;">현재 작업 이상무 : <?php echo $mgrDoc['userInfo']['name'] ?></div>
				</div>
			</div>
			<div style="margin-top:6px;margin-left:220px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:795px;"><?php echo $input6 ?></div>
				</div>
			</div>
			<div style="margin-top:20px;margin-left:345px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:100px;text-align:center;"><?php echo $mgrDoc['safetyDocs'][$index]['content']['input7_1_value'] ?></div>
				</div>
			</div>
			<div style="margin-top:-42px;margin-left:725px;margin-bottom:28px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:280px;text-align:center;"><?php echo $mgrDoc['safetyDocs'][$index]['content']['input7_2_value'] ?><br /><?php echo $mgrDoc['safetyDocs'][$index]['content']['input7_3_value'] ?></div>
				</div>
			</div>
			<div style="display:block;position:absolute;top:130px;left:400px;width:150px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:513px;left:220px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:513px;left:340px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:513px;left:460px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:513px;left:580px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:513px;left:700px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:513px;left:820px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:1048px;left:890px;width:150px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:1299px;left:879px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:1337px;left:879px;width:50px;z-index:99;"><?php echo $signature ?></div>
			<div style="display:block;position:absolute;top:136px;left:45px;z-index:99;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;width:154px;text-align:center;">&nbsp;</div>
					<div class="col" style="flex:none;width:195px;margin-left:6px;text-align:center;"><?php echo substr($mgrDoc['userInfo']['certDate'], 0, 10) ?></div>
				</div>
			</div>
		</div>

		<div class="print_page" style="padding:50px 0;">
			<img src="/view/images/doc_3_2.jpg" style="margin:0 auto;">
			<div style="margin-top:-700px;margin-left:723px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;"><?php echo $check ?></div>
				</div>
			</div>
			<div style="margin-top:-5px;margin-left:723px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;"><?php echo $check ?></div>
				</div>
			</div>
			<div style="margin-top:-5px;margin-left:723px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;"><?php echo $check ?></div>
				</div>
			</div>
			<div style="margin-top:188px;margin-left:727px;">
				<div class="row" style="display:flex;">
					<div class="col" style="flex:none;"><?php echo $check ?></div>
				</div>
			</div>
			<div style="margin-top:278px;text-align:right;margin-right:90px;"><?php echo $eduDate ?></div>
			<div style="margin-top:3px;text-align:right;margin-right:200px;margin-bottom:85px;"><?php echo $mgrDoc['userInfo']['name'] ?></div>
			<div style="display:block;position:absolute;top:1290px;left:890px;width:150px;z-index:99;"><?php echo $signature ?></div>
		</div>
<?php
	}
}
?>