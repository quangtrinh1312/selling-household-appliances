<?php 
include_once 'inc/header.inc';
include_once 'inc/define.inc';
$count = COUNT_PER_PAGE;
$offset = 0;
if(isset($_GET['o'])){
	$o = $_GET['o'];
	$offset = ($o - 1) * $count;
}
$queryTD = "SELECT count(MaSP) AS tongdong FROM sanpham";
$resultTD = $mysqli->query($queryTD);
$arTD = mysqli_fetch_assoc($resultTD);
$tongdong = $arTD['tongdong'];
$sotrang = ceil($tongdong/$count);
?>
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">SẢN PHẨM</h1>
			</div>
		</div><!--/.row-->
		
		<!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Danh Sách Sản Phẩm</div>
					<div class="panel-body">
						<?php 
							if (isset($_GET['mgs'])) {
								$mgs = $_GET['mgs'];
								echo "<p class=notification >$mgs</p>";
							}
						?>
						<table class="table table-bordered">
						<a href="sp-them.php" class="btn btn-success them">Thêm Sản Phẩm</a>
							<tr class="active">
								<td style="width: 5%; text-align: center;">Mã SP</td>
								<td style="width: 20%">Tên SP</td>
								<td style="width: 10%">Hình Ảnh</td>
								<td style="width: 11%; text-align: center;">Nhà SX</td>
								<td style="width: 11%; text-align: center;">Danh Mục</td>
								<td style="width: 11%; text-align: center;">Giá</td>
								<td style="width: 11%; text-align: center;">Chức Năng</td>
							</tr>
							<?php 
								$query = "SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT $offset,$count";
								$result = $mysqli->query($query);
								while($arr = mysqli_fetch_assoc($result)){
									$madm = $arr['MaDM'];
									$mansx = $arr['MaNSX'];
									$idsp = $arr['MaSP'];
								$queryDM = "SELECT * FROM danhmuc WHERE MaDM = '{$madm}'";
								$resultDM = $mysqli->query($queryDM);
								$arrDM = mysqli_fetch_assoc($resultDM);
									$TenDM = $arrDM['TenDM'];
								$queryNSX = "SELECT * FROM nhasanxuat WHERE MaNSX = '{$mansx}'";
								$resultNSX = $mysqli->query($queryNSX);
								$arrNSX = mysqli_fetch_assoc($resultNSX);
									$NSX = $arrNSX['TenNSX'];
							?>
							<tr>
								<td style="width: 4%; text-align: center;"><?=$arr['MaSP']?></td>
								<td style="width: 20%"><?=$arr['TenSP']?></td>
								<td style="width: 10%"><img src="../hinhanh/<?=$arr['HinhAnh']?>" width="70px" height="70px"></td>
								<td style="width: 11%; text-align: center;"><?=$NSX?></td>
								<td style="width: 11%; text-align: center;"><?=$TenDM?></td>
								<td style="width: 11%; text-align: center;"><?=number_format($arr['Gia'])?></td>
								<td align="center"><a href="sp-sua.php?idsp=<?=$idsp?>">Sửa <img src="images/pencil.gif"
									alt="edit" /> </a> <a href="sp-xoa.php?idsp=<?=$idsp?>">Xóa <img src="images/bin.gif"
									width="16" height="16" alt="delete" /> </a>
								</td>
							</tr>
							<?php } ?>
							
						</table>
						<div class="pagination">
							<div class="numbers">
							<span>Page:</span> 
							<?php 
							for ($i = 1; $i <= $sotrang; $i++) {
							?>
								<a href="index.php?o=<?=$i?>"><?=$i?></a> |
							<?php }?>
							</div>
							<div style="clear: both;"></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
		
</body>

</html>
