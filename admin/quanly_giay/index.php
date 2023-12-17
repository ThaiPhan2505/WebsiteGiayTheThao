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
        $giay->setIdDanhmuc($_POST["optdanhmuc"]);
        $giay->setGianhap($_POST["txtgianhap"]);
        $giay->setGiagoc($_POST["txtgiagoc"]);
        $giay->setGiaban($_POST["txtgiaban"]);
        $giay->setHinhanh($hinhanh);
        $giay->themGiay($giay);
        $giay = $giay->layDanhSachGiay();
        include("main.php");
        break;
    case "xulythemsizesoluong":
        $giays = array();
        $counter = 0;
        while((isset($_POST['idGiay' . $counter]) && $_POST['txtsize' . $counter]) && 
        isset($_POST['txtsoluong' . $counter])) {
            $giay = new GIAY();
            $giays[] = $giay;
            $giay->setIdGiay($_POST["idGiay" .$counter]);
            $giay->setSize($_POST["txtsize" . $counter]);
            $giay->setSoluong($_POST["txtsoluong" . $counter]);
            $counter++;
        }
        $giay->themSoLuongSizeGiay($giays);
        $g = $giay->layDanhSachGiayDmThId($_POST["idGiay"]);
        $sizeSl = $giay->layDanhSoLuongSizeGiay($_POST["idGiay"]);
        include("chitiet.php");
        break;        
    case "sua":
        if(isset($_GET["id"])){ 
            $g = $giay->layGiayId($_GET["id"]);
            $danhmuc = $danhmuc->layDanhSachDanhMuc();
            $thuonghieu = $thuonghieu->layDanhSachThuongHieu();
            include("updateform.php");
        }
        else{
            $giay->layDanhSachGiay();
            include("main.php");            
        }
        break;
    case "xulysua":
        $giay->setId($_POST["txtid"]);
        $giay->setTengiay($_POST["txttengiay"]);
        $giay->setIdThuonghieu($_POST["optthuonghieu"]);
        $giay->setMota($_POST["txtmota"]);
        $giay->setIdDanhmuc($_POST["optdanhmuc"]);
        $giay->setGianhap($_POST["txtgianhap"]);
        $giay->setGiagoc($_POST["txtgiagoc"]);
        $giay->setGiaban($_POST["txtgiaban"]);
        $giay->setHinhanh($_POST["txthinhcu"]);
        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/Brand/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $giay->setHinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $giay->suaGiay($giay);         
    
        // hiển thị ds mặt hàng
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
    case "chitiet":
        if(isset($_GET["id"])){
            $g = $giay->layDanhSachGiayDmThId($_GET["id"]);
            $sizeSl = $giay->layDanhSoLuongSizeGiay($_GET["id"]);
            include("chitiet.php");
        }
        else{
            $giay->layDanhSachGiay();     
            include("main.php");      
        }
        break;
    default:
        break;
}
?>