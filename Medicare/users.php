<!-- author:Prince  -->

<style>
	h1{color: black;}
</style>
<!-- including header and databse connection -->
<?php include('header.php'); 
include('admin_header.php');
include('dbcon.php');
session_start();
echo '<style> 
td,th{ background-color:#5b80a4;
}
td,input[type="text"]{color:black;
text-align:center;}
body{
	background-image: url(images/patient_home.jpg);
	background-size:cover;
	background-repeat:no-repeat;
	background-attachment:fixed;
	color:white;
} 
	</style>';
$sql1="select username from login where status=1";
$res=$conn->query($sql1); 
echo '<center> <br><h1 style="color:black;"> Doctor Details </h1><br><form method="POST"><table border="1"> ';
echo '<tr> <th> Name </th> <th> Email </th> <th> Qualification</th> <th> Gender </th> <th> Category</th>
<th>Clinic Address</th>
<th> Consulting Time</th> </tr>';

//$sql2="select u_name,user_type from users where"
while($row=$res->fetch_assoc())
{
    $email=$row['username'];
	
	$sql2="select * from d_registration where email='$email' or username='$email' ";
	$res2=$conn->query($sql2);
	foreach($res2 as $row)
	{
		echo '<tr> <td> <input type="text" name="name" value="'.$row['name'].'"/>';
		echo '</td> <td>  <input type="text" name="email" value="'.$row['email'].'"/> </td>';	
		echo '<td> <input type="text" name="qualification" value="'.$row['qualification'].'"/> </td>';		
		echo ' <td> <input type="text" name="gender" value="'.$row['gender'].'"/> </td>
		 <td> </td>
		<td> <input type="text" name="gender" value="'.$row['c_address'].'"/></td> <td> <input type="text" name="gender" value="'.$row['c_timing'].'"/></td> <td>';
		

		
		echo '<input type="submit" name="'.$row['id'].'" value="EDIT">';
		
		echo '</td> </tr>';
		
		
		
	}
	
	foreach($res2 as $row)
		{
			if(isset($_POST[$row['id']]) and $row['id'])
			{
			$s="update login set status=1 where username='".$row['username']."'";
			//$result=$conn->query($s);
			if($result)
			{
				echo '<script> alert("Approved"); </script>'; 
				header("location:approve.php");
				
			}
			else
			{
				echo '<script> alert("error"); </script>';
			}			
			}

		}
}

echo '</table> </form></center>';		



$sql1="select username from login where status=0";
$res=$conn->query($sql1); 
echo '<center> <br><h1 style="color:black;"> Patient Details </h1><br><form method="POST"><table border="1"> ';
echo '<tr> <th> Name </th> <th> Email </th> <th> Qualification</th> <th> Gender </th> <th> Category</th>
<th>Clinic Address</th>
<th> Consulting Time</th> </tr>';

//$sql2="select u_name,user_type from users where"
while($row=$res->fetch_assoc())
{
    $email=$row['username'];
	
	$sql2="select * from d_registration ";
	$res2=$conn->query($sql2);
	foreach($res2 as $row)
	{
		echo '<tr> <td>';
		echo $row['name'];
		echo '</td> <td>'.$row['email'].' </td>';	
		echo '<td>'.$row['qualification'].' </td>';		
		echo ' <td>'.$row['gender'].' </td> <td> </td>
		<td>'.$row['c_address'].'</td> <td>'.$row['c_timing'].'</td> <td>';
		
		
		echo '<input type="submit" name="'.$row['id'].'" value="EDIT">';
		
		echo '</td> </tr>';
		
		
		
	}
	
	foreach($res2 as $row)
		{
			if(isset($_POST[$row['id']]) and $row['id'])
			{
			$s="update login set status=1 where username='".$row['username']."'";
			$result=$conn->query($s);
			if($result)
			{
				echo '<script> alert("Approved"); </script>'; 
				header("location:approve.php");
				
			}
			else
			{
				echo '<script> alert("error"); </script>';
			}			
			}

		}
}

echo '</table> </form></center>';		
	
?>

<br>
<br>


<?php include("footer.php");?>