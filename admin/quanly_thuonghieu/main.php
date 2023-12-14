<?php include("../inc/top.php"); ?>

<h4 class="text-info">Danh sách thương hiệu</h4> 
<table class="table table-hover">
	<tr><th>ID</th><th>Tên thương hiệu</th><th>Logo</th>
    <th>Quốc gia</th><th>Email</th><th>Số điện thoại</th><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($thuonghieu as $t) : 
		if($t["id"] == $idsua){ // hiển thị form
	?>
		<tr>
		<form method="post">
			<input type="hidden" name="action" value="capnhat">
			<input type="hidden" name="id" value="<?php echo $t["id"]; ?>">
			<td><?php echo $t["id"]; ?></td>
			<td><input class="form-control" name="ten" type="text" value="<?php echo $t["tenthuonghieu"]; ?>"></td>
			<td><input class="btn btn-success" type="submit" value="Lưu"></td>
		</form>
			<td><a href="index.php?action=xoa&id=<?php echo $t["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>

	<?php 
		} // end if 
		else {
	?>
		<tr>
			<td><?php echo $t["id"]; ?></td>
			<td><?php echo $t["tenthuonghieu"]; ?></td>
            <td><?php echo $t["hinhanh"]; ?></td>
            <td><?php echo $t["diachi"]; ?></td>
            <td><?php echo $t["email"]; ?></td>
            <td><?php echo $t["sdt"]; ?></td>
			<td><a href="index.php?action=sua&id=<?php echo $t["id"]; ?>" class="btn btn-warning">Sửa</a></td>
			<td><a href="index.php?action=xoa&id=<?php echo $t["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>
	<?php 
		} // end else
	endforeach; 
	?>
</table>

<h4><a class="text-decoration-none text-info" data-bs-toggle="collapse" data-bs-target="#demo">Thêm mới</a><h4>

<div id="demo" class="collapse">
	 
	<form method="post"> 
		<input type="hidden" name="action" value="them">
	<div class="row">	
		<div class="col">
			<input type="text" class="form-control" name="ten" placeholder="Nhập tên danh mục">
		</div>
		<div class="col">
			<input type="submit" class="btn btn-info" value="Lưu">
		</div>
		<div class="col"></div>
	</div>
	</form>
</div>


<?php include("../inc/bottom.php"); ?>
