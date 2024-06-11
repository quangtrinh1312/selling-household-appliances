<?php 
include_once 'inc/header.inc';

if (isset($_POST['submit'])) {
	$tennsx = $mysqli->real_escape_string($_POST['tennsx']);

	$queryThemNSX = "INSERT INTO nhasanxuat (TenNSX) VALUES ('{$tennsx}')";
	$resultThemNSX = $mysqli->query($queryThemNSX);
	if ($resultThemNSX) {
		header("LOCATION: danhmuc.php?mgsnsx=Thêm Thành Công");
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
					<div class="panel-heading">Thêm Nhà Sản Xuất</div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post">
							
								<div class="form-group">
									<input class="form-control" name="tennsx" placeholder="Tên Nhà Sản Xuất" required>
								</div>															

								<button type="submit" name="submit" class="btn btn-primary">Thêm Nhà Sản Xuất</button>
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