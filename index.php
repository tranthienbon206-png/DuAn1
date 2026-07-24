<?php

session_start();

require_once 'controllers/AdminProductController.php';
require_once 'models/databaseModel.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/CartController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ContactController.php';
require_once 'models/databaseModel.php';
require_once 'models/orderModel.php';
require_once 'models/ProductModel.php';

$db = new DatabaseModel();
$connection = $db->connect();

$page = $_GET['action'] ?? 'home';

switch ($page) {

    // ===========================
    // CLIENT
    // ===========================

    case 'home':
        (new HomeController())->viewHome();
        break;

    case 'product':
        (new ProductController())->product();
        break;

    case 'product_detail':
        $controller = new ProductController($connection);
        $id = $_GET['id'] ?? 0;
        $controller->detail($id);
        break;

    case 'order':
        $controller = new orderController($connection);
        $controller->index();
        break;

    case 'cart':
        $controller = new CartController($connection);
        $controller->viewCart();
        break;

    case 'order':
        (new OrderController())->index();
        break;

    case 'contact':
        (new ContactController())->viewContact();
        break;

    // ===========================
    // USER
    // ===========================

    case 'register':
        (new UserController())->viewRegister();
        break;

    case 'login':
        (new UserController())->viewLogin();
        break;

    case 'logout':
        (new UserController())->logout();
        break;

    // ===========================
    // ADMIN VIEW
    // ===========================

    case 'dashboard':
        include 'views/admin/dashboardView.php';
        break;

    case 'admin_products':
        include 'views/admin/productListView.php';
        break;

    case 'admin_product_add':
        include 'views/admin/productFormView.php';
        break;

    case 'admin_product_edit':
        include 'views/admin/productFormView.php';
        break;

    case 'admin_orders':
        require_once 'controllers/admin/orderController.php';
        $controller = new AdminOrderController();
        $controller->index();
        break;

    case 'admin_categories':
        require_once 'controllers/admin/categoryController.php';
        $controller = new AdminCategoryController();
        $controller->index();
        break;

    case 'admin_category_add':
        require_once 'controllers/admin/categoryController.php';
        $controller = new AdminCategoryController();
        $controller->create();
        break;
    
    case 'admin_users':
        include 'views/admin/userListView.php';
        break;

    case 'admin_user_edit':
        include 'views/admin/userFormView.php';
        $controller = new AdminProductController($connection);
        $controller->index();
        break;
    
    // case 'admin_category':
    //     $controller = new AdminCategoryController($connection);
    //     $controller->index();
    //     break;

    // case 'admin_product_add':
    //     $controller = new AdminProductController($connection);
    //     $controller->addForm();
    //     break;
    // case 'admin_product_store':
    //     $controller = new AdminProductController($connection);
    //     $controller->store();
    //     break;
    // case 'admin_product_edit':
    //     $controller = new AdminProductController($connection);
    //     $id = $_GET['id'] ?? 0;
    //     $controller->editForm($id);
    //     break;
    // case 'admin_product_update':
    //     $controller = new AdminProductController($connection);
    //     $controller->update();
    //     break;
    // case 'admin_product_delete':
    //     $controller = new AdminProductController($connection);
    //     $id = $_GET['id'] ?? 0;
    //     $controller->delete($id);
    //     break;

    // case 'admin_categories':
    //     include 'views/admin/categoryListView.php';
    //     break;
    // case 'admin_category_add':
    //     include 'views/admin/categoryFormView.php';
    //     break;
    // case 'admin_category_edit':
    //     // sau này: lấy danh mục theo $_GET['id'] từ DB rồi gán vào $category trước khi include
    //     include 'views/admin/categoryFormView.php';
    //     break;

    // case 'admin_orders':
    //     include 'views/admin/orderListView.php';
    //     break;

    // case 'admin_users':
    //     include 'views/admin/userListView.php';
    //     break;
    // case 'admin_user_edit':
    //     // sau này: lấy user theo $_GET['id'] từ DB rồi gán vào $user trước khi include
    //     include 'views/admin/userFormView.php';
    //     break;

    default:
        echo "<h2>404 - Page Not Found</h2>";
        break;
}