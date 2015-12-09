$(document)
		.ready(
				function() {
					
var url = "http://54.191.223.118/mtt/index.php/main/getUserNum";  
				$.ajax({  
							type: "post", 
						    contentType: "application/html; charset=utf-8",
							url: url,
							//data: data,  
							dataType: "json",  
							success: function(msg){

												$("#total").append(msg.total);
												return;

										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  






$("#submit").click(function() {
		

        var username = $('#username').val();
       
        var password =$('#password').val();
        

        var data = JSON.stringify({"username": username, "password": password });
			var url = "http://54.191.223.118/mtt/index.php/adminValid";  
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
												window.location ="http://54.191.223.118/mtt/index.php/main";
												return;
											}
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  



							});
$("#ensure").click(function() {
		

        var first = $('#first').val();
       
        var second =$('#second').val();

        var third =$('#third').val();

        var four =$('#four').val();

        var five =$('#five').val();

        var total =$('#total').val();
        

        var data = JSON.stringify({"first": first, "second": second, "third": third, "four": four, "five": five,"total": total });
			var url = "http://54.191.223.118/mtt/index.php/chance/change";  
				$.ajax({  
							type: "post", 
						    contentType: "application/html; charset=utf-8",
							url: url,
							data: data,  
							dataType: "json",  
							success: function(msg){
											if(msg.status=="fail")
											{
												alert("更新失败");
												return;
											}
											if(msg.status=="success")
											{
												alert("更新成功");
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
