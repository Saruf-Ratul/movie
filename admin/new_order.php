
<!DOCTYPE html>
<html>
<head>
  
    

  <title>Dear Life BD Tours & Travels Ltd</title>
  
  
  <!--<link href="Date/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
  <!--  <link href="Date/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">-->
  




 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="./includes/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

  <script type="text/javascript" rel="stylesheet" src="./js/order.js"></script>
      
</head>

<body>
	<div class="overlay"><div class="loader"></div></div>
  <?php include_once("./templets/header.php");  ?>
       <br/>







 <div class="container">
  <div class ="row">
  <div class= "col-md-28 mx-auto">
  <div class ="card">
  <div class ="card-header">
   <h3>New Orders</h3>
   	</div>
     <div class="card-body">
      	<form method="post" id="get_order_data" onsubmit="return false">
      		
 		<div class="form-group row">
 			<label class="col-sm-3" align="right">Order Date</label>
 				<div class = "col-sm-6">
 					<input type="text" id = "order_date" name = "order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d")?>"> </input>
 					
 					</div>
 					</div>
 				<!-- <div class="form-group row">
 					<label class="col-sm-3 col-form-label" align="right">Customer Name</label>
 						<div class = "col-sm-6">
 						<input type="text" id = "cust_name" name = "cust_name" class="form-control form-control-sm" placeholder="Enter Customer Name"/required>
 						</div>
 						
 						</div> -->
 						 <div class="form-group row">
 						<label class="col-sm-4 col-form-label" align="right">Customer Email</label>
 						<div class = "col-sm-6">
 						<input type="text" id = "coun_name" name = "coun_name" class="form-control form-control-sm" placeholder="Enter Customer email"/required>
 						</div>
 					  </div> 
 					  	 <div class="form-group row">
 						<label class="col-sm-4 col-form-label" align="right">Serial No</label>
 						<div class = "col-sm-6">
 						<input type="text" id = "t_no" name = "t_no" class="form-control form-control-sm" placeholder="Pax/Ticket/Visa"/required>
 						</div>
 					  </div> 
 						<div class="card"style= "box-shadow:0 0 25px 0 lightgray";>
 						<div class="card-body">
 					<h3>Make Order list</h3>

 					 <table class="table table-hover table-bordered mr-auto">
					   <thead>
					 <tr>
					  <th>#</th>
					 <th style="text-align:center;">Item_Name</th>
					 <th style="text-align:center;">Total_Unit</th>
					  <th style="text-align:center;">Unit</th>
					 <th style="text-align:center;">Customer_Paid</th>
					<th >Total</th>

					<th>Destination</th>
					<th>Customer_Name</th>
					<th>Vendor_paid</th>
					<th>Fly_Date</th>
					<th>Airlines</th>
						<!--<th>Ticket_no</th>-->
					<th>Hotel/pag</th>
					<th>Sanction_Date</th>
				 </tr>
					</thead> 
	       <tbody id="invoice_item">
			<!-- <tr>
			    <td><b id= "number">1</b></td>
			    <td>
			      <select name="pid[]" class="form-control form-control-sm" /required>
					<option>Washing</option>
				  </select>
		        </td>
		        <td> <input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
				<td><input name="qty[]"type="text" class="form-control form-control-sm" required/></td>
				<td><input name="price[]"type="text" class="form-control form-control-sm" readonly> </td>
			    <td>Rs.1540</td>
			 </tr> -->
			 
	  
							     
		 </tbody>
		   

		 
		 
	 </table>
		 <center style="padding:10px;">
			<button id="add" style="width:50px;" >+</button>
			<button id="remove" style="width:50px;" >-</button>
		 </center>
 		 </div>	
 	    	</div>
            </br>
 	    	<div class="form-group row">
 				<label for= "sub_total"class="col-sm-3 col-form-label" align="right">Sub Total</label>
 				<div class = "col-sm-6">
 				<input type="text" name="sub_total" class="form-control form-control-sm"id="sub_total" required/>
 				</div>
 			</div>
 			<!-- <div class="form-group row">-->
 			<!--	<label for= "gst"class="col-sm-3 col-form-label" align="right"></label>-->
 			<!--	<div class = "col-sm-6">-->
 			<!--	<input type="text" name= "gst" class="form-control form-control-sm"id="gst"required/>-->
 			<!--	</div>-->
 			<!--</div>-->

 			<!--<div class="form-group row">-->
 			<!--	<label for= "discount"class="col-sm-3 col-form-label" align="right"></label>-->
 			<!--	<div class = "col-sm-6">-->
 			<!--	<input type="text" name= "discount" class="form-control form-control-sm"id="discount"required/>-->
 			<!--	</div>-->
 			<!--</div>-->
 			<div class="form-group row">
 				<label for= "net_total"class="col-sm-3 col-form-label" align="right">Net Total</label>
 				<div class = "col-sm-6">
 				<input type="text" name= "net_total" class="form-control form-control-sm"id="net_total"required/>
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for= "paid"class="col-sm-3 col-form-label" align="right">Paid</label>
 				<div class = "col-sm-6">
 				<input type="text" name= "paid" class="form-control form-control-sm"id="paid" required/>
 				</div>
 			</div>
 			<div class="form-group row">
 				<label for= "due"class="col-sm-3 col-form-label" align="right">Due</label>
 				<div class = "col-sm-6">
 				<input type="text" name= "due" class="form-control form-control-sm"id="due"required/>
 				</div>
 			</div>
 			<!-- <div class="form-group row">-->
 			<!--	<label for= "payment_type"class="col-sm-3 col-form-label" align="right">Payment Method</label>-->
 			<!--	<div class = "col-sm-6">-->
 			<!--	<select name= "payment_type" class="form-control form-control-sm" id="payment_type"required/>-->
 			<!--		<option>Cash</option>-->
 			<!--		<option>Card</option>-->
 			<!--		<option>Bank</option>-->
 			<!--		<option>Cheque</option>-->
 			<!--	</div>-->
 			<!--</div> -->
 		

 			<center>
			<input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
			<input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print">
		   </center>

      	 </form>
      	</div>
      	</div>
        </div>
      </div>
    </div>



</body>
</html>
<!-- <script>
	$(document).ready(function(){
		var count = 1;
		$('#Order').click(function(){
			count = count + 1;
			var html_code += "<tr id='row"+count+ "'>";
			html_code += " <td> <input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>"
		})
	})

</script> -->

<!--<script type="text/javascript">-->
<!--	$('.form_date').datetimepicker({-->
<!--        language:  'us',-->
<!--        weekStart: 1,-->
<!--        todayBtn:  1,-->
<!--		autoclose: 1,-->
<!--		todayHighlight: 1,-->
<!--		startView: 2,-->
<!--		minView: 2,-->
<!--		forceParse: 0-->
<!--    });-->
	
<!--</script>-->
