var writing_management_detail = (function () {
  
	return {
		get_list: function () {
			var accId		 = $('#key').val();
			var safetyDocId	 = $('#safetyDocId').val();
			
			run_progress();
			
			$.ajax({
				type: 'POST',
				url: '/controller/writing_management_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_list', 'accId' : accId, 'safetyDocId' : safetyDocId },
				success: function (response) {
					stop_progress();
					console.log(response);
					
					if (response.result) {
						console.log(response);
						if (response.status == 0) {
							if (response.info.docType == 0) {
								var type = '동의서';
							} else if (response.info.docType == 1) {
								var type = '질의응답';
							} else {
								var type = '기초테스트';
							}
							$("#templateType").val(response.info.templateType);
							$("#siteId").val(response.info.siteId);

							//0: 보호구, 1: 안전수칙준수서약서 5행 5금, 2: 기초보건테스트, 3: 면접면담, 4: 호반 보호구, 5: 호반 안전수칙, 6: 호반면접면담, 7: 호반 혈압
							if (response.info.templateType == 0) {
								$('#templateType0_div input[name="input1"][value="'+response.info.content.input1+'"]').prop('checked', true);
								$('#templateType0_div input[name="input2"][value="'+response.info.content.input2+'"]').prop('checked', true);
								$('#templateType0_div input[name="input3"][value="'+response.info.content.input3+'"]').prop('checked', true);
								$('#templateType0_div input[name="input4"][value="'+response.info.content.input4+'"]').prop('checked', true);
								$('#templateType0_div input[name="input5"][value="'+response.info.content.input5+'"]').prop('checked', true);
								$('#templateType0_div input[name="input6"][value="'+response.info.content.input6+'"]').prop('checked', true);
								$('#templateType0_div input[name="input7"]').val(response.info.content.input7);
							} else if (response.info.templateType == 1) {
								$('#sign_img').attr('src', response.info.content.signature);
							} else if (response.info.templateType == 2) {
								$('#templateType2_div input[name="input1"]').val(response.info.content.input1).prop('checked', true);
							} else if (response.info.templateType == 3)  {

								$('#templateType3_div input[name="input1"][value="'+response.info.content.input1+'"]').prop('checked', true);
								$('#templateType3_div input[name="input2"][value="'+response.info.content.input2+'"]').prop('checked', true);
								$('#templateType3_div input[name="input3"][value="'+response.info.content.input3+'"]').prop('checked', true);
								$('#templateType3_div input[name="input4"][value="'+response.info.content.input4+'"]').prop('checked', true);
								$('#templateType3_div input[name="input5"][value="'+response.info.content.input5+'"]').prop('checked', true);
								if (response.info.content.input4 == 'O') {
									$('#templateType3_div #input4_1_value').val(response.info.content.input4_1_value);
									$('#templateType3_div .radio4_1').show();
								}
								if (response.info.content.input5 == 'O') {
									$('#templateType3_div #input5_1_value').val(response.info.content.input5_1_value);
									$('#templateType3_div .radio5_1').show();
								}
								$('#templateType3_div #input6_1_value').val(response.info.content.input6_1_value);
								$('#templateType3_div #input6_2_value').val(response.info.content.input6_2_value);
								$('#templateType3_div #input6_3_value').val(response.info.content.input6_3_value);
								$('#templateType3_div #input7_1_value').val(response.info.content.input7_1_value);
								$('#templateType3_div #input7_2_value').val(response.info.content.input7_2_value);
								$('#templateType3_div #input7_3_value').val(response.info.content.input7_3_value);
							} else if (response.info.templateType == 4)  {
								$('#templateType4_div input[name="input1"][value="'+response.info.content.input1+'"]').prop('checked', true);
								$('#templateType4_div input[name="input2"][value="'+response.info.content.input2+'"]').prop('checked', true);
								$('#templateType4_div input[name="input3"][value="'+response.info.content.input3+'"]').prop('checked', true);
								$('#templateType4_div input[name="input4"][value="'+response.info.content.input4+'"]').prop('checked', true);
								$('#templateType4_div input[name="input5"][value="'+response.info.content.input5+'"]').prop('checked', true);
								$('#templateType4_div input[name="input6"][value="'+response.info.content.input6+'"]').prop('checked', true);
								$('#templateType4_div input[name="input7"]').val(response.info.content.input7);
							}
							else if (response.info.templateType == 5)  {
								$('#sign_img2').attr('src', response.info.content.signature);
							}
							else if (response.info.templateType == 6)  {
								//면접 및 면담 진행현황

								$('#templateType6_div #input1_value').val(response.info.content.input1_value);
								$('#templateType6_div #input2_value').val(response.info.content.input2_value);
								$('#templateType6_div #input3_value').val(response.info.content.input3_value);
								$('#templateType6_div #input4_value').val(response.info.content.input4_value);
								$('#templateType6_div #input5_value').val(response.info.content.input5_value);
								$('#templateType6_div #input6_value').val(response.info.content.input6_value);
								$('#templateType6_div #input7_value').val(response.info.content.input7_value);
								$('#templateType6_div #input8_1_value').val(response.info.content.input8_1_value);
								$('#templateType6_div #input8_2_value').val(response.info.content.input8_2_value);		
								$('#templateType6_div #input15_value').val(response.info.content.input15_value);
								$('#templateType6_div #input11_value').val(response.info.content.input11_value);
								$('#templateType6_div #input12_1_value').val(response.info.content.input12_1_value);
								$('#templateType6_div #input12_2_value').val(response.info.content.input12_2_value);
								$("#templateType6_div :radio[name='input9']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input9_value){
										$this.attr('checked', true);
									}						
								});
								$("#templateType6_div :radio[name='input10']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input10_value){
										$this.attr('checked', true);
									}						
								});
								$("#templateType6_div :radio[name='input16']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input16_value){
										$this.attr('checked', true);
									}						
								});
								$("#templateType6_div :radio[name='input13']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input13_value){
										$this.attr('checked', true);
									}						
								});
								$("#templateType6_div :radio[name='input14']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input14_value){
										$this.attr('checked', true);
									}						
								});
								if(response.info.content.input14_value == "O")
								{
									$("#templateType6_div .radio9_1").show();
								}

								
							}
							else if (response.info.templateType == 7)  {
								$('#templateType7_div input[name="bl_pic"][value="'+response.info.content.bl_pic+'"]').prop('checked', true);
								$('#previewImg').attr('src', response.info.content.input1_value);
								$('#templateType6_div #input2_value').val(response.info.content.input2_value);
								$('#templateType6_div #input3_value').val(response.info.content.input3_value);

							}
							$('#templateType'+response.info.templateType+'_div').show();
							$('#doc_name').text(response.info.docName);
							$('#site_nmae').text(response.info.siteName);
							$('#sv_name').text(response.info.svName);
							$('#user_name').text(response.info.userName);
							$('#type').text(type);
							$('#reg_date').text(response.info.createdAt.substring(0, 16).replace('T', ' '));
						}
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});
		}
	}
})();


