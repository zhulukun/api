$(document)
		.ready(
				function() {
$("#submit").click(function() {

	       var data={"phone":"17888835130","password":"aaa"};
	       	var data = JSON.stringify(data);
			var url = "http://localhost/api/index.php/user/login";  
			$.ajax({  
							type: "post",  
						    contentType: "application/html; charset=utf-8",
							url: url,
							data: data,  
							dataType: "text",  
							success: function(msg){
											
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  



							});  
  
}); 

  