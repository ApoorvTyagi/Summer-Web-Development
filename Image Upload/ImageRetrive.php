<html>
<head>
<style>

#detail {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#detail td {
  border: 1px solid #ddd;
  padding: 5px;
  text-align: center;
  width:20%;
}

#detail tr:nth-child(even){background-color: #f2f2f2;}

#detail tr:hover {background-color: #ddd;}

#detail th {
  padding-top: 12px;
  padding-bottom: 12px;
  border: 1px solid #ddd;
  width:20%;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<h1><center>Image Details</h1>
<?php
	$con=mysqli_connect("localhost","root","","practice");
	if($con){
		$q=mysqli_query($con,"select * from image");
		?>
		<table id="detail">
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Image Name</th>
				<th>User Name</th>
				<th>Image</th>
			</tr>
		</table>	
		<?php	
		while($rows=mysqli_fetch_array($q))
		{
			?>
			<table id="detail">
			<tr>
			<td><?php echo $rows[0]; ?></td>
			<td><?php echo $rows[1]; ?></td>
			<td><?php echo $rows[2]; ?></td>
			<td><?php echo $rows[3]; ?></td>	
			<td><?php echo "<img src='Upload/$rows[2]' width=50px height=50px>"?></td>
			</tr>
			</table>
			
			<?php		
		}
	}
	else
		echo "There was a error in connection";
?>
