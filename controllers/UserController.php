<?php

require_once "models/databaseModel.php";
require_once "models/UserModel.php";

class UserController
{
    private $userModel;

    public function __construct()
    {
        $db = new DatabaseModel();
        $this->userModel = new UserModel($db->connect());
    }

 
    public function viewRegister()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = trim($_POST["name"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $password = trim($_POST["password"] ?? "");
            $confirm = trim($_POST["confirm_password"] ?? "");
            $address = trim($_POST["address"] ?? "");
            $phone = trim($_POST["phone"] ?? "");

            $error = false;

            if ($name == "") {
                $_SESSION["register_name"] = "Vui lòng nhập họ tên.";
                $error = true;
            }

            if ($email == "") {
                $_SESSION["register_email"] = "Vui lòng nhập email.";
                $error = true;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["register_email"] = "Email không hợp lệ.";
                $error = true;
            }

            if ($password == "") {
                $_SESSION["register_password"] = "Vui lòng nhập mật khẩu.";
                $error = true;
            }

            if ($confirm == "") {
                $_SESSION["register_confirm"] = "Vui lòng xác nhận mật khẩu.";
                $error = true;
            }

            if ($password != $confirm) {
                $_SESSION["register_confirm"] = "Mật khẩu xác nhận không khớp.";
                $error = true;
            }

            if ($address == "") {
                $_SESSION["register_address"] = "Vui lòng nhập địa chỉ.";
                $error = true;
            }

            if ($phone == "") {
                $_SESSION["register_phone"] = "Vui lòng nhập số điện thoại.";
                $error = true;
            }

            if ($this->userModel->getUserByEmail($email)) {
                $_SESSION["register_email"] = "Email đã tồn tại.";
                $error = true;
            }

            if (!$error) {

                $this->userModel->createUser(
                    $name,
                    $email,
                    $password,
                    $address,
                    $phone
                );

                $_SESSION["success"] = "Đăng ký thành công. Hãy đăng nhập.";

                header("Location: ?action=login");
                exit;
            }
        }

        include "views/menuView.php";
        include "views/registerView.php";
        include "views/footerView.php";
    }

  
    public function viewLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = trim($_POST["email"] ?? "");
            $password = trim($_POST["password"] ?? "");

            if ($email == "" || $password == "") {

                $_SESSION["login_error"] = "Vui lòng nhập Email và Mật khẩu.";

            } else {

                $user = $this->userModel->loginUser($email, $password);

                if ($user) {

                    $_SESSION["user"] = [
                        "id" => $user["id"],
                        "name" => $user["name"],
                        "email" => $user["email"]
                    ];

                    header("Location: ?action=home");
                    exit;

                } else {

                    $_SESSION["login_error"] = "Email hoặc mật khẩu không đúng.";

                }
            }
        }

        include "views/menuView.php";
        include "views/loginView.php";
        include "views/footerView.php";
    }


    public function logout()
    {
        unset($_SESSION["user"]);

        session_destroy();

        header("Location: ?action=login");
        exit;
    }
}