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
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=".">
<meta name="keywords" content="">
<meta name="robots" content="index" />
<title>Search result | Employeee Cooperative Management System</title>
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
			<div class="panel-heading bg-purple"><strong>Search Result</strong></div>
			<div class="panel-body cst-panel-body">
                
				<!--Search results-->
					<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 2;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con, "SELECT * FROM user_table
            WHERE (`user_lname` LIKE '%".$query."%') OR (`user_member_code` LIKE '%".$query."%')") or die(mysqli_error());
                     
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
                    echo "<table class='table table-condensed table-hover table-bordered'>";
                    echo "<thead><tr><th>Name</th><th>Member code</th><th>Delete</th></tr></thead>";
                    echo "<tbody>";             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                    echo "<tr>";
                    echo "<td>"."<a target='_blank' href='member-detail.php?id=".$results['user_id']."'>".$results['user_fname']." ".$results['user_lname']."</a>"."</td>";
                    echo "<td>".$results['user_member_code']."</td>";
                    echo "<td>"."<a href='delete-member-1.php?id=".$results['user_id']."' class='btn btn-danger'>X</a>"."</td>";

                    echo "</tr>";
                    
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
            echo "</tbody>";
                    echo "</table>";
             
        }
        else{ // if there is no matching rows do following
            echo "<h4>No result found. <a href='search-members.php'>Try again</a></h4>";
        }
         
    }
    else{ // if query length is less than minimum
        echo "<h4>Search query too short</h4>";
    }
?>

			
			
			</div>
		</div>

	</div>
	
</div>
<?php include '../footer.php'; ?>
</div>




</body>
</html>
