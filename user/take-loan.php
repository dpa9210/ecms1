<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['user_id'])){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
$amountErr = $amount = $loanperiodErr = $paybackAmountErr = $agreeErr = "";
$msg = "";
$errorMsg = "";


//strip data
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<?php
if(isset($_POST['loanbtn'])){
if(empty($_POST['amount'])){
		$amountErr = "<span class='error'>Please enter loan amount</span>";
	}else{
			$amount = test_input($_POST["amount"]);}
if(empty($_POST['loanperiod'])){
	$loanperiodErr = "<span class='error'>Please select pay back period</span>";
}else{ $loanperiod = test_input($_POST['loanperiod']);}
if(empty($_POST['paybackAmount'])){
	$paybackAmountErr = "<span class='error'>Please select payback period</span>";
	$_POST["loanperiod"] = "";
}else{$paybackAmount = test_input($_POST['paybackAmount']);}
if(empty($_POST['agree'])){
	$agreeErr = "<span class='error'>You must agree on the payment amount</span>";
}
//Data
$amount = $_POST['amount'];
$userid = $_SESSION['user_id'];
$date = $_POST['loandate'];
$ppp = $_POST['loanperiod'];
$lpa = $_POST['paybackAmount'];
$error_msg = $amountErr."".$loanperiodErr."".$paybackAmountErr."".$agreeErr;


if($error_msg == ""){
$sql = "INSERT INTO loan_table (user_id, loan_amount, loan_date, loan_payback_period, loan_payback_amount) VALUES(?,?,?,?,?)";
$statement = $con->prepare($sql);
	$statement->bind_param("isssi", $userid, $amount, $date, $ppp, $lpa);
	if($statement->execute()){
		$_POST["loanperiod"] = "";
		$_POST["amount"] = "";
		$_POST["paybackAmount"] = "";

		$msg = "<span style='color:green; font-size:16px;'>Loan Request Successful. Please note that an amount of "."₦".$lpa. " will be deducted from your salary monthly. Please check back within 24 hours to print your approval reciept."." </span><br><br>";
		
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
<meta name="robots" content="index"/>
<title>Take Loan | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="cal.js"></script>

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
		<div class="panel-heading"><h3>Take Loan</h3></div>
		<div class="panel-body">
			<?php if(isset($msg)){
				echo $msg;
			} ?>
			<form name="loanform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
			<label for="amount">Loan Amount</label> <?php echo $amountErr; ?>
			<br>
			<input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount" value="<?php
if(isset($_POST['amount'])){
echo $amount;}?>">
			<input type="hidden" name="loandate" id="loandate" value='<?php echo date("l, d M Y");  ?>'>
			<br>
			<label for="loanperiod">Payback period</label> <?php echo $loanperiodErr; ?><br>
			<select name="loanperiod" id="loanperiod" class="form-control" onchange="calPayBackAmount()">
				<option value=""> Select </option>
				<option value="1"<?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="1"){
					echo "selected";
					}} ?>>1 month</option>
				<option value="2" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="2"){
					echo "selected";
					}} ?>>2 months</option>
				<option value="3" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="3"){
					echo "selected";
					}} ?>>3 months</option>
				<option value="4" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="4"){
					echo "selected";
					}} ?>>4 months</option>
				<option value="5"<?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="5"){
					echo "selected";
					}} ?>>5 months</option>
				<option value="6" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="6"){
					echo "selected";
					}} ?>>6 months</option>
				<option value="7" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="7"){
					echo "selected";
					}} ?>>7 months</option>
				<option value="8"<?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="8"){
					echo "selected";
					}} ?>>8 months</option>
				<option value="9" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="9"){
					echo "selected";
					}} ?>>9 months</option>
				<option value="10" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="10"){
					echo "selected";
					}} ?>>10 months</option>
				<option value="11" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="11"){
					echo "selected";
					}} ?>>11 months</option>
				<option value="12" <?php if(isset($_POST['loanperiod'])){
					if($_POST['loanperiod']=="12"){
					echo "selected";
					}} ?>>12 months</option>
			</select><br>
			
			<label for="paybackAmount">Payback Amount</label> <?php echo $paybackAmountErr; ?>
			<input type="number" name="paybackAmount" id="paybackAmount" class="form-control" value="<?php
if(isset($_POST['paybackAmount'])){
echo $lpa;}?>">
			<input type="checkbox" name="agree" id="agree"> I agree that the selected payback amount will be deucted from my monthly salary <?php echo $agreeErr; ?>
			<br><br>
			<input type="submit" name="loanbtn" id="loanbtn" class="form-control btn btn-success" value="Submit">
			<br>
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
