<?php
session_start();
if(!isset($_SESSION['admin_id'])){
	header("Content-Type: text/html; charset= utf-8");
	
}else{
	header('location:control-panel.php');
}

include("../conn.php");
$errorMsg = "";
if(isset($_POST['login'])){
	$email = mysqli_escape_string($con, $_POST['email']);
	$pass = mysqli_escape_string($con, $_POST['password']);
	$sql = mysqli_query($con, "SELECT * FROM admin_table WHERE admin_email = '$email'AND admin_password = '$pass' AND account_type = 'ADMIN'");
	$fetchUser = mysqli_fetch_array($sql);
	if(is_array($fetchUser)){
		$_SESSION['email'] = $fetchUser['admin_email'];
		$_SESSION['admin_id'] = $fetchUser['admin_id'];
		$_SESSION['name'] = $fetchUser['admin_name'];
		$_SESSION['at'] = $fetchUser['account_type'];
		header("location:control-panel.php");
	}else{
		$errorMsg = "<span class='error'>Invalid email or password.</span><br><br>";
	}
}

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
<title>Admin | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>
<body>
<!--Conatiner-->
<div class="container">

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="panel panel-info">
		<div class="panel-heading"><h3>Admin Login</h3></div>
		<div class="panel-body">
			<?php if(isset($errorMsg)){
				echo $errorMsg;
			} ?>
			<form name="userlogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
			<br>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="*********" class="form-control">
			<br>
			<input type="submit" name="login" id="login" class="form-control btn btn-success" value="Login">
			
			</form>

		</div>

	</div>
	</div>
	<div class="col-md-4"></div>

</div>


<?php include '../footer.php'; ?>
</div>




</body>
</html>
