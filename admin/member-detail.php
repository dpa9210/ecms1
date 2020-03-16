<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['at']!=="ADMIN"){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
include("../conn.php");
//Displaying Data
$id = $_GET['id'];//collecting data from query string
if(!is_numeric($id)){
	echo "Data Error";
	exit;
}
$result = mysqli_query($con, "SELECT * FROM user_table where user_id = $id");
$memberData = mysqli_fetch_assoc($result);

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
<title>Member details | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>
<body style="margin-top: 10px;">
<!--Conatiner-->
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<div class="panel panel-primary">
						<div class="panel-heading">Data page for <?php echo $memberData['user_fname']." ".$memberData['user_lname']; ?></div>
						<div class="panel-body">
							<a href="javascript:window.print();" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print</a>
							<div class="media">
							  <div class="media-left">
							    <?php echo "<img src='../user/".$memberData['user_img']."' alt='Photo' class='media-object' style='width:150px';height:200px;>"; ?>
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
								       		<?php $thriftQuery = mysqli_query($con, "SELECT thrift_amount FROM thrift_table WHERE user_id = '$id'"); 
												$thriftData = mysqli_fetch_assoc($thriftQuery);
												?>

								        <td><strong>Thrift for <?php echo date("Y"); ?></strong></td>
								        <td><?php if($thriftData['thrift_amount']==''){
								      		echo 'You have not set a thrift amount for the year';
								      	} else{ echo "₦".$thriftData['thrift_amount'];} ?></td>
								      </tr>

								      <tr>
								      		<?php $loanQuery = mysqli_query($con, "SELECT loan_amount FROM loan_table WHERE user_id = '$id' AND refund_status = '0'"); 
												$loanData = mysqli_fetch_assoc($loanQuery);
												?>

								      	<td><strong>Most recent loan</strong></td>
								      	<td><?php if($loanData['loan_amount']==''){
								      		echo 'You have not taken loan';
								      	} else{ echo "₦".$loanData['loan_amount'];} ?></td>
								      </tr>
								      </tbody>
								  </table>		
								  <tr>
								        <p><strong>Employment Letter</strong></p>
								      </tr>
								      <tr>
								     <td><?php echo "<img src='../user/".$memberData['user_app_letter']."' style='width:500px';height:auto;>"; ?></td>
								      </tr>
						</div>
					</div>













		</div>
		<div class="col-md-2"></div>



	</div>

</div>
</body>
</html>