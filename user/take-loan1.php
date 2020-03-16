
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=".">
<meta name="keywords" content="">
<meta name="robots" content="index" />
<title>Take Loan | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-3">
		<form name="loanform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
			<label for="amount">Loan Amount</label>
			<br>
			<input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
			<input type="hidden" name="loandate" id="loandate" value='<?php echo date("l, d, M, Y");  ?>'>
			<input type="submit" name="amountbtn" id="amountbtn" class="form-control btn btn-success" value="Submit">
			<br>
			</form>
	</div>
	<div class="col-md-3"></div>
			

</div>
</div>
</body>
</html>