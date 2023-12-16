<?php include("../inc/top.php"); ?>
<h4 class="text-info">Danh sách thương hiệu</h4> 
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm giày
</a>
<br> <br> 
<table class="table table-hover">
	<tr><th>ID</th><th>Tên giày</th><th>Hình ảnh</th><th>Giá nhập</th>
    <th>Giá gốc</th><th>Giá bán</th></td><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($giay as $g) : 
	?>
	<tr>
		<td><?php echo $g["id"]; ?></td>
		<td><a href="index.php?action=chitiet&id=<?php echo $g['id']?>"><?php echo $g["tengiay"]; ?></td></a>
		<td><a href="index.php?action=chitiet&id=<?php echo $g['id']?>"><img src="../../<?php echo $g["hinhanh"]; ?>" width="80" class="img-thumbnail"></a></td>
		<td><?php echo $g["gianhap"]; ?></td>
		<td><?php echo $g["giagoc"]; ?></td>
		<td><?php echo $g["giaban"]; ?></td>
		<td><a href="index.php?action=sua&id=<?php echo $g["id"]; ?>" class="btn btn-warning">Sửa</a></td>
		<td><a href="index.php?action=xoa&id=<?php echo $g["id"]; ?>" class="btn btn-danger">Xóa</a></td>
	</tr>
	<?php 
	endforeach; 
	?>
</table>
<?php include("../inc/bottom.php"); ?>