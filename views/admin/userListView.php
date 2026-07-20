<?php

/**
 * DANH SÁCH NGƯỜI DÙNG (ADMIN)
 * File này CHỈ LÀ GIAO DIỆN (view). Chưa nối dữ liệu thật.
 */

$users = $users ?? [
    ['id' => 1, 'name' => 'Nguyễn Văn A', 'email' => 'vana@gmail.com',   'phone' => '0901234567', 'role' => 'customer', 'status' => 'active'],
    ['id' => 2, 'name' => 'Trần Thị B',   'email' => 'thib@gmail.com',   'phone' => '0912345678', 'role' => 'customer', 'status' => 'active'],
    ['id' => 3, 'name' => 'Lê Văn C',     'email' => 'vanc@gmail.com',   'phone' => '0923456789', 'role' => 'customer', 'status' => 'locked'],
    ['id' => 4, 'name' => 'Admin Chính',  'email' => 'admin@bhzshop.com', 'phone' => '0934567890', 'role' => 'admin',    'status' => 'active'],
    ['id' => 5, 'name' => 'Phạm Thị D',   'email' => 'thid@gmail.com',   'phone' => '0945678901', 'role' => 'customer', 'status' => 'active'],
];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng - Trang quản trị</title>
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
                    <a href="?action=admin_orders" class="nav-link link-dark">
                        <i class="bi bi-receipt me-2"></i> Đơn hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?action=admin_users" class="nav-link active">
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
                <h3 class="mb-0">Quản lý người dùng</h3>
            </div>

            <!-- ===== THANH TÌM KIẾM / LỌC ===== -->
            <div class="card shadow-sm p-3 mb-3">
                <form class="row g-2" method="get">
                    <input type="hidden" name="action" value="admin_users">
                    <div class="col-md-5">
                        <input type="text" name="keyword" class="form-control" placeholder="Tìm theo tên / email...">
                    </div>
                    <div class="col-md-3">
                        <select name="role" class="form-select">
                            <option value="">-- Vai trò --</option>
                            <option value="customer">Khách hàng</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="">-- Trạng thái --</option>
                            <option value="active">Hoạt động</option>
                            <option value="locked">Đã khóa</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-search me-1"></i> Lọc
                        </button>
                    </div>
                </form>
            </div>

            <!-- ===== BẢNG NGƯỜI DÙNG ===== -->
            <div class="card shadow-sm p-3">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th class="text-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($users)): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Chưa có người dùng nào.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>#<?= $user['id'] ?></td>
                                        <td><?= htmlspecialchars($user['name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= htmlspecialchars($user['phone']) ?></td>
                                        <td>
                                            <span class="badge <?= $user['role'] === 'admin' ? 'bg-primary' : 'bg-secondary' ?>">
                                                <?= $user['role'] === 'admin' ? 'Quản trị viên' : 'Khách hàng' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge <?= $user['status'] === 'active' ? 'bg-success' : 'bg-danger' ?>">
                                                <?= $user['status'] === 'active' ? 'Hoạt động' : 'Đã khóa' ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="?action=admin_user_edit&id=<?= $user['id'] ?>"
                                                class="btn btn-sm btn-outline-primary" title="Sửa">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Xóa"
                                                data-bs-toggle="modal" data-bs-target="#deleteUser<?= $user['id'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal xác nhận xóa -->
                                    <div class="modal fade" id="deleteUser<?= $user['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc muốn xóa người dùng
                                                    <strong><?= htmlspecialchars($user['name']) ?></strong> không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <a href="?action=admin_user_delete&id=<?= $user['id'] ?>" class="btn btn-danger">Xóa</a>
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