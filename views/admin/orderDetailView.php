
<div class="container-fluid pt-4 px-4">

    <div class="bg-light rounded p-4">

        <h3>Chi tiết đơn hàng</h3>

        <table class="table table-bordered mt-3">

            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($orderDetails as $item): ?>

                <tr>

                    <td width="120">
                        <img src="<?= $item['image'] ?>"
                             width="80">
                    </td>

                    <td>
                        <?= $item['name'] ?>
                    </td>

                    <td>
                        <?= $item['qty'] ?>
                    </td>

                    <td>
                        <?= number_format($item['price']) ?> đ
                    </td>

                    <td>
                        <?= number_format($item['qty'] * $item['price']) ?> đ
                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <a href="index.php?action=admin_orders" class="btn btn-secondary">
            Quay lại
        </a>

    </div>

</div>

