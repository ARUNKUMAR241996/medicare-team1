<?php

$servername="localhost";
$password="";
$username="root";
$dbname="medicare";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection error".$conn->connect_error);
}
else
{
	//echo "Connected	";
}



?>