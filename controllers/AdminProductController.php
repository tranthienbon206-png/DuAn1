<?php
class AdminProductController {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function index()
    {
        $productModel = new ProductModel($this->db);
        $result = $productModel->getAlladmin();
        include 'views/admin/productListView.php';
        include 'views/admin/productFormView.php';
    }

}