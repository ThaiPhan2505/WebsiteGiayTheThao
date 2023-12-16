<?php
require("../../model/hoadon.php");
require("../../model/nguoidung.php");
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$hoadon = new HOADON();
switch($action){
    case "xem":
        $hoadon = $hoadon->layDanhSachHoaDon();
        include("main.php");
        break;
    default:
        break;
}
?>