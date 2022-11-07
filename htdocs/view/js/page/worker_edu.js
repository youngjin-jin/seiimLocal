var woker_edu = (function () {
	return {
		init : function() {
			run_progress();
            $.ajax({
				type: 'POST',
				url: '/controller/worker_edu.php',
				dataType: 'json',
				cache: false,
				data: { 'siteId' : $("#siteId").val() },
				success: function (response) {
					stop_progress();
					if (response.result) {
                        var accountlist = response.accountlist[0];
                        $("#peopleCnt").html(accountlist.length + "명");
                        console.log(accountlist);
                        var html  = "";
                        for(var i = 0; i < accountlist.length; i++)
                        {
                            if(accountlist[i].profile)
                            {
                                var src = accountlist[i].profile;
                            }
                            else
                            {
                                var src = "../img/no_image_150_150.jpg";
                            }
                            html += '<li class="li_content" data-val="'+accountlist[i].name+'">'+
                                   '     <a href="worker_edu_detail.php?accId='+accountlist[i].id+'">'+
                                   '         <div class="profile">'+
                                   '             <img src="'+src+'" alt="">'+
                                   '         </div>'+
                                   '         <div class="txt-wrap">'+
                                   '             <p class="name">'+accountlist[i].name+'</p>'+
                                    '            <p class="birthday">'+accountlist[i].birth.substr(0, 10)+'</p>'+
                                    '        </div>'+
                                    '    </a>'+
                                    '</li>';
                        }
                        $("#list").html(html);




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


$(document).ready(function () {
	woker_edu.init();
});



$('#searchInput').on('keyup', function () {
	var _this = $(this);
	if(_this.val())
	{
		$(".li_content").each(function(index, item){
			if($(this).data("val").includes(_this.val()))
			{
				$(this).show();
			}
			else
			{
				$(this).hide();
			}
		});
	}
	else
	{
		$(".li_content").show();
	}
});


//이전으로 이벤트
$('#back_btn').on('click', function () {
	history.back();
});