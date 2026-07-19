<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liên hệ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
          crossorigin="anonymous">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="text-center mb-5">
        <h2>Liên Hệ Với Chúng Tôi</h2>
        <p class="text-secondary">
            Nếu bạn có bất kỳ câu hỏi hoặc góp ý nào, hãy gửi cho chúng tôi.
        </p>
    </div>

    <div class="row g-4">

        <!-- Thông tin liên hệ -->
        <div class="col-lg-4">

            <div class="card shadow-sm h-100">

                <div class="card-header bg-primary text-white">
                    Thông Tin Liên Hệ
                </div>

                <div class="card-body">

                    <p><strong>Địa chỉ</strong></p>
                    <p>600 Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ</p>

                    <hr>

                    <p><strong>Điện thoại</strong></p>
                    <p>0123 456 789</p>

                    <hr>

                    <p><strong>Email</strong></p>
                    <p>support@example.com</p>

                    <hr>

                    <p><strong>Giờ làm việc</strong></p>
                    <p>08:00 - 17:30 (Thứ 2 - Thứ 7)</p>

                </div>

            </div>

        </div>

        <!-- Form liên hệ -->
        <div class="col-lg-8">

            <div class="card shadow-sm">

                <div class="card-header bg-success text-white">
                    Gửi Tin Nhắn
                </div>

                <div class="card-body">

                    <form>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control"
                                       placeholder="Nhập họ tên">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control"
                                       placeholder="example@gmail.com">
                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control"
                                   placeholder="09xxxxxxxx">
                        </div>

                        <div class="mb-3">
<label class="form-label">Chủ đề</label>
                            <input type="text" class="form-control"
                                   placeholder="Nhập chủ đề">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội dung</label>
                            <textarea class="form-control"
                                      rows="6"
                                      placeholder="Nhập nội dung..."></textarea>
                        </div>

                        <button class="btn btn-success">
                            Gửi liên hệ
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Google Map -->
    <div class="card shadow-sm mt-5">

        <div class="card-header bg-dark text-white">
            Bản Đồ
        </div>

        <div class="card-body p-0">

            <iframe
                src="https://www.google.com/maps?q=C%E1%BA%A7n%20Th%C6%A1&output=embed"
                width="100%"
                height="400"
                style="border:0;"
                loading="lazy">
            </iframe>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>
</html>