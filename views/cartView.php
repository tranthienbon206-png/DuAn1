

<body class="bg-light">

<?php require __DIR__ . '/menuView.php'; ?>

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
                                    <th class="text-center" style="width:130px">Số lượng</th>
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
                                        <form action="index.php?action=cart_update" method="POST" class="d-inline cart-qty-form">
                                            <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                                            <div class="input-group input-group-sm justify-content-center" style="width:110px; margin:0 auto;">
                                                <button type="button" class="btn btn-outline-secondary btn-qty-minus">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="number" name="qty" value="<?= $item['quantity'] ?>"
                                                       min="1" class="form-control text-center px-0" readonly>
                                                <button type="button" class="btn btn-outline-secondary btn-qty-plus">
                                                    <i class="bi bi-plus"></i>
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
                <div class="card shadow-sm border-0 " style="top: 20px;">
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
<?php require __DIR__ . '/footerView.php'; ?>
<script>
document.querySelectorAll('.cart-qty-form').forEach(function (form) {
    const input = form.querySelector('input[name="qty"]');
    const minusBtn = form.querySelector('.btn-qty-minus');
    const plusBtn = form.querySelector('.btn-qty-plus');

    minusBtn.addEventListener('click', function () {
        let val = parseInt(input.value, 10);
        if (val > 1) {
            input.value = val - 1;
            form.submit();
        }
        // Nếu val == 1, bấm trừ sẽ không làm gì. Muốn bỏ sản phẩm thì dùng nút Xóa.
    });

    plusBtn.addEventListener('click', function () {
        let val = parseInt(input.value, 10);
        input.value = val + 1;
        form.submit();
    });
});
</script>

</body>
