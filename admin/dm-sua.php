<?php 
include_once 'inc/header.inc';
$id = $_GET['id'];

$queryDM = "SELECT * FROM danhmuc WHERE MaDM = '{$id}'";
$resultDM = $mysqli->query($queryDM);
$arrDM = mysqli_fetch_assoc($resultDM);

if (isset($_POST['submit'])) {
	$tendm = $mysqli->real_escape_string($_POST['tendm']);

	$querySuaDM = "UPDATE danhmuc SET TenDM = '{$tendm}' WHERE MaDM = '{$id}'";
	$resultSuaDM = $mysqli->query($querySuaDM);
	if ($resultSuaDM) {
		header("LOCATION: danhmuc.php?mgsdm=Sửa Thành Công");
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
					<div class="panel-heading">Sửa Danh Mục</div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post">
							
								<div class="form-group">
									<input class="form-control" name="tendm" placeholder="Tên Danh Mục" value="<?=$arrDM['TenDM']?>" required>
								</div>															

								<button type="submit" name="submit" class="btn btn-primary">Sửa Danh Mục</button>
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