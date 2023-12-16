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
    case "them":
        $thuonghieu = $th->layDanhSachThuongHieu();
        include("addform.php");
        break;
    case "xulythem":	
        // xử lý file upload
        $hinhanh = "images/Brand/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm		
        $tHieu = new THUONGHIEU();
        $tHieu->setTenthuonghieu($_POST["txttenthuonghieu"]);
        $tHieu->setDiachi($_POST["txtquocgia"]);
        $tHieu->setEmail($_POST["txtemail"]);
        $tHieu->setSdt($_POST["txtsdt"]);
        $tHieu->setHinhanh($hinhanh);
        $th->themThuongHieu($tHieu);
        $thuonghieu = $th->layDanhSachThuongHieu();
        include("main.php");
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $t = $th->layThuongHieuId($_GET["id"]);
            include("updateform.php");
        }
        else{
            $thuonghieu = $th->layDanhSachThuongHieu();  
            include("main.php");            
        }
        break;
    case "xulysua":
        $tHieu = new THUONGHIEU();
        $tHieu->setId($_POST["txtid"]);
        $tHieu->setTenthuonghieu($_POST["txttenthuonghieu"]);
        $tHieu->setDiachi($_POST["txtquocgia"]);
        $tHieu->setEmail($_POST["txtemail"]);
        $tHieu->setSdt($_POST["txtsdt"]);
        $tHieu->setHinhanh($_POST["txthinhcu"]);
        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/Brand/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $tHieu->setHinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $th->suaThuongHieu($tHieu);         
    
        // hiển thị ds mặt hàng
        $thuonghieu = $th->layDanhSachThuongHieu();     
        include("main.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $thxoa = new THUONGHIEU();
        $thxoa->setid($_GET["id"]);
        // xóa
        $th->xoaThuongHieu($thxoa);
        // load danh sách
        $thuonghieu = $th->layDanhSachThuongHieu(); 
        include("main.php");
        break;
    default:
        break;
}
?>