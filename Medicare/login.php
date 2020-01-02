<!-- 
Author : PRINCE  
Client side validation 
Server side validation
Databse Management
 -->

<?php 
include("header.php");
include("head.php");
session_start();
include('dbcon.php');
file_get_contents("css/login.css");
file_get_contents("css/style.css");
?>

<!-- Server Client Validation -->
<script>
    function heck()
    {
        var username=document.forms["form"]["username"].value;
        var password=document.forms["form"]["password"].value;
		var usertype=document.forms["form"]["usertype"].value;
		if(username=="")
        {
            alert("user Name not be null");
            document.forms["form"]["username"].focus();
				return false;
        }
		if(password=="" )
		{
			alert("password not be null");
			document.forms["form"]["password"].focus();
			return false;
		}
	}		
</script>


<!-- Server side Validation -->
<?php
if(isset($_POST["submit"]))
{
    $uname = trim($_POST['username']);
  	$psw = trim($_POST['password']);
  	if(empty($uname))
  	{
		$error = "enter your username !";
		$code = 1;
  	}
  	else if(strlen($uname) < 4 )
  	{
		$error = "Minimum 4 characters !";
		$code = 1;
  	}
  	else if(empty($psw))
  	{
		$error = "enter password !";
		$code = 2;
  	}
  	else if(strlen($psw) < 8 )
  	{
		$error = "Minimum 8 characters !";
    	$code = 2;
  	}
  	else
  	{
 		$uname=$_POST['username'];
		$psw=$_POST['password'];
  		$utype=$_POST['usertype'];
  		$sql="select * from login where username='$uname' and password='$psw' and  user_type='$utype' and status=1";
  	//echo $sql;
  		$result=$conn->query($sql);
  		if($result->num_rows>=1)
		{
			
			if($utype==1)
			{
				$sql12="select id from p_reg where username='$uname' or email='$uname'";
  				//echo $sql;
  				$resul=$conn->query($sql12);
 				//after validation of username and password set session variables id and name 
    			foreach ($resul as $row)
    			{
					$id=$row['id'];
 				}
				$_SESSION["sid"]=$id;
				$_SESSION["sname"]=$uname;
			if(isset($_SESSION["sname"])and isset($_SESSION["sid"]))
			{
				header('location:patient_home.php');	 
			}	
		}
		else if($utype==2)
		{
			$sql12="select id,name from d_registration where username='$uname' or email='$uname'";
  			echo $sql;
  			$resul=$conn->query($sql12);
 			//after validation of username and password set session variables id and name 
    		foreach ($resul as $row)
    		{
				$id=$row['id'];
				$uname=$row['name'];
 			}
			$_SESSION["sname"]=$uname;
			$_SESSION["sid"]=$id;
			if(isset($_SESSION["sname"]) and isset($_SESSION["sid"]))
			{
				header('location:doctor_home.php');						 
			}	
		}
	}
	else
	{
		echo "<script> alert('Login id or Password or usertype missmatch '); </script>";
	}
  }
}
?>

<!-- Form Design  -->

<html>
<head>
<style>
td{padding:10px;}
.admin{
	width:90px; 
	display:inline;
	margin-left:40px;
}
.admin a{ color:white;}
</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<head>
<body background="images/login.jpg";>
<br>
<div class="admin"><a href="admin_login.php" ><b>Admin Login</b> </a>
</div>
<center>
<div class="log" style="height:380px";>
<form name="form"  method="post" onsubmit="return check()">
<div class="head" style="color:white;"><h2>LOGIN</h2></div>
<center>	
<table>
	
	<?php
	if(isset($error))
	{
	?>
		<tr align="center">
		<th id="error" style="color:red; text-align: center;"><?php echo $error; ?></th>
		</tr>
    <?php
	}
	?>
	
</table>
</center>
<table> 
    <tr>
    <td>User Name:</td>
    <td><input type="text" name="username" id="username" class="frm"  value="<?php if(isset($uname)){echo $uname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> /></td>
	</tr>
	<tr>
	<td>password:</td>
    <td><input type="password" name="password" id="password" class="frm"  value="<?php if(isset($uname)){echo $uname;} ?>"  <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?> /></td>
	</tr>
	<tr>
	<td>usertype:</td>
	<td align="center">
	    <select name="usertype" class="frm">
        <option text-align="center" value=0>USER</option>
	    <option align="center"value=1>PATIENT</option>
	    <option align="center"value=2>DOCTOR</option>
		</select>
	</td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Submit" class="btn"></td>
	</tr>
</table>	
</form>
</div>
</center>
</body>
</html> <br><br>

<!-- footer -->
<?php include("footer.php");?>