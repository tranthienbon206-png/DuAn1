<?php

class HomeController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function viewHome()
    {
        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAll();

        $productModel = new ProductModel($this->db);
        $result = $productModel->getAllAdmin(); // đã có sẵn, trả về PDOStatement mới nhất trước

        include 'views/menuView.php';
        include 'views/homeView.php';
        include 'views/footerView.php';
    }
}