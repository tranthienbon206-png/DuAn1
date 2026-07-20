<?php

class HomeController {
    public function Home() {
        include 'views/menuView.php';
        include 'views/homeView.php';
        include 'views/footerView.php';
    }
}