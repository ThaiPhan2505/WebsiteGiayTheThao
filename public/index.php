<?php 
require("../model/database.php");
require("../model/giay.php");
require("../model/thuonghieu.php");
require("../model/danhmuc.php");

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
    default:
        break;
}
    
?>