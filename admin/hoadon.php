<?php 
include_once 'inc/header.inc';

?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Hóa Đơn</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Danh Sách Hóa Đơn</div>
			<div class="panel-body">
			<?php 
				if (isset($_GET['mgs'])) {
					$mgs = $_GET['mgs'];
					echo "<p class=notification >$mgs</p>";
				}
			?>
				<div class="col-md-4">
					<table class="table table-striped">
					<?php 
						$query1 = "SELECT count(MaTT) AS ChuaTT FROM hoadon WHERE MaTT = '2'";
						$result1 = $mysqli->query($query1);
						$arr1 = mysqli_fetch_assoc($result1);
							$ChuaTT = $arr1['ChuaTT'];
						$query2 = "SELECT count(MaTT) AS DaTT FROM hoadon WHERE MaTT = '1'";
						$result2 = $mysqli->query($query2);
						$arr2 = mysqli_fetch_assoc($result2);
							$DaTT = $arr2['DaTT'];
					?>
						<tr class="info">
							<td class="">Số Đơn Hàng Chưa Thanh Toán:</td>
							<td><span style="color:red"><?=$ChuaTT?></span></td>
						</tr>
						<tr class="info">
							<td class="">Số Đơn Hàng Đã Thanh Toán:</td>
							<td><?=$DaTT?></td>
						</tr>
					</table>
				</div>
				<table class="table table-bordered">
					<tr class="active">
						<td style="width: 8%; text-align: center;">Ngày Lập HĐ</td>
						<td style="width: 15%; text-align: center;">Họ Tên Khách Hàng</td>
						<td style="width: 15%; text-align: center;">Email</td>
						<td style="width: 15%; text-align: center;">Số Phone</td>
						<td style="width: 15%; text-align: center;">Địa Chỉ</td>
						<td style="width: 15%; text-align: center;">Tình Trạng</td>
						<td style="width: 40%; text-align: center;">Chức Năng</td>
					</tr>
					<?php 
						$queryHD = "SELECT * FROM hoadon ORDER BY MaHD DESC";
						$resultHD = $mysqli->query($queryHD);
						while ($arrHD = mysqli_fetch_assoc($resultHD)){
							$MaTT = $arrHD['MaTT'];
								$queryTT = "SELECT * FROM TinhTrang WHERE MaTT = '{$MaTT}'";
								$resultTT = $mysqli->query($queryTT);
								$arrTT = mysqli_fetch_assoc($resultTT); 
					?>
					<tr>
						<td style="width: 8%; text-align: center;"><?=$arrHD['NgayLap']?></td>
						<td style="width: 15%; text-align: center;"><?=$arrHD['HoTenKH']?></td>
						<td style="width: 15%; text-align: center;"><?=$arrHD['Email']?></td>
						<td style="width: 15%; text-align: center;"><?=$arrHD['SDT']?></td>
						<td style="width: 15%; text-align: center;"><?=$arrHD['DiaChi']?></td>
						<?php 
							if ($MaTT == '1') {
								$str1 = "info";
							} else {
								$str1 = "warning";
							}
						?>
						<td style="width: 20%; text-align: center;" class="<?=$str1?>"><?=$arrTT['TinhTrang']?></td>
						<td style="width: 40%;">
						<?php 
							if ($MaTT == '2') {
								$str = "<a href='thanhtoanhd.php?id={$arrHD['MaHD']}' class='button'><img src='images/notification-tick.gif'> Thanh Toán</a><br>";
								echo $str;
							}
						?>
						<a href="chitiethd.php?id=<?=$arrHD['MaHD']?>" class="button"><img src="images/arrow-stop.gif"> Chi Tiết</a><br>
						<a href="xoahd.php?id=<?=$arrHD['MaHD']?>" class="button"><img src="images/bin.gif"> Xóa</a>
						</td>
					</tr>
					<?php } ?>
				</table>
				<script src="js/jquery-1.11.1.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/chart.min.js"></script>
				<script src="js/chart-data.js"></script>
				<script src="js/easypiechart.js"></script>
				<script src="js/easypiechart-data.js"></script>
				<script src="js/bootstrap-datepicker.js"></script>



			</div>
		</div>
	</div><!--/.row-->
</div>