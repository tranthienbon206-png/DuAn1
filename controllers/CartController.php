<?php

class CartController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function viewCart() {     
        $cartModel = new CartModel($this->db);
        $data = $cartModel->getAll($user_id);
        include 'views/client/menuView.php';
        include 'views/client/cartView.php';
        include 'views/client/footerView.php';
    }
}