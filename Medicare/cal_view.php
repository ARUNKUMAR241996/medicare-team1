<!-- author:Linu-->
<script>
function validate()
{
	var date=document.forms["view"]["date"].value;
	
	if(date=="")
	{
		alert("enter date");
		
		return false;
	}
}
</script>
<style>
body{background-image: url('images/1.jpg');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}
</style>
<?php 
include("header.php");
include('doctor_header.php');
session_start();
echo ' <center> <div style="border:2px solid black;width:30%;height:300px;background:#5b80a4; margin-top:50px; margin-bottom:30px;">
<h1 style="margin-top:30px;"> SELECT DATE </h1>
<form name="view" method="post" style="padding:40px;" onsubmit="return validate()" >';


echo '
<table>
<tr> <td> DATE </td><td> <input type="date" name="date" style="margin:5px;"> </td><td> <input type="submit" name="ok" value="OK" ">  </td></tr>';

echo '</table> </div> </form> ';

if(isset($_POST['ok']))
{
	$_SESSION['date']=$_POST['date'];
	header("location:calender_view.php");
}


include('footer.php');
?>


