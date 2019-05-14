<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
    
  <style>
  #but1{
	width: 250px;
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }
  </style>
</head>
<body>
<?php include("app.php"); ?>
<h1><center>Login & Retrieval</center></h1>
<form method="post">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div>
	<br><center><button type="submit" id="but1" name="b1">Login</button></center>
  </div>	  
</form>
</body>
</html>
<?php
session_start();
if(isset($_POST["b1"]))
{
	$con=mysqli_connect("localhost","root","","practice");
	if($con)
	{
		$mail=$_POST["email"];
		$pass=$_POST["password"];
		
		$q=mysqli_query($con,"select * from info where Email='".$mail."' and Password='".$pass."'");
		if($rows=mysqli_fetch_array($q))
		{
			?>
			<table border="1">
			<tr>
			<td>First Name:</td>
			<td><?php echo $rows[0]; $_SESSION["name"]=$rows[0]." ".$rows[1];?></td>
			</tr>
			
			<tr>
			<td>Last Name:</td>
			<td><?php echo $rows[1]; ?></td>
			</tr>
			
			<tr>
			<td>Email ID:</td>
			<td><?php echo $rows[2]; ?></td>
			</tr>
						

			<tr>
			<td>Gender:</td>
			<td><?php echo $rows[4]; ?></td>
			</tr>
			
			<tr>
			<td>DOB:</td>
			<td><?php echo $rows[5]; ?></td>
			</tr>
			
			<tr>
			<td>City:</td>
			<td><?php echo $rows[6]; ?></td>
			</tr>
			
			<tr>
			<td>Mobile No.:</td>
			<td><?php echo $rows[7]; ?></td>
			</tr>
						<tr>
			<td>Address:</td>
			<td><?php echo $rows[8]; ?></td>
			</tr>
			
			<tr>
			<td>Zip Code:</td>
			<td><?php echo $rows[9]; ?></td>
			</tr>
			
			</table>
			<?php	
				
		}
	}
	else
		echo "There was a error in connection";
}
?>