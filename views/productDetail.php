<div class="container mt-4 mb-5">
    <?php
    $imagePath = !empty($product['image']) ? 'public/uploads/' . $product['image'] : 'public/images/no-image.png';
    $hasSale   = isset($product['sale_price']) && $product['sale_price'] > 0;
    ?>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?action=home" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item">
                <a href="?action=product&category_id=<?php echo $product['category_id']; ?>" class="text-decoration-none text-dark">
                    <?php echo htmlspecialchars($product['category_name']); ?>
                </a>
            </li>
            <li class="breadcrumb-item active text-danger" aria-current="page"><?php echo htmlspecialchars($product['name']); ?></li>
        </ol>
    </nav>

    <!-- Khung thông tin chính -->
    <div class="row bg-white p-3 p-md-4 shadow-sm rounded mb-5">
        <!-- Cột Trái: Ảnh chính -->
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="border rounded p-1 mb-3 text-center">
                <img src="<?php echo $imagePath; ?>" class="img-fluid w-100 rounded object-fit-cover" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
        </div>

        <!-- Cột Phải: Form đặt hàng -->
        <div class="col-md-7 ps-md-5">
            <h2 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($product['name']); ?></h2>

            <!-- Giá -->
            <div class="bg-light rounded p-3 mb-4">
                <?php if ($hasSale): ?>
                    <span class="text-danger fw-bold fs-2"><?php echo number_format($product['sale_price'], 0, ',', '.'); ?> ₫</span>
                    <span class="text-muted text-decoration-line-through fs-5 ms-3"><?php echo number_format($product['price'], 0, ',', '.'); ?> ₫</span>
                <?php else: ?>
                    <span class="text-danger fw-bold fs-2"><?php echo number_format($product['price'], 0, ',', '.'); ?> ₫</span>
                <?php endif; ?>
            </div>

            <form action="?action=cart_add" method="POST">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

                <!-- Số lượng & Nút Mua -->
                <div class="d-flex align-items-center mb-4 gap-3">
                    <div class="border rounded d-flex bg-white">
                        <button type="button" class="btn btn-light border-0 px-3 py-2">-</button>
                        <input type="number" name="quantity" class="form-control border-0 text-center shadow-none p-0" value="1" min="1" max="50" style="width: 50px;">
                        <button type="button" class="btn btn-light border-0 px-3 py-2">+</button>
                    </div>
                    <span class="badge <?php echo $product['status'] === 'Còn hàng' ? 'bg-success' : 'bg-secondary'; ?>">
                        <?php echo htmlspecialchars($product['status']); ?>
                    </span>
                </div>

                <div class="d-grid gap-3 d-md-flex">
                    <button type="submit" class="btn btn-danger btn-lg px-5 py-3 fw-bold flex-grow-1 text-uppercase">
                        <i class="bi bi-cart-plus me-2"></i>Thêm vào giỏ
                    </button>
                    <button type="button" class="btn btn-dark btn-lg px-5 py-3 fw-bold flex-grow-1 text-uppercase">
                        Mua ngay
                    </button>
                </div>
            </form>

            <div class="mt-4 pt-3 border-top text-secondary small">
                <div class="mb-2"><i class="bi bi-shield-check text-success me-2 fs-5 align-middle"></i> Cam kết hàng chính hãng 100%</div>
                <div class="mb-2"><i class="bi bi-truck text-primary me-2 fs-5 align-middle"></i> Miễn phí giao hàng cho đơn từ 500k</div>
                <div><i class="bi bi-arrow-return-left text-danger me-2 fs-5 align-middle"></i> Đổi trả dễ dàng trong vòng 7 ngày</div>
            </div>
        </div>
    </div>

    <!-- Tab Thông tin chi tiết -->
    <div class="bg-white p-4 shadow-sm rounded mb-5">
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark fw-bold" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">MÔ TẢ SẢN PHẨM</button>
            </li>
        </ul>
        <div class="tab-content text-secondary" id="myTabContent" style="line-height: 1.8;">
            <div class="tab-pane fade show active" id="desc" role="tabpanel">
                <?php echo nl2br(htmlspecialchars($product['description'] ?? '')); ?>
                <?php if (!empty($product['content'])): ?>
                    <br><br>
                    <?php echo nl2br(htmlspecialchars($product['content'])); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Sản phẩm liên quan -->
    <?php if (!empty($relatedProducts)): ?>
        <h3 class="fw-bold text-uppercase border-start border-danger border-4 ps-2 mb-4">Sản phẩm liên quan</h3>
        <div class="row g-4">
            <?php foreach ($relatedProducts as $related): ?>
                <?php $relatedImage = !empty($related['image']) ? 'public/uploads/' . $related['image'] : 'public/images/no-image.png'; ?>
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="?action=product_detail&id=<?php echo $related['id']; ?>">
                            <img src="<?php echo $relatedImage; ?>" class="card-img-top object-fit-cover" height="200" alt="<?php echo htmlspecialchars($related['name']); ?>">
                        </a>
                        <div class="card-body p-2 p-md-3 text-center">
                            <a href="?action=product_detail&id=<?php echo $related['id']; ?>" class="text-decoration-none text-dark fw-semibold text-truncate d-block mb-2">
                                <?php echo htmlspecialchars($related['name']); ?>
                            </a>
                            <span class="text-danger fw-bold"><?php echo number_format($related['price'], 0, ',', '.'); ?> ₫</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>