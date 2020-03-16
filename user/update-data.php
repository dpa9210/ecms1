<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$Msg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
$sql1 = "UPDATE user_table SET user_fname='$fname', user_lname='$lname', user_email='$email', user_phone='$phone' WHERE user_id = '".$_SESSION['user_id']."'";
if(mysqli_query($con, $sql1)){
	$_POST['fname'] = "";
	$_POST['lname'] = "";
	$_POST['email'] = "";
	$_POST['phone'] = "";
	$Msg = "<span class='text-success'>Data update successfull</span><br><br>";
}else{
	$Msg = "<span class='text-danger'>An error has occurred, try again.</span><br><br>";
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
<title>Update data | Employeee Cooperative Management System</title>
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
		<div class="panel-heading"><h4>Update my Data</h4></div>
		<div class="panel-body">
			<?php if(isset($Msg)){
				echo $Msg;
			} ?>
		<?php 
		if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])){ 
			$id = $_SESSION['user_id'];
			$sql = mysqli_query($con, "SELECT * FROM user_table WHERE user_id = '$id'");
			$rows = mysqli_fetch_array($sql);}
			?>
			<form name="updateForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label>First Name</label>
				<input type="text" name="fname" class="form-control" value="<?php echo $rows['user_fname'] ?>">
				<br>
				<label>Last Name</label>
				<input type="text" name="lname" class="form-control" value="<?php echo $rows['user_lname'] ?>">
				<br>
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $rows['user_email'] ?>"><br>
				<label>Phone</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $rows['user_phone'] ?>"><br>


				<br>
				<input type="submit" class="form-control btn btn-success" value="Update" role="button" name="Update data">	
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
