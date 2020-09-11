
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tours & Travels-Dear Life BD Tours & Travels</title>
  
 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="./includes/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <!-- <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script> -->
  <script type="text/javascript" rel="stylesheet" src="./js/manage.js"></script>
      
</head>

<body>

  
<?php include_once("./templets/header.php");  ?>
      <br/> 

<!--      <div class="container">-->
              
<!--  <table class="table table-hover table-bordered mr-auto">-->
<!--    <thead>-->
<!--      <tr>-->
        
<!--         <th>Total Bill</th>-->
         
<!--         <th>Current Bill</th> -->
<!--         <th>Total Due</th></br>-->
<!--        <th>Vendor Paid</th>-->
<!--          <th>Total Income</th>-->
          
      

      
        
<!--      </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--     <tr>-->
<!--        <td>-->
<!--       <php -->

<!-- $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");-->
<!--       if ($conn-> connect_error) {-->
<!--        die("Connection failed:". $conn-> connect_error);-->
<!--       }-->

<!--       $query="select sum(net_total) as `sumnet_total` from invoice";-->
<!--       $res=mysqli_query($conn, $query);-->
<!--       $data=mysqli_fetch_array($res);-->

<!--       $sumnet_total = $data["sumnet_total"];-->
<!--       echo $sumnet_total;-->




<!-- ?>-->
<!--        </td>-->
<!--        <td> -->
<!--          <php -->

<!--    $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");-->
<!--       if ($conn-> connect_error) {-->
<!--        die("Connection failed:". $conn-> connect_error);-->
<!--       }-->

<!--       $query="select sum(paid) as `sumpaid` from invoice";-->
<!--       $res=mysqli_query($conn, $query);-->
<!--       $data=mysqli_fetch_array($res);-->

<!--       echo "".$data["sumpaid"];-->

<!--        ?>-->
<!--</td>-->
<!--        <td><php -->

<!--     $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");-->
<!--       if ($conn-> connect_error) {-->
<!--        die("Connection failed:". $conn-> connect_error);-->
<!--       }-->

<!--       $query="select sum(due) as `sumdue` from invoice";-->
<!--       $res=mysqli_query($conn, $query);-->
<!--       $data=mysqli_fetch_array($res);-->

<!--       echo "".$data["sumdue"];-->

<!--        ?>-->
          
<!--        </td> -->
<!--        <td><php -->

<!--     $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");-->
<!--       if ($conn-> connect_error) {-->
<!--        die("Connection failed:". $conn-> connect_error);-->
<!--       }-->

<!--       $query="select sum(vendor_paid) as `sumvendor_paid` from invoice_details";-->
<!--       $res=mysqli_query($conn, $query);-->
<!--       $data=mysqli_fetch_array($res);-->

<!--        $sumvendor_paid =$data["sumvendor_paid"];-->
<!--       echo $sumvendor_paid;-->

<!--        ?></td>-->
<!--        <td> <php -->
      
          
<!--           echo  $sumnet_total-$sumvendor_paid;-->


 
<!--     ?>  -->
<!--</td>-->
        <!--<td>-->
        <!--	<a href="#"class="btn btn-danger btn-sm">Delete</a>-->
        <!--    <a href="#"class="btn btn-info btn-sm">Edit</a>-->
        <!--</td>-->
<!--      </tr> -->
     
     
<!--   </tbody>-->
<!--  </table>-->
<!--</div>-->



<!--//total sub for visa pakege ticket-->

  <div class="container">
              
  <table class="table table-hover table-bordered mr-auto">
      
    <thead>
      
      <tr>
        <h4>Starting Office Docs PC Marketing Promotion</h4>
      <h4>CASH IN HAND</h4>
      <h4>Adjust with Farhan Tickets</h4>
    
         <th>Months</th>
         
         <th>Air Ticket</th> 
         <th>Visa</th></br>
        <th>package</th>
          <th>Total Income</th>
          <th>Expenses</th>
          <th>Profit/Loss</th>
          
        
       </tr>
    </thead>
    <tbody>
     <tr>
     
          <td> 
           <?php 
      $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
     // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

      $query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Ai` FROM `invoice_details` WHERE product_name ='Air ticket'&'package'&'visa' group by date(invoice_details.order_date), monthname(invoice_details.order_date), year(invoice_details.order_date)";


        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
       $query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Pack` FROM `invoice_details` WHERE product_name ='Package' group by date(invoice_details.order_date), monthname(invoice_details.order_date), year(invoice_details.order_date)";
       $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      $total_Pack =$row ["total_Pack"];
      
      


