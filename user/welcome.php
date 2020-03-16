<?php 
$time = date("H");
$timezone = date("e");
if($time < "12"){
	echo "<h4>"."Good Morning, ".$_SESSION['name']."</h4>";
}else
if ($time >= "12" && $time < "17"){
	echo "<h4>"."Good Afternoon, ".$_SESSION['name']."</h4>";
}else
if($time >= "17" && $time < "24"){
	echo "<h4>"."Good Evening, ".$_SESSION['name']."</h4>";
}

?>

