<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách Sản phẩm</title>
    <!-- Link CSS Bootstrap 5.3.8 theo yêu cầu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center mb-5">Danh Sách Sản Phẩm</h1>
        <div class="row">
        
            <?php
         
            if (!isset($products)) {
                $products = [
                    ['id' => 1, 'name' => 'Áo kiểu cổ bẻ tay', 'price' => 150000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-co-be__12__b045e2e8d11d43e79c18297502051546_1024x1024.jpg'],
                    ['id' => 2, 'name' => 'Áo cotton cổ tròn tay cộc dáng suông', 'price' => 250000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-cotton-co-tron-tay-coc__3__3822b10c43d945819b4816fd54d4ba66_1024x1024.jpg'],
                    ['id' => 3, 'name' => 'Áo thun cotton tay cộc cổ tròn hình in trái cây', 'price' => 350000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-thun-cotton-tay-coc__8__9374ebfac92042c097e4b64f218ee69f_1024x1024.jpg'],
                    ['id' => 4, 'name' => 'Áo linen suông kiểu cổ và gấu kết ren', 'price' => 490,000, 'image' => 'https://cdn.hstatic.net/products/200000503583/ao-linen-kieu-co__1__9417a47a2505413caff7cdf8dfe3fbf1_1024x1024.jpg'],
                ];
            }
            ?>

            <?php if (isset($products) && is_array($products) && count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text text-danger fw-bold">
                                    <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top-0">
                                <a href="#" class="btn btn-outline-primary w-100">Xem chi tiết</a>
                                <a href="" class="btn btn-primary w-100 mt-2">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        Hiện chưa có sản phẩm nào!
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>