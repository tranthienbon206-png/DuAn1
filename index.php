<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/CartController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'product':
        $controller = new ProductController();
        $controller->product();
        break;

    case 'order':
        $controller = new OrderController();
        $controller->order();
        break;

    case 'cart':
        $controller = new CartController();
        $controller->cart();
        break;

    default:
        echo "Page not found";
        break;
}