<?php

class AdminCategoryController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Danh sách danh mục
    public function index()
    {
        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAll();

        include 'views/admin/categoryListView.php';
    }

    // Thêm danh mục mới
    // GET  -> hiển thị form trống
    // POST -> lưu vào DB rồi quay lại danh sách
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryModel = new CategoryModel($this->db);

            $name   = $_POST['name'] ?? '';
            $status = $_POST['status'] ?? 'active';

            $categoryModel->create($name, $status);

            header('Location: index.php?action=admin_categories');
            exit;
        }

        // Chưa submit -> hiển thị form thêm mới (không có $category -> form trống)
        include 'views/admin/categoryFormView.php';
    }

    // Sửa danh mục
    // GET  -> lấy dữ liệu cũ, hiển thị form đã điền sẵn
    // POST -> lưu thay đổi rồi quay lại danh sách
    public function edit($id)
    {
        $categoryModel = new CategoryModel($this->db);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name   = $_POST['name'] ?? '';
            $status = $_POST['status'] ?? 'active';

            $categoryModel->update($id, $name, $status);

            header('Location: index.php?action=admin_categories');
            exit;
        }

        // Chưa submit -> lấy danh mục theo id để đổ dữ liệu ra form
        $category = $categoryModel->find($id);

        if (!$category) {
            echo "<h2>404 - Không tìm thấy danh mục</h2>";
            return;
        }

        include 'views/admin/categoryFormView.php';
    }

    // Xóa danh mục
    public function delete($id)
    {
        $categoryModel = new CategoryModel($this->db);
        $categoryModel->delete($id);

        header('Location: index.php?action=admin_categories');
        exit;
    }
}