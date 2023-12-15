<?php
require("../../model/database.php");
require("../../model/giay.php");
require("../../model/danhmuc.php");
require("../../model/thuonghieu.php");
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$giay = new GIAY();
$danhmuc = new DANHMUC();
$thuonghieu = new THUONGHIEU();
$idsua = 0;
switch($action){
    case "xem":
        $giay = $giay->layDanhSachGiay();
        include("main.php");
        break;
    case "them":
        $danhmuc = $danhmuc->layDanhSachDanhMuc();
        $thuonghieu = $thuonghieu->layDanhSachThuongHieu();
        include("addform.php");
        break;
    case "xulythem":	
        // xử lý file upload
        $hinhanh = "images/Product/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm		
        $giay->setTengiay($_POST["txttengiay"]);
        $giay->setIdThuonghieu($_POST["optthuonghieu"]);
        $giay->setMota($_POST["txtmota"]);
        $giay->setgiaban($_POST["txtgiaban"]);
        $giay->setIdDanhmuc($_POST["optdanhmuc"]);
        $giay->setGianhap($_POST["txtgianhap"]);
        $giay->setGiagoc($_POST["txtgiagoc"]);
        $giay->setGiaban($_POST["txtgiaban"]);
        $giay->setHinhanh($hinhanh);
        $giay->themGiay($giay);
        $giay = $giay->layDanhSachGiay();
        include("main.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $giay->setId($_GET["id"]);
        // xóa
        $giay->xoaGiay($giay);
        // load danh sách
        $giay = $giay->layDanhSachGiay(); 
        include("main.php");
        break;
    default:
        break;
}
?>