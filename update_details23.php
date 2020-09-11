<?php
      include_once("./database/constants.php"); 
      if(!isset($_SESSION["user"])){
        header("location:".DOMAIN."");
      }
     

      ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dear Life BD Tours & Travels</title>

<!--<script type="text/javascript" src="js/script.js"></script>-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
 <link href="Date/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="Date/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>




  
 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="./includes/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
   <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script> 
  <script type="text/javascript" rel="stylesheet" src="./js/order.js"></script>
      
</head>

<body>

  
<?php include_once("./templates/headers.php"); ?>
      <br/> 

<!--drtgdrgdfgd-->
 
   <form action="" method="POST">

      <div class="container">
   
              
  <table class="table table-hover table-bordered mr-auto">
      
      
    <thead>
      <tr>
        <form>
         <th>Id<span style="color:white">_</span>No  <input readonly type='text'class="form-control form-control-sm" name= 'id' value= '<?php echo $_GET['id']; ?>'/> </th>
          
          
         <div class="form-group">
          <th>Rating Number<span style="color:white">_</span>Name<input type='text'class="form-control form-control-sm" name= 'rating' value= '<?php echo $_GET['rating']; ?>'/></th>
          </div>
       




       <th>Action <input type="submit" name="submit" value="Update"></th> 
        </form>
        
        
        
      </tr>

    </thead>
</table>
 </div>
</form>   
 <tbody>
 <?php         
  
      //update after geting data
   if(isset($_POST["submit"])){
       
     $id=$_POST['id'];
           $rating =$_POST['rating'];
           // $product_name =$_POST['product_name'];
         // $sub_total =$_POST['sub_total'];
        //  $net_total =$_POST['net_total'];
        //  $due =$_POST['due'];
             // $price =$_POST['price'];
               

  //$query = "UPDATE invoice SET invoice_no='$invoice_no', sub_total='$sub_total'  WHERE invoice_no=$invoice_no";
  
  
  $query = "UPDATE customer SET id='$id', rating='$rating' WHERE id=$id";
  $conn =mysqli_connect("localhost", "root", "", "dearlife_inventory");
   // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }else{
           echo "ok";    
           }
      
      
      if(mysqli_query($conn, $query))
      {
          print_r($query);
          echo "Record updated Successfully";
       
      }else{
       print_r($query);
        echo " not update";
      }
      
   }

     
?>
   <?php         
  
      //update after geting data
   if(isset($_POST["submit"])){
       
    
           $rating =$_POST['rating'];
          
          
             
  $query = "UPDATE customer SET id='$id', rating='$rating' WHERE id=$id";
  
  
  $conn =mysqli_connect("localhost", "root", "", "dearlife_inventory");
   // $conn =mysqli_connect("localhost", "id8384032_azom", "321456", "id8384032_project_inv");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }else{
           echo "ok";    
           }
      
      
      if(mysqli_query($conn, $query))
      {
          print_r($query);
          echo "Record updated Successfully";
       
      }else{
       print_r($query);
        echo " not update";
      }
      
   }

     
?>   
     
</tbody>

  



</body>
</html>



