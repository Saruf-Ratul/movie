
<!DOCTYPE html>
<html>
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=100">

  <title>MOVIE WORLD</title>
<!--<link href="Date/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
<!--    <link href="Date/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">-->




 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="./includes/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

   <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
      

 <a class="navbar-brand" href="#" style="background-color:   #;" style="max-auto"><h3 style="color:#007bff;">Movie World</h3></a>

<body>

     
  <div class="overlay">
      <div class="loader">
          
      </div>
      </div>


 <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="max-auto">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-1 mt-lg-0">
      <li class="nav-item active">

 
    <ul class="navbar-nav mr-auto">
      
  
     
    </br>

   
    
    
    <?php 
if(isset($_SESSION["user"])){
        ?>
      
        <li class="nav-item active">
        <a class="nav-link" href="dashboard.php"> 
        &nbsp;Dashboard</a></li>
      </br>
      
         <?php
       }
    ?>
           
 
    
           
      
      <?php 
if(isset($_SESSION["user"])){
        ?>
      <li class="nav-item active">
        <a class="nav-link" href="create_user.php"> 
        &nbsp;Register</a></li>
      </br>  
      
      
         <?php
       }
    ?>

    
  <?php 
if(isset($_SESSION["user"])){
        ?>
  <li class="nav-item active">
        <a class="nav-link" href="login.php?logout='1'"> 
        &nbsp; Logout</a></li>

          </br> 
          
          


  
         <?php
       }
    ?>
    
   
      
</ul>
</li>
</ul>
</div>
</nav>
</body>
<!--<script type="text/javascript" src="Date/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>-->
<!--<script type="text/javascript" src="Date/bootstrap/js/bootstrap.min.js"></script>-->
<!--<script type="text/javascript" src="Date/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>-->
<!--<script type="text/javascript" src="Date/js/locales/bootstrap-datetimepicker.ua.js" charset="UTF-8"></script>-->
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
</head>
</html>
