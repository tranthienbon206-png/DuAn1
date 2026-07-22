<?php

class orderController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Lấy dữ liệu
            $customerName = trim($_POST['customer_name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $address = trim($_POST['address'] ?? '');

            // Kiểm tra họ tên
            if ($customerName == "") {
                $_SESSION['customer_name'] = "Bạn chưa nhập họ tên";
            }

            // Kiểm tra số điện thoại
            if ($phone == "") {
                $_SESSION['phone'] = "Bạn chưa nhập số điện thoại";
            }

            // Kiểm tra email
            if ($email == "") {
                $_SESSION['email'] = "Bạn chưa nhập email";
            }

            // Kiểm tra địa chỉ
            if ($address == "") {
                $_SESSION['address'] = "Bạn chưa nhập địa chỉ";
            }
            
            $themMoi = new orderModel();
            $themMoi->themMoi(1, $customerName, 1, $address, $phone );
            
            // header("Location: index.php?action=order");
            // exit;
        }

        include "views/menuView.php";
        include "views/orderView.php";
        include "views/footerView.php";
    }
}