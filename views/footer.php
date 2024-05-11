 <!--=========================-->
 <!--=   Footer area      =-->
 <!--=========================-->

 <footer class="footer-widget-area style-two mb-3">
     <div class="container-fluid custom-container">

         <div class="footer-bottom">
             <div class="row">
                 <div class="col-md-12 col-lg-6 col-xl-6 order-2 order-lg-1">
                     <p><?=env('APP_FOOTER');?></p>
                 </div>
                 <!-- /.col-xl-6 -->
                 <div class="col-md-12 col-lg-6 col-xl-6 order-1 order-lg-2">

                 </div>
                 <!-- /.col-xl-6 -->
             </div>
             <!-- /.row -->
         </div>
     </div>
     <!-- container-fluid -->
 </footer>
 <!-- footer-widget-area -->

 <!-- Back to top
	============================================= -->

 <div class="backtotop">
     <i class="fa fa-angle-up backtotop_btn"></i>
 </div>




 </div>
 <!-- /#site -->

 <!-- Dependency Scripts -->
 <script src="<?= asset('assets/landing/dependencies/jquery/jquery.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/popper.js/popper.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/bootstrap/js/bootstrap.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/owl.carousel/js/owl.carousel.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/wow/js/wow.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/isotope-layout/js/isotope.pkgd.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/jquery.countdown/js/jquery.countdown.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/gmap3/js/gmap3.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/venobox/js/venobox.min.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/slick-carousel/js/slick.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/headroom/js/headroom.js') ?>"></script>
 <script src="<?= asset('assets/landing/dependencies/jquery-ui/js/jquery-ui.min.js') ?>"></script>
 <!--Google map api -->

 <!-- Site Scripts -->
 <script src="<?= asset('assets/landing/assets/js/app.js') ?>"></script>


 <script>
     // Fungsi untuk menambahkan produk ke keranjang
     function addToCart(productId, productName, productPrice, productImage) {
         // Ambil data keranjang dari localStorage (jika ada)
         let cart = JSON.parse(localStorage.getItem('cart')) || [];

         // Periksa apakah produk sudah ada di keranjang
         let existingProduct = cart.find(item => item.productId === productId);

         if (existingProduct) {
             // Jika produk sudah ada, tambahkan jumlahnya
             existingProduct.quantity += 1;
         } else {
             // Jika produk belum ada, tambahkan sebagai item baru
             cart.push({
                 productId,
                 productName,
                 productPrice,
                 productImage,
                 quantity: 1
             });
         }

         // Simpan data keranjang yang diperbarui ke localStorage
         localStorage.setItem('cart', JSON.stringify(cart));

         // Perbarui jumlah produk di tampilan keranjang
         updateCartCount();
     }

     // Fungsi untuk memperbarui jumlah produk di tampilan keranjang
     function updateCartCount() {
         //  let cart = JSON.parse(localStorage.getItem('cart')) || [];
         //  let cartCount = cart.reduce((total, item) => total + item.quantity, 0);
         //  document.querySelector('.top-cart span').textContent = cartCount;
         // Dapatkan data keranjang dari localStorage
         let cart = JSON.parse(localStorage.getItem('cart')) || [];

         // Hitung jumlah produk di keranjang
         let cartCount = cart.reduce((total, item) => total + item.quantity, 0);

         // Temukan semua elemen span di dalam elemen dengan class 'top-cart'
         const cartElements = document.querySelectorAll('.top-cart span');

         // Perbarui text content di semua elemen dengan jumlah produk di keranjang
         cartElements.forEach(span => {
             span.textContent = cartCount;
         });
     }

     // Fungsi untuk menampilkan data keranjang di halaman keranjang
     function displayCartItems() {
         let cart = JSON.parse(localStorage.getItem('cart')) || [];
         let cartContainers = document.querySelectorAll('.cart-drop');

         // Iterasi melalui semua elemen .cart-drop
         cartContainers.forEach(cartContainer => {
             // Kosongkan isi kontainer keranjang
             cartContainer.innerHTML = '';

             // Tambahkan setiap item dari keranjang ke dalam tampilan
             cart.forEach(item => {
                 // Buat elemen HTML untuk setiap item di keranjang
                 let cartItem = `
            <div class="single-cart">
                <div class="cart-title">
                    <p><a href="#">${item.productName}</a></p>
                </div>
                <div class="cart-price">
                    <p>${item.quantity} x ${item.productPrice.toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                    })}</p>
                </div>
                <a href="javascript:;" onclick="removeFromCart('${item.productId}')"><i class="fa fa-times"></i></a>
            </div>`;

                 // Tambahkan elemen item keranjang ke container
                 cartContainer.innerHTML += cartItem;
             });
             // Setelah loop selesai, tambahkan tombol "View Cart" ke cartContainer
             let viewCartButton = `
                                <div class="cart-bottom">
                                    <div class="cart-checkout">
                                        <a href="<?= routeTo('landing/cart'); ?>"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                    </div>
                                </div>`;

             cartContainer.innerHTML += viewCartButton;
         });

     }

     // Fungsi untuk menghapus produk dari keranjang
     function removeFromCart(productId) {
         // Ambil data keranjang dari localStorage
         let cart = JSON.parse(localStorage.getItem('cart')) || [];

         // Cari indeks produk yang ingin dihapus berdasarkan ID produk
         let indexToRemove = cart.findIndex(item => item.productId === productId);

         // Jika produk ditemukan di keranjang, hapus produk tersebut
         if (indexToRemove !== -1) {
             cart.splice(indexToRemove, 1);
         }

         // Simpan data keranjang yang diperbarui ke localStorage
         localStorage.setItem('cart', JSON.stringify(cart));

         // Perbarui tampilan keranjang
         displayCartItems();

         // Perbarui jumlah produk di tampilan keranjang
         updateCartCount();
     }

     // Panggil fungsi untuk menampilkan data keranjang saat halaman dimuat
     document.addEventListener('DOMContentLoaded', function() {
         updateCartCount();
         displayCartItems();
     });
 </script>




 </body>

 </html>