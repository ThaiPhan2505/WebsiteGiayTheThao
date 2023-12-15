<?php
class GIAY{
    private $id;
    private $tengiay;
    private $id_thuonghieu;
    private $mota;
    private $id_danhmuc;
    private $gianhap;
    private $giaban;
    private $danhgia;
    private $hinhanh;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTengiay()
    {
        return $this->tengiay;
    }

    public function setTengiay($tengiay): self
    {
        $this->tengiay = $tengiay;
        return $this;
    }

    public function getIdThuonghieu()
    {
        return $this->id_thuonghieu;
    }

    public function setIdThuonghieu($id_thuonghieu): self
    {
        $this->id_thuonghieu = $id_thuonghieu;
        return $this;
    }

    public function getMota()
    {
        return $this->mota;
    }

    public function setMota($mota): self
    {
        $this->mota = $mota;
        return $this;
    }

    public function getIdDanhmuc()
    {
        return $this->id_danhmuc;
    }

    public function setIdDanhmuc($id_danhmuc): self
    {
        $this->id_danhmuc = $id_danhmuc;
        return $this;
    }

    public function getGianhap()
    {
        return $this->gianhap;
    }

    public function setGianhap($gianhap): self
    {
        $this->gianhap = $gianhap;
        return $this;
    }

    public function getGiaban()
    {
        return $this->giaban;
    }

    public function setGiaban($giaban): self
    {
        $this->giaban = $giaban;
        return $this;
    }

    public function getDanhgia()
    {
        return $this->danhgia;
    }

    public function setDanhgia($danhgia): self
    {
        $this->danhgia = $danhgia;
        return $this;
    }

    public function getHinhanh()
    {
        return $this->hinhanh;
    }

    public function setHinhanh($hinhanh): self
    {
        $this->hinhanh = $hinhanh;
        return $this;
    }

    //Lấy danh sách giày
    public function layDanhSachGiay(){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM giay ORDER BY id ASC";
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
    // Lấy giày theo id
    public function layGiayId($id){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM giay WHERE id=:id";
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
    // Lấy giày theo danh mục
    public function layGiayDanhMuc($id_danhmuc){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM giay WHERE id_danhmuc=:id_danhmuc";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id_danhmuc", $id_danhmuc);
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
    public function themGiay($giay){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO giay(tengiay, id_thuonghieu, mota, id_danhmuc, gianhap, giaban, danhgia, hinhanh)
                VALUES(:tengiay, :id_thuonghieu, :mota, :id_danhmuc, :gianhap ,:giaban ,:danhgia ,:hinhanh)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tengiay", $giay->tengiay);
            $cmd->bindValue(":id_thuonghieu", $giay->id_thuonghieu);
            $cmd->bindValue(":mota", $giay->mota);
            $cmd->bindValue(":id_danhmuc", $giay->id_danhmuc);
            $cmd->bindValue(":gianhap", $giay->gianhap);
            $cmd->bindValue(":giaban", $giay->giaban);
            $cmd->bindValue(":danhgia", $giay->danhgia);
            $cmd->bindValue(":hinhanh", $giay->hinhanh);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    //Xóa
    public function xoaGiay($giay){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "DELETE * FROM giay WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $giay->id);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Sửa
    public function suaGiay($giay){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "UPDATE * FROM giay SET tengiay = :tengiay, 
                                            id_thuonghieu = :id_thuonghieu,
                                            mota = :mota,
                                            id_danhmuc = :id_danhmuc
                                            gianhap = :gianhap
                                            giaban = :giaban
                                            danhgia = :danhgia
                                            hinhanh = :hinhanh
                                            WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tengiay", $giay->tengiay);
            $cmd->bindValue(":id_thuonghieu", $giay->id_thuonghieu);
            $cmd->bindValue(":mota", $giay->mota);
            $cmd->bindValue(":id_danhmuc", $giay->id_danhmuc);
            $cmd->bindValue(":gianhap", $giay->gianhap);
            $cmd->bindValue(":giaban", $giay->giaban);
            $cmd->bindValue(":danhgia", $giay->danhgia);
            $cmd->bindValue(":hinhanh", $giay->hinhanh);
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