<?php include("../inc/top.php"); ?>
<h3>Cập nhật thương hiệu</h3>
<form method="post" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="action" value="xulysua">
    <input type="hidden" name="txtid" value="<?php echo $t["id"]; ?>">
    <div class="mb-3 mt-3">
		<label for="txttenmathang" class="form-label">Tên thương hiệu</label>
		<input class="form-control" type="text" name="txttenthuonghieu" value="<?php echo $t["tenthuonghieu"]; ?>" required>
	</div>
	<div class="my-3">
        <label>Logo</label><br>
        <input type="hidden" name="txthinhcu" value="<?php echo $t["hinhanh"]; ?>">
        <img src="../../<?php echo $t["hinhanh"]; ?>" width="50" class="img-thumbnail">	
        <a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
        <div id="demo" class="collapse m-3">
            <input type="file" class="form-control" name="filehinhanh">
        </div>
    </div>
	<div class="mb-3 mt-3">
		<label for="txttenmathang" class="form-label">Quốc gia</label>
		<input class="form-control" type="text" name="txtquocgia" value="<?php echo $t["diachi"]; ?>" required>
	</div>
	<div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Email</label>
		<input class="form-control" type="email" name="txtemail" value="<?php echo $t["email"]; ?>" required>
	</div>
	<div class="mb-3 mt-3">
		<label for="txtgiaban" class="form-label">Số điện thoại</label>
		<input class="form-control" type="tel" name="txtsdt" value="<?php echo $t["sdt"]; ?>" required>
	</div>

    <div class="my-3">
    <input class="btn btn-primary"  type="submit" value="Lưu">
    <input class="btn btn-warning"  type="reset" value="Hủy">
    </div>
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#txtmota' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php include("../inc/bottom.php"); ?>