<?php
require("../../model/database.php");
require("../../model/giay.php");
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$giay = new GIAY();
$idsua = 0;
switch($action){
    case "xem":
        $giay = $giay->layDanhSachGiay();
        include("main.php");
        break;
    default:
        break;
}
?>