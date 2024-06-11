<?php 
include_once 'inc/header.inc';
$id = $_GET['id'];
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Hóa Đơn</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Chi Tiết Hóa Đơn</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr class="active">
						<td style="width: 6%; text-align: center;">Mã SP</td>
						<td style="width: 10%; text-align: center;">Số Lượng</td>
						<td style="width: 15%; text-align: center;">Thành Tiền</td>
					</tr>
					<?php 
						$queryTong = "SELECT * FROM hoadon WHERE MaHD = '{$id}'";
						$resultTong = $mysqli->query($queryTong);
						$arrTong = mysqli_fetch_assoc($resultTong);
						$query = "SELECT * FROM chitiethoadon WHERE MaHD = '{$id}'";
						$result = $mysqli->query($query);
						while ($arr = mysqli_fetch_assoc($result)){
							$idsp = $arr['MaSP'];
							$soluong = $arr['SoLuong'];
							$thanhtien = $arr['ThanhTien'];
								$querySP = "SELECT * FROM sanpham WHERE MaSP = '{$idsp}'";
								$resultSP = $mysqli->query($querySP);
								$arrSP = mysqli_fetch_assoc($resultSP);
					?>
					<tr>
						<td style="width: 6%; text-align: center;"><?=$arrSP['TenSP']?></td>
						<td style="width: 10%; text-align: center;"><?=$soluong?></td>
						<td style="width: 15%; text-align: center;"><?=$thanhtien?></td>
					</tr>
					<?php } ?>
					<tr class="info">
						<td></td>
						<td style="width: 15%; text-align: center;">Tổng Tiền:</td>
						<td style="width: 15%; text-align: center;"><?=$arrTong['TongTien']?></td>
					</tr>
				</table>




			</div>
		</div>
	</div><!--/.row-->
</div>