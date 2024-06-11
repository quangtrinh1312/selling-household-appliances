<?php

session_start();
include('../inc/dbconnect.php');
$ngayLap = date("Y-m-d");
$hoten = $_GET["hoten"];
$email = $_GET["email"];
$sdt = $_GET["sdt"];
$diachi = $_GET["diachi"];

$tongTien = 0;
foreach ($_SESSION["cart"] as $item) {
    $tongTien += ($item['soluong'] * $item['gia']);
}

$sql = "INSERT INTO HOADON(NgayLap, TongTien, HoTenKH, Email, SDT, DiaChi , MaTT) VALUES 
        ('{$ngayLap}',{$tongTien},'{$hoten}','{$email}','{$sdt}','{$diachi}', '2')";

if (mysqli_query($mysqli, $sql)) {
    $sql = "SELECT `AUTO_INCREMENT`
                FROM  INFORMATION_SCHEMA.TABLES
                WHERE TABLE_SCHEMA = 'webbandogiadung'
                AND   TABLE_NAME   = 'hoadon'";
    $mahd = mysqli_fetch_array(mysqli_query($mysqli, $sql), MYSQLI_ASSOC)['AUTO_INCREMENT'] - 1;
    foreach ($_SESSION["cart"] as $item) {
        $sql = "INSERT INTO CHITIETHOADON VALUES('{$mahd}','{$item['idsp']}',{$item['soluong']},{$item['soluong']}*{$item['gia']})";
        mysqli_query($mysqli, $sql);
    }
    
    session_destroy();
    header("location:../index.php");
} else {
    echo "There was a problem";
}
?>

