<?php 
include_once 'inc/header.inc';
$idsp = $_GET['idsp'];

$querySP = "SELECT * FROM sanpham WHERE MaSP = '{$idsp}'";
$resultSP = $mysqli->query($querySP);
$arrSP = mysqli_fetch_assoc($resultSP);
$tenhinh = $arrSP['HinhAnh'];
$destination = $_SERVER['DOCUMENT_ROOT']. '/MaNguonMo1/hinhanh/'.$tenhinh;
unlink($destination);

$query = "DELETE FROM sanpham WHERE MaSP = '{$idsp}' LIMIT 1";
$result = $mysqli->query($query);


if ($result) {
	header("LOCATION: index.php?mgs=Xóa Thành Công");
	exit();
} else{
	echo "loi";
}
?>