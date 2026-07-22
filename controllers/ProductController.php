<?php
class ProductController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }


    // 1. Hàm hiển thị danh sách sản phẩm
    public function product()
    {
        $productModel = new ProductModel($this->db);
        $result = $productModel->getAll();
        include 'views/menuView.php';
        include 'views/productView.php';
        include 'views/footerView.php';
    }

    // 2. Hàm hiển thị chi tiết sản phẩm (Khắc phục lỗi Fatal Error)
    public function detail()
    {
        include 'views/menuView.php';
        include 'views/productDetail.php'; // Chỉ gọi file chi tiết
        include 'views/footerView.php';
    }
}
