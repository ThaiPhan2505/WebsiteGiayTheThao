<?php 
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE){  // chưa đăng nhập
    $action="dangnhap";
}
else{   // mặc định
    $action="macdinh";
}

$nguoidung = new NGUOIDUNG();
switch($action){
    case "macdinh":               
        header("Location:../../public");
        break;
    case "dangnhap":
        header("Location:../../public");
        break;
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        if($nguoidung->kiemTraNguoiDungHopLe($email,$matkhau)==TRUE){
            $_SESSION["nguoidung"] = $nguoidung->layThongTinNguoiDung($email); // đặt biến session
            if(isset($_SESSION["nguoidung"]["loai"]) == 1 || isset($_SESSION["nguoidung"]["loai"]) == 2)
            {
                header("Location:../../admin/index.php");
            }
            if(isset($_SESSION["nguoidung"]["loai"]) == 3)
            {
                include("main.php");
            }
        }
        else{
            unset($_SESSION["nguoidung"]);
            header("Location:../../public");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);  // hủy biến session
        //include("login.php");         // hiển thị trang login
        header("location:../../index.php");     // hoặc chuyển hướng ra bên ngoài (trang dành cho khách)
        break;  
    default:
        break;
}
?>