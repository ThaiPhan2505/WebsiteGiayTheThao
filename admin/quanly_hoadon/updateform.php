<?php include("../inc/top.php"); ?>

<h3>Sửa hóa đơn</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
	<input type="hidden" name="action" value="xulysua">
    <input type="hidden" name="txtid" value="<?php echo $hd["id"]; ?>">
	<div class="mb-3 mt-3">
        <label for="optdanhmuc" class="form-label">Người dùng</label>
        <select class="form-select" name="optnguoidung">
            <?php
            foreach($nguoidung as $nd):
            ?>
                <option value="<?php echo $nd["id"]; ?>"><?php echo $nd["tennguoidung"]; ?></option>
            <?php
            endforeach;
            ?>
	    </select>
    </div>
	<div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Địa chỉ</label>
		<input class="form-control" type="text" name="txtdiachi" placeholder="Nhập đỉa chỉ" value="<?php echo $hd["diachi"] ?>" required>
	</div>
    <div class="mb-3 mt-3">
        <label for="txtgianhap" class="form-label">Ngày lập</label>
        <input class="form-control" type="date" name="txtngaylap" value="<?php echo $hd["ngaylap"] ?>" required>

        <script>
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            
            today = yyyy + '-' + mm + '-' + dd;
            document.getElementsByName("txtngaylap")[0].value = today;
        </script>

    </div>
    <div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Ghi chú</label>
		<input class="form-control" type="text" name="txtghichu" placeholder="Nhập ghi chú" value="<?php echo $hd["ghichu"] ?>" required>
	</div>
	<div class="mb-3 mt-3">
		<input type="submit" value="Lưu" class="btn btn-success">
		<input type="reset" value="Hủy" class="btn btn-warning">
	</div>
</form>
<?php include("../inc/bottom.php"); ?>