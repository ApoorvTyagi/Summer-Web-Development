<?php
session_start();
if(isset($_SESSION["name"])){
	include("app.php");
	echo "Hello : ".$_SESSION["name"];
}
else
	header("Location:logout.php");
?>