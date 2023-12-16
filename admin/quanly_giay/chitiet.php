<?php include("../inc/top.php"); ?>

<a href="index.php">Trở về danh sách</a>
<h3><?php echo $g["tengiay"]; ?></h3> 
<img src="../../<?php echo $g["hinhanh"]; ?>" width="400" class="img-thumbnail"></a>
<p><strong>Thương hiệu: </strong><br><?php echo $g["tenthuonghieu"]; ?></p>
<p><strong>Danh mục: </strong><br><?php echo $g["tendanhmuc"]; ?></p>
<p><strong>Mô tả: </strong><br><?php echo $g["mota"]; ?></p>
<p><strong>Giá nhập: </strong><?php echo number_format($g["gianhap"]); ?>đ</p>
<p><strong>Giá gốc: </strong><?php echo number_format($g["giagoc"]); ?>đ</p>
<p><strong>Giá bán: </strong><?php echo number_format($g["giaban"]); ?>đ</p>
<p><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $g["id"]; ?>"><i class="align-middle" data-feather="edit"></i> Sửa</a> 
<a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $g["id"]; ?>"><i class="align-middle" data-feather="trash-2"></i> Xóa</a></p>	

<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>
