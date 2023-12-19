<?php include("../public/inc/top.php") ?>

        <div id="body">
            <div class="banner mb-5">
                <div id="body__banner" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#body__banner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#body__banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#body__banner" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="../images/Banner/banner_1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="../images/Banner/banner_2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="../images/Banner/banner_3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#body__banner" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#body__banner" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div style="background-color: #eee;">
                <div class="text-center container py-5">
                    <h4 class="mt-4 mb-5"><strong>Sản Phẩm</strong></h4>
                    <div class="row">
                        <?php 
                        foreach($danhmuc as $dm){
                        $i = 0;
                        ?>
                        <a href="index.php?action=groupdanhmuc&id=<?php echo $dm['id']?>" class="text-decoration-none">
                            <h5 class="text-primary float-left">
                                <strong>Giày <?php echo $dm["tendanhmuc"] ?></strong>
                            </h5>
                        </a>
                        <?php foreach($giay as $g){
                            if($g["id_danhmuc"] == $dm["id"] && $i < 3){
                                $i++;
                        ?>
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                    data-mdb-ripple-color="light">
                                    <a href="index.php?action=detail&id=<?php echo $g["id"]; ?>">
                                        <img src="../<?php echo $g['hinhanh'] ?>"
                                        class="w-50" />
                                    </a>
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
                                    <a href="index.php?action=detail&id=<?php echo $g["id"]; ?>" class="text-reset">
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
                                }
                            }    
                        }
                        ?>
                    </div>
                </div>
            </div>  
        </div>
        
<?php include("../public/inc/bottom.php") ?>