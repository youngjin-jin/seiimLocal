<div class="lnb-header">
	<h2 class="logo" id='logo' style='background-size:contain;background-position:center;'><span style="display: none;">CI변경</span></h2>
	<p class="txt-field"><br></p>
</div>
<div class="lnb-content">
	<ul>
		<li<?php echo ($prop_file == 'dashboard.php')?' class="on"':''?>><a href="dashboard.php"><i class="ic-dashboard"></i>HOME</a></li>

		<li<?php echo ($prop_file == 'edu_history_management.php' || $prop_file == 'edu_history_management_detail.php'|| $prop_file == 'edu_history_management_view.php'|| $prop_file == 'edu_history_management.php'|| $prop_file == 'setting_edu_management.php'|| $prop_file == 'setting_edu_management.php')?' class="on"':''?>>
			<a href="edu_history_management.php"><i class="ic-edu-history"></i>안전보건교육</a>
			<ul>
				<li<?php echo ($prop_file == 'edu_history_management.php' || $prop_file == 'edu_history_management_detail.php' || $prop_file == 'edu_history_management_view.php')?' class="on"':''?>><a href="edu_history_management.php">교육생성 및 조회</a></li>
				<li<?php echo ($prop_file == 'setting_edu_management.php')?' class="on"':''?>><a href="setting_edu_management.php">교육종류 및 문서</a></li>
			</ul>
		</li>

		<li<?php echo ($prop_file == 'worker_management.php' || $prop_file == 'worker_management_detail.php'|| $prop_file == 'writing_management.php'|| $prop_file == 'writing_management_detail.php')?' class="on"':''?>>
			<a href="worker_management.php"><i class="ic-worker"></i>건설근로자</a>
			<ul>
				<li<?php echo ($prop_file == 'worker_management.php' || $prop_file == 'worker_management_detail.php')?' class="on"':''?>><a href="worker_management.php">현장 참여자 정보</a></li>
				<li<?php echo ($prop_file == 'writing_management.php' || $prop_file == 'writing_management_detail.php')?' class="on"':''?>><a href="writing_management.php">작성문서 관리</a></li>

			</ul>
		</li>

		<!-- <li<?php echo ($prop_file == 'document_management.php' || $prop_file == 'document_management_detail.php' || $prop_file == 'document_management_detail_nodb.php')?' class="on"':''?>><a href="document_management.php"><i class="ic-document"></i>문서 출력</a></li> -->
		<?php if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) { ?>
		<?php } ?>

		<!-- 20210819 수정 -->
		<li<?php echo ($prop_file == 'field_management.php' || $prop_file == 'field_management_detail.php'|| $prop_file == 'manager_management.php'|| $prop_file == 'manager_management_detail.php'|| $prop_file == 'manager_management_modify.php'|| $prop_file == 'company_management.php'|| $prop_file == 'company_management_detail.php')?' class="on"':''?>>
			<a href="field_management.php"><i class="ic-setting"></i>현장설정</a>
			<ul>
				<li<?php echo ($prop_file == 'field_management.php' || $prop_file == 'field_management_detail.php')?' class="on"':''?>><a href="field_management.php">현장 정보</a></li>
				<li<?php echo ($prop_file == 'manager_management.php' || $prop_file == 'manager_management_detail.php' || $prop_file == 'manager_management_modify.php')?' class="on"':''?>><a href="manager_management.php">안전관리자 조회</a></li>
				<li<?php echo ($prop_file == 'company_management.php' || $prop_file == 'company_management_detail.php')?' class="on"':''?>><a href="company_management.php">건설참여사 정보</a></li>

				<!-- <li<?php echo ($prop_file == 'setting_equipment_management.php')?' class="on"':''?>><a href="setting_equipment_management.php">장비 관리</a></li> -->
			</ul>
		</li>
		<!-- // 20210819 수정 -->
	</ul>
</div>


<!-- fine -->
<input type='file' id='bannerImg' style='display:none'/>
<?php //print_r($_SESSION['id']); ?>
<?php if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) { ?>



	
<script>
$(document).ready(function(){
	var imgUse;
	$("#logo").click(function(){
		$("#bannerImg").click();
	});
	$("#bannerImg").change(function(){
		var file_data = new FormData();
		file_data.append('upload_file', $('#bannerImg')[0].files[0]);
		file_data.append('imgUse', imgUse);
		file_data.append('accId', "<?php echo $_SESSION['id']; ?>");
		run_progress();


		$.ajax({
			type: 'POST',
			url: '/controller/logo_change.php',
			dataType: 'json',
			cache: false,
			data: file_data,
			processData: false,
			contentType: false, 
			success : function(response) {
				stop_progress();
				
				
				

				if (response.result) {
					location.reload();

					


				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			},
			error: function(request, status, error){
				stop_progress();
				alert(request+' '+status+' '+error);
			}	
		});




	});
	$.ajax({
		type: 'POST',
		url: '/controller/check_logo.php',
		dataType: 'json',
		cache: false,
		data: { accId: "<?php echo $_SESSION['id']; ?>" },
		success: function (response) {
			console.log(response);
			if (response.result) {
				
				if(response.bannerImg)
				{
					var imgurl = response.bannerImg.bannerImg.bannerImg;
					console.log(imgurl);
					imgUse = 1;
				}
				else
				{
					var imgurl = "../img/common/default.png";
					imgUse = 0;
				}				
				$("#logo").css({"background":"url("+imgurl+")"}); 	
				$("#logo").css({"background-size":"contain"}); 	
				
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			stop_progress();
			alert(request+' '+status+' '+error);
		}
	});
	
});
</script>


<?php } ?>