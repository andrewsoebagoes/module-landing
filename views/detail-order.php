<?= including('modules/landing/views/header'); ?>

<section class="account-area">
    <div class="container-fluid custom-container">
        <a href="<?= routeTo('landing/account'); ?>" class="mb-3 btn btn-sm btn-danger"><i class="fas fa-angle-left"></i> Back</a>
        <?php if ($success_msg) : ?>
            <div class="alert alert-success"><?= $success_msg ?></div>
        <?php endif ?>

        <?php if ($error_msg) : ?>
            <div class="alert alert-danger"><?= $error_msg ?></div>
        <?php endif ?>
        <div class="mt-4 ">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-1 col-form-label"><strong>Invoice</strong></label>
                <div class="col-sm-11">
                    <span class="form-control-plaintext"><?= $invoice[0]->code; ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-1 col-form-label"><strong>Status</strong></label>
                <div class="col-sm-11">

                    <span class="form-control-plaintext"><?= $invoice[0]->status ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-1 col-form-label"><strong>Total Amount</strong></label>
                <div class="col-sm-11">
                    <span class="form-control-plaintext">Rp. <?= number_format($invoice[0]->total_amount); ?></span>
                </div>
            </div>
            <?php if ($invoice[0]->image) : ?>
                <a href="<?=routeTo($invoice[0]->image)?>" target="_blank">Lihat Bukti Pembayaran</a>
                <?php else : ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <label for="staticEmail" class="form-label"><strong>Upload Bukti Pembayaran</strong></label><br>
                    <input type="file" name="media" id="media" class=""><br>
                    <button type="submit" class="mt-3 btn btn-sm btn-primary">Upload</button>
                </form>
            <?php endif  ?>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="account-table">
                    <h6>Order History</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Item Type</th>
                                <th>Quantity</th>
                                <th>Item Price</th>
                                <th>Total Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoice as $data) : ?>
                                <tr style="text-align: left;">
                                    <td><?= $data->name; ?></td>
                                    <td><?= $data->item_type; ?></td>
                                    <td><?= $data->quantity; ?></td>
                                    <td><?= number_format($data->item_price); ?></td>
                                    <td><?= number_format($data->total_price); ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>

                </div>
                <!-- /.cart-table -->
            </div>
            <!-- /.col-xl-9 -->

        </div>
    </div>
</section>


<?= including('modules/landing/views/footer'); ?>