//안전문서작성 제출 이벤트
$('#add_form').on('submit', function () {
	
	var key				 = $('#siteId').val();
	var site_name		 = $('#site_name').val();
	var docId			 = $('#docId').val();
	var templateType	 = $('#templateType').val();
	var accId		 = $('#key').val();
	

	if (templateType == '0') {
		//보후구지급
		var input1_name	 = $('#templateType0_div #input1_name').text();
		var input1		 = $('#templateType0_div input:radio[name="input1"]:checked').val();
		var input2_name	 = $('#templateType0_div #input2_name').text();
		var input2		 = $('#templateType0_div input:radio[name="input2"]:checked').val();
		var input3_name	 = $('#templateType0_div #input3_name').text();
		var input3		 = $('#templateType0_div input:radio[name="input3"]:checked').val();
		var input4_name	 = $('#templateType0_div #input4_name').text();
		var input4		 = $('#templateType0_div input:radio[name="input4"]:checked').val();
		var input5_name	 = $('#templateType0_div #input5_name').text();
		var input5		 = $('#templateType0_div input:radio[name="input5"]:checked').val();
		var input6_name	 = $('#templateType0_div #input6_name').text();
		var input6		 = $('#templateType0_div input:radio[name="input6"]:checked').val();
		var input7_name	 = $('#templateType0_div #input7_name').text();
		var input7		 = $('#templateType0_div #input7').val();

		if (!input1) {
			alert(input1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input2) {
			alert(input2_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input6) {
			alert(input6_name+' '+_lc['txt']['입력하세요']);
			return false;
		}

		var content = { 
			"input1_name"	 : input1_name,
			"input1"		 : input1,
			"input2_name"	 : input2_name,
			"input2"		 : input2,
			"input3_name"	 : input3_name,
			"input3"		 : input3,
			"input4_name"	 : input4_name,
			"input4"		 : input4,
			"input5_name"	 : input5_name,
			"input5"		 : input5,
			"input6_name"	 : input6_name,
			"input6"		 : input6,
			"input7_name"	 : input7_name,
			"input7"		 : input7
		}
	} else if (templateType == '1') {
		//안전수칙준수 서약서
		if (!signature) {
			alert(_lc['alert']['서명을로드하지못했습니다']);
			return false;
		}

		var content = { "signature" : signature }
	} else if (templateType == '2') {
		//기초안전보건 테스트
		var input1_name	 = $('#templateType2_div #input1_name').text();
		var input1		 = $('#templateType2_div #input1').val();

		if (parseInt(input1) < 0 || parseInt(input1) > 100) {
			alert(_lc['alert']['기초안전보건테스트점수를정확하게입력하세요']);
			return false;
		}

		var content = { 
			"input1_name"	 : input1_name,
			"input1"		 : input1
		}
	} else if (templateType == '3') {
		//면접 및 면담 진행현황
		var input1_name		 = $('#templateType3_div #input1_name').text();
		var input1			 = $('#templateType3_div input:radio[name="input1"]:checked').val();
		var input2_name		 = $('#templateType3_div #input2_name').text();
		var input2			 = $('#templateType3_div input:radio[name="input2"]:checked').val();
		var input3_name		 = $('#templateType3_div #input3_name').text();
		var input3			 = $('#templateType3_div input:radio[name="input3"]:checked').val();
		var input4_name		 = $('#templateType3_div #input4_name').text();
		var input4			 = $('#templateType3_div input:radio[name="input4"]:checked').val();
		var input4_1_name	 = $('#templateType3_div #input4_1_name').text();
		var input4_1_value	 = $('#templateType3_div #input4_1_value').val();
		var input5_name		 = $('#templateType3_div #input5_name').text();
		var input5			 = $('#templateType3_div input:radio[name="input5"]:checked').val();
		var input5_1_name	 = $('#templateType3_div #input5_1_name').text();
		var input5_1_value	 = $('#templateType3_div #input5_1_value').val();
		var input6_1_name	 = $('#templateType3_div #input6_1_name').text();
		var input6_1_value	 = $('#templateType3_div #input6_1_value').val();
		var input6_2_name	 = $('#templateType3_div #input6_2_name').text();
		var input6_2_value	 = $('#templateType3_div #input6_2_value').val();
		var input6_3_name	 = $('#templateType3_div #input6_3_name').text();
		var input6_3_value	 = $('#templateType3_div #input6_3_value').val();
		var input7_1_name	 = $('#templateType3_div #input7_1_name').text();
		var input7_1_value	 = $('#templateType3_div #input7_1_value').val();
		var input7_2_name	 = $('#templateType3_div #input7_2_name').text();
		var input7_2_value	 = $('#templateType3_div #input7_2_value').val();
		var input7_3_name	 = $('#templateType3_div #input7_3_name').text();
		var input7_3_value	 = $('#templateType3_div #input7_3_value').val();

		if (!input1) {
			alert(input1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input2) {
			alert(input2_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['입력하세요']);
			return false;
		} else if (input4 == 'O' && !input4_1_value) {
			alert(input4_1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['입력하세요']);
			return false;
		} else if (input5 == 'O' && !input5_1_value) {
			alert(input5_1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input6_1_value) {
			alert(input6_1_name+' '+_lc['txt']['입력하세요']);
			$('#input6_1_value').focus();
			return false;
		}
		if (!input6_2_value) {
			alert(input6_2_name+' '+_lc['txt']['입력하세요']);
			$('#input6_2_value').focus();
			return false;
		}
		if (!input6_3_value) {
			alert(input6_3_name+' '+_lc['txt']['입력하세요']);
			$('#input6_3_value').focus();
			return false;
		}
		if (!input7_1_value) {
			alert(input7_1_name+' '+_lc['txt']['입력하세요']);
			$('#input7_1_value').focus();
			return false;
		}

		var content = { 
			"input1_name"		 : input1_name,
			"input1"			 : input1,
			"input2_name"		 : input2_name,
			"input2"			 : input2,
			"input3_name"		 : input3_name,
			"input3"			 : input3,
			"input4_name"		 : input4_name,
			"input4"			 : input4,
			"input4_name"		 : input4_name,
			"input4_1_name"		 : input4_1_name,
			"input4_1_value"	 : input4_1_value,
			"input5_name"		 : input5_name,
			"input5"			 : input5,
			"input5_1_name"		 : input5_1_name,
			"input5_1_value"	 : input5_1_value,
			"input6_1_name"		 : input6_1_name,
			"input6_1_value"	 : input6_1_value,
			"input6_2_name"		 : input6_2_name,
			"input6_2_value"	 : input6_2_value,
			"input6_3_name"		 : input6_3_name,
			"input6_3_value"	 : input6_3_value,
			"input7_1_name"		 : input7_1_name,
			"input7_1_value"	 : input7_1_value,
			"input7_2_name"		 : input7_2_name,
			"input7_2_value"	 : input7_2_value,
			"input7_3_name"		 : input7_3_name,
			"input7_3_value"	 : input7_3_value
		}
	} else if (templateType == '4') {
		//보후구지급
		var input1_name	 = $('#templateType4_div #input1_name').text();
		var input1		 = $('#templateType4_div input:radio[name="input1"]:checked').val();
		var input2_name	 = $('#templateType4_div #input2_name').text();
		var input2		 = $('#templateType4_div input:radio[name="input2"]:checked').val();
		var input3_name	 = $('#templateType4_div #input3_name').text();
		var input3		 = $('#templateType4_div input:radio[name="input3"]:checked').val();
		var input4_name	 = $('#templateType4_div #input4_name').text();
		var input4		 = $('#templateType4_div input:radio[name="input4"]:checked').val();
		var input5_name	 = $('#templateType4_div #input5_name').text();
		var input5		 = $('#templateType4_div input:radio[name="input5"]:checked').val();
		var input6_name	 = $('#templateType4_div #input6_name').text();
		var input6		 = $('#templateType4_div input:radio[name="input6"]:checked').val();
		var input7_name	 = $('#templateType4_div #input7_name').text();
		var input7		 = $('#templateType4_div #input7').val();

		if (!input1) {
			alert(input1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input2) {
			alert(input2_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input6) {
			alert(input6_name+' '+_lc['txt']['입력하세요']);
			return false;
		}

		var content = { 
			"input1_name"	 : input1_name,
			"input1"		 : input1,
			"input2_name"	 : input2_name,
			"input2"		 : input2,
			"input3_name"	 : input3_name,
			"input3"		 : input3,
			"input4_name"	 : input4_name,
			"input4"		 : input4,
			"input5_name"	 : input5_name,
			"input5"		 : input5,
			"input6_name"	 : input6_name,
			"input6"		 : input6,
			"input7_name"	 : input7_name,
			"input7"		 : input7
		}
	} else if (templateType == '5') {
		//안전수칙준수 서약서
		if (!signature) {
			alert(_lc['alert']['서명을로드하지못했습니다']);
			return false;
		}

		var content = { "signature" : signature }
	} else if (templateType == '6') {
		
		//면접 및 면담 진행현황
		var input1_name	 	 = $('#templateType6_div #input1_name').text();
		var input1_value	 = $('#templateType6_div #input1_value').val();
		var input2_name	 	 = $('#templateType6_div #input2_name').text();
		var input2_value	 = $('#templateType6_div #input2_value').val();
		var input3_name	 	 = $('#templateType6_div #input3_name').text();
		var input3_value	 = $('#templateType6_div #input3_value').val();
		var input4_name	 	 = $('#templateType6_div #input4_name').text();
		var input4_value	 = $('#templateType6_div #input4_value').val();
		var input5_name	 	 = $('#templateType6_div #input5_name').text();
		var input5_value	 = $('#templateType6_div #input5_value').val();
		var input6_name	 	 = $('#templateType6_div #input6_name').text();
		var input6_value	 = $('#templateType6_div #input6_value').val();
		var input7_name	 	 = $('#templateType6_div #input7_name').text();
		var input7_value	 = $('#templateType6_div #input7_value').val();
		var input8_name	 	 = $('#templateType6_div #input8_name').text();
		var input8_1_value	 = $('#templateType6_div #input8_1_value').val();
		var input8_2_value	 = $('#templateType6_div #input8_2_value').val();		
		var input9_name		 = $('#templateType6_div #input9_name').text();
		var input9_value	 = $('#templateType6_div input:radio[name="input9"]:checked').val();
		var input10_name     = $('#templateType6_div #input10_name').text();
		var input10_value	 = $('#templateType6_div input:radio[name="input10"]:checked').val();
		var input11_name	 = $('#templateType6_div #input11_name').text();
		var input11_value	 = $('#templateType6_div #input11_value').val();
		var input12_name	 = $('#templateType6_div #input12_name').text();
		var input12_1_value	 = $('#templateType6_div #input12_1_value').val();
		var input12_2_value	 = $('#templateType6_div #input12_2_value').val();
		var input13_name	 = $('#templateType6_div #input13_name').text();
		var input13_value	 = $('#templateType6_div input:radio[name="input13"]:checked').val();
		var input14_name	 = $('#templateType6_div #input14_name').text();
		var input14_value	 = $('#templateType6_div input:radio[name="input14"]:checked').val();
		var input15_name	 = $('#templateType6_div #input15_name').text();
		var input15_value	 = $('#templateType6_div #input15_value').val();
		var input16_name	 = $('#templateType6_div #input16_name').text();
		var input16_value	 = $('#templateType6_div input:radio[name="input16"]:checked').val();
		if (!input1_value) {
			alert(input1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		/*
		if (!input2_value) {
			alert(input2_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		*/
		if (!input3_value) {
			alert(input3_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input4_value) {
			alert(input4_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input5_value) {
			alert(input5_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input6_value) {
			alert(input6_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input7_value) {
			alert(input7_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input8_1_value) {
			alert(input8_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input8_2_value) {
			alert(input8_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input9_value) {
			alert(input9_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input10_value) {
			alert(input10_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		/*
		if (!input11_value) {
			alert(input11_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		*/
		if (!input12_1_value) {
			alert(input12_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input12_2_value) {
			alert(input12_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input13_value) {
			alert(input13_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input14_value) {
			alert(input14_name+' '+_lc['txt']['입력하세요']);
			return false;
		}else if (input14_value == 'O' && !input15_value) {
			alert(input15_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input16_value) {
			alert(input16_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		var content = { 
			"input1_name"	:	input1_name ,
			"input1_value"	:	input1_value,
			"input2_name "	:	input2_name ,
			"input2_value"	:	input2_value,
			"input3_name "	:	input3_name ,
			"input3_value"	:	input3_value,
			"input4_name "	:	input4_name ,
			"input4_value"	:	input4_value,
			"input5_name"	:	input5_name ,
			"input5_value"	:	input5_value,
			"input6_name"	:	input6_name ,
			"input6_value"	:	input6_value,
			"input7_name"	:	input7_name ,
			"input7_value"	:	input7_value,
			"input8_name"	:	input8_name ,
			"input8_1_value"	:	input8_1_value,
			"input8_2_value"	:	input8_2_value,
			"input9_name"	:	input9_name,
			"input9_value"	:	input9_value,
			"input10_name"	:	input10_name,
			"input10_value"	:	input10_value,
			"input11_name"	:	input11_name,
			"input11_value"	:	input11_value,
			"input12_name"	:	input12_name,
			"input12_1_value"	:	input12_1_value,
			"input12_2_value"	:	input12_2_value,
			"input13_name"	:	input13_name,
			"input13_value"	:	input13_value,
			"input14_name"	:	input14_name,
			"input14_value"	:	input14_value,
			"input15_name"	:	input15_name,
			"input15_value"	:	input15_value,
			"input16_name"	:	input16_name,
			"input16_value"	:	input16_value
		}
	}
	else if (templateType == '7') {
		//면접 및 면담 진행현황
		var input1_name		 = '혈압용지 사진 첨부';
		var input1_value 	 = $('#templateType7_div #imgPathurl').val();
		var input2_name		 = $('#templateType7_div #input2_name').text();
		var input2_value	 = $('#templateType7_div #input2_value').val();
		var input3_name		 = $('#templateType7_div #input3_name').text();
		var input3_value	 = $('#templateType7_div #input3_value').val();
		if (!input1_value) {
			alert(input1_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input2_value) {
			alert(input2_name+' '+_lc['txt']['입력하세요']);
			return false;
		}
		if (!input3_value) {
			alert(input3_name+' '+_lc['txt']['입력하세요']);
			return false;
		}		
		var content = { 
			"input1_name"		 : input1_name,
			"input1_value"		 : input1_value,
			"input2_name"		 : input2_name,
			"input2_value"		 : input2_value,
			"input3_name"		 : input3_name,
			"input3_value"		 : input3_value
		}
	}
	run_progress();	

	$.ajax({
		type: 'POST',
		url: '/controller/safety_modify.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'key' : key, 'docId' : docId, 'accId' : accId, 'templateType' : templateType, 'content' : content },
		success: function (response) {
			stop_progress();	
			if (response.result) {
				
				location.href = document.referrer;
			} else {
				if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
			}
		},
		error: function (request, status, error) {
			stop_progress();
			alert(request+' '+status+' '+error);
		}
	});

	return false;
});


//산재유무 선택 이벤트
$('input:radio[name="input9"]').on('click', function () {
	var value = $('input:radio[name="input9"]:checked').val();

	if (value == 'O') {
		$('.radio9_1').show();
	} else {
		$('#input9_3_value').val('');
		$('.radio9_1').hide();
	}
});

$('#bl_pic').on('change', function () {

	var _this = $(this);
	if(_this.val())
	{
		var file_data = new FormData();
		file_data.append('upload_file', _this[0].files[0]);		
		run_progress();
		$.ajax({
			type: 'POST',
			url: '/controller/safe_uploads.php',
			dataType: 'json',
			cache: false,
			data: file_data,
			processData: false,
			contentType: false, 
			success : function(response) {
				stop_progress();

				console.log(response);
				
				if (navigator.userAgent.toLowerCase().indexOf('msie') != -1) {
					// ie 일때
					_this.replaceWith(_this.clone(true));
				} else { 
					// other browser 일때 
					_this.val('');
				}

				//console.log(response);
				if (response.result) {
					//profile_write.get_profile_img(upload_mode, true);
					$("#previewImg").attr("src", response.imgPath);
					$("#imgPathurl").val(response.imgPath);

				} else {
					if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
				}
			},
			error: function(request, status, error){
				stop_progress();
				alert(request+' '+status+' '+error);
			}	
		});

	}


});
//근로자 상세페이지 이동 이벤트
$('.ic-link').on('click', function () {
	var key = $('#key').val();
	
	location.href = 'worker_management_detail.php?key='+key;
});

$(document).ready(function () {
	writing_management_detail.get_list();
});