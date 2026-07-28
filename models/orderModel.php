<?php
require_once __DIR__ . '/databaseModel.php';

class orderModel
{
    private $conn; //thuộc tính conn
    
    public function __construct() //hàm khởi tạo khi có biến tạo mới từ 1 class
    {
        $db = new DatabaseModel(); //biến tạo mới từ 1 class
        $this->conn = $db->connect(); 
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM orders ORDER BY id DESC";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function themMoi($user_id, $name, $status, $address, $phone ){
        $sql = "INSERT INTO orders (user_id, name, status, address, phone) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id, $name, $status, $address, $phone]);

    }
}