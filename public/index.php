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
        include("main.php");
        break;
    default:
        break;
}
    
?>