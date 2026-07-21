<?php

function active($name)
{
    $action = $_GET['action'] ?? 'home';

    return $action == $name ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar -->
    <div class="bg-dark text-white py-2">
        <div class="container d-flex justify-content-between">
            <small>Free Shipping On Orders Over $50</small>

            <div>
                <a href="?action=login" class="text-white text-decoration-none me-3">Login</a>
                <a href="?action=register" class="text-white text-decoration-none">Register</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand fw-bold fs-3" href="#">
                FASHION
            </a>

            <!-- Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link <?= active('home') ?>" href="?action=home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= active('product') ?>" href="?action=product">Product</a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            data-bs-toggle="dropdown">
                            Categories
                        </a>

                        <ul class="dropdown-menu">

                            <!-- Sau này lấy từ SQL -->
                            <li><a class="dropdown-item" href="#">Dress</a></li>
                            <li><a class="dropdown-item" href="#">Shirt</a></li>
                            <li><a class="dropdown-item" href="#">Skirt</a></li>
                            <li><a class="dropdown-item" href="#">Jeans</a></li>

                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= active('sale') ?>" href="?action=sale">Sale</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= active('contact') ?>" href="?action=contact">Contact</a>
                    </li>

                </ul>

                <!-- Search -->
                <form class="d-flex me-3">

                    <input class="form-control"
                        type="search"
                        placeholder="Search...">

                </form>

                <!-- Icons -->
                <div class="d-flex align-items-center">

                    <a href="#" class="text-dark me-3 fs-5">
                        <i class="bi bi-heart"></i>
                    </a>

                    <a href="./?action=cart" class="text-dark me-3 fs-5">
                        <i class="bi bi-cart3"></i>
                    </a>

                    <a href="#" class="text-dark fs-5">
                        <i class="bi bi-person-circle"></i>
                    </a>

                </div>

            </div>

        </div>
    </nav>
