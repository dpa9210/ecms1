<?php
session_start();
include("../conn.php");
if(isset($_POST['register'])){
$uploadDir = "uploads/";
$fileName2 = $_FILES['employletter']['name'];
$newFileName = "Employment-Letter-".$_SESSION['memberID'].".jpg";
$filePathTwo = $uploadDir.$newFileName;
if(move_uploaded_file($_FILES['employletter']['tmp_name'],"uploads/"."Employment-Letter-".$_SESSION['memberID'].".jpg")){
	$updateQuery = "UPDATE user_table SET user_app_letter = '$filePathTwo' WHERE user_member_code = '".$_SESSION['memberID']."'";
	if(mysqli_query($con, $updateQuery)){
		$msg = "Application saved successfully"." "."<a href='index.php'>Login</a> and print your data page";
	}else{
		$msg = "An error has occurred, please try again.";
	}
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
<title>Register | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<style>
#imagePreview {
    width: 300px;
    height: 250px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}

	body{margin-top:10px;}

</style>
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

</head>
<body>
<!--Conatiner-->
<div class="container">

<?php include '../header.php'; ?>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<br><br>
		<div class="panel panel-info">
			
		<div class="panel-heading"><h2>Member Registration</h2></div>
		<div class="panel-body">
			<div class="progress">
					  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100"
					  aria-valuemin="0" aria-valuemax="100" style="width:100%">
					    Stage Three - 100% Complete
					  </div>
					</div>
			<?php 			if(!empty($msg)){
			echo  "<span class='red'>".$msg ."</span>"."<hr>";} ?>
			<form name="userreg2" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

				<p class="red">Scan and upload your employment letter</p>
				<label for="employletter">Employment Letter</label>
				<input type="file" name="employletter" id="file">
				<br>
				<div id="imagePreview"></div>
			<br>
			<input type="submit" name="register" id="register" class="btn btn-success" value="Complete registration">
			</form>

		</div>

	</div>
	</div>
	<div class="col-md-2"></div>

</div>


<?php include '../footer.php'; ?>
</div>




</body>
</html>