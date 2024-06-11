<?php 
include_once 'inc/header.inc';
$idsp = $_GET['idsp'];
$querySP = "SELECT * FROM sanpham WHERE MaSP = '{$idsp}'";
$resultSP = $mysqli->query($querySP);
$arrSP = mysqli_fetch_assoc($resultSP);
$iddm = $arrSP['MaDM'];
$idnsx = $arrSP['MaNSX'];
$hinhanh = $arrSP['HinhAnh'];
$chitiet = $arrSP['ChiTietSP'];

//xóa hình
if (isset($_POST['xoahinh'])) {
	$destination = $_SERVER['DOCUMENT_ROOT']. '/MaNguonMo1/hinhanh/'.$hinhanh;
	unlink($destination);
	$hinhanh = '';
}

if (isset($_POST['submit'])) {
	$tensp = $mysqli->real_escape_string($_POST['tensp']);
	$gia = $mysqli->real_escape_string($_POST['gia']);
	$nsx = $mysqli->real_escape_string($_POST['nsx']);
	$danhmuc = $mysqli->real_escape_string($_POST['danhmuc']);
	$chitiet = $mysqli->real_escape_string($_POST['chitiet']);

	$arrHinh = $_FILES['hinhanh'];
	$hinhanh = $arrHinh['name'];

	if ($hinhanh == '') {
		$querySua = "UPDATE sanpham SET TenSP='{$tensp}', Gia='{$gia}', ChiTietSP='{$chitiet}', MaNSX = '{$nsx}', MaDM='{$danhmuc}' WHERE MaSP='{$idsp}'";
	}
	else {
		$filename = $arrHinh['tmp_name'];
		$destination = $_SERVER['DOCUMENT_ROOT']. '/MaNguonMo1/hinhanh/'.$hinhanh;
		move_uploaded_file($filename, $destination);
		$querySua = "UPDATE sanpham SET TenSP='{$tensp}', Gia='{$gia}', ChiTietSP='{$chitiet}', HinhAnh='{$hinhanh}', MaNSX = '{$nsx}', MaDM='{$danhmuc}' WHERE MaSP='{$idsp}'";
	}
	$reslutSua = $mysqli->query($querySua);
	if ($reslutSua) {
		header("LOCATION: index.php?mgs=Sửa Thành Công!");
		exit();
	} else {
		echo "lỗi";
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
					<div class="panel-heading">Sửa Sản Phẩm</div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="post" enctype="multipart/form-data">
							
								<div class="form-group">
									<label>Tên SP</label>
									<input class="form-control" name="tensp" value="<?=$arrSP['TenSP']?>">
								</div>

								<div class="form-group">
									<label>Giá</label>
									<input class="form-control" name="gia" value="<?=$arrSP['Gia']?>">
								</div>

								<div class="form-group">
									<label>Nhà Sản Xuất</label>
									<select class="form-control" name="nsx">
										<option>--Chọn Nhà Sản Xuất--</option>
											<?php 
												$queryNSX = "SELECT * FROM nhasanxuat";
												$resultNSX = $mysqli->query($queryNSX);
												while ($arrNSX = mysqli_fetch_assoc($resultNSX)){
													$MaNSX = $arrNSX['MaNSX']						
											?>
											<option value="<?=$arrNSX['MaNSX']?>" <?php if($idnsx == $MaNSX) echo 'selected="selected"' ?>>
											<?=$arrNSX['TenNSX']?>
										</option>									
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Danh Mục</label>
									<select class="form-control" name="danhmuc">
										<option>--Chọn Danh Mục--</option>
										<?php 
											$queryDM = "SELECT * FROM danhmuc";
											$resultDM = $mysqli->query($queryDM);
											while ($arrDM = mysqli_fetch_assoc($resultDM)){	
												$MaDM = $arrDM['MaDM'];					
										?>
										<option value="<?=$arrDM['MaDM']?>" <?php if($iddm == $MaDM) echo 'selected="selected"'; ?> >
										<?=$arrDM['TenDM']?>
										</option>									
										<?php } ?>
									</select>
								</div>

								<?php 
									if ($hinhanh != '') {
										$str = "<div class=form-group>
												<label>Hình Ảnh</label><br>
												<img src=../hinhanh/$hinhanh width='150px' height='150px' /><br>
												<input type=submit name=xoahinh value='Xóa Hình' class='btn btn-success' />
												</div>";	
									} else {
										$str = "<div class='form-group'>
												<label>File input</label>
												<input type='file' name='hinhanh' value='' />
												<p class='help-block'>Vui Lòng Chọn Hình.</p>
												</div>";
									}
									echo $str;
								?>

								

								
								
								<div class="form-group">
									<label>Chi Tiết SP</label>
									<textarea class="form-control ckeditor" name="chitiet" rows="3"><?=$chitiet?></textarea>
								</div>

								<button type="submit" name="submit" class="btn btn-primary">Sửa SP</button>
								<button type="reset" class="btn btn-default">Reset</button>
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div>