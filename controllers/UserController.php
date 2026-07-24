<?php
class UserController {
    public function viewLogin() {
        include 'views/menuView.php';
        include 'views/loginView.php';
        include 'views/footerView.php';
    }

    public function viewRegister() {
    
      include 'views/menuView.php';
      include 'views/registerView.php';
        include 'views/footerView.php';
    }
}