<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">

                <div class="card shadow">

                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">
                            Đăng nhập
                        </h2>

                        <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success']; ?>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['login_error'])) : ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['login_error']; ?>
                            </div>
                            <?php unset($_SESSION['login_error']); ?>
                        <?php endif; ?>

                        <form action="?action=login" method="POST">

                            <div class="mb-3">
                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Nhập Email"
                                    value="<?= $_POST['email'] ?? '' ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Mật khẩu
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Nhập mật khẩu">
                            </div>

                            <button class="btn btn-dark w-100" type="submit">
                                Đăng nhập
                            </button>

                        </form>

                        <hr>

                        <p class="text-center mb-0">

                            Chưa có tài khoản?

                            <a href="?action=register">
                                Đăng ký ngay
                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>