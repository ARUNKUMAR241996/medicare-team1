<!-- Author:Linu -->
<?php
$pid=$_GET['pid'];
//echo $pid;

include("dbcon.php");


$sql="update booking set status=1 where p_id=$pid";
$res=$conn->query($sql);
if($res)
{
	echo '<script>window.location="calender_view.php"; </script>'; 
				
}
else
{
	echo 'error';
}


?>