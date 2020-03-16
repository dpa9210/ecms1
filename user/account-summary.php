<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
		$userID = $_SESSION['user_id'];
}
include("../conn.php"); 
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
<title>Account Summary | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>
<body class="dashboard-bg">
<!--Conatiner-->
<div class="container">

<?php include 'user-header.php'; ?>

<div class="row">
	<div class="col-md-3">
		<?php include"user-side-menu.php"; ?>

	</div>
	<div class="col-md-9">
	<div class="row">
					
					<?php 
					$memberQuery = mysqli_query($con, "SELECT * FROM user_table WHERE user_id = '$userID' ");
					$memberData = mysqli_fetch_assoc($memberQuery);
					 ?>
					 <a href="javascript:window.print();" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print</a>
					<div class="panel panel-primary">
						<div class="panel-heading">Account Summary</div>
						<div class="panel-body">

							<div class="media">
							  <div class="media-left">
							    <?php echo "<img src='".$memberData['user_img']."' class='media-object' style='width:150px';height:200px;>"; ?>
							  </div>
							</div>
									<table class="table table-striped table-bordered">
								    <thead>
								      
								    </thead>
								    <tbody>
								    	<tr>
								        <td><strong>Member ID</strong></td>
								        <td><?php echo $memberData['user_member_code']; ?></td>
								      </tr>
								      <tr>
								        <td><strong>Member Name</strong></td>
								        <td><?php echo $memberData['user_fname']." ". $memberData['user_lname']; ?></td>
								      </tr>
								      <tr>
								        <td><strong>Date joined</strong></td>
								        <td><?php echo $memberData['user_dor']; ?></td>
								      </tr>
								      <tr>
								        <td><strong>Email</strong></td>
								        <td><?php echo $memberData['user_email']; ?></td>
								      </tr>
								       <tr>
								       		<?php $thriftQuery = mysqli_query($con, "SELECT thrift_amount FROM thrift_table WHERE user_id = '$userID'"); 
												$thriftData = mysqli_fetch_assoc($thriftQuery);
												?>

								        <td><strong>Thrift for <?php echo date("Y"); ?></strong></td>
								        <td><?php if($thriftData['thrift_amount']==''){
								      		echo 'You have not set a thrift amount for the year';
								      	} else{ echo "₦".$thriftData['thrift_amount'];} ?></td>
								      </tr>

								      <tr>
								      		<?php $loanQuery = mysqli_query($con, "SELECT loan_amount FROM loan_table WHERE user_id = '$userID' AND refund_status = '0'"); 
												$loanData = mysqli_fetch_assoc($loanQuery);
												?>

								      	<td><strong>Most recent loan</strong></td>
								      	<td><?php if($loanData['loan_amount']==''){
								      		echo 'You have not taken loan';
								      	} else{ echo "₦".$loanData['loan_amount'];} ?></td>
								      </tr>
								      
								      
								    </tbody>
								  </table>		

						</div>
					</div>
				</div>	

	</div>
	

</div>
<?php include '../footer.php'; ?>
</div>




</body>
</html>
