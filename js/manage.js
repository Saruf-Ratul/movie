$(document).ready(function(){
   
	var DOMAIN = "http://dearlifebd.com/airlines";
   // var DOMAIN = "http://localhost/inv_project/public_html";
//var DOMAIN = "https://inventory247.000webhostapp.com/";
 //var DOMAIN = "https://inventory247.000webhostapp.com/";
	  // manage category
     manageCategory(1);
     function manageCategory(pn){
     
 		$.ajax({
	       		url : "includes/process.php",
	       		method : "POST",
			    data : {manageCategory:1,pageno:pn},
	       	    success : function(data){
	            $("#get_category").html(data);     
	       	 //  alert(data);
	        }
	    })
     }
     $("body").delegate(".page-link","click",function(){
     	var pn = $(this).attr("pn");
     	manageCategory(pn);
     })
       
      $("body").delegate(".del_cat","click",function(){
     	var did = $(this).attr("did");
     
     	if (confirm("Are U Sure ? want to delete ")){
     		$.ajax({
	       url : "includes/process.php",
	       		method : "POST",
			    data : {deleteCategory:1,id:did},
	       	    success : function(data){
                     if (data  ==  "DEPENDENT_CATEGORY"){
	       	    		 alert("sorry  Dependent category not delete "); 
	       	    	}else if(data == "CATEGORY_DELETED"){
                         alert("category delete !happy");
                         manageCategory(1); 
            	    }else if(data == "DELETED"){
	      	    		alert("Delete successfully");
	               }else{
	            	alert(data);
	               }
	           }
	        })
	         
        }else{
         
       }
        
    })
      
      //  fetch category
        fetch_category();
        function fetch_category(){
        //  var DOMAIN ="https://inventory247.000webhostapp.com/";
        
	var DOMAIN = "http://dearlifebd.com/airlines";
	//var DOMAIN = "http://localhost/inv_project/public_html";
 		$.ajax({
	       	url : "includes/process.php",
	       		method : "POST",
			    data : {getCategory:1},
	       	    success : function(data){
	          
	           var choose = "<option value=''>Choose Category</option>";
                 var root = "<option value='0'>Root</option>";
	       	    $("#parent_cat").html(root+data);
	       	    $("#select_cat").html(choose+data);
	       	   //alert(data);
	        }
	    })
     }

     //fetch brand
      fetch_brand();
        function fetch_brand(){
        $.ajax({
              url : "includes/process.php",
                method : "POST",
                data : {getBrand:1},
                success : function(data){
               var choose = "<option value=''>Choose Category</option>";
                $("#select_brand").html(choose+data);
               //alert(data);
            }
        })
     }

      //update category
     $("body").delegate(".edit_cat","click",function(){
     	var eid = $(this).attr("eid");
        $.ajax({
            url : "includes/process.php",
         		method : "POST",
    	     	dataType : "Json",
    		    data : {updateCategory:1,id:eid},
    		    success : function(data){ 
    			    console.log(data);
    			 $("#cid").val(data["cid"]);
    			 $("#update_category").val(data["category_name"]);
    			 $("#parent_cat").val(data["parent_cat"]);
					
    		//alert(data);
    		// window.location.href = "";

            }

        })
    })

    $("#update_category_form").on("submit",function (){
    	if ($("#update_category").val() == "") {
    		$("#update_category").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter cat </span>");
         //  $("#category_name").val("");
    	}else{
    		$.ajax({
        url : "includes/process.php",
    		method : "POST",
    		data : $("#update_category_form").serialize(),
    		success : function(data){
    				
    				 alert(data);
    				 window.location.href = "";
    	     	}
    		})
    	}
    })
   //manage brand...............
    manageBrand(1);
     function manageBrand(pn){
          $.ajax({
	       	url : "includes/process.php",
	       		method : "POST",
			    data : {manageBrand:1,pageno:pn},
	       	    success : function(data){
	            $("#get_brand").html(data);     
	       	 //  alert(data);
	        }
	    })
     }
       getNewOrderItem(1);
     function getNewOrderItem(pn){
          $.ajax({
	       	url : "includes/process.php",
	       		method : "POST",
			    data : {getNewOrderItem:1,pageno:pn},
	       	    success : function(data){
	            $("#get_customer").html(data);     
	       	 //  alert(data);
	        }
	    })
     }
     
     
      $("body").delegate(".page-link","click",function(){
     	var pn = $(this).attr("pn");
     	manageBrand(pn);
     })

      $("body").delegate(".del_brand","click",function(){
     	var did = $(this).attr("did");
        // alert(did);
     	if (confirm("Are U Sure ? want to delete ")){
     		$.ajax({
	       url : "includes/process.php",
	       		method : "POST",
			    data : {deleteBrand:1,id:did},
	       	    success : function(data){
                     if (data  ==  "DELETED"){
	       	    		 alert("BRAND is DELETED "); 
	       	         manageBrand(1);
	               }else{
	            	alert(data);
	               }
	           }
	        })
	         
        }
        
    })

         //update cbrand
     $("body").delegate(".edit_brand","click",function(){
     	var eid = $(this).attr("eid");
        $.ajax({
          url : "includes/process.php",
         		method : "POST",
    	     	dataType : "Json",
    		    data : {updateBrand:1,id:eid},
    		    success : function(data){ 
    			    console.log(data);
    			 $("#bid").val(data["bid"]);
    			 $("#update_brand").val(data["brand_name"]);	
    		//alert(data);
    		// window.location.href = "";

            }

        })
    })

        $("#update_brand_form").on("submit",function (){
    	if ($("#update_brand").val() == "") {
    		$("#update_brand").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter brand </span>");
         //  $("#category_name").val("");
    	}else{
    		$.ajax({
      url : "includes/process.php",
    		method : "POST",
    		data : $("#update_brand_form").serialize(),
    		success : function(data){
    				
    				 alert(data);
    				 window.location.href = "";
    	     	}
    		})
    	}
    })

         //manage   product..............
    manageProduct(1);
     function manageProduct(pn){
          $.ajax({
             url : "includes/process.php",
                method : "POST",
                data : {manageProduct:1,pageno:pn},
                success : function(data){
                $("#get_product").html(data);     
             //  alert(data);
            }
        })
     }
      $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageProduct(pn);
     })
        $("body").delegate(".del_product","click",function(){
        var did = $(this).attr("did");
        // alert(did);
        if (confirm("Are U Sure ? want to delete ")){
            $.ajax({
               url : "includes/process.php",
                method : "POST",
                data : {deleteProduct:1,id:did},
                success : function(data){
                     if (data  ==  "DELETED"){
                         alert("BRAND is DELETED "); 
                     manageProduct(1);
                   }else{
                    alert(data);
                   }
               }
            })
             
        }
        
    })

   //update product
     $("body").delegate(".edit_product","click",function(){
        var eid = $(this).attr("eid");
        $.ajax({
            url : "includes/process.php",
                method : "POST",
                dataType : "Json",
                data : {updateProduct:1,id:eid},
                success : function(data){ 
                    console.log(data);
                 $("#pid").val(data["pid"]);
                 $("#update_product").val(data["product_name"]); 
                 $("#select_cat").val(data["cid"]);    
                 $("#select_brand").val(data["bid"]); 
                 $("#product_price").val(data["product_price"]); 
                 $("#product_qty").val(data["product_stock"]);
                 $("#vendor_prrice").val(data["vendor_price"]);
                 $("#income").val(data["income"]);
                 
            //alert(data);
            // window.location.href = "";

            }

        })
    })
 //update product
   $("#update_product_form").on("submit",function() {
            $.ajax({
                  url : "includes/process.php",
                   method : "POST",
                    data : $("#update_product_form").serialize(),
                    success : function(data){
                        if (data == "UPDATED") {
                            alert("product update successfully");
                             window.location.href = "";
                        }else{
                              alert(data);  
                        }
                  
                
            }
        })

   })
   

   //-- log---table----
   
//   $("#update_log_form").on("submit",function() {
//            $.ajax({
//                url : DOMAIN+"/includes/process.php",
//               method : "POST",
//                data : $("#update_log_form").serialize(),
//                  success : function(data){
//                       if (data == "UPDATED") {
                          
//                      }else{
//                           alert(data);  
//                       }
                  
                
//          }
//       })

// })

   






})

