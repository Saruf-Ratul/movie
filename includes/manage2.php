 
<?php

class Manage

{
	private $con;
	   	function __construct()
				{
				    include_once("../database/db.php");
					$db = new Database();
					$this->con=$db->connect();
			    }

				public function manageRecordWithPagination($table,$pno){
					$a = $this->pagination($this->con,$table,$pno,5);
					if ($table == "categories"){
						$sql = "SELECT p.cid, p.category_name as category, c.category_name as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"];
					}else if($table == "products"){
 						$sql = "SELECT p.pid, p.product_name,c.category_name,b.brand_name,p.product_price,p.product_stock,p.added_date,p.vendor_price,p.income,p.p_status FROM products p,brands b,categories c WHERE p.bid = b.bid AND p.cid = c.cid ".$a["limit"];
					} else{
					   $sql = "SELECT * FROM  ".$table." ".$a["limit"];
					}
					$result = $this->con->query($sql) or die($this->con->error);
					$rows = array();
					if ($result->num_rows > 0){
						while ($row = $result->fetch_assoc()){
						$rows[] = $row;
						}
					}
					return ["rows"=>$rows,"pagination"=>$a["pagination"]];
				}

				private function pagination($con,$table,$pno,$n){
					$query = $con->query("SELECT COUNT(*) as rows FROM ".$table);
					$row = mysqli_fetch_assoc($query);

					$pageno = $pno;
					$numberOfRecordsPerPage = $n;
					$last = ceil($row["rows"]/$numberOfRecordsPerPage);


					$pagination = "<ul class='pagination'>";

					if ($last != 1) {
						if($pageno >1) {
							$previous = "";
							$previous = $pageno - 1;
							$pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#333;'>Previous<a/></li></li>";
						}
						for ($i=$pageno - 5; $i< $pageno ; $i++) {
							if ($i >0){
								$pagination .= "<li class='page-item'><a class='page-link' pn ='".$i."' herf='#'> ".$i." <a/></li>";

							}
						}
					    $pagination .= "<li class='page-item'><a class='page-link' pn ='".$pageno."' href='#' style='color:#333;'>$pageno<a/></li>";
						  for ($i=$pageno +1; $i <= $last ;$i++){
						
								$pagination .= "<li class='page-item'><a class='page-link' pn ='".$i."' href='#'> ".$i." <a/></li>";
								if ($i > $pageno +4){
									break;

								}
							}

							if ($last > $pageno) {
								$next = $pageno +1;
								$pagination .= "<li class='page-item'><a class='page-link' pn ='".$next."' href='#' style='color:#333;'> Next </a></li></ul>";	
							}
						}

		$limit = "LIMIT ".($pageno - 1) *
	    $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;
		return ["pagination"=>$pagination,"limit"=>$limit];
	}
	public function deleteRecord($table,$pk,$id){
		if($table == "categories"){

			$pre_stmt = $this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat = ?");
			$pre_stmt->bind_param("i",$id);
			$pre_stmt->execute();
			$result = $pre_stmt->store_result() or die($this->con->error);
			if ($result->num_rows > 0) {
				return "DEPENDENT_CATEGORY";
			}else{
				$pre_stmt = $this->con->prepare("DELETE  FROM ".$table."  WHERE ".$pk."= ?");
				$pre_stmt->bind_param("i",$id);
				$result = $pre_stmt->execute() or die($this->con->error);
				if ($result){
					return "CATEGORY_DELETED";
				}
			}
	    }else{
			$pre_stmt = $this->con-> prepare("DELETE  FROM ".$table." WHERE ".$pk."= ?");
            $pre_stmt->bind_param("i",$id);
			$result = $pre_stmt->execute() or die($this->con->error);
				if ($result){
					return "DELETED";
			}
		}
	}




   public function getSingleRecord($table,$pk,$id){
         $sql = "SELECT * FROM  ".$table." WHERE ".$pk."= '".$id."'";
		$result = $this->con->query($sql);
     //  $sql->bind_param("i",$id);
   //	$pre_stmt = $this->con->prepare("SELECT * FROM  ".$table." WHERE ".$pk."= ? LIMIT 1");
  //  $pre_stmt->bind_param("i",$id);
    //$pre_stmt->execute() or die($this->con->error);
   // $result = $pre_stmt->store_result();
    if ($result->num_rows == 1){
    	$row = $result->fetch_assoc();
    }
    return $row;
   }


    public function update_record($table,$where,$fields){
			$sql= "";
			$condition= "";
			foreach ($where as $key => $value) {
			   $condition .= $key . "= '". $value. "' AND ";
			}
			$condition = substr($condition, 0, -5);
			foreach ($fields as $key => $value){
		    $sql .= $key . "='". $value. "', ";
			}
			$sql = substr($sql, 0, -2);
			$sql= "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
			if (mysqli_query($this->con,$sql)){
			return true;	
			}
			
		  }

 public function storeCustomerOrderInvoice($order_date,$c_name,$coun_name,$ti_no,$t_no,$ar_tqty,$ar_qty,$ar_gst,$ar_gst2,$ar_tax,$ar_price,$ar_pro_name,$ar_coustomer_name,$sub_total,$net_total,$paid,$due,$ar_vendor_paid,$ar_fly_d,$ar_country,$ar_air,$ar_hotel,$ar_sanction_dat){
   // $pre_stmt = $this->con->prepare("INSERT INTO `invoice`(`c_name`, `coun_name`, `order_date`, `sub_total`, `net_total`, `paid`, `due`, `ti_no`, `t_no`) VALUES (?,?,?,?,?,?,?,?,?)");
  //  $pre_stmt->bind_param("ssssdddss", $c_name,$coun_name,$order_date,$sub_total,$net_total,$paid,$due,$ti_no,$t_no);
    $pre_stmt->execute() or die($this->con->error);
    $invoice_no = $pre_stmt->insert_id;
   
      if ($invoice_no != 0 ){
      	for ($i=0; $i < count($ar_price); $i++){

      		//finding the remaining quantity after giving customer
           $rem_qty = $ar_qty[$i];
            if ($rem_qty < 0){
            	return "ORDER_FAILED";
            }else{
            	// update product stock
            	$sql = "UPDATE products SET product_stock = '$rem_qty' WHERE product_name = '".$ar_pro_name[$i]."'";
            	$this->con->query($sql);
            }


      		$insert_product = $this->con->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`, `gst`, `gst2`, `tax`, `coustomer_name`, `vendor_paid`, `fly_d`, `country`, `air`, `hotel`, `sanction_dat`, order_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert_product->bind_param("isddssssdssssss", $invoice_no,$ar_pro_name[$i],$ar_price[$i],$ar_qty[$i],$ar_gst[$i],$ar_gst2[$i],$ar_tax[$i],$ar_coustomer_name[$i],$ar_vendor_paid[$i],$ar_fly_d[$i],$ar_country[$i],$ar_air[$i],$ar_hotel[$i],$ar_sanction_dat[$i],$order_date);
            $insert_product->execute() or die ($this->con->error);
      	}
      	return "ORDER_COMPLETED";
      }
    }

      //due
  
    // log table  

           // public function log_table($user_id,$Notes,$Ip_add,$date_time) {
           // $pre_stmt = $this->con->prepare("INSERT INTO `log_table`(`User_id`, `Notes`, `Ip_add`, `date_time`) VALUES (?,?,?,?)");
           // $pre_stmt->bind_param("isss",$user_id,$Notes,$Ip_add,$date_time);
           // $pre_stmt->execute() or die($this->con->error);

              
   // }
    




}

//$obj = new Manage();
//echo "<pre>";
//print_r($obj->manageRecordwithPagination("categories",1));
//echo $obj->deleteRecord("categories","cid","47");
//print_r($obj->getSingleRecord("categories","cid",1));
//echo $obj->update_record("categories",["cid"=>],["parent_cat"=>0,"category_name"=>"Elect","status"=>1"]);
?>