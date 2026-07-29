<?php
require_once __DIR__ . '/../models/contactModel.php';
require_once __DIR__ . '/../models/UserModel.php';

class ContactController
{
    private $contactModel;
    private $userModel;

    public function __construct($connection)
    {
        $this->contactModel = new ContactModel($connection);
        $this->userModel    = new UserModel($connection);
    }

    public function viewContact()
    {
        $isLoggedIn = isset($_SESSION['user']['id']);
        $currentUser = null;

        if ($isLoggedIn) {
            // Lấy đầy đủ thông tin (kể cả phone) từ DB, vì session chỉ lưu id/name/email
            $currentUser = $this->userModel->getUserById($_SESSION['user']['id']);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $subject = trim($_POST['subject'] ?? '');
            $message = trim($_POST['message'] ?? '');
            $error = false;

            if ($isLoggedIn) {
                // Đã đăng nhập -> lấy sẵn từ tài khoản, không cần validate
                $full_name = $currentUser['name'];
                $email     = $currentUser['email'];
                $phone     = $currentUser['phone'];
                $user_id   = $currentUser['id'];
            } else {
                // Chưa đăng nhập -> phải nhập và validate như cũ
                $full_name = trim($_POST['full_name'] ?? '');
                $email     = trim($_POST['email'] ?? '');
                $phone     = trim($_POST['phone'] ?? '');
                $user_id   = null;

                if ($full_name == '') {
                    $_SESSION['contact_full_name'] = 'Vui lòng nhập họ tên.';
                    $error = true;
                }
                if ($email == '') {
                    $_SESSION['contact_email'] = 'Vui lòng nhập email.';
                    $error = true;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['contact_email'] = 'Email không hợp lệ.';
                    $error = true;
                }
                if ($phone == '') {
                    $_SESSION['contact_phone'] = 'Vui lòng nhập số điện thoại.';
                    $error = true;
                }
            }

            if ($subject == '') {
                $_SESSION['contact_subject'] = 'Vui lòng nhập chủ đề.';
                $error = true;
            }
            if ($message == '') {
                $_SESSION['contact_message'] = 'Vui lòng nhập nội dung.';
                $error = true;
            }

            if (!$error) {
                $this->contactModel->saveMessage([
                    'user_id'   => $user_id,
                    'full_name' => $full_name,
                    'email'     => $email,
                    'phone'     => $phone,
                    'subject'   => $subject,
                    'message'   => $message,
                ]);

                $_SESSION['contact_success'] = 'Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.';
                header('Location: index.php?action=contact');
                exit;
            }
        }

        include 'views/menuView.php';
        include 'views/contactView.php';
        include 'views/footerView.php';
    }
}