<?php
class DATABASE{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect(){
        try {
            $this->conn = null;
            $this->conn = new PDO("mysql:host=$this->servername;dbname=shopgiaythethao;port=3306", 
                $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Kết nối thành công";
        } 
        catch(PDOException $e) {
            echo "Lỗi kết nối: " . $e->getMessage();
        }
        return $this->conn;
    }
    public function executeNonQuery($query, $params = [])
    {
        try{
            $cmd = $this->conn->prepare($query);
            $cmd->execute($params);
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch (PDOException $ex){
            echo 'Lỗi: ' . $ex->getMessage();
        }
    }
}
?>