<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>
  #but1{
	width:80px;
	border: none;
	color: white;
	padding: 10px 20px;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }
  </style>
</head>

<body>
<?php include("app.php"); ?>
<h1><center>Sign Up</h1>

<form method="post"><center>
<table>

<tr>
<td>First Name:</td>
<td><input type="text" class="form-control" name="fname" required></td>
</tr>

<tr>
<td>Last Name:</td>
<td><input type="text" class="form-control" name="lname"></td>
</tr>

<tr>
<td>Email:</td>
<td><input id="email" type="text" class="form-control" name="email" required></td>
</tr>

<tr>
<td>Password:</td>
<td><input id="password" type="password" class="form-control" name="password" required></td>
</tr>

<tr>
<td>Gender:</td>
<td><input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female<br>
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male</td>
</tr>

<tr>
<td>DOB:</td>
<td><input type="date" name="dob"></td>
</tr>

<tr>
<td>City:</td>
<td><label for="sel1">Select:</label>
  <select class="form-control" name="city">
    <option>Meerut</option>
    <option>Delhi</option>
    <option>Kanpur</option>
  </select></td>
</tr>

<tr>
<td>Mobile:</td>
<td><input type="number" class="form-control" name="mob"></td>
</tr>

<tr>
<tr>
<td>Address:</td>
<td><textarea class="form-control" rows="5" name="add"></textarea></td>
</tr>

<td>Zip Code:</td>
<td><input type="number" class="form-control" name="zip"></td>
</tr>

<tr>
<td><input type="reset" class="btn btn-primary" id="but1" value="Reset"></td>
<td><input type="submit" class="btn btn-success" id="but1" name="b1" value="Register"></td>
</tr>

</table>
</form>

</body>
</html>

<?php
if(isset($_POST["b1"]))
{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$pass=$_POST["password"];
	$gender=$_POST["gender"];
	$dob=$_POST["dob"];
	$city=$_POST["city"];
	$mob=$_POST["mob"];
	$add=$_POST["add"];
	$zip=$_POST["zip"];
	
	$con=mysqli_connect("localhost","root","","practice");
	if($con)
	{
		$q=mysqli_query($con,"insert into info values('".$fname."','".$lname."','".$email."','".$pass."','".$gender."','".$dob."','".$city."','".$mob."','".$add."','".$zip."')");
		if($q){
			echo "<script type='text/javascript'>";
			echo "alert('Data inserted Sucessfuly');";
			echo "</script>";
		}
		else{
			echo "<script type='text/javascript'>";
			echo "alert('Problem in  inserting Data');";
			echo "</script>";
		}
	}
	else{
		echo "Not Connected";
	}
}
?>
