<?php
$mysqli = new mysqli ('localhost' , 'root' , '' , 'webbandogiadung');
$mysqli->set_charset("utf8");
if (mysqli_connect_error()){
	echo "cann't connect to db: <br />". mysqli_connect_error();
	exit();
}
?>

