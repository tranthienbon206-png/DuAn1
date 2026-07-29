<?php
class ProductController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }


    // 1. Hàm hiển thị danh sách sản phẩm (có lọc theo danh mục + khoảng giá)
    public function product()
    {
        $categoryId   = $_GET['category_id'] ?? null;
        $priceRanges  = $_GET['price'] ?? [];

        $productModel = new ProductModel($this->db);
        $result = $productModel->getFiltered($categoryId, $priceRanges);

        // Danh mục thật từ DB cho sidebar (thay vì danh sách cứng)
        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAll();

        include 'views/menuView.php';
        include 'views/productView.php';
        include 'views/footerView.php';
    }

    // 2. Hàm hiển thị chi tiết sản phẩm - lấy dữ liệu thật từ DB
    public function detail()
    {
        $id = $_GET['id'] ?? 0;

        $productModel = new ProductModel($this->db);
        $product = $productModel->findDetail($id);

        if (!$product) {
            include 'views/menuView.php';
            echo "<div class='container my-5 text-center'><h2>404 - Không tìm thấy sản phẩm</h2></div>";
            include 'views/footerView.php';
            return;
        }

        $relatedProducts = $productModel->getRelated($product['category_id'], $product['id'], 4);

        include 'views/menuView.php';
        include 'views/productDetail.php';
        include 'views/footerView.php';
    }
}