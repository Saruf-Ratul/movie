<?php
      include_once("../database/constants.php");
       include_once("user.php");
       include_once("DBOperation.php");
       include_once("manage.php");
        
        //register
      if (isset($_POST["username"]) AND isset($_POST["email"])){ 
		$user = new User();
		  $result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
		  echo $result;
		  exit();
		   }
        // login 
 		 if (isset($_POST["log_email"]) AND isset($_POST["log_password"])){ 
		$user = new User();		
		$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
		    echo $result;
 		  	// exit();
 		   }
 		   
 		   
		
		   //Get Catagory
		   if (isset($_POST["getCategory"])){ 
		  $obj = new DBOperation();
		  $rows = $obj->getAllrecord("categories");
		 foreach ($rows as $row) {
		  	echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
		  	 }
		  	 exit();
		   }

		    //get Brand
		   if (isset($_POST["getBrand"])){ 
		  $obj = new DBOperation();
		  $rows = $obj->getAllrecord("brands");
		 
		 foreach ($rows as $row) {
		  //foreach ($rows as $row) {
		  	echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
		  	 }
		  	 exit();
		   }
		   	  
		   	  
		   	   if (isset($_POST["getNewOrder"])){ 
		  $obj = new DBOperation();
		  $rows = $obj->getAllrecord("customer");
		 
		 foreach ($rows as $row) {
		  //foreach ($rows as $row) {
		  	echo "<option value='".$row["id"]."'>".$row["coustomer"]."</option>";
		  	 }
		  	 exit();
		   }
		   
		  // Add categories
		   if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])){ 
		       $obj = new DBOperation();
		       $result = $obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
		       echo $result;
		  	  exit();
		   }
           
           
        //add brand
		if(isset($_POST["brand_name"])){
		$obj = new DBOperation();
		$result= $obj->addBrand($_POST["brand_name"]);
		echo $result;
		exit();
		}

  //ADD Product      
        	if(isset($_POST["added_date"]) AND isset($_POST['product_name'])){
		$obj = new DBOperation();
		$result= $obj->addProduct($_POST["select_cat"],
									$_POST["select_brand"],
									$_POST["product_name"],
									$_POST["product_price"],
									$_POST["product_qty"],
									$_POST["added_date"],
		                            $_POST["vendor_price"],
		                            $_POST["income"]);
		echo $result; 
		exit();
		}
            	
  //ADD Custtomer   
        if(isset($_POST["coustomer"]) AND isset($_POST['c_nam'])){
		$obj = new DBOperation();
		$result= $obj->addCustomer($_POST["coustomer"],
									$_POST["c_nam"],
									$_POST["t_n"],
									$_POST["coun_nam"]); 
		echo $result; 
		exit();
        }
        //ADD CASH    
        	if(isset($_POST["month"]) AND isset($_POST["vis"])){
		$obj = new DBOperation();
		$result= $obj->addCash(    
		                            $_POST["month"],
									$_POST["vis"],
									$_POST["tick"],
									$_POST["packa"],
									$_POST["incom"],
								    $_POST["expense"]);
		                            
		echo $result; 
		exit();
		}
//ADD Cdue    
        	if(isset($_POST["id"]) AND isset($_POST["invoice_no"])){
		$obj = new DBOperation();
		$result= $obj->addDue(    
		                            $_POST["id"],
									$_POST["invoice_no"],
									$_POST["coun_name"],
									$_POST["order_date"],
									$_POST["net_total"],
								    $_POST["paid"],
								    $_POST["due"],
								    $_POST["update_dat"]);
		                            
		echo $result; 
		exit();
		}



