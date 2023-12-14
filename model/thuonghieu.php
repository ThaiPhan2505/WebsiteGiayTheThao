<?php
class THUONGHIEU{
    private $id;
    private $tenthuonghieu;
    private $diachi;
    private $email;
    private $sdt;
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

    public function getTenthuonghieu()
    {
        return $this->tenthuonghieu;
    }

    public function setTenthuonghieu($tenthuonghieu): self
    {
        $this->tenthuonghieu = $tenthuonghieu;

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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

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

    public function getHinhanh()
    {
        return $this->hinhanh;
    }

    public function setHinhanh($hinhanh): self
    {
        $this->hinhanh = $hinhanh;

        return $this;
    }
    // Lấy danh sách các thương hiệu
    public function layDanhSachThuongHieu(){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM thuonghieu ORDER BY id ASC";
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
    // Thêm
    public function themThuongHieu($thuonghieu){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO thuonghieu(tenthuonghieu, diachi, email, sdt, hinhanh)
                VALUES(:tenthuonghieu, :diachi, :email, :sdt, :hinhanh)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tenthuonghieu", $thuonghieu->tenthuonghieu);
            $cmd->bindValue(":diachi", $thuonghieu->diachi);
            $cmd->bindValue(":email", $thuonghieu->email);
            $cmd->bindValue(":sdt", $thuonghieu->sdt);
            $cmd->bindValue(":hinhanh", $thuonghieu->hinhanh);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Xóa
    public function xoaThuongHieu($thuonghieu){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "DELETE FROM thuonghieu WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $thuonghieu->id);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Sửa
    public function suaThuongHieu($thuonghieu){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "UPDATE thuonghieu SET tenthuonghieu = :tenthuonghieu, 
                                                diachi = :diachi,
                                                email = :email,
                                                sdt = :sdt,
                                                hinhanh = :hinhanh
                                                WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tenthuonghieu", $thuonghieu->tenthuonghieu);
            $cmd->bindValue(":diachi", $thuonghieu->diachi);
            $cmd->bindValue(":email", $thuonghieu->email);
            $cmd->bindValue(":sdt", $thuonghieu->sdt);
            $cmd->bindValue(":id", $thuonghieu->id);
            $cmd->bindValue(":hinhanh", $thuonghieu->hinhanh);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Lấy thương hiệu theo id
    public function layThuongHieuId($id){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM thuonghieu WHERE id=:id";
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
}
?>