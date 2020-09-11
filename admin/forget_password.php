<?php

include "./database/db.php";
$db= new Database;

?>
<h3>Request for new password</h3>
<hr>
<p>Enter Your Email Address</p>
<form action="" method="post">
    <input type="email" name= "recovery_email" placeholder="Enter your email" required/> <br/><br/>
    <input type="submit" name="lost_password" value="Request new password"/>
</form>
<?php
if(isset($_POST["lost_password"])){
	$email = mysqli_real_escape_string($db->con,$_POST["recovery_email"]);
	$sql = "SELECT id FROM user_info WHERE u_email= '$email' LIMIT 1";
	$query = mysqli_query($db->con,$sql);
	if(mysqli_num_rows($query) == 1){
		$row = mysqli_fetch_array($query);
		$uid = $row["id"];
		$to=$email;
		$sub="Reset Password";
		$msg = "please click on the link or coppy url to reset your password</br>";
		$msg .="http://www.yourdomainname.com/password_reset.php?uid=".$uid."&email=".$email;
		$header = "From : header";
		if(mail($to,$sub,$msg,$header)){
			echo "please confirm your email to reset your password";
			exit();
		}
	}else{
		echo "your email address not exits";
	}

}

?>