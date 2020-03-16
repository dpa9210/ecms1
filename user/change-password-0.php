<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$Msg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
$passwordErr = "";
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	$pswddata = $_POST['password'];
	$query = mysqli_query($con, "SELECT user_id, user_password FROM user_table WHERE user_id = '".$_SESSION['user_id']."'");
	$row = mysqli_fetch_array($query);
	if($row['user_password']===$pswddata){
		header("location: change-password.php");
	}else{
		$Msg = "<span class='error'> Wrong password, try again.</span><br><br>";
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
			<label for="password">Enter old password</label> <span><?php echo $passwordErr; ?></span>
			<input required type="password" name="password" id="password" class="form-control">
			<br>
			<input type="submit" name="chgpswd" id="chgpswd" class="btn btn-info" value="Continue">
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
