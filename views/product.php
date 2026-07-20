<div class="container mt-4 mb-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?action=home" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item active text-danger" aria-current="page">Thời trang nữ</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Sidebar Lọc Sản Phẩm (Bên trái) -->
        <div class="col-lg-3 d-none d-lg-block mb-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold text-uppercase border-bottom-0 pt-3 pb-0">
                    Danh mục sản phẩm
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 px-0"><a href="#" class="text-decoration-none text-danger fw-semibold">Thời trang nữ (152)</a></li>
                        <li class="list-group-item border-0 px-0"><a href="#" class="text-decoration-none text-dark">Thời trang nam (98)</a></li>
                        <li class="list-group-item border-0 px-0"><a href="#" class="text-decoration-none text-dark">Phụ kiện (45)</a></li>
                        <li class="list-group-item border-0 px-0"><a href="#" class="text-decoration-none text-dark">Giày dép (67)</a></li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold text-uppercase border-bottom-0 pt-3 pb-0">
                    Mức giá
                </div>
                <div class="card-body">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="price1">
                        <label class="form-check-label text-secondary" for="price1">Dưới 200.000đ</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="price2" checked>
                        <label class="form-check-label text-secondary" for="price2">200.000đ - 500.000đ</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="price3">
                        <label class="form-check-label text-secondary" for="price3">Trên 500.000đ</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột Danh sách sản phẩm (Bên phải) -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-uppercase fw-bold border-start border-danger border-4 ps-2 mb-0">Thời Trang Nữ</h2>
                <select class="form-select w-auto shadow-sm">
                    <option>Sắp xếp: Mới nhất</option>
                    <option>Giá: Thấp đến cao</option>
                    <option>Giá: Cao xuống thấp</option>
                    <option>Bán chạy nhất</option>
                </select>
            </div>

            <div class="row g-4 mb-5">
                <?php
                // Tăng lên 8 sản phẩm cho đẹp đội hình
                $products = [
                    ['id' => 1, 'name' => 'Áo kiểu cổ bẻ tay thanh lịch', 'price' => 150000, 'old_price' => 200000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-co-be__12__b045e2e8d11d43e79c18297502051546_1024x1024.jpg', 'badge' => '-25%'],
                    ['id' => 2, 'name' => 'Áo cotton cổ tròn tay cộc dáng suông', 'price' => 250000, 'old_price' => 0, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-cotton-co-tron-tay-coc__3__3822b10c43d945819b4816fd54d4ba66_1024x1024.jpg', 'badge' => 'New'],
                    ['id' => 3, 'name' => 'Áo thun cotton in hình trái cây dễ thương', 'price' => 350000, 'old_price' => 450000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-thun-cotton-tay-coc__8__9374ebfac92042c097e4b64f218ee69f_1024x1024.jpg', 'badge' => 'Hot'],
                    ['id' => 4, 'name' => 'Áo linen suông kiểu cổ và gấu kết ren', 'price' => 490000, 'old_price' => 0, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-kieu-co__1__9417a47a2505413caff7cdf8dfe3fbf1_1024x1024.jpg', 'badge' => ''],
                    ['id' => 5, 'name' => 'Chân váy xếp ly dáng chữ A trẻ trung', 'price' => 220000, 'old_price' => 300000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-thun-cotton-tay-coc__8__9374ebfac92042c097e4b64f218ee69f_1024x1024.jpg', 'badge' => '-20%'],
                    ['id' => 6, 'name' => 'Đầm maxi hoa nhí dáng dài mùa hè', 'price' => 550000, 'old_price' => 0, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-co-be__12__b045e2e8d11d43e79c18297502051546_1024x1024.jpg', 'badge' => 'New'],
                    ['id' => 7, 'name' => 'Áo sơ mi lụa công sở cao cấp mềm mại', 'price' => 390000, 'old_price' => 0, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-kieu-co__1__9417a47a2505413caff7cdf8dfe3fbf1_1024x1024.jpg', 'badge' => ''],
                    ['id' => 8, 'name' => 'Quần âu nữ ống suông lưng cao tôn dáng', 'price' => 420000, 'old_price' => 550000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-cotton-co-tron-tay-coc__3__3822b10c43d945819b4816fd54d4ba66_1024x1024.jpg', 'badge' => '-15%']
                ];

                if (count($products) > 0):
                    foreach ($products as $product): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <?php if (!empty($product['badge'])): ?>
                                    <span class="badge bg-danger position-absolute top-0 end-0 m-2 z-1"><?php echo $product['badge']; ?></span>
                                <?php endif; ?>
                                
                                <a href="?action=product_detail&id=<?php echo $product['id']; ?>">
                                    <img src="<?php echo $product['image']; ?>" class="card-img-top object-fit-cover" height="250" alt="<?php echo $product['name']; ?>">
                                </a>
                                
                                <div class="card-body d-flex flex-column p-3">
                                    <a href="?action=product_detail&id=<?php echo $product['id']; ?>" class="text-decoration-none text-dark fw-semibold mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        <?php echo htmlspecialchars($product['name']); ?>
                                    </a>
                                    
                                    <div class="mt-auto">
                                        <span class="text-danger fw-bold fs-6"><?php echo number_format($product['price'], 0, ',', '.'); ?> ₫</span>
                                        <?php if ($product['old_price'] > 0): ?>
                                            <span class="text-muted text-decoration-line-through ms-1" style="font-size: 0.8rem;">
                                                <?php echo number_format($product['old_price'], 0, ',', '.'); ?> ₫
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="card-footer bg-white border-top-0 p-3 pt-0">
                                    <form action="?action=cart_add" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-outline-danger w-100 fw-bold py-2">
                                            Thêm vào giỏ
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>

            <!-- Phân trang (Pagination) -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item disabled"><a class="page-link text-secondary" href="#">Trước</a></li>
                    <li class="page-item active"><a class="page-link bg-danger border-danger" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-danger" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-danger" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-danger" href="#">Sau</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>