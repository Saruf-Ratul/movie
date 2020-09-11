<?php
      include_once("./database/constants.php"); 
      if(!isset($_SESSION["user"])){
        header("location:".DOMAIN."/");
      }
     
      ?>
<!--  Naver -->
     <?php
      include_once("./templates/headers.php"); 
      ?>


    </br>

<div class="col-sm-4">
         <div class="card">
          <div class="card-body">
           <h4 class="card-title">Hello Dear</h4>
           <p class="card-text">Manage & View Your Movie .</p>
        
      <a href="#"data-toggle="modal" data-target="#exampleModalCustomer" class="btn btn-primary">Add Movie </a>
                <a href="manage_addcustomer.php" class="btn btn-primary">View Movie</a>
          </div>
         </div>
    
        </div>

 

<p></p> 
      <div class="col-md-4">
      <div class="Jumbotron" style="width : 100%; height: 20%;">
      <h1 style="color:Green">WelCome <?php  if (isset($_SESSION['user'])) ?>
			<?php echo $_SESSION['user']['username']; ?></h1>
      <div class="row">
     
      <p></p> 
    
 </div> 
    
     
</div> 


<?php include_once("./templates/customer.php"); ?>
 
 
</body>
</html>