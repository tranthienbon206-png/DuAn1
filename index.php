<?php

session_start();
require_once 'models/categoryModel.php';
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
        (new ProductController($connection))->product();
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
        $controller = new OrderController($connection);
        $controller->index();
        break;

    case 'contact':
        $controller = new ContactController($connection);
        $controller->viewContact();
        break;

    // ===========================
    // USER
    // ===========================

    case 'register':
        $controller = new UserController();
        $controller->viewRegister();
        break;

    case 'login':
        $controller = new UserController();
        $controller->viewLogin();
        break;

    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;

    // ===========================
    // ADMIN VIEW
    // ===========================

    case 'dashboard':
        include 'views/admin/dashboardView.php';
        break;

    case 'admin_products':
        $controller = new AdminProductController($connection);
        $controller->index();
        break;

    case 'admin_product_add':
        $controller = new AdminProductController($connection);
        $controller->addForm();      // đổi từ include trực tiếp view -> gọi qua controller
        break;

    case 'admin_product_store':
        $controller = new AdminProductController($connection);
        $controller->store();
        break;

    case 'admin_product_edit':
        $controller = new AdminProductController($connection);
        $id = $_GET['id'] ?? 0;
        $controller->editForm($id);
        break;

    case 'admin_product_update':
        $controller = new AdminProductController($connection);
        $controller->update();
        break;

    case 'admin_product_delete':
        $controller = new AdminProductController($connection);
        $id = $_GET['id'] ?? 0;
        $controller->delete($id);
        break;

    case 'admin_orders':
        require_once 'controllers/admin/orderController.php';
        $controller = new AdminOrderController($connection);
        $controller->index();
        break;

    case 'admin_categories':
        require_once 'controllers/AdminCategoryController.php';
        $controller = new AdminCategoryController($connection);
        $controller->index();
        break;
    case 'admin_category_edit':
        $controller = new AdminCategoryController($connection);
        $id = $_GET['id'] ?? 0;
        $controller->edit($id);
        break;
    case 'admin_category_delete':
        $controller = new AdminCategoryController($connection);
        $id = $_GET['id'] ?? 0;
        $controller->delete($id);
        break;
    case 'admin_category_add':
        require_once 'controllers/AdminCategoryController.php';
        $controller = new AdminCategoryController($connection);
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


    default:
        echo "<h2>404 - Page Not Found</h2>";
        break;
}
