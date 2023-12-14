<?php
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}

switch($action){
    case "xem":
        include("main.php");
        break;
    default:
        break;
}
?>