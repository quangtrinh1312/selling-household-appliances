<?php
include_once 'inc/header.inc';
include_once 'inc/left-content.inc';
?>
<!--Left Part-->
<?php
$iddm = $_GET['iddm'];
$idsp = $_GET['idsp'];
$query = "SELECT * FROM sanpham WHERE MaSP = {$idsp}";
$result = $mysqli->query($query);
$sp = mysqli_fetch_assoc($result);
?>
<!--Left End-->
<!--Middle Part Start-->
<div id="content">
    <!--Breadcrumb Part Start-->
    <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#"></a></div>
    <!--Breadcrumb Part End-->
    <div class="product-info">
        <div class="left">
            <div class="image">  <img src="hinhanh/<?= $sp['HinhAnh'] ?>" width="350px" height="500px" title="#" alt="#" id="image" /></a> </div>

        </div>
        <div class="right">
            <h1 id="tenSP"><?= $sp['TenSP'] ?></h1>
            <div class="description"><?= $sp['ChiTietSP'] ?></div>
            <div class="price">GIÁ: 
                <div class="price-tag"><?= number_format($sp['Gia']) . ' VNĐ' ?></div>
                <p hidden id="product-price"><?=$sp['Gia']?></p>
                <br>

            </div>
            <div class="cart">
                <div>
                    <div class="qty"> <strong>Số Lượng:</strong> <a href="javascript:void(0);" class="qtyBtn mines">-</a>
                        <input type="text" value="1" size="2" name="quantity" class="w30" id="qty">
                        <a href="javascript:void(0);" class="qtyBtn plus">+</a>
                        <div class="clear"></div>
                    </div>
                    <input type="button" class="button" id="button-cart" value="Add to Cart">
                </div>

            </div>

            <!-- AddThis Button BEGIN -->

        </div>
    </div>
    <!-- Tabs Start -->

    <!-- Tabs End -->
    <!-- Related Products Start -->
    <div class="box">
        <div class="box-heading">Sản Phẩm Liên Quan</div>
        <div class="box-content">
            <div class="box-product">
                <?php
                $querySP = "SELECT * FROM sanpham WHERE MaDM = {$iddm} ORDER BY RAND() LIMIT 0,4";
                $resultSP = $mysqli->query($querySP);
                while ($sp = mysqli_fetch_assoc($resultSP)) {
                    ?>
                    <div>
                        <div class="image"><a href="chitiet.php?idsp=<?= $sp['MaSP'] ?>&&iddm=<?= $sp['MaDM'] ?>"><img alt="iPad Classic" width="100px" height="80px" src="hinhanh/<?= $sp['HinhAnh'] ?>"></a></div>
                        <div class="name"><a href="chitiet.php?idsp=<?= $sp['MaSP'] ?>&&iddm=<?= $sp['MaDM'] ?>"><?= $sp['TenSP'] ?></a></div>
                        <div class="price"> <span class="price-new"><?= number_format($sp['Gia']) . ' VNĐ' ?></span> </div>
<!--                        <a class="button">Add to Cart</a>-->
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Related Products End -->
    </div>
    <!--Middle Part End-->

    <?php
    include_once 'inc/footer.inc';
    ?>

    <!-- Do Minh Tuan 
        Script gio hang -->

    <script>
        $(document).ready(function () {
            $('#button-cart').click(function () {
                var idsp = "<?= $idsp ?>";
                var tensp = $('#tenSP').html();
                var qty = $('#qty').val();
                var hinhanh = $('#image').attr('src');
                var gia = $('#product-price').html();
                var myVerifyText = "Bạn có chắc muốn mua mặt hàng " + tensp + " với số lượng là " + qty + " không?";
                swal({title: "CHI TIẾT MUA HÀNG", text: myVerifyText, type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "OK", cancelButtonText: "HỦY", closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
                    if (isConfirm) {
                        //Ajax    
                        $.ajax({
                            url: "ajax_addToCart.php",
                            data: {
                                idsp: idsp,
                                tensp: tensp,
                                soluong: qty,
                                hinhanh: hinhanh,
                                gia: gia
                            },
                            type: "GET",
                            success: function (result) {  
                                var obj = jQuery.parseJSON(result);
                                $('#cart-total').html(obj.soluonggiohang +" sản phẩm");
                                $('.mini-cart-info').html(obj.str);
                                if(obj.found){
                                    swal("KHÔNG THỂ THÊM", "Mặt hàng này đã có trong giỏ hàng, vui lòng chỉnh sửa trong trang chi tiết giỏ hàng", "error");
                                }
                                else{
                                    swal("THÀNH CÔNG!", "Mặt hàng đã được thêm vào giỏ hàng", "success");
                                }                                
                            },
                            error: function (xhr, status, errorThrown) {
                                alert("Sorry, there was a problem!");
                                console.log("Error: " + errorThrown);
                                console.log("Status: " + status);
                                console.dir(xhr);
                            },
                        });
                    } else {
                        swal("HỦY!", "Mặt hàng chưa được thêm vào giỏ hàng", "error");
                    }
                });
            });
        });
    </script>