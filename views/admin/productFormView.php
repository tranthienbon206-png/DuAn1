<?php

/**
 * FORM THÊM / SỬA SẢN PHẨM (ADMIN)
 * Nhận $product (mảng, có thể null) và $categories (PDOStatement) từ Controller.
 */

$isEdit = isset($product) && $product !== null;
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
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <?php endif; ?>

                    <div class="row g-3">

                        <div class="col-md-8">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Danh mục</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= (isset($product['category_id']) && $product['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Giá gốc (đ)</label>
                            <input type="number" name="price" class="form-control" min="0" step="1" value="<?= $product['price'] ?? '' ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Giá khuyến mãi (đ)</label>
                            <input type="number" name="sale_price" class="form-control" min="0" step="1" value="<?= $product['sale_price'] ?? '' ?>">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select">
                                <?php $status = $product['status'] ?? 'Còn hàng'; ?>
                                <option value="Còn hàng" <?= $status === 'Còn hàng' ? 'selected' : '' ?>>Còn hàng</option>
                                <option value="Hết hàng" <?= $status === 'Hết hàng' ? 'selected' : '' ?>>Hết hàng</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Mô tả ngắn</label>
                            <textarea name="description" class="form-control" rows="2"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Nội dung chi tiết</label>
                            <textarea name="content" class="form-control" rows="4"><?= htmlspecialchars($product['content'] ?? '') ?></textarea>
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