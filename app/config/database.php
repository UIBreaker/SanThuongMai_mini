<?php
class Database {
    private $host = "localhost";
    private $db_name = "mini_ecommerce"; // Sử dụng database mini_ecommerce
    private $username = "root";
    private $password = "";
    public $conn;
    
    public function getConnection() {
        $this->conn = null;
        try {
            // Tạo kết nối PDO và thiết lập charset là utf8
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                  $this->username, 
                                  $this->password);
            $this->conn->exec("set names utf8");
            // Thiết lập chế độ báo lỗi của PDO thành exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
