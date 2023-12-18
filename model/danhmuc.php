<?php
class DANHMUC{
    private $id;
    private $tendanhmuc;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTendanhmuc()
    {
        return $this->tendanhmuc;
    }

    public function setTendanhmuc($tendanhmuc): self
    {
        $this->tendanhmuc = $tendanhmuc;

        return $this;
    }

    //Lấy danh danh mục
    public function layDanhSachDanhMuc(){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM danhmuc ORDER BY id ASC";
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
    //Lấy danh danh mục
    public function layDanhSachDanhMucTheoId($id){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "SELECT * FROM danhmuc WHERE id=:id";
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
    }
    // Thêm
    public function themDanhmuc($danhmuc){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "INSERT INTO danhmuc(tendanhmuc)
                VALUES(:tendanhmuc)";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":tendanhmuc", $danhmuc->tendanhmuc);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Xóa
    public function xoaDanhMuc($danhmuc){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "DELETE FROM danhmuc WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $danhmuc->id);
            $kq = $cmd->execute();
            return $kq;
        }
        catch(PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
            exit();
        }
    }
    // Sửa
    public function suaDanhMuc($danhmuc){
        $conn = new DATABASE();
        $dbconn = $conn->connect();
        try{
            $query = "UPDATE danhmuc SET tendanhmuc = :tendanhmuc
                                        WHERE id=:id";
            $cmd = $dbconn->prepare($query);
            $cmd->bindValue(":id", $danhmuc->id);
            $cmd->bindValue(":tendanhmuc", $danhmuc->tendanhmuc);
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