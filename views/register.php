<?= including('modules/landing/views/header'); ?>

<section class="contact-area">
			<div class="container-fluid custom-container">
				<div class="section-heading pb-30">
					<h3>Create <span>Account</span></h3>
				</div>
				<div class="row justify-content-center">
					<div class="col-sm-9 col-md-8 col-lg-6 col-xl-4">
						<div class="contact-form login-form">
							<form action="" method="POST">
								<?=csrf_field();?>
								<div class="row">
									
									<div class="col-xl-12">
										<input type="text" name="name" placeholder="Name">
									</div>
									<div class="col-xl-12">
										<input type="text" name="username" placeholder="Username">
									</div>
									<div class="col-xl-12">
										<input type="text" name="password" placeholder="Password*">
									</div>
									<div class="col-xl-12">
										<input type="submit" value="CREATE">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.row end -->
			</div>
			<!-- /.container-fluid end -->
		</section>
        <?=including('modules/landing/views/footer');?>