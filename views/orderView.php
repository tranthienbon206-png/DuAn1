<form action="index.php?action=order" method="post">
    <div class="container py-5">

    <h2 class="text-center mb-4">Thanh Toán Đơn Hàng</h2>

    <div class="row">

        <!-- Thông tin khách hàng -->
        <div class="col-lg-7">

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    Thông tin khách hàng
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" value="<?php if (isset($_POST['customer_name'])) echo $_POST['customer_name']; ?>" name="customer_name" placeholder="Nhập họ tên">
                        <small class="text-danger"><?php
                        if (isset($_SESSION['customer_name'])) {
                            echo $_SESSION['customer_name'];
                            unset($_SESSION['customer_name']);
                        }?></small>
                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"name="phone" placeholder="09xxxxxxxx">
                        <small class="text-danger"><?php
                        if (isset($_SESSION['phone'])) {
                            echo $_SESSION['phone'];
                            unset($_SESSION['phone']);
                        }?></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" name="email">
                        <small class="text-danger"><?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                            unset($_SESSION['email']);
                        }?></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa chỉ nhận hàng</label>
                        <textarea class="form-control" rows="3" name="address"><?php if (isset($_POST['address'])) echo $_POST['address']; ?></textarea>
                        <small class="text-danger"><?php
                        if (isset($_SESSION['address'])) {
                            echo $_SESSION['address'];
                            unset($_SESSION['address']);
                        }?></small>
                    </div>

                </div>
            </div>

            <div class="card shadow-sm">

                <div class="card-header bg-success text-white">
                    Phương thức thanh toán
                </div>

                <div class="card-body">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" checked>
                        <label class="form-check-label">
                            Thanh toán khi nhận hàng (COD)
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment">
                        <label class="form-check-label">
                            Chuyển khoản ngân hàng
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment">
                        <label class="form-check-label">
                            Ví điện tử
                        </label>
                    </div>

                </div>

            </div>

        </div>

        <!-- Đơn hàng -->
        <div class="col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">
                    Đơn hàng của bạn
                </div>

                <div class="card-body">

                    <table class="table align-middle">

                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>SL</th>
                            <th>Giá</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                <img src="https://placehold.co/60x60"
                                     class="rounded me-2">
                                Gấu bông Teddy
                            </td>
                            <td>2</td>
                            <td>300.000đ</td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://placehold.co/60x60"
                                     class="rounded me-2">
                                Xe điều khiển
                            </td>
                            <td>1</td>
                            <td>450.000đ</td>
                        </tr>

                        </tbody>

                    </table>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span>Tạm tính</span>
                        <strong>750.000đ</strong>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <span>Phí vận chuyển</span>
                        <strong>30.000đ</strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fs-5">
                        <strong>Tổng cộng</strong>
                        <strong class="text-danger">780.000đ</strong>
                    </div>

                    <button type="submit" name="submit" value="Đặt hàng" class="btn btn-danger w-100 mt-4">
                        Đặt hàng
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

</form>
