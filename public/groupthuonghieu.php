<?php include("../public/inc/top.php") ?>
<h3 class="text-info">Thương hiệu <?php echo $t_hieu["tenthuonghieu"]; ?></h3>
<div style="background-color: #eee;">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5"><strong>Sản Phẩm</strong></h4>
        <div class="row">
            <?php 
            if($giay != null){
                foreach($giay as $g):
            ?>
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="../<?php $g['hinhanh'] ?>"
                        class="w-50" />
                        <a href="#!">
                        <div class="mask">
                            <div class="d-flex justify-content-start align-items-end h-100">
                            <?php if($g["giagoc"] <= $g["giaban"]){ ?>
                                <h5><span class="badge bg-primary ms-2">Mới</span></h5><?php }?>
                            <?php if($g["giagoc"] > $g["giaban"]){ 
                                $discount = (($g["giagoc"] - $g["giaban"]) / $g["giagoc"]) * 100
                                ?>
                                <h5><span class="badge bg-danger ms-2">-<?php echo number_format($discount, 0, '.', '.')?>%</span></h5><?php }?>

                        </div>
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                        <h5 class="card-title mb-3"><?php echo $g["tengiay"] ?></h5>
                        </a>
                        <a href="" class="text-decoration-none">
                        <p>Giày mang êm chân</p>
                        </a>
                        <?php if($g["giagoc"] > $g["giaban"]){ ?>
                        <s><?php echo $g["giagoc"] ?> đ</s><strong class="ms-2 text-danger"><?php echo $g["giaban"] ?> đ</s></strong><?php }?>
                        <?php if($g["giagoc"] <= $g["giaban"]){ ?>
                        <h6 class="mb-3"><?php echo number_format($g["giaban"], 0, '.', '.')?> đ</h6><?php }?>
                    </div>
                </div>
            </div>
            <?php 
            endforeach;} 
            else{
                echo "<p>Thương hiệu này hiện chưa có mặt hàng. Vui lòng xem danh mục khác...</p>";
            }
            ?>
        </div>
    </div>
</div>  
<?php include("../public/inc/bottom.php") ?>