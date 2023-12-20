<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Cửa Hàng Giày Thể Thao PVT</title>

	<link href="../inc/css/app.css" rel="stylesheet">
	<script src="../inc/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="typesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
       	<p class="text-center"><span class="align-middle ">Cửa Hàng Giày Thể Thao PVT</span></p>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-info">
						HỆ THỐNG
					</li>

					<?php if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==1){ ?>
					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"quanly_nguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../quanly_nguoidung/index.php">
						<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý người dùng</span>
						</a>
					</li>
					<?php } ?>

					<li class="sidebar-header text-info">
						DANH MỤC
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"quanly_danhmuc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../quanly_danhmuc/index.php">
						<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Quản lý danh mục</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"quanly_giay") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../quanly_giay/index.php">
						<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý giày</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"quanly_thuonghieu") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../quanly_thuonghieu/index.php">
						<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý thương hiệu</span>
						</a>
					</li>

					<li class="sidebar-header text-info">
						KINH DOANH
					</li>	

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"quanly_hoadon") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../quanly_hoadon/index.php">
						<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý hóa đơn</span>
						</a>
					</li>

					
					<?php /*
					<li class="sidebar-header text-info">
						CẤU HÌNH WEBSITE
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">Thông tin</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="image"></i> <span class="align-middle">Hình ảnh</span>
						</a>
					</li>*/ ?>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									1 thông báo mới
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Đơn hàng mới</div>
												<div class="text-muted small mt-1">Xem danh sách đơn hàng chờ xác nhận.</div>
												<div class="text-muted small mt-1">5 phút trước</div>
											</div>
										</div>
									</a>
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Tất cả thông báo</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										1 tin nhắn mới
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../../images/users/doraemon.jpg" class="avatar img-fluid rounded-circle" alt="Mèo máy Đô rê mon">
											</div>
											<div class="col-10 ps-2">
												
											</div>
										</div>
									</a>
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Tất cả tin nhắn</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="<?php if ($_SESSION["nguoidung"]["hinhanh"]==NULL) echo "../../images/Users/user.png";?>" class="avatar img-fluid rounded me-1" alt="" /> 
								<span class="text-dark">Chào <?php echo $_SESSION["nguoidung"]["tennguoidung"] ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<!--<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Hồ sơ cá nhân</a>								
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="key"></i> Đổi mật khẩu</a>
								
								<div class="dropdown-divider"></div>-->
								<a class="dropdown-item" href="../kt_nguoidung/index.php?action=dangxuat"><i class="align-middle me-1" data-feather="log-out"></i> Đăng xuất</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">