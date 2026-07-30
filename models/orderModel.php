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

    public function themMoi($user_id, $name, $status, $address, $phone)
    {
        $sql = "INSERT INTO orders (user_id, name, status, address, phone) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $name, $status, $address, $phone]);
        return $this->conn->lastInsertId();
    }
    public function themChiTiet($order_id, $product_id, $qty, $price)
    {
        $sql = "INSERT INTO order_detail(order_id, product_id, qty, price) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$order_id, $product_id, $qty, $price]);
    }

    public function getOrderDetail($order_id)
    {
        $sql = "SELECT
                order_detail.product_id,
                order_detail.qty,
                order_detail.price,
                products.name,
                products.image
            FROM order_detail
            INNER JOIN products
            ON order_detail.product_id = products.id
            WHERE order_detail.order_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
