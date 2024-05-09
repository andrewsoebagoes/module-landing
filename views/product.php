<?php foreach ($products as $product) : ?>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="sin-product style-two">
                                            <div class="pro-img">
                                                <img src="<?= asset($product->image) ?>" alt="">
                                            </div>
                                            <div class="mid-wrapper">
                                                <h5 class="pro-title"><a href="#"><?= $product->product_name ?></a></h5>
                                                <div class="color-variation">
                                                    <ul>
                                                        <li><i class="fas fa-circle"></i></li>
                                                        <li><i class="fas fa-circle"></i></li>
                                                        <li><i class="fas fa-circle"></i></li>
                                                        <li><i class="fas fa-circle"></i></li>
                                                    </ul>
                                                </div>
                                                <p><span>Rp. <?= number_format($product->price) ?></span></p>
                                            </div>
                                            <div class="icon-wrapper">
                                                <div class="pro-icon">
                                                    <ul>
                                                        <li><a href="<?= routeTo('landing/detail-product?product_id=' . $product->id_product) ?>"><i class="flaticon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="javascript:;" id="addCart-<?= $product->id_product ?>">add to cart</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.sin-product -->
                                    </div>
                                <?php endforeach ?>