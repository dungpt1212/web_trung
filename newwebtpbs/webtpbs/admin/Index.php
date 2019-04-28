<?php
	session_start();
	include("connection.php");
	if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="menu-top" style="position: fixed; z-index: 2; width: 100%;">
  		<nav class="navbar navbar-default" role="navigation">
  			<div class="container">
  				<!-- Brand and toggle get grouped for better mobile display -->
  				<div class="navbar-header">
  					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
  						<span class="sr-only">Toggle navigation</span>
  						<span class="icon-bar"></span>
  						<span class="icon-bar"></span>
  						<span class="icon-bar"></span>
  					</button>
  					<a class="navbar-brand" href="../Index.php" style="color: white;">ShopWhey/Trang chủ</a>
  				</div>
  		
  				<!-- Collect the nav links, forms, and other content for toggling -->
  				<div class="collapse navbar-collapse navbar-ex1-collapse">
  				<div class="navbar-right">
  					<ul class="nav navbar-nav navbar-right">
  						<li><?php if (isset($_SESSION['admin'])) {
                echo("<a href=''><i class='glyphicon glyphicon-user' style='margin-right:4px;'></i>".$_SESSION['admin']."</a>");
              }
               ?></li>
              <li><?php if (isset($_SESSION['admin'])) {
                echo("<a href='../View/logout.php'><i class='glyphicon glyphicon-log-out' style='margin-right:4px;'></i>Đăng xuất</a>");
              } ?></li>
  					</ul>
  				</div>
  			</div>
  			</div>
  		</nav>
  	</div>

	<div class="main">
		<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2" style="margin-left: -14px; margin-top: 80px; position: fixed; z-index: 1;">
			<div style="background-color: #32373c;height:660px; margin-top: -20px;">
					<ul class="nav nav-pills nav-stacked">
						<li><a href="Index.php?page=trangchu"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
						<li><a href="Index.php?page=quanlytintuc"><span class="glyphicon glyphicon-pencil"></span> Quản lý tin tức</a></li>
						<li><a href="Index.php?page=quanlynhomtintuc"><span class="fa fa-object-group"></span> Quản lý nhóm tin tức</a></li>
						<li><a href="Index.php?page=quanlysanpham"><span class="glyphicon glyphicon-tag" style="margin-right: 5px;"></span>Quản lý sản phẩm</a></li>
						<li><a href="Index.php?page=quanlynhomsanpham"><span class="glyphicon glyphicon-tags" style="margin-right: 5px;"></span>Quản lý nhóm sản phẩm</a></li>
						<li><a href="Index.php?page=quanlynhasanxuat"><span class="	glyphicon glyphicon-folder-close" style="margin-right: 5px;"></span>Quản lý nhà sản xuất</a></li>
						<!-- <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Quản lý giới thiệu</a></li> -->
						<li><a href="Index.php?page=quanlydonhang"><span class="glyphicon glyphicon-shopping-cart"></span> Quản lý đơn hàng</a></li>
						<li><a href="Index.php?page=quanlykhachhang"><span class="glyphicon glyphicon-lock"></span> Khách hàng</a></li>
						<li><a href="Index.php?page=quanlytaikhoan"><span class="glyphicon glyphicon-user"></span> Quản lý tài khoản</a></li>
						<li><a href="Index.php?page=themtaikhoanadmin"><span class="glyphicon glyphicon-plus"></span>Thêm tài khoản admin</a></li>
					</ul>
			</div>
		</div>
		<div class="col-xs-6 col-sm-10 col-md-10 col-lg-10" style="margin-left: 200px; margin-top: 60px;">
			<?php
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
					switch ($page) {
						case 'quanlytintuc':
							require 'View/quanlytintuc.php';
							break;
						case 'quanlynhomtintuc':
							require 'View/quanlynhomtintuc.php';
							break;
						case 'themtaikhoanadmin':
							require 'View/themtaikhoanadmin.php';
							break;
						case 'themtintuc':
							require 'View/themtintuc.php';
							break;
						case 'capnhattintuc':
							require 'View/capnhattintuc.php';
							break;
						case 'quanlysanpham':
							require 'View/quanlysanpham.php';
							break;
						case 'quanlynhomsanpham':
							require 'View/quanlynhomsanpham.php';
							break;
						case 'suanhomsanpham':
							require 'View/suanhomsp.php';
							break;
						case 'quanlytaikhoan':
							require 'View/quanlytaikhoan.php';
							break;
						case 'capnhatsanpham':
							require 'View/capnhatsanpham.php';
							break;
						case 'quanlykhachhang':
							require 'View/quanlykhachhang.php';
							break;
						case 'quanlynhasanxuat':
							require 'View/quanlynhasanxuat.php';
							break;
						case 'quanlydonhang':
							require 'View/quanlydonhang.php';
							break;
						case 'xemdonhangchitiet':
							require 'View/xemdonhangchitiet.php';
							break;
						case 'suanhasanxuat':
							require 'View/suanhasanxuat.php';
							break;
						case 'themsanpham':
							require 'View/themsanpham.php';
							break;
						case 'suanhomtintuc':
							require 'View/suanhomtintuc.php';
							break;
						default:
							require 'View/trangchu.php';
							break;
					}
				}
			?>
		</div>
	</div>
	<?php
		}else{
			header("location:login/login/index.php");
		}
	?>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>