<?php include("../inc/top.php"); ?>

<h3>Thêm thương hiệu</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
	<input type="hidden" name="action" value="xulythem">
    <div class="mb-3 mt-3">
		<label>Ảnh đại diện</label>
		<input class="form-control" type="file" name="filehinhanh">
	</div>
	<div class="mb-3 mt-3">
		<label for="txttenmathang" class="form-label">Tên người dùng</label>
		<input class="form-control" type="text" name="txttennguoidung" placeholder="Nhập tên người dùng" required>
	</div>
	<div class="mb-3 mt-3">
		<label for="txttenmathang" class="form-label">Quốc gia</label>
		<input class="form-control" type="text" name="txtquocgia" placeholder="Nhập quốc gia" required>
	</div>
	<div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Email</label>
		<input class="form-control" type="email" name="txtemail" placeholder="Nhập email" required>
	</div>
	<div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Số điện thoại</label>
		<input class="form-control" type="tel" name="txtsdt" placeholder="Nhập số điện thoại" required>
	</div>
	<div class="mb-3 mt-3">
		<input type="submit" value="Lưu" class="btn btn-success">
		<input type="reset" value="Hủy" class="btn btn-warning">
	</div>
</form>

<?php include("../inc/bottom.php"); ?>