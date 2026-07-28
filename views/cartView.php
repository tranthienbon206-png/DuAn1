<?php
// $cartItems và $total được CartController truyền vào trước khi require file này
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<?php include 'views/headerView.php'; ?>
<div class="container py-5">
    <h2 class="mb-4 fw-bold"><i class="bi bi-cart3 me-2"></i>Giỏ hàng của bạn</h2>

    <?php if (empty($cartItems)): ?>

        <div class="text-center py-5 bg-white rounded-3 shadow-sm">
            <i class="bi bi-cart-x display-1 text-secondary"></i>
            <p class="text-muted fs-5 mt-3">Giỏ hàng đang trống.</p>
            <a href="index.php?action=product" class="btn btn-primary mt-2">
                <i class="bi bi-bag-plus me-1"></i>Tiếp tục mua sắm
            </a>
        </div>

    <?php else: ?>

        <div class="row g-4">
            <!-- Danh sách sản phẩm -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">Sản phẩm</th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center" style="width:140px">Số lượng</th>
                                    <th class="text-end">Thành tiền</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="<?= htmlspecialchars($item['image'] ?? 'assets/img/no-image.png') ?>"
                                                 alt="<?= htmlspecialchars($item['name']) ?>"
                                                 class="rounded"
                                                 style="width:64px;height:64px;object-fit:cover;">
                                            <span class="fw-semibold"><?= htmlspecialchars($item['name']) ?></span>
                                        </div>
                                    </td>
                                    <td class="text-center text-muted">
                                        <?= number_format($item['price']) ?>đ
                                    </td>
                                    <td class="text-center">
                                        <form action="index.php?action=cart_update" method="POST" class="d-inline">
                                            <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                                            <div class="input-group input-group-sm">
                                                <input type="number" name="qty" value="<?= $item['quantity'] ?>"
                                                       min="1" class="form-control text-center"
                                                       onchange="this.form.submit()">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                    <i class="bi bi-arrow-repeat"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-end fw-bold text-danger">
                                        <?= number_format($item['price'] * $item['quantity']) ?>đ
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?action=cart_remove&cart_id=<?= $item['cart_id'] ?>"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Xóa sản phẩm này khỏi giỏ hàng?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <a href="index.php?action=product" class="btn btn-link mt-3 ps-0">
                    <i class="bi bi-arrow-left me-1"></i>Tiếp tục mua sắm
                </a>
            </div>

            <!-- Tóm tắt đơn hàng -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-4">Tóm tắt đơn hàng</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tạm tính</span>
                            <span><?= number_format($total) ?>đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Phí vận chuyển</span>
                            <span class="text-success">Miễn phí</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">Tổng cộng</span>
                            <span class="fw-bold fs-5 text-danger"><?= number_format($total) ?>đ</span>
                        </div>

                        <a href="index.php?action=order" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-credit-card me-1"></i>Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>
<?php include 'views/footerView.php'; ?>
</body>
</html>