//manage category
		if (isset($_POST["manageCategory"])){
			$m = new Manage();
			$result = $m->manageRecordwithPagination("categories",$_POST["pageno"]);
 			$rows = $result["rows"];
 			$pagination = $result["pagination"];
 			if (count($rows) > 0){
 				$n = (($_POST["pageno"] - 1) * 5)+1;
 				// while ($rows = $row) {
 				foreach ($rows as $row) {
 				?>
 				<tr>
		        <td><?php echo $n; ?></td>
		        <td><?php echo $row["category"]; ?></td>
		       <td><?php echo $row["parent"]; ?></td>
		        <td><a href="#"class="btn btn-success btn-sm">Active</a></td>
			   <td>
		    	<a href="#" did= "<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>

                <a href="#" eid = "<?php echo $row['cid']; ?>"data-toggle="modal" data-target="#form_category" class="btn btn-info btn-sm edit_cat">Edit</a>
		        </td>
	           </tr>

 			<?php
 			$n++;
 		}
 		?>
 		   <tr><td colspan="5"><?php echo $pagination;?> </td></tr>
 		   <?php
 		   exit();
 	}
}


// Delete category
if (isset($_POST["deleteCategory"])){
	$m = new Manage();
	$result = $m->deleteRecord("categories","cid",$_POST["id"]);
	echo $result;
}


//update
 if (isset($_POST["updateCategory"])){
 	$m = new Manage();
	$result = $m->getSingleRecord("categories","cid",$_POST["id"]);
 	echo json_encode($result);
	exit();
 }

//update after geting data
if (isset($_POST["update_category"])){
	$m = new Manage();
	$id = $_POST["cid"];
	$name = $_POST["update_category"];
	$parent = $_POST["parent_cat"];
	$result = $m->update_record("categories",["cid"=>$id],["parent_cat"=>$parent,"category_name"=>$name,"status"=>1]);
	echo $result;
	
}
// manage brand

		if (isset($_POST["manageBrand"])){
			$m = new Manage();
			$result = $m->manageRecordwithPagination("brands",$_POST["pageno"]);
 			$rows = $result["rows"];
 			$pagination = $result["pagination"];
 			if (count($rows) > 0){
 				$n = (($_POST["pageno"] - 1) * 5)+1;
 			//	 while ($rows = $row) {
 				foreach ($rows as $row) {
 				?>
 				<tr>
		        <td><?php echo $n; ?></td>
		        <td><?php echo $row["brand_name"]; ?></td>
		   
		        <td><a href="#"class="btn btn-success btn-sm">Active</a></td>
			   <td>
		    	<a href="#" did= "<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand">Delete</a>

                <a href="#" eid = "<?php echo $row['bid']; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-info btn-sm edit_brand">Edit</a>
		        </td>
	           </tr>

 			<?php
 			$n++;
 		}
 		?>
 		   <tr><td colspan="5"><?php echo $pagination;?> </td></tr>
 		   <?php
 		   exit();
 	}
}

if (isset($_POST["deleteBrand"])){
	$m = new Manage();
	$result = $m->deleteRecord("brands","bid",$_POST["id"]);
	echo $result;
 }

 //update brand
 if (isset($_POST["updateBrand"])){
 	$m = new Manage();
	$result = $m->getSingleRecord("brands","bid",$_POST["id"]);
 	echo json_encode($result);
	exit();
 }

//update after geting data
if (isset($_POST["update_brand"])){
	$m = new Manage();
	$id = $_POST["bid"];
	$name = $_POST["update_brand"];
	$result = $m->update_record("brands",["bid"=>$id],["brand_name"=>$name,"status"=>1]);
	echo $result;
	
}
//------------product----------
  		if (isset($_POST["manageProduct"])){
			$m = new Manage();
			$result = $m->manageRecordwithPagination("products",$_POST["pageno"]);
 			$rows = $result["rows"];
 			$pagination = $result["pagination"];
 			if (count($rows) > 0){
 				$n = (($_POST["pageno"] - 1) * 5)+1;
 				// while ($rows = $row) {
 			foreach ($rows as $row) {
 				?>
 				<tr>
		        <td><?php echo $n; ?></td>
		        <td><?php echo $row["product_name"]; ?></td>
		        <td><?php echo $row["category_name"]; ?></td>
		        <td><?php echo $row["brand_name"]; ?></td>
		        <td><?php echo $row["product_price"]; ?></td>
		        <td><?php echo $row["product_stock"]; ?></td>
		        <td><?php echo $row["added_date"]; ?></td>
		        <td><?php echo $row["vendor_price"]; ?></td>
		        <td><?php echo $row["income"]; ?></td>
		        <td><a href="#"class="btn btn-success btn-sm">Active</a></td>
			   <td>
		    	<a href="#" did= "<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>

                <a href="#" eid = "<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#exampleModalProduct" class="btn btn-info btn-sm edit_product">Edit</a>
		        </td>
	           </tr>

 			<?php
 			$n++;
 		}
 		?>
 		   <tr><td colspan="5"><?php echo $pagination;?> </td></tr>
 		   <?php
 		   exit();
 	}
}

