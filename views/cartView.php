<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        <i class="bi bi-cart3"></i>
        Shopping Cart
    </h2>

    <div class="row">

        <!-- Product List -->
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <!-- Item -->
                    <div class="row align-items-center border-bottom py-3">

                        <div class="col-md-2">
                            <img src="https://picsum.photos/100"
                                class="img-fluid rounded">
                        </div>

                        <div class="col-md-4">
                            <h5>Wireless Headphone</h5>
                            <small class="text-muted">
                                Color: Black
                            </small>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">

                                <button class="btn btn-outline-secondary">
                                    -
                                </button>

                                <input type="text"
                                    class="form-control text-center"
                                    value="1">

                                <button class="btn btn-outline-secondary">
                                    +
                                </button>

                            </div>
                        </div>

                        <div class="col-md-2 text-center">
                            <strong>$120</strong>
                        </div>

                        <div class="col-md-2 text-end">
                            <button class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>

                    </div>

                    <!-- Item -->
                    <div class="row align-items-center border-bottom py-3">

                        <div class="col-md-2">
                            <img src="https://picsum.photos/101"
                                class="img-fluid rounded">
                        </div>

                        <div class="col-md-4">
                            <h5>Smart Watch</h5>
                            <small class="text-muted">
                                Color: Silver
                            </small>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">

                                <button class="btn btn-outline-secondary">
                                    -
                                </button>

                                <input type="text"
                                    class="form-control text-center"
                                    value="2">

                                <button class="btn btn-outline-secondary">
                                    +
                                </button>

                            </div>
                        </div>

                        <div class="col-md-2 text-center">
                            <strong>$240</strong>
                        </div>

                        <div class="col-md-2 text-end">
                            <button class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Summary -->
        <div class="col-lg-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h4 class="mb-4">
                        Order Summary
                    </h4>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <strong>$360</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <strong>$10</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Discount</span>
                        <strong class="text-success">-$20</strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">

                        <h5>Total</h5>

                        <h5 class="text-danger">
                            $350
                        </h5>

                    </div>

                    <input
                        class="form-control mb-3"
                        placeholder="Coupon Code">

                    <button class="btn btn-outline-primary w-100 mb-3">
                        Apply Coupon
                    </button>

                    <button class="btn btn-success w-100">
                        Proceed to Checkout
                    </button>

                </div>

            </div>

        </div>

    </div>

    <div class="mt-4">

        <a href="#" class="btn btn-outline-dark">
            <i class="bi bi-arrow-left"></i>
            Continue Shopping
        </a>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>