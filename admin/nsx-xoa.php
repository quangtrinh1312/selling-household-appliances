<?php 
include_once 'inc/header.inc';
$id = $_GET['id'];
$query = "DELETE FROM nhasanxuat WHERE MaNSX = '{$id}' LIMIT 1";
$result = $mysqli->query($query);
if ($result) {
	header("LOCATION: danhmuc.php?mgsnsx=Xóa Thành Công");
	exit();
}
else
{
	echo "Lỗi";
}
?>