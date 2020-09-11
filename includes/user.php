<?php
	class User
			{
	  		private $con;
  		    function __construct()
			{
	//	include_once("process.php"); 
			include_once("../database/db.php");
			$db=new Database();
			$this->con=$db->connect();
			}
			private function emailExists($email){
				$pre_stmt = $this->con-> prepare("SELECT id FROM user WHERE email = ? ");
				$pre_stmt->bind_param("s",$email);
				$pre_stmt->execute() or die($this->con->error);
				$result = $pre_stmt->get_result();
				if($result->num_rows > 0){
					return 1; 
				}else{
					return 0;
				}
			}
        	public function createUserAccount($username,$email,$password,$usertype ){
	 		if ($this->emailExists($email)){
			return "EMAIL_ALREADY_EXISTS";
		} else{
			  $pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost" =>8]);
			  $date = date("Y-m-d h:m:s");
			  $notes= "";
			  $pre_stmt =$this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
			  $bind_param = $pre_stmt->bind_param("sssssss",$username,$email,$pass_hash,$usertype,$date,$date,$notes);
			  $result = $pre_stmt->execute() or die($this->con->error);
		if ($result){
				return $this->con->insert_id;
			}else{
				return "SOME_ERROR";
			     }
		    }
	}
	  
	public function userLogin($email,$password){
	//$pre_stmt =$this->con->prepare("SELECT id,username,password,usertype FROM user where email=?")
	    $sql = "SELECT id,username,password,usertype FROM user where email='".$email."'";
		$result = $this->con->query($sql);
		//$pre_stmt->bind_param("s",$email);
		//$pre_stmt->execute() or die($this->con->error);
        //$result = get_result($pre_stmt);
        
        
        
      
        
		if($result->num_rows < 1){
		 //  print_r($result);
          	return "NOT_REGISTERD";
          	}else{
//print_r($result);

			$row = $result->fetch_assoc();

			if (password_verify($password,$row["password"])) {
				$_SESSION["userid"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["usertype"] = $row["Admin"];
				$_SESSION["last_login"] = $row["last_login"];
				$last_login = date("Y-m-d h:m:s");
				$pre_stmt = $this->con->prepare("UPDATE user SET last_login = ? WHERE email = ? ");
				$pre_stmt->bind_param("ss",$last_login,$email);
				$result = $pre_stmt->execute() or die ($this->con->error);
		
		
				if ($result){
				    
					return 1;
 //echo $result;
				}else{
					return 0;
				}
			}else{
				return "PASSWORD_NOT_MATCHED";

			}
		}
		
		
	}
	
	
}

 // $user = new user();

 //  echo $user->createUserAccount("Rezaul","rezaul@softcellbd.net","0000000000","Other");

 //  echo $user->userLogin("rezaul@softcellbd.net", "0000000000");        

 //echo $_SESSION["username"]; 
 //

?>
