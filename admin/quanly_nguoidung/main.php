<?php include("../inc/top.php"); ?>
<h4 class="text-info">Danh sách người dùng</h4> 
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm người dùng
</a>
<br> <br> 

<table class="table table-hover">
	<tr><th>ID</th><th>Ảnh đại diện</th><th>Tên người dùng</th><th>Email</th><th>Số điện thoại</th>
    <th>Loại quyền</th><th>Trạng thái</th><th>Khóa/Kích hoạt</th></tr>
	<?php 
	foreach ($nguoidung as $nd) :  // hiển thị form
	?>
    <tr>
        <td><?php echo $nd["id"]; ?></td>
        <td><img src="../../<?php echo $nd["hinhanh"]; ?>" width="80" class="img-thumbnail"></td>
        <td><?php echo $nd["tennguoidung"]; ?></td>
        <td><?php echo $nd["email"]; ?></td>
        <td><?php echo $nd["sdt"]; ?></td>
        <td>
            <?php 
            if($nd["loai"] == 1)
                echo "Quản trị";
            else if($nd["loai"] == 2)
                echo "Nhân viên";
            else
                echo "Khách hàng";
            ?>
        </td>
        <td>
            <?php 
            if($nd["loai"] != 1){
                if($nd["trangthai"] == 1)
                    echo "Kích Hoạt";
                else
                    echo "Khóa";
            }
            ?>
        </td>
        <td>
            <?php 
            if($nd["loai"]!=1) {
                if($nd["trangthai"]==1){ ?>
                    <a href="?action=khoa&trangthai=0&mand=<?php echo $nd["id"]; ?>">Khóa</a></td></tr>
            <?php 
                }
                else { ?>
                    <a href="?action=khoa&trangthai=1&mand=<?php echo $nd["id"]; ?>">Kích hoạt</a></td></tr>
            <?php 
                }
            }
        endforeach; ?>
</table>
<?php include("../inc/bottom.php"); ?>