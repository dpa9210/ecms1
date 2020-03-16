<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
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
<title>Loan Status | Employeee Cooperative Management System</title>
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
		<div class="panel-heading"><h3>Loan Status</h3></div>
		<div class="panel-body">
			<?php 
			if($result1 = $con->query("SELECT * FROM loan_table WHERE user_id=".$_SESSION['user_id']." ")){
				if($result1->num_rows>0){
					echo "<table class='table table-striped table-bordered'>";
					echo "<thead><tr><th>Amount</th><th>Date Requsted</th><th>Status</th><th>Print reciept</th></tr></thead>";
					echo "<tbody>";
					while($row=$result1->fetch_object()){
						//set up row for each record
						echo "<tr>";
						echo "<td>". $row->loan_amount . "</td>";
						echo "<td>". $row->loan_date . "</td>";
						echo "<td>";
						 if($row->loan_status < 1){
							echo "<span style='color:red;'>Awaiting Approval</span>";
						}else{
						 echo "<span style='color:green;'>Approved</span>";
						}; 
						 echo "</td>";
							//echo "<td>"."<a href='print-reciept.php?id=".$row->loan_id."'>Print receipt</a>"."</td>";
						 	if($row->loan_status === "0"){
							echo "<td>"."<a class='btn disabled' href='print-reciept.php?id=".$row->loan_id."'>Print receipt</a>"."</td>";
						}elseif($row->loan_status === "1"){
						 echo "<td>"."<a class='btn' href='print-reciept.php?id=".$row->loan_id."'>Print receipt</a>"."</td>";
						};
					}
					
				
					echo "</tbody>";
					echo "</table>";

				}else{echo "You have not requested for any loans";}
			}
			?>
			
			

		</div>

	</div>
	</div>
	<div class="col-md-3"></div>

</div>


<?php include '../footer.php'; ?>
</div>




</body>
</html>