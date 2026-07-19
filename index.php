<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/CartController.php';
require_once 'controllers/UserController.php';

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
    case 'register':
        $controller = new UserController();
        $controller->register();
        break;
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;

    default:
        echo "Page not found";
        break;
}
