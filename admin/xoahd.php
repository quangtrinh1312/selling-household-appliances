<?php 
include_once 'inc/header.inc';
$id = $_GET['id'];

$query2 = "DELETE FROM chitiethoadon WHERE MaHD = '{$id}'";
$result2 = $mysqli->query($query2);

$query = "DELETE FROM hoadon WHERE MaHD = '{$id}'";
$result = $mysqli->query($query);



if (isset($result) && isset($result2)) {
	header("LOCATION: hoadon.php?mgs=Xóa Thành Công");
	exit();
} else {
	echo "Loi";
}
?>