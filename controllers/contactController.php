<?php

class contactController {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = trim($_POST['full_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $subject = trim($_POST['subject'] ?? '');
            $message = trim($_POST['message'] ?? '');

            if ($fullName == '') {
                $_SESSION['contact_full_name'] = 'Bạn chưa nhập họ tên';
            }

            if ($email == '') {
                $_SESSION['contact_email'] = 'Bạn chưa nhập email';
            }

            if ($phone == '') {
                $_SESSION['contact_phone'] = 'Bạn chưa nhập số điện thoại';
            }

            if ($subject == '') {
                $_SESSION['contact_subject'] = 'Bạn chưa nhập chủ đề';
            }

            if ($message == '') {
                $_SESSION['contact_message'] = 'Bạn chưa nhập nội dung';
            }
        }

        include 'views/contactView.php';
    }
}