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
    case "xulythem":
        // xử lý file upload
        $hinhanh = "images/Users/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm	
        $account = new NGUOIDUNG();
        $account->setTennguoidung($_POST["txttennguoidung"]);
        $account->setEmail($_POST["txtemail"]);
        $account->setMatkhau($_POST["txtmatkhau"]);
        $account->setSdt($_POST["txtsdt"]);
        $account->setLoai($_POST["optloai"]);
        $account->setHinhanh($hinhanh);
        $nd->themNguoiDung($account);

        $nguoidung = $nd->layDanhSachNguoiDung(); 
        include("main.php");        
        break;
    default:
        break;
}
?>