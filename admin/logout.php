<?php 
session_start();
include_once 'dbconnect.php';
session_destroy();
header("location: login/login.php");
?>