<?php
      include_once("./database/constants.php"); 
    if(!isset($_SESSION["user"])){
      header("location:".DOMAIN."/");
    }
     
      ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MOVIE WORLD</title>
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

  
<?php include_once("./templates/headers.php"); ?>
      <br/> 
       <?php include_once("./search2.php"); ?>

      <div class="container">
              
  <table class="table table-hover table-bordered mr-auto">
    <thead>
      <tr>
         <th>Sl</th>
         <th>Movie Name</th>
          <th>Catagory</th>
         <th>Rating Catagory</th>
        <th>Release_Date</th>
         <th>Rating</th>
         <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <tr>
         <?php 
     if (isset($_GET['pagen'])) {
            $pagen = $_GET['pagen'];
        } else {
            $pagen = 1;
        }
         $no_of_records_per_page =20;
        $offset = ($pagen-1) * $no_of_records_per_page;

;
       $conn =mysqli_connect("localhost", "root", "", "dearlife_inventory");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

        $total_pages_sql = "SELECT COUNT(*) FROM invoice";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_row= mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_row / $no_of_records_per_page);
 

         $sql = "SELECT `id`, `coustomer`, `c_nam`, `t_n`, `coun_nam`, `rating` FROM `customer` ORDER BY `id` DESC LIMIT $offset, $no_of_records_per_page ";
         $result = $conn-> query($sql);
         if ($result-> num_rows > 0){
          while($row = $result-> fetch_assoc()){
            echo "<tr>
            <td>" .$row["id"] ."</td>
            <td>" .$row["coustomer"] ."</td>

            <td>" .$row["c_nam"] ."</td>
             
            <td>" .$row["coun_nam"] ."</td>
             <td>" .$row["t_n"] ."</td>
           <td>".$row["rating"] ." out of 5 </td>
            <td><a href='update_details23.php?id=$row[id]&rating=$row[rating]' class='btn btn-danger btn-sm'>Rating</a></td>
             
             </tr>";
          }
         }
         


if (isset($_POST["deleteCoustomer"])){
	$m = new Manage();
	$result = $m->deleteRecord("coustomer","invoice_no",$_POST["invoice_no"]);
	echo $result;
 }
     ?>

      </tr>
    </tbody>
  </table>
</div>


   
</div>

</body>

</html>
