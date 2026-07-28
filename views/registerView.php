<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">

                <div class="card shadow">

                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">
                            Đăng ký
                        </h2>

                        <form action="?action=register" method="POST">

                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label">Họ tên</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="<?= $_POST['name'] ?? '' ?>"
                                    placeholder="Nhập họ tên">

                                <?php if(isset($_SESSION['register_name'])): ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['register_name']; ?>
                                    </small>
                                    <?php unset($_SESSION['register_name']); ?>
                                <?php endif; ?>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>

                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="<?= $_POST['email'] ?? '' ?>"
                                    placeholder="Nhập email">

                                <?php if(isset($_SESSION['register_email'])): ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['register_email']; ?>
                                    </small>
                                    <?php unset($_SESSION['register_email']); ?>
                                <?php endif; ?>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>

                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="Nhập mật khẩu">

                                <?php if(isset($_SESSION['register_password'])): ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['register_password']; ?>
                                    </small>
                                    <?php unset($_SESSION['register_password']); ?>
                                <?php endif; ?>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label class="form-label">Xác nhận mật khẩu</label>

                                <input
                                    type="password"
                                    class="form-control"
                                    name="confirm_password"
                                    placeholder="Xác nhận mật khẩu">

                                <?php if(isset($_SESSION['register_confirm'])): ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['register_confirm']; ?>
                                    </small>
                                    <?php unset($_SESSION['register_confirm']); ?>
                                <?php endif; ?>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="address"
                                    value="<?= $_POST['address'] ?? '' ?>"
                                    placeholder="Nhập địa chỉ">

                                <?php if(isset($_SESSION['register_address'])): ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['register_address']; ?>
                                    </small>
                                    <?php unset($_SESSION['register_address']); ?>
                                <?php endif; ?>
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="phone"
                                    value="<?= $_POST['phone'] ?? '' ?>"
                                    placeholder="Nhập số điện thoại">

                                <?php if(isset($_SESSION['register_phone'])): ?>
                                    <small class="text-danger">
                                        <?= $_SESSION['register_phone']; ?>
                                    </small>
                                    <?php unset($_SESSION['register_phone']); ?>
                                <?php endif; ?>
                            </div>

                            <button class="btn btn-dark w-100">
                                Đăng ký
                            </button>

                        </form>

                        <hr>

                        <p class="text-center mb-0">
                            Đã có tài khoản?

                            <a href="?action=login">
                                Đăng nhập
                            </a>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>