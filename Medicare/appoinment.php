<!--Author:Rahul Prasad
    Page Name:Appoinment.php
	-->
<?php 
include('header.php');
include('doctor_header.php');
?>
<html>
<head><title>view</title>
<style>


body{background-image: url('images/1.jpg');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}

table{
	text-align:center;
	border-collapse:collapse;
	width:50%;
	color:black;
	text-align:left;
	font-family:comic sans MS;
	margin:50px;
	
}
.a td,th{
	text-align:center;
}
.a th{
	background-color:#d96455;
}
h1{text-align:center;background-color:#606269;color:white;height:50px;}
</style>
</head>
<h1 style="margin:20px;">FIXED APPOINMENTS</h1>
<div align="center">
<form method="post">
<table>
<tr><td>Date:</td>
 <td><input type="date"  name="date" style="width:250px;
	height:10px;
	 margin:10px;
	 padding:20px;
	 background-color:rgba(0,0,0,0.8);
	 color:white;
	 outline:none;
	 border:1px solid #5b80a4;
	 transition:0.5s;"></td></tr>
 <tr><td></td><td>	<input type="submit" name="submit"  value="Submit" style="background-color:rgba(0,0,0,0.6);
		color:white;
		outline:none;
		border-radius:30px;
		border:1px solid #5b80a4;
		 margin:5px;
		 height:10px;
		 padding:20PX;
		 width:100px;"></td></tr>
		
 </table>
 </div>
 
 <?php
 session_start();
 include('dbcon.php');
 
 $d_id=5;
 
 	
 if(isset($_POST["submit"]))
 {
	 $date=$_POST['date'];
	 $sql="select *from calendar where date='$date' and d_id='$d_id' and status=1";
	    $res=$conn->query($sql);

if($res)
{
if($res->num_rows > 0)
{
	echo'<table class="a" border="" align="center">';
	echo "<tr><th>NAME</th><th>REASON</th><th>CONSULT</th><th>VIEW MEDICAL RECORD</th></tr>";
while($row=$res->fetch_assoc())
	
{
	$pid=$row["p_id"];
	
	
	
	    echo "<tr><td>".$row["p_name"]."</td><td>".$row["reason"]."</td>"; 
		echo '<td> <a href="consult.php?pid='.$pid.'"><input type="button" value="CONSULT"> </a>';
		echo '<td> <a href="view_record.php?pid='.$pid.'"><input type="button"  value="View Med-Record"> </a></tr>';	
	
}


echo "</table>";

	
	
/*foreach ($res as $row)
{
	
	if(isset($_POST[$pid]))
	{
		echo $pid;
		if($_POST[$pid] and $row["p_id"] )
		{
			$_session['pid']=$pid;
			if(isset($session_p['pid']))
			{
				header("location:consult.php");
			}
		}
	}
}*/
}
else{
	echo "0 result";
}





$conn-> close();
} }

include('footer.php');

?>