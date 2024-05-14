<?= including('modules/landing/views/header'); ?>

<section class="shop-area style-two">
    <form action="post">
        <?= csrf_field(); ?>
    </form>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="row productDiscountAll">

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
<script>
    <?php
    // Periksa apakah pengguna memiliki peran yang sesuai
    $isCustomerRole = isset(auth()->id);
    ?>

    // Ambil hasil pemeriksaan kondisi dari PHP
    const isCustomerRole = <?php echo json_encode($isCustomerRole); ?>;

    // Jika pengguna memiliki peran pelanggan, jalankan fungsi cekDiscount()
    if (isCustomerRole) {
        cekDiscountProdukDetail();
    } else {
        getProductDetail()
    }

    function cekDiscountProdukDetail() {
        const user_id = <?php echo json_encode(isset(auth()->id) && auth()->id ? auth()->id : null); ?>;

        $.ajax({
            url: "<?php echo routeTo('landing/cekDiscountDetail') ?>",
            method: "POST",
            data: {
                _token: document.querySelector('[name=_token]').value,
                product_id: '<?= $_GET['product_id'] ?>',
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

    function getProductDetail() {

        $.ajax({
            url: "<?php echo routeTo('landing/getProductDetail') ?>",
            method: "POST",
            data: {
                _token: document.querySelector('[name=_token]').value,
                product_id: '<?= $_GET['product_id'] ?>',
            },
            success: function(response) {
                console.log(response);
                $('.productDiscountAll').html(response);
                bindAddToCartEvents()
            },
            error: function(xhr, status, error) {
                console.error(`Error: ${error}`);
            }

        });

    }
</script>
<script>
   

    // Tambahkan event listener untuk tombol "Add to Cart"
    function bindAddToCartEvents() {
        // Menyaring semua elemen "add to cart" dengan kelas "add-to-cart a"
        document.querySelectorAll('.add-to-cart a').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                // Ambil data produk dari elemen HTML
                let productElement = button.closest('.product-details');

                // Dapatkan ID dari elemen yang dipicu oleh klik
                let productId = button.id.split('-')[1];

                // Dapatkan nama produk dari elemen
                let productName = productElement.querySelector('.pro-title a').textContent;

                // Dapatkan harga produk dari elemen
                let productPrice = parseFloat(productElement.querySelector('.price').textContent.replace('Rp. ', '').replace(',', ''));

                // Tambahkan produk ke keranjang
                addToCart(productId, productName, productPrice);

                // Perbarui tampilan keranjang (opsional, sesuai kebutuhan)
                displayCartItems();

                // Tampilkan notifikasi
                alert('Produk berhasil ditambah di keranjang');
            });
        });
    }

    // Panggil fungsi ini saat halaman dimuat
    bindAddToCartEvents();
</script>