<?php
class ProductController
{
    // 1. Hàm hiển thị danh sách sản phẩm
    public function product() {
        include 'views/menuView.php';
        include 'views/product.php'; // Chỉ gọi file danh sách
        include 'views/footerView.php';
    }

    // 2. Hàm hiển thị chi tiết sản phẩm (Khắc phục lỗi Fatal Error)
    public function detail() {
        include 'views/menuView.php';
        include 'views/productDetail.php'; // Chỉ gọi file chi tiết
        include 'views/footerView.php';
    }
}
?>