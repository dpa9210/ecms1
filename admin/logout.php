<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
	$errorMsg = "Logout successful.";

?>