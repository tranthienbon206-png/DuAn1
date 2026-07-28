<?php

/**
 * DANH SÁCH DANH MỤC (ADMIN)
 * File này CHỈ LÀ GIAO DIỆN (view). Chưa nối dữ liệu thật.
 */

// $categories = $categories ?? [
//     ['id' => 1, 'name' => 'Cá',  'productCount' => 24, 'status' => 'active'],
//     ['id' => 2, 'name' => 'Tôm', 'productCount' => 15, 'status' => 'active'],
//     ['id' => 3, 'name' => 'Mực', 'productCount' => 9,  'status' => 'active'],
//     ['id' => 4, 'name' => 'Cua', 'productCount' => 5,  'status' => 'hidden'],
//     ['id' => 5, 'name' => 'Ốc',  'productCount' => 12, 'status' => 'active'],
// ];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục - Trang quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="d-flex">

        <!-- ===== SIDEBAR ===== -->
        <nav class="bg-white border-end p-3" style="width: 250px; min-height: 100vh;">
            <h4 class="mb-4 px-2"><i class="bi bi-shop"></i> Admin Panel</h4>
            <ul class="nav nav-pills flex-column gap-1">
                <li class="nav-item">
                    <a href="?action=dashboard" class="nav-link link-dark">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="?action=admin_categories" class="nav-link active">
                        <i class="bi bi-tags me-2"></i> Danh mục
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?action=admin_products" class="nav-link link-dark">
                        <i class="bi bi-box-seam me-2"></i> Sản phẩm
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="?action=admin_orders" class="nav-link link-dark">
                        <i class="bi bi-receipt me-2"></i> Đơn hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?action=admin_users" class="nav-link link-dark">
                        <i class="bi bi-people me-2"></i> Người dùng
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?action=logout" class="nav-link text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
                    </a>
                </li>
            </ul>
        </nav>

        <!-- ===== MAIN CONTENT ===== -->
        <main class="flex-grow-1 p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Quản lý danh mục</h3>
                <a href="?action=admin_category_add" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Thêm danh mục
                </a>
            </div>

            <!-- ===== BẢNG DANH MỤC ===== -->
            <div class="card shadow-sm p-3">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Số sản phẩm</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($categories)): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Chưa có danh mục nào.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($categories as $cat): ?>
                                    <tr>
                                        <td>#<?= $cat['id'] ?></td>
                                        <td><?= htmlspecialchars($cat['name']) ?></td>
                                        <td><?= $cat['productCount'] ?></td>
                                        <td>
                                            <span class="badge <?= $cat['status'] === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                                                <?= $cat['status'] === 'active' ? 'Đang hiện' : 'Đang ẩn' ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>