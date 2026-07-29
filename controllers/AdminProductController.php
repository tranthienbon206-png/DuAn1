<?php
require_once 'controllers/AdminCategoryController.php';
class AdminProductController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $productModel = new ProductModel($this->db);
        $result = $productModel->getAllAdmin();

        include 'views/admin/productListView.php';
    }

    public function addForm()
    {
        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAll();

        include 'views/admin/productFormView.php';
    }

    public function store()
    {
        $productModel = new ProductModel($this->db);

        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $image = time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/' . $image);
        }

        $productModel->create(
            $_POST['name'],
            $_POST['category_id'],
            $_POST['price'],
            $_POST['sale_price'],
            $_POST['description'],
            $_POST['content'],
            $_POST['status'],
            $image
        );

        header('Location: ?action=admin_products');
        exit;
    }

    public function editForm($id)
    {
        $productModel = new ProductModel($this->db);
        $product = $productModel->find($id);

        $categoryModel = new CategoryModel($this->db);
        $categories = $categoryModel->getAll();

        include 'views/admin/productFormView.php';
    }

    public function update()
    {
        $productModel = new ProductModel($this->db);

        // Lấy sản phẩm hiện tại để biết ảnh cũ (phòng khi không upload ảnh mới)
        $oldProduct = $productModel->find($_POST['id']);
        $image = $oldProduct['image'] ?? '';

        // Nếu có chọn ảnh mới thì mới ghi đè
        if (!empty($_FILES['image']['name'])) {
            $image = time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/' . $image);
        }

        $productModel->update(
            $_POST['id'],
            $_POST['name'],
            $_POST['category_id'],
            $_POST['price'],
            $_POST['sale_price'],
            $_POST['description'],
            $_POST['content'],
            $_POST['status'],
            $image
        );

        header('Location: ?action=admin_products');
        exit;
    }

    public function delete($id)
    {
        $productModel = new ProductModel($this->db);
        $productModel->delete($id);

        header('Location: ?action=admin_products');
        exit;
    }
}
