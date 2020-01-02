<!-- coded by prince 
	css
	validation : Client side[java script]

-->
<?php 
include('header.php'); 
include('head.php'); 
include('dbcon.php');


if(isset($_POST["submit"]))
{
  $uname = trim($_POST['username']);
  $psw = trim($_POST['password']);
  if(empty($uname))
 {
  $error = "enter your username !";
  $code = 1;
 }
 else if(!ctype_alpha($uname))
 {
  $error = "letters only permited";
  $code = 1;
 }
 else if(empty($psw))
 {
  $error = "enter password !";
  $code = 4;
 }
 else if(strlen($psw) < 8 )
 {
  $error = "Minimum 8 characters !";
  $code = 4;
 }
 else
 {
 	$sql="select * from login where username='$uname' and password='$psw' and  user_type='5'";
 // echo $sql;
  $result=$conn->query($sql);
  if($result->num_rows>=1)
	{				
		$_SESSION["sname"]=$uname;
		if(isset($_SESSION["sname"]))
			{
				header('location:admin_home.php');	 
			}	
	}
	else
	{
		echo "<script> alert('Login id or Password or usertype missmatch '); </script>";
	}
 }
}
?>



<DOCTYPE html>
<html>
<title> Admin Login </title>
<head>
	<link rel="stylesheet" href="login.css">
</head>
<body> 
	<form class="box"  name="form"  onsubmit="return check()" method="POST">

	<h1> Login </h1>
<center>
<table align="center" width="50%" border="0">
<?php
if(isset($error))
{
 ?>
    <tr>
    <td id="error" style="color:red; text-align: center;"><?php echo $error; ?></td>
    </tr>
    <?php
}
?>
</table>
<input type="text" name="username" placeholder="User Name" value="<?php if(isset($uname)){echo $uname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> />
<input type="password" name="password" placeholder="Your Password" <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> />
<input type="submit" name="submit" value="Login"/>
</form>
</body>
</html>

<!-- Startting Java Script -->
<script type="text/javascript">
	var username=document.forms['form']['username'];
	var password=document.forms['form']['password'];
	//error variables
	var name_error=doument.getElementById("name_error");
	var password_error=doument.getElementById("password_error");

	//validation function

	function check()
	{
		if(username.value=="")
		{
			alert('enter name');
			username.focus();
			return false;
		}
		if(password.value=="")
		{
			alert('plz enter password');
			password.focus();
			return false;
		}
	}

</script> 



