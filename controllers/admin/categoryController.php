<?php
require_once __DIR__ . '/../../models/categoryModel.php';

class AdminCategoryController
{
    public function index()
    {
        $model = new categoryModel();
        $categories = $model->getAll();

        include __DIR__ . '/../../views/admin/categoryListView.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $status = $_POST['status'] ?? 'active';

            if ($name == '') {
                $_SESSION['category_name'] = 'Bạn chưa nhập tên danh mục';
            } else {
                $model = new categoryModel();
                $model->themMoi($name, $status);
                header('Location: index.php?action=admin_categories');
                exit;
            }
        }

        include __DIR__ . '/../../views/admin/categoryFormView.php';
    }
}
