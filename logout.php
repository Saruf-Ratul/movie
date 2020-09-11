<?php
include_once("./database/constants.php");
if (isset($_SESSION["user"])){
	session_destroy();
}
header("location:".DOMAIN."/")

?>