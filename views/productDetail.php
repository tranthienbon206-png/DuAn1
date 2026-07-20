<div class="container mt-4 mb-5">
    <?php
    // Mô phỏng lấy chi tiết sản phẩm
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1; // Mặc định là 1 nếu không có ID
    $productDetail = [
        'id' => $id, 
        'name' => 'Áo kiểu cổ bẻ tay thanh lịch cao cấp', 
        'price' => 150000, 
        'old_price' => 200000, 
        'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-co-be__12__b045e2e8d11d43e79c18297502051546_1024x1024.jpg', 
        'desc' => 'Áo thiết kế cổ bẻ thanh lịch, chất liệu linen cao cấp thấm hút mồ hôi. Phù hợp mặc đi làm, đi chơi. Đường may tỉ mỉ, form chuẩn tôn dáng. Giặt máy thoải mái không lo phai màu.'
    ];
    ?>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?action=home" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="?action=product" class="text-decoration-none text-dark">Thời trang nữ</a></li>
            <li class="breadcrumb-item active text-danger" aria-current="page"><?php echo htmlspecialchars($productDetail['name']); ?></li>
        </ol>
    </nav>

    <!-- Khung thông tin chính -->
    <div class="row bg-white p-3 p-md-4 shadow-sm rounded mb-5">
        <!-- Cột Trái: Ảnh chính + Ảnh thu nhỏ -->
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="border rounded p-1 mb-3 text-center">
                <img src="<?php echo $productDetail['image']; ?>" class="img-fluid w-100 rounded object-fit-cover" alt="Ảnh chính">
            </div>
            <!-- Thumbnails mô phỏng -->
            <div class="d-flex justify-content-between gap-2">
                <img src="<?php echo $productDetail['image']; ?>" class="img-fluid border border-danger rounded" style="width: 23%; object-fit: cover; cursor: pointer;" alt="thumb">
                <img src="<?php echo $productDetail['image']; ?>" class="img-fluid border rounded opacity-50" style="width: 23%; object-fit: cover; cursor: pointer;" alt="thumb">
                <img src="<?php echo $productDetail['image']; ?>" class="img-fluid border rounded opacity-50" style="width: 23%; object-fit: cover; cursor: pointer;" alt="thumb">
                <img src="<?php echo $productDetail['image']; ?>" class="img-fluid border rounded opacity-50" style="width: 23%; object-fit: cover; cursor: pointer;" alt="thumb">
            </div>
        </div>
        
        <!-- Cột Phải: Form đặt hàng -->
        <div class="col-md-7 ps-md-5">
            <h2 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($productDetail['name']); ?></h2>
            <div class="d-flex align-items-center mb-3">
                <span class="text-warning me-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></span>
                <span class="text-muted fs-6 border-start ps-2">128 Đánh giá | 432 Đã bán</span>
            </div>

            <!-- Giá -->
            <div class="bg-light rounded p-3 mb-4">
                <span class="text-danger fw-bold fs-2"><?php echo number_format($productDetail['price'], 0, ',', '.'); ?> ₫</span>
                <?php if ($productDetail['old_price'] > 0): ?>
                    <span class="text-muted text-decoration-line-through fs-5 ms-3"><?php echo number_format($productDetail['old_price'], 0, ',', '.'); ?> ₫</span>
                    <span class="badge bg-danger ms-3 align-middle">-25% GIẢM</span>
                <?php endif; ?>
            </div>

            <form action="?action=cart_add" method="POST">
                <input type="hidden" name="id" value="<?php echo $productDetail['id']; ?>">
                
                <!-- Chọn Size -->
                <div class="mb-4">
                    <p class="fw-bold mb-2">Kích thước:</p>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="size" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-dark px-4" for="btnradio1">S</label>

                        <input type="radio" class="btn-check" name="size" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-dark px-4" for="btnradio2">M</label>

                        <input type="radio" class="btn-check" name="size" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-dark px-4" for="btnradio3">L</label>
                    </div>
                </div>

                <!-- Số lượng & Nút Mua -->
                <div class="d-flex align-items-center mb-4 gap-3">
                    <div class="border rounded d-flex bg-white">
                        <button type="button" class="btn btn-light border-0 px-3 py-2">-</button>
                        <input type="number" name="quantity" class="form-control border-0 text-center shadow-none p-0" value="1" min="1" max="50" style="width: 50px;">
                        <button type="button" class="btn btn-light border-0 px-3 py-2">+</button>
                    </div>
                    <span class="text-muted">Kho: 125 sản phẩm</span>
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

    <!-- Tab Thông tin chi tiết & Đánh giá -->
    <div class="bg-white p-4 shadow-sm rounded mb-5">
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark fw-bold" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">MÔ TẢ SẢN PHẨM</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark fw-bold" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab">ĐÁNH GIÁ (128)</button>
            </li>
        </ul>
        <div class="tab-content text-secondary" id="myTabContent" style="line-height: 1.8;">
            <div class="tab-pane fade show active" id="desc" role="tabpanel">
                <?php echo htmlspecialchars($productDetail['desc']); ?>
                <br><br>
                <strong>Hướng dẫn bảo quản:</strong>
                <ul>
                    <li>Giặt máy ở chế độ nhẹ nhàng, nhiệt độ thường.</li>
                    <li>Không sử dụng hóa chất tẩy rửa mạnh.</li>
                    <li>Phơi trong bóng râm, tránh ánh nắng trực tiếp.</li>
                    <li>Là ủi ở nhiệt độ thấp.</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel">
                <div class="alert alert-light border">
                    <strong>Nguyễn Văn A</strong> <span class="text-warning ms-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                    <p class="mb-0 mt-2">Áo rất đẹp, chất vải mát, mặc đi làm ai cũng khen. Sẽ ủng hộ shop tiếp!</p>
                </div>
                <div class="alert alert-light border">
                    <strong>Trần Thị B</strong> <span class="text-warning ms-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></span>
                    <p class="mb-0 mt-2">Giao hàng nhanh đóng gói cẩn thận. Màu sắc y hình nhưng form hơi rộng so với mình xíu.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sản phẩm liên quan -->
    <h3 class="fw-bold text-uppercase border-start border-danger border-4 ps-2 mb-4">Sản phẩm liên quan</h3>
    <div class="row g-4">
        <!-- Khối này mô phỏng 4 sản phẩm bên dưới -->
        <?php for($i=1; $i<=4; $i++): ?>
        <div class="col-6 col-md-3">
            <div class="card h-100 shadow-sm border-0">
                <a href="#"><img src="https://cdn.hstatic.net/products/200000503583/ao-cotton-co-tron-tay-coc__3__3822b10c43d945819b4816fd54d4ba66_1024x1024.jpg" class="card-img-top object-fit-cover" height="200" alt="..."></a>
                <div class="card-body p-2 p-md-3 text-center">
                    <a href="#" class="text-decoration-none text-dark fw-semibold text-truncate d-block mb-2">Áo thun nữ mẫu <?php echo $i; ?></a>
                    <span class="text-danger fw-bold">250.000 ₫</span>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>