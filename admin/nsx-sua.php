<?php 
include_once 'inc/header.inc';
$id = $_GET['id'];

$queryNSX = "SELECT * FROM nhasanxuat WHERE MaNSX = '{$id}'";
$resultNSX = $mysqli->query($queryNSX);
$arrDM = mysqli_fetch_assoc($resultNSX);

if (isset($_POST['submit'])) {
	$tennsx = $mysqli->real_escape_string($_POST['tennsx']);

	$querySuaNSX = "UPDATE nhasanxuat SET TenNSX = '{$tennsx}' WHERE MaNSX = '{$id}'";
	$resultSuaNSX = $mysqli->query($querySuaNSX);
	if ($resultSuaNSX) {
		header("LOCATION: danhmuc.php?mgsnsx=Sửa Thành Công");
		exit();
	}
	else {
		echo "Lỗi";
	}
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Nhà Sản Xuất</h1>
	</div>
</div>
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Sửa Nhà Sản Xuất</div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post">
							
								<div class="form-group">
									<input class="form-control" name="tennsx" placeholder="Tên Nhà Sản Xuất" value="<?=$arrDM['TenNSX']?>" required>
								</div>															

								<button type="submit" name="submit" class="btn btn-primary">Sửa Nhà Sản Xuất</button>
								<button type="reset" class="btn btn-default">Reset </button>
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div>
<?php 
include_once 'inc/footer.inc';
?>