<!-- Extend from layout index -->
<?= $this->extend('agungsugiarto\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Payment Confirmation</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ordered_services as $index => $service) {
                    ?>
                        <tr>
                            <td><?php echo $service['id']; ?></td>
                            <td><?php echo $service['name']; ?></td>
                            <td><?php echo '$' . number_format($service['price'], 2); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="2"><strong>Total:</strong></td>
                        <td><strong><?php echo '$' . number_format($order['total_price'], 2); ?></strong></td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col">
                    <h4>User Details</h4>
                    <p><strong>User ID:</strong> <?php echo $order['user_id']; ?></p>
                </div>
                <div class="col">
                    <h4>Total Price</h4>
                    <p><strong>Total:</strong> <?php echo '$' . number_format($order['total_price'], 2); ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>