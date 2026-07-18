<?php
class UserController {
    public function login() {
    include 'views/menuView.php';
      include 'views/loginView.php';
      include 'views/footerView.php';
    }

    public function register() {
    
      include 'views/menuView.php';
      include 'views/registerView.php';
        include 'views/footerView.php';
    }
}