<?php include("../inc/top.php"); ?>
<h4 class="text-info">Danh sách hóa đơn</h4> 
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm Hóa đơn
</a>
<br> <br> 
<table class="table table-hover">
	<tr><th>ID</th><th>Người dùng</th><th>Địa chỉ</th>
    <th>Ngày Lập</th><th>Tổng tiền</th><th>Ghi chú</th><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($hoadon as $hd) : 
		if($hd["id"] == $idsua){ // hiển thị form
	?>
		<tr>
		<form method="post">
			<input type="hidden" name="action" value="capnhat">
			<input type="hidden" name="id" value="<?php echo $hd["id"]; ?>">
			<td><?php echo $hd["id"]; ?></td>
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
			<td><img src="../../<?php echo $t["hinhanh"]; ?>" width="80" class="img-thumbnail"></td>
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
<?php include("../inc/bottom.php"); ?>