<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng Giày Thể Thao PVT</title>
    <link rel="stylesheet" href="../assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div id="header" class="row fixed-top start-0 end-0">
                <div class="header__logo col pl-3">
                    <a href="index.php"><img class="header__logo--img img-fluid" src="../images/Logo/logo11.png" alt="Logo"></a>
                </div>
                <div class="header__total col-8">
                    <ul class="header__total--list">
                        <li>
                            <a href="#" class="text-decoration-none header__total--item">danh mục sản phẩm</a>
                            <div class="header__total--subitem">
                                <?php 
                                    foreach ($danhmuc as $dm):
                                ?>
                                <a class="text-decoration-none" href="?action=groupdanhmuc&id=<?php echo $dm["id"]; ?>">
                                    <h3 class="header__total--des">Giày <?php echo $dm["tendanhmuc"] ?></h3>
                                </a>
                                <?php endforeach ?>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none header__total--item">Thương Hiệu</a>
                            <div class="header__total--subitem">
                                <div class="header__total--main">
                                    <?php 
                                        foreach($thuonghieu as $th):
                                    ?>
                                    <div class="header__subitem--logo">
                                        <a href="?action=groupthuonghieu&id=<?php echo $th["id"] ?>"><img src="../<?php echo $th["hinhanh"] ?>" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <?php endforeach ?>
                                    <!--
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/Adidas-removebg-preview.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/Conv-removebg-preview.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/Gucci-removebg-preview.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/MLB-removebg-preview.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/NBL.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/Nike.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/Puma.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    <div class="header__subitem--logo">
                                        <a href=""><img src="../images/Brand/Adidas-removebg-preview.png" alt="" class="header__subitem--img"></a>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </li>
                        <li><a href="#" class="text-decoration-none header__total--item">Chính Sách Bảo Hành</a></li>
                        <li><a href="#" class="text-decoration-none header__total--item">Thông Tin Cửa Hàng</a></li>
                        <li><a href="#" class="text-decoration-none header__total--item"><?php echo $_SESSION["nguoidung"]["tengnuoidung"]; ?></a></li>
                    </ul>
                </div>
                <div class="header__search col">
                    <div class="header__search--total">
                        <a href="#" class="text-decoration-none header__total--item"><i class="ti-search header__search--icon"></i></a>
                        <input class="header__search--input" type="text" placeholder="  Bạn Muốn Tìm Kiếm Gì ?">
                    </div>
                </div>
                <div class="header__cart col">
                    <div class="header__cart--total">
                        <a href="#" class="text-decoration-none"><i class="ti-shopping-cart header__cart--icon"></i></a>
                    </div>
                </div>
                <div class="header__login col">
                    <?php if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==3){ 
                            echo $_SESSION["nguoidung"]["tengnuoidung"];
                        
                    ?>
                    <?php
                        }
                        else{
                    ?>
                    <div class="header__login--total">
                        <div class="" data-bs-toggle="modal" data-bs-target="#modalDangnhap">
                            <a href="#" class="text-decoration-none"><i class="ti-user header__login--icon"></i></a>
                        </div>
                    </div>   
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>