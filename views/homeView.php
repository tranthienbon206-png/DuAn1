<!-- Hero Banner -->
<div id="heroBanner" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://pos.nvncdn.com/790194-223281/bn/20260618_47fWpvsE.jpg?v=1781778706" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="https://pos.nvncdn.com/790194-223281/bn/20260702_rTmJZIHi.jpg?v=1782983261" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="https://pos.nvncdn.com/790194-223281/bn/20260604_mNtdARlT.jpg?v=1780558363" class="d-block w-100" alt="">
        </div>
    </div>
    <button class="carousel-control-prev" data-bs-target="#heroBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" data-bs-target="#heroBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<!-- Categories -->
<div class="container mb-5">
    <h2 class="text-center brand-font fw-bold mb-4">Danh mục nổi bật</h2>
    <div class="category-grid">
        <?php foreach ($categories as $cat): ?>
            <div>
                <div class="card border-0 shadow-sm">
                    <img src="<?= !empty($cat['image']) ? 'public/uploads/' . $cat['image'] : 'public/images/no-image.png' ?>"
                        class="card-img-top" style="height:220px;object-fit:cover;">
                    <div class="card-body text-center">
                        <h5><?= htmlspecialchars($cat['name']) ?></h5>
                        <small class="text-muted"><?= $cat['productCount'] ?> sản phẩm</small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- New Arrival -->
<div class="container mb-5">
    <h2 class="text-center fw-bold mb-4">Sản phẩm mới</h2>
    <div class="row g-4">
        <?php
        $count = 0;
        while (($product = $result->fetch(PDO::FETCH_ASSOC)) && $count < 4):
            $count++;
        ?>
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 shadow-sm">
                    <img src="<?= !empty($product['image']) ? 'public/uploads/' . $product['image'] : 'public/images/no-image.png' ?>"
                        class="card-img-top" style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($product['name']) ?></h5>
                        <?php if ($product['sale_price'] > 0): ?>
                            <p class="text-danger fw-bold fs-5 mb-1">
                                <?= number_format($product['sale_price'], 0, ',', '.') ?> đ
                                <small class="text-muted text-decoration-line-through fs-6">
                                    <?= number_format($product['price'], 0, ',', '.') ?> đ
                                </small>
                            </p>
                        <?php else: ?>
                            <p class="text-danger fw-bold fs-5"><?= number_format($product['price'], 0, ',', '.') ?> đ</p>
                        <?php endif; ?>
                        <a href="?action=product_detail&id=<?= $product['id'] ?>" class="btn btn-dark w-100">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Promotion Banner -->
<div class="container mb-5">
    <div class="bg-dark text-white rounded p-5 text-center">
        <h1 class="fw-bold">SUMMER SALE</h1>
        <p class="fs-5">Up To 50% OFF Selected Items</p>
        <a href="?action=product" class="btn btn-light px-4">Mua ngay</a>
    </div>
</div>

<!-- Customer Reviews -->
<div class="container mb-5">
    <h2 class="text-center fw-bold mb-4">Customer Reviews</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>⭐⭐⭐⭐⭐</h5>
                    <p>Beautiful clothes, fast delivery and very good quality.</p>
                    <strong>Anna</strong>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>⭐⭐⭐⭐⭐</h5>
                    <p>Excellent service. Will definitely buy again.</p>
                    <strong>Jessica</strong>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>⭐⭐⭐⭐⭐</h5>
                    <p>The products are exactly like the pictures.</p>
                    <strong>Sophia</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->
<div class="bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold">Subscribe To Our Newsletter</h2>
        <p class="text-muted">Get the latest fashion trends and exclusive offers.</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" placeholder="Enter your email">
                    <button class="btn btn-dark">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div>