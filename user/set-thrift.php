<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
$amountErr = "";
$amount = "";
$msg = "";
$errorMsg = "";
$userid = $_SESSION['user_id'];


//strip data
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<?php
if(isset($_POST['thriftbtn'])){
if(empty($_POST['amount'])){
		$amountErr = "Enter thrift amount.";
	}else{
			$amount = test_input($_POST["amount"]);
	}
//Data
$amount = $_POST['amount'];
$userid = $_SESSION['user_id'];
$date = $_POST['thriftyear'];
$dateofentry = $_POST['thriftdate'];

$error_msg = $amountErr;

if($error_msg==""){
$sql = "INSERT INTO thrift_table (thrift_amount, user_id, thrift_year, thrift_date) VALUES(?,?,?,?)";
$statement = $con->prepare($sql);
	$statement->bind_param("iiss", $amount, $userid, $date, $dateofentry);
	if($statement->execute()){
		
		$msg= "<span style='color:green; font-size:16px;'>Thrift of ".$amount." set successful for the year.</span><br><br>";


}}}
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
<title>Set Thrift | Employeee Cooperative Management System</title>
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
		<div class="panel-heading"><h4>Set Thrift</h4></div>
		<div class="panel-body">
						<a href="javascript:window.print();" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print</a><br><br>
			<?php
			//function to change status
				
					$query1 = mysqli_query($con, "SELECT * FROM thrift_table WHERE user_id = ".$_SESSION['user_id']." "); 
					$checkrow= mysqli_num_rows($query1);
					if($checkrow>0){
											
							include "hiddenthriftform.php";
					}else{
						
						include "normalthriftform.php";
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