<?php 
session_start();
ob_start();
include_once 'inc/dbconnect.php';
include_once 'inc/kiemtra.inc';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMIN</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/styles1.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script language="javascript" src="js/ckeditor/ckeditor.js"
	type="text/javascript"></script>

<style type="text/css">
.notification {
	font-size: 15px;
	background-position: 20px 20px;
	background-repeat: no-repeat;
	border: 1px solid;
	display: block;
	margin-bottom: 20px;
	margin-top: 26px;
	padding: 20px 20px 20px 45px;
	background-color: #a3e6bd;
	border-color: #68d59b;
	background-image: url(images/notification-tick.gif);
}
.them{
	margin-bottom: 15px;
}
</style>
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?=$_SESSION['HoTen']?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
				
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				
			</div>
		</form>
		<ul class="nav menu">
			<!--<li class="<?php //if(basename($_SERVER['SCRIPT_NAME'])=='index.php') echo "selected"; ?>"><a href="index.php">Trang chủ</a></li>-->
			<li class="<?php if(basename($_SERVER['SCRIPT_NAME'])=='index.php') echo "active"; ?>"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Danh Sách Sản Phẩm</a></li>
			<li class="<?php if(basename($_SERVER['SCRIPT_NAME'])=='danhmuc.php') echo "active"; ?>"><a href="danhmuc.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Danh Mục</a></li>
			</li>
			<li class="<?php if(basename($_SERVER['SCRIPT_NAME'])=='hoadon.php') echo "active"; ?>"><a href="hoadon.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Hóa Đơn </a></li>
		
			<!--Dropdown-->
				<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Thêm 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="sp-them.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Thêm SP
						</a>
					</li>
					<li>
						<a class="" href="dm-them.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Thêm Danh Mục
						</a>
					</li>
					<li>
						<a class="" href="nsx-them.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Thêm NSX
						</a>
					</li>
				</ul>
			</li>
			<!--End Dropdown-->

			<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout Page</a></li>
		</ul>

	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->