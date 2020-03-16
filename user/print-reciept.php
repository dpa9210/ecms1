<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}

$id=$_GET['id']; 
if(!is_numeric($id)){
echo "Data Error"; 
exit;}
?>
<?php
$result = mysqli_query($con, "SELECT * FROM loan_table WHERE loan_id = $id LIMIT 1");
$loanDetails = mysqli_fetch_assoc($result);
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
<title>Print Reciept | Employeee Cooperative Management System</title>
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
		<div class="panel-heading"><h4>Loan Reciept</h4></div>
		<div class="panel-body">
			<a href="javascript:window.print();" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print</a>
						<table class="table table-striped table-bordered">
								    <thead>
								      
								    </thead>
								    <tbody>
								      <tr>
								        <td><strong>Loan Amount</strong></td>
								        <td><?php echo "₦".$loanDetails['loan_amount']; ?></td>
								      </tr>
								      <tr>
								        <td><strong>Date applied</strong></td>
								        <td><?php echo $loanDetails['loan_date']; ?></td>
								      </tr>
								      <tr>
								        <td><strong>Loan Status</strong></td>
								        <td><?php 
								        	if($loanDetails['loan_status'] < 1){
													echo "Awaiting Approval";
												}else{
												 echo "Approved";
												};

								        
								         ?></td>
								      </tr>
								      <tr>
								        <td><strong>Monthly Deduction</strong></td>
								        <td><?php echo "₦".$loanDetails['loan_payback_amount']; ?></td>
								      </tr>
								      <tr>
								        <td><strong>Pay back period</strong></td>
								        <td><?php echo $loanDetails['loan_payback_period']. " Month(s)"; ?></td>
								      </tr>
								      <tr>
								      
								      </tr>
								    </tbody>
								  </table>

			

		</div>

	</div>
	</div>
	<div class="col-md-3"></div>

</div>


<?php include '../footer.php'; ?>
</div>




</body>
</html>