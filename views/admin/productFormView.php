<?php

/**
 * FORM THÊM / SỬA SẢN PHẨM (ADMIN)
 * File này CHỈ LÀ GIAO DIỆN (view). Chưa nối dữ liệu / xử lý lưu thật.
 *
 * Cách dùng chung cho 2 chức năng:
 * - Thêm mới: Controller include file này mà KHÔNG truyền $product -> form trống.
 * - Sửa: Controller lấy sản phẩm theo $id từ DB, gán vào $product rồi include file này -> form tự điền sẵn dữ liệu.
 */

$product = $product ?? null;               // null = đang thêm mới, có giá trị = đang sửa
$isEdit  = $product !== null;

$id          = $product['id']          ?? '';
$name        = $product['name']        ?? '';
$category    = $product['category']    ?? '';
$price       = $product['price']       ?? '';
$stock       = $product['stock']       ?? '';
$description = $product['description'] ?? '';
$status      = $product['status']      ?? 'active';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm' ?> - Trang quản trị</title>
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
                    <a href="?action=admin_products" class="nav-link active">
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
                <a href="?action=admin_products" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h3 class="mb-0"><?= $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm mới' ?></h3>
            </div>

            <div class="card shadow-sm p-4" style="max-width: 800px;">
                <form method="post" action="?action=<?= $isEdit ? 'admin_product_update' : 'admin_product_store' ?>" enctype="multipart/form-data">

                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id" value="<?= $id ?>">
                    <?php endif; ?>

                    <div class="row g-3">

                        <div class="col-md-8">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Danh mục</label>
                            <select name="category" class="form-select" required>
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach (['Cá', 'Tôm', 'Mực', 'Cua', 'Ốc'] as $cat): ?>
                                    <option value="<?= $cat ?>" <?= $category === $cat ? 'selected' : '' ?>><?= $cat ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Giá bán (đ)</label>
                            <input type="number" name="price" class="form-control" min="0" step="1000" value="<?= $price ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Số lượng tồn kho</label>
                            <input type="number" name="stock" class="form-control" min="0" value="<?= $stock ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select">
                                <option value="active" <?= $status === 'active' ? 'selected' : '' ?>>Đang bán</option>
                                <option value="hidden" <?= $status === 'hidden' ? 'selected' : '' ?>>Đang ẩn</option>
                                <option value="out_of_stock" <?= $status === 'out_of_stock' ? 'selected' : '' ?>>Hết hàng</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($description) ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <div class="form-text">Chưa chọn ảnh nào<?= $isEdit ? ' — để trống nếu không đổi ảnh cũ' : '' ?>.</div>
                        </div>

                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> <?= $isEdit ? 'Lưu thay đổi' : 'Thêm sản phẩm' ?>
                        </button>
                        <a href="?action=admin_products" class="btn btn-outline-secondary">Hủy</a>
                    </div>

                </form>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>