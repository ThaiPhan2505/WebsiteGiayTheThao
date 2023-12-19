<?php 
require("../model/database.php");
require("../model/giay.php");
require("../model/thuonghieu.php");
require("../model/danhmuc.php");
require("../model/giohang.php");
$giay = new GIAY;
$thuonghieu = new THUONGHIEU();
$danhmuc = new DANHMUC();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}

switch($action){
    case "null":
        $thuonghieu = $thuonghieu->layDanhSachThuongHieu();
        $danhmuc = $danhmuc->layDanhSachDanhMuc();
        $giay = $giay->layDanhSachGiay();
        include("main.php");
        break;
    case "groupdanhmuc":
        if(isset($_REQUEST["id"])){
            $madm = $_REQUEST["id"];
            $thuonghieu = $thuonghieu->layDanhSachThuongHieu();
            $dmuc = $danhmuc->layDanhSachDanhMucTheoId($madm);
            $danhmuc = $danhmuc->layDanhSachDanhMuc();
            $giay = $giay->layGiayDanhMuc($madm);
            include("groupdanhmuc.php");
        }
        else{
            include("main.php");
        }
        break;
    case "detail":
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $g = $giay->layDanhSachGiayDmThId($_GET["id"]);
            $thuonghieu = $thuonghieu->layDanhSachThuongHieu();
            $danhmuc = $danhmuc->layDanhSachDanhMuc();
            include("detail.php");
        }
        break;
    case "groupthuonghieu":
        if(isset($_REQUEST["id"])){
            $math = $_REQUEST["id"];
            $danhmuc = $danhmuc->layDanhSachDanhMuc();
            $t_hieu = $thuonghieu->layThuongHieuId($math);
            $thuonghieu = $thuonghieu->layDanhSachThuongHieu();
            $giay = $giay->layGiayTheoThuongHieu($math);
            include("groupthuonghieu.php");
        }
        else{
            include("main.php");
        }
        break;
    case "giohang":
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "chovaogio":
        if(isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if(isset($_REQUEST["soluong"]))
            $soluong = $_REQUEST["soluong"];
        else
            $soluong = 1;

        if(isset($_SESSION["giohang"][$id])){
            $soluong += $_SESSION["giohang"][$id];
            $_SESSION["giohang"][$id] = $soluong;
        }
        else
            themhangvaogio($id, $soluong);
        
        $giohang = laygiohang();
        include("cart.php");
        break;
        case "capnhatgio":
            if(isset($_REQUEST["mh"])){
                $mh = $_REQUEST["mh"];
                foreach ($mh as $id => $soluong){
                    if($soluong > 0)
                        capnhatsoluong($id, $soluong);
                    else
                        xoamotmathang($id);
                }
            }
            $giohang = laygiohang();
            include("cart.php");
            break;
        case "xoagiohang":
            xoagiohang();
            $giohang = laygiohang();
            include("cart.php");
            break;
    default:
        break;
}
    
?>