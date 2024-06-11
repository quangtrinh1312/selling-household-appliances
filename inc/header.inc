<?php
include_once 'inc/dbconnect.php';
session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

if (!isset($_SESSION["SoLuongGioHang"])) {
    $_SESSION["SoLuongGioHang"] = count($_SESSION["cart"]);
}
?>
<!DOCTYPE html>
<html>

    <!-- Mirrored from demo.harnishdesign.net/html/bigshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:25:06 GMT -->
    <head>
        <meta charset="UTF-8" />
        <title>SHOP Bán Hàng Gia Dụng</title>
        <link href="image/favicon.png" rel="icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS Part Start-->
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="css/slideshow.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/colorbox.html" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/carousel.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css" media="screen" />
        <!-- CSS Part End-->
        <!-- JS Part Start-->
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="js/colorbox/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="js/tabs.js"></script>
        <script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
        <script type="text/javascript" src="js/cloud_zoom.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
        <!-- JS Part End-->
        <style type="text/css">
        </style>
    </head>
    <body>
        <div class="main-wrapper">
            <!-- Header Parts Start-->
            <div id="header">
                <!-- Top Right part Links-->
                <div id="welcome">
                    <a href="admin/login/login.php">login</a> <a href="#"></a> </div>
                <div id="logo"><a href="index-2.html"><img src="image/logo1.jpg" title="" alt="" /></a></div>

                <!--Mini Cart Start-->
                <div id="cart">
                    <div class="heading">
                        <h4><img width="32" height="32" alt="small-cart-icon" src="image/cart-bg.png"></h4>
                        <a><span id="cart-total"><?= $_SESSION["SoLuongGioHang"] ?> sản phẩm</span></a></div>
                    <div class="content">
                        <div class="mini-cart-info">
                            <table><tbody>
                                    <?php foreach ($_SESSION["cart"] as $item) { ?>
                                        <tr>
                                            <td class=image>
                                                <a href=product.html>
                                                    <img width=43 height=43 src=<?= $item['hinhanh'] ?>>
                                                </a>
                                            </td>
                                            <td class=name><a href=product.html><?= $item['tensp'] ?></a></td>
                                            <td class=quantity>x&nbsp;<?= $item['soluong'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody></table>    
                        </div>
                        <div class="mini-cart-total">
<!--                            <table>
                                <tbody>
                                    <tr>
                                        <td class="right"><b>Sub-Total:</b></td>
                                        <td class="right">$399.99</td>
                                    </tr>
                                    <tr>
                                        <td class="right"><b>Eco Tax (-2.00):</b></td>
                                        <td class="right">$6.00</td>
                                    </tr>
                                    <tr>
                                        <td class="right"><b>VAT (17.5%):</b></td>
                                        <td class="right">$70.00</td>
                                    </tr>
                                    <tr>
                                        <td class="right"><b>Total:</b></td>
                                        <td class="right">$475.99</td>
                                    </tr>
                                </tbody>
                            </table>-->
                        </div>
                        <div class="checkout"><a href="cart.php" class="button">XEM GIỎ HÀNG</a> &nbsp; <a href="checkout.php" class="button">THANH TOÁN</a></div>
                    </div>
                </div>
                <!--Mini Cart End-->
            </div>
            <!--Top Navigation Start-->
            <div id="menu"><span>Menu</span>
                <ul>
                    <li class="home"><a  title="Home" href="index.php"><span>Home</span></a></li>
                    <?php
                    $queryDM = "SELECT * FROM danhmuc";
                    $resultDM = $mysqli->query($queryDM);
                    while ($danhmuc = mysqli_fetch_assoc($resultDM)) {
                        ?>
                        <li><a href="category.php?iddm=<?= $danhmuc['MaDM'] ?>"><?= $danhmuc['TenDM'] ?></a>
                            <div>
                                <ul>
                                    <?php
                                    $queryNSX = "SELECT * FROM nhasanxuat";
                                    $resultNSX = $mysqli->query($queryNSX);
                                    while ($nsx = mysqli_fetch_assoc($resultNSX)) {
                                        ?>
                                        <li><a href="category.php?iddm=<?= $danhmuc['MaDM'] ?>&&idnsx=<?= $nsx['MaNSX'] ?>"><?= $nsx['TenNSX'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="container">