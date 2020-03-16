<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['at']!=="ADMIN"){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
include("../conn.php");
include ("welcome.php");
if(isset($_GET['id']) && is_numeric($_GET['id'])){
$id = $_GET['id']; }
?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$query2 = mysqli_query($con, "DELETE FROM user_table WHERE user_id='$id'");
		if($query2===TRUE){
			header('location: all-members.php?msg='.urlencode(base64_encode("<span class='error'>Delete successfull.</span><br><br>")));
		}else{
			$Msg = "<span class='error'>Delete failed, try again</span>";
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
<title>Admin Panel | Employeee Cooperative Management System</title>
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
			<div class="panel-heading bg-purple"><strong>Delete member</strong></div>
			<div class="panel-body cst-panel-body">
				<?php
				if(isset($Msg)){
					echo $Msg;
				} 
				$query1 = mysqli_query($con, "SELECT user_fname, user_lname FROM user_table WHERE user_id='$id'");
				$getdata = mysqli_fetch_array($query1);
				?>

			<p class="error">Are you sure you want to delete the data for <?php echo $getdata['user_fname']." ".$getdata['user_lname']."?"; ?> this process cannot be undone </p>
			<br>
			<form action="" method="POST" name="deldataform">
				<input type="submit" name="deletedata" value="Delete" class="btn btn-danger"> <a class="btn btn-primary" href="all-members.php">Cancel</a>
			</form>	


			</div>
		</div>

	</div>
	
</div>
<?php include '../footer.php'; ?>
</div>

</body>
</html>
