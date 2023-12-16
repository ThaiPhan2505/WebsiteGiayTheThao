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
    default:
        break;
}
?>