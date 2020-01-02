<?php
 include("dbcon.php"); 
 include("header.php"); 
 include("head.php"); 

if (isset($_POST['submit']))
{ 
	
$name=$_POST['name'];
$email=$_POST['email'];
$nid=$_POST['nid'];
$qua=$_POST['qualification'];
$exp=$_POST['exp'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$time=$_POST['time'];
$username=$_POST['username'];
$cpass=$_POST['cpass'];

if ((isset($_POST['name'])) and  (isset($_POST['email'])) and  (isset($_POST['nid'])) and  (isset($_POST['qualification'])) 
	and (isset($_POST['exp'])) and  (isset($_POST['gender'])) and  (isset($_POST['address']))and  (isset($_POST['time'])) and
	 (isset($_POST['username'])) and (isset($_POST['cpass'])))
{
	$sql1="select * from d_registration where username='$username' and email='$email'";
		$result = $conn->query($sql1);
		if($result->num_rows >= 1) 
		{
		   echo "<script> alert('Email or Username already exist, try something else');</script>";
		}
		else
		{

           $sql2="insert into d_registration(name,email,n_id,qualification,experience,gender,c_address,c_timing,username,password) 
           value ('$name','$email','$nid','$qua','$exp','$gender','$address','$time')";

             $sql3="insert into login(username,password,user_type,status) values('$username','$cpass',2,0)";

           $s1=$conn->query($sql2);
           $s2=$conn->query($sql3);
           if(($s1==1) and ($s2==$sql3))
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
<script type="text/javascript">
	function validate()
		{
			var name=document.forms["reg"]["name"].value;
			var email=document.forms["reg"]["email"].value;
			var nid=document.forms["reg"]["nid"].value;
			var qua=document.forms["reg"]["qualification"].value;
			var exp=document.forms["reg"]["exp"].value;
			var gender=document.forms["reg"]["gender"].value;
			var address=document.forms["reg"]["address"].value;
			var time=document.forms["reg"]["time"].value;
			var username=document.forms["reg"]["username"].value;
			var pass=document.forms["reg"]["pass"].value;
			var cpass=document.forms["reg"]["cpass"].value;

    			if(name=="")
					{
						alert("Name can't be blank");
						document.forms["reg"]["name"].focus();
						return false;
					}
				if(email=="")
					{
						alert("email can't be blank");
						document.forms["reg"]["email"].focus();
						return false;
					}else{
					var atpos=email.indexOf("@");
					var dotpos=email.lastIndexOf(".");
				if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
					{
					alert("enter a valid email");
					document.forms["reg"]["email"].focus();
					return false;
					}
				}
				if(nid=="")
					{
						alert("Please enter National identity number");
						document.forms["reg"]["nid"].focus();
						return false;
					}
					if(qua=="")
					{
						alert("Enter qualification");
						document.forms["reg"]["qualification"].focus();
						return false;
					}
					if(exp=="")
					{
						alert("Enter Experience");
						document.forms["reg"]["exp"].focus();
						return false;
					}
					if(gender=="")
					{
						alert("Enter gender");
						document.forms["reg"]["gender"].focus();
						return false;
					}
					if(address=="")
					{
						alert("Enter address");
						document.forms["reg"]["address"].focus();
						return false;
					}
					if(time=="")
					{
						alert("Enter time");
						document.forms["reg"]["time"].focus();
						return false;
					}

    			if(username=="")
					{
						alert("userame can't be blank");
						document.forms["reg"]["username"].focus();
						return false;
					}
					if(pass=="")
					{
						alert("Enter pass");
						document.forms["reg"]["pass"].focus();
						return false;
					}
					if(cpass=="")
					{
						alert("Enter cpass");
						document.forms["reg"]["cpass"].focus();
						return false;


					}
					if(cpass!=pass)
					{
						alert("password dosent match");
						document.forms["reg"]["cpass"].focus();
						return false;
					}
		}
</script>

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
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form onsubmit="return validate()" action="" method="POST" enctype="multipart/form-data" name="reg">
					<h3>Registration Form</h3>
				  <!--   <div class="form-group">
						<input type="text" placeholder="First Name" class="form-control">
						<input type="text" placeholder="Last Name" class="form-control">
					</div> -->
					<div class="form-wrapper">
						<input type="text" placeholder="Name" class="form-control" name="name">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" class="form-control" name="email">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="National identity number" class="form-control" name="nid">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Qualification" class="form-control" name="qualification">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Experience" class="form-control" name="exp">
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Clinic address" class="form-control" name="address">
					</div>
					<div class="form-wrapper">
						<label>Clinic timing</label>
						<input type="time" class="form-control" name="time">
					</div>

					<div class="form-wrapper">
						<input type="text" placeholder="username" class="form-control" name="username">
						<i class="zmdi zmdi-account"></i>

					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="pass">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" name="cpass">
						<i class="zmdi zmdi-lock"></i>
					</div>
					
					<button name="submit" value="submit">Register</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html><br><br><br><br><br><br>