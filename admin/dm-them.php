<?php 
include_once 'inc/header.inc';

if (isset($_POST['submit'])) {
	$tendm = $mysqli->real_escape_string($_POST['tendm']);

	$queryThemDM = "INSERT INTO danhmuc (TenDM) VALUES ('{$tendm}')";
	$resultThemDM = $mysqli->query($queryThemDM);
	if ($resultThemDM) {
		header("LOCATION: danhmuc.php?mgsdm=Thêm Thành Công");
		exit();
	}
	else {
		echo "Lỗi";
	}
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh Mục</h1>
	</div>
</div>
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thêm Danh Mục</div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post">
							
								<div class="form-group">
									<input class="form-control" name="tendm" placeholder="Tên Danh Mục" required>
								</div>															

								<button type="submit" name="submit" class="btn btn-primary">Thêm Danh Mục</button>
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