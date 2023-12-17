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
    <th>Ngày Lập</th><th>Tổng tiền</th><th>Ghi chú</th><th>Thêm chi tiết</th><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($hoadon as $hd) : 
	?>
	<tr>
		<td><?php echo $hd["id"]; ?></td>
		<td><?php echo $hd["tennguoidung"]; ?></td>
		<td><?php echo $hd["diachi"]; ?></td>
		<td><?php echo date("d-m-Y", strtotime($hd["ngaylap"])); ?></td>
		<td><?php echo $hd["tongtien"]; ?></td>
		<td><?php echo $hd["ghichu"]; ?></td>
		<td><a href="index.php?action=themchitiet&id=<?php echo $hd["id"]; ?>" class="btn btn-success">Thêm chi tiết</a></td>
		<td><a href="index.php?action=sua&id=<?php echo $hd["id"]; ?>" class="btn btn-warning">Sửa</a></td>
		<td><a href="index.php?action=xoa&id=<?php echo $hd["id"]; ?>" class="btn btn-danger">Xóa</a></td>
	</tr>
	<?php 
	endforeach; 
	?>
</table>
<?php include("../inc/bottom.php"); ?>