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



 <body background="./images/Capture.PNG" style="500%">    
<body background="./images/2.jpg" style= "mx-auto">


<div class="col-sm-4">
         <div class="card">
          <div class="card-body">
           <h4 class="card-title">New Order</h4>
           <p class="card-text">Manage your Order.</p>
        
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
     
   
      <div class="col-sm-6">
      <!---//watch---->
      <iframe src="https://free.timeanddate.com/clock/i6i0ahze/n100/szw240/szh240/hocc90/hbw19/hfcff9/cf100/hgr0/hcc90/hcw11/hcd100/fan2/fas20/fac900/fdi70/mqc090/mqs3/mql13/mqw4/mqd94/mhc00f/mhs3/mhl13/mhw4/mhd94/mmc000/mml5/mmw2/mmd94/hwm2/hhs2/hhb18/hms2/hml80/hmb18/hmr7/hscf09/hss1/hsl90/hsr5" frameborder="0" width="260" height="260"></iframe>


</div>

     
</div> 

     
</div> 


  <!-- Modal -->
  <?php include_once("./templates/category.php"); ?>
  <?php include_once("./templates/brand.php"); ?>
   <?php include_once("./templates/products.php"); ?>
    <?php include_once("./templates/customer.php"); ?>
  <?php include_once("./templates/order.php"); ?>
  <?php include_once("./templates/cash.php"); ?>
 
</body>
</html>
