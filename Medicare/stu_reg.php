<?php include('header.php'); ?>
<?php include('head.php'); ?>
<?php

 include("dbcon.php");

 if (isset($_POST['submit']))
{

	$first=$_POST['first'];
	$last=$_POST['last'];
	$user=$_POST['user'];
	$email=$_POST['email'];
	$gender=$_POST['sex'];
	$pass=$_POST['cpass'];
	
if ((isset($_POST['first'])) and  (isset($_POST['last'])) and  (isset($_POST['user'])) and  (isset($_POST['email'])) and  (isset($_POST['sex'])) and  (isset($_POST['cpass'])))
{

	$sql1="select * from p_reg where username='$user' or email='$email'";
	
		$result = $conn->query($sql1);
		if($result->num_rows >= 1) 
		{
		   echo "<script> alert('Email or Username already exist, try something else');</script>";
		}
		else
		{
       
    $sql1="insert into p_reg(f_name,l_name,username,email,gender,password) values ('$first','$last','$user','$email','$gender','$pass')";
    $sql2="insert into login(username,password,user_type,status) values ('$user','$pass',2,0)";

       $s1=$conn->query($sql1);
       $s2=$conn->query($sql2);

		
		if(($s1==1) and ($s2==1))
		{
			echo "<script>alert('successfully Registred'); window.location='login.php'; </script>";
			
		}
		else
		{
			echo "<script>alert('error_log'); window.location='login.php'; </script>";		
		}
		}
}

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/regstyle.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/r1.jpg" alt="">
				</div>
				<form action="" method="POST">
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" name="first">
						<input type="text" placeholder="Last Name" class="form-control" name="last">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="user">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" class="form-control" name="email">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select id="" class="form-control" name="sex">
							<option value="">Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="pass">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" name="cpass">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button name="submit" value="submit">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->