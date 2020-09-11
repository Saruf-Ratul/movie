$(document).ready(function(){
	$("#register_form").on("submit",function(){
 // define("DOMAIN", "http://dearlifebd.com/airlines");
	var DOMAIN = "http://dearlifebd.com/airlines";
 //var DOMAIN = "https://inventory247.000webhostapp.com/";
		var status = false;
		var name = $("#username");
		var email = $("#email");
	    var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = $("#usertype");
	    var e_patt = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
	    if(name.val() == "" || name.val().length < 4){
	       name.addClass("border-danger");
	    $("#u_error").html("<span class='text-danger'>Please Enter Name and shoud be more than 4 char </span>");
	       status = false; 
	    }else{
            name.removeClass("border-danger");
	    	$("#u_error").html("");
	         status = true; 
	       	}
	       	if(!e_patt.test(email.val())){
	    	    email.addClass("border-danger");
	            $("#e_error").html("<span class='text-danger'>Please Enter Valid Email</span>");
	            status = false; 
	       }else{
           		email.removeClass("border-danger");
	    	    $("#e_error").html("");
	            status = true; 
	       	}if(pass1.val() == "" || pass1.val().length < 4 ){
	    	    pass1.addClass("border-danger");
	            $("#p1_error").html("<span class='text-danger'>Please Enter more then 9 digit </span>");
	            status = false; 
	    }else{
             pass1.removeClass("border-danger");
	    	 $("#p1_error").html("");
	         status = true; 
    	}if(pass2.val() == " " || pass2.val().length < 4 ){
	    	    pass2.addClass("border-danger");
	            $("#p2_error").html("<span class='text-danger'>Please Enter more then 9 disit </span>");
	             status = false; 
	    }else{
             pass2.removeClass("border-danger");
	    	 $("#p2_error").html("");
	         status = true; 
	    }if(type.val() == "" ){
	    	   type.addClass("border-danger");
	           $("#t_error").html("<span class='text-danger'>Please Enter User type </span>");
	           status = false; 
	    }else{
            type.removeClass("border-danger");
	    	$("#t_error").html("");
	         status = true;
	       	}
	       	if ((pass1.val() == pass2.val()) && status == true) {

	       	$(".overlay").hide();
	       		$.ajax({
	       			url :"includes/process.php",
	       			method : "POST",
	       		   data : $("#register_form").serialize(),
	       		   success : function(data){
	       		   	alert(data);
	   
	       		   if (data == "EMAIL_ALREADY_EXISTS") {
	       		   	$(".overlay").hide();

	       		 	alert("It seem like you email already used");
	       		  }else if (data == "SOME_ERROR") {
	       		  	  	$(".overlay").hide();
	       		   	alert("Something went wrong");
	       		  }else{
	       		  	  	$(".overlay").hide();

	       		  	window.location.href = encodeURI("/index.php?msg=yau are registered now You can login");
	       		  }

				}
	       	})
    	}else{
	      pass2.addClass("border-danger");
	      $("#p2_error").html("<span class='text-danger'>Password is not matched </span>");
	      status = true; 
	  	}
    })

	// login  
	//$(document).ready(function(){
    $("#form_login").on("submit",function(){
 
	var DOMAIN = "http://dearlifebd.com/airlines"
		var status = false;
		var email = $("#log_email");
		var pass = $("#log_password");
		if (email.val() ==""){
		email.addClass("border-danger");
		$("#e_error").html("<span class='text-danger'>Please Enter Email Address </span>");
		status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() == ""){
		   pass.addClass("border-danger");
		   $("#p_error").html("<span class='text-danger'>Please Enter Password </span>");
		   status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		} 
		if (status){
			$(".overlay").show();
		  //alert("ok");
			$.ajax({
	       	url : "includes/process.php",
	       		method : "POST",
	       	    data : $("#form_login").serialize(),
	       	    success : function(data){
	       	         //  alert(data);
	       	  		$(".overlay").hide();
	       		    if (data == "NOT_REGISTERD") {
	       		 	email.addClass("border-danger");
                	$("#e_error").html("<span class='text-danger'>Sorry, email isn't registered </span>");
	       		   
	             }else if (data == "PASSWORD_NOT_MATCHED") {
	             	$(".overlay").hide();
	       		   	 pass.addClass("border-danger");
	                 $("#p_error").html("<span class='text-danger'>Please Enter correct pass </span>");
	                  status = false; 
	           }else{
	           	$(".overlay").hide();
	       		  	console.log(data);
	       	      alert(data);
	      	    window.location.href = "dashboard.php";
	       	         }
	       	     }
	        })
     	 }
    })
     	 // Category
        fetch_category();
        function fetch_category(){
var DOMAIN = "http://dearlifebd.com/airlines"
           //var DOMAIN = "http://localhost/inv_project/public_html";
 		$.ajax({
	       url : "includes/process.php",
	       		method : "POST",
			    data : {getCategory:1},
	       	    success : function(data){
	            var root = "<option value='0'>Root</option>";
	            var choose = "<option value=''>Choose Category</option>";
	       	    $("#parent_cat").html(root+data);
	       	     $("#select_cat").html(choose+data);
	       	   //alert(data);
	        }
	    })
     }
     //Fetch Brand
     fetch_brand();
     function fetch_brand(){
         
	var DOMAIN = "http://dearlifebd.com/airlines";
        //  var DOMAIN = "http://localhost/inv_project/public_html";
     // var DOMAIN = "https://inventory247.000webhostapp.com/";
     // var DOMAIN ="https://inventory247.000webhostapp.com/";
 		$.ajax({
	       url : "includes/process.php",
	       		method : "POST",
			    data : {getBrand:1},
	       	    success : function(data){
	                 var choose = "<option value=''>Choose Brand</option>";
	       	        $("#select_brand").html(choose+data);
	       	           	 //  alert(data);
	        }
	    })
     }
  fetch_customer();
        function fetch_customer(){
var DOMAIN = "http://dearlifebd.com/airlines"
           //var DOMAIN = "http://localhost/inv_project/public_html";
 		$.ajax({
	       url : "includes/process.php",
	       		method : "POST",
			    data : {getNewOrderItem:1},
	       	    success : function(data){
	            var choose = "<option value=''>Choose Coustomer</option>";
	       	        $("#select_customer").html(choose+data);
	       	   //alert(data);
	        }
	    })
     }
    //Add category
    $("#category_form").on("submit",function (){
        var DOMAIN = "http://dearlifebd.com/airlines"
    	if ($("#category_name").val() == "") {
    		$("#category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter cat </span>");
           $("#category_name").val("");
    	}else{
    		$.ajax({
        url : "includes/process.php",
    		method : "POST",
    		data : $("#category_form").serialize(),
    		success : function(data){
    				if (data == "CATEGORY_ADDED"){
    					 alert("New category added..successfully--!");
    					$("#category_name").removeClass("border-danger");
    					$("#cat_error").html("<span class='text-success'>new Category added success</span>");
    				  $("#category_name").val("");
    				    fetch_category();
    				}else{
    					//console.log(data);
    				 alert(data);
    			    }
    	     	}

    		})
    	}
    })

// add brand
   $("#brand_form").on("submit",function() {
       var DOMAIN = "http://dearlifebd.com/airlines"
    if ($("#brand_name").val() == " ") {
    	$("#brand_name").addClass("border-danger");
    	$("#brand_error").html("<span class='text-danger'>Please Enter brand name </span>");
     // $("#brand_name").val("");
     }else{
    	$.ajax({
    	  url : "includes/process.php",
    	    method : "POST",
    	    data : $("#brand_form").serialize(),
    	    success : function(data){
    	    	if (data == "BRAND_ADDED"){
                alert("New brand added..successfully--!");
    	    	$("#brand_name").removeClass("border-danger");
    	          $("#brand_error").html("<span class='text-success'>New brand added.</span>");
                  $("#brand_name").val("");
                  fetch_brand();
    	    	}else{
    	    		console.log(data);
                  alert(data);
    	    	}
    	    	
    	    }
    	})
    }
  })
   //add product
   $("#product_form").on("submit",function() {
       var DOMAIN = "http://dearlifebd.com/airlines"
            $.ajax({
    	          url : "includes/process.php",
    	           method : "POST",
		    	    data : $("#product_form").serialize(),
		    	    success : function(data){
		    	    	if (data == "NEW_PRODUCT_ADDED"){
		    	    		 alert("New product added..successfully--!");
		    	 			 $("#product_name").val("");
		    	 			 $("#select_cat").val("");
		    	 		     $("#select_brand").val("");
		    	 			 $("#product_price").val("");
		    	 			 $("#product_qty").val("");
		    	 			 $("#vendor_price").val("");
		    	 			 $("#income").val("");	 
    	    			}else{
    	    		console.log(data);
                    alert(data);
    	    	}
    	    	
    	    }
    	})

   })
   
 //add coustomer
 //add customer
   $("#customer_form").on("submit",function() {
            $.ajax({
    	           url : "includes/process.php",
    	           method : "POST",
		    	    data : $("#customer_form").serialize(),
		    	    success : function(data){
		    	    	if (data == "NEW_Movie_ADDED"){
		    	    		 alert("New Movie added..successfully--!");
		    	 			 $("#customer").val("");
		    	 			 $("#c_nam").val("");
		    	 		     $("#t_n").val("");
		    	 			 $("#coun_nam").val("");
		    	 			$("#customer").val("");
                  fetch_customer();
		    	 			 //$("#profit").val("");	 
    	    			}else{
    	    		console.log(data);
                    alert(data);
    	    	}
    	    	
    	    }
    	})

   })
   
   
       
 //add cash
 
 
 
   $("#cash_form").on("submit",function() {
            $.ajax({
    	           url : "includes/process.php",
    	           method : "POST",
		    	    data : $("#cash_form").serialize(),
		    	    success : function(data){
		    	    	if (data == "NEW_CASH_ADDED"){
		    	    		 alert("New cash added..successfully--!");
		    	 			 $("#month").val("");
		    	 			 $("#vis").val("");
		    	 		     $("#ticket").val("");
		    	 			 $("#packa").val("");
		    	 			 $("#incom").val("");
		    	 			 $("#expense").val("");
		    	 			 //$("#profit").val("");	 
    	    			}else{
    	    		console.log(data);
                    alert(data);
    	    	}
    	    	
    	    }
    	})

   })  
   
   
 //add cash
   $("#cash_form").on("submit",function() {
            $.ajax({
    	           url : "includes/process.php",
    	           method : "POST",
		    	    data : $("#cash_form").serialize(),
		    	    success : function(data){
		    	    	if (data == "NEW_CASH_ADDED"){
		    	    		 alert("New cash added..successfully--!");
		    	 			 $("#month").val("");
		    	 			 $("#vis").val("");
		    	 		     $("#ticket").val("");
		    	 			 $("#packa").val("");
		    	 			 $("#incom").val("");
		    	 			 $("#expense").val("");
		    	 			 //$("#profit").val("");	 
    	    			}else{
    	    		console.log(data);
                    alert(data);
    	    	}
    	    	
    	    }
    	})

   })
 //add due
   $("#invoiceupdate_form").on("submit",function() {
            $.ajax({
    	           url : "includes/process.php",
    	           method : "POST",
		    	    data : $("#invoiceupdate_form").serialize(),
		    	    success : function(data){
		    	    	if (data == "NEW_Due_ADDED"){
		    	    		 alert("New cash added..successfully--!");
		    	 			 $("#invoice_no").val("");
		    	 			 $("#coun_name").val("");
		    	 		     $("#order_date").val("");
		    	 			 $("#net_total").val("");
		    	 			 $("#paid").val("");
		    	 			 $("#due").val("");
		    	 			 $("#update_dat").val("");	 
    	    			}else{
    	    		console.log(data);
                    alert(data);
    	    	}
    	    	
    	    }
    	})

   })
  

 
})






