var safety_data = (function () {
	return {
		get_data: function () {			
			var key				 = $('#key').val();
			var docId			 = $('#docId').val();
			var templateType	 = $('#templateType').val();	
			var myCompanyId	 	 = $('#myCompanyId').val();	
			run_progress();			
			$.ajax({
				type: 'POST',
				url: '/controller/safety_modify_request.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_count', 'key' : key, 'docId' : docId, 'templateType' : templateType, 'myCompanyId' : myCompanyId},
				success: function (response) {
					stop_progress();		
					console.log(response.list);							
					if(response.list.templateType == 3)
					{
						$(":radio[name='input1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input1){
								$this.attr('checked', true);
							}						
						});	

						$(":radio[name='input2']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input2){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input3']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input3){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input4']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4){
								$this.attr('checked', true);
							}						
						});	
						if(response.list.content.input4 == "O")
						{
							$(".radio4_1").show();
						}	
						$("#input4_1_value").val(response.list.content.input4_1_value);		
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});							
						if(response.list.content.input5 == "O")
						{
							$(".radio5_1").show();
						}						
						$("#input5_1_value").val(response.list.content.input5_1_value);
						$("#input6_1_value").val(response.list.content.input6_1_value);		
						$("#input6_2_value").val(response.list.content.input6_2_value);		
						$("#input6_3_value").val(response.list.content.input6_3_value);		
						$("#input7_1_value").val(response.list.content.input7_1_value);		
						$("#input7_2_value").val(response.list.content.input7_2_value);		
						$("#input7_3_value").val(response.list.content.input7_3_value);		
					}		
					else if(response.list.templateType == 0)
					{
						$(":radio[name='input1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input1){
								$this.attr('checked', true);
							}						
						});	

						$(":radio[name='input2']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input2){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input3']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input3){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input4']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input6']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input6){
								$this.attr('checked', true);
							}						
						});							
						$("#input7").val(response.list.content.input7);		
					}
					else if(response.list.templateType == 4)
					{
						$(":radio[name='input1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input1){
								$this.attr('checked', true);
							}						
						});	

						$(":radio[name='input2']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input2){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input3']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input3){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input4']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input6']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input6){
								$this.attr('checked', true);
							}						
						});							
						$("#input7").val(response.list.content.input7);		
					}
					else if(response.list.templateType == 2)
					{						
						$("#input1").val(response.list.content.input1);		
					}					
					else if(response.list.templateType == 6)
					{
						//?????? ??? ?????? ????????????

						$('#input1_value').val(response.list.content.input1_value);
						$('#input2_value').val(response.list.content.input2_value);
						$('#input3_value').val(response.list.content.input3_value);
						$('#input4_value').val(response.list.content.input4_value);
						$('#input5_value').val(response.list.content.input5_value);
						$('#input6_value').val(response.list.content.input6_value);
						$('#input7_value').val(response.list.content.input7_value);
						$('#input8_1_value').val(response.list.content.input8_1_value);
						$('#input8_2_value').val(response.list.content.input8_2_value);		
						$('#input15_value').val(response.list.content.input15_value);
						$('#input11_value').val(response.list.content.input11_value);
						$('#input12_1_value').val(response.list.content.input12_1_value);
						$('#input12_2_value').val(response.list.content.input12_2_value);
						$(":radio[name='input9']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input9_value){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input10']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input10_value){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input16']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input16_value){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input13']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input13_value){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input14']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input14_value){
								$this.attr('checked', true);
							}						
						});
						if(response.list.content.input14_value == "O")
						{
							$(".radio9_1").show();
						}

					}
					else if(response.list.templateType == 7)
					{
						$("#previewImg").attr("src", response.list.content.input1_value);						
						$("#imgPathurl").val(response.list.content.input1_value);						
						$("#input2_value").val(response.list.content.input2_value);
						$("#input3_value").val(response.list.content.input3_value);
					}
					else if(response.list.templateType == 8)
					{
						$(":radio[name='input1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input1){
								$this.attr('checked', true);
							}						
						});	

						$(":radio[name='input2']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input2){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input3']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input3){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input4']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input6']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input6){
								$this.attr('checked', true);
							}						
						});							
						$("#input7").val(response.list.content.input7);		
					}
					else if(response.list.templateType == 10)
					{
						$("#input1").val(response.list.content.input1);		
					}
					else if(response.list.templateType == 11)
					{
						$(":radio[name='input1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input1_1){
								$this.attr('checked', true);
							}						
						});					
						if(response.list.content.input1_1 == "B")	
						{
							$(".selectType").show();
							$('#input_1_2').val(response.list.content.input_1_2);
						}
						$("#input2").val(response.list.content.input2);
						$("#input3").val(response.list.content.input3);

						$(":radio[name='input4']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input6']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input6){
								$this.attr('checked', true);
							}						
						});	
						$(":radio[name='input7']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input7){
								$this.attr('checked', true);
							}						
						});	
						if(response.list.content.input7 == "O")
						{
							$(".radio4_1").show();
						}
						if(response.list.content.input5 == "O")
						{
							$(".radio5_1").show();
						}
						$("#input8").val(response.list.content.input8);						
						$(":radio[name='input9']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input9){
								$this.attr('checked', true);
							}						
						});	

						$("#input10").val(response.list.content.input10);	
						$("#input11").val(response.list.content.input11);	
						$("#input12").val(response.list.content.input12);	
						$("#input13").val(response.list.content.input13);	
						$("#input14_1").val(response.list.content.input14_1);
						$("#input14_2").val(response.list.content.input14_2);
						$("#input15").val(response.list.content.input15);		
						$("#input16").val(response.list.content.input16);		
						$("#input17").val(response.list.content.input17);		
					}
					else if(response.list.templateType == 12)
					{						
						$("#input1_1").val(response.list.content.input1_1);		
						$("#input1_2").val(response.list.content.input1_2);		
						$("#input1_3").val(response.list.content.input1_3);		
						$("#input2_1").val(response.list.content.input2_1);		
						$("#input2_2").val(response.list.content.input2_2);		
						$("#input2_3").val(response.list.content.input2_3);		
						$("#input3_1").val(response.list.content.input3_1);		
						$("#input3_2").val(response.list.content.input3_2);		
						$("#input3_3").val(response.list.content.input3_3);		
						$(":radio[name='input4_1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4_1){
								$this.attr('checked', true);
							}						
						});
						if(response.list.content.input4_1 == '??????')
						{
							$("#input4_2").show();
							$("#input4_2").val(response.list.content.input4_2);
						}
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input6_1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input6_1){
								$this.attr('checked', true);
							}						
						});
						if(response.list.content.input6_1 == 'Y')
						{
							$(".input_7_area").show();
							$(":radio[name='input6_2']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.input6_2){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='input6_3']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.input6_3){
									$this.attr('checked', true);
								}						
							});
						}
						$(":radio[name='input7_1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input7_1){
								$this.attr('checked', true);
							}						
						});
						if(response.list.content.input7_1 == 'Y')
						{
							$(".input7_area").show();

							$(":radio[name='input7_2']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.input7_2){
									$this.attr('checked', true);
								}						
							});						
						}
						$(":radio[name='input8']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input8){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input9']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input9){
								$this.attr('checked', true);
							}						
						});
						if(response.list.content.input7_1 == 'Y')
						{
							$("#addForm").show();
							var input10 = response.list.content.input10;
							var temp1 = 0, temp2 = 0, temp3 = 0, temp4 = 0, temp5 = 0, temp6 = 0;

							for(var i = 0; i < input10.length; i++)
							{
								if(input10[i] == '???')
								{
									temp1 = 1;
								}
								if(input10[i] == '??????')
								{
									temp2 = 1;
								}
								if(input10[i] == '???/?????????')
								{
									temp3 = 1;
								}
								if(input10[i] == '???/??????/?????????')
								{
									temp4 = 1;
								}
								if(input10[i] == '??????')
								{
									temp5 = 1;
								}
								if(input10[i] == '??????/???')
								{
									temp6 = 1;
								}
							}
							$(".input10").each(function() {  
								var $this = $(this);  
								if($this.val() == '???' && temp1 == 1){
									$this.attr('checked', true);
								}						
								if($this.val() == '??????' && temp2 == 1){
									$this.attr('checked', true);
								}						
								if($this.val() == '???/?????????' && temp3 == 1){
									$this.attr('checked', true);
								}						
								if($this.val() == '???/??????/?????????' && temp4 == 1){
									$this.attr('checked', true);
								}						
								if($this.val() == '??????' && temp5 == 1){
									$this.attr('checked', true);
								}						
								if($this.val() == '??????/???' && temp6 == 1){
									$this.attr('checked', true);
								}						
							});						
							if(temp1 == 1)
							{						
								$("#db_neck").show();
							}
							if(temp2 == 1)
							{	
								$("#db_shoulder").show();
							}
							if(temp3 == 1)
							{	
								$("#db_arm").show();
							}
							if(temp4 == 1)
							{
								$("#db_hand").show();
							}
							if(temp5 == 1)
							{
								$("#db_back").show();
							}
							if(temp6 == 1)
							{
								$("#db_leg").show();
							}

							$(":radio[name='part_1_1_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_1_1_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_1_2_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_1_2_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_1_3_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_1_3_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_1_4_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_1_4_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_1_5_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_1_5_value){
									$this.attr('checked', true);
								}						
							});
							if(response.list.content.part_1_5_value == '??????')
							{
								$("#part_1_6_value").show();
								$("#part_1_6_value").val(response.list.content.part_1_6_value);
							}


							$(":radio[name='part_2_1_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_2_1_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_2_2_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_2_2_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_2_3_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_2_3_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_2_4_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_2_4_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_2_5_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_2_5_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_2_6_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_2_6_value){
									$this.attr('checked', true);
								}						
							});
							if(response.list.content.part_2_6_value == '??????')
							{
								$("#part_2_7_value").show();
								$("#part_2_7_value").val(response.list.content.part_2_7_value);
							}

							




							$(":radio[name='part_3_1_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_3_1_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_3_2_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_3_2_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_3_3_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_3_3_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_3_4_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_3_4_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_3_5_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_3_5_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_3_6_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_3_6_value){
									$this.attr('checked', true);
								}						
							});
							if(response.list.content.part_3_6_value == '??????')
							{
								$("#part_3_7_value").show();
								$("#part_3_7_value").val(response.list.content.part_3_7_value);
							}


							$(":radio[name='part_4_1_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_4_1_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_4_2_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_4_2_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_4_3_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_4_3_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_4_4_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_4_4_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_4_5_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_4_5_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_4_6_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_4_6_value){
									$this.attr('checked', true);
								}						
							});
							if(response.list.content.part_4_6_value == '??????')
							{
								$("#part_4_7_value").show();
								$("#part_4_7_value").val(response.list.content.part_4_7_value);
							}


							$(":radio[name='part_5_1_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_5_1_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_5_2_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_5_2_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_5_3_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_5_3_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_5_4_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_5_4_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_5_5_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_5_5_value){
									$this.attr('checked', true);
								}						
							});
							if(response.list.content.part_5_5_value == '??????')
							{
								$("#part_5_6_value").show();
								$("#part_5_6_value").val(response.list.content.part_5_6_value);
							}


							$(":radio[name='part_6_1_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_6_1_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_6_2_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_6_2_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_6_3_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_6_3_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_6_4_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_6_4_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_6_5_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_6_5_value){
									$this.attr('checked', true);
								}						
							});
							$(":radio[name='part_6_6_value']").each(function() {  
								var $this = $(this);  
								if($this.val() == response.list.content.part_6_6_value){
									$this.attr('checked', true);
								}						
							});
							if(response.list.content.part_6_6_value == '??????')
							{
								$("#part_6_7_value").show();
								$("#part_6_7_value").val(response.list.content.part_6_7_value);
							}							
						}
					}
					else if(response.list.templateType == 13)
					{
						/*
						$(":radio[name='input1']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input1){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input2']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input2){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input3']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input3){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input4']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input4){
								$this.attr('checked', true);
							}						
						});
						$(":radio[name='input5']").each(function() {  
							var $this = $(this);  
							if($this.val() == response.list.content.input5){
								$this.attr('checked', true);
							}						
						});						
						$("#input6").val(response.list.content.input6);
						$("#input7").val(response.list.content.input7);
						$("#input8").val(response.list.content.input8);
						$("#input9").val(response.list.content.input9);
						$("#input10").val(response.list.content.input10);
						$("#input11").val(response.list.content.input11);
						*/
						$("#previewImg").attr("src", response.list.content.imgPathurl);						
						$("#imgPathurl").val(response.list.content.imgPathurl);		
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




var signature = '';

var safety_write = (function () {
  
	return {
		get_data: function () {
			var key				 = $('#key').val();
			var docId			 = $('#docId').val();
			var templateType	 = $('#templateType').val();			
			run_progress();			
			$.ajax({
				type: 'POST',
				url: '/controller/safety_modify.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_data', 'key' : key, 'docId' : docId, 'templateType' : templateType },
				success: function (response) {
					stop_progress();
					console.log(key);
					console.log(response);
					console.log(docId);
					console.log(templateType);
					
					if (response.result) {
						if (templateType == '0' || templateType == '4' ) {
							//???????????????
						} else if (templateType == '1' || templateType == '5' || templateType == '9' ) {
							//?????????????????? ?????????
							console.log(response);
							if (response.status == 0) {
								signature = response.info.path;
							} else {
								alert('????????? ???????????? ????????????1???.');
								history.back();
							}
						} else if (templateType == '2') {
							//?????????????????? ?????????
						} else if (templateType == '3' || templateType == '6' ) {
							//?????? ??? ?????? ????????????
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

//?????????????????? ?????? ?????????
$('#add_form').on('submit', function () {
	var key				 = $('#key').val();
	var site_name		 = $('#site_name').val();
	var docId			 = $('#docId').val();
	var templateType	 = $('#templateType').val();
	var myCompanyId	 	= $('#myCompanyId').val();


	if (templateType == '0') {
		//???????????????
		var input1_name	 = $('#input1_name').text();
		var input1		 = $('input:radio[name="input1"]:checked').val();
		var input2_name	 = $('#input2_name').text();
		var input2		 = $('input:radio[name="input2"]:checked').val();
		var input3_name	 = $('#input3_name').text();
		var input3		 = $('input:radio[name="input3"]:checked').val();
		var input4_name	 = $('#input4_name').text();
		var input4		 = $('input:radio[name="input4"]:checked').val();
		var input5_name	 = $('#input5_name').text();
		var input5		 = $('input:radio[name="input5"]:checked').val();
		var input6_name	 = $('#input6_name').text();
		var input6		 = $('input:radio[name="input6"]:checked').val();
		var input7_name	 = $('#input7_name').text();
		var input7		 = $('#input7').val();

		if (!input1) {
			alert(input1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input2) {
			alert(input2_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input6) {
			alert(input6_name+' '+_lc['txt']['???????????????']);
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
		//?????????????????? ?????????
		if (!signature) {
			alert(_lc['alert']['????????????????????????????????????']);
			return false;
		}

		var content = { "signature" : signature }
	} else if (templateType == '2') {
		//?????????????????? ?????????
		var input1_name	 = $('#input1_name').text();
		var input1		 = $('#input1').val();

		if (parseInt(input1) < 0 || parseInt(input1) > 100) {
			alert(_lc['alert']['???????????????????????????????????????????????????????????????']);
			return false;
		}

		var content = { 
			"input1_name"	 : input1_name,
			"input1"		 : input1
		}
	} else if (templateType == '3') {
		//?????? ??? ?????? ????????????
		var input1_name		 = $('#input1_name').text();
		var input1			 = $('input:radio[name="input1"]:checked').val();
		var input2_name		 = $('#input2_name').text();
		var input2			 = $('input:radio[name="input2"]:checked').val();
		var input3_name		 = $('#input3_name').text();
		var input3			 = $('input:radio[name="input3"]:checked').val();
		var input4_name		 = $('#input4_name').text();
		var input4			 = $('input:radio[name="input4"]:checked').val();
		var input4_1_name	 = $('#input4_1_name').text();
		var input4_1_value	 = $('#input4_1_value').val();
		var input5_name		 = $('#input5_name').text();
		var input5			 = $('input:radio[name="input5"]:checked').val();
		var input5_1_name	 = $('#input5_1_name').text();
		var input5_1_value	 = $('#input5_1_value').val();
		var input6_1_name	 = $('#input6_1_name').text();
		var input6_1_value	 = $('#input6_1_value').val();
		var input6_2_name	 = $('#input6_2_name').text();
		var input6_2_value	 = $('#input6_2_value').val();
		var input6_3_name	 = $('#input6_3_name').text();
		var input6_3_value	 = $('#input6_3_value').val();
		var input7_1_name	 = $('#input7_1_name').text();
		var input7_1_value	 = $('#input7_1_value').val();
		var input7_2_name	 = $('#input7_2_name').text();
		var input7_2_value	 = $('#input7_2_value').val();
		var input7_3_name	 = $('#input7_3_name').text();
		var input7_3_value	 = $('#input7_3_value').val();

		if (!input1) {
			alert(input1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input2) {
			alert(input2_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['???????????????']);
			return false;
		} else if (input4 == 'O' && !input4_1_value) {
			alert(input4_1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['???????????????']);
			return false;
		} else if (input5 == 'O' && !input5_1_value) {
			alert(input5_1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input6_1_value) {
			alert(input6_1_name+' '+_lc['txt']['???????????????']);
			$('#input6_1_value').focus();
			return false;
		}
		if (!input6_2_value) {
			alert(input6_2_name+' '+_lc['txt']['???????????????']);
			$('#input6_2_value').focus();
			return false;
		}
		if (!input6_3_value) {
			alert(input6_3_name+' '+_lc['txt']['???????????????']);
			$('#input6_3_value').focus();
			return false;
		}
		if (!input7_1_value) {
			alert(input7_1_name+' '+_lc['txt']['???????????????']);
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
		//???????????????
		var input1_name	 = $('#input1_name').text();
		var input1		 = $('input:radio[name="input1"]:checked').val();
		var input2_name	 = $('#input2_name').text();
		var input2		 = $('input:radio[name="input2"]:checked').val();
		var input3_name	 = $('#input3_name').text();
		var input3		 = $('input:radio[name="input3"]:checked').val();
		var input4_name	 = $('#input4_name').text();
		var input4		 = $('input:radio[name="input4"]:checked').val();
		var input5_name	 = $('#input5_name').text();
		var input5		 = $('input:radio[name="input5"]:checked').val();
		var input6_name	 = $('#input6_name').text();
		var input6		 = $('input:radio[name="input6"]:checked').val();
		var input7_name	 = $('#input7_name').text();
		var input7		 = $('#input7').val();

		if (!input1) {
			alert(input1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input2) {
			alert(input2_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input6) {
			alert(input6_name+' '+_lc['txt']['???????????????']);
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
		//?????????????????? ?????????
		if (!signature) {
			alert(_lc['alert']['????????????????????????????????????']);
			return false;
		}

		var content = { "signature" : signature }
	} else if (templateType == '6') {
		
		//?????? ??? ?????? ????????????
		var input1_name	 = $('#input1_name').text();
		var input1_value	 = $('#input1_value').val();
		var input2_name	 = $('#input2_name').text();
		var input2_value	 = $('#input2_value').val();
		var input3_name	 = $('#input3_name').text();
		var input3_value	 = $('#input3_value').val();
		var input4_name	 = $('#input4_name').text();
		var input4_value	 = $('#input4_value').val();
		var input5_name	 = $('#input5_name').text();
		var input5_value	 = $('#input5_value').val();
		var input6_name	 = $('#input6_name').text();
		var input6_value	 = $('#input6_value').val();
		var input7_name	 = $('#input7_name').text();
		var input7_value	 = $('#input7_value').val();
		var input8_name	 = $('#input8_name').text();
		var input8_1_value	 = $('#input8_1_value').val();
		var input8_2_value	 = $('#input8_2_value').val();		
		var input9_name		 = $('#input9_name').text();
		var input9_value	 = $('input:radio[name="input9"]:checked').val();
		var input10_name		 = $('#input10_name').text();
		var input10_value	 = $('input:radio[name="input10"]:checked').val();
		var input11_name	 = $('#input11_name').text();
		var input11_value	 = $('#input11_value').val();
		var input12_name	 = $('#input12_name').text();
		var input12_1_value	 = $('#input12_1_value').val();
		var input12_2_value	 = $('#input12_2_value').val();
		var input13_name	 = $('#input13_name').text();
		var input13_value	 = $('input:radio[name="input13"]:checked').val();
		var input14_name	 = $('#input14_name').text();
		var input14_value	 = $('input:radio[name="input14"]:checked').val();
		var input15_name	 = $('#input15_name').text();
		var input15_value	 = $('#input15_value').val();
		var input16_name	 = $('#input16_name').text();
		var input16_value	 = $('input:radio[name="input16"]:checked').val();
		if (!input1_value) {
			alert(input1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		/*
		if (!input2_value) {
			alert(input2_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		*/
		if (!input3_value) {
			alert(input3_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input4_value) {
			alert(input4_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input5_value) {
			alert(input5_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input6_value) {
			alert(input6_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input7_value) {
			alert(input7_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input8_1_value) {
			alert(input8_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input8_2_value) {
			alert(input8_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input9_value) {
			alert(input9_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input10_value) {
			alert(input10_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		/*
		if (!input11_value) {
			alert(input11_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		*/
		if (!input12_1_value) {
			alert(input12_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input12_2_value) {
			alert(input12_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input13_value) {
			alert(input13_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input14_value) {
			alert(input14_name+' '+_lc['txt']['???????????????']);
			return false;
		}else if (input14_value == 'O' && !input15_value) {
			alert(input15_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input16_value) {
			alert(input16_name+' '+_lc['txt']['???????????????']);
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
		//?????? ??? ?????? ????????????
		var input1_name		 = '???????????? ?????? ??????';
		var input1_value 	 = $('#imgPathurl').val();
		var input2_name		 = $('#input2_name').text();
		var input2_value	 = $('#input2_value').val();
		var input3_name		 = $('#input3_name').text();
		var input3_value	 = $('#input3_value').val();
		if (!input1_value) {
			alert(input1_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input2_value) {
			alert(input2_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input3_value) {
			alert(input3_name+' '+_lc['txt']['???????????????']);
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
		//???????????????
		var input1_name	 = $('#input1_name').text();
		var input1		 = $('input:radio[name="input1"]:checked').val();
		var input2_name	 = $('#input2_name').text();
		var input2		 = $('input:radio[name="input2"]:checked').val();
		var input3_name	 = $('#input3_name').text();
		var input3		 = $('input:radio[name="input3"]:checked').val();
		var input4_name	 = $('#input4_name').text();
		var input4		 = $('input:radio[name="input4"]:checked').val();
		var input5_name	 = $('#input5_name').text();
		var input5		 = $('input:radio[name="input5"]:checked').val();
		var input6_name	 = $('#input6_name').text();
		var input6		 = $('input:radio[name="input6"]:checked').val();
		var input7_name	 = $('#input7_name').text();
		var input7		 = $('#input7').val();
		if (!input1) {
			alert(input1_name+' '+_lc['txt']['???????????????']);
			return false;
		}

		if (!input2) {
			alert(input2_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input3) {
			alert(input3_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input4) {
			alert(input4_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input5) {
			alert(input5_name+' '+_lc['txt']['???????????????']);
			return false;
		}
		if (!input6) {
			alert(input6_name+' '+_lc['txt']['???????????????']);
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
		if(!$("#ag_1").is(":checked"))
		{
			alert("??????????????????????????? ??????????????????");
			return false;
		}
		if(!$("#ag_2").is(":checked"))
		{
			alert("???????????? ??????(???????????????)??? ??????????????????");
			return false;
		}
		if(!$("#ag_3").is(":checked"))
		{
			alert("???????????? ??????(????????????)??? ??????????????????");
			return false;
		}

		if(!$("#ag_4").is(":checked"))
		{
			alert("???????????? ??????????????? ??????????????????");
			return false;
		}
		if(!$("#ag_5").is(":checked"))
		{
			alert("????????? ?????????????????? ??????????????????");
			return false;
		}
		if(!$("#ag_6").is(":checked"))
		{
			alert("????????? 2??? ???????????? ??????????????????");
			return false;
		}	
		
		//?????????????????? ?????????
		if (!signature) {
			alert(_lc['alert']['????????????????????????????????????']);
			return false;
		}
		var content = { "signature" : signature }
	}
	else if (templateType == '10') {
		//?????????????????? ?????????
		var input1_name	 = $('#input1_name').text();
		var input1		 = $('#input1').val();
		if (parseInt(input1) < 0 || parseInt(input1) > 100) {
			alert(_lc['alert']['???????????????????????????????????????????????????????????????']);
			return false;
		}
		var content = { 
			"input1_name"	 : input1_name,
			"input1"		 : input1
		}
	}
	else if (templateType == '11') {
		var input1_name	 	 = $('#input1_name').text();	
		var input1_1		 = $('input:radio[name="input1"]:checked').val();
		var input1_2		 = $('#input_1_2').val();	
		var input2_name		 = $('#input2_name').text();
		var input2	 	 	 = $('#input2').val();
		var input3_name		 = $('#input3_name').text();
		var input3	 	 	 = $('#input3').val();
		var input4_name		 = $('#input4_name').text();
		var input4	 	 	 = $('input:radio[name="input4"]:checked').val();
		var input5_name		 = $('#input5_name').text();
		var input5	 	 	 = $('input:radio[name="input5"]:checked').val();
		var input6_name		 = $('#input6_name').text();
		var input6	 	 	 = $('input:radio[name="input6"]:checked').val();
		var input7_name		 = $('#input7_name').text();
		var input7	 	 	 = $('input:radio[name="input7"]:checked').val();
		var input8_name		 = $('#input8_name').text();
		var input8	 	 	 = $('#input8').val();
		var input9_name		 = $('#input9_name').text();
		var input9	 	 	 = $('input:radio[name="input9"]:checked').val();
		var input10_name	 = $('#input10_name').text();
		var input10	 	 	 = $('#input10').val();		
		var input11_name	 = $('#input11_name').text();
		var input11	 	 	 = $('#input11').val();
		var input12_name	 = $('#input12_name').text();
		var input12	 	 	 = $('#input12').val();
		var input13_name	 = $('#input13_name').text();
		var input13	 	 	 = $('#input13').val();
		var input14_name	 = $('#input14_name').text();
		var input14_1	 	 = $('#input14_1').val();
		var input14_2	 	 = $('#input14_2').val();
		var input15_name	 = $('#input15_name').text();
		var input15	 	 	 = $('#input15').val();
		var input16_name	 = $('#input16_name').text();
		var input16	 	 	 = $('#input16').val();
		var input17_name	 = $('#input17_name').text();
		var input17	 	 	 = $('#input17').val();
		if(!input1_1)
		{
			alert(input1_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(input1_1 == "B" && !input1_2)
		{
			alert(input1_2.attr("placeholder")+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input2)
		{
			alert(input2_name+' '+_lc['txt']['???????????????']);			
			return false;
		}

		if(!input4)
		{
			alert(input4_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input5)
		{
			alert(input5_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input6)
		{
			alert(input6_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input7)
		{
			alert(input7_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(input7 == "O" && !input8)
		{
			alert(input7_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input9)
		{
			alert(input9_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(input5 == "O" && !input10)
		{
			alert(input10_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input11)
		{
			alert(input11_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input12)
		{
			alert(input12_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input13)
		{
			alert(input13_name+' '+_lc['txt']['???????????????']);			
			return false;
		}

		if(!input14_1)
		{
			alert(input14_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input14_2)
		{
			alert(input14_name+' '+_lc['txt']['???????????????']);			
			return false;
		}

		if(!input15)
		{
			alert(input15_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input16)
		{
			alert(input16_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input17)
		{
			alert(input17_name+' '+_lc['txt']['???????????????']);			
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
		var input1_name		 = $('#input1_name').text();	
		var input1_1		 = $('#input1_1').val();	
		var input1_2		 = $('#input1_2').val();	
		var input1_3		 = $('#input1_3').val();	

		if(!input1_1)
		{
			alert(input1_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input1_2)
		{
			alert(input1_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input1_3)
		{
			alert(input1_name+' '+_lc['txt']['???????????????']);			
			return false;
		}



		var input2_name	 	 = $('#input2_name').text();	
		var input2_1		 = $('#input2_1').val();	
		var input2_2		 = $('#input2_2').val();	
		var input2_3		 = $('#input2_3').val();	
		if(!input2_1)
		{
			alert(input2_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input2_2)
		{
			alert(input2_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input2_3)
		{
			alert(input2_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		var input3_name	 	 = $('#input3_name').text();	
		var input3_1		 = $('#input3_1').val();	
		var input3_2		 = $('#input3_2').val();	
		var input3_3		 = $('#input3_3').val();	
		if(!input3_1)
		{
			alert(input3_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input3_2)
		{
			alert(input3_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(!input3_3)
		{
			alert(input3_name+' '+_lc['txt']['???????????????']);			
			return false;
		}

		var input4_name	 	 = $('#input4_name').text();	
		var input4_1		 = $('input:radio[name="input4_1"]:checked').val();
		var input4_2		 = $('#input4_2').val();	
		if(!input4_1)
		{
			alert(input4_name+' '+_lc['txt']['???????????????']);			
			return false;
		}		
		var input5_name		 = $('#input5_name').text();	
		var input5		 	 = $('input:radio[name="input5"]:checked').val();

		if(!input5)
		{
			alert(input5_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
	
		var input6_name		 = $('#input6_name').text();	
		var input6_1		 = $('input:radio[name="input6_1"]:checked').val();
		var input6_2		 = $('input:radio[name="input6_2"]:checked').val();
		var input6_3		 = $('input:radio[name="input6_3"]:checked').val();

		if(!input6_1)
		{
			alert(input6_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(input6_1 == "Y" && !input6_2)
		{
			alert(input6_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(input6_1 == "Y" && !input6_3)
		{
			alert(input6_name+' '+_lc['txt']['???????????????']);			
			return false;
		}

		var input7_name		 = $('#input7_name').text();	
		var input7_1		 = $('input:radio[name="input7_1"]:checked').val();
		var input7_2		 = $('input:radio[name="input7_2"]:checked').val();
		if(!input7_1)
		{
			alert(input7_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		if(input7_1 == "Y" && !input7_2)
		{
			alert(input7_name+' '+_lc['txt']['???????????????']);			
			return false;
		}


		var input8_name		 = $('#input8_name').text();	
		var input8		 	 = $('input:radio[name="input8"]:checked').val();


		if(!input8)
		{
			alert(input5input8_name_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		var input9_name		 = $('#input9_name').text();	
		var input9		 	 = $('input:radio[name="input9"]:checked').val();
		if(!input9)
		{
			alert(input9_name+' '+_lc['txt']['???????????????']);			
			return false;
		}
		
		var input10_name	 = $('#input10_name').text();		
		var input10 = new Array();		
		$(".input10").each(function() { 			
			if($(this).is(":checked"))
			{
				input10.push($(this).val());
			}			
		});	
		if(input9 == "Y" && input10.length == 0)
		{
			alert(input10_name+' '+_lc['txt']['???????????????']);			
			return false;
		}











		var part_1_1_value = $('input:radio[name="part_1_1_value"]:checked').val();
		var part_1_2_value = $('input:radio[name="part_1_2_value"]:checked').val();
		var part_1_3_value = $('input:radio[name="part_1_3_value"]:checked').val();
		var part_1_4_value = $('input:radio[name="part_1_4_value"]:checked').val();
		var part_1_5_value = $('input:radio[name="part_1_5_value"]:checked').val();
		var part_1_6_value = $("#part_1_6_value").val();
		var part_2_1_value = $('input:radio[name="part_2_1_value"]:checked').val();
		var part_2_2_value = $('input:radio[name="part_2_2_value"]:checked').val();
		var part_2_3_value = $('input:radio[name="part_2_3_value"]:checked').val();
		var part_2_4_value = $('input:radio[name="part_2_4_value"]:checked').val();
		var part_2_5_value = $('input:radio[name="part_2_5_value"]:checked').val();
		var part_2_6_value = $('input:radio[name="part_2_6_value"]:checked').val();
		var part_2_7_value = $("#part_2_7_value").val();
		var part_3_1_value = $('input:radio[name="part_3_1_value"]:checked').val();
		var part_3_2_value = $('input:radio[name="part_3_2_value"]:checked').val();
		var part_3_3_value = $('input:radio[name="part_3_3_value"]:checked').val();
		var part_3_4_value = $('input:radio[name="part_3_4_value"]:checked').val();
		var part_3_5_value = $('input:radio[name="part_3_5_value"]:checked').val();
		var part_3_6_value = $('input:radio[name="part_3_6_value"]:checked').val();
		var part_3_7_value = $("#part_3_7_value").val();
		var part_4_1_value = $('input:radio[name="part_4_1_value"]:checked').val()
		var part_4_2_value = $('input:radio[name="part_4_2_value"]:checked').val()
		var part_4_3_value = $('input:radio[name="part_4_3_value"]:checked').val()
		var part_4_4_value = $('input:radio[name="part_4_4_value"]:checked').val()
		var part_4_5_value = $('input:radio[name="part_4_5_value"]:checked').val()
		var part_4_6_value = $('input:radio[name="part_4_6_value"]:checked').val()
		var part_4_7_value = $("#part_4_7_value").val();
		var part_5_1_value = $('input:radio[name="part_5_1_value"]:checked').val()
		var part_5_2_value = $('input:radio[name="part_5_2_value"]:checked').val()
		var part_5_3_value = $('input:radio[name="part_5_3_value"]:checked').val()
		var part_5_4_value = $('input:radio[name="part_5_4_value"]:checked').val()
		var part_5_5_value = $('input:radio[name="part_5_5_value"]:checked').val()
		var part_5_6_value = $("#part_5_6_value").val();
		var part_6_1_value = $('input:radio[name="part_6_1_value"]:checked').val()
		var part_6_2_value = $('input:radio[name="part_6_2_value"]:checked').val()
		var part_6_3_value = $('input:radio[name="part_6_3_value"]:checked').val()
		var part_6_4_value = $('input:radio[name="part_6_4_value"]:checked').val()
		var part_6_5_value = $('input:radio[name="part_6_5_value"]:checked').val()
		var part_6_6_value = $('input:radio[name="part_6_6_value"]:checked').val()
		var part_6_7_value = $("#part_6_7_value").val();
		var part_1_1	   = $("#part_1_1").text();
		var part_1_2	   = $("#part_1_2").text();
		var part_1_3	   = $("#part_1_3").text();
		var part_1_4	   = $("#part_1_4").text();
		var part_1_5	   = $("#part_1_5").text();
		var part_1_6	   = $("#part_1_6").text();
		var part_2_1	   = $("#part_2_1").text();
		var part_2_2	   = $("#part_2_2").text();
		var part_2_3	   = $("#part_2_3").text();
		var part_2_4	   = $("#part_2_4").text();
		var part_2_5	   = $("#part_2_5").text();
		var part_2_6	   = $("#part_2_6").text();
		var part_2_7	   = $("#part_2_7").text();
		var part_3_1	   = $("#part_3_1").text();
		var part_3_2	   = $("#part_3_2").text();
		var part_3_3	   = $("#part_3_3").text();
		var part_3_4	   = $("#part_3_4").text();
		var part_3_5	   = $("#part_3_5").text();
		var part_3_6	   = $("#part_3_6").text();
		var part_3_7	   = $("#part_3_7").text();
		var part_4_1	   = $("#part_4_1").text();
		var part_4_2	   = $("#part_4_2").text();
		var part_4_3	   = $("#part_4_3").text();
		var part_4_4	   = $("#part_4_4").text();
		var part_4_5	   = $("#part_4_5").text();
		var part_4_6	   = $("#part_4_6").text();
		var part_4_7	   = $("#part_4_7").text();
		var part_5_1	   = $("#part_5_1").text();
		var part_5_2	   = $("#part_5_2").text();
		var part_5_3	   = $("#part_5_3").text();
		var part_5_4	   = $("#part_5_4").text();
		var part_5_5	   = $("#part_5_5").text();
		var part_5_6	   = $("#part_5_6").text();
		var part_6_1	   = $("#part_6_1").text();
		var part_6_2	   = $("#part_6_2").text();
		var part_6_3	   = $("#part_6_3").text();
		var part_6_4	   = $("#part_6_4").text();
		var part_6_5	   = $("#part_6_5").text();
		var part_6_6	   = $("#part_6_6").text();
		var part_6_7	   = $("#part_6_7").text();
		if(input9 == "Y")
		{

		
		
			var temp1, temp2, temp3, temp4, temp5, temp6 = 0;

			for(var i = 0; i < input10.length; i++)
			{
				if(input10[i] == '???')
				{
					temp1 = 1;
				}
				if(input10[i] == '??????')
				{
					temp2 = 1;
				}
				if(input10[i] == '???/?????????')
				{
					temp3 = 1;
				}
				if(input10[i] == '???/??????/?????????')
				{
					temp4 = 1;
				}
				if(input10[i] == '??????')
				{
					temp5 = 1;
				}
				if(input10[i] == '??????/???')
				{
					temp6 = 1;
				}

			}
			console.log(input10);
			if(input10.length > 0)
			{
				if(temp1 == 1)
				{
					console.log(1);
					if(!part_1_1_value)
					{
						alert(part_1_1+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_1_2_value)
					{
						alert(part_1_2+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_1_3_value)
					{
						alert(part_1_3+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_1_4_value)
					{
						alert(part_1_4+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_1_5_value)
					{
						alert(part_1_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
			
					
				}
				if(temp2 == 1)
				{
					console.log(2);
					if(!part_2_1_value)
					{
						alert(part_2_1+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_2_2_value)
					{
						alert(part_2_2+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_2_3_value)
					{
						alert(part_2_3+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_2_4_value)
					{
						alert(part_2_4+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_2_5_value)
					{
						alert(part_2_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_2_6_value)
					{
						alert(part_2_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
				}
				if(temp3 == 1)
				{
					console.log(3);
					if(!part_3_1_value)
					{
						alert(part_3_1+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_3_2_value)
					{
						alert(part_3_2+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_3_3_value)
					{
						alert(part_3_3+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_3_4_value)
					{
						alert(part_3_4+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_3_5_value)
					{
						alert(part_3_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_3_6_value)
					{
						alert(part_3_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
				}
				if(temp4 == 1)
				{
					console.log(4);
					if(!part_4_1_value)
					{
						alert(part_4_1+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_4_2_value)
					{
						alert(part_4_2+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_4_3_value)
					{
						alert(part_4_3+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_4_4_value)
					{
						alert(part_4_4+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_4_5_value)
					{
						alert(part_4_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_4_6_value)
					{
						alert(part_4_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
				}
				if(temp5 == 1)
				{
					console.log(5);
					if(!part_5_1_value)
					{
						alert(part_5_1+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_5_2_value)
					{
						alert(part_5_2+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_5_3_value)
					{
						alert(part_5_3+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_5_4_value)
					{
						alert(part_5_4+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_5_5_value)
					{
						alert(part_2_5+' '+_lc['txt']['???????????????']);			
						return false;
					}

				}
				if(temp6 == 1)
				{
					console.log(6);
					if(!part_6_1_value)
					{
						alert(part_6_1+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_6_2_value)
					{
						alert(part_6_2+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_6_3_value)
					{
						alert(part_6_3+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_6_4_value)
					{
						alert(part_6_4+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_6_5_value)
					{
						alert(part_6_5+' '+_lc['txt']['???????????????']);			
						return false;
					}
					if(!part_6_6_value)
					{
						alert(part_6_5+' '+_lc['txt']['???????????????']);			
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
		var imgPathurl 	 	 = $('#imgPathurl').val();

		if(!imgPathurl)
		{
			alert('??? ???????????? ?????? ????????? ????????? ?????????');			
			return false;
		}
		var content = {			
			"imgPathurl"	:	imgPathurl
		};
	}
	run_progress();	
	$.ajax({
		type: 'POST',
		url: '/controller/safety_modify.php',
		dataType: 'json',
		cache: false,
		data: { 'module' : 'add_form', 'key' : key, 'docId' : docId, 'templateType' : templateType, 'content' : content, 'myCompanyId' : myCompanyId },
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

//???????????? ???????????? ?????? ?????????
/*$('input:radio[name="input4"]').on('click', function () {
	var value = $('input:radio[name="input4"]:checked').val();

	if (value == 'O') {
		$('.radio4_1').show();
	} else {
		$('#radio4_1_value').val('');
		$('.radio4_1').hide();
	}
});*/


//???????????? ???????????? ?????? ?????????
$('.oldForm input:radio[name="input7"]').on('click', function () {
	var value = $('.oldForm input:radio[name="input7"]:checked').val();

	if (value == 'O') {
		$('.radio4_1').show();
	} else {
		$('#radio4_1_value').val('');
		$('.radio4_1').hide();
	}
});

//???????????? ?????? ?????????
$('.oldForm input:radio[name="input5"]').on('click', function () {
	var value = $('input:radio[name="input5"]:checked').val();

	if (value == 'O') {
		$('.radio5_1').show();
	} else {
		$('#radio5_1_value').val('');
		$('.radio5_1').hide();
	}
});


//???????????? ?????? ?????????
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
					// ie ??????
					_this.replaceWith(_this.clone(true));
				} else { 
					// other browser ?????? 
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
//???????????? ?????? ?????????
$('#back_btn').on('click', function () {
	popOpenAndDim('checkLeave', true);
});

//???????????? ?????????
$('#back_run_btn').on('click', function () {
	location.href = document.referrer;
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
	if($(this).val() == '??????')
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
		$("input:radio[name='input6_2']").removeAttr("checked");
		$("input:radio[name='input6_3']").removeAttr("checked");



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
	if($(this).val() == '??????')
	{
		$("#part_1_6_value").show();
	}
	else
	{
		$("#part_1_6_value").hide();
	}
});
$('input:radio[name="part_2_6_value"]').on('click', function () {
	if($(this).val() == '??????')
	{
		$("#part_2_7_value").show();
	}
	else
	{
		$("#part_2_7_value").hide();
	}
});

$('input:radio[name="part_3_6_value"]').on('click', function () {
	if($(this).val() == '??????')
	{
		$("#part_3_7_value").show();
	}
	else
	{
		$("#part_3_7_value").hide();
	}
});


$('input:radio[name="part_4_6_value"]').on('click', function () {
	if($(this).val() == '??????')
	{
		$("#part_4_7_value").show();
	}
	else
	{
		$("#part_4_7_value").hide();
	}
});

$('input:radio[name="part_5_5_value"]').on('click', function () {
	if($(this).val() == '??????')
	{
		$("#part_5_6_value").show();
	}
	else
	{
		$("#part_5_6_value").hide();
	}
});

$('input:radio[name="part_6_6_value"]').on('click', function () {
	if($(this).val() == '??????')
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


$(document).ready(function () {
	var templateType = $('#templateType').val();

	if (templateType == '1' || templateType == '5' || templateType == '9') {
		safety_write.get_data();
	}
});



$(document).ready(function () {
	safety_data.get_data();




	$(".input10").change(function(){	
		$(".input10").each(function() { 	
	
			var area;
			if($(this).val() == "???")
			{
				area = "db_neck";
			}
			else if($(this).val() == "??????")
			{
				area = "db_shoulder";
			}
			else if($(this).val() == "???/?????????")
			{
				area = "db_arm";
			}
			else if($(this).val() == "???/??????/?????????")
			{
				area = "db_hand";
			}
			else if($(this).val() == "??????")
			{
				area = "db_back";
			}
			else if($(this).val() == "??????/???")
			{
				area = "db_leg";
			}
			if($(this).is(":checked"))
			{
				$("#"+area).show();
			}
			else
			{
				$("#"+area).hide();
			}
			
			
		});
	});
});