<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$Msg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
$passwordErr = $password2Err = "";
$password = $password2 = "";
?>
<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(empty($_POST['password'])){
		$passwordErr = "<span class='error'> Enter a password</span>";
	}else{
		$password = test_input($_POST['password']);
	}
	if($_POST['password2']!==$_POST['password']){
		$password2Err = "<span class='error'> Password does not match, retype password.</span>";
	}


	$pswddata = $_POST['password'];
	$query = mysqli_query($con, "UPDATE user_table SET user_password = '$pswddata' WHERE user_id = '".$_SESSION['user_id']."'");

	if($query){
		$Msg = "<span style='color:green;'> Password change successful. Re-login with your new password.</span><br><br>"; 
		session_destroy();
		header("refresh:4; url=index.php");

	}else{
		$Msg = "<span style='color:red;'> Password change failed, try again.</span><br><br>";
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
<title>Change password | Employeee Cooperative Management System</title>
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

<?php include '../header.php'; ?>
<div class="row">
	<?php include "user-header.php"; ?>
	<div class="col-md-3">
		<?php include "user-side-menu.php"; ?>
		
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
		<div class="panel-heading"><h4>Change password</h4></div>
		<div class="panel-body">
			<?php if(isset($Msg)){
				echo $Msg;
			} ?>
			<form name="chgPswdForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<label for="password">New Password</label> <span><?php echo $passwordErr; ?></span>
			<input type="password" name="password" id="password" class="form-control" required>
			<br>
			<label for="password2">Confirm New Password</label> <span><?php echo $password2Err; ?></span>
			<input type="password" name="password2" id="password2" class="form-control" required>
			<br>
			<input type="submit" name="chgpswd" id="chgpswd" class="btn btn-info" value="Change password">
			<br><br>

			</form>
			

		</div>

	</div>
	</div>
	<div class="col-md-3"></div>

</div>


<?php include '../footer.php'; ?>
</div>




</body>
</html>
