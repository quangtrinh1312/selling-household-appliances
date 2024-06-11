<?php 
if (!($_SESSION['username'])) {
	header("location: login/login.php");
	exit();
}
?>