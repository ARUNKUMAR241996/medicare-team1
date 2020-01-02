<!-- Author : Prince 
	CSS : Prince-->

<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>
	</title>
	<style>
.submenu
{
	display:none;
	z-index:1;
}
.menubar ul
{
	display:inline-flex;
	list-style:none;
}
.menubar ul li
{
	width:120px;
	padding:15px;
	margin:15px;
}

.menubar ul li a
{
	color:white;
	text-decoration:none;
}
.menubar ul li:hover
{
	background:#123a56;
	border-radius:10px;
}
.menubar ul li:hover .submenu
{
	display:block;
	position:absolute;
	background:black;
	margin-top:15px;
	margin-left:-15px;
	border-radius:10px;
	
}
.menubar ul li:hover .submenu ul
{
	display:block;
	margin;10px;
	
}

.menubar ul li:hover .submenu ul li
{
	width:100px;
	padding:20px;
	border-bottom:1px solid red;
}

	</style>
	</head>
	<body>
	<div class="menubar">
	<ul>
		<li>
			<a href="index.php">HOME</a>
		</li>
		<li>
			<a href="#">CONTACT</a>
		</li>
		<li> <a >REGISTRATION</a>
			<div class="submenu">
				<ul>
				<li>
					<a href="doc_reg.php">DOCTOR</a>
				</li>
				<li>
					<a href="stu_reg.php">PATIENT</a>
				</li>
			</ul>
			</div>
		</li>
		<li>
			<a href="login.php">LOGIN</a>
		</li>
	</ul>
	</div>
