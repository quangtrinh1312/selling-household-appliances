<?php
include_once 'inc/header.inc';
include_once 'inc/define.inc';
?>
<!--Top Navigation Start-->
<!--Left Part-->
<?php
include_once 'inc/left-content.inc';
?>
<!--Left End-->
<!--Middle Part Start-->
<div id="content">

    <!--Slideshow Part Start-->
    <?php
    include_once 'inc/slider.inc';
    ?>
    <!--Slideshow Part End-->
    <!--Featured Product Part Start-->
    <div class="box">
        <div class="box-heading">Featured</div>
        <div class="box-content">
            <div class="box-product">
                <?php
                $count = COUNT_PER_PAGE;
                $offset = 0;
                if (isset($_GET['o'])) {
                    $o = $_GET['o'];
                    $offset = (($o - 1) * $count);
                }

                $queryTong = "SELECT count(MaSP) AS tongdong FROM sanpham";
                $resultTong = $mysqli->query($queryTong);
                $rowTong = mysqli_fetch_assoc($resultTong);
                $tongdong = $rowTong['tongdong'];
                $sotrang = ceil($tongdong / $count);

                $query = "SELECT * FROM sanpham ORDER BY RAND() LIMIT $offset,$count";
                $result = $mysqli->query($query);
                while ($dssp = mysqli_fetch_assoc($result)) {
                    ?>
                    <div>
                        <div class="image"><a href="chitiet.php?idsp=<?=$dssp['MaSP'] ?>&&iddm=<?=$dssp['MaDM'] ?>"><img src="hinhanh/<?= $dssp['HinhAnh'] ?>" alt="iPhone" width="152px" height="100px" /></a></div>
                        <div class="name"><a href="chitiet.php?idsp=<?=$dssp['MaSP'] ?>&&iddm=<?=$dssp['MaDM'] ?>"><?= $dssp['TenSP'] ?></a></div>
                        <div class="price"> <?= number_format($dssp['Gia']) . ' VNĐ' ?> </div>
                        
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="pagination">
        <div class="links">
            <?php
            for ($i = 1; $i <= $sotrang; $i++) {
                ?>
                <a href="index.php?o=<?= $i ?>"><?= $i ?></a>
            <?php } ?>
        </div>
    </div>
    <!--Featured Product Part End-->
    <?php
    include_once 'inc/footer.inc';
    ?>
    <!--Middle Part End-->

    <script>
        function addToCart(masp) {
            alert(masp);
        }
    </script>
