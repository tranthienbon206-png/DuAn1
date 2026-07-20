<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/CartController.php';

$page = $_GET['action'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->Home();
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
        $controller->order();
        break;

    case 'cart':
        $controller = new CartController();
        $controller->Cart();
        break;

    default:
        echo "Page not found";
        break;
}