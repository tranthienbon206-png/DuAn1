<?php
session_start();

require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/CartController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/contactController.php';

$page = $_GET['action'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->viewHome();
        break;

    case 'product':
        $controller = new ProductController();
        $controller->product();
        break;
    case 'product_detail':
        $controller = new ProductController();
        $id = $_GET['id'] ?? 0;
        $controller->detail($id);
        break;

    case 'order':
        $controller = new OrderController();
        $controller->index();
        break;

    case 'contact':
        $controller = new contactController();
        $controller->index();
        break;

    case 'cart':
        $controller = new CartController();
        $controller->viewCart();
        break;
    case 'contact':
        $controller = new ContactController();
        $controller->viewContact();
        break;
    case 'register':
        $controller = new UserController();
        $controller->viewRegister();
        break;
    case 'login':
        $controller = new UserController();
        $controller->viewLogin();
        break;

    case 'dashboard':
        include 'views/admin/dashboardView.php';
        break;
    case 'admin_products':
        include 'views/admin/productListView.php';
        break;
    case 'admin_product_add':
        include 'views/admin/productFormView.php';   // không truyền $product -> form trống
        break;
    case 'admin_product_edit':
        // sau này: lấy sản phẩm theo $_GET['id'] từ DB rồi gán vào $product trước khi include
        include 'views/admin/productFormView.php';
        break;
    case 'admin_orders':
        include 'views/admin/orderListView.php';
        break;
    case 'admin_categories':
        include 'views/admin/categoryListView.php';
        break;
    case 'admin_category_add':
        include 'views/admin/categoryFormView.php';
        break;
    case 'admin_category_edit':
        // sau này: lấy danh mục theo $_GET['id'] từ DB rồi gán vào $category trước khi include
        include 'views/admin/categoryFormView.php';
        break;
    case 'admin_users':
        include 'views/admin/userListView.php';
        break;
    case 'admin_user_edit':
        // sau này: lấy user theo $_GET['id'] từ DB rồi gán vào $user trước khi include
        include 'views/admin/userFormView.php';
        break;
    default:
        echo "Page not found";
        break;
}
