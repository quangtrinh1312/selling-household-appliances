<?php 
include_once 'inc/header.inc';

?>

<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Danh Mục</div>
					<div class="panel-body">
						<table class="table table-bordered" >
							<a href="dm-them.php" class="btn btn-success them">Thêm Danh Mục</a>
							<?php 
								if (isset($_GET['mgsdm'])) {
									$mgsdm = $_GET['mgsdm'];
									echo "<p class=notification >$mgsdm</p>";
								}
							?>
						    <tr class="active">
						        <td style="text-align: center">Mã DM</td>
						        <td style="text-align: center">Tên Danh Mục</td>
						        <td style="text-align: center">Chức Năng</td>
						    </tr>
						    <?php 
						    	$queryDM = "SELECT * FROM danhmuc";
						    	$resultDM = $mysqli->query($queryDM);
						    	while ($arrDM = mysqli_fetch_assoc($resultDM)) {
						    ?>
						    <tr>
						        <td style="text-align: center"><?=$arrDM['MaDM']?></td>
						        <td style="text-align: center"><?=$arrDM['TenDM']?></td>
						        <td style="text-align: center">
						        	<a href="dm-sua.php?id=<?=$arrDM['MaDM']?>">Sửa <img src="images/pencil.gif"
									alt="edit" /> </a> <a href="dm-xoa.php?id=<?=$arrDM['MaDM']?>">Xóa <img src="images/bin.gif"
									width="16" height="16" alt="delete" /> </a>
						        </td>
						    </tr>
						    <?php } ?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Nhà Sản Xuất</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<a href="nsx-them.php" class="btn btn-success them">Thêm Nhà Sản Xuất</a>
							<?php 
								if (isset($_GET['mgsnsx'])) {
									$mgsnsx = $_GET['mgsnsx'];
									echo "<p class=notification >$mgsnsx</p>";
								}
							?>
						    <tr class="active">
						        <td style="text-align: center">Mã NSX</td>
						        <td style="text-align: center">Nhà Sản Xuất</td>
						        <td style="text-align: center">Chức Năng</td>
						    </tr>
						    <?php 
						    	$queryNSX = "SELECT * FROM nhasanxuat";
						    	$resultNSX = $mysqli->query($queryNSX);
						    	while ($arrNSX = mysqli_fetch_assoc($resultNSX)) {
						    ?>
						    <tr>
						        <td style="text-align: center"><?=$arrNSX['MaNSX']?></td>
						        <td style="text-align: center"><?=$arrNSX['TenNSX']?></td>
						        <td style="text-align: center">
						        	<a href="nsx-sua.php?id=<?=$arrNSX['MaNSX']?>">Sửa <img src="images/pencil.gif"
									alt="edit" /> </a> <a href="nsx-xoa.php?id=<?=$arrNSX['MaNSX']?>">Xóa <img src="images/bin.gif"
									width="16" height="16" alt="delete" /> </a>
						        </td>
						    </tr>
						    <?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
<?php 
include_once 'inc/footer.inc';
?>