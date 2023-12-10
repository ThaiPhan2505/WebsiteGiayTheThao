<?php
class NGUOIDUNG{
    private $id;
    private $tennguoidung;
    private $email;
    private $matkhau;
    private $sdt;
    private $loai;
    private $trangthai;
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

    public function getTennguoidung()
    {
        return $this->tennguoidung;
    }

    public function setTennguoidung($tennguoidung): self
    {
        $this->tennguoidung = $tennguoidung;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMatkhau()
    {
        return $this->matkhau;
    }

    public function setMatkhau($matkhau): self
    {
        $this->matkhau = $matkhau;

        return $this;
    }

    public function getSdt()
    {
        return $this->sdt;
    }

    public function setSdt($sdt): self
    {
        $this->sdt = $sdt;

        return $this;
    }

    public function getLoai()
    {
        return $this->loai;
    }

    public function setLoai($loai): self
    {
        $this->loai = $loai;

        return $this;
    }

    public function getTrangthai()
    {
        return $this->trangthai;
    }

    public function setTrangthai($trangthai): self
    {
        $this->trangthai = $trangthai;

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
    //Lấy danh sách người dùng
    public function layDanhSachNguoiDung(){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM nguoidung ORDER BY id DESC";
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
    // Lấy người dùng theo id
    public function layNguoiDungId($id){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM nguoidung WHERE id=:id";
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
    // Thêm
    public function themNguoiDung($nguoidung){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO nguoidung(tennguoidung, email, matkhau, sdt, loai, trangthai, hinhanh)
                VALUES(:tennguoidung, :email, :matkhau, :sdt, :loai, :trangthai, :hinhanh)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tennguoidung", $nguoidung->tennguoidung);
            $cmd->bindValue(":email", $nguoidung->email);
            $cmd->bindValue(":matkhau", $nguoidung->matkhau);
            $cmd->bindValue(":sdt", $nguoidung->sdt);
            $cmd->bindValue(":loai", $nguoidung->loai);
            $cmd->bindValue(":trangthai", $nguoidung->trangthai);
            $cmd->bindValue(":hinhanh", $nguoidung->hinhanh);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Xóa
    public function xoaNguoiDung($nguoidung){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "DELETE * FROM nguoidung WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $nguoidung->id);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Sửa
    public function suaNguoiDung($nguoidung){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "UPDATE * FROM nguoidung SET tennguoidung = :tennguoidung, 
                                                email = :email,
                                                matkhau = :matkhau,
                                                sdt = :sdt,
                                                loai = :loai,
                                                trangthai = :trangthai,
                                                hinhanh = :hinhanh
                                                WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tennguoidung", $nguoidung->tennguoidung);
            $cmd->bindValue(":email", $nguoidung->email);
            $cmd->bindValue(":matkhau", $nguoidung->matkhau);
            $cmd->bindValue(":sdt", $nguoidung->sdt);
            $cmd->bindValue(":loai", $nguoidung->loai);
            $cmd->bindValue(":trangthai", $nguoidung->trangthai);
            $cmd->bindValue(":hinhanh", $nguoidung->hinhanh);
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