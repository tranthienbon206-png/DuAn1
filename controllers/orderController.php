<?php
require_once "models/cartModel.php";
require_once "models/databaseModel.php";
require_once "models/orderModel.php";
class orderController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $db = new DatabaseModel();
        $cartModel = new CartModel($db->connect());
        $cartItems = $cartModel->getCartItems($user_id);
        $total = $cartModel->getCartTotal($user_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = false;

            // Lấy dữ liệu
            $customerName = trim($_POST['customer_name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $address = trim($_POST['address'] ?? '');

            // Kiểm tra họ tên
            if ($customerName == "") {
                $_SESSION['customer_name'] = "Bạn chưa nhập họ tên";
                $error = true;
            }

            // Kiểm tra số điện thoại
            if ($phone == "") {
                $_SESSION['phone'] = "Bạn chưa nhập số điện thoại";
                $error = true;
            }

            // Kiểm tra email
            if ($email == "") {
                $_SESSION['email'] = "Bạn chưa nhập email";
                $error = true;
            }

            // Kiểm tra địa chỉ
            if ($address == "") {
                $_SESSION['address'] = "Bạn chưa nhập địa chỉ";
                $error = true;
            }


            if ($error) {
                include "views/menuView.php";
                include "views/orderView.php";
                include "views/footerView.php";
                return;
            }

            $themMoi = new orderModel();
            $order_id = $themMoi->themMoi($user_id, $customerName, 1, $address, $phone);
            foreach ($cartItems as $item) {
                $themMoi->themChiTiet($order_id, $item['product_id'], $item['quantity'], $item['price']);
            }
            $cartModel->clearCart($user_id);
            include "views/menuView.php";
            include "views/orderSuccessView.php";
            include "views/footerView.php";
            return;
        }
        include "views/menuView.php";
        include "views/orderView.php";
        include "views/footerView.php";
    }
}
