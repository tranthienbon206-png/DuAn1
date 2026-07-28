

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

                    <form action="index.php?action=contact" method="post">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="full_name"
                                       value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>"
                                       placeholder="Nhập họ tên">
                                <small class="text-danger">
                                    <?php
                                    if (isset($_SESSION['contact_full_name'])) {
                                        echo $_SESSION['contact_full_name'];
                                        unset($_SESSION['contact_full_name']);
                                    }
                                    ?>
                                </small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"
                                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                       placeholder="example@gmail.com">
                                <small class="text-danger">
                                    <?php
                                    if (isset($_SESSION['contact_email'])) {
                                        echo $_SESSION['contact_email'];
                                        unset($_SESSION['contact_email']);
                                    }
                                    ?>
                                </small>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone"
                                   value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                                   placeholder="09xxxxxxxx">
                            <small class="text-danger">
                                <?php
                                if (isset($_SESSION['contact_phone'])) {
                                    echo $_SESSION['contact_phone'];
                                    unset($_SESSION['contact_phone']);
                                }
                                ?>
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Chủ đề</label>
                            <input type="text" class="form-control" name="subject"
                                   value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>"
                                   placeholder="Nhập chủ đề">
                            <small class="text-danger">
                                <?php
                                if (isset($_SESSION['contact_subject'])) {
                                    echo $_SESSION['contact_subject'];
                                    unset($_SESSION['contact_subject']);
                                }
                                ?>
                            </small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội dung</label>
                            <textarea class="form-control" name="message" rows="6"
                                      placeholder="Nhập nội dung..."><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                            <small class="text-danger">
                                <?php
                                if (isset($_SESSION['contact_message'])) {
                                    echo $_SESSION['contact_message'];
                                    unset($_SESSION['contact_message']);
                                }
                                ?>
                            </small>
                        </div>

                        <button type="submit" class="btn btn-success">
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

