<?= including('modules/landing/views/header'); ?>

<section class="account-area">
	<div class="container-fluid custom-container">
		<div class="row">
			<div class="col-xl-3">
				<div class="account-details">
					<p>Account</p>
					<ul>
						<li><?= auth()->name ?></li>
						<li><?= auth()->username; ?></li>

					</ul>
				</div>
				<!-- /.cart-subtotal -->
			</div>
			<!-- /.col-xl-3 -->
			<div class="col-xl-9">
				<div class="account-table">
					<h6>Order History</h6>
					<table class="table">
						<thead>
							<tr>
								<th>Invoice</th>
								<th>Total Amount </th>
								<th>Status</th>
								<th>Create At</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $data) : ?>
								<tr style="text-align: left;">
									<td><?= $data->code; ?></td>
									<td><?= number_format($data->total_amount); ?></td>
									<td><?= $data->status; ?></td>
									<td><?= $data->created_at; ?></td>
									<td><a href="<?=routeTo('landing/detail-order?invoice_id='. $data->id)?>" class="btn btn-sm btn-success text-white">Detail</a></td>
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