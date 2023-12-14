<?php
require("../../model/database.php");
require("../../model/thuonghieu.php");
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$th = new THUONGHIEU();

switch($action){
    case "xem":
        $thuonghieu = $th->layDanhSachThuongHieu();
        include("main.php");
        break;
    default:
        break;
}
?>