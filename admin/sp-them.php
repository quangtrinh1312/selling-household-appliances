<?php 
include_once 'inc/header.inc';
if (isset($_POST['submit'])) {
	$tensp = $mysqli->real_escape_string($_POST['tensp']);
	$gia = $mysqli->real_escape_string($_POST['gia']);
	$chitiet = $mysqli->real_escape_string($_POST['chitiet']);
	$danhmuc = $mysqli->real_escape_string($_POST['danhmuc']);
	$nsx = $mysqli->real_escape_string($_POST['nsx']);

	$arrHinh = $_FILES['hinhanh'];
	$tenhinh = $arrHinh['name'];

	if ($tenhinh == '') {
		$queryThemSP = "INSERT INTO sanpham (TenSP, Gia, ChiTietSP , MaNSX, MaDM)
						 VALUES ('{$tensp}','{$gia}','{$chitiet}','{$nsx}','{$danhmuc}')";
	}
	else
	{
		//tmp_name: đường dẫn upload file
		$filename = $arrHinh['tmp_name'];
		$destination = $_SERVER['DOCUMENT_ROOT']. '/MaNguonMo1/hinhanh/'.$tenhinh;
		move_uploaded_file($filename, $destination);

		$queryThemSP = "INSERT INTO sanpham (TenSP, Gia, ChiTietSP, HinhAnh , MaNSX, MaDM)
						 VALUES ('{$tensp}','{$gia}','{$chitiet}','{$tenhinh}','{$nsx}','{$danhmuc}')";
	}
	$resultThemSP = $mysqli->query($queryThemSP);
	if($resultThemSP){
		header("LOCATION: index.php?mgs=Thêm Thành Công");
		exit();
	}else{
		echo "Lỗi";
	}
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sản Phẩm</h1>
	</div>
</div>
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thêm Sản Phẩm</div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post" enctype="multipart/form-data">
							
								<div class="form-group">
									<label>Tên SP</label>
									<input class="form-control" name="tensp" placeholder="Tên Sản Phẩm" required>
								</div>

								<div class="form-group">
									<label>Giá</label>
									<input class="form-control" name="gia" placeholder="Giá Bán" required>
								</div>

								<div class="form-group">
									<label>Nhà Sản Xuất</label>
									<select class="form-control" name="nsx" required>
										<option>--Chọn Nhà Sản Xuất--</option>
											<?php 
												$queryNSX = "SELECT * FROM nhasanxuat";
												$resultNSX = $mysqli->query($queryNSX);
												while ($arrNSX = mysqli_fetch_assoc($resultNSX)){						
											?>
											<option value="<?=$arrNSX['MaNSX']?>">
											<?=$arrNSX['TenNSX']?>
										</option>									
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Danh Mục</label>
									<select class="form-control" name="danhmuc" required>
										<option>--Chọn Danh Mục--</option>
										<?php 
											$queryDM = "SELECT * FROM danhmuc";
											$resultDM = $mysqli->query($queryDM);
											while ($arrDM = mysqli_fetch_assoc($resultDM)){						
										?>
										<option value="<?=$arrDM['MaDM']?>">
										<?=$arrDM['TenDM']?>
										</option>									
										<?php } ?>
									</select>
								</div>
																											
								<div class="form-group">
									<label>File input</label>
									<input type="file" name="hinhanh" value="" />
									 <p class="help-block">Vui Lòng Chọn Hình.</p>
								</div>
								
								<div class="form-group">
									<label>Chi Tiết SP</label>
									<textarea class="form-control ckeditor" name="chitiet" rows="3" required></textarea>
								</div>

								<button type="submit" name="submit" class="btn btn-primary">Thêm SP</button>
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