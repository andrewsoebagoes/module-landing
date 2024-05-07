<?= including('modules/landing/views/header');;?>

<section class="cart-area">
			<div class="container-fluid custom-container">
				<div class="row">
					<div class="col-xl-9">
						<div class="cart-table">
							<table class="tables">
								<thead>
									<tr>
										<th></th>
										<th>Image</th>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>unit price</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<a href="#">X</a>
										</td>
										<td>
											<a href="#">
												<div class="product-image">
													<img alt="Stylexpo" src="media/images/product/cp1.jpg">
												</div>
											</a>
										</td>
										<td>
											<div class="product-title">
												<a href="#">Cross Colours Camo Print Tank half mengo</a>
											</div>
										</td>
										<td>
											<div class="quantity">
												<input type="number" value="0">
											</div>
										</td>
										<td>
											<ul>
												<li>
													<div class="price-box">
														<span class="price">$387 x 2</span>
													</div>
												</li>
											</ul>
										</td>
										<td>
											<div class="total-price-box">
												<span class="price">$774</span>
											</div>
										</td>

									</tr>
									<!-- /.single product  -->
									<tr>
										<td>
											<a href="#">X</a>
										</td>
										<td>
											<a href="#">
												<div class="product-image">
													<img alt="Stylexpo" src="media/images/product/cp2.jpg">
												</div>
											</a>
										</td>
										<td>
											<div class="product-title">
												<a href="#">Cross Colours Camo Print Tank half mengo</a>
											</div>
										</td>

										<td>
											<div class="quantity">
												<input type="number" value="0">
											</div>
										</td>
										<td>
											<ul>
												<li>
													<div class="price-box">
														<span class="price">$387 x 1</span>
													</div>
												</li>
											</ul>
										</td>
										<td>
											<div class="total-price-box">
												<span class="price">$387</span>
											</div>
										</td>

									</tr>
									<!-- /.single product  -->
									<tr>
										<td>
											<a href="#">X</a>
										</td>
										<td>
											<a href="#">
												<div class="product-image">
													<img alt="Stylexpo" src="media/images/product/cp2.jpg">
												</div>
											</a>
										</td>
										<td>
											<div class="product-title">
												<a href="#">Cross Colours Camo Print Tank half mengo</a>
											</div>
										</td>

										<td>
											<div class="quantity">
												<input type="number" value="0">
											</div>
										</td>
										<td>
											<ul>
												<li>
													<div class="price-box">
														<span class="price">$387 x 1</span>
													</div>
												</li>
											</ul>
										</td>
										<td>
											<div class="total-price-box">
												<span class="price">$387</span>
											</div>
										</td>

									</tr>
									<!-- /.single product  -->
								</tbody>
							</table>

						</div>
						<!-- /.cart-table -->
						<div class="row cart-btn-section">
							<div class="col-12 col-sm-8 col-lg-6">
								<div class="cart-btn-left">
									<a class="coupon-code" href="#">Coupon Code</a>
									<a href="#">Apply Coupon</a>
								</div>
							</div>
							<!-- /.col-xl-6 -->
							<div class="col-12 col-sm-4 col-lg-6">
								<div class="cart-btn-right">
									<a href="#">Update Cart</a>
								</div>
							</div>
							<!-- /.col-xl-6 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.col-xl-9 -->
					<div class="col-xl-3">
						<div class="cart-subtotal">
							<p>SUBTOTAL</p>
							<ul>
								<li><span>Sub-Total:</span>$1161.00</li>
								<li><span>Tax (-4.00):</span>$11.00</li>
								<li><span>Shipping Cost:</span>$00.00</li>
								<li><span>TOTAL:</span>$1172.00</li>
							</ul>
							<div class="note">
								<span>Order Note :</span>
								<textarea></textarea>
							</div>
							<a href="#">Proceed To Checkout</a>
						</div>
						<!-- /.cart-subtotal -->


					</div>
					<!-- /.col-xl-3 -->
				</div>
			</div>
		</section>

  <?=including('modules/landing/views/footer');?>