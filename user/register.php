<?php
session_start();
include("../conn.php");
$fname=$lname=$dob=$gender=$email=$password=$vpassword=$phone="";
$fnameErr=$lnameErr=$dobErr=$genderErr=$emailErr=$passwordErr=$vpasswordErr=$phoneErr="";
//$msg = "";

//strip data to prevent sql attack
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST['register'])){

	if(empty($_POST['fname'])){
		$fnameErr = "Enter your first name.";
	}else{
			$fname = test_input($_POST["fname"]);

	}

	if(empty($_POST['lname'])){
		$lnameErr = "Enter your last name";
	}else{
		$lname = test_input($_POST['lname']);
	}

	if(empty($_POST['dob'])){
		$dobErr = "Enter your date of birth";
	}else{
		$dob = test_input($_POST['dob']);
	}
	if(empty($_POST['gender'])){
		$genderErr = "Select gender";
	}else{
		$gender = test_input($_POST['gender']);
	}
	if(empty($_POST['email'])){
		$emailErr = "Enter your email";
	}else{
		$email = test_input($_POST['email']);
	}
	if(empty($_POST['phone'])){
		$phoneErr = "Enter your phone number";
	}else{
		$phone = test_input($_POST['phone']);
	}
	if(empty($_POST['password'])){
		$passwordErr = "Enter a password";
	}else{
		$password = test_input($_POST['password']);
	}
	if($_POST['password']!==$_POST['vpassword']){
		$vpasswordErr = "Password does not match, retype.";
	}

//Collect data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$dor = $_POST['dor'];
$memcode = $_POST['membercode'];
$_SESSION['memberID'] = $memcode;

//if no errors encountered
$error_message = $fnameErr."".$lnameErr."".$dobErr."".$genderErr."".$emailErr."".$passwordErr."".$vpasswordErr."".$phoneErr."";
if($error_message ==""){
	$sql = "INSERT INTO user_table (user_fname, user_lname, user_dob, user_gender, user_dor, user_email, user_password, user_phone, user_member_code) VALUES(?,?,?,?,?,?,?,?,?)"; 
	$statement = $con->prepare($sql);
	$statement->bind_param("sssssssss", $fname, $lname, $dob, $gender, $dor, $email, $password, $phone, $memcode);
	if($statement->execute()){
		header("location:register_2.php");

$fname = "";
$lname = "";
$dob = "";
$gender = "";
$email = "";
$phone = "";
$password = "";
$dor = "";

}else{

$fname = "";
$lname = "";
$dob = "";
$gender = "";
$email = "";
$phone = "";
$password = "";
$dor = "";
$msg = "Registration failed, try again.";
}
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
<title>Register | Employeee Cooperative Management System</title>
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
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-info">
			
		<div class="panel-heading"><h2>Member Registration</h2></div>
		<div class="panel-body">
			<div class="progress">
					  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="35"
					  aria-valuemin="0" aria-valuemax="100" style="width:35%">
					    Stage One - 35% Complete
					  </div>
					</div>
			<?php 			if(!empty($msg)){
			echo  "<span class='red'>".$msg ."</span>"."<hr>";
		} ?>
			<form name="userreg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					



			<label for="membercode">Member Code</label>
			<input type="text" name="membercode" id="membercode" class="form-control" value="<?php echo "RMC".date("dmy").mt_rand(100,1000); ?>"><br>
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
			<input type="submit" name="register" id="register" class="btn btn-success" value="Save & continue">
			<br><br>
			<p class="center">Already a member? &nbsp;&nbsp; <a href='index.php'>Login </a>  </p>

			</form>

		</div>

	</div>
	</div>
	<div class="col-md-2"></div>

</div>


<?php include '../footer.php'; ?>
</div>




</body>
</html>