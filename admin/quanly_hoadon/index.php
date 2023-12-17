<?php
require("../../model/database.php");
require("../../model/hoadon.php");
require("../../model/nguoidung.php");
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$nguoidung = new NGUOIDUNG();
$hoadon = new HOADON();
switch($action){
    case "xem":
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;
    case "them":
        $nguoidung = $nguoidung->layDanhSachNguoiDung();
        include("addform.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $hoadon->setId($_GET["id"]);
        // xóa
        $hoadon->xoaHoaDon($hoadon);
        // load danh sách
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;
    case "xulythem":
        $hoadon->setIdNguoidung($_POST["optnguoidung"]);
        $hoadon->setDiachi($_POST["txtdiachi"]);
        $hoadon->setNgaylap($_POST["txtngaylap"]);
        $hoadon->setGhichu($_POST["txtghichu"]);

        $hoadon->themHoaDon($hoadon);
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;
    default:
        break;
}
?>