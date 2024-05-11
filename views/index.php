<?= including('modules/landing/views/header');; ?>

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
                    <form action="post">
                        <?= csrf_field(); ?>
                    </form>
                </div>
                <!-- /.shop-sorting-area -->
                <div class="shop-content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row productDiscountAll">
                                
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                    <!-- <div class="load-more-wrapper">
                                <a href="<?= routeTo('landing/register') ?>" class="btn-two">Load More</a>
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

<?= including('modules/landing/views/footer'); ?>
<script>
    <?php
    // Periksa apakah pengguna memiliki peran yang sesuai
    $isCustomerRole = isset(auth()->id);
    ?>

    // Ambil hasil pemeriksaan kondisi dari PHP
    const isCustomerRole = <?php echo json_encode($isCustomerRole); ?>;

    // Jika pengguna memiliki peran pelanggan, jalankan fungsi cekDiscount()
    if (isCustomerRole) {
        cekDiscount();
    } else {
        getProduct()
    }

    function cekDiscount() {
        const user_id = <?php echo json_encode(isset(auth()->id) && auth()->id ? auth()->id : null); ?>;

        $.ajax({
            url: "<?php echo routeTo('landing/cekDiscount') ?>",
            method: "POST",
            data: {
                _token: document.querySelector('[name=_token]').value,
                user_id: user_id
            },
            success: function(response) {
                // console.log(response);
                $('.productDiscountAll').html(response);
                bindAddToCartEvents()
            },
            error: function(xhr, status, error) {
                console.error(`Error: ${error}`);
            }

        });
    }

    function getProduct() {

        $.ajax({
            url: "<?php echo routeTo('landing/getProduct') ?>",
            method: "GET",
            success: function(response) {
                $('.productDiscountAll').html(response);
                bindAddToCartEvents()
            },
            error: function(xhr, status, error) {
                console.error(`Error: ${error}`);
            }

        });

    }

    function bindAddToCartEvents() {
        document.querySelectorAll('.add-to-cart a').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                console.log('Button clicked!');

                // Ambil data produk dari elemen HTML
                let productElement = button.closest('.sin-product');
                let productId = button.id.split('-')[1];
                let productName = productElement.querySelector('.pro-title a').textContent;
                let productPrice = parseFloat(productElement.querySelector('.mid-wrapper p span').textContent.replace('Rp. ', '').replace(',', ''));

                let productImage = productElement.querySelector('.pro-img img').src;

                // Tambahkan produk ke keranjang
                addToCart(productId, productName, productPrice);

                // Perbarui tampilan keranjang
                displayCartItems();

                alert('Produk berhasil ditambah di keranjang');
            });
        });
    }
</script>