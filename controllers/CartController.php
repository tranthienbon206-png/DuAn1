<?php
require_once __DIR__ . '/../models/cartModel.php';

class CartController
{
    private $cartModel;

    public function __construct($connection)
    {
        $this->cartModel = new CartModel($connection);
    }

    /**
     * Kiểm tra đăng nhập, dùng chung cho mọi action.
     * Trả về user_id nếu đã đăng nhập, ngược lại chuyển hướng về trang login.
     */
    private function checkLogin()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        return $_SESSION['user']['id'];
    }

    /**
     * Hiển thị trang giỏ hàng -> gọi khi action=cart
     */
    public function viewCart()
    {
        $user_id   = $this->checkLogin();
        $cartItems = $this->cartModel->getCartItems($user_id);
        $total     = $this->cartModel->getCartTotal($user_id);

        require __DIR__ . '/../views/cartView.php';
    }

    /**
     * Thêm sản phẩm vào giỏ -> gọi khi action=cart_add
     */
    public function addToCart()
    {
        $user_id    = $this->checkLogin();
        $product_id = (int)($_POST['id'] ?? 0);
        $qty        = (int)($_POST['quantity'] ?? 1);

        if ($product_id > 0 && $qty > 0) {
            $this->cartModel->addToCart($user_id, $product_id, $qty);
        }

        header('Location: index.php?action=cart');
        exit;
    }

    /**
     * Cập nhật số lượng 1 dòng trong giỏ -> gọi khi action=cart_update
     */
    public function updateCart()
    {
        $user_id = $this->checkLogin();
        $cart_id = (int)($_POST['cart_id'] ?? 0);
        $qty     = (int)($_POST['qty'] ?? 0);

        $this->cartModel->updateQuantity($cart_id, $user_id, $qty);

        header('Location: index.php?action=cart');
        exit;
    }

    /**
     * Xóa 1 sản phẩm khỏi giỏ -> gọi khi action=cart_remove
     */
    public function removeFromCart()
    {
        $user_id = $this->checkLogin();
        $cart_id = (int)($_GET['cart_id'] ?? 0);

        $this->cartModel->removeItem($cart_id, $user_id);

        header('Location: index.php?action=cart');
        exit;
    }
}