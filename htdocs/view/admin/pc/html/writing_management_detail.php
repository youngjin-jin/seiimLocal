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
						<label for="input1_3_1">
							<input type="radio" name="input1" id="input1_3_1" value="A" >
							<p class="txt">A</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_3_2">
							<input type="radio" name="input1" id="input1_3_2" value="B" >
							<p class="txt">B</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_3_3">
							<input type="radio" name="input1" id="input1_3_3" value="O" >
							<p class="txt">O</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_3_4">
							<input type="radio" name="input1" id="input1_3_4" value="AB" >
							<p class="txt">AB</p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input2_name"><?php echo $_lc['TXT']['기초체력이상유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input2_3_1">
							<input type="radio" name="input2" id="input2_3_1" value="O" >
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input2_3_2">
							<input type="radio" name="input2" id="input2_3_2" value="X" >
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input3_name"><?php echo $_lc['TXT']['기초체력']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input3_3_1">
							<input type="radio" name="input3" id="input3_3_1" value="High" >
							<p class="txt"><?php echo $_lc['TXT']['상']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input3_3_2">
							<input type="radio" name="input3" id="input3_3_2" value="Middle" >
							<p class="txt"><?php echo $_lc['TXT']['중']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input3_3_2">
							<input type="radio" name="input3" id="input3_3_2" value="Low" >
							<p class="txt"><?php echo $_lc['TXT']['하']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input4_name"><?php echo $_lc['TXT']['과거병력수술유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input4_3_1">
							<input type="radio" name="input4" id="input4_3_1" value="O" >
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_3_2">
							<input type="radio" name="input4" id="input4_3_2" value="X" >
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
						<label for="input5_3_1">
							<input type="radio" name="input5" id="input5_3_1" value="O" >
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_3_2">
							<input type="radio" name="input5" id="input5_3_2" value="X" >
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
						<label for="input9_6_1">
							<input type="radio" name="input9" id="input9_6_1" value="High">
							<p class="txt"><?php echo $_lc['TXT']['좋음']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input9_6_2">
							<input type="radio" name="input9" id="input9_6_2" value="Middle">
							<p class="txt"><?php echo $_lc['TXT']['보통']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input9_6_3">
							<input type="radio" name="input9" id="input9_6_3" value="Low">
							<p class="txt"><?php echo $_lc['TXT']['안좋음']?></p>
						</label>
					</div>
				</div>


				<p class="tit v2 mb6 mt20" id="input10_name"><?php echo $_lc['TXT']['혈액형']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input10_6_1">
							<input type="radio" name="input10" id="input10_6_1" value="A">
							<p class="txt">A</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_6_2">
							<input type="radio" name="input10" id="input10_6_2" value="B">
							<p class="txt">B</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_6_3">
							<input type="radio" name="input10" id="input10_6_3" value="O">
							<p class="txt">O</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_6_4">
							<input type="radio" name="input10" id="input10_6_4" value="AB">
							<p class="txt">AB</p>
						</label>
					</div>
				</div>
				<!--
				<p class="tit v2 mb6 mt20" id="input11_name"><?php echo $_lc['TXT']['혈압']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input11_value" id="input11_value" maxlength="50" placeholder="mmHg" autocomplete="off"></div>
				</div>-->
				<p class="tit v2 mb6 mt20" id="input12_name"><?php echo $_lc['TXT']['해당직종경력']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input12_1_value" id="input12_1_value" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력년']?>" autocomplete="off"></div>
					<div class="inp-item"><input type="text" name="input12_2_value" id="input12_2_value" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력개월']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input13_name"><?php echo $_lc['TXT']['과거작업중재해유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input13_6_1">
							<input type="radio" name="input13" id="input13_6_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input13_6_2">
							<input type="radio" name="input13" id="input13_6_2" value="X">
							<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input14_name"><?php echo $_lc['TXT']['있다면과거에산재처리를한적이있습니까']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input14_6_1">
							<input type="radio" name="input14" id="input14_6_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input14_6_2">
							<input type="radio" name="input14" id="input14_6_2" value="X">
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
						<label for="input16_6_1">
							<input type="radio" name="input16" id="input16_6_1" value="hbp">
							<p class="txt"><?php echo $_lc['TXT']['있다고혈압']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_6_2">
							<input type="radio" name="input16" id="input16_6_2" value="heart">
							<p class="txt"><?php echo $_lc['TXT']['있다심장']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_6_3">
							<input type="radio" name="input16" id="input16_6_3" value="diabetes">
							<p class="txt"><?php echo $_lc['TXT']['있다당뇨']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_6_4">
							<input type="radio" name="input16" id="input16_6_4" value="disc">
							<p class="txt"><?php echo $_lc['TXT']['있다디스크']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_6_5">
							<input type="radio" name="input16" id="input16_6_5" value="etcs">
							<p class="txt"><?php echo $_lc['TXT']['있다기타']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input16_6_6">
							<input type="radio" name="input16" id="input16_6_6" value="X">
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

	<div id="templateType8_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType8?></p>
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
					<div class="inp-item radio">
						<label for="input1_3">
							<input type="radio" name="input1" id="input1_3" value="<?php echo $_lc['TXT']['해당없음']?>">
							<p class="txt"><?php echo $_lc['TXT']['해당없음']?></p>
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
					<div class="inp-item radio">
						<label for="input2_3">
							<input type="radio" name="input2" id="input2_3" value="<?php echo $_lc['TXT']['해당없음']?>">
							<p class="txt"><?php echo $_lc['TXT']['해당없음']?></p>
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
					<div class="inp-item radio">
						<label for="input3_3">
							<input type="radio" name="input3" id="input3_3" value="<?php echo $_lc['TXT']['해당없음']?>">
							<p class="txt"><?php echo $_lc['TXT']['해당없음']?></p>
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
					<div class="inp-item radio">
						<label for="input1_4">
							<input type="radio" name="input4" id="input1_4" value="<?php echo $_lc['TXT']['해당없음']?>">
							<p class="txt"><?php echo $_lc['TXT']['해당없음']?></p>
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
					<div class="inp-item radio">
						<label for="input5_3">
							<input type="radio" name="input5" id="input5_3" value="<?php echo $_lc['TXT']['해당없음']?>">
							<p class="txt"><?php echo $_lc['TXT']['해당없음']?></p>
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
					<div class="inp-item radio">
						<label for="input6_3">
							<input type="radio" name="input6" id="input6_3" value="<?php echo $_lc['TXT']['해당없음']?>">
							<p class="txt"><?php echo $_lc['TXT']['해당없음']?></p>
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

	<div id="templateType9_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType9?></p>
				</div>

				<div class="inp-wrap">
				<div class="inp-item checkbox">
					<label for="ag_chkall">
						<input type="checkbox" name="ag_chkall" id="ag_chkall" value="">
						<p  class="txt">모두 동의하기</p>
					</label>
				</div>
			</div>
			<div class="agreebox mt20">
				<div class="inp-wrap">
					<div class="inp-item checkbox">
						<label for="ag_1">
							<input type="checkbox" name="agree" id="ag_1" value="">
							<p  class="txt">안전수칙준수서약 동의하기</p>
						</label>
					</div>
				</div>
				<div class="openrow mt10">
					<p class="tit v5 "><?php echo $_lc['TXT']['안전수칙준수서약']?></p>
					<button type='button' id="" class="btn-ic ic-link black" ></button>
				</div>
				<div class="agreetxt">
					<ul class="list-wrap v4 ">
						<li>
							<p class="num">1</p>
							<p class="txt"><?php echo $_lc['TXT']['나는모든작업에임함에있어제반안전수칙을지키는데모범을보이겠다']?></p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt"><?php echo $_lc['TXT']['나는작업중나타난불안전한상태에대해서즉시시정하겠다']?></p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt"><?php echo $_lc['TXT']['나는작업장내에서항시안전모안전화착용에철저하겠다']?></p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt"><?php echo $_lc['TXT']['나는개인보호구관리에세심한주의를기울이며작업에따른해당보호구착용에철저하겠다']?></p>
						</li>
						<li>
							<p class="num">5</p>
							<p class="txt"><?php echo $_lc['TXT']['나는아무리급한사정이있어도무면허운전무단운전음주운전적재함탑승정원외승차등을절대하지않겠다']?></p>
						</li>
						<li>
							<p class="num">6</p>
							<p class="txt"><?php echo $_lc['TXT']['나는모든사용공구를조심스럽게다루고올바른목적에사용하겠으며장비와기계는사용시인명과재산의손실을초래할수있으므로반드시사전에감독자승인을얻은후취급하겠다']?></p>
						</li>
						<li>
							<p class="num">7</p>
							<p class="txt"><?php echo $_lc['TXT']['나는모든안전규칙과안전표지에절대순응하겠다']?></p>
						</li>
						<li>
							<p class="num">8</p>
							<p class="txt"><?php echo $_lc['TXT']['나는재해발생시즉시보고및즉각적인응급조치로재해상태를극소화시키는데최선을다하겠다']?></p>
						</li>
						<li>
							<p class="num">9</p>
							<p class="txt"><?php echo $_lc['TXT']['나는작업중또는작업시간외에도결코난잡하게행동하지않으며동료들안전을위해가능한모든것을수행하겠다']?></p>
						</li>
					</ul>
					<p class="tit v5 mt40"><?php echo $_lc['TXT']['5행']?></p>
					<ul class="list-wrap v4 mt20">
						<li>
							<p class="num">1</p>
							<p class="txt"><?php echo $_lc['TXT']['나는안전조회교육에참석한다']?></p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt"><?php echo $_lc['TXT']['나는안전모턱끈을반드시조인다']?></p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt"><?php echo $_lc['TXT']['나는통로가안전한지확인하고이동한다']?></p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt"><?php echo $_lc['TXT']['나는사용한자재공구는항상안전한구역에둔다']?></p>
						</li>
						<li>
							<p class="num">5</p>
							<p class="txt"><?php echo $_lc['TXT']['나는추락위험장소에는안전벨트를반드시걸고작업한다']?></p>
						</li>
					</ul>
					<p class="tit v5 mt40"><?php echo $_lc['TXT']['5금']?></p>
					<ul class="list-wrap v4 mt20">
						<li>
							<p class="num">1</p>
							<p class="txt"><?php echo $_lc['TXT']['나는장비작업반경과위험표지가있는곳은접근하지않는다']?></p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt"><?php echo $_lc['TXT']['나는허가없이단독작업히지않는다']?></p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt"><?php echo $_lc['TXT']['나는안전시설을허가없이제거하지않는다']?></p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt"><?php echo $_lc['TXT']['나는안전하지않은공도구를사용하지않는다']?></p>
						</li>
						<li>
							<p class="num">5</p>
							<p class="txt"><?php echo $_lc['TXT']['나는지정된장소가아니면흡연통화하지않는다']?></p>
						</li>
					</ul>
				</div>
			</div>

			<div class="agreebox mt20">
				<div class="inp-wrap">
					<div class="inp-item checkbox">
						<label for="ag_2">
							<input type="checkbox" name="agree" id="ag_2" value="">
							<p  class="txt">자율안전 서약 동의하기</p>
						</label>
					</div>
				</div>
				<div class="openrow mt10">
					<p class="tit v5 ">자율안전 서약서(신규근로자)</p>
					<button  type='button' id="" class="btn-ic ic-link black" ></button>
				</div>
				<div class="agreetxt">
					<ul class="list-wrap v4 ">
						<li>
							<p class="txt">상기 본인은 고속국도 제29호선 세종∼안성간 건설공사(제4공구)현장에서 근무함에 있어 아래의 행위를 준수하여 안전사고 예방을 위해 노력하며,  안전수칙 불이행 사항 적발 및 사고 유발 시 현장 작업중지 등 불이익 처분에 대하여 어떠한 이의도 제기 하지 않을 것을 서약합니다.</p>
						</li>
						<li>
							<p class="num">1</p>
							<p class="txt">모든 작업에 임할 때 제반 안전수칙을 준수한다. (산업안전보건법의 근로자 준수사항 및 시공사의 안전보건규정 등)</p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt">현장 안전관리자 및 관리감독자의 안전작업 지시에 적극 따른다.</p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt">작업장 내에서 안전모, 안전화 등 개인보호구를 철저히 착용한다. (2m이상 고소작업 시 안전대 및 안전고리 체결)</p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt">음주 후 현장 내 출입 및 작업을 하지 않는다.</p>
						</li>
						<li>
							<p class="num">5</p>
							<p class="txt">각종 안전시설물의 설치․해체 시 임의작업을 하지 않는다.</p>
						</li>
						<li>
							<p class="num">6</p>
							<p class="txt">나는 공구 및 도구(둥근톱, 그라인더, 절단기, 용접기 등)를 목적 외 사용하지 않고 방호장치를 임의로 해체하지 않는다.</p>
						</li>
						<li>
							<p class="num">7</p>
							<p class="txt">작업 중 불안전한 행동을 하지 않으며, 불안전한 상태 발견 시 작업을 중지하고 즉시 보고한다.</p>
						</li>
						<li>
							<p class="num">8</p>
							<p class="txt">고압선, 개구부, 중량물 인양, 건설장비 작업반경 등 유험장소에 접근하지 않는다.</p>
						</li>
						<li>
							<p class="num">9</p>
							<p class="txt">작업 전ㆍ후 자재 및 공구의 정리정돈을 철저히 한다.</p>
						</li>
					</ul>					
				</div>
			</div>
			

			<div class="agreebox mt20">
				<div class="inp-wrap">
					<div class="inp-item checkbox">
						<label for="ag_3">
							<input type="checkbox" name="agree" id="ag_3" value="">
							<p  class="txt">자율안전 서약 동의하기</p>
						</label>
					</div>
				</div>
				<div class="openrow mt10">
					<p class="tit v5 ">자율안전 서약서(신규 장비)</p>
					<button  type='button' id="" class="btn-ic ic-link black" ></button>
				</div>
				<div class="agreetxt">
					<ul class="list-wrap v4 ">
						<li>
							<p class="txt">상기 본인은 고속국도 제29호선 세종∼안성간 건설공사(제4공구)현장에서 근무함에 있어 아래의 행위를 준수하여 안전사고 예방을 위해 노력하며,  안전수칙 불이행 사항 적발 및 사고 유발 시 현장 작업중지 등 불이익 처분에 대하여 어떠한 이의도 제기 하지 않을 것을 서약합니다.</p>
						</li>
						<li>
							<p class="num">1</p>
							<p class="txt">현장 내에서 이동시 지정된 경로를 운행하고 서행(30km/hr 이하)한다.</p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt">운전 중 위험을 유발할 수 있는 휴대폰 등의 사용을 하지 않는다.</p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt">작업 시 신호수의 지시에 따라 안전하게 장비를 운전하고 안전벨트 체결, 굴삭기 버킷핀 체결, 주 용도 이외의 사용제한 등 수칙을 준수한다.</p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt">운전석을 이탈할 경우 포크, 버킷, 디퍼 등의 장치를 가장 낮은 위치 또는 지면에 내려 두고, 브레이크 작동 및 시동을 끄고 키를 제거 후 안전모 등 개인 보호구를 착용한다. </p>
						</li>
						<li>
							<p class="num">5</p>
							<p class="txt">장비의 이동시 적재함, 아웃트리거, 붐대 등 사고를 유발 할 수 있는 위험요인을 사전에 제거한다.</p>
						</li>
						<li>
							<p class="num">6</p>
							<p class="txt">작업차량의 적재함에 근로자를 승차 시키지 않는다. </p>
						</li>
						<li>
							<p class="num">7</p>
							<p class="txt">크레인 작업시 전도방지를 위해 고임목 설치, 아웃트리거 최대전개, 작업계획서에 따른 적정 인양각도 준수 등 안전조치를 이행한다.</p>
						</li>
						<li>
							<p class="num">8</p>
							<p class="txt">음주 후 작업을 하지 않으며 현장 내에서 장비를 정비하지 않는다.</p>
						</li>
						<li>
							<p class="num">9</p>
							<p class="txt">작업 중 불안전한 상태를 발견 시 즉시 작업을 중단하고 이를 보고한다.</p>
						</li>
					</ul>					
				</div>
			</div>

			<div class="agreebox mt20">
				<div class="inp-wrap">
					<div class="inp-item checkbox">
						<label for="ag_4">
							<input type="checkbox" name="agree" id="ag_4" value="">
							<p  class="txt">건강진단 사후조치 동의하기</p>
						</label>
					</div>
				</div>
				<div class="openrow mt10">
					<p class="tit v5 ">건강진단 사후조치 동의서</p>
					<button  type='button' id="" class="btn-ic ic-link black" ></button>
				</div>
				<div class="agreetxt">
					<ul class="list-wrap v4 ">
						<li>
							<p class="txt">당 현장(세종-안성고속4공구)은 산업안전보건법 제42조, 산업안전보건법 시행규칙 제93조(작업환경측정 대상 작업장 등)에 의거 “고용노동부령으로 정하는 작업장”이며 별표11의 5의 작업환경측정 대상 유해인자에 노출되는 근로자가 있는 작업장으로, 산업안전보건법 제43조제1항에 따라 별표12의2에서 정한 특수건강진단 대상 유해인자에 노출되는 업무에 종사하는 근로자는 법에 따라 “배치전 건강진단”(제18조 제1항에 따라 특수건강진단 대상 업무에 종사할 작업자에 대하여 배치예정업무에 대한 적합성 평가를 위하여 실시하는 건강진단)을 실시하여야 하며, 건강진단 실시 결과에 따른 사후조치를 따라야 합니다. </p>
						</li>
						<li>
							<p class="num">1</p>
							<p class="txt">따라서 특수건강진단 대상 유해인자에 노출되는 업무에 종사하는 본인은 건강진단 실시 결과에 따라 해당업무에 종사여부를 결정할 수 있으나, 현장 배치 전 건강진단 실시 후 진단결과에 따라 직업병 유소견자로 판정받은 경우 작업 전환 또는 작업 제한이 있을 수 있다는 사전 안내를 받았으며, 사후관리 조치에 따라 협조할 것을 동의합니다.</p>
						</li>						
					</ul>					
				</div>
			</div>
			
			<div class="agreebox mt20">
				<div class="inp-wrap">
					<div class="inp-item checkbox">
						<label for="ag_5">
							<input type="checkbox" name="agree" id="ag_5" value="">
							<p  class="txt">근로자 자기보호권 동의하기</p>
						</label>
					</div>
				</div>
				<div class="openrow mt10">
					<p class="tit v5">근로자 자기보호권</p>
					<button  type='button' id="" class="btn-ic ic-link black" ></button>
				</div>
				<div class="agreetxt">
					<ul class="list-wrap v4 ">
						<li>
							<p class="txt">자기보호권이란?</p>
						</li>
						<li>
							<p class="txt">현장 근로자가 작업전에 스스로 현장을 점검하여 위험요인 발견시      근로자 본인의 의사로 자가조치 또는 시정조치를 요청할 수 있는      권리를 말합니다.</p>
						</li>
						<li>
							<p class="txt">현장 근로자는 아래 “작업전 점검 및 조치방법”에 따라 작업전에      반드시 자가점검을 실시한 후 작업하시기 바랍니다.</p>
						</li>
						<li>
							<p class="num">1</p>
							<p class="txt">작업 전 해당 공종별 점검 체크리스트를 활용해 자가점검을 실시합니다. (반드시 자가점검 후 작업시작)</p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt">현장 위험요인 확인시 자가조치가 가능한 사항은 직접 위험요인을 조치한 후 작업 시작합니다.</p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt">자가조치 불가사항은 사업단에서 개설한 BAND를 활용해 작업반장이 하도급사 공사팀장에게 BAND로 신고(사진+내용)합니다.</p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt">위험요인 조치가 완료된 것을 확인한 후 작업시작 합니다.</p>
						</li>
						<li>
							<p class="txt">※ 작업중 현장 위험요인을 발견할 경우 즉시 작업중지 및 대피하시기 바라며, 해당내용을 공사팀장 044-866-9397으로 신고해 주시기 바랍니다.</p>
						</li>
						<li>
							<p class="txt">※ 안전시설 미흡을 이유로 작업중지하는 근로자에게는 해고, 임금미지급 등 부당한 처우를 할 수 없음을 알려드립니다.(산업안전보건법 제52조)</p>
						</li>
						<li>
							<p class="txt">[부당한 처우를 받을 경우 4공구 감독실 041-622-6091로 신고(익명보장)]</p>
						</li>
					</ul>					
				</div>
			</div>

			<div class="agreebox mt20">
				<div class="inp-wrap">
					<div class="inp-item checkbox">
						<label for="ag_6">
							<input type="checkbox" name="agree" id="ag_6" value="">
							<p  class="txt">근로자 2진 아웃제 동의하기</p>
						</label>
					</div>
				</div>
				<div class="openrow mt10">
					<p class="tit v5 ">근로자 2진 아웃제</p>
					<button  type='button' id="" class="btn-ic ic-link black" ></button>
				</div>
				<div class="agreetxt">
					<ul class="list-wrap v4 ">
						<li>
							<p class="txt">위반사항</p>
						</li>
						<li>
							<p class="num">1</p>
							<p class="txt">작업조건에 적합한 작업복 보호구 미착용 및 착용상태 불량 (ex:안전모, 식별조끼 등)</p>
						</li>
						<li>
							<p class="num">2</p>
							<p class="txt">현장내 입수보행</p>
						</li>
						<li>
							<p class="num">3</p>
							<p class="txt">고소 작업시 안전벨트 미착용</p>
						</li>
						<li>
							<p class="num">4</p>
							<p class="txt">지급된 개인보호구를 고의로 파손시</p>
						</li>
						<li>
							<p class="num">5</p>
							<p class="txt">현장내 지정된 장소 외 흡연 및 작업 중 흡연</p>
						</li>
						<li>
							<p class="num">6</p>
							<p class="txt">주간 및 야간 T.B.M 무단 불참자</p>
						</li>
						<li>
							<p class="num">7</p>
							<p class="txt">차량계 건설기계 운전자의 안전조치사항 미이행시 (고임목, 브레이크 등)</p>
						</li>
						<li>
							<p class="num">8</p>
							<p class="txt">작업차량 적재함 근로자 승차 (운전자 및 탑승자 즉시 퇴출)</p>
						</li>
						<li>
							<p class="num">9</p>
							<p class="txt">안전교육 무단 불참자</p>
						</li>

						<li>
							<p class="num">10</p>
							<p class="txt">안전지시사항에 불응시</p>
						</li>

						<li>
							<p class="txt">“추락“관련 지적 1회 적발시 퇴사조치 (ONE OUT)</p>
						</li>
						<li>
							<p class="txt">지적횟수 2회 이상 적발시 퇴사조치 (TWO OUT)</p>
						</li>
						<li>
							<p class="txt">위 사항은 아래 산업안전보건법에 의해 작성됨</p>
						</li>
						<li>
							<p class="txt">산업안전보건법 제6조 (근로자의 의무)</p>
						</li>
						<li>
							<p class="txt">근로자는 사업주 또는 근로기준법 제101조에 의하여 근로감독관 , 공단 등 관계인이 실시하는 산업재해 예방에 관한 조치에 따라야 한다.</p>
						</li>
						<li>
							<p class="txt">벌칙 : 위반자는 제175조에 따라 과태료를 부과</p>
						</li>
					</ul>					
				</div>
			</div>

				
			</div>
		</div>
	</div>

	<div id="templateType10_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType10?></p>
				</div>

				<p class="tit v2 mb6 mt40" id="input1_name"><?php echo $_lc['TXT']['Test결과']?></p>
				<div class="inp-wrap">
					<div class="inp-item">
						<input type="text" name="input1" id="input1" class="number" maxlength="3" minlength="2" placeholder="<?php echo $_lc['TXT']['Test결과']?>" autocomplete="off" >
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<div id="templateType11_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType11?></p>
				</div>

				<p class="tit v2 mb6" id="input1_name">신규 타입선택</p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input1_11_1">
							<input type="radio" name="input1" id="input1_11_1" value="A" class='selectRadio'>
							<p class="txt">신규 근로자</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input1_11_2">
							<input type="radio" name="input1" id="input1_11_2" value="B" class='selectRadio'>
							<p class="txt">신규 장비</p>
						</label>
					</div>
				</div>
				<!--신규 장비 선택했을 시 하단 표기-->
				<div class="inp-wrap selectType" style='display:none'>
					<div class="inp-item"><input type="text" name="input_1_2" id="input_1_2" maxlength="50" placeholder="장비명" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input2_name"><?php echo $_lc['TXT']['직종']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input2" id="input2" maxlength="50" placeholder="<?php echo $_lc['TXT']['직종']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input3_name"><?php echo $_lc['TXT']['팀장']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input3" id="input3" maxlength="50" placeholder="<?php echo $_lc['TXT']['팀장']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6" id="input4_name"><?php echo $_lc['TXT']['혈액형']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input4_11_1">
							<input type="radio" name="input4" id="input4_11_1" value="A">
							<p class="txt">A</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_11_2">
							<input type="radio" name="input4" id="input4_11_2" value="B">
							<p class="txt">B</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_11_3">
							<input type="radio" name="input4" id="input4_11_3" value="O">
							<p class="txt">O</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input4_11_4">
							<input type="radio" name="input4" id="input4_11_4" value="AB">
							<p class="txt">AB</p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input5_name"><?php echo $_lc['TXT']['기초체력이상유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input2_11_1">
							<input type="radio" name="input5" id="input2_11_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input2_11_2">
							<input type="radio" name="input5" id="input2_11_2" value="X">
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20 radio5_1" id="input10_name" style="display:none;"><?php echo $_lc['TXT']['산재해당부위병명']?></p>
				<div class="inp-wrap radio5_1" style="display:none;">
					<div class="inp-item"><input type="text" name="input10" id="input10" maxlength="50" placeholder="<?php echo $_lc['TXT']['산재해당부위병명']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input6_name"><?php echo $_lc['TXT']['기초체력']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input6_11_1">
							<input type="radio" name="input6" id="input6_11_1" value="High">
							<p class="txt"><?php echo $_lc['TXT']['상']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_11_2">
							<input type="radio" name="input6" id="input6_11_2" value="Middle">
							<p class="txt"><?php echo $_lc['TXT']['중']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_11_3">
							<input type="radio" name="input6" id="input6_11_3" value="Low">
							<p class="txt"><?php echo $_lc['TXT']['하']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20" id="input7_name"><?php echo $_lc['TXT']['과거병력수술유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input7_11_1">
							<input type="radio" name="input7" id="input7_11_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_11_2">
							<input type="radio" name="input7" id="input7_11_2" value="X">
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				<p class="tit v2 mb6 mt20 radio4_1" id="input8_name" style="display:none;"><?php echo $_lc['TXT']['과거병력수술해당부위병명']?></p>
				<div class="inp-wrap radio4_1" style="display:none;">
					<div class="inp-item"><input type="text" name="input8" id="input8" maxlength="50" placeholder="<?php echo $_lc['TXT']['과거병력수술해당부위병명']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input9_name"><?php echo $_lc['TXT']['산재유무']?></p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input9_11_1">
							<input type="radio" name="input9" id="input9_11_1" value="O">
							<p class="txt"><?php echo $_lc['TXT']['유']?></p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input9_11_2">
							<input type="radio" name="input9" id="input9_11_2" value="X">
							<p class="txt"><?php echo $_lc['TXT']['무']?></p>
						</label>
					</div>
				</div>
				
				<p class="tit v2 mb6 mt20" id="input11_name"><?php echo $_lc['TXT']['생활습관사항흡연갑일']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input11" id="input11" maxlength="50" placeholder="<?php echo $_lc['TXT']['생활습관사항흡연갑일']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input12_name"><?php echo $_lc['TXT']['생활습관사항주량회주']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input12" id="input12" maxlength="50" placeholder="<?php echo $_lc['TXT']['생활습관사항주량회주']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input13_name"><?php echo $_lc['TXT']['생활습관사항수면시간시간일']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input13" id="input13" maxlength="50" placeholder="<?php echo $_lc['TXT']['생활습관사항수면시간시간일']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input14_name"><?php echo $_lc['TXT']['해당직종경력']?></p>

				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input14_1" id="input14_1" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력년']?>" autocomplete="off"></div>
					<div class="inp-item"><input type="text" name="input14_2" id="input14_2" class="number" maxlength="2" placeholder="<?php echo $_lc['TXT']['해당직종경력개월']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input15_name"><?php echo $_lc['TXT']['연락처(자택)']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input15" id="input15" class="phone" maxlength="13" placeholder="<?php echo $_lc['TXT']['연락처(자택)']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input16_name"><?php echo $_lc['TXT']['비상연락처']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input16" id="input16" class="phone" maxlength="13" placeholder="<?php echo $_lc['TXT']['비상연락처']?>" autocomplete="off"></div>
				</div>
				<p class="tit v2 mb6 mt20" id="input17_name"><?php echo $_lc['TXT']['비상연락처성명관계']?></p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input17" id="input17" maxlength="50" placeholder="<?php echo $_lc['TXT']['비상연락처성명관계']?>" autocomplete="off"></div>
				</div>

				
			</div>
		</div>
	</div>

	<div id="templateType12_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType12?></p>
				</div>

				<p class="tit v2 mb6" id="">Ⅰ. 아래 사항을 직접 기입해 주시기 바랍니다. </p>

				<p class="tit v2 mb6 mt20" id="input1_name">현재하고있는 작업(구체적으로)</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input1_1" id="input1_1" maxlength="50" placeholder="작업내용" autocomplete="off"></div>
				</div>
				<div class="inp-wrap">
					<div class="inp-item mt10"><input type="text" name="input1_2" id="input1_2" class="number" maxlength="2" placeholder="작업기간(년)" autocomplete="off"></div>
					<div class="inp-item mt10"><input type="text" name="input1_3" id="input1_3" class="number" maxlength="2" placeholder="작업기간(월)" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input2_name">1일 근무시간</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input2_1" id="input2_1" class="number" maxlength="2" placeholder="근무시간(시간)" autocomplete="off"></div>								
				</div>
				<div class="inp-wrap">
					<div class="inp-item mt10"><input type="text" name="input2_2" id="input2_2" class="number" maxlength="2" placeholder="근무중휴식시간(분)" autocomplete="off"></div>
					<div class="inp-item mt10"><input type="text" name="input2_3" id="input2_3" class="number" maxlength="2" placeholder="근무중휴식회수" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input3_name">현 작업을 하기 전에 했던 작업</p>
				<div class="inp-wrap">
					<div class="inp-item"><input type="text" name="input3_1" id="input3_1" maxlength="50" placeholder="작업내용" autocomplete="off"></div>
				</div>
				<div class="inp-wrap">
					<div class="inp-item mt10"><input type="text" name="input3_2" id="input3_2" class="number" maxlength="2" placeholder="작업기간(년)" autocomplete="off"></div>
					<div class="inp-item mt10"><input type="text" name="input3_3" id="input3_3" class="number" maxlength="2" placeholder="작업기간(월)" autocomplete="off"></div>
				</div>

				<p class="tit v2 mb6 mt20" id="input4_name">1. 규칙적인(한번에 30분 이상, 1주일에 적어도 2,3회 이상) 여가 및 취미활동을 하고 계시는 곳에 표시하여 주십시오.</p>
				<div class="inp-item radio">
					<label for="input4_12_1">
						<input type="radio" name="input4_1" id="input4_12_1" value="컴퓨터 관련활동">
						<p class="txt">컴퓨터 관련활동</p>
					</label>
				</div>
				<div class="inp-item radio">
					<label for="input4_12_2">
						<input type="radio" name="input4_1" id="input4_12_2" value="악기연주(피아노, 바이올린 등)">
						<p class="txt">악기연주(피아노, 바이올린 등)</p>
					</label>
				</div>
				<div class="inp-item radio">
					<label for="input4_12_3">
						<input type="radio" name="input4_1" id="input4_12_3" value="테니스/배드민턴/스쿼시">
						<p class="txt">테니스/배드민턴/스쿼시</p>
					</label>
				</div>
				<div class="inp-item radio">
					<label for="input4_12_4">
						<input type="radio" name="input4_1" id="input4_12_4" value="축구/족구/농구/스키">
						<p class="txt">축구/족구/농구/스키</p>
					</label>
				</div>
				
				<div class="inp-item radio">
					<label for="input4_12_6">
						<input type="radio" name="input4_1" id="input4_12_6" value="해당사항 없음">
						<p class="txt">해당사항 없음</p>
					</label>
				</div>
				<div class="inp-item radio">
					<label for="input4_12_5">
						<input type="radio" name="input4_1" id="input4_12_5" value="기타">
						<p class="txt">기타</p>						
					</label>
					<!--기타 선택시에 아래 input활성화-->
					<input type="text" name="input4_2" id="input4_2" class="number mt10" maxlength="2" placeholder="기타사항입력" autocomplete="off" style='display:none'>
				</div>

				<p class="tit v2 mb6 mt20" id="input5_name">2. 귀하의 하루 평균 가사노동(밥하기, 빨래하기, 청소하기, 2살 미만의 아이 돌보기 등)은 얼마나 됩니까?</p>
				<div class="col-wrap">
					<div class="inp-item radio">
						<label for="input5_12_1">
							<input type="radio" name="input5" id="input5_12_1" value="거의 하지 않는다">
							<p class="txt">거의 하지 않는다</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_12_2">
							<input type="radio" name="input5" id="input5_12_2" value="1시간 미만">
							<p class="txt">1시간 미만</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_12_3">
							<input type="radio" name="input5" id="input5_12_3" value="1~2시간 미만">
							<p class="txt">1~2시간 미만</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input5_12_4">
							<input type="radio" name="input5" id="input5_12_4" value="2-3시간 미만">
							<p class="txt">2-3시간 미만</p>
						</label>
					</div>
					
					<div class="inp-item radio">
						<label for="input5_12_6">
							<input type="radio" name="input5" id="input5_12_6" value="3시간 이상">
							<p class="txt">3시간 이상</p>
						</label>
					</div>
				</div>


				<p class="tit v2 mb6 mt20" id="input6_name">3. 귀하는 의사로부터 다음과 같은 질병에 대해 진단을 받은 적이 있습니까? (해당 질병에 체크)</p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input6_12_1">
							<input type="radio" name="input6_1" id="input6_12_1" value="N">
							<p class="txt">아니오</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_12_2">
							<input type="radio" name="input6_1" id="input6_12_2" value="Y">
							<p class="txt">예</p>
						</label>
					</div>
				</div>

				<!--예 선택한 경우 아래 활성화-->
				<p class="tit v2 mb6 mt10 input_7_area" id="input6_2_name" style='display:none'>(해당 질병에 체크해 주세요.)</p>
				<div class="inp-wrap input_7_area"  style='display:none'>
					<div class="inp-item radio">
						<label for="input6_12_1">
							<input type="radio" name="input6_2" id="input6_12_1" value="류머티스 관절염">
							<p class="txt">류머티스 관절염</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_12_2">
							<input type="radio" name="input6_2" id="input6_12_2" value="당뇨병">
							<p class="txt">당뇨병</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_12_3">
							<input type="radio" name="input6_2" id="input6_12_3" value="루프스병">
							<p class="txt">루프스병</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_12_4">
							<input type="radio" name="input6_2" id="input6_12_4" value="통풍">
							<p class="txt">통풍</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_12_5">
							<input type="radio" name="input6_2" id="input6_12_5" value="알코올중독">
							<p class="txt">알코올중독</p>
						</label>
					</div>
				</div>


				<p class="tit v2 mb6 mt10 input_7_area" id="input6_3_name" style='display:none'>(3번에서 '예'인 경우 현재 상태는?)</p>
				<div class="inp-wrap input_7_area" style='display:none'>
					<div class="inp-item radio">
						<label for="input6_3_1">
							<input type="radio" name="input6_3" id="input6_3_1" value="N">
							<p class="txt">완치</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input6_3_2">
							<input type="radio" name="input6_3" id="input6_3_2" value="Y">
							<p class="txt">치료나 관찰 등</p>
						</label>
					</div>
				</div>

				
				<!--끝-->

				<p class="tit v2 mb6 mt20" id="input7_name">4. 과거에 운동 중 혹은 사고로(교통사고, 넘어짐, 추락 등) 인해 손/손가락/손목, 팔/팔꿈치, 어깨, 목 ,허리, 다리/발 부위를 다친 적이 있습니까?</p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input7_12_1">
							<input type="radio" name="input7_1" id="input7_12_1" value="N">
							<p class="txt">아니오</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_12_2">
							<input type="radio" name="input7_1" id="input7_12_2" value="Y">
							<p class="txt">예</p>
						</label>
					</div>
				</div>


				<p class="tit v2 mb6 mt10 input7_area" style='display:none'>('예'인 경우 상해 부위는?)</p>
				<div class="col-wrap input7_area" style='display:none'>
					<div class="inp-item radio">
						<label for="input7_12_2_1">
							<input type="radio" name="input7_2" id="input7_12_2_1" value="손/손가락/손목">
							<p class="txt">손/손가락/손목</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_12_2_2">
							<input type="radio" name="input7_2" id="input7_12_2_2" value="팔/팔꿈치">
							<p class="txt">팔/팔꿈치</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_12_2_3">
							<input type="radio" name="input7_2" id="input7_12_2_3" value="어깨">
							<p class="txt">어깨</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_12_2_4">
							<input type="radio" name="input7_2" id="input7_12_2_4" value="목">
							<p class="txt">목</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_12_2_5">
							<input type="radio" name="input7_2" id="input7_12_2_5" value="허리">
							<p class="txt">허리</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input7_12_2_6">
							<input type="radio" name="input7_2" id="input7_12_2_6" value="다리/발">
							<p class="txt">다리/발</p>
						</label>
					</div>
				</div>



				<p class="tit v2 mb6 mt20" id="input8_name">5.  현재 하고 계시는 일의 육체적 부담 정도는 어느 정도라고 생각합니까?</p>
				<div class="col-wrap">
					<div class="inp-item radio">
						<label for="input8_12_1">
							<input type="radio" name="input8" id="input8_12_1" value="전혀 힘들지 않음">
							<p class="txt">전혀 힘들지 않음</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input8_12_2">
							<input type="radio" name="input8" id="input8_12_2" value="견딜만 함">
							<p class="txt">견딜만 함</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input8_12_3">
							<input type="radio" name="input8" id="input8_12_3" value="약간 힘듦">
							<p class="txt">약간 힘듦</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input8_12_4">
							<input type="radio" name="input8" id="input8_12_4" value="매우 힘듦">
							<p class="txt">매우 힘듦</p>
						</label>
					</div>
				</div>




				
				<p class="tit v2 mb6 mt20" id="input9_name">Ⅱ. 지난 1년 동안 손/손가락/손목, 팔/팔꿈치, 어깨, 목, 허리, 다리/발 중 어느 한 부위에서라도 귀하의 작업과 관련하여 통증이나 불편함(통증, 쑤시는 느낌, 뻣뻣함, 화끈거리는 느낌, 무감각 혹은 찌릿찌릿함 등)을 느끼신 적이 있습니까 ?</p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input9_12_1">
							<input type="radio" name="input9" id="input9_12_1" value="N">
							<p class="txt">아니오(설문종료)</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input9_12_2">
							<input type="radio" name="input9" id="input9_12_2" value="Y">
							<p class="txt">예</p>
						</label>
					</div>
				</div>
				<!--위 '예'일 경우에만 아래 활성화-->
				<div id='addForm' style='display:none'>
				<p class="tit v2 mb6 mt20" id="">(“예”라고 답하신 분은 아래 표의 통증부위에 체크하고, 해당 통증부위의 세로줄로 내려가며 해당사항에 체크해 주십시오)</p>
				<p class="tit v2 mb6 mt10" id="input10_name">통증 부위</p>
				<div class="inp-wrap">
					<div class="inp-item radio">
						<label for="input10_12_1">
							<input type="checkbox" name="input10" id="input10_12_1" value="목" class='input10'>
							<p class="txt">목</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_12_2">
							<input type="checkbox" name="input10" id="input10_12_2" value="어깨" class='input10'>
							<p class="txt">어깨</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_12_3">
							<input type="checkbox" name="input10" id="input10_12_3" value="팔/팔꿈치" class='input10'>
							<p class="txt">팔/팔꿈치</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_12_4">
							<input type="checkbox" name="input10" id="input10_12_4" value="손/손목/손가락" class='input10'> 
							<p class="txt">손/손목/손가락</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_12_5">
							<input type="checkbox" name="input10" id="input10_12_5" value="허리" class='input10'>
							<p class="txt">허리</p>
						</label>
					</div>
					<div class="inp-item radio">
						<label for="input10_12_6">
							<input type="checkbox" name="input10" id="input10_12_6" value="다리/발" class='input10'>
							<p class="txt">다리/발</p>
						</label>
					</div>
				</div>
				<!--목 시작-->
				<div class="diseaseBox" id="db_neck" style='display:none'>
					<p class="tit v2 mb6 dtit" id="input_neck_name">목</p>

					<p class="tit v2 mb6 mt10" id="part_1_1">1. 한번 아프기 시작하면 통증기간은 얼마동안 지속됩니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_1_1_value1">
								<input type="radio" name="part_1_1_value" id="part_1_1_value1" value="1일 미만">
								<p class="txt">1일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_1_value2">
								<input type="radio" name="part_1_1_value" id="part_1_1_value2" value="1일~1주일 미만">
								<p class="txt">1일~1주일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_1_value3">
								<input type="radio" name="part_1_1_value" id="part_1_1_value3" value="1주일~1달 미만">
								<p class="txt">1주일~1달 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_1_value4">
								<input type="radio" name="part_1_1_value" id="part_1_1_value4" value="1달~6개월 미만">
								<p class="txt">1달~6개월 미만</p>
							</label>
						</div>					
						<div class="inp-item radio">
							<label for="part_1_1_value5">
								<input type="radio" name="part_1_1_value" id="part_1_1_value5" value="6개월 이상">
								<p class="txt">6개월 이상</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_1_2">2. 그때의 아픈정도는 어느정도 입니까?(보기참조)</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_1_2_value1">
								<input type="radio" name="part_1_2_value" id="part_1_2_value1" value="약한 통증">
								<p class="txt">약한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_2_value2">
								<input type="radio" name="part_1_2_value" id="part_1_2_value2" value="중간 통증">
								<p class="txt">중간 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_2_value3">
								<input type="radio" name="part_1_2_value" id="part_1_2_value3" value="심한 통증">
								<p class="txt">심한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_2_value4">
								<input type="radio" name="part_1_2_value" id="part_1_2_value4" value="매우 심한 통증">
								<p class="txt">매우 심한 통증</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_1_3">3. 지난1년동안 이러한 증상을 얼마나 자주 경험하셨습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_1_3_value1">
								<input type="radio" name="part_1_3_value" id="part_1_3_value1" value="6개월에 1번">
								<p class="txt">6개월에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_3_value2">
								<input type="radio" name="part_1_3_value" id="part_1_3_value2" value="2~3달에 1번">
								<p class="txt">2~3달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_3_value3">
								<input type="radio" name="part_1_3_value" id="part_1_3_value3" value="1달에 1번">
								<p class="txt">1달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_3_value4">
								<input type="radio" name="part_1_3_value" id="part_1_3_value4" value="1주일에 1번">
								<p class="txt">1주일에 1번</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_1_3_value5">
								<input type="radio" name="part_1_3_value" id="part_1_3_value5" value="매일">
								<p class="txt">매일</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_1_4">4. 지난 1주일동안에도 이러한 증상이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_1_4_value1">
								<input type="radio" name="part_1_4_value" id="part_1_4_value1" value="아니오">
								<p class="txt">아니오</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_4_value2">
								<input type="radio" name="part_1_4_value" id="part_1_4_value" value="예">
								<p class="txt">예</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_1_5">5. 지난 1년동안 이러한 통증으로인해 어떤일이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_1_5_value1">
								<input type="radio" name="part_1_5_value" id="part_1_5_value1" value="병원·한의원 치료">
								<p class="txt">병원·한의원 치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_5_value2">
								<input type="radio" name="part_1_5_value" id="part_1_5_value2" value="약국치료">
								<p class="txt">약국치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_5_value3">
								<input type="radio" name="part_1_5_value" id="part_1_5_value3" value="병가,산책">
								<p class="txt">병가,산책</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_5_value4">
								<input type="radio" name="part_1_5_value" id="part_1_5_value" value="작업 전환">
								<p class="txt">작업 전환</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_1_5_value5">
								<input type="radio" name="part_1_5_value" id="part_1_5_value5" value="해당사항없음">
								<p class="txt">해당사항없음</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_1_5_value6">
								<input type="radio" name="part_1_5_value" id="part_1_5_value6" value="기타">
								<p class="txt">기타</p>
							</label>
						</div>
						<div class="inp-item mt10">
							<input type="text" name="part_1_6_value" id="part_1_6_value" maxlength="50" placeholder="기타사항" autocomplete="off" style='display:none;'>
						</div>
					</div>
				</div>
				<!--어깨 시작-->
				<div class="diseaseBox" id="db_shoulder"  style='display:none'>
					<p class="tit v2 mb6 dtit" id="input_shoulder_name">어깨</p>

					<p class="tit v2 mb6 mt10" id="part_2_1">1. 통증의 구체적 부위는?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_2_1_value1">
								<input type="radio" name="part_2_1_value" id="part_2_1_value1" value="오른쪽">
								<p class="txt">오른쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_1_value2">
								<input type="radio" name="part_2_1_value" id="part_2_1_value2" value="왼쪽">
								<p class="txt">왼쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_1_value3">
								<input type="radio" name="part_2_1_value" id="part_2_1_value3" value="양쪽 모두">
								<p class="txt">양쪽 모두</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_2_2">2. 한번 아프기 시작하면 통증기간은 얼마동안 지속됩니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_2_1_value1">
								<input type="radio" name="part_2_1_value" id="part_2_1_value1" value="1일 미만">
								<p class="txt">1일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_2_value2">
								<input type="radio" name="part_2_2_value" id="part_2_2_value2" value="1일~1주일 미만">
								<p class="txt">1일~1주일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_2_value3">
								<input type="radio" name="part_2_2_value" id="part_2_2_value3" value="1주일~1달 미만">
								<p class="txt">1주일~1달 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_2_value4">
								<input type="radio" name="part_2_2_value" id="part_2_2_value4" value="1달~6개월 미만">
								<p class="txt">1달~6개월 미만</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_2_2_value5">
								<input type="radio" name="part_2_2_value" id="part_2_2_value5" value="6개월 이상">
								<p class="txt">6개월 이상</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_2_3">3. 그때의 아픈정도는 어느정도 입니까?(보기참조)</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_2_3_value1">
								<input type="radio" name="part_2_3_value" id="part_2_3_value1" value="약한 통증">
								<p class="txt">약한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_3_value2">
								<input type="radio" name="part_2_3_value" id="part_2_3_value2" value="중간 통증">
								<p class="txt">중간 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_3_value3">
								<input type="radio" name="part_2_3_value" id="part_2_3_value3" value="심한 통증">
								<p class="txt">심한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_3_value4">
								<input type="radio" name="part_2_3_value" id="part_2_3_value4" value="매우 심한 통증">
								<p class="txt">매우 심한 통증</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_2_4">4. 지난1년동안 이러한 증상을 얼마나 자주 경험하셨습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_2_4_value1">
								<input type="radio" name="part_2_4_value" id="part_2_4_value1" value="6개월에 1번">
								<p class="txt">6개월에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_4_value2">
								<input type="radio" name="part_2_4_value" id="part_2_4_value2" value="2~3달에 1번">
								<p class="txt">2~3달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_4_value3">
								<input type="radio" name="part_2_4_value" id="part_2_4_value3" value="1달에 1번">
								<p class="txt">1달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_4_value4">
								<input type="radio" name="part_2_4_value" id="part_2_4_value4" value="1주일에 1번">
								<p class="txt">1주일에 1번</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_2_4_value5">
								<input type="radio" name="part_2_4_value" id="part_2_4_value5" value="매일">
								<p class="txt">매일</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_2_5">5. 지난 1주일동안에도 이러한 증상이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_2_5_value1">
								<input type="radio" name="part_2_5_value" id="part_2_5_value1" value="N">
								<p class="txt">아니오</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_5_value2">
								<input type="radio" name="part_2_5_value" id="part_2_5_value2" value="Y">
								<p class="txt">예</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_2_6">6. 지난 1년동안 이러한 통증으로인해 어떤일이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_2_6_value1">
								<input type="radio" name="part_2_6_value" id="part_2_6_value1" value="병원·한의원 치료">
								<p class="txt">병원·한의원 치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_6_value2">
								<input type="radio" name="part_2_6_value" id="part_2_6_value2" value="약국치료">
								<p class="txt">약국치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_6_value3">
								<input type="radio" name="part_2_6_value" id="part_2_6_value3" value="병가,산책">
								<p class="txt">병가,산책</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_6_value4">
								<input type="radio" name="part_2_6_value" id="part_2_6_value4" value="작업 전환">
								<p class="txt">작업 전환</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_2_6_value5">
								<input type="radio" name="part_2_6_value" id="part_2_6_value5" value="해당사항없음">
								<p class="txt">해당사항없음</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_2_6_value6">
								<input type="radio" name="part_2_6_value" id="part_2_6_value6" value="기타">
								<p class="txt">기타</p>
							</label>
						</div>
						<div class="inp-item mt10">
							<input type="text" name="part_2_7_value" id="part_2_7_value" maxlength="50" placeholder="기타사항" autocomplete="off" style='display:none;'>
						</div>
					</div>
				</div>
				
				<!--팔/팔꿈치 시작-->
				<div class="diseaseBox" id="db_arm"  style='display:none'>
					<p class="tit v2 mb6 dtit" id="input_arm_name">팔/팔꿈치</p>

					<p class="tit v2 mb6 mt10" id="part_3_1">1. 통증의 구체적 부위는?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_3_1_value1">
								<input type="radio" name="part_3_1_value" id="part_3_1_value1" value="오른쪽">
								<p class="txt">오른쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_1_value2">
								<input type="radio" name="part_3_1_value" id="part_3_1_value2" value="왼쪽">
								<p class="txt">왼쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_1_value3">
								<input type="radio" name="part_3_1_value" id="part_3_1_value3" value="양쪽 모두">
								<p class="txt">양쪽 모두</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_3_2">2. 한번 아프기 시작하면 통증기간은 얼마동안 지속됩니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_3_2_value1">
								<input type="radio" name="part_3_2_value" id="part_3_2_value1" value="1일 미만">
								<p class="txt">1일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_2_value2">
								<input type="radio" name="part_3_2_value" id="part_3_2_value2" value="1일~1주일 미만">
								<p class="txt">1일~1주일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_2_value3">
								<input type="radio" name="part_3_2_value" id="part_3_2_value3" value="1주일~1달 미만">
								<p class="txt">1주일~1달 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_2_value4">
								<input type="radio" name="part_3_2_value" id="part_3_2_value4" value="1달~6개월 미만">
								<p class="txt">1달~6개월 미만</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_3_2_value5">
								<input type="radio" name="part_3_2_value" id="part_3_2_value5" value="6개월 이상">
								<p class="txt">6개월 이상</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_3_3">3. 그때의 아픈정도는 어느정도 입니까?(보기참조)</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_3_3_value1">
								<input type="radio" name="part_3_3_value" id="part_3_3_value1" value="약한 통증">
								<p class="txt">약한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_3_value2">
								<input type="radio" name="part_3_3_value" id="part_3_3_value2" value="중간 통증">
								<p class="txt">중간 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_3_value3">
								<input type="radio" name="part_3_3_value" id="part_3_3_value3" value="심한 통증">
								<p class="txt">심한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_3_value4">
								<input type="radio" name="part_3_3_value" id="part_3_3_value4" value="매우 심한 통증">
								<p class="txt">매우 심한 통증</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_3_4">4. 지난1년동안 이러한 증상을 얼마나 자주 경험하셨습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_3_4_value1">
								<input type="radio" name="part_3_4_value" id="part_3_4_value1" value="6개월에 1번">
								<p class="txt">6개월에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_4_value2">
								<input type="radio" name="part_3_4_value" id="part_3_4_value2" value="2~3달에 1번">
								<p class="txt">2~3달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_4_value3">
								<input type="radio" name="part_3_4_value" id="part_3_4_value3" value="1달에 1번">
								<p class="txt">1달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_4_value4">
								<input type="radio" name="part_3_4_value" id="part_3_4_value4" value="1주일에 1번">
								<p class="txt">1주일에 1번</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_3_4_value5">
								<input type="radio" name="part_3_4_value" id="part_3_4_value5" value="매일">
								<p class="txt">매일</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_3_5">5. 지난 1주일동안에도 이러한 증상이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_3_5_value1">
								<input type="radio" name="part_3_5_value" id="part_3_5_value1" value="N">
								<p class="txt">아니오</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_5_value2">
								<input type="radio" name="part_3_5_value" id="part_3_5_value2" value="Y">
								<p class="txt">예</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_3_6">6. 지난 1년동안 이러한 통증으로인해 어떤일이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_3_6_value1">
								<input type="radio" name="part_3_6_value" id="part_3_6_value1" value="병원·한의원 치료">
								<p class="txt">병원·한의원 치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_6_value2">
								<input type="radio" name="part_3_6_value" id="part_3_6_value2" value="약국치료">
								<p class="txt">약국치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_6_value3">
								<input type="radio" name="part_3_6_value" id="part_3_6_value3" value="병가,산책">
								<p class="txt">병가,산책</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_6_value4">
								<input type="radio" name="part_3_6_value" id="part_3_6_value4" value="작업 전환">
								<p class="txt">작업 전환</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_3_6_value5">
								<input type="radio" name="part_3_6_value" id="part_3_6_value5" value="해당사항없음">
								<p class="txt">해당사항없음</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_3_6_value6">
								<input type="radio" name="part_3_6_value" id="part_3_6_value6" value="기타">
								<p class="txt">기타</p>
							</label>
						</div>
						<div class="inp-item mt10">
							<input type="text" name="part_3_7_value" id="part_3_7_value" maxlength="50" placeholder="기타사항" autocomplete="off" style='display:none;'>
						</div>
					</div>
				</div>
				
				<!--손/손목/손가락 시작-->
				<div class="diseaseBox" id="db_hand"  style='display:none'>
					<p class="tit v2 mb6 dtit" id="input_hand_name">손/손목/손가락</p>

					<p class="tit v2 mb6 mt10" id="part_4_1">1. 통증의 구체적 부위는?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_4_1_value1">
								<input type="radio" name="part_4_1_value" id="part_4_1_value1" value="오른쪽">
								<p class="txt">오른쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_1_value2">
								<input type="radio" name="part_4_1_value" id="part_4_1_value2" value="왼쪽">
								<p class="txt">왼쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_1_value3">
								<input type="radio" name="part_4_1_value" id="part_4_1_value3" value="양쪽 모두">
								<p class="txt">양쪽 모두</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_4_2">2. 한번 아프기 시작하면 통증기간은 얼마동안 지속됩니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_4_1_value1">
								<input type="radio" name="part_4_1_value" id="part_4_1_value1" value="1일 미만">
								<p class="txt">1일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_2_value2">
								<input type="radio" name="part_4_2_value" id="part_4_2_value2" value="1일~1주일 미만">
								<p class="txt">1일~1주일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_2_value3">
								<input type="radio" name="part_4_2_value" id="part_4_2_value3" value="1주일~1달 미만">
								<p class="txt">1주일~1달 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_2_value4">
								<input type="radio" name="part_4_2_value" id="part_4_2_value4" value="1달~6개월 미만">
								<p class="txt">1달~6개월 미만</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_4_2_value5">
								<input type="radio" name="part_4_2_value" id="part_4_2_value5" value="6개월 이상">
								<p class="txt">6개월 이상</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_4_3">3. 그때의 아픈정도는 어느정도 입니까?(보기참조)</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_4_3_value1">
								<input type="radio" name="part_4_3_value" id="part_4_3_value1" value="약한 통증">
								<p class="txt">약한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_3_value2">
								<input type="radio" name="part_4_3_value" id="part_4_3_value2" value="중간 통증">
								<p class="txt">중간 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_3_value3">
								<input type="radio" name="part_4_3_value" id="part_4_3_value3" value="심한 통증">
								<p class="txt">심한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_3_value4">
								<input type="radio" name="part_4_3_value" id="part_4_3_value4" value="매우 심한 통증">
								<p class="txt">매우 심한 통증</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_4_4">4. 지난1년동안 이러한 증상을 얼마나 자주 경험하셨습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_4_4_value1">
								<input type="radio" name="part_4_4_value" id="part_4_4_value1" value="6개월에 1번">
								<p class="txt">6개월에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_4_value2">
								<input type="radio" name="part_4_4_value" id="part_4_4_value2" value="2~3달에 1번">
								<p class="txt">2~3달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_4_value3">
								<input type="radio" name="part_4_4_value" id="part_4_4_value3" value="1달에 1번">
								<p class="txt">1달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_4_value4">
								<input type="radio" name="part_4_4_value" id="part_4_4_value4" value="1주일에 1번">
								<p class="txt">1주일에 1번</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_4_4_value5">
								<input type="radio" name="part_4_4_value" id="part_4_4_value5" value="매일">
								<p class="txt">매일</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_4_5">5. 지난 1주일동안에도 이러한 증상이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_4_5_value1">
								<input type="radio" name="part_4_5_value" id="part_4_5_value1" value="N">
								<p class="txt">아니오</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_5_value2">
								<input type="radio" name="part_4_5_value" id="part_4_5_value2" value="Y">
								<p class="txt">예</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_4_6">6. 지난 1년동안 이러한 통증으로인해 어떤일이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_4_6_value1">
								<input type="radio" name="part_4_6_value" id="part_4_6_value1" value="병원·한의원 치료">
								<p class="txt">병원·한의원 치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_6_value2">
								<input type="radio" name="part_4_6_value" id="part_4_6_value2" value="약국치료">
								<p class="txt">약국치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_6_value3">
								<input type="radio" name="part_4_6_value" id="part_4_6_value3" value="병가,산책">
								<p class="txt">병가,산책</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_6_value4">
								<input type="radio" name="part_4_6_value" id="part_4_6_value4" value="작업 전환">
								<p class="txt">작업 전환</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_4_6_value5">
								<input type="radio" name="part_4_6_value" id="part_4_6_value5" value="해당사항없음">
								<p class="txt">해당사항없음</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_4_6_value6">
								<input type="radio" name="part_4_6_value" id="part_4_6_value6" value="기타">
								<p class="txt">기타</p>
							</label>
						</div>
						<div class="inp-item mt10">
							<input type="text" name="part_4_7_value" id="part_4_7_value" maxlength="50" placeholder="기타사항" autocomplete="off" style='display:none;'>
						</div>
					</div>
				</div>
				
				<!--허리 시작-->
				<div class="diseaseBox" id="db_back"  style='display:none'>
					<p class="tit v2 mb6 dtit" id="input_back_name">허리</p>

					<p class="tit v2 mb6 mt10" id="part_5_1">1. 한번 아프기 시작하면 통증기간은 얼마동안 지속됩니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_5_1_value1">
								<input type="radio" name="part_5_1_value" id="part_5_1_value1" value="1일 미만">
								<p class="txt">1일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_1_value2">
								<input type="radio" name="part_5_1_value" id="part_5_1_value2" value="1일~1주일 미만">
								<p class="txt">1일~1주일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_1_value3">
								<input type="radio" name="part_5_1_value" id="part_5_1_value3" value="1주일~1달 미만">
								<p class="txt">1주일~1달 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_1_value4">
								<input type="radio" name="part_5_1_value" id="part_5_1_value4" value="1달~6개월 미만">
								<p class="txt">1달~6개월 미만</p>
							</label>
						</div>					
						<div class="inp-item radio">
							<label for="part_5_1_value5">
								<input type="radio" name="part_5_1_value" id="part_5_1_value5" value="6개월 이상">
								<p class="txt">6개월 이상</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_5_2">2. 그때의 아픈정도는 어느정도 입니까?(보기참조)</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_5_2_value1">
								<input type="radio" name="part_5_2_value" id="part_5_2_value1" value="약한 통증">
								<p class="txt">약한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_2_value2">
								<input type="radio" name="part_5_2_value" id="part_5_2_value2" value="중간 통증">
								<p class="txt">중간 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_2_value3">
								<input type="radio" name="part_5_2_value" id="part_5_2_value3" value="심한 통증">
								<p class="txt">심한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_2_value4">
								<input type="radio" name="part_5_2_value" id="part_5_2_value4" value="매우 심한 통증">
								<p class="txt">매우 심한 통증</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_5_3">3. 지난1년동안 이러한 증상을 얼마나 자주 경험하셨습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_5_3_value1">
								<input type="radio" name="part_5_3_value" id="part_5_3_value1" value="6개월에 1번">
								<p class="txt">6개월에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_3_value2">
								<input type="radio" name="part_5_3_value" id="part_5_3_value2" value="2~3달에 1번">
								<p class="txt">2~3달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_3_value3">
								<input type="radio" name="part_5_3_value" id="part_5_3_value3" value="1달에 1번">
								<p class="txt">1달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_3_value4">
								<input type="radio" name="part_5_3_value" id="part_5_3_value4" value="1주일에 1번">
								<p class="txt">1주일에 1번</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_5_3_value5">
								<input type="radio" name="part_5_3_value" id="part_5_3_value5" value="매일">
								<p class="txt">매일</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_5_4">4. 지난 1주일동안에도 이러한 증상이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_5_4_value1">
								<input type="radio" name="part_5_4_value" id="part_5_4_value1" value="아니오">
								<p class="txt">아니오</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_4_value2">
								<input type="radio" name="part_5_4_value" id="part_5_4_value" value="예">
								<p class="txt">예</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_5_5">5. 지난 1년동안 이러한 통증으로인해 어떤일이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_5_5_value1">
								<input type="radio" name="part_5_5_value" id="part_5_5_value1" value="병원·한의원 치료">
								<p class="txt">병원·한의원 치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_5_value2">
								<input type="radio" name="part_5_5_value" id="part_5_5_value2" value="약국치료">
								<p class="txt">약국치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_5_value3">
								<input type="radio" name="part_5_5_value" id="part_5_5_value3" value="병가,산책">
								<p class="txt">병가,산책</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_5_value4">
								<input type="radio" name="part_5_5_value" id="part_5_5_value" value="작업 전환">
								<p class="txt">작업 전환</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_5_5_value5">
								<input type="radio" name="part_5_5_value" id="part_5_5_value5" value="해당사항없음">
								<p class="txt">해당사항없음</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_5_5_value6">
								<input type="radio" name="part_5_5_value" id="part_5_5_value6" value="기타">
								<p class="txt">기타</p>
							</label>
						</div>
						<div class="inp-item mt10">
							<input type="text" name="part_5_6_value" id="part_5_6_value" maxlength="50" placeholder="기타사항" autocomplete="off" style='display:none;'>
						</div>
					</div>
				</div>
				
				<!--다리/발 시작-->
				<div class="diseaseBox" id="db_leg"  style='display:none'>
					<p class="tit v2 mb6 dtit" id="input_leg_name">다리/발</p>

					<p class="tit v2 mb6 mt10" id="part_6_1">1. 통증의 구체적 부위는?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_6_1_value1">
								<input type="radio" name="part_6_1_value" id="part_6_1_value1" value="오른쪽">
								<p class="txt">오른쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_1_value2">
								<input type="radio" name="part_6_1_value" id="part_6_1_value2" value="왼쪽">
								<p class="txt">왼쪽</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_1_value3">
								<input type="radio" name="part_6_1_value" id="part_6_1_value3" value="양쪽 모두">
								<p class="txt">양쪽 모두</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_6_2">2. 한번 아프기 시작하면 통증기간은 얼마동안 지속됩니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_6_1_value1">
								<input type="radio" name="part_6_1_value" id="part_6_1_value1" value="1일 미만">
								<p class="txt">1일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_2_value2">
								<input type="radio" name="part_6_2_value" id="part_6_2_value2" value="1일~1주일 미만">
								<p class="txt">1일~1주일 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_2_value3">
								<input type="radio" name="part_6_2_value" id="part_6_2_value3" value="1주일~1달 미만">
								<p class="txt">1주일~1달 미만</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_2_value4">
								<input type="radio" name="part_6_2_value" id="part_6_2_value4" value="1달~6개월 미만">
								<p class="txt">1달~6개월 미만</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_6_2_value5">
								<input type="radio" name="part_6_2_value" id="part_6_2_value5" value="6개월 이상">
								<p class="txt">6개월 이상</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_6_3">3. 그때의 아픈정도는 어느정도 입니까?(보기참조)</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_6_3_value1">
								<input type="radio" name="part_6_3_value" id="part_6_3_value1" value="약한 통증">
								<p class="txt">약한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_3_value2">
								<input type="radio" name="part_6_3_value" id="part_6_3_value2" value="중간 통증">
								<p class="txt">중간 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_3_value3">
								<input type="radio" name="part_6_3_value" id="part_6_3_value3" value="심한 통증">
								<p class="txt">심한 통증</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_3_value4">
								<input type="radio" name="part_6_3_value" id="part_6_3_value4" value="매우 심한 통증">
								<p class="txt">매우 심한 통증</p>
							</label>
						</div>

					</div>

					<p class="tit v2 mb6 mt10" id="part_6_4">4. 지난1년동안 이러한 증상을 얼마나 자주 경험하셨습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_6_4_value1">
								<input type="radio" name="part_6_4_value" id="part_6_4_value1" value="6개월에 1번">
								<p class="txt">6개월에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_4_value2">
								<input type="radio" name="part_6_4_value" id="part_6_4_value2" value="2~3달에 1번">
								<p class="txt">2~3달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_4_value3">
								<input type="radio" name="part_6_4_value" id="part_6_4_value3" value="1달에 1번">
								<p class="txt">1달에 1번</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_4_value4">
								<input type="radio" name="part_6_4_value" id="part_6_4_value4" value="1주일에 1번">
								<p class="txt">1주일에 1번</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_6_4_value5">
								<input type="radio" name="part_6_4_value" id="part_6_4_value5" value="매일">
								<p class="txt">매일</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_6_5">5. 지난 1주일동안에도 이러한 증상이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_6_5_value1">
								<input type="radio" name="part_6_5_value" id="part_6_5_value1" value="N">
								<p class="txt">아니오</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_5_value2">
								<input type="radio" name="part_6_5_value" id="part_6_5_value2" value="Y">
								<p class="txt">예</p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt10" id="part_6_6">6. 지난 1년동안 이러한 통증으로인해 어떤일이 있었습니까?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="part_6_6_value1">
								<input type="radio" name="part_6_6_value" id="part_6_6_value1" value="병원·한의원 치료">
								<p class="txt">병원·한의원 치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_6_value2">
								<input type="radio" name="part_6_6_value" id="part_6_6_value2" value="약국치료">
								<p class="txt">약국치료</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_6_value3">
								<input type="radio" name="part_6_6_value" id="part_6_6_value3" value="병가,산책">
								<p class="txt">병가,산책</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_6_value4">
								<input type="radio" name="part_6_6_value" id="part_6_6_value4" value="작업 전환">
								<p class="txt">작업 전환</p>
							</label>
						</div>
						
						<div class="inp-item radio">
							<label for="part_6_6_value5">
								<input type="radio" name="part_6_6_value" id="part_6_6_value5" value="해당사항없음">
								<p class="txt">해당사항없음</p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="part_6_6_value6">
								<input type="radio" name="part_6_6_value" id="part_6_6_value6" value="기타">
								<p class="txt">기타</p>
							</label>
						</div>
						<div class="inp-item mt10">
							<input type="text" name="part_6_7_value" id="part_6_7_value" maxlength="50" placeholder="기타사항" autocomplete="off" style='display:none;'>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	</div>
	

	<div id="templateType13_div" class="row" style="display:none;">
		<div class="col third">
			<p class="tit v3 mb4">문서</p>
			<div class="main-text">
				<div class="tit-wrap v1">
					<p class="doc_name" class="tit v2"><?php echo $templateType13?></p>
				</div>

				<div class="bloodWrap">
					<p class="tit v2" id="">Ⅰ. 근무경력 / 과거병력 </p>

					<p class="tit v2 mb6 mt20" id="input1_name"><?php echo $_lc['TXT']['과거작업중재해유무']?></p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="input1_1">
								<input type="radio" name="input1" id="input1_1" value="O">
								<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input1_2">
								<input type="radio" name="input1" id="input1_2" value="X">
								<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
							</label>
						</div>
					</div>


					<p class="tit v2 mb6 mt20" id="input2_name">과거병력 진단 여부?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="input2_1">
								<input type="radio" name="input2" id="input2_1" value="O">
								<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input2_2">
								<input type="radio" name="input2" id="input2_2" value="X">
								<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt20" id="input3_name">있다면 약물치료 여부?</p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="input3_1">
								<input type="radio" name="input3" id="input3_1" value="O">
								<p class="txt"><?php echo $_lc['TXT']['있다']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input3_2">
								<input type="radio" name="input3" id="input3_2" value="X">
								<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
							</label>
						</div>
					</div>

					<p class="tit v2 mb6 mt20" id="input4_name"><?php echo $_lc['TXT']['의사에게주의받은병이있습니까']?></p>
					<div class="inp-wrap radio_overwrap">
						<div class="inp-item radio">
							<label for="input4_1">
								<input type="radio" name="input4" id="input4_1" value="hbp">
								<p class="txt"><?php echo $_lc['TXT']['있다고혈압']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input4_2">
								<input type="radio" name="input4" id="input4_2" value="heart">
								<p class="txt"><?php echo $_lc['TXT']['있다심장']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input4_3">
								<input type="radio" name="input4" id="input4_3" value="diabetes">
								<p class="txt"><?php echo $_lc['TXT']['있다당뇨']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input4_4">
								<input type="radio" name="input4" id="input4_4" value="disc">
								<p class="txt"><?php echo $_lc['TXT']['있다디스크']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input4_5">
								<input type="radio" name="input4" id="input4_5" value="etcs">
								<p class="txt"><?php echo $_lc['TXT']['있다기타']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input4_6">
								<input type="radio" name="input4" id="input4_6" value="X">
								<p class="txt"><?php echo $_lc['TXT']['없다']?></p>
							</label>
						</div>
					</div>


					<p class="tit v2 mb6 mt20" id="input5_name"><?php echo $_lc['TXT']['현재건강상태']?></p>
					<div class="inp-wrap">
						<div class="inp-item radio">
							<label for="input5_1">
								<input type="radio" name="input5" id="input5_1" value="High">
								<p class="txt"><?php echo $_lc['TXT']['좋음']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input5_2">
								<input type="radio" name="input5" id="input5_2" value="Middle">
								<p class="txt"><?php echo $_lc['TXT']['보통']?></p>
							</label>
						</div>
						<div class="inp-item radio">
							<label for="input5_3">
								<input type="radio" name="input5" id="input5_3" value="Low">
								<p class="txt"><?php echo $_lc['TXT']['안좋음']?></p>
							</label>
						</div>
					</div>



					<p class="tit v2 mt20" id="input21_name">Ⅱ. 기초 건강검진 </p>

					<p class="tit v2 mb6 mt20">■ <?php echo $_lc['TXT']['혈압용지사진첨부']?></p>
					<div id='input1_name' style='display:none'><?php echo $_lc['TXT']['혈압용지사진첨부']?></div>
					<div class="bloodup field-wrap">
						<input type="file" id="bl_pic" name="bl_pic" value="" accept="image/jpeg, image/png">
						<label for="bl_pic" class="bx-link"><i class="ic-safety-document"></i> <p><?php echo $_lc['BTN']['사진촬영']?></p></label>
						<!--업로드시 아래 미리보기-->
						<div class="bloodPrv">
							<img src="/view/img/no_image_150_150.jpg" alt="" id="previewImg">
						</div>
					</div>
					<input type='hidden' id='imgPathurl' value='' />
					


					<!--혈압-->
					<p class="tit v2 mb6 mt20">■ <?php echo $_lc['TXT']['혈압측정치']?></p>
					<p class="rowInput mb6">
						<span id='input6_name'><?php echo $_lc['TXT']['최고(수축)']?></span>
						<input type="number" id="input6" name="input6" value="" placeholder="mmHG" />
					</p>
					<p class="rowInput">
						<span id='input7_name'><?php echo $_lc['TXT']['최고(이완)']?></span>
						<input type="number" id="input7" name="input7" value="" placeholder="mmHG" />
					</p>

					<div class="mt20">
						<p><?php echo $_lc['TXT']['고혈압기준안내']?></p>
						<p>1) <?php echo $_lc['TXT']['집중관리대상']?></p>
						<p>2) <?php echo $_lc['TXT']['일반관리대상']?></p>
					</div>
					<!--공복혈당-->

					<p class="tit v2 mb6 mt20">■ 공복혈당</p>
					<p class="rowInput">
						<span id='input8_name'>공복혈당치</span>
						<input type="number" id="input8" name="input8" value="" placeholder="㎎/dL" />
					</p>

					<div class="mt20">
						<p>혈당치 기준안내</p>
						<p>1) 100-125 (경계)</p>
						<p>2) 126이상 (질환의심)</p>
					</div>
					<!--눈감고 한발서기-->
					<p class="tit v2 mb6 mt20">■ 눈감고 한발로 서기</p>
					<p class="rowInput">
						<span id='input9_name'>한발서기</span>
						<input type="number" id="input9" name="input9" value="" placeholder="초" />
					</p>

					<!--눈감고 제자리걷기-->
					<p class="tit v2 mb6 mt20">■ 눈감고 제자리걷기</p>
					<p class="rowInput">
						<span id='input10_name'>제자리걷기</span>
						<input type="number" id="input10" name="input10" value="" placeholder="cm" />
					</p>

					<!--직선보행검사-->
					<p class="tit v2 mb6 mt20">■ 직선보행 검사</p>
					<p class="rowInput">
						<span id='input11_name'>직선보행</span>
						<input type="number" id="input11" name="input11" value="" placeholder="m" />
					</p>

					
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