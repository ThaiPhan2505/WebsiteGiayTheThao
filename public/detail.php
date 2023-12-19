<?php include("../public/inc/top.php") ?>
<div class="row">
    <div class="col-sm-9">      

        <h3 class="text-info"><?php echo $g["tenthuonghieu"]; ?></h3>

      <div><img width="500px" src="../<?php echo $g["hinhanh"]; ?>"></div>
      <div>
      <h4 class="text-primary">Giá bán: 
        <span class="text-danger"><?php echo number_format($g["giaban"]); ?> đ</span>
      </h4>
  		<form method="post" class="form-inline">
    		<input type="hidden" name="action" value="chovaogio">
    		<input type="hidden" name="id" value="<?php echo $g["id"]; ?>">
            <div class="row">
                <div class="col">
                    <input type="number" class="form-control" name="soluong" value="1">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Chọn mua">
                </div>
            </div>		
    	</form>  	  
  	  </div>
	  
      <div>
        <h4 class="text-primary">Mô tả sản phẩm: </h4>
        <p><?php echo $g["mota"]; ?></p>
      </div>
      <br>
    </div>
</div>
<?php include("../public/inc/bottom.php") ?>