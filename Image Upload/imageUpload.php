<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>
body {
  background-color: #4CAF50;
}
</style>

</head>

<body>
<h1>Upload Image</h1>
<hr>
<form method="post" enctype="multipart/form-data">
    <h4>Select image to upload:</h4><br>
    <input type="file" class="form-control" name="file"><br>
	<h4>Give Title:</h4>
	<input type="text" class="form-control" name="title"><br>
	<h4>Describe Image:</h4><br>
	<textarea rows="5" class="form-control" name="describe"></textarea><br>
	<h4>User Name:</h4>
	<input type="text" class="form-control" name="uname"><br>

    <input type="submit" class="btn btn-primary" value="Upload Image" name="b1">
</form>
</body>
</html>

<?php
if(isset($_POST["b1"]))
{
	$title=$_POST["title"];
	$describe=$_POST["describe"];
	$uname=$_POST["uname"];
	
	$con=mysqli_connect("localhost","root","","practice");
	if($con){	
	
	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
	$img=$_FILES["file"]["name"];
	$q=mysqli_query($con,"insert into image (TITLE,DESCRIPTION,NAME,USER) values ('".$title."','".$describe."','".$img."','".$uname."')");
	
	if($q){
		echo "<script type='text/javascript'>";
		echo "alert('Image Upoaded Sucessfully');";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "alert('There was an error uploading file');";
		echo "</script>";
	}
	}
	else
	{
		echo "Not connected";
	}
}
?>