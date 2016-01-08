$(document)
		.ready(
				function() {

$(".input-label").click(function() {
		
		var labels= $("#labels").val();
        var label = $(this).val();
        if (labels == '') {
        	$("#labels").val(label);
        }
        else
        {
        	$("#labels").val(labels+','+label);
        }        

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


