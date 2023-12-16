<?php
class HOADON{
    private $id;
    private $id_nguoidung;
    private $diachi;
    private $ngaylap;
    private $tongtien;
    private $ghichu;

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
            $query = "INSERT INTO hoadon(id_nguoidung, id_diachi, ngaylap, tongtien, ghichu)
                VALUES(:id_nguoidung, :id_diachi, :ngaylap, :tongtien, :ghichu)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_nguoidung", $hoadon->id_nguoidung);
            $cmd->bindValue(":id_diachi", $hoadon->id_diachi);
            $cmd->bindValue(":ngaylap", $hoadon->ngaylap);
            $cmd->bindValue(":tongtien", $hoadon->tongtien);
            $cmd->bindValue(":ghichu", $hoadon->ghichu);
            $kq = $cmd->execute();
            return $kq;
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
                                                id_diachi = :id_diachi,
                                                ngaylap = :ngaylap,
                                                tongtien = :tongtien,
                                                ghichu = :ghichu
                                                WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_nguoidung", $hoadon->id_nguoidung);
            $cmd->bindValue(":id_diachi", $hoadon->id_diachi);
            $cmd->bindValue(":ngaylap", $hoadon->ngaylap);
            $cmd->bindValue(":tongtien", $hoadon->tongtien);
            $cmd->bindValue(":ghichu", $hoadon->ghichu);
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
} 
?>