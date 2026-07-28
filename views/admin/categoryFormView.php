<?php



$category = $category ?? null;
$isEdit   = $category !== null;

$id     = $category['id']     ?? '';
$name   = $category['name']   ?? '';
$status = $category['status'] ?? 'active';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Sửa danh mục' : 'Thêm danh mục' ?> - Trang quản trị</title>
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

            <div class="d-flex align-items-center gap-2 mb-4">
                <a href="?action=admin_categories" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h3 class="mb-0"><?= $isEdit ? 'Sửa danh mục' : 'Thêm danh mục mới' ?></h3>
            </div>

            <div class="card shadow-sm p-4" style="max-width: 600px;">
                <form method="post" action="?action=<?= $isEdit ? 'admin_category_edit' : 'admin_category_add' ?>&id=<?= $id ?>">

                    <div class="mb-3">
                        <label class="form-label">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="status" class="form-select">
                            <option value="active" <?= $status === 'active' ? 'selected' : '' ?>>Đang hiện</option>
                            <option value="hidden" <?= $status === 'hidden' ? 'selected' : '' ?>>Đang ẩn</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> <?= $isEdit ? 'Lưu thay đổi' : 'Thêm danh mục' ?>
                        </button>
                        <a href="?action=admin_categories" class="btn btn-outline-secondary">Hủy</a>
                    </div>

                </form>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>