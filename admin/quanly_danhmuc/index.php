<?php
require("../../model/database.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$dm = new DANHMUC();
$idsua = 0;

switch($action){
    case "xem":
        $danhmuc = $dm->layDanhSachDanhMuc();
        include("main.php");
        break;
    case "them":
        // gán dữ liệu từ form
    	$dmmoi = new DANHMUC();
    	$dmmoi->setTendanhmuc($_POST["ten"]);
    	// thêm
    	$dm->themdanhmuc($dmmoi);
    	// load danh sách
        $danhmuc = $dm->layDanhSachDanhMuc();      
        include("main.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $dmxoa = new DANHMUC();
        $dmxoa->setid($_GET["id"]);
        // xóa
        $dm->xoaDanhMuc($dmxoa);
        // load danh sách
        $danhmuc = $dm->layDanhSachDanhMuc();
        include("main.php");
        break;
    default:
        break;
}
?>