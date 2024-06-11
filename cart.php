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
    <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Giỏ hàng</a></div>
    <!--Breadcrumb Part End-->
    <h1>GIỎ HÀNG</h1>
    <form enctype="multipart/form-data" method="post" action="#">
        <div class="cart-info">
            <table>
                <thead>
                    <tr>
                        <td class="image">Hình ảnh</td>
                        <td class="name">Tên sản phẩm</td>
                        <td class="quantity">Số lượng </td>
                        <td class="price">Đơn giá</td>
                        <td class="total">Thành tiền</td>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $tongTien = 0;
                    foreach ($_SESSION["cart"] as $item) {
                        ?>
                        <tr>
                            <td name="idsp" hidden><?= $item['idsp'] ?></td>
                            <td class="image"><a href="#"><img src='<?= $item['hinhanh'] ?>' width="60px" height="60px"/></a></td>
                            <td class="name"><a href="#"><?= $item['tensp'] ?></a></td>
                            <td class="quantity"><input type="text" size="1" value="<?= $item['soluong'] ?>" name="qty" class="w30">
                                &nbsp;
                                <img class="update" title="Update" alt="Update" src="image/update.png"/>
                                &nbsp;<img class="delete" title="Remove" alt="Remove" src="image/remove.png"></td>
                            <td class="price"><?= number_format($item['gia']) ?> VNĐ</td>
                            <td class="total"><?= number_format($item['soluong'] * $item['gia']) ?> VNĐ</td>
                        </tr>              
                        <?php
                        $tongTien += ($item['soluong'] * $item['gia']);
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="price"><b>Tổng tiền:</b></td>
                        <td class="total"><?= number_format($tongTien) ?> VNĐ</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="buttons">
        <div class="right"><a class="button" href="checkout.php">Thanh toán</a></div>
        <div class="center"><a class="button" href="index.php">Tiếp tục mua sắm</a></div>
      </div>
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    </form>
</div>
<?php
include_once 'inc/footer.inc';
?>

<!--Do Minh Tuan 
    code update gio hang
-->
<script>
    $(document).ready(function () {
        $('table tr td img[class="update"]').live('click', function () {
            var idsp = $('table tr:nth-child(' + ($(this).closest('tr').index() + 1) + ')').find('td[name="idsp"').html();
            var soluong = $('table tr:nth-child(' + ($(this).closest('tr').index() + 1) + ')').find('input[name="qty"').val();
            $.ajax({
                url: "ajax_updateCart.php",
                data: {
                    idsp: idsp,
                    soluong: soluong
                },
                type: "GET",
                success: function (result) {
                    $('#tbody').html(result);
                },
                error: function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);
                },
            });
        });
        
        $('table tr td img[class="delete"]').live('click', function () {
            var idsp = $('table tr:nth-child(' + ($(this).closest('tr').index() + 1) + ')').find('td[name="idsp"').html();
            
            $.ajax({
                url: "ajax_deleteItemCart.php",
                data: {
                    idsp: idsp
                },
                type: "GET",
                success: function (result) {
                    $('#tbody').html(result);
                    $('#cart-total').html(($('#cart-total').html().substring(0,1) - 1) +" sản phẩm");
                },
                error: function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);
                },
            });
        });
        
    });
</script>