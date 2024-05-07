<?= including('modules/landing/views/header'); ?>

<section class="shop-area style-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <!-- Product View Slider -->
                        <div class="quickview-slider">
                            <div class="slider-for">
                                <?php foreach ($products as $image) : ?>
                                    <div class="">
                                        <img src="<?= asset($image->image) ?>" alt="Thumb">
                                    </div>
                                <?php endforeach ?>

                            </div>

                            <div class="slider-nav">

                            <?php foreach ($products as $image) : ?>
                                    <div class="">
                                        <img src="<?= asset($image->image) ?>" alt="Thumb">
                                    </div>
                                <?php endforeach ?>

                            </div>
                        </div>
                        <!-- /.quickview-slider -->
                    </div>
                    <!-- /.col-xl-6 -->

                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details">
                            <h5 class="pro-title"><a href="#"><?= $products[0]->product_name; ?></a></h5>
                            <span class="price">Price : Rp. <?= number_format($products[0]->price); ?></span>
                            <div class="add-tocart-wrap">
                                <!--PRODUCT INCREASE BUTTON START-->
                                <div class="cart-plus-minus-button">
                                    <input type="text" value="0" name="qtybutton" class="cart-plus-minus">
                                </div>
                                <a href="#" class="add-to-cart"><i class="flaticon-shopping-purse-icon"></i>Add to Cart</a>
                                <!-- <a href="#"><i class="flaticon-valentines-heart"></i></a> -->
                            </div>

                            <!-- <span>SKU:	N/A</span>
								<p>Tags <a href="#">boys,</a><a href="#"> dress,</a><a href="#">Rok-dress</a></p> -->

                            <p>
                                <?= $products[0]->description; ?>
                            </p>
                            <div class="product-social">
                                <span>Share :</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.product-details -->
                    </div>
                    <!-- /.col-xl-6 -->



                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-xl-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<?= including('modules/landing/views/footer'); ?>