$query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Visa` FROM `invoice_details` WHERE product_name ='Visa' group by date(invoice_details.order_date), monthname(invoice_details.order_date), year(invoice_details.order_date)";
$res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      //$total_Pack =$row ["total_Pack"];
        $total_Visa =$row ["total_Visa"];
//$total_Pack =$row ["total_Pack"]; 
 
 
$query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Air` FROM `invoice_details` WHERE product_name ='Air Ticket' group by month(invoice_details.order_date),monthname(invoice_details.order_date), year(invoice_details.order_date)";

        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      // $sumvendor_pa =$row ["total_Visa"]; 
    // echo $sumvendor_pa. "<br/>" ;
     $sumvendor_p =$row ["year(invoice_details.order_date)"]. "\n" ."</br>" ; 
      
      $sumvendor_pa =$row ["monthname(invoice_details.order_date)"]  ;

      echo $sumvendor_pa ;
      echo $sumvendor_p ;
       //$sumvendor_paid =$row ["product_name"];
        // echo "\n",$sumvendor_paid . "\n" ;
        // $sumvendor_paid = preg_split("/\r\n|\n|\r/", $sumvendor_paid);
         
      // $sumvendor_pai =$row ["sum(invoice_details.price) - sum(invoice_details.vendor_paid)"];
      // echo $sumvendor_pai ; 
//break;
      // print_r($res);
       } 
}
}
 }
    ?>
           </td>



           <td><?php 
    $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
       // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        $query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Air` FROM `invoice_details` WHERE product_name ='Air Ticket' group by month(invoice_details.order_date), year(invoice_details.order_date)";

      


        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      
       $total_Air =$row ["total_Air"]; 
    echo $total_Air. "<br/>" ;
    // $sumvendor_p =$row ["year(invoice.order_date)"]. "\n"  ; 
      
      //$sumvendor_pa =$row ["monthname(invoice.order_date)"]  ;

     // echo $sumvendor_pa ;
     // echo $sumvendor_p ;
       //$sumvendor_paid =$row ["product_name"];
        // echo "\n",$sumvendor_paid . "\n" ;
        // $sumvendor_paid = preg_split("/\r\n|\n|\r/", $sumvendor_paid);
         
      // $sumvendor_pai =$row ["sum(invoice_details.price) - sum(invoice_details.vendor_paid)"];
      // echo $sumvendor_pai ; 
//break;
      // print_r($res);
       } 

    ?> </td>
      
        <td>      <?php 
      $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
   //  $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

      $query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Visa` FROM `invoice_details` WHERE product_name ='Visa' group by month(invoice_details.order_date), year(invoice_details.order_date)";


        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      
       $total_Visa =$row ["total_Visa"]; 
    echo $total_Visa. "<br/>" ;
     
       } 

    ?></td>
<td>  <?php 
      $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
     // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

      $query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Pack` FROM `invoice_details` WHERE product_name ='Package' group by month(invoice_details.order_date), year(invoice_details.order_date)";


        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      
       $total_Pack =$row ["total_Pack"]; 
   echo  $total_Pack.  "<br />\n";
      
       } 

    ?></td>
  <td>
  <?php 
    $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
  // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

      $query="SELECT product_name, monthname(invoice_details.order_date), year(invoice_details.order_date), sum(price)-sum(vendor_paid) as `total_Visa` FROM `invoice_details` WHERE product_name ='Air ticket'&'package'&'visa' group by month(invoice_details.order_date), year(invoice_details.order_date)";


        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      
       $total_Visa =$row ["total_Visa"]; 
       echo $total_Visa. "<br/>";+$total_Pack. "<br/>";+$total_Air. "<br/>";
   // echo $total_Visa. "<br/>";
     $b= $total_Visa. "<br/>";+$total_Pack. "<br/>";+$total_Air. "<br/>";
       } 

 //    echo $c+$b+$a;

    
// print_r ($c);
//print_r ($b);
//print_r ($a);
    ?> 

      
    </td>
 <td><?php 
   $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
      //$conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

     
 
$query="SELECT monthname(cash.month), year(cash.month), caid, SUM(tick)+SUM(vis)+SUM(packa)+SUM(incom) FROM cash GROUP BY month(cash.month),year(cash.month)";

        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      $su =$row ["caid"]; 
    
      $Total =$row ["monthname(cash.month)"];
     $sumvend =$row ["year(cash.month)"]."</br>" ; 
    $tt=$row["SUM(tick)+SUM(vis)+SUM(packa)+SUM(incom)"]."</br>";
   
   echo $tt ;
    
 
 }
 ?>
</td>

<td> 


<?php 
    $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
  //   $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
 $query="select q1.cmonth, q1.cyear, q2.total_Visa - q1.expsum as yes from (SELECT monthname(cash.month) as cmonth, year(cash.month) as cyear, caid, SUM(tick)+SUM(vis)+SUM(packa)+SUM(incom) as expsum FROM cash GROUP BY month(cash.month),year(cash.month)) as q1, (SELECT product_name, monthname(invoice_details.order_date) as idmonth, year(invoice_details.order_date) as idyear, sum(price)-sum(vendor_paid) as `total_Visa` FROM `invoice_details` WHERE product_name ='Air ticket'&'package'&'visa' group by month(invoice_details.order_date), year(invoice_details.order_date) ) as q2 where q1.cmonth = q2.idmonth and q1.cyear = q2.idyear";
 
 $res=mysqli_query($conn, $query);
  while($row = $res->fetch_assoc()){
     
   //$su =$row ["caid"];
     $yes =$row ["yes"]; 
       echo $yes. "<br/>\n";
 //  echo $total_a. "<br/>";
    // $b= $total_Visa. "<br/>";+$total_Pack. "<br/>";+$total_Air. "<br/>";

//q2.total_Visa - q1.expsum
  //  print_r($res);
 
  }
 ?>
  
     
 </td>
  </tr>
 </tbody>
    
  
 







            <!--//salary bonus-->

