<?php
require("../../model/database.php");
require("../../model/nguoidung.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem"; 
}
$nd = new NGUOIDUNG();
switch($action){
    case "xem":
        $nguoidung = $nd->layDanhSachNguoiDung();
        include("main.php");
        break;
    case "khoa":   
        $mand = $_GET["mand"];
        $trangthai = $_GET["trangthai"];
        if(!$nd->doiTrangThai($mand, $trangthai)){
            $tb = "Đã đổi trạng thái!";
        }
        $nguoidung = $nd->layDanhSachNguoiDung();    
        include("main.php");
        break;
    case "them":        
        include("addform.php");        
        break;
    default:
        break;
}
?>