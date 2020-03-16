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
?>

<?php

//confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id'])){
	
	//get the 'id' variable from the url
	$id = $_GET['id'];
	//update the record in database
	//if($stmt = $con->prepare("UPDATE loan_table SET loan_status = '1', admin_id = $_SESSION['id'] WHERE loan_id = ? LIMIT 1")){
		
	//	$stmt->bind_param('ii', $id, $_SESSION['id']);
	//	$stmt->execute();
	//	$stmt->close();
	//} else{
		
	//	echo "SYSTEM ERROR: Could not approve loan.";
	//}
	//$con->close();
	//redirect user after the update is suceesful
	//echo "Loan status now approved";
	//header("Refresh: 2;url=grant-loan.php");
	$query = mysqli_query($con, "UPDATE loan_table SET loan_status = '1', admin_id ='1' WHERE loan_id = $id ");
		if($query){
		echo "Loan update successful"; 
		header("refresh:4; url=grant-loan.php");

	}else{
		echo "Error updating record".mysqli_error($con);
	} 
}else{
		//if the id variable isnt sent set, redirect the user.
		echo "An error has occurred!";
		
		header("Refresh: 2;url=grant-loan.php");
		   	
	}
	



 ?>
