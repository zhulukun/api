$(document)
		.ready(
				function() {
$("#submit").click(function() {


        var name = $('#nickname').val();
        if (name.length<3) {
        	alert("请为用户名三个字符以上!");
        	return;
        }

        var password =$('#password').val();
        var repassword=$('#repassword').val();

        if (password!=repassword) {
        	alert("请保持输入的密码一致!");
        	return;
        };

		var phoneNo =$('#phoneNo').val(); //获取手机号


        var code=$('#code').val();

        var data = JSON.stringify({"nickname": name, "password": password, "repassword" : repassword, "phoneNo" : phoneNo, "code" : code});
			var url = "http://54.191.223.118/mtt/index.php/registerValid";  
				$.ajax({  
							type: "post",  
						    contentType: "application/html; charset=utf-8",
							url: url,
							data: data,  
							dataType: "json",  
							success: function(msg){
											if(msg.status=="exists")
											{
												alert("用户名已存在!");
												return;
											}
											if(msg.status=="success")
											{
												alert("注册成功!");
												window.location ="http://54.191.223.118/mtt/index.php/lottery/index/inviter/"+name+"";
												return;
											}
											if(msg.status=="fail")
											{
												alert("验证码错误！");
												return;
											}        
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  



							});  
$("#login").click(function() {
		

        var username = $('#username').val();
       
        var password =$('#password').val();
        

        var data = JSON.stringify({"username": username, "password": password });
			var url = "http://54.191.223.118/mtt/index.php/loginValid";  
				$.ajax({  
							type: "post", 
						    contentType: "application/html; charset=utf-8",
							url: url,
							data: data,  
							dataType: "json",  
							success: function(msg){
											if(msg.status=="invalid")
											{
												alert("用户名或密码错误");
												return;
											}
											if(msg.status=="valid")
											{
												window.location ="http://54.191.223.118/mtt/index.php/umain";
												return;
											}
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  



							});


  
}); 

  $(function () {
  	         
            $('#btncode').click(function () {
           
            var phoneNo=$('#phoneNo').val();

        	var data = JSON.stringify({"phoneNo" : phoneNo});

			var url = "http://54.191.223.118/mtt/index.php/MessageInterface";  
				$.ajax({  
							type: "post",  
						    contentType: "application/html; charset=utf-8",
							url: url,
							data: data,
							dataType: "json",  
							success: function(msg){

											if(msg.status=="exists")
											{
												alert("手机号已经被注册！");
												return;
											}

											if(msg.status=="success")
											{
												function CountDown() {
									                    $("#btncode").attr("disabled", true);
									                    $("#btncode").val("已发送"+"(" + count + ")");
									                    if (count == 0) {
									                        $("#btncode").val("重新发送").removeAttr("disabled");
									                        clearInterval(countdown);
									                    }
									                    count--;
									                } 
												var count = 120;

									            var countdown = setInterval(CountDown, 1000);
									            return;
									             
											}
											if(msg.status=="error")
											{
												function CountDown1() {
									                    $("#btncode").attr("disabled", true);
									                    $("#btncode").val("发送失败"+"(" + count + ")");
									                    if (count == 0) {
									                        $("#btncode").val("重新发送").removeAttr("disabled");
									                        clearInterval(countdown);
									                    }
									                    count--;
									                } 
												var count = 3;

									            var countdown = setInterval(CountDown1, 1000);
									            return;
									               
									             
											}    
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

                
            });

});
        });

