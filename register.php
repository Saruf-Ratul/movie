<?php
      include_once("./database/constants.php"); 
      
     
      ?> 
     <?php include_once("./templates/header.php"); ?>
 
      <div class="container"> 
      <div class="card mx-auto" style="width: 30rem ;">
      
      <div class="card-body">
      <div class="card-header" style="background-color: #fCDB07;">Register</div>
      <div class = "card-body">
        <form id= "register_form" onsubmit="return false" autocomplete= "off">
        <div class="form-group">
      <label for="username"  style="background-color: #E5E9D5;">FULL Name</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
      <small id="u_error" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
      <label for="email"style="background-color: #E5E9D5;">Email address</label>
      <input type="email" name= "email" class="form-control" id="email" aria-describedby = "emailHelp" placeholder="Enter email">
      <small id="e_error" class= "from-text text-muted">never share your email with any one else </small>
     </div>
     <div class="form-group">
      <label for="password1"style="background-color: #E5E9D5;">Password</label>
     <input type="Password" name="password1" class="form-control" id="password1" placeholder="Password">
      <small id="p1_error" class= "from-text text-muted"></small>
     </div>
     <div class="form-group">
      <label for="password2"style="background-color: #E5E9D5;">Re-enter 
      Password</label>
     <input type="Password" name="password2" class="form-control" id="password2" placeholder="Password">
      <small id="p2_error" class= "from-text text-muted"></small>
    </div> 


     <div class="form-group">
      <label for="usertype"style="background-color: #E5E9D5;">Usertype</label>
      <select name= "usertype" class="form-control" id="usertype">
        <option value="">Choose User Type</option>
        <option value="1">Admin</option>
        <option value="0">Other</option>
      </select>
       <small id="t_error" class= "from-text text-muted"></small>
     
    </div> 

    <button type="submit" name="user_register" class="btn btn-primary" ><span class= "fa fa-user"></span>&nbsp;Register</button>
     
   <button> <span><a href="index.php"><span class="fa fa-lock"></span>&nbsp; Login </a></span></button>
    </form>
      </div>
    </div>
    </div>
    </div>    
