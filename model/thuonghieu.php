<?php
class THUONGHIEU{
    private $id;
    private $tenthuonghieu;
    private $diachi;
    private $email;
    private $sdt;

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

    public function laydanhsachthuonghieu(){
        $dbconn = new DATABASE();
        $dbconn->connect();
        try{
            $query = "SELECT * FROM thuonghieu ORDER BY id DESC";
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
}
?>