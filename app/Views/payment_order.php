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

                    <!-- Add a button to open the payment modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">Proceed to Pay</button>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add this div outside the 'content' section to create the modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Silahkan transfer ke bank berikut</h3>
                <br>
                <p><strong>Bank Name:</strong> BRI</p>
                <p><strong>Account Number:</strong> 11112345838</p>
                <p><strong>Recipient Name:</strong> PT. Klinik Darah</p>
                <!-- Add other bank details as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- You can handle the payment processing when this button is clicked -->
                <button type="button" class="btn btn-primary" onclick="proceedToPay()">Proceed to Pay</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>