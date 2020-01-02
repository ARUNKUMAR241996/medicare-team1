<?php include("header.php");
include("patient_header.php");
session_start();
?>


<h1 align="center">Welcome <?php if(isset($_SESSION["s_name"])and isset($_SESSION["sid"])){
				echo $_SESSION["s_name"];
$id=$_SESSION["sid"];				
			}?> </h1>
<style>
body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;}
</style>
<body><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br>
</body>
<?php include("footer.php");?>