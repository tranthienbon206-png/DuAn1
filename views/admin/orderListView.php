<?php

/**
 * DANH SÁCH ĐƠN HÀNG (ADMIN)
 */

if (!isset($orders)) {
    require_once __DIR__ . '/../../models/databaseModel.php';
    require_once __DIR__ . '/../../models/orderModel.php';

    $orderModel = new Order();
    $orders = $orderModel->getAll();
}

function formatMoney($number)
{
    return number_format((float) $number, 0, ',', '.') . ' đ';
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng - Trang quản trị</title>
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
                    <a href="?action=admin_orders" class="nav-link active">
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
                <h3 class="mb-0">Quản lý đơn hàng</h3>
            </div>

            <!-- ===== THANH TÌM KIẾM / LỌC ===== -->
            <div class="card shadow-sm p-3 mb-3">
                <form class="row g-2" method="get">
                    <input type="hidden" name="action" value="admin_orders">
                    <div class="col-md-4">
                        <input type="text" name="keyword" class="form-control" placeholder="Tìm theo mã ĐH / tên khách...">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">-- Trạng thái --</option>
                            <option value="processing">Đang xử lý</option>
                            <option value="delivered">Đã giao</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-search me-1"></i> Lọc
                        </button>
                    </div>
                </form>
            </div>

            <!-- ===== BẢNG ĐƠN HÀNG ===== -->
            <div class="card shadow-sm p-3">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Mã ĐH</th>
                                <th>Khách hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th class="text-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($orders)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Chưa có đơn hàng nào.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($orders as $order): ?>
                                    <?php
                                    $customer = $order['customer_name'] ?? $order['customer'] ?? $order['fullname'] ?? $order['name'] ?? 'Không rõ';
                                    $orderDate = $order['created_at'] ?? $order['order_date'] ?? $order['date'] ?? '';
                                    $total = $order['total'] ?? $order['total_amount'] ?? $order['amount'] ?? 0;
                                    $statusKey = strtolower((string) ($order['status'] ?? 'processing'));

                                    $statusLabel = match ($statusKey) {
                                        'delivered', 'completed', 'done', 'success' => ['Đã giao', 'bg-success'],
                                        'cancelled', 'canceled', 'rejected' => ['Đã hủy', 'bg-danger'],
                                        'processing', 'pending', 'waiting', 'shipping' => ['Đang xử lý', 'bg-warning text-dark'],
                                        default => ['Không rõ', 'bg-secondary'],
                                    };
                                    ?>
                                    <tr>
                                        <td>#<?= $order['id'] ?></td>
                                        <td><?= htmlspecialchars($customer) ?></td>
                                        <td><?= htmlspecialchars($orderDate) ?></td>
                                        <td><?= formatMoney($total) ?></td>
                                        <td><span class="badge <?= $statusLabel[1] ?>"><?= $statusLabel[0] ?></span></td>
                                        <td class="text-end">
                                            <a href="?action=admin_order_detail&id=<?= $order['id'] ?>"
                                                class="btn btn-sm btn-outline-primary" title="Xem chi tiết">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Xóa"
                                                data-bs-toggle="modal" data-bs-target="#deleteOrder<?= $order['id'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal xác nhận xóa -->
                                    <div class="modal fade" id="deleteOrder<?= $order['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc muốn xóa đơn hàng <strong>#<?= $order['id'] ?></strong> không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <a href="?action=admin_order_delete&id=<?= $order['id'] ?>" class="btn btn-danger">Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ===== PHÂN TRANG ===== -->
                <nav class="mt-3">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>