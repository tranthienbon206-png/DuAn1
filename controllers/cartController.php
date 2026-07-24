<?php
require_once 'models/cartModel.php';
class CartController {

    private $db;
    public function __construct() {
        $dbModel = new DatabaseModel();
        $this->db = $dbModel->connect();
    }
    public function viewCart() {     
        $cartModel = new CartModel($this->db);
        $data = $cartModel->getAll($user_id);
        include 'views/menuView.php';
        include 'views/cartView.php';
        include 'views/footerView.php';
    }
}