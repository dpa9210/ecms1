<?php
session_start();
include("../conn.php");
$fname=$lname=$dob=$gender=$email=$password=$vpassword=$phone="";
$fnameErr=$lnameErr=$dobErr=$genderErr=$emailErr=$passwordErr=$vpasswordErr=$phoneErr="";

if(!isset($_SESSION['id']) && $_SESSION['at']!=="ADMIN"){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
include("../conn.php");
include ("welcome.php"); 
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
<title>Add New User | Employeee Cooperative Management System</title>
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

<?php include 'admin-header.php'; ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel">
			<div class="panel-heading bg-purple"><strong>Admin Menu</strong></div>
			<div class="panel-body cst-panel-body">
				<?php include 'admin-side-menu.php'; ?>
			</div>
		</div>

	</div>
	<div class="col-md-9">
		<div class="panel">
			<div class="panel panel-heading bg-purple"><strong>Register New User</strong></div>
			<div class="panel-body cst-panel-body">
				<form name="userreg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<label for="fname">First Name</label> <span class="error">&nbsp;&nbsp;<?php echo $fnameErr; ?></span>
			<input type="text" name="fname" id="fname" placeholder="Enter first name" class="form-control" autofocus value="<?php
				if(isset($_POST['fname'])){
				echo $fname;}?>">
			<br>
			<label for="fname">Last Name</label> <span class="error">&nbsp;&nbsp;<?php echo $lnameErr; ?></span>
			<input type="text" name="lname" id="lname" placeholder="Enter last name" class="form-control" value="<?php
if(isset($_POST['lname'])){
echo $lname;}?>">
			<br>
			<label for="dob">Date of Birth</label> <span class="error">&nbsp;&nbsp;<?php echo $dobErr; ?></span>
			<input type="date" class="form-control" name="dob" id="dob" value="<?php
if(isset($_POST['dob'])){
echo $dob;}?>">
			<br>
			<label for="gender">Gender</label> <span class="error">&nbsp;&nbsp;<?php echo $genderErr; ?></span>
			<select type="select" name="gender" id="gender" class="form-control">
				<option value="">Select</option>
				<option value="Male"<?php if(isset($_POST['gender'])){
					if($_POST['gender']=="Male"){
					echo "selected";
					}} ?>>Male</option>
				<option value="Female" <?php if(isset($_POST['gender'])){
				if($_POST['gender']=="Female"){
				echo "selected";
				}} ?>>Female</option>
			</select>
			<br>
			<input type="hidden" name="dor" id="dor" value="<?php echo date("d-m-Y");?>">

			<label for="phone">Phone</label> <span class="error">&nbsp;&nbsp;<?php echo $phoneErr; ?> </span>
			<input type="phone" name="phone" id="phone" class="form-control" placeholder="Enter phone number" value="<?php
if(isset($_POST['phone'])){
echo $phone;}?>">
			<br>
			<label for="email">Email</label> <span class="error">&nbsp;&nbsp;<?php echo $emailErr; ?></span>
			<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="<?php
if(isset($_POST['email'])){
echo $email;}?>">
			<br>
			<label for="password">Password</label> <span class="error">&nbsp;&nbsp;<?php echo $passwordErr; ?></span>
			<input type="password" name="password" id="password" class="form-control" placeholder="******">
			<br>
			<label for="vpassword">Retype password</label>&nbsp;&nbsp;<span class="error"><?php echo $vpasswordErr; ?></span>
			<input type="password" name="vpassword" id="vpassword" class="form-control" placeholder="******">
			<br>
			<input type="submit" name="register" id="register" class="form-control btn btn-success" value="Register">
			<br>

			</form>

			</div>
		</div>

	</div>
	
</div>
<?php include '../footer.php'; ?>
</div>




</body>
</html>