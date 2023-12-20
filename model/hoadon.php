<?php
class HOADON{
    private $id;
    private $id_nguoidung;
    private $diachi;
    private $ngaylap;
    private $tongtien;
    private $ghichu;
    // properties of chitiethoadon
    private $id_hoadon;
    private $id_giay;
    private $dongia;
    private $soluong;
    private $thanhtien;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdNguoidung()
    {
        return $this->id_nguoidung;
    }

    public function setIdNguoidung($id_nguoidung): self
    {
        $this->id_nguoidung = $id_nguoidung;

        return $this;
    }

    public function getDiachi()
    {
        return $this->diachi;
    }

    public function setDiachi($diachi): self
    {
        $this->diachi = $diachi;

        return $this;
    }

    public function getNgaylap()
    {
        return $this->ngaylap;
    }

    public function setNgaylap($ngaylap): self
    {
        $this->ngaylap = $ngaylap;

        return $this;
    }

    public function getTongtien()
    {
        return $this->tongtien;
    }

    public function setTongtien($tongtien): self
    {
        $this->tongtien = $tongtien;

        return $this;
    }

    public function getGhichu()
    {
        return $this->ghichu;
    }

    public function setGhichu($ghichu): self
    {
        $this->ghichu = $ghichu;

        return $this;
    }

    // Lấy danh sách các hóa đơn
    public function layDanhSachHoaDon(){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM hoadon ORDER BY id DESC";
            $cmd = $dbconn->prepare($query);
            $cmd->execute();
            $kq = $cmd->fetchAll();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Lấy danh sách các hóa đơn có tên người dùng
    public function layDanhSachHoaDonNd(){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT hoadon.*, nguoidung.tennguoidung as tennguoidung
                    FROM hoadon
                    INNER JOIN nguoidung ON hoadon.id_nguoidung = nguoidung.id
                    ORDER BY hoadon.id";
            $cmd = $dbconn->prepare($query);
            $cmd->execute();
            $kq = $cmd->fetchAll();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Lấy hóa đơn theo id
    public function layHoaDonId($id){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM hoadon WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $kq = $cmd->fetch();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
        return true;
    }
    // Lấy hóa đơn của người dùng
    public function layHoaDonNguoiDung($id_nguoidung){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM hoadon WHERE id_nguoidung=:id_nguoidung";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_nguoidung", $id_nguoidung);
            $cmd->execute();
            $kq = $cmd->fetch();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
        return true;
    }
    // Thêm
    public function themHoaDon($hoadon){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO hoadon(id_nguoidung, diachi, ngaylap, ghichu)
                VALUES(:id_nguoidung, :diachi, :ngaylap, :ghichu)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_nguoidung", $hoadon->id_nguoidung);
            $cmd->bindValue(":diachi", $hoadon->diachi);
            $cmd->bindValue(":ngaylap", $hoadon->ngaylap);
            $cmd->bindValue(":ghichu", $hoadon->ghichu);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Thêm chi tiết hóa đơn
    public function themChiTietHoaDon1($hoadon){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO hoadonchit(id_hoadon, id_giay, dongia, soluong, thanhtien)
                VALUES(:id_hoadon, :id_giay, :dongia, :soluong, :thanhtien)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_hoadon", $hoadon->id_hoadon);
            $cmd->bindValue(":id_giay", $hoadon->id_giay);
            $cmd->bindValue(":dongia", $hoadon->dongia);
            $cmd->bindValue(":soluong", $hoadon->soluong);
            $cmd->bindValue(":thanhtien", $hoadon->thanhtien);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }    
    // Thêm chi tiết hóa đơn
    public function themChiTietHoaDon($hoadons){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO hoadonchitiet(id_hoadon, id_giay, dongia, soluong, thanhtien)
                VALUES(:id_hoadon, :id_giay, :dongia, :soluong, :thanhtien)";
            $cmd = $dbconn->prepare($query);

            foreach($hoadons as $hoadon) {
                $cmd->bindValue(":id_hoadon", $hoadon->id_hoadon);
                $cmd->bindValue(":id_giay", $hoadon->id_giay);
                $cmd->bindValue(":dongia", $hoadon->dongia);
                $cmd->bindValue(":soluong", $hoadon->soluong);
                $cmd->bindValue(":thanhtien", $hoadon->thanhtien);
                $kq = $cmd->execute();
            }
            return true;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }    
    // Sửa
    public function suaHoaDon($hoadon){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "UPDATE hoadon SET id_nguoidung = :id_nguoidung, 
                                                diachi = :diachi,
                                                ngaylap = :ngaylap,
                                                ghichu = :ghichu
                                                WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_nguoidung", $hoadon->id_nguoidung);
            $cmd->bindValue(":diachi", $hoadon->diachi);
            $cmd->bindValue(":ngaylap", $hoadon->ngaylap);
            $cmd->bindValue(":ghichu", $hoadon->ghichu);
            $cmd->bindValue(":id", $hoadon->id);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Xóa
    public function xoaHoaDon($hoadon){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "DELETE FROM hoadon WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $hoadon->id);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }

    /**
     * Get the value of id_hoadon
     */
    public function getIdHoadon()
    {
        return $this->id_hoadon;
    }

    /**
     * Set the value of id_hoadon
     */
    public function setIdHoadon($id_hoadon): self
    {
        $this->id_hoadon = $id_hoadon;

        return $this;
    }

    /**
     * Get the value of thanhtien
     */
    public function getThanhtien()
    {
        return $this->thanhtien;
    }

    /**
     * Set the value of thanhtien
     */
    public function setThanhtien($thanhtien): self
    {
        $this->thanhtien = $thanhtien;

        return $this;
    }

    /**
     * Get the value of id_giay
     */
    public function getIdGiay()
    {
        return $this->id_giay;
    }

    /**
     * Set the value of id_giay
     */
    public function setIdGiay($id_giay): self
    {
        $this->id_giay = $id_giay;

        return $this;
    }

    /**
     * Get the value of dongia
     */
    public function getDongia()
    {
        return $this->dongia;
    }

    /**
     * Set the value of dongia
     */
    public function setDongia($dongia): self
    {
        $this->dongia = $dongia;

        return $this;
    }

    /**
     * Get the value of soluong
     */
    public function getSoluong()
    {
        return $this->soluong;
    }

    /**
     * Set the value of soluong
     */
    public function setSoluong($soluong): self
    {
        $this->soluong = $soluong;

        return $this;
    }
} 
?>