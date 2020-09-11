

<?php include_once("./templates/header.php"); ?>
      <br/> <br/>


<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2>Login</h2>
  </div>
  
  <form method="post" action="login.php">

    <?php echo display_error(); ?>

    <div class="input-group">
      <label>Email</label>
      <input type="text" name="email" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_btn">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
 



   <div class="card-footer"> <button> <span><a href="forget_password.php"><span class="fa fa-password"></span>&nbsp;Forget Password</a></span></button></div>
    </form>
     </div>
    
</div>
</div>
