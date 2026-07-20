<?php
class UserController {
    public function viewLogin() {
        include 'views/client/menuView.php';
        include 'views/client/loginView.php';
        include 'views/client/footerView.php';
    }

    public function viewRegister() {
    
      include 'views/menuView.php';
      include 'views/registerView.php';
        include 'views/footerView.php';
    }
}