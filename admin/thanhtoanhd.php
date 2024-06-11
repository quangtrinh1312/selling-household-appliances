<?php 
include_once 'inc/header.inc';

$id = $_GET['id'];
$query = "UPDATE hoadon SET MaTT = '1' WHERE MaHD = '{$id}'";
$result = $mysqli->query($query);
if ($result) {
	header("LOCATION: hoadon.php?mgs=Thanh Toán Thành Công");
	exit();
} else {
	echo "loi";
}

?>