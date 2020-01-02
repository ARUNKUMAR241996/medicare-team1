<!--Author:varuna Ramachandran
    Page Name:view_record.php
    -->


<?php
include("header.php");
include("doctor_header.php");
?>

<html>
<head><title>appoinment</title>
<style>

table{
	text-align:center;
	border-collapse:collapse;
	width:50%;
	text-align:left;
}

th,td{
	text-align:center;
}
th{
		color:white;
	background-color:#293FAC;
}
</style>
</head>
<body>
<ul>
<li>
	<b><a href="appoinment.php">BACK</a></b>
</li>
</ul>
</body>

<?php
include('dbcon.php');
session_start();


echo '<br><br>';
echo '<center> <form method="POST"><table border="1"> ';
echo '<tr><th> REASON </th><th> MEDICINE </th><th> COMMENT </th>  </tr>';

$pid=$_GET['pid'];		
$sql="SELECT reason,medicine,comment from consult where p_id='$pid' ";
//echo $sql;
$res=$conn->query($sql);

if($res)
{
	foreach($res as $row)
	{
		echo '<tr> <td>'.$row["reason"].' </td><td>'.$row["medicine"].'</td> <td>'.$row["comment"].'</td></tr>';
	}
}
echo'</table>';	
echo '<br><br><br><br><br><br><br><br>';

include("footer.php");
?>