if (isset($_POST["deleteProduct"])){
	$m = new Manage();
	$result = $m->deleteRecord("products","pid",$_POST["id"]);
	echo $result;
 }

  //update brand
 if (isset($_POST["updateProduct"])){
 	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
 	echo json_encode($result);
	exit();
 }

//update after geting data
if (isset($_POST["update_product"])){
	$m = new Manage();
	$id = $_POST["pid"];
	$name = $_POST["update_product"];
	$cat = $_POST["select_cat"];
	$brand = $_POST["select_brand"];
	$price = $_POST["product_price"];
	$qty = $_POST["product_qty"];
	$date = $_POST["added_date"];
	$vendor_price = $_POST["vendor_price"];
	$income = $_POST["income"];
	$result = $m->update_record("products",["pid"=>$id],["cid"=>$cat,"bid"=>$brand,"product_name"=>$name,"product_price"=>$price,"product_stock"=>$qty,"added_date"=>$date, "vendor_price"=>$vendor_price,"income"=>$income]);
	echo $result;	
}
//...........order..........
//...........order..........
if (isset($_POST["getNewOrderItem"])){
	$obj = new DBOperation();
	$rows=$obj->getAllRecord("products");
	?>
	 <tr>
		<td><b class ="number">1</b></td>
		<td>
			      <select name="pid[]" class="form-control form-control-sm pid" required>
					<option value="">Choose Product</option>
					<?php
				//while ($rows = $row) {
				  foreach ($rows as $row) {
				   // print_r($row);
					   	?> 
					   	
					   	<option value="<?php echo $row['pid']; ?>"> <?php echo $row["product_name"];?>
					   	
					   	</option>
					   	
					   	<?php
					   }
					?>
					
				  </select>
		        </td>
              
		 <td><input type="text" id = "coustomer_name" name = "coustomer_name[]" class="form-control form-control-sm coustomer_name" placeholder="Customer Name"/required></td>
		<td> <input type="text" id = "coun_name" name = "coun_name" class="form-control form-control-sm" placeholder="Enter Customer Cell"/required></td>
		<td>	<input type="text" id = "c_name" name = "c_name" class="form-control form-control-sm" placeholder="Enter Customer Name"/required></td>
		
		<td><input type="text" id = "ti_no" name = "ti_no" class="form-control form-control-sm" placeholder="Tic/Pax"/required></td>
		 <td><input type="text" id = "country" name = "country[]" class="form-control form-control-sm country" placeholder="Country Name"/required></td>
		 <td><input type="text" id = "air" name = "air[]" class="form-control form-control-sm air" placeholder="airlines"/required></td>
		    <td><!-- <input type="text" id = "fly_d" name = "fly_d[]" class="form-control form-control-sm fly_d" placeholder="d/m/y"/required> -->
                 	<input type="text" class="form-control form_date "  id = "fly_d" name= 'fly_d[]' class="controls input-append date form_date" data-date=""  data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" value= ''/>

                 </td>
		 
			    
		        <!--<td> <input name="tqty[]" hidden type="text" class="form-control form-control-sm tqty" required></td>-->
				
				<td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
				
				<td><input name="price[]" type="text" class="form-control form-control-sm price" required> </td>
				<!--<td>-->
 			<!--	<input  name="gst[]" type="text" class="form-control form-control-sm gst" required/></td>-->
 			<!--	<td>-->
 			<!--	<input  name="gst2[]" type="text" class="form-control form-control-sm gst2" required/></td>-->

				<!--	   <td>-->
    <!--            <input type="text" name= "tax[]" class="form-control form-control-sm tax" placeholder="0" required> </td>-->
				 
				 <td><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name">Tk.<span class="amt">0</span> </td>

		

                <td>
                 	<input type="text" name = "vendor_paid[]" class="form-control form-control-sm vendor_paid"/required></td>


               
                 <!--<td>-->
                 <!--	<input type="text" name = "vendor_paid[]"  id = "vendor_paid"  class="form-control form-control-sm vendor_paid"/required><span class="vendor_paid"> </span></td>-->

<!--<td>-->
<!--                 	<input type="hidden" name = "grosse_f[]"  id = "grosse_f"  class="form-control form-control-sm grosse_f" placeholder="0"/required><span class="grosse_f"> </span></td>-->
                 	
                 	
                 	

                 <td><input type="text" id = "hotel" name = "hotel[]" class="form-control form-control-sm hotel" placeholder="hotel/pag/"required></td>

                 <td> <!-- <input type="text" id = "sanction_dat" name = "sanction_dat[]" class="form-control form-control-sm sanction_dat" placeholder="d/m/y"/required> -->

                 	<input type="text" class="form-control form_date " name= 'sanction_dat[]' class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" value= ''/>
                 </td>
			 </tr>
			<script>
		<script type="text/javascript" src="Date/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="Date/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Date/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="Date/js/locales/bootstrap-datetimepicker.ua.js" charset="UTF-8"></script>
<script type="text/javascript">
    
  $('.form_date').datetimepicker({
    language:  'us',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  
</script> 





	<?php
	exit();
}
// Get price and qty of one item
if (isset($_POST["getPriceAndQty"])){
	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}
if (isset($_POST["order_date"]) AND isset($_POST["coun_name"])) {
    $invoice_no = $_POST["invoice_no"];
	$order_date = $_POST["order_date"];
	$c_name = $_POST["c_name"];
	$coun_name = $_POST["coun_name"];//customer name
	$ti_no = $_POST["ti_no"];// ticket
$t_no = $_POST["t_no"]; //ref

	// geting array order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_gst = $_POST["gst"];
	$ar_gst2 = $_POST["gst2"];
	$ar_tax = $_POST["tax"];
	$ar_price = $_POST["price"];
	$ar_pro_name = $_POST["pro_name"];
    $ar_coustomer_name = $_POST["coustomer_name"];
   
    $ar_fly_d = $_POST["fly_d"];
    $ar_country = $_POST["country"];
    $ar_air = $_POST["air"];
    $sub_total = $_POST["sub_total"];
	
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	//$paid2 = $_POST["paid2"];
	$due = $_POST["due"];
	
	
	$ar_vendor_paid = $_POST["vendor_paid"];
	$ar_hotel = $_POST["hotel"];

	$ar_sanction_dat = $_POST["sanction_dat"];



	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($order_date,$c_name,$coun_name,$ti_no,$t_no,$ar_tqty,$ar_qty,$ar_gst,$ar_gst2,$ar_tax,$ar_price,$ar_pro_name,$ar_coustomer_name,$sub_total,$net_total,$paid,$due,$ar_vendor_paid,$ar_fly_d,$ar_country,$ar_air,$ar_hotel,$ar_sanction_dat);


// }if($query != ''){
// 	if (mysqli_multi_query($connect,$query)){
// 		echo "invoice Data Inserted";
// 	}else{
// 		echo 'Error';
// 	}
// }else{
// 	echo 'All Fields are required';
// }

// while($rows= mysqli_fetch_array($result)){
// 	$result.='

// 	<tr>
// 	</tr>
// 	';

}



//.....................log tble...............

			// if (isset($_POST["log_table"])){
			// 	$order_date = $_POST["order_date"];
			// 	$user_id= $_POST["user_id"];
			// 	$notes= $_POST["notes"];
			// 	$ip_adress=$_POST["ip_adress"];
			// $m = new Manage();
			// echo $result = $m->log_table($order_date,$user_id,$notes,$ip_adress);
			
   //     }
	  //   return "NO_DATA";


?>