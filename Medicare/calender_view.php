
<!--Author:Linu -->
<?php include('dbcon.php');
include('header.php'); 
include('doctor_header.php');
?>
<html>
<head>
<style>
table{ margin:30px;}
table tr td{ padding:15px;}
table{ width:50%}
td{ background-color:#5b80a4;color:white;text-align:center;}
th{ padding:5px;}	
body{background-image: url('images/1.jpg');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}
</style>
</head>
</html>

<?php

session_start();
	echo ' <center><div> <form style="margin:40px;padding:20px;">';
	echo '<table border="">';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Reason</th>';
echo '<th>Status</th>';

echo '</tr>';

$date=$_SESSION['date'];
$sql="select * from booking where status=0 and date='$date' and d_id=3";

$res=$conn->query($sql);
foreach($res as $row)
{
	//$id=$row['p_id'];
	//echo $id;
	$pid=$row["p_id"];
	
	echo '<tr><td>'.$row['name'].'</td> <td>'.$row['reason'].'</td>';
	echo '<td><a href="req_view.php?pid='.$pid.'"><input type="button" value="ACCEPT"></td></tr>';
    
}	
	


echo '</table></form> </div> </center>';

include('footer.php');

?>

