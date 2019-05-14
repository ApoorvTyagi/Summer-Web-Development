<?php
session_start();
include("app.php");
if(isset($_SESSION["name"]))
{
	unset($_SESSION["name"]);
	header("Location:logoutscreen.php");
}
else{
	echo " No Active Session!!!";
}
?>