<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

if (!($_SESSION['level'] == 0 || $_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	alert('접근 권한이 없습니다.');
}

include_once('_head.php');
include_once('_page_top.php');
?>


<h3 class="tit v1">근로자 작성문서 상세</h3>
<div class="tit-wrap v1">
	<p class="tit v2">상세 내용</p>
</div>
<div class="db-wrap v1">
	<div class="row">
		<div class="col">
			<p class="tit v3 mb4">문서명</p>
			<div class="txt">
				<p id="doc_name">안전수칙준수 서약서</p>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">이름</p>
			<div class="txt">
				<p id="user_name" class="fx-cont">홍길동</p><i class="ic-link" style="cursor:pointer;"></i><!-- 20210823 수정 -->
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">현장</p>
			<div class="txt">
				<p id="site_nmae">공덕역A공구</p>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">소속</p>
			<div class="txt">
				<p id="sv_name">OO토건</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p class="tit v3 mb4">유형</p>
			<div class="txt">
				<p id="type">동의서</p>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">작성일시</p>
			<div id="reg_date" class="txt">
				<p>2021.01.01 15:20</p>
			</div>
		</div>
	</div>

	<form id="add_form" method="post">

	<input type="hidden" id="key" value="<?php echo clean_xss_tags($_GET['key'])?>">

	<input type="hidden" id="docId" value="<?php echo clean_xss_tags($_GET['safetyDocId'])?>">
	<input type="hidden" id="templateType" value="">
	<input type="hidden" id="safetyDocId" value="<?php echo clean_xss_tags($_GET['safetyDocId'])?>">
	<input type="hidden" id="siteId" value="">
	<input type="hidden" id="accId" value="">
	
	<div id="templateType0_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType0?></p>
				</div>

				<p class="tit v2 mb6" id="input1_name"><?php echo $_lc['TXT']['안전모']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input1_1">
							<input type="radio" name="input1" id="input1_1" value="<?php echo $_lc['TXT']['개인보유']?>" >
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_2">
							<input type="radio" name="input1" id="input1_2" value="<?php echo $_lc['TXT']['현장지급']?>" >
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input2_name"><?php echo $_lc['TXT']['안전벨트']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input2_1">
							<input type="radio" name="input2" id="input2_1" value="<?php echo $_lc['TXT']['개인보유']?>" >
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input2_2">
							<input type="radio" name="input2" id="input2_2" value="<?php echo $_lc['TXT']['현장지급']?>" >
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input3_name"><?php echo $_lc['TXT']['안전화']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input3_1">
							<input type="radio" name="input3" id="input3_1" value="<?php echo $_lc['TXT']['개인보유']?>" >
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input3_2">
							<input type="radio" name="input3" id="input3_2" value="<?php echo $_lc['TXT']['현장지급']?>" >
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input4_name"><?php echo $_lc['TXT']['각반']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input4_1">
							<input type="radio" name="input4" id="input4_1" value="<?php echo $_lc['TXT']['개인보유']?>" >
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_2">
							<input type="radio" name="input4" id="input4_2" value="<?php echo $_lc['TXT']['현장지급']?>" >
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input5_name"><?php echo $_lc['TXT']['보안경']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input5_1">
							<input type="radio" name="input5" id="input5_1" value="<?php echo $_lc['TXT']['개인보유']?>" >
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_2">
							<input type="radio" name="input5" id="input5_2" value="<?php echo $_lc['TXT']['현장지급']?>" >
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_name"><?php echo $_lc['TXT']['낙반조끼']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input6_1">
							<input type="radio" name="input6" id="input6_1" value="<?php echo $_lc['TXT']['개인보유']?>" >
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_2">
							<input type="radio" name="input6" id="input6_2" value="<?php echo $_lc['TXT']['현장지급']?>" >
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_name"><?php echo $_lc['TXT']['기타']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input7" id="input7" maxlength="50" minlength="2" placeholder="<?php echo $_lc['TXT']['기타']?>" autocomplete="off" readonly></div>
				</div>
			</div>
		</div>
	</div>

	<div id="templateType1_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType2?></p>
				</div>
				<ul class="list-wrap v1">
					<li><span class="num">1</span><?php echo $_lc['TXT']['나는모든작업에임함에있어제반안전수칙을지키는데모범을보이겠다']?></li>
					<li><span class="num">2</span><?php echo $_lc['TXT']['나는작업중나타난불안전한상태에대해서즉시시정하겠다']?></li>
					<li><span class="num">3</span><?php echo $_lc['TXT']['나는작업장내에서항시안전모안전화착용에철저하겠다']?></li>
					<li><span class="num">4</span><?php echo $_lc['TXT']['나는개인보호구관리에세심한주의를기울이며작업에따른해당보호구착용에철저하겠다']?></li>
					<li><span class="num">5</span><?php echo $_lc['TXT']['나는아무리급한사정이있어도무면허운전무단운전음주운전적재함탑승정원외승차등을절대하지않겠다']?></li>
					<li><span class="num">6</span><?php echo $_lc['TXT']['나는모든사용공구를조심스럽게다루고올바른목적에사용하겠으며장비와기계는사용시인명과재산의손실을초래할수있으므로반드시사전에감독자승인을얻은후취급하겠다']?></li>
					<li><span class="num">7</span><?php echo $_lc['TXT']['나는모든안전규칙과안전표지에절대순응하겠다']?></li>
					<li><span class="num">8</span><?php echo $_lc['TXT']['나는재해발생시즉시보고및즉각적인응급조치로재해상태를극소화시키는데최선을다하겠다']?></li>
					<li><span class="num">9</span><?php echo $_lc['TXT']['나는작업중또는작업시간외에도결코난잡하게행동하지않으며동료들안전을위해가능한모든것을수행하겠다']?></li>
				</ul>
				<div class="tit-wrap v1 mt30">
					<p class="tit v2"><?php echo $_lc['TXT']['5행']?></p>
				</div>
				<ul class="list-wrap v1">
					<li><span class="num">1</span><?php echo $_lc['TXT']['나는안전조회교육에참석한다']?></li>
					<li><span class="num">2</span><?php echo $_lc['TXT']['나는안전모턱끈을반드시조인다']?></li>
					<li><span class="num">3</span><?php echo $_lc['TXT']['나는통로가안전한지확인하고이동한다']?></li>
					<li><span class="num">4</span><?php echo $_lc['TXT']['나는사용한자재공구는항상안전한구역에둔다']?></li>
					<li><span class="num">5</span><?php echo $_lc['TXT']['나는추락위험장소에는안전벨트를반드시걸고작업한다']?></li>
				</ul>
				<div class="tit-wrap v1 mt30">
					<p class="tit v2"><?php echo $_lc['TXT']['5금']?></p>
				</div>
				<ul class="list-wrap v1">
					<li><span class="num">1</span><?php echo $_lc['TXT']['나는장비작업반경과위험표지가있는곳은접근하지않는다']?></li>
					<li><span class="num">2</span><?php echo $_lc['TXT']['나는허가없이단독작업히지않는다']?></li>
					<li><span class="num">3</span><?php echo $_lc['TXT']['나는안전시설을허가없이제거하지않는다']?></li>
					<li><span class="num">4</span><?php echo $_lc['TXT']['나는안전하지않은공도구를사용하지않는다']?></li>
					<li><span class="num">5</span><?php echo $_lc['TXT']['나는지정된장소가아니면흡연통화하지않는다']?></li>
				</ul>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">서명</p>
			<div class="sign-wrap">
				<img src="../img/@temp_sign.png" id="sign_img" style="height:90%;">
			</div>
		</div>
	</div>

	<div id="templateType2_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType2?></p>
				</div>
				<p class="tit v2 mb6 mt40" id="input1_name"><?php echo $_lc['TXT']['Test결과']?></p>
                <div class="inp-wrap">
                    <div class="inp-item">
						<input type="text" name="input1" id="input1" class="number" maxlength="3" minlength="2" placeholder="<?php echo $_lc['TXT']['Test결과']?>" autocomplete="off" readonly>
                    </div>
                </div>
			</div>
		</div>
	</div>

	<div id="templateType3_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType3?></p>
				</div>

				<p class="tit v2 mb6" id="input1_name"><?php echo $_lc['TXT']['혈액형']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input1_1">
							<input type="radio" name="input1" id="input1_1" value="A" >
							<p class="txt">A</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_2">
							<input type="radio" name="input1" id="input1_2" value="B" >
							<p class="txt">B</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_3">
							<input type="radio" name="input1" id="input1_3" value="O" >
							<p class="txt">O</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_4">
							<input type="radio" name="input1" id="input1_4" value="AB" >
							<p class="txt">AB</p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input2_name"><?php echo $_lc['TXT']['기초체력이상유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input2_1">
							<input type="radio" name="input2" id="input2_1" value="O" >
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input2_2">
							<input type="radio" name="input2" id="input2_2" value="X" >
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input3_name"><?php echo $_lc['TXT']['기초체력']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input3_1">
							<input type="radio" name="input3" id="input3_1" value="High" >
							<p class="txt"><?php echo $_lc['TXT']['상']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input3_2">
							<input type="radio" name="input3" id="input3_2" value="Middle" >
							<p class="txt"><?php echo $_lc['TXT']['중']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input3_2">
							<input type="radio" name="input3" id="input3_2" value="Low" >
							<p class="txt"><?php echo $_lc['TXT']['하']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input4_name"><?php echo $_lc['TXT']['과거병력수술유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input4_1">
							<input type="radio" name="input4" id="input4_1" value="O" >
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_2">
							<input type="radio" name="input4" id="input4_2" value="X" >
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20 radio4_1" id="input4_1_name" style="display:none;"><?php echo $_lc['TXT']['과거병력수술해당부위병명']?></p>
				<div class="inp-wrap radio4_1" style="display:none;">
					<div class="inp-item"><input type="text" name="input4_1_value" id="input4_1_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['과거병력수술해당부위병명']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input5_name"><?php echo $_lc['TXT']['산재유무']?>산재유무</p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input5_1">
							<input type="radio" name="input5" id="input5_1" value="O" >
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_2">
							<input type="radio" name="input5" id="input5_2" value="X" >
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20 radio5_1" id="input5_1_name" style="display:none;"><?php echo $_lc['TXT']['산재해당부위병명']?></p>
				<div class="inp-wrap radio5_1" style="display:none;">
					<div class="inp-item"><input type="text" name="input5_1_value" id="input5_1_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['산재해당부위병명']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_1_name"><?php echo $_lc['TXT']['생활습관사항흡연갑일']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input6_1_value" id="input6_1_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['생활습관사항흡연갑일']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_2_name"><?php echo $_lc['TXT']['생활습관사항주량회주']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input6_2_value" id="input6_2_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['생활습관사항주량회주']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_3_name"><?php echo $_lc['TXT']['생활습관사항수면시간시간일']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input6_3_value" id="input6_3_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['생활습관사항수면시간시간일']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_1_name"><?php echo $_lc['TXT']['해당직종경력년']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input7_1_value" id="input7_1_value" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력년']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_2_name"><?php echo $_lc['TXT']['비상연락처']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input7_2_value" id="input7_2_value" class="phone" maxlength="13" placeholder="<?php echo $_lc['TXT']['비상연락처']?>" autocomplete="off" readonly></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_3_name"><?php echo $_lc['TXT']['비상연락처성명관계']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input7_3_value" id="input7_3_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['비상연락처성명관계']?>" autocomplete="off" readonly></div>
				</div>
			</div>
		</div>
	</div>

	<div id="templateType4_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType4?></p>
				</div>

				<p class="tit v2 mb6" id="input1_name"><?php echo $_lc['TXT']['안전모']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input1_1">
							<input type="radio" name="input1" id="input1_1" value="<?php echo $_lc['TXT']['개인보유']?>">
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_2">
							<input type="radio" name="input1" id="input1_2" value="<?php echo $_lc['TXT']['현장지급']?>">
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input2_name"><?php echo $_lc['TXT']['안전벨트']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input2_1">
							<input type="radio" name="input2" id="input2_1" value="<?php echo $_lc['TXT']['개인보유']?>">
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input2_2">
							<input type="radio" name="input2" id="input2_2" value="<?php echo $_lc['TXT']['현장지급']?>">
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input3_name"><?php echo $_lc['TXT']['안전화']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input3_1">
							<input type="radio" name="input3" id="input3_1" value="<?php echo $_lc['TXT']['개인보유']?>">
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input3_2">
							<input type="radio" name="input3" id="input3_2" value="<?php echo $_lc['TXT']['현장지급']?>">
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input4_name"><?php echo $_lc['TXT']['각반']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input4_1">
							<input type="radio" name="input4" id="input4_1" value="<?php echo $_lc['TXT']['개인보유']?>">
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_2">
							<input type="radio" name="input4" id="input4_2" value="<?php echo $_lc['TXT']['현장지급']?>">
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input5_name"><?php echo $_lc['TXT']['보안경']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input5_1">
							<input type="radio" name="input5" id="input5_1" value="<?php echo $_lc['TXT']['개인보유']?>">
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_2">
							<input type="radio" name="input5" id="input5_2" value="<?php echo $_lc['TXT']['현장지급']?>">
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_name"><?php echo $_lc['TXT']['방진마스크']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input6_1">
							<input type="radio" name="input6" id="input6_1" value="<?php echo $_lc['TXT']['개인보유']?>">
							<p class="txt"><?php echo $_lc['TXT']['개인보유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_2">
							<input type="radio" name="input6" id="input6_2" value="<?php echo $_lc['TXT']['현장지급']?>">
							<p class="txt"><?php echo $_lc['TXT']['현장지급']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_name"><?php echo $_lc['TXT']['기타']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input7" id="input7" maxlength="50" minlength="2" placeholder="<?php echo $_lc['TXT']['기타']?>" autocomplete="off"></div>
				</div>
			</div>
		</div>
	</div>

	<div id="templateType5_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType5?></p>
				</div>
				<p class="tit v5"><?php echo $_lc['TXT']['안전수칙준수서약']?></p>
                <ul class="list-wrap v4 mt20">
                    <li>
                        <p class="num">1</p>
                        <p class="txt"><?php echo $_lc['TXT']['작업장내에서는안전보호구를반드시착용하겠습니다']?></p>
                    </li>
                    <li>
                        <p class="num">2</p>
                        <p class="txt"><?php echo $_lc['TXT']['안전조회는반드시참석하겠습니다']?></p>
                    </li>
                    <li>
                        <p class="num">3</p>
                        <p class="txt"><?php echo $_lc['TXT']['작업중흡연및음주후절대작업하지않겠습니다']?></p>
                    </li>
                    <li>
                        <p class="num">4</p>
                        <p class="txt"><?php echo $_lc['TXT']['정해진작업발판사다리B/T비계를사용하겠습니다']?></p>
                    </li>
                    <li>
                        <p class="num">5</p>
                        <p class="txt"><?php echo $_lc['TXT']['기타호반캠폐인4무4행4금운동및현장안전관리규정과작업안전수칙을철저히준수하겠습니다']?></p>
                    </li>
                    
                </ul>
			</div>
		</div>
		<div class="col">
			<p class="tit v3 mb4">서명</p>
			<div class="sign-wrap">
				<img src="../img/@temp_sign.png" id="sign_img2" style="height:90%;">
			</div>
		</div>
	</div>

	<div id="templateType6_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType6?></p>
				</div>

				<p class="tit v2 mb6 mt20" id="input1_name"><?php echo $_lc['TXT']['직종']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input1_value" id="input1_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['직종']?>" autocomplete="off"></div>
				</div>
				

				<p class="tit v2 mb6 mt20" id="input2_name"><?php echo $_lc['TXT']['팀장']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input2_value" id="input2_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['팀장']?>" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input3_name"><?php echo $_lc['TXT']['연락처(H.P)']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input3_value" id="input3_value" class="phone" maxlength="13" placeholder="<?php echo $_lc['TXT']['연락처(H.P)']?>" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input4_name"><?php echo $_lc['TXT']['연락처(자택)']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input4_value" id="input4_value" class="phone" maxlength="13" placeholder="<?php echo $_lc['TXT']['연락처(자택)']?>" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input5_name"><?php echo $_lc['TXT']['비상연락처']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input5_value" id="input5_value" class="phone" maxlength="13" placeholder="<?php echo $_lc['TXT']['비상연락처']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_name"><?php echo $_lc['TXT']['비상연락처성명']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input6_value" id="input6_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['비상연락처성명']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_name"><?php echo $_lc['TXT']['비상연락처관계']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input7_value" id="input7_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['비상연락처관계']?>" autocomplete="off"></div>
				</div>

				<dl class="mt20">
					<dt>
						<p class="tit v2" id="input8_name"><?php echo $_lc['TXT']['주소']?></p>
					</dt>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="text" name="input8_1_value" id="input8_1_value" placeholder="<?php echo $_lc['placeholder']['주소검색']?>" readonly>
							</div>
						</div>
					</dd>
					<dd class="mt6">
						<div class="inp-wrap">
							<div class="inp-item">
								<input type="text" name="input8_2_value" id="input8_2_value" placeholder="<?php echo $_lc['placeholder']['상세주소']?>" autocomplete="off" maxlength="50">
							</div>
						</div>
					</dd>
				</dl>

				
				<p class="tit v2 mb6 mt20" id="input9_name"><?php echo $_lc['TXT']['현재건강상태']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input9_1">
							<input type="radio" name="input9" id="input9_1" value="High">
							<p class="txt"><?php echo $_lc['TXT']['좋음']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input9_2">
							<input type="radio" name="input9" id="input9_2" value="Middle">
							<p class="txt"><?php echo $_lc['TXT']['보통']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input9_3">
							<input type="radio" name="input9" id="input9_3" value="Low">
							<p class="txt"><?php echo $_lc['TXT']['안좋음']?></p>
						</label>
					</div>
				</div>


				<p class="tit v2 mb6 mt20" id="input10_name"><?php echo $_lc['TXT']['혈액형']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input10_1">
							<input type="radio" name="input10" id="input10_1" value="A">
							<p class="txt">A</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_2">
							<input type="radio" name="input10" id="input10_2" value="B">
							<p class="txt">B</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_3">
							<input type="radio" name="input10" id="input10_3" value="O">
							<p class="txt">O</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_4">
							<input type="radio" name="input10" id="input10_4" value="AB">
							<p class="txt">AB</p>
						</label>
					</div>
				</div>
				<!--
				<p class="tit v2 mb6 mt20" id="input11_name"><?php echo $_lc['TXT']['혈압']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input11_value" id="input11_value" maxlength="50" placeholder="mmHg" autocomplete="off"></div>
				</div>
-->
				<p class="tit v2 mb6 mt20" id="input12_name"><?php echo $_lc['TXT']['해당직종경력']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input12_1_value" id="input12_1_value" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력년']?>" autocomplete="off"></div>
					<div class="inp-item"><input type="text" name="input12_2_value" id="input12_2_value" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력개월']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input13_name"><?php echo $_lc['TXT']['과거작업중재해유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input13_1">
							<input type="radio" name="input13" id="input13_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input13_2">
							<input type="radio" name="input13" id="input13_2" value="X">
							<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input14_name"><?php echo $_lc['TXT']['있다면과거에산재처리를한적이있습니까']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input14_1">
							<input type="radio" name="input14" id="input14_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input14_2">
							<input type="radio" name="input14" id="input14_2" value="X">
							<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20 radio9_1" id="input15_name" style="display:none;"><?php echo $_lc['TXT']['산재해당부위병명']?></p>
				<div class="inp-wrap radio9_1" style="display:none;">
					<div class="inp-item"><input type="text" name="input15_value" id="input15_value" maxlength="50" placeholder="<?php echo $_lc['TXT']['산재해당부위병명']?>" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input16_name"><?php echo $_lc['TXT']['의사에게주의받은병이있습니까']?></p>
				<div class="inp-wrap radio_overwrap">
					<div class="inp-item radio">
						<label for="input16_1">
							<input type="radio" name="input16" id="input16_1" value="hbp">
							<p class="txt"><?php echo $_lc['TXT']['있다고혈압']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_2">
							<input type="radio" name="input16" id="input16_2" value="heart">
							<p class="txt"><?php echo $_lc['TXT']['있다심장']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_3">
							<input type="radio" name="input16" id="input16_3" value="diabetes">
							<p class="txt"><?php echo $_lc['TXT']['있다당뇨']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_4">
							<input type="radio" name="input16" id="input16_4" value="disc">
							<p class="txt"><?php echo $_lc['TXT']['있다디스크']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_5">
							<input type="radio" name="input16" id="input16_5" value="etcs">
							<p class="txt"><?php echo $_lc['TXT']['있다기타']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_6">
							<input type="radio" name="input16" id="input16_6" value="X">
							<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="templateType7_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType7?></p>
				</div>

				<div class="bloodWrap">
				<p class="tit v2 mb6">■ <?php echo $_lc['TXT']['혈압용지사진첨부']?></p>
				<div id='input1_name' style='display:none'><?php echo $_lc['TXT']['혈압용지사진첨부']?></div>
				<div class="bloodup field-wrap">
					<input type="file" id="bl_pic" name="bl_pic" value="" accept="image/jpeg, image/png" style="display:none;">
					<label for="bl_pic" class="bx-link"><i class="ic-safety-document"></i> <p><?php echo $_lc['BTN']['사진촬영']?></p></label>
					<!--업로드시 아래 미리보기-->
					<div class="bloodPrv">
						<img src="/view/img/no_image_150_150.jpg" alt="" id="previewImg">
					</div>
				</div>
				<input type='hidden' id='imgPathurl' value='' />
				



				<p class="tit v2 mb6 mt20">■ <?php echo $_lc['TXT']['혈압측정치']?></p>
				<p class="rowInput mb6">
					<span id='input2_name'><?php echo $_lc['TXT']['최고(수축)']?></span>
					<input type="number" id="input2_value" name="input2_value" value="" placeholder="mmHG" />
				</p>
				<p class="rowInput">
					<span id='input3_name'><?php echo $_lc['TXT']['최고(이완)']?></span>
					<input type="number" id="input3_value" name="input3_value" value="" placeholder="mmHG" />
				</p>

				<div class="mt20">
					<p><?php echo $_lc['TXT']['고혈압기준안내']?></p>
					<p>1) <?php echo $_lc['TXT']['집중관리대상']?></p>
					<p>2) <?php echo $_lc['TXT']['일반관리대상']?></p>
				</div>

				
			</div>
			</div>
		</div>
	</div>
	<div class="btn-wrap mt80 pb40">
		<button type="submit" class="btn md long bg-navy txt-white has-ic"><i class="ic-submit"></i>저장</button>
		<button type="button" class="btn md long bg-black txt-white has-ic" id="back_btn" onclick='history.back();'><i class="ic-cancle"></i>이전으로</button>
	</div>
	<!--
	<div class="docu_btnwrap">
		<button type="submit" id="" class="">수정</button>
	</div>
-->

	</form>

	



</div>

<!-- // popup(alert) - 페이지 벗어남 체크 -->
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    //주소검색 이벤트
    $('#adress1').on('click', function() {
        new daum.Postcode({
            oncomplete: function(data) {
                console.log(data);

                //$('#zip_code').val(data.zonecode);

                if (data.roadAddress){
                    $('#adress1').val(data.roadAddress);
                } else if(data.jibunAddress){
                    $('#adress1').val(data.jibunAddress);
                } else if (data.address) {
                    $('#adress1').val(data.address);
                }

                $('#adress2').focus();
            }
        }).open();
    });
</script>

<?php 
include_once('_page_bottom.php');
include_once('_tail.php');
?>