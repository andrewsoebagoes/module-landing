<?= including('modules/landing/views/header');;?>

        <!--=========================-->
        <!--=        Shop area          =-->
        <!--=========================-->

        <section class="shop-area">
            <div class="container-fluid custom-container">
                <div class="row">

                    <div class="col-12">
                        <div class="shop-sorting-area row">
                            <div class="col-4 col-sm-4 col-md-6">
                                <ul class="nav nav-tabs shop-btn" id="myTab" role="tablist">


                                </ul>
                            </div>
                            <!-- /.col-xl-6 -->
                            <!-- <div class="col-12 col-sm-8 col-md-6">
                                <div class="sort-by">
                                    <span>Sort by :</span>
                                    <select class="orderby" name="orderby">
                                        <option value="menu_order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option selected="selected">Best Selling</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- /.col-xl-6 -->
                        </div>
                        <!-- /.shop-sorting-area -->
                        <div class="shop-content">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <?php foreach ($products as $product) : ?>
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="sin-product style-two">
                                                    <div class="pro-img">
                                                        <img src="<?= asset($product->image) ?>" alt="">
                                                    </div>
                                                    <div class="mid-wrapper">
                                                        <h5 class="pro-title"><a href="product.html"><?= $product->product_name; ?></a></h5>
                                                        <div class="color-variation">
                                                            <ul>
                                                                <li><i class="fas fa-circle"></i></li>
                                                                <li><i class="fas fa-circle"></i></li>
                                                                <li><i class="fas fa-circle"></i></li>
                                                                <li><i class="fas fa-circle"></i></li>
                                                            </ul>
                                                        </div>
                                                        <p><span>Rp. <?= number_format($product->price); ?></span></p>
                                                    </div>
                                                    <div class="icon-wrapper">
                                                        <div class="pro-icon">
                                                            <ul>
                                                                <li><a href="<?=routeTo('landing/detail-product?product_id='.$product->id_product);?>" ><i class="flaticon-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="add-to-cart">
                                                            <a href="#">add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.sin-product -->
                                            </div>

                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                            <!-- <div class="load-more-wrapper">
                                <a href="<?=routeTo('landing/register')?>" class="btn-two">Load More</a>
                            </div> -->
                            <!-- /.load-more-wrapper -->
                        </div>
                        <!-- /.shop-content -->
                    </div>
                    <!-- /.col-xl-9 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.shop-area -->

  <?=including('modules/landing/views/footer');?>