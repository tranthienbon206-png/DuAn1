<?php


// ----- DỮ LIỆU MẪU (sẽ thay bằng dữ liệu thật từ DB sau) -----
$totalRevenue  = $totalRevenue  ?? 125800000;   // Tổng doanh thu (VNĐ)
$totalOrders   = $totalOrders   ?? 342;          // Tổng đơn hàng
$totalProducts = $totalProducts ?? 87;           // Tổng sản phẩm
$totalUsers    = $totalUsers    ?? 156;          // Tổng người dùng

$recentOrders = $recentOrders ?? [
    ['id' => 1024, 'customer' => 'Nguyễn Văn A', 'date' => '2026-07-20', 'total' => 850000, 'status' => 'Đang xử lý'],
    ['id' => 1023, 'customer' => 'Trần Thị B',   'date' => '2026-07-19', 'total' => 420000, 'status' => 'Đã giao'],
    ['id' => 1022, 'customer' => 'Lê Văn C',     'date' => '2026-07-19', 'total' => 1250000, 'status' => 'Đã giao'],
    ['id' => 1021, 'customer' => 'Phạm Thị D',   'date' => '2026-07-18', 'total' => 300000, 'status' => 'Đã hủy'],
    ['id' => 1020, 'customer' => 'Hoàng Văn E',  'date' => '2026-07-18', 'total' => 675000, 'status' => 'Đang xử lý'],
];

$topProducts = $topProducts ?? [
    ['name' => 'Cá hồi Na Uy phi lê', 'sold' => 120, 'revenue' => 36000000],
    ['name' => 'Tôm sú size 20',      'sold' => 98,  'revenue' => 24500000],
    ['name' => 'Mực ống tươi',        'sold' => 76,  'revenue' => 15200000],
    ['name' => 'Cua hoàng đế',        'sold' => 34,  'revenue' => 27200000],
];

// Hàm hỗ trợ định dạng tiền cho gọn view
function formatMoney($number)
{
    return number_format($number, 0, ',', '.') . ' đ';
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Trang quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="d-flex">

        <!-- ===== SIDEBAR ===== -->
        <nav class="bg-white border-end p-3" style="width: 250px; min-height: 100vh;">
            <h4 class="mb-4 px-2"><i class="bi bi-shop"></i> Admin Panel</h4>
            <ul class="nav nav-pills flex-column gap-1">
                <li class="nav-item">
                    <a href="?action=dashboard" class="nav-link active">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?action=admin_categories" class="nav-link link-dark">
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
                <h3 class="mb-0">Tổng quan</h3>
                <span class="text-muted">
                    <i class="bi bi-calendar3"></i> <?= date('d/m/Y') ?>
                </span>
            </div>

            <!-- ===== 4 THẺ THỐNG KÊ ===== -->
            <div class="row g-3 mb-4">

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary-subtle text-primary rounded-3 p-3 fs-4">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tổng doanh thu</div>
                                <div class="fw-bold fs-5"><?= formatMoney($totalRevenue) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-warning-subtle text-warning-emphasis rounded-3 p-3 fs-4">
                                <i class="bi bi-receipt"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tổng đơn hàng</div>
                                <div class="fw-bold fs-5"><?= $totalOrders ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success-subtle text-success rounded-3 p-3 fs-4">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tổng sản phẩm</div>
                                <div class="fw-bold fs-5"><?= $totalProducts ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-info-subtle text-info-emphasis rounded-3 p-3 fs-4">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tổng người dùng</div>
                                <div class="fw-bold fs-5"><?= $totalUsers ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row g-3">

                <!-- ===== ĐƠN HÀNG GẦN ĐÂY ===== -->
                <div class="col-lg-7">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Đơn hàng gần đây</h5>
                            <a href="?action=admin_orders" class="small text-decoration-none">Xem tất cả</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã ĐH</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentOrders as $order): ?>
                                        <?php
                                        $statusClass = match ($order['status']) {
                                            'Đã giao' => 'bg-success',
                                            'Đã hủy'  => 'bg-danger',
                                            default   => 'bg-warning text-dark',
                                        };
                                        ?>
                                        <tr>
                                            <td>#<?= $order['id'] ?></td>
                                            <td><?= htmlspecialchars($order['customer']) ?></td>
                                            <td><?= $order['date'] ?></td>
                                            <td><?= formatMoney($order['total']) ?></td>
                                            <td><span class="badge <?= $statusClass ?>"><?= $order['status'] ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ===== SẢN PHẨM BÁN CHẠY ===== -->
                <div class="col-lg-5">
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-3">Sản phẩm bán chạy</h5>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($topProducts as $index => $product): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <div>
                                        <span class="fw-semibold">#<?= $index + 1 ?> <?= htmlspecialchars($product['name']) ?></span>
                                        <div class="text-muted small">Đã bán: <?= $product['sold'] ?> sản phẩm</div>
                                    </div>
                                    <span class="fw-bold text-success"><?= formatMoney($product['revenue']) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>