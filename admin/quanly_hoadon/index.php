<?php 
require("../../model/database.php");
require("../../model/hoadon.php");
require("../../model/nguoidung.php");
require("../../model/giay.php");
?>
<?php
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}
$nguoidung = new NGUOIDUNG();
$hoadon = new HOADON();
$giay = new GIAY();
switch($action){
    case "xem":
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;
    case "them":
        $nguoidung = $nguoidung->layDanhSachNguoiDung();
        include("addform.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $hoadon->setId($_GET["id"]);
        // xóa
        $hoadon->xoaHoaDon($hoadon);
        // load danh sách
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;
    case "xulythem":
        $hoadon->setIdNguoidung($_POST["optnguoidung"]);
        $hoadon->setDiachi($_POST["txtdiachi"]);
        $hoadon->setNgaylap($_POST["txtngaylap"]);
        $hoadon->setGhichu($_POST["txtghichu"]);

        $hoadon->themHoaDon($hoadon);
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;
    case "themchitiet":
        if(isset($_GET["id"])){ 
            $hd = $_GET["id"];
            $giay = $giay->layDanhSachGiay();

            include("adddetailform.php");
        }
        else{
            $hoadon = $hoadon->layDanhSachHoaDonNd();
            include("main.php");            
        }
        break;
    case "xulythemchitiethoadon":
        $counter = 1;
        while((isset($_POST['idhoadon'. $counter]) && isset($_POST['optgiay' . $counter]) && $_POST['giaban' . $counter]) && 
        isset($_POST['txtsoluong' . $counter]) && isset($_POST['txttxtthanhtien' . $counter])) {
            $hoadon->setIdHoadon($_POST["idhoadon" . $counter]);
            $hoadon->setIdGiay($_POST["optgiay" . $counter]);
            $hoadon->setDongia($_POST["giaban" . $counter]);
            $hoadon->setSoluong($_POST["txtsoluong" . $counter]);
            $hoadon->setThanhtien($_POST["txttxtthanhtien" . $counter]);
            $hoadon->themChiTietHoaDon1($hoadon);
            $counter++;
        }
        $hoadon = $hoadon->layDanhSachHoaDonNd();
        include("main.php");
        break;        
    default:
        break;
}
?>