<div class="container">
              
  <table class="table table-hover table-bordered mr-auto">
      
    <thead>
      
      <tr>
        <h4>Salary&Bonus</h4>
     
    
         <th>Month</th>
         
         <th>Rent</th> 
         <th>Salary & Bonus</th>
        <th>Utility</th>
          <th>MKT</th>
          <th>Total</th>
        
           <th> <a href="#"data-toggle="modal" data-target="#exampleModalCash" class="btn btn-primary">Add</a></th>
       </tr>
       
 <!--   </thead>-->
 <!--   <tbody>-->
 <!--       <tr>-->
 <!--           <td></td>-->
 <!--           <td></td>-->
 <!--           <td></td>-->
 <!--           <td></td>-->
 <!--           <td></td>-->
 <!--           <td></td>-->
             
 <!--</tr>-->
 <!--     </tr>-->
    </thead>
    <tbody>
      <tr>
        <td><?php 
    $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
      // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

     
 
$query="SELECT monthname(cash.month), year(cash.month), caid, SUM(tick)+SUM(vis)+SUM(packa)+SUM(incom)  FROM cash GROUP BY month(cash.month),month(cash.month),year(cash.month)";

        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      $su =$row ["caid"]; 
    // echo $sumvendor_pa. "<br/>" ;
        // $sumvendor_pa =$row ["monthname(cash.months)"]   ;
    // $sumvendor_p =$row ["year(cash.months)"]."</br>" ; 
      $Total =$row ["monthname(cash.month)"];
     $sumvend =$row ["year(cash.month)"]."</br>" ; 
   // $tt=$row["SUM(tickets)+SUM(visa)+SUM(package)+SUM(income)"];
     echo $Total ;
  echo $sumvend ;
 
 }
 ?></td>
 <td><?php 
        $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
      // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

       $sql = "SELECT monthname(cash.month), year(cash.month), `caid`, `month`, `vis`, `tick`, `packa`, `incom`, `expense` FROM `cash` GROUP BY month(cash.month),year(cash.month)";
     //  $result = $conn-> query($sql);
         
      $result=mysqli_query($conn, $sql);
 
  while($row = $result->fetch_assoc()){
     
  
     $yes =$row ["vis"]; 
       echo $yes. "<br/>\n";
 
  }

        
     
    
        
          
         

     ?></td>
 <td><?php 
      $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
    // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

         $sql = "SELECT monthname(cash.month), year(cash.month), `caid`, `month`, `vis`, `tick`, `packa`, `incom`, `expense` FROM `cash` GROUP BY month(cash.month),year(cash.month)";
      $result=mysqli_query($conn, $sql);
 
  while($row = $result->fetch_assoc()){
     
  
     $yes =$row ["tick"]; 
       echo $yes. "<br/>\n";
 
  }

         

     ?> </td>
 <td><?php 
         $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
      // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

         $sql = "SELECT monthname(cash.month), year(cash.month), `caid`, `month`, `vis`, `tick`, `packa`, `incom`, `expense` FROM `cash` GROUP BY month(cash.month),year(cash.month)";
    $result=mysqli_query($conn, $sql);
 
  while($row = $result->fetch_assoc()){
     
  
     $yes =$row ["packa"]; 
       echo $yes. "<br/>\n";
 
  }

     ?></td>
 <td><?php 
       $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
      // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

         $sql = "SELECT monthname(cash.month), year(cash.month), `caid`, `month`, `vis`, `tick`, `packa`, `incom`, `expense` FROM `cash` group by month(cash.month), year(cash.month)";
       $result=mysqli_query($conn, $sql);
 
  while($row = $result->fetch_assoc()){
     
  
     $yes =$row ["incom"]; 
       echo $yes. "<br/>\n";
 
  }


     ?></td>
 <td><?php 
     $conn =mysqli_connect("localhost", "root", "", "id8384032_project_inv");
   //  $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
        

     
 
$query="SELECT monthname(cash.month), year(cash.month), caid, SUM(tick)+SUM(vis)+SUM(packa)+SUM(incom) FROM cash GROUP BY month(cash.month),year(cash.month)";

        $res=mysqli_query($conn, $query);
       while ($row = $res->fetch_assoc()){
      $su =$row ["caid"]; 
    
      $Total =$row ["monthname(cash.month)"];
     $sumvend =$row ["year(cash.month)"]."</br>" ; 
    $tt=$row["SUM(tick)+SUM(vis)+SUM(packa)+SUM(incom)"]."</br>";
   
   echo $tt ;
    
 
 }
 ?></td>
    




        
    </tbody>
  </table>
</div>


        <?php include_once("./templets/cash.php"); ?>
<?php 
include_once("./templets/update_log.php");
?>

</body>
</html>











 