<?= including('modules/landing/views/header'); ?>

<!--Login  area
	============================================= -->

<section class="contact-area">
    <div class="container-fluid custom-container">
        <div class="section-heading pb-30">
            <h3>Login <span>Account</span></h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-8 col-lg-6 col-xl-4">
                <div class="contact-form login-form">
                    <?php if ($success_msg) : ?>
                        <div class="alert alert-success"><?= $success_msg ?></div>
                    <?php endif ?>

                    <?php if ($error_msg) : ?>
                        <div class="alert alert-danger"><?= $error_msg ?></div>
                    <?php endif ?>
                    <form method="post" class="signin-form">
                        <?= csrf_field() ?>
                        <div class="form-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="<?= __('auth.label.username') ?>" value="<?= $old && isset($old['username']) ? $old['username'] : '' ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="<?= __('auth.label.password') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" value="LOG IN">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row end -->
    </div>
    <!-- /.container-fluid end -->
</section>
<!-- /.contact-area end -->

<section class="login-now">
    <div class="container-fluid custom-container">
        <div class="col-12">
            <span>Dont have account</span>
            <a href="<?= routeTo('landing/register') ?>" class="btn-two">Create Account</a>
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.login-now -->

<?= including('modules/landing/views/footer'); ?>