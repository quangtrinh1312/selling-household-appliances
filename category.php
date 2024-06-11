<?php 
include_once 'inc/header.inc';
include_once 'inc/left-content.inc';
include_once 'inc/define-cat.inc';

if (isset($_GET['idnsx'])) {
  $idnsx = $_GET['idnsx'];
  $iddm = $_GET['iddm'];
} else {
  $iddm = $_GET['iddm'];
}

?>
    <div id="content">
      <!--Breadcrumb Part Start-->
      <?php 
        $queryDM = "SELECT * FROM danhmuc WHERE MaDM = {$iddm}";
        $resultDM = $mysqli->query($queryDM);
        $dm = mysqli_fetch_assoc($resultDM);
      ?>
      <div class="breadcrumb"> <a href="index.php">Home</a> » <a href="#"><?=$dm['TenDM']?></a></div>
      <!--Breadcrumb Part End-->
      <h1><?=$dm['TenDM']?></h1>
      
      <!--Product Grid Start-->
      <div class="product-grid">
      <?php 
      $count = COUNT_PER_PAGE;
      $offset = 0;
      if (isset($_GET['o'])) {
        $o = $_GET['o'];
        $offset = (($o - 1) * $count);
      }
      if (isset($idnsx)) {
        $queryTong = "SELECT count(MaSP) AS tongdong FROM sanpham WHERE MaDM = {$iddm} AND MaNSX = {$idnsx}";
      } else {
        $queryTong = "SELECT count(MaSP) AS tongdong FROM sanpham WHERE MaDM = {$iddm}";
      }
      $resultTong = $mysqli->query($queryTong);
      $rowTong = mysqli_fetch_assoc($resultTong);
      $tongdong = $rowTong['tongdong'];
      $sotrang = ceil($tongdong/$count);



      if (isset($idnsx)) {
        $querySP = "SELECT * FROM sanpham WHERE MaDM = {$iddm} AND MaNSX = {$idnsx} LIMIT $offset,$count";
      } else {
        $querySP = "SELECT * FROM sanpham WHERE MaDM = {$iddm} LIMIT $offset,$count";
      } 
        $resultSP = $mysqli->query($querySP);
        while ($sp = mysqli_fetch_assoc($resultSP)){
      ?>
        <div>
          <div class="image"><a href="chitiet.php?idsp=<?=$sp['MaSP']?>&&iddm=<?=$sp['MaDM']?>"><img src="hinhanh/<?=$sp['HinhAnh']?>" alt="<?=$sp['TenSP']?>" width="152px" height="100px"/></a></div>
          <div class="name"><a href="chitiet.php?idsp=<?=$sp['MaSP']?>&&iddm=<?=$sp['MaDM']?>"><?=$sp['TenSP']?></a></div>
          <div class="price"> <?=number_format($sp['Gia']).' VNĐ'?> </div>
        </div>
      <?php } ?>
      </div>
      <!--Product Grid End-->
      <!--Pagination Part Start-->
      <div class="pagination">
        <div class="links">
        <?php 
          for ($i=1; $i <= $sotrang ; $i++) {            
        ?>
        <?php 
            if (isset($idnsx)) {
              $str = "category.php?o={$i}&iddm={$iddm}&idnsx={$idnsx}";
            } else {
              $str = "category.php?o={$i}&iddm={$iddm}";
            }
        ?>
          <a href="<?=$str?>"><?=$i?></a>
        <?php } ?>
        </div>
      </div>
      <!--Pagination Part End-->
    <?php 
    include_once 'inc/footer.inc';
    ?>