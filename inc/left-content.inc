<div id="column-left">
      <!--Categories Part Start-->
      <div class="box">
        <div class="box-heading">Danh Mục</div>
        <div class="box-content box-category">
          <ul id="custom_accordion">
            <?php 
              $queryDM = "SELECT * FROM danhmuc";
              $resultDM = $mysqli->query($queryDM);
              while($danhmuc = mysqli_fetch_assoc($resultDM)){
            ?>
            <li class="category25"><a class="cuuchild " href="category.php?iddm=<?=$danhmuc['MaDM']?>"><?=$danhmuc['TenDM']?></a> <span class="down"></span>
              <ul>
              <?php 
                $queryNSX = "SELECT * FROM nhasanxuat";
                $reslutNSX = $mysqli->query($queryNSX);
                while ($nsx = mysqli_fetch_assoc($reslutNSX)){
              ?>
                <li class="category30"><a class="nochild " href="category.php?iddm=<?=$danhmuc['MaDM']?>&&idnsx=<?=$nsx['MaNSX']?>"><?=$nsx['TenNSX']?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <!--Categories Part End-->
      <!--Latest Product Start-->
      <div class="box">
        <div class="box-heading">Sản Phẩm Đặc Biệt</div>
        <div class="box-content">
          <div class="box-product">
          <?php 
            $querySP = "SELECT * FROM sanpham WHERE KichHoat = '1' ORDER BY RAND() LIMIT 0,4";
            $resultSP = $mysqli->query($querySP);
            while ($rowSP = mysqli_fetch_assoc($resultSP)){
          ?>
            <div>
              <div class="image"><a href="chitiet.php?idsp=<?=$rowSP['MaSP']?>&iddm=<?=$rowSP['MaDM']?>"><img src="hinhanh/<?=$rowSP['HinhAnh']?>" alt="<?=$rowSP['TenSP']?>" width="50px" height="50px" /></a></div>
              <div class="name"><a href="chitiet.php?idsp=<?=$rowSP['MaSP']?>&iddm=<?=$rowSP['MaDM']?>"><?=$rowSP['TenSP']?></a></div>
              <div class="price"><?=number_format($rowSP['Gia']).' VNĐ'?></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!--Latest Product End-->
      <!--Specials Product Start-->
      
      <!--Specials Product End-->
    </div>
    