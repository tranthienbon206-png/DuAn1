<?php
class CartModel
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    /**
     * Lấy toàn bộ giỏ hàng của 1 user, kèm tên/ảnh sản phẩm.
     */
    public function getCartItems($user_id)
    {
        $stmt = $this->conn->prepare("
            SELECT c.id AS cart_id, c.quantity, c.price,
                   p.id AS product_id, p.name, p.image
            FROM cart c
            JOIN products p ON c.product_id = p.id
            WHERE c.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Tính tổng tiền giỏ hàng (dùng price đã lưu sẵn trong bảng cart,
     * không lấy giá mới nhất từ products, để tránh giá đổi giữa chừng).
     */
    public function getCartTotal($user_id)
    {
        $stmt = $this->conn->prepare("
            SELECT SUM(quantity * price) AS total
            FROM cart
            WHERE user_id = ?
        ");
        $stmt->execute([$user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    /**
     * Đếm tổng số sản phẩm trong giỏ (dùng cho badge ở menu).
     */
    public function getCartCount($user_id)
    {
        $stmt = $this->conn->prepare("SELECT SUM(quantity) AS cnt FROM cart WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['cnt'] ?? 0;
    }

    /**
     * Thêm sản phẩm vào giỏ.
     * Nếu đã có trong giỏ -> cộng dồn số lượng, giữ nguyên price cũ.
     * Nếu chưa có -> lấy price hiện tại của sản phẩm để lưu snapshot.
     */
    public function addToCart($user_id, $product_id, $qty = 1)
    {
        $stmt = $this->conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $product_id]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            $newQty = $existing['quantity'] + $qty;
            $update = $this->conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
            return $update->execute([$newQty, $existing['id']]);
        }

        $priceStmt = $this->conn->prepare("SELECT price FROM products WHERE id = ?");
        $priceStmt->execute([$product_id]);
        $product = $priceStmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            return false; // sản phẩm không tồn tại
        }

        $insert = $this->conn->prepare("
            INSERT INTO cart (user_id, product_id, quantity, price)
            VALUES (?, ?, ?, ?)
        ");
        return $insert->execute([$user_id, $product_id, $qty, $product['price']]);
    }

    /**
     * Cập nhật số lượng 1 dòng trong giỏ.
     * Nếu qty <= 0 thì xóa luôn dòng đó.
     */
    public function updateQuantity($cart_id, $user_id, $qty)
    {
        if ($qty <= 0) {
            return $this->removeItem($cart_id, $user_id);
        }
        $stmt = $this->conn->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$qty, $cart_id, $user_id]);
    }

    /**
     * Xóa 1 sản phẩm khỏi giỏ.
     */
    public function removeItem($cart_id, $user_id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        return $stmt->execute([$cart_id, $user_id]);
    }

    /**
     * Xóa sạch giỏ hàng (dùng sau khi đặt hàng / checkout thành công).
     */
    public function clearCart($user_id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");
        return $stmt->execute([$user_id]);
    }
}