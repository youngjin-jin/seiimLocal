var upload_mode = link_img = '';
var mode = "";
var mode_val = "";
var colorArray = [
    'rgba(0, 33, 255, 0.6)',
    'rgba(210, 1, 1, 0.6)',
    'rgba(43, 212, 1, 0.6)',
    'rgba(8, 179, 154, 0.6)',
    'rgba(179, 8, 174, 0.6)',
    'rgba(115, 221, 34, 0.6)',
    'rgba(34, 178, 221, 0.6)',
    'rgba(37, 35, 118, 0.6)',
    'rgba(90, 35, 118, 0.6)',
    'rgba(113, 118, 35, 0.6)',
    'rgba(118, 45, 28, 0.6)',
    'rgba(237, 211, 27, 0.6)'
];
var edu_status = (function () {
  
	return {
		init : function() {
			run_progress();
            

            $.ajax({
				type: 'POST',
				url: '/controller/worker_edu_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_profile', 'id' : $("#accId").val() },
				success: function (response) {
					stop_progress();
                    console.log(response);
					if (response.result) {
                        if(response.accoutnData.profile)
                        {
                            $(".profile_img").css({"background-image":"url("+response.accoutnData.profile+")"});
                        }
                        else
                        {       
                            $(".profile_img").css({"background-image":"url(../img/no_image_150_150.jpg)"});
                        }
                        $("#name").html(response.accoutnData.name);
                        $("#birth").html(response.accoutnData.birth.substr(0, 10));

                        var chartData = [];
                        var labelData = [];
                        var eduTime = response.eduTime[0];                    
                        var eduTempTime = 0;                    
                        var label_html = "";
                        for(var i = 0; i < eduTime.length; i++)
                        {
                            eduTempTime = Number(eduTempTime) + Number(eduTime[i].eduTime2);
                            chartData.push(eduTime[i].eduTime2);   
                            labelData.push(eduTime[i].category_1_name);   
                            label_html += '<div class="ChartLabel"><p class="left"><span class="square" style="background-color:'+colorArray[i]+'"></span> <span class="studyname">'+eduTime[i].category_1_name+'</span></p>';
                            label_html += '<p class="right">: 누계 '+calTime2(eduTime[i].eduTime2)+'</p></div>';
                        }        
                        $("#chartlabel").html(label_html);           
                        calTime(eduTempTime);  
                        $("#siteCnt").html(response.userSite[0].length);             
                        $('#myChart').remove(); // this is my <canvas> element
                        $('.graphIn').append('<canvas id="myChart" width="" height="200" style="width:100%"></canvas>');
                                   
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labelData,
                                datasets: [{
                                    label: '# of Votes',
                                    data: chartData,
                                    backgroundColor: colorArray,
                                    borderColor: colorArray,
                                    borderWidth: 0,
                                    hoverOffset: 5,
                                }]
                            },
                            options: {
                                responsive: false,
                                
                                plugins: {
                                    legend: {
                                    display:false,
                                    position: 'left',
                                    font:{
                                        size:8,

                                    }
                                    },

                                    title: {
                                    display: false,

                                    text: 'Chart.js Pie Chart'
                                    },
                                    
                                }
                            }
                        });
                        
						
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});
		},
        get_site: function() {
            run_progress();
            $.ajax({
				type: 'POST',
				url: '/controller/worker_edu_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_site', 'id' : $("#accId").val() },
				success: function (response) {
					stop_progress();
					if (response.result) {
                        var options = "";
                        var userSite = response.userSite[0];
                        for(var i = 0; i < userSite.length; i++)
                        {
                            options += "<option value='"+userSite[i].id+"'>"+userSite[i].name+"</option>";
                        }
                        $("#filter_site").empty();
                        $("#filter_site").append(options);
                        $("#filter_site").show();
                        
                        mode_val = $('#filter_site option:eq(0)').val();
                        edu_status.search();


					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});   
        },
        get_company: function() {
            run_progress();
            $.ajax({
				type: 'POST',
				url: '/controller/worker_edu_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'get_company', 'id' : $("#accId").val() },
				success: function (response) {
					stop_progress();
					if (response.result) {
                        var options = "";
                        var companyData = response.companyData[0];                        
                        for(var i = 0; i < companyData.length; i++)
                        {
                            options += "<option value='"+companyData[i].id+"'>"+companyData[i].name+"</option>";
                        }	
                        $("#filter_site").empty();
                        $("#filter_site").append(options);
                        $("#filter_site").show();
                        mode_val = $('#filter_site option:eq(0)').val();
                        edu_status.search();
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});   
        },
        search: function() {
            run_progress();            
            $.ajax({
				type: 'POST',
				url: '/controller/worker_edu_detail.php',
				dataType: 'json',
				cache: false,
				data: { 'module' : 'search', 'mode' : mode, 'mode_val' :mode_val, 'id' : $("#accId").val() },
				success: function (response) {
					stop_progress();
                    
					if (response.result) {
                        if(response.accoutnData.profile)
                        {
                            $(".profile_img").css({"background-image":"url("+response.accoutnData.profile+")"});
                        }
                        else
                        {       
                            $(".profile_img").css({"background-image":"url(../img/no_image_150_150.jpg)"});
                        }
                        $("#name").html(response.accoutnData.name);
                        $("#birth").html(response.accoutnData.birth.substr(0, 10));

                        var chartData = [];
                        var labelData = [];
                        var eduTime = response.eduTime[0];                    
                        var eduTempTime = 0;                    
                         var label_html = "";
                        for(var i = 0; i < eduTime.length; i++)
                        {
                            eduTempTime = Number(eduTempTime) + Number(eduTime[i].eduTime2);
                            chartData.push(eduTime[i].eduTime2);   
                            labelData.push(eduTime[i].category_1_name);   
                            label_html += '<div class="ChartLabel"><p class="left"><span class="square" style="background-color:'+colorArray[i]+'"></span> <span class="studyname">'+eduTime[i].category_1_name+'</span></p>';
                            label_html += '<p class="right">: 누계 '+calTime2(eduTime[i].eduTime2)+'</p></div>';
                        }                  
                        $("#chartlabel").html(label_html); 
                        calTime(eduTempTime);  
                        $("#siteCnt").html(response.userSite[0].length);  
                        $('#myChart').remove(); // this is my <canvas> element
                        $('.graphIn').append('<canvas id="myChart" width="" height="200" style="width:100%"></canvas>');

                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labelData,
                                datasets: [{
                                    label: '# of Votes',
                                    data: chartData,
                                    backgroundColor: colorArray,
                                    borderColor: colorArray,
                                    borderWidth: 0,
                                    hoverOffset: 5,
                                }]
                            },
                            options: {
                                responsive: false,
                                
                                plugins: {
                                    legend: {
                                    display:false,
                                    position: 'left',
                                    font:{
                                        size:8,

                                    }
                                    },

                                    title: {
                                    display: false,

                                    text: 'Chart.js Pie Chart'
                                    },
                                    
                                }
                            }
                        });	
					} else {
						if (response.msg == 'session_timeout') auto_log_out(); else alert(response.msg);;
					}
				},
				error: function (request, status, error) {
					stop_progress();
					alert(request+' '+status+' '+error);
				}
			});   
        },

        
	}
})();


$(document).ready(function () {
	edu_status.init();
});




//인쇄 선택 이벤트
$('#filter_cate').on('change', function () {
    var value = $('#filter_cate option:selected').val();
    if(value == "")
    {
        edu_status.init();
        $("#filter_site").hide();
    }
    else if(value == "site")
    {
        mode = 'site';
        edu_status.get_site();        
    }
    else if(value == "company")
    {
        mode = 'company';
        edu_status.get_company();
    }
});

$('#filter_site').on('change', function () {
    mode_val = $('#filter_site option:selected').val();
    edu_status.search();
});

function calTime(seconds) {
    var hour = parseInt(seconds/3600);
    var min = parseInt((seconds%3600)/60);
    var sec = seconds%60;
    $("#totalTime").html(hour+"시간 "+min+" 분");
}
function calTime2(seconds) {
    var hour = parseInt(seconds/3600);
    var min = parseInt((seconds%3600)/60);
    var sec = seconds%60;
    return hour+"시간 "+min+" 분";
}

//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});