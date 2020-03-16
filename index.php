<?php
session_start();
include("conn.php"); 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=".">
<meta name="keywords" content="">
<meta name="robots" content="index" />
<title>Employeee Cooperative Management System</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>
<body>
<!--Conatiner-->
<div class="container">

<?php include 'header.php'; ?>


<div class="row">
<div class="jumbotron	center	bg-purple">
	<h2><strong>EMPLOYEE COOPERATIVE MANAGEMENT SYSTEM</strong></h2>
	<h4>FOR SAFARI SCHOOLS</h4>
</div>

<div class="col-md-2">

	<h4><strong>Objectives</strong></h4>
	
	<ul class="list-group">
	<li class="list-group-item">To assist members financially, economically, socially and emotionally. </li>
    <li class="list-group-item">To build up treasures for the future. </li>
	<li class="list-group-item">To assist members to save for the rainy days. </li>
	<li class="list-group-item">To promote love and unity among staff.</li>
	</ul>

</div>
<div class="col-md-8 center">
	
	<img src="img/main-img-1.jpg" alt="Main image">
		<h4><strong>WELCOME!</strong></h4>
		<p> Member? <a class="btn btn-success" href="user/index.php">Login</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Want to be a Member? <a class="btn btn-danger" href="user/register.php">Register</a></p>
</div>
<div class="col-md-2">
	<h4><strong>Pioneer Cooperators </strong></h4>
	<ul class="list-group">
	<li class="list-group-item">Safari 1</li>
	<li class="list-group-item">Safari 1</li>
	<li class="list-group-item">Safari 1</li>
	<li class="list-group-item">Safari 1</li>
	<li class="list-group-item">Safari 1</li>
	<li class="list-group-item">Safari 1</li>
	<li class="list-group-item">Safari 1</li>	
	</ul>
</div>

</div>

	
</div>
<?php include 'footer.php'; ?>
</div>




</body>
</html>