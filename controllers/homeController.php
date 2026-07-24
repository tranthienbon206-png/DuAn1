<?php

class HomeController {
    public function viewHome() {
        include 'views/menuView.php';
        include 'views/homeView.php';
        include 'views/footerView.php';
    }
}