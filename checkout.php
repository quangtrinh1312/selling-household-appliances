<?php
include_once 'inc/header.inc';
include_once 'inc/left-content.inc';
?>
<!--Left Part-->
<?php
?>
<!--Left End-->
<!--Middle Part Start-->
<div id="content">
    <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Thanh toán</a></div>
    <!--Breadcrumb Part End-->
    <h1>THANH TOÁN</h1>
    <form method="GET" action="admin/themhoadon.php">
        <div class="checkout">
            <div class="checkout-heading">THÔNG TIN KHÁCH HÀNG</div>
            <div class="checkout-content">
                <table class="form">
                    <tbody>
                        <tr>
                            <td><span class="required">*</span> Họ và tên:</td>
                            <td><input type="text" class="large-field" value="" name="hoten" required></td>
                        </tr>
                        <tr>
                            <td><span class="required">*</span> Email:</td>
                            <td><input type="text" class="large-field" value="" name="email" required></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" class="large-field" value="" name="sdt" required></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" class="large-field" value="" name="diachi" required></td>
                        </tr>              
                    </tbody>
                </table>
                <div class="buttons">
                    <div class="center">
                        <input type="submit" class="button" id="button-payment-address" value="XÁC NHẬN">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Middle Part End-->
    <div class="clear"></div>
</form>
</div>
<?php
include_once 'inc/footer.inc';
?>
