<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php include("app.php"); ?>
<h1>Delete Account</h1>
<form method="post">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="opassword" placeholder="Password">
  </div>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="npassword" placeholder="Re-enter Password">
  </div>
  <div class="input-group">
	<br><button type="submit" class="btn btn-success" name="b1">Delete</button><br><br>
  </div>	  
</form>
</body>
</html>

<?php
if(isset($_POST["b1"]))
{
	$con=mysqli_connect("localhost","root","","practice");
	if($con)
	{
		$mail=$_POST["email"];
		$opass=$_POST["opassword"];
		$npass=$_POST["npassword"];
		
		$query=mysqli_query($con,"select * from info where email= '".$mail."' and password='".$opass."' ");
		
		if(mysqli_fetch_array($query)>0 && $npass===$opass)
		{
			$q=mysqli_query($con,"delete from info WHERE Email = '".$mail."' and Password='".$opass."' ") ;

			if($q)
			{
			echo "<script type='text/javascript'>";
			echo "alert('Account Deleted Sucessfuly');";
			echo "</script>";
			}
		}	
		else{
			echo "<script type='text/javascript'>";
			echo "alert('Email and password does not match!!!!');";
			echo "</script>";
		}
	}
	else{
		echo "Not Connected";
	}
}
?>