$(document)
		.ready(
				function() {

$("#add_category").click(function() {
		

        var category_cn = $('#category_cn').val();
       
        var category_en =$('#category_en').val();

        var description=$('#description').val();
        
        var data = JSON.stringify({"category_cn": category_cn, "category_en":category_en,"description": description });
			var url = "http://localhost/api/index.php/plantype/add_category";  
				$.ajax({  
							type: "post", 
						    contentType: "application/json; charset=utf-8",
							url: url,
							data: data,  
							dataType: "json",  
							success: function(msg){
											if(msg.status=="ok")
											{
												alert("添加成功");
												return;
											}
											if(msg.status=="fail")
											{
												alert("添加失败");
												return;
											}
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  



							});
$("#update_category").click(function() {
		
		var id = $('#cat_id').val();

        var category_cn = $('#category_cn').val();
       
        var category_en =$('#category_en').val();

        var description=$('#description').val();
        
        var data = JSON.stringify({"id": id, "category_cn": category_cn, "category_en":category_en,"description": description });
        // alert(data);
			var url = "http://localhost/api/index.php/plantype/update_category";  
				$.ajax({  
							type: "post", 
						    contentType: "application/json; charset=utf-8",
							url: url,
							data: data,  
							dataType: "json",  
							success: function(msg){
											if(msg.status=="ok")
											{
												alert("更新成功");
												return;
											}
											if(msg.status=="fail")
											{
												alert("更新失败");
												return;
											}
										},
							error: function (xhr, desc, err) {

						                console.log(xhr);
						                console.log("Details: " + desc + "\nError:" + err);

            							},

								});  



							});

  
// }); 

  
}); 


