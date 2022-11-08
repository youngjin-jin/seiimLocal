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
							else if(response.info.templateType == 8)
							{
								$("#templateType8_div :radio[name='input1']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input1){
										$this.attr('checked', true);
									}						
								});	

								$("#templateType8_div :radio[name='input2']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input2){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType8_div :radio[name='input3']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input3){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType8_div :radio[name='input4']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input4){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType8_div :radio[name='input5']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input5){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType8_div :radio[name='input6']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input6){
										$this.attr('checked', true);
									}						
								});							
								$("#templateType8_div #input7").val(response.info.content.input7);		
							}
							else if (response.info.templateType == 9)  {
								$('#templateType9_div #sign_img2').attr('src', response.info.content.signature);
							}
							else if(response.info.templateType == 10)
							{
								$("#templateType10_div #input1").val(response.info.content.input1);		
							}
							else if(response.info.templateType == 11)
							{
								$("#templateType11_div :radio[name='input1']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input1_1){
										$this.attr('checked', true);
									}						
								});					
								if(response.info.content.input1_1 == "B")	
								{
									$("#templateType11_div .selectType").show();
									$('#templateType11_div #input_1_2').val(response.info.content.input_1_2);
								}
								$("#templateType11_div #input2").val(response.info.content.input2);
								$("#templateType11_div #input3").val(response.info.content.input3);

								$("#templateType11_div :radio[name='input4']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input4){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType11_div :radio[name='input5']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input5){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType11_div :radio[name='input6']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input6){
										$this.attr('checked', true);
									}						
								});	
								$("#templateType11_div :radio[name='input7']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input7){
										$this.attr('checked', true);
									}						
								});	
								if(response.info.content.input7 == "O")
								{
									$("#templateType11_div .radio4_1").show();
								}
								if(response.info.content.input5 == "O")
								{
									$("#templateType11_div .radio5_1").show();
								}
								$("#templateType11_div #input8").val(response.info.content.input8);						
								$("#templateType11_div :radio[name='input9']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input9){
										$this.attr('checked', true);
									}						
								});	

								$("#templateType11_div #input10").val(response.info.content.input10);	
								$("#templateType11_div #input11").val(response.info.content.input11);	
								$("#templateType11_div #input12").val(response.info.content.input12);	
								$("#templateType11_div #input13").val(response.info.content.input13);	
								$("#templateType11_div #input14_1").val(response.info.content.input14_1);
								$("#templateType11_div #input14_2").val(response.info.content.input14_2);
								$("#templateType11_div #input15").val(response.info.content.input15);		
								$("#templateType11_div #input16").val(response.info.content.input16);		
								$("#templateType11_div #input17").val(response.info.content.input17);		
							}
							else if(response.info.templateType == 12)
							{						
								$("#templateType12_div #input1_1").val(response.info.content.input1_1);		
								$("#templateType12_div #input1_2").val(response.info.content.input1_2);		
								$("#templateType12_div #input1_3").val(response.info.content.input1_3);		
								$("#templateType12_div #input2_1").val(response.info.content.input2_1);		
								$("#templateType12_div #input2_2").val(response.info.content.input2_2);		
								$("#templateType12_div #input2_3").val(response.info.content.input2_3);		
								$("#templateType12_div #input3_1").val(response.info.content.input3_1);		
								$("#templateType12_div #input3_2").val(response.info.content.input3_2);		
								$("#templateType12_div #input3_3").val(response.info.content.input3_3);		
								$("#templateType12_div :radio[name='input4_1']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input4_1){
										$this.attr('checked', true);
									}						
								});
								if(response.info.content.input4_1 == '기타')
								{
									$("#templateType12_div #input4_2").show();
									$("#templateType12_div #input4_2").val(response.info.content.input4_2);
								}
								$("#templateType12_div :radio[name='input5']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input5){
										$this.attr('checked', true);
									}						
								});
								$("#templateType12_div :radio[name='input6_1']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input6_1){
										$this.attr('checked', true);
									}						
								});
								if(response.info.content.input6_1 == 'Y')
								{
									$("#templateType12_div .input_7_area").show();
									$("#templateType12_div :radio[name='input6_2']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.input6_2){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='input6_3']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.input6_3){
											$this.attr('checked', true);
										}						
									});
								}
								$("#templateType12_div :radio[name='input7_1']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input7_1){
										$this.attr('checked', true);
									}						
								});
								if(response.info.content.input7_1 == 'Y')
								{
									$("#templateType12_div .input7_area").show();

									$("#templateType12_div :radio[name='input7_2']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.input7_2){
											$this.attr('checked', true);
										}						
									});						
								}
								$("#templateType12_div :radio[name='input8']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input8){
										$this.attr('checked', true);
									}						
								});
								$("#templateType12_div :radio[name='input9']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input9){
										$this.attr('checked', true);
									}						
								});
								if(response.info.content.input7_1 == 'Y')
								{
									$("#templateType12_div #addForm").show();
									var input10 = response.info.content.input10;
									var temp1 = 0, temp2 = 0, temp3 = 0, temp4 = 0, temp5 = 0, temp6 = 0;

									for(var i = 0; i < input10.length; i++)
									{
										if(input10[i] == '목')
										{
											temp1 = 1;
										}
										if(input10[i] == '어깨')
										{
											temp2 = 1;
										}
										if(input10[i] == '팔/팔꿈치')
										{
											temp3 = 1;
										}
										if(input10[i] == '손/손목/손가락')
										{
											temp4 = 1;
										}
										if(input10[i] == '허리')
										{
											temp5 = 1;
										}
										if(input10[i] == '다리/발')
										{
											temp6 = 1;
										}
									}
									$("#templateType12_div .input10").each(function() {  
										var $this = $(this);  
										if($this.val() == '목' && temp1 == 1){
											$this.attr('checked', true);
										}						
										if($this.val() == '어깨' && temp2 == 1){
											$this.attr('checked', true);
										}						
										if($this.val() == '팔/팔꿈치' && temp3 == 1){
											$this.attr('checked', true);
										}						
										if($this.val() == '손/손목/손가락' && temp4 == 1){
											$this.attr('checked', true);
										}						
										if($this.val() == '허리' && temp5 == 1){
											$this.attr('checked', true);
										}						
										if($this.val() == '다리/발' && temp6 == 1){
											$this.attr('checked', true);
										}						
									});						
									if(temp1 == 1)
									{						
										$("#templateType12_div #db_neck").show();
									}
									if(temp2 == 1)
									{	
										$("#templateType12_div #db_shoulder").show();
									}
									if(temp3 == 1)
									{	
										$("#templateType12_div #db_arm").show();
									}
									if(temp4 == 1)
									{
										$("#templateType12_div #db_hand").show();
									}
									if(temp5 == 1)
									{
										$("#templateType12_div #db_back").show();
									}
									if(temp6 == 1)
									{
										$("#templateType12_div #db_leg").show();
									}

									$("#templateType12_div :radio[name='part_1_1_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_1_1_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_1_2_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_1_2_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_1_3_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_1_3_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_1_4_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_1_4_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_1_5_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_1_5_value){
											$this.attr('checked', true);
										}						
									});
									if(response.info.content.part_1_5_value == '기타')
									{
										$("#templateType12_div #part_1_6_value").show();
										$("#templateType12_div #part_1_6_value").val(response.info.content.part_1_6_value);
									}


									$("#templateType12_div :radio[name='part_2_1_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_2_1_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_2_2_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_2_2_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_2_3_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_2_3_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_2_4_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_2_4_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_2_5_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_2_5_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_2_6_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_2_6_value){
											$this.attr('checked', true);
										}						
									});
									if(response.info.content.part_2_6_value == '기타')
									{
										$("#templateType12_div #part_2_7_value").show();
										$("#templateType12_div #part_2_7_value").val(response.info.content.part_2_7_value);
									}
									$("#templateType12_div :radio[name='part_3_1_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_3_1_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_3_2_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_3_2_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_3_3_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_3_3_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_3_4_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_3_4_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_3_5_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_3_5_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_3_6_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_3_6_value){
											$this.attr('checked', true);
										}						
									});
									if(response.info.content.part_3_6_value == '기타')
									{
										$("#templateType12_div #part_3_7_value").show();
										$("#templateType12_div #part_3_7_value").val(response.info.content.part_3_7_value);
									}


									$("#templateType12_div :radio[name='part_4_1_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_4_1_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_4_2_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_4_2_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_4_3_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_4_3_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_4_4_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_4_4_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_4_5_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_4_5_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_4_6_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_4_6_value){
											$this.attr('checked', true);
										}						
									});
									if(response.info.content.part_4_6_value == '기타')
									{
										$("#templateType12_div #part_4_7_value").show();
										$("#templateType12_div #part_4_7_value").val(response.info.content.part_4_7_value);
									}


									$("#templateType12_div :radio[name='part_5_1_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_5_1_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_5_2_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_5_2_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_5_3_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_5_3_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_5_4_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_5_4_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_5_5_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_5_5_value){
											$this.attr('checked', true);
										}						
									});
									if(response.info.content.part_5_5_value == '기타')
									{
										$("#templateType12_div #part_5_6_value").show();
										$("#templateType12_div #part_5_6_value").val(response.info.content.part_5_6_value);
									}


									$("#templateType12_div :radio[name='part_6_1_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_6_1_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_6_2_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_6_2_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_6_3_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_6_3_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_6_4_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_6_4_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_6_5_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_6_5_value){
											$this.attr('checked', true);
										}						
									});
									$("#templateType12_div :radio[name='part_6_6_value']").each(function() {  
										var $this = $(this);  
										if($this.val() == response.info.content.part_6_6_value){
											$this.attr('checked', true);
										}						
									});
									if(response.info.content.part_6_6_value == '기타')
									{
										$("#templateType12_div #part_6_7_value").show();
										$("#templateType12_div #part_6_7_value").val(response.info.content.part_6_7_value);
									}							
								}
							}
							else if(response.info.templateType == 13)
							{
								$("#templateType13_div :radio[name='input1']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input1){
										$this.attr('checked', true);
									}						
								});
								$("#templateType13_div :radio[name='input2']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input2){
										$this.attr('checked', true);
									}						
								});
								$("#templateType13_div :radio[name='input3']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input3){
										$this.attr('checked', true);
									}						
								});
								$("#templateType13_div :radio[name='input4']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input4){
										$this.attr('checked', true);
									}						
								});
								$("#templateType13_div :radio[name='input5']").each(function() {  
									var $this = $(this);  
									if($this.val() == response.info.content.input5){
										$this.attr('checked', true);
									}						
								});						
								$("#templateType13_div #input6").val(response.info.content.input6);
								$("#templateType13_div #input7").val(response.info.content.input7);
								$("#templateType13_div #input8").val(response.info.content.input8);
								$("#templateType13_div #input9").val(response.info.content.input9);
								$("#templateType13_div #input10").val(response.info.content.input10);
								$("#templateType13_div #input11").val(response.info.content.input11);
								$("#templateType13_div #previewImg").attr("src", response.info.content.imgPathurl);						
								$("#templateType13_div #imgPathurl").val(response.info.content.imgPathurl);		
							}



							

							console.log('test');
							console.log(response.info);



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
	else if (templateType == '8') {
		//보후구지급
		var input1_name	 = $('#templateType8_div #input1_name').text();
		var input1		 = $('#templateType8_div input:radio[name="input1"]:checked').val();
		var input2_name	 = $('#templateType8_div #input2_name').text();
		var input2		 = $('#templateType8_div input:radio[name="input2"]:checked').val();
		var input3_name	 = $('#templateType8_div #input3_name').text();
		var input3		 = $('#templateType8_div input:radio[name="input3"]:checked').val();
		var input4_name	 = $('#templateType8_div #input4_name').text();
		var input4		 = $('#templateType8_div input:radio[name="input4"]:checked').val();
		var input5_name	 = $('#templateType8_div #input5_name').text();
		var input5		 = $('#templateType8_div input:radio[name="input5"]:checked').val();
		var input6_name	 = $('#templateType8_div #input6_name').text();
		var input6		 = $('#templateType8_div input:radio[name="input6"]:checked').val();
		var input7_name	 = $('#templateType8_div #input7_name').text();
		var input7		 = $('#templateType8_div #input7').val();
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
		if (!input7) {
			alert(input7_name+' '+_lc['txt']['입력하세요']);
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
	}
	else if (templateType == '9') {
		if(!$("#templateType9_div #ag_1").is(":checked"))
		{
			alert("안전수칙준수서약를 동의해주세요");
			return false;
		}
		if(!$("#templateType9_div #ag_2").is(":checked"))
		{
			alert("자율안전 서약(신규근로자)를 동의해주세요");
			return false;
		}
		if(!$("#templateType9_div #ag_3").is(":checked"))
		{
			alert("자율안전 서약(신규장비)를 동의해주세요");
			return false;
		}

		if(!$("#templateType9_div #ag_4").is(":checked"))
		{
			alert("건강진단 사후조치를 동의해주세요");
			return false;
		}
		if(!$("#templateType9_div #ag_5").is(":checked"))
		{
			alert("근로자 자기보호권을 동의해주세요");
			return false;
		}
		if(!$("#templateType9_div #ag_6").is(":checked"))
		{
			alert("근로자 2진 아웃제를 동의해주세요");
			return false;
		}	
		
		//안전수칙준수 서약서
		if (!signature) {
			alert(_lc['alert']['서명을로드하지못했습니다']);
			return false;
		}
		var content = { "signature" : signature }
	}
	else if (templateType == '10') {
		//기초안전보건 테스트
		var input1_name	 = $('#templateType10_div #input1_name').text();
		var input1		 = $('#templateType10_div #input1').val();
		if (parseInt(input1) < 0 || parseInt(input1) > 100) {
			alert(_lc['alert']['기초안전보건테스트점수를정확하게입력하세요']);
			return false;
		}
		var content = { 
			"input1_name"	 : input1_name,
			"input1"		 : input1
		}
	}
	else if (templateType == '11') {
		var input1_name	 	 = $('#templateType11_div #input1_name').text();	
		var input1_1		 = $('#templateType11_div input:radio[name="input1"]:checked').val();
		var input1_2		 = $('#templateType11_div #input_1_2').val();	
		var input2_name		 = $('#templateType11_div #input2_name').text();
		var input2	 	 	 = $('#templateType11_div #input2').val();
		var input3_name		 = $('#templateType11_div #input3_name').text();
		var input3	 	 	 = $('#templateType11_div #input3').val();
		var input4_name		 = $('#templateType11_div #input4_name').text();
		var input4	 	 	 = $('#templateType11_div input:radio[name="input4"]:checked').val();
		var input5_name		 = $('#templateType11_div #input5_name').text();
		var input5	 	 	 = $('#templateType11_div input:radio[name="input5"]:checked').val();
		var input6_name		 = $('#templateType11_div #input6_name').text();
		var input6	 	 	 = $('#templateType11_div input:radio[name="input6"]:checked').val();
		var input7_name		 = $('#templateType11_div #input7_name').text();
		var input7	 	 	 = $('#templateType11_div input:radio[name="input7"]:checked').val();
		var input8_name		 = $('#templateType11_div #input8_name').text();
		var input8	 	 	 = $('#templateType11_div #input8').val();
		var input9_name		 = $('#templateType11_div #input9_name').text();
		var input9	 	 	 = $('#templateType11_div input:radio[name="input9"]:checked').val();
		var input10_name	 = $('#templateType11_div #input10_name').text();
		var input10	 	 	 = $('#templateType11_div #input10').val();		
		var input11_name	 = $('#templateType11_div #input11_name').text();
		var input11	 	 	 = $('#templateType11_div #input11').val();
		var input12_name	 = $('#templateType11_div #input12_name').text();
		var input12	 	 	 = $('#templateType11_div #input12').val();
		var input13_name	 = $('#templateType11_div #input13_name').text();
		var input13	 	 	 = $('#templateType11_div #input13').val();
		var input14_name	 = $('#templateType11_div #input14_name').text();
		var input14_1	 	 = $('#templateType11_div #input14_1').val();
		var input14_2	 	 = $('#templateType11_div #input14_2').val();
		var input15_name	 = $('#templateType11_div #input15_name').text();
		var input15	 	 	 = $('#templateType11_div #input15').val();
		var input16_name	 = $('#templateType11_div #input16_name').text();
		var input16	 	 	 = $('#templateType11_div #input16').val();
		var input17_name	 = $('#templateType11_div #input17_name').text();
		var input17	 	 	 = $('#templateType11_div #input17').val();
		if(!input1_1)
		{
			alert(input1_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(input1_1 == "B" && !input1_2)
		{
			alert(input1_2.attr("placeholder")+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input2)
		{
			alert(input2_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input3)
		{
			alert(input3_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input4)
		{
			alert(input4_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input5)
		{
			alert(input5_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input6)
		{
			alert(input6_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input7)
		{
			alert(input7_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(input7 == "O" && !input8)
		{
			alert(input7_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input9)
		{
			alert(input9_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(input5 == "O" && !input10)
		{
			alert(input10_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input11)
		{
			alert(input11_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input12)
		{
			alert(input12_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input13)
		{
			alert(input13_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}

		if(!input14_1)
		{
			alert(input14_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input14_2)
		{
			alert(input14_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}

		if(!input15)
		{
			alert(input15_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input16)
		{
			alert(input16_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input17)
		{
			alert(input17_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		var content = { 
			"input1_name"	: input1_name,
			"input1_1"		: input1_1,
			"input1_2"		: input1_2,
			"input2_name"	: input2_name,
			"input2"		: input2,
			"input3_name"	: input3_name,
			"input3"		: input3,
			"input4_name"	: input4_name,
			"input4"		: input4,
			"input5_name"	: input5_name,
			"input5"		: input5,
			"input6_name"	: input6_name,
			"input6"		: input6,
			"input7_name"	: input7_name,
			"input7"		: input7,
			"input8_name"	: input8_name,
			"input8"		: input8,
			"input9_name"	: input9_name,
			"input9"		: input9,
			"input10_name"	: input10_name,
			"input10"		: input10,
			"input11_name"	: input11_name,
			"input11"		: input11,
			"input12_name"	: input12_name,
			"input12"		: input12,
			"input13_name"	: input13_name,
			"input13"		: input13,
			"input14_name"	: input14_name,
			"input14_1"		: input14_1,
			"input14_2"		: input14_2,
			"input15_name"	: input15_name,
			"input15"		: input15,
			"input16_name"	: input16_name,
			"input16"		: input16,
			"input17_name"	: input17_name,
			"input17"		: input17
		}
	}
	else if (templateType == '12') {
		var input1_name		 = $('#templateType12_div #input1_name').text();	
		var input1_1		 = $('#templateType12_div #input1_1').val();	
		var input1_2		 = $('#templateType12_div #input1_2').val();	
		var input1_3		 = $('#templateType12_div #input1_3').val();	
		if(!input1_1)
		{
			alert(input1_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input1_2)
		{
			alert(input1_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input1_3)
		{
			alert(input1_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		var input2_name	 	 = $('#templateType12_div #input2_name').text();	
		var input2_1		 = $('#templateType12_div #input2_1').val();	
		var input2_2		 = $('#templateType12_div #input2_2').val();	
		var input2_3		 = $('#templateType12_div #input2_3').val();	
		if(!input2_1)
		{
			alert(input2_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input2_2)
		{
			alert(input2_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input2_3)
		{
			alert(input2_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		var input3_name	 	 = $('#templateType12_div #input3_name').text();	
		var input3_1		 = $('#templateType12_div #input3_1').val();	
		var input3_2		 = $('#templateType12_div #input3_2').val();	
		var input3_3		 = $('#templateType12_div #input3_3').val();	
		if(!input3_1)
		{
			alert(input3_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input3_2)
		{
			alert(input3_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input3_3)
		{
			alert(input3_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}

		var input4_name	 	 = $('#templateType12_div #input4_name').text();	
		var input4_1		 = $('#templateType12_div input:radio[name="input4_1"]:checked').val();
		var input4_2		 = $('#templateType12_div #input4_2').val();	
		if(!input4_1)
		{
			alert(input4_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}		
		var input5_name		 = $('#templateType12_div #input5_name').text();	
		var input5		 	 = $('#templateType12_div input:radio[name="input5"]:checked').val();

		if(!input5)
		{
			alert(input5_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
	
		var input6_name		 = $('#templateType12_div #input6_name').text();	
		var input6_1		 = $('#templateType12_div input:radio[name="input6_1"]:checked').val();
		var input6_2		 = $('#templateType12_div input:radio[name="input6_2"]:checked').val();
		var input6_3		 = $('#templateType12_div input:radio[name="input6_3"]:checked').val();

		if(!input6_1)
		{
			alert(input6_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(input6_1 == "Y" && !input6_2)
		{
			alert(input6_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(input6_1 == "Y" && !input6_3)
		{
			alert(input6_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}

		var input7_name		 = $('#templateType12_div #input7_name').text();	
		var input7_1		 = $('#templateType12_div input:radio[name="input7_1"]:checked').val();
		var input7_2		 = $('#templateType12_div input:radio[name="input7_2"]:checked').val();
		if(!input7_1)
		{
			alert(input7_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(input7_1 == "Y" && !input7_2)
		{
			alert(input7_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}


		var input8_name		 = $('#templateType12_div #input8_name').text();	
		var input8		 	 = $('#templateType12_div input:radio[name="input8"]:checked').val();


		if(!input8)
		{
			alert(input5input8_name_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		var input9_name		 = $('#templateType12_div #input9_name').text();	
		var input9		 	 = $('#templateType12_div input:radio[name="input9"]:checked').val();
		if(!input9)
		{
			alert(input9_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		
		var input10_name	 = $('#templateType12_div #input10_name').text();		
		var input10 = new Array();		
		$(".input10").each(function() { 			
			if($(this).is(":checked"))
			{
				input10.push($(this).val());
			}			
		});	
		if(input9 == "Y" && input10.length == 0)
		{
			alert(input10_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		var part_1_1_value = $('#templateType12_div input:radio[name="part_1_1_value"]:checked').val();
		var part_1_2_value = $('#templateType12_div input:radio[name="part_1_2_value"]:checked').val();
		var part_1_3_value = $('#templateType12_div input:radio[name="part_1_3_value"]:checked').val();
		var part_1_4_value = $('#templateType12_div input:radio[name="part_1_4_value"]:checked').val();
		var part_1_5_value = $('#templateType12_div input:radio[name="part_1_5_value"]:checked').val();
		var part_1_6_value = $("#templateType12_div #part_1_6_value").val();
		var part_2_1_value = $('#templateType12_div input:radio[name="part_2_1_value"]:checked').val();
		var part_2_2_value = $('#templateType12_div input:radio[name="part_2_2_value"]:checked').val();
		var part_2_3_value = $('#templateType12_div input:radio[name="part_2_3_value"]:checked').val();
		var part_2_4_value = $('#templateType12_div input:radio[name="part_2_4_value"]:checked').val();
		var part_2_5_value = $('#templateType12_div input:radio[name="part_2_5_value"]:checked').val();
		var part_2_6_value = $('#templateType12_div input:radio[name="part_2_6_value"]:checked').val();
		var part_2_7_value = $("#templateType12_div #part_2_7_value").val();
		var part_3_1_value = $('#templateType12_div input:radio[name="part_3_1_value"]:checked').val();
		var part_3_2_value = $('#templateType12_div input:radio[name="part_3_2_value"]:checked').val();
		var part_3_3_value = $('#templateType12_div input:radio[name="part_3_3_value"]:checked').val();
		var part_3_4_value = $('#templateType12_div input:radio[name="part_3_4_value"]:checked').val();
		var part_3_5_value = $('#templateType12_div input:radio[name="part_3_5_value"]:checked').val();
		var part_3_6_value = $('#templateType12_div input:radio[name="part_3_6_value"]:checked').val();
		var part_3_7_value = $("#templateType12_div #part_3_7_value").val();
		var part_4_1_value = $('#templateType12_div input:radio[name="part_4_1_value"]:checked').val()
		var part_4_2_value = $('#templateType12_div input:radio[name="part_4_2_value"]:checked').val()
		var part_4_3_value = $('#templateType12_div input:radio[name="part_4_3_value"]:checked').val()
		var part_4_4_value = $('#templateType12_div input:radio[name="part_4_4_value"]:checked').val()
		var part_4_5_value = $('#templateType12_div input:radio[name="part_4_5_value"]:checked').val()
		var part_4_6_value = $('#templateType12_div input:radio[name="part_4_6_value"]:checked').val()
		var part_4_7_value = $("#templateType12_div #part_4_7_value").val();
		var part_5_1_value = $('#templateType12_div input:radio[name="part_5_1_value"]:checked').val()
		var part_5_2_value = $('#templateType12_div input:radio[name="part_5_2_value"]:checked').val()
		var part_5_3_value = $('#templateType12_div input:radio[name="part_5_3_value"]:checked').val()
		var part_5_4_value = $('#templateType12_div input:radio[name="part_5_4_value"]:checked').val()
		var part_5_5_value = $('#templateType12_div input:radio[name="part_5_5_value"]:checked').val()
		var part_5_6_value = $("#templateType12_div #part_5_6_value").val();
		var part_6_1_value = $('#templateType12_div input:radio[name="part_6_1_value"]:checked').val()
		var part_6_2_value = $('#templateType12_div input:radio[name="part_6_2_value"]:checked').val()
		var part_6_3_value = $('#templateType12_div input:radio[name="part_6_3_value"]:checked').val()
		var part_6_4_value = $('#templateType12_div input:radio[name="part_6_4_value"]:checked').val()
		var part_6_5_value = $('#templateType12_div input:radio[name="part_6_5_value"]:checked').val()
		var part_6_6_value = $('#templateType12_div input:radio[name="part_6_6_value"]:checked').val()
		var part_6_7_value = $("#templateType12_div #part_6_7_value").val();
		var part_1_1	   = $("#templateType12_div #part_1_1").text();
		var part_1_2	   = $("#templateType12_div #part_1_2").text();
		var part_1_3	   = $("#templateType12_div #part_1_3").text();
		var part_1_4	   = $("#templateType12_div #part_1_4").text();
		var part_1_5	   = $("#templateType12_div #part_1_5").text();
		var part_1_6	   = $("#templateType12_div #part_1_6").text();
		var part_2_1	   = $("#templateType12_div #part_2_1").text();
		var part_2_2	   = $("#templateType12_div #part_2_2").text();
		var part_2_3	   = $("#templateType12_div #part_2_3").text();
		var part_2_4	   = $("#templateType12_div #part_2_4").text();
		var part_2_5	   = $("#templateType12_div #part_2_5").text();
		var part_2_6	   = $("#templateType12_div #part_2_6").text();
		var part_2_7	   = $("#templateType12_div #part_2_7").text();
		var part_3_1	   = $("#templateType12_div #part_3_1").text();
		var part_3_2	   = $("#templateType12_div #part_3_2").text();
		var part_3_3	   = $("#templateType12_div #part_3_3").text();
		var part_3_4	   = $("#templateType12_div #part_3_4").text();
		var part_3_5	   = $("#templateType12_div #part_3_5").text();
		var part_3_6	   = $("#templateType12_div #part_3_6").text();
		var part_3_7	   = $("#templateType12_div #part_3_7").text();
		var part_4_1	   = $("#templateType12_div #part_4_1").text();
		var part_4_2	   = $("#templateType12_div #part_4_2").text();
		var part_4_3	   = $("#templateType12_div #part_4_3").text();
		var part_4_4	   = $("#templateType12_div #part_4_4").text();
		var part_4_5	   = $("#templateType12_div #part_4_5").text();
		var part_4_6	   = $("#templateType12_div #part_4_6").text();
		var part_4_7	   = $("#templateType12_div #part_4_7").text();
		var part_5_1	   = $("#templateType12_div #part_5_1").text();
		var part_5_2	   = $("#templateType12_div #part_5_2").text();
		var part_5_3	   = $("#templateType12_div #part_5_3").text();
		var part_5_4	   = $("#templateType12_div #part_5_4").text();
		var part_5_5	   = $("#templateType12_div #part_5_5").text();
		var part_5_6	   = $("#templateType12_div #part_5_6").text();
		var part_6_1	   = $("#templateType12_div #part_6_1").text();
		var part_6_2	   = $("#templateType12_div #part_6_2").text();
		var part_6_3	   = $("#templateType12_div #part_6_3").text();
		var part_6_4	   = $("#templateType12_div #part_6_4").text();
		var part_6_5	   = $("#templateType12_div #part_6_5").text();
		var part_6_6	   = $("#templateType12_div #part_6_6").text();
		var part_6_7	   = $("#templateType12_div #part_6_7").text();
		if(input9 == "Y")
		{
			var temp1, temp2, temp3, temp4, temp5, temp6 = 0;

			for(var i = 0; i < input10.length; i++)
			{
				if(input10[i] == '목')
				{
					temp1 = 1;
				}
				if(input10[i] == '어깨')
				{
					temp2 = 1;
				}
				if(input10[i] == '팔/팔꿈치')
				{
					temp3 = 1;
				}
				if(input10[i] == '손/손목/손가락')
				{
					temp4 = 1;
				}
				if(input10[i] == '허리')
				{
					temp5 = 1;
				}
				if(input10[i] == '다리/발')
				{
					temp6 = 1;
				}
			}
			if(input10.length > 0)
			{
				if(temp1 == 1)
				{
					console.log(1);
					if(!part_1_1_value)
					{
						alert(part_1_1+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_1_2_value)
					{
						alert(part_1_2+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_1_3_value)
					{
						alert(part_1_3+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_1_4_value)
					{
						alert(part_1_4+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_1_5_value)
					{
						alert(part_1_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
				}
				if(temp2 == 1)
				{
					console.log(2);
					if(!part_2_1_value)
					{
						alert(part_2_1+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_2_2_value)
					{
						alert(part_2_2+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_2_3_value)
					{
						alert(part_2_3+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_2_4_value)
					{
						alert(part_2_4+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_2_5_value)
					{
						alert(part_2_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_2_6_value)
					{
						alert(part_2_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
				}
				if(temp3 == 1)
				{
					console.log(3);
					if(!part_3_1_value)
					{
						alert(part_3_1+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_3_2_value)
					{
						alert(part_3_2+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_3_3_value)
					{
						alert(part_3_3+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_3_4_value)
					{
						alert(part_3_4+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_3_5_value)
					{
						alert(part_3_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_3_6_value)
					{
						alert(part_3_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
				}
				if(temp4 == 1)
				{
					console.log(4);
					if(!part_4_1_value)
					{
						alert(part_4_1+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_4_2_value)
					{
						alert(part_4_2+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_4_3_value)
					{
						alert(part_4_3+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_4_4_value)
					{
						alert(part_4_4+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_4_5_value)
					{
						alert(part_4_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_4_6_value)
					{
						alert(part_4_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
				}
				if(temp5 == 1)
				{
					console.log(5);
					if(!part_5_1_value)
					{
						alert(part_5_1+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_5_2_value)
					{
						alert(part_5_2+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_5_3_value)
					{
						alert(part_5_3+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_5_4_value)
					{
						alert(part_5_4+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_5_5_value)
					{
						alert(part_2_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}

				}
				if(temp6 == 1)
				{
					console.log(6);
					if(!part_6_1_value)
					{
						alert(part_6_1+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_6_2_value)
					{
						alert(part_6_2+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_6_3_value)
					{
						alert(part_6_3+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_6_4_value)
					{
						alert(part_6_4+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_6_5_value)
					{
						alert(part_6_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
					if(!part_6_6_value)
					{
						alert(part_6_5+' '+_lc['txt']['입력하세요']);			
						return false;
					}
				}
			}
		}
		var content = { 			
			"input1_name" 		: input1_name,
			"input1_1" 			: input1_1,
			"input1_2" 			: input1_2,
			"input1_3" 			: input1_3,
			"input2_name" 		: input2_name,
			"input2_1" 			: input2_1,
			"input2_2" 			: input2_2,
			"input2_3" 			: input2_3,
			"input3_name" 		: input3_name,
			"input3_1" 			: input3_1,
			"input3_2" 			: input3_2,
			"input3_3" 			: input3_3,
			"input4_name" 		: input4_name,
			"input4_1" 			: input4_1,
			"input4_2" 			: input4_2,
			"input5_name" 		: input5_name,
			"input5" 			: input5,
			"input6_name" 		: input6_name,
			"input6_1" 			: input6_1,
			"input6_2" 			: input6_2,
			"input6_3" 			: input6_3,
			"input7_name" 		: input7_name,
			"input7_1" 			: input7_1,
			"input7_2" 			: input7_2,
			"input8_name" 		: input8_name,
			"input8" 			: input8,
			"input9_name" 		: input9_name,
			"input9" 			: input9,
			"input10_name" 		: input10_name,
			"input10" 			: input10,
			"part_1_1_value"	:	part_1_1_value,
			"part_1_2_value"	:	part_1_2_value,
			"part_1_3_value"	:	part_1_3_value,
			"part_1_4_value"	:	part_1_4_value,
			"part_1_5_value"	:	part_1_5_value,
			"part_1_6_value"	:	part_1_6_value,
			"part_2_1_value"	:	part_2_1_value,
			"part_2_2_value"	:	part_2_2_value,
			"part_2_3_value"	:	part_2_3_value,
			"part_2_4_value"	:	part_2_4_value,
			"part_2_5_value"	:	part_2_5_value,
			"part_2_6_value"	:	part_2_6_value,
			"part_2_7_value"	:	part_2_7_value,
			"part_3_1_value"	:	part_3_1_value,
			"part_3_2_value"	:	part_3_2_value,
			"part_3_3_value"	:	part_3_3_value,
			"part_3_4_value"	:	part_3_4_value,
			"part_3_5_value"	:	part_3_5_value,
			"part_3_6_value"	:	part_3_6_value,
			"part_3_7_value"	:	part_3_7_value,
			"part_4_1_value"	:	part_4_1_value,
			"part_4_2_value"	:	part_4_2_value,
			"part_4_3_value"	:	part_4_3_value,
			"part_4_4_value"	:	part_4_4_value,
			"part_4_5_value"	:	part_4_5_value,
			"part_4_6_value"	:	part_4_6_value,
			"part_4_7_value"	:	part_4_7_value,
			"part_5_1_value"	:	part_5_1_value,
			"part_5_2_value"	:	part_5_2_value,
			"part_5_3_value"	:	part_5_3_value,
			"part_5_4_value"	:	part_5_4_value,
			"part_5_5_value"	:	part_5_5_value,
			"part_5_6_value"	:	part_5_6_value,
			"part_6_1_value"	:	part_6_1_value,
			"part_6_2_value"	:	part_6_2_value,
			"part_6_3_value"	:	part_6_3_value,
			"part_6_4_value"	:	part_6_4_value,
			"part_6_5_value"	:	part_6_5_value,
			"part_6_6_value"	:	part_6_6_value,
			"part_6_7_value"	:	part_6_7_value
		}

		
	}
	else if (templateType == '13') {
		var input1_name	 	 = $('#templateType13_div #input1_name').text();	
		var input1		 	 = $('#templateType13_div input:radio[name="input1"]:checked').val();
		var input2_name	 	 = $('#templateType13_div #input2_name').text();	
		var input2		 	 = $('#templateType13_div input:radio[name="input2"]:checked').val();
		var input3_name	 	 = $('#templateType13_div #input3_name').text();	
		var input3		 	 = $('#templateType13_div input:radio[name="input3"]:checked').val();
		var input4_name	 	 = $('#templateType13_div #input4_name').text();	
		var input4		 	 = $('#templateType13_div input:radio[name="input4"]:checked').val();
		var input5_name	 	 = $('#templateType13_div #input5_name').text();	
		var input5		 	 = $('#templateType13_div input:radio[name="input5"]:checked').val();		
		var imgPathurl 	 	 = $('#templateType13_div #imgPathurl').val();
		var input6_name		 = $('#templateType13_div #input6_name').text();	
		var input6		 	 = $('#templateType13_div #input6').val();
		var input7_name		 = $('#templateType13_div #input7_name').text();	
		var input7		 	 = $('#templateType13_div #input7').val();
		var input8_name		 = $('#templateType13_div #input8_name').text();	
		var input8		 	 = $('#templateType13_div #input8').val();
		var input9_name		 = $('#templateType13_div #input9_name').text();	
		var input9			 = $('#templateType13_div #input9').val();
		var input10_name	 = $('#templateType13_div #input10_name').text();	
		var input10			 = $('#templateType13_div #input10').val();
		var input11_name	 = $('#templateType13_div #input11_name').text();	
		var input11			 = $('#templateType13_div #input11').val();
		if(!input1)
		{
			alert(input1_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input2)
		{
			alert(input2_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input3)
		{
			alert(input3_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input4)
		{
			alert(input4_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input5)
		{
			alert(input5_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input6)
		{
			alert(input6_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input7)
		{
			alert(input7_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input8)
		{
			alert(input8_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input9)
		{
			alert(input9_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input10)
		{
			alert(input10_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		if(!input11)
		{
			alert(input11_name+' '+_lc['txt']['입력하세요']);			
			return false;
		}
		var content = {
			"input1_name"	:	input1_name,
			"input1"		:	input1,
			"input2_name"	:	input2_name,
			"input2"		:	input2,
			"input3_name"	:	input3_name,
			"input3"		:	input3,
			"input4_name"	:	input4_name,
			"input4"		:	input4,
			"input5_name"	:	input5_name,
			"input5"		:	input5,
			"imgPathurl"	:	imgPathurl,
			"input6_name"	:	input6_name,
			"input6"		:	input6,
			"input7_name"	:	input7_name,
			"input7"		:	input7,
			"input8_name"	:	input8_name,
			"input8"		:	input8,
			"input9_name"	:	input9_name,
			"input9"		:	input9,
			"input10_name"	:	input10_name,
			"input10"		:	input10,
			"input11_name"	:	input11_name,
			"input11"		:	input11
		};
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



//과거병력 수술유무 선택 이벤트
$('.oldForm input:radio[name="input7"]').on('click', function () {
	var value = $('.oldForm input:radio[name="input7"]:checked').val();

	if (value == 'O') {
		$('.radio4_1').show();
	} else {
		$('#radio4_1_value').val('');
		$('.radio4_1').hide();
	}
});

//산재유무 선택 이벤트
$('.oldForm input:radio[name="input5"]').on('click', function () {
	var value = $('input:radio[name="input5"]:checked').val();

	if (value == 'O') {
		$('.radio5_1').show();
	} else {
		$('#input10').val('');
		$('.radio5_1').hide();
	}
});

//산재유무 선택 이벤트
$('input:radio[name="input14"]').on('click', function () {
	var value = $('input:radio[name="input14"]:checked').val();

	if (value == 'O') {
		$('.radio9_1').show();
	} else {
		$('#input15_value').val('');
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





$('.selectRadio').on('click', function () {
	if($(this).val() == "A")
	{
		$(".selectType").hide();
	}
	else
	{
		$(".selectType").show();
	}
});
$('input:radio[name="input4_1"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#input4_2").show();
	}
	else
	{
		$("#input4_2").hide();
	}
});

$('input:radio[name="input6_1"]').on('click', function () {
	if($(this).val() == 'Y')
	{
		$(".input_7_area").show();
	}
	else
	{
		$(".input_7_area").hide();
	}
});
$('input:radio[name="input7_1"]').on('click', function () {
	if($(this).val() == 'Y')
	{
		$(".input7_area").show();
	}
	else
	{
		$(".input7_area").hide();
	}
});
$('input:radio[name="input9"]').on('click', function () {
	if($(this).val() == 'Y')
	{
		$("#addForm").show();
	}
	else
	{
		$("#addForm").hide();
	}
});




$('input:radio[name="part_1_5_value"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#part_1_6_value").show();
	}
	else
	{
		$("#part_1_6_value").hide();
	}
});
$('input:radio[name="part_2_6_value"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#part_2_7_value").show();
	}
	else
	{
		$("#part_2_7_value").hide();
	}
});

$('input:radio[name="part_3_6_value"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#part_3_7_value").show();
	}
	else
	{
		$("#part_3_7_value").hide();
	}
});


$('input:radio[name="part_4_6_value"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#part_4_7_value").show();
	}
	else
	{
		$("#part_4_7_value").hide();
	}
});

$('input:radio[name="part_5_5_value"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#part_5_6_value").show();
	}
	else
	{
		$("#part_5_6_value").hide();
	}
});

$('input:radio[name="part_6_6_value"]').on('click', function () {
	if($(this).val() == '기타')
	{
		$("#part_6_7_value").show();
	}
	else
	{
		$("#part_6_7_value").hide();
	}
});

$('input:radio[name="input9"]').on('click', function () {
	if($(this).val() == 'N')
	{
		$(".input10").each(function() { 			
			$(this).attr("checked", false);
		});	
		$("#db_neck").hide();
		$("#db_shoulder").hide();
		$("#db_arm").hide();
		$("#db_hand").hide();
		$("#db_back").hide();
		$("#db_leg").hide();
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