 
   <!DOCTYPE html>
<html>
<head>
   
  <title>Tours & Travels-Dear Life BD Tours & Travels</title>
  <link rel="stylesheet" type="text/css" href="css/new.css">
      
</head>

<body>
    <div class="container"  style="90%">
              
  <table class="table table-hover table-bordered mx-auto">
    
     
    


    <form method="POST">
        <input type="text" name="coustomer" id= "coustomer" placeholder = "Movie Name">
        <input type = "submit" name = "coustomer-submit" id="coustomer-submit" value = "Search" class="btn btn-info">
   
    </form>    
  </div>
    </body>
    </html>
    
<?php
 $conn =mysqli_connect("localhost", "root", "", "dearlife_inventory");
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }
       
       if (isset($_POST['coustomer'])) {
           $coustomer= $_POST['coustomer'];
           
           $sql = "SELECT `id`, `coustomer`, `c_nam`, `t_n`, `coun_nam` FROM `customer` Where coustomer = '".$coustomer."'";
         $result = $conn-> query($sql);
         if ($result-> num_rows > 0){
          while($row = $result-> fetch_array()){
          //  print_r($result);
    //   $result= $row['coun_name'];
          //     echo $result ."</br>";
             //  $resul= $row['sub_total'];
              // echo $resul ."</br>";
   //  $output = '<h2>'.$result.'</h2></br>';
            echo "<tr>
            
           
            <td>" .$row["id"] ."</td>
            <td>" .$row["coustomer"] ."</td>
            <td>" .$row["c_nam"] ."</td>
            <td>" .$row["t_n"] ."</td>
            <td>" .$row["coun_nam"] ."</td>
           
          </tr>" ."</br>";
                   
            }
         
           
           }
   }
       

?>

  
 