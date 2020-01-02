
<!-- 
Author : ANJU
 -->

<?php

session_start();
include('dbcon.php');
file_get_contents("css/login.css");
file_get_contents("css/style.css");


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
tr,td{padding:20px;text-align:center;}
	   th{background-color:#08034A;color:white}
	   td{border:2px solid black;}

</style>
</head>
<body>

<script>

function validate()
{
	var search=document.forms["create"]["search"].value;
	
	if(search=="")
	{
		alert("enter search options");
		document.forms["create"]["search"].focus();
		return false;
	}

}


	
</script>

  <div >
    <form name="create"
		
		method="POST">
		<!--onsubmit="return validate();"-->
		
		<input style="width:400px;"type="text" placeholder="Doctor/Specialisation/Location.." name="search" class="frm1">
		<input type="submit"  name="submit" value="search" class="btn1">

<?php
if(isset($_POST['search']) and isset($_POST['submit']))
{	
$id=$_POST['search'];
$sql="SELECT * from d_registration where name='$id' or spec='$id' or c_address='$id'";
//echo $sql;
$res=$conn->query($sql);
if($res)
{
	?>
<h1 style="text-align:center;">DOCTOR SEARCH</h1>
<Div style="padding:30px;">
<center>

<form> <center>
<table style=" ;padding:10px;width:90%;">
		<tr><th><b>Doctor Name:</b></th>

	<th><b>Qualification</b></th>

	<th><b>Category</b></th>

	<th><b>Experience</b></th>

	<th><b>Address</b></th>
	
	<th><b>Mobile</b></th>

	<th><b>Email<b></th>

	<th><b>Location</b></th>
	
	<th><b>Available Timings</b></th>
	
	<th><b>Action</b></th>
</tr>


<?php
	
foreach($res as $row)
	{
	?>
		

<tr>
	<td>
	<?php
						$sql="select name from  d_registration";
						$res=$conn->query($sql);
						echo $row["name"];
	?>
					
</td>
	<td>
	<?php
						$sql="select qualification from  d_registration";
						$res=$conn->query($sql);
						echo $row["qualification"];
					?>
</td>
	<td>
	<?php
						$sql="select spec from  d_registration";
						$res=$conn->query($sql);
						echo $row["spec"];
				?>	
</td>
	<td>
	<?php
	
						$sql="select experience from  d_registration";
						$res=$conn->query($sql);
						echo $row["experience"];
				?>	
</td>
	<td>
	<?php
						$sql="select c_address from  d_registration";
						$res=$conn->query($sql);
						echo $row["c_address"];
					?>
</td>
	<td>
	<?php
						$sql="select ph_no from  d_registration";
						$res=$conn->query($sql);
						echo $row["ph_no"];
			?>		
</td>
	<td>
	<?php
						$sql="select email from  d_registration";
						$res=$conn->query($sql);
						echo $row["email"];
				?>	
</td>
	<td>
	<?php
						$sql="select c_address from  d_registration";
						$res=$conn->query($sql);
						echo $row["c_address"];
				?>	
</td>
<td>
	<?php
						$sql="select c_timing from  d_registration";
						$res=$conn->query($sql);
						echo $row["c_timing"];
				?>	
</td>

	<td><input type="submit" name="book" value="Book Now">
</tr>
</table></center>
</form>
<?php	
}

}
}
if(isset($_POST['book']))
{
	//$_SESSION["sid"]=$id;
	
	if(isset($_SESSION["sid"]))
			{
				
				header('location:booking.php');	 
			}	
	else
	{
		header('location:login.php');
	}
	
}
?>

