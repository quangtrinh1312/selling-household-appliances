<?php 
include_once 'inc/header.inc';
$id = $_GET['id'];
$query = "DELETE FROM danhmuc WHERE MaDM = '{$id}' LIMIT 1";
$result = $mysqli->query($query);
if ($result) {
	header("LOCATION: danhmuc.php?mgsdm=Xóa Thành Công");
	exit();
}
else
{
	echo "Lỗi";
}
?>