<?php include("../inc/top.php"); ?>

<h3>Cập nhật giày</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
    <input type="hidden" name="action" value="xulysua">
    <input type="hidden" name="txtid" value="<?php echo $g["id"]; ?>">
	<div class="mb-3 mt-3">
		<label for="txttenmathang" class="form-label">Tên giày</label>
		<input class="form-control" type="text" name="txttengiay" value="<?php echo $g["tengiay"] ?>" required>
	</div>
	<div class="my-3">
        <label>Hình ảnh</label><br>
        <input type="hidden" name="txthinhcu" value="<?php echo $g["hinhanh"]; ?>">
        <img src="../../<?php echo $g["hinhanh"]; ?>" width="50" class="img-thumbnail">	
        <a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
        <div id="demo" class="collapse m-3">
            <input type="file" class="form-control" name="filehinhanh">
        </div>
    </div>
	<div class="mb-3 mt-3">
        <label for="optdanhmuc" class="form-label">Danh mục</label>
        <select class="form-select" name="optdanhmuc">
            <?php
            foreach($danhmuc as $d):
            ?>
                <option value="<?php echo $d["id"]; ?>" <?php if($d["id"] == $g["id_danhmuc"]) echo "selected"; ?>><?php echo $d["tendanhmuc"]; ?></option>
            <?php
            endforeach;
            ?>
	    </select>
    </div>
	<div class="mb-3 mt-3">
        <label for="optdanhmuc" class="form-label">Thương hiệu</label>
        <select class="form-select" name="optthuonghieu">
            <?php
            foreach($thuonghieu as $th):
            ?>
                <option value="<?php echo $th["id"]; ?>" <?php if($th["id"] == $g["id_thuonghieu"]) echo "selected"; ?>><?php echo $th["tenthuonghieu"]; ?></option>
            <?php
            endforeach;
            ?>
	    </select>
    </div>
	<div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Mô tả</label>
		<input class="form-control" type="text" name="txtmota" value="<?php echo $g["mota"] ?>" required>
	</div>
    <div class="mb-3 mt-3">
        <label for="txtgianhap" class="form-label">Giá nhập</label>
        <input class="form-control" type="number" name="txtgianhap" value="<?php echo $g["gianhap"] ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="txtgiaban" class="form-label">Giá gốc</label>
        <input class="form-control" type="number" name="txtgiagoc" value="<?php echo $g["giagoc"] ?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="txtgianhap" class="form-label">Giá bán</label>
        <input class="form-control" type="number" name="txtgiaban" value="<?php echo $g["giaban"] ?>">
    </div>
	<div class="mb-3 mt-3">
		<input type="submit" value="Lưu" class="btn btn-success">
		<input type="reset" value="Hủy" class="btn btn-warning">
	</div>
</form>

<?php include("../inc/bottom.php"); ?>