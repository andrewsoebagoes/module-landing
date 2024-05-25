<?= including('modules/landing/views/header');; ?>

<section class="cart-area">
	<div class="container-fluid custom-container">
		<div class="row">
			<div class="col-xl-9">
				<div class="cart-table">
					<table class="tables">
						<thead>
							<tr>
								<th></th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>

				</div>
				<!-- /.cart-table -->
				<div class="row cart-btn-section">

					<!-- /.col-xl-6 -->
					<div class="col-12 col-sm-4 col-lg-12">
						<div class="cart-btn-right">
							<a href="javascript:;" id="update-cart-btn">Update Cart</a>
						</div>
					</div>
					<!-- /.col-xl-6 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col-xl-9 -->
			<div class="col-xl-3">
				<div class="cart-subtotal mb-0 text-left">
					<p>DETAILS</p>
					<form action="" method="post">
						<?= csrf_field(); ?>

						<div class="mb-3 mt-3">
							<label for="" class="">Pilih Provinsi</label>
							<select class="form-control" id="provinsiTujuan" name="provinsiTujuan" onchange="getKabupatenTujuan(this.value)" required>

							</select>
						</div>

						<div class="mb-3">
							<label for="" class="">Pilih Kabupaten</label>
							<select class="form-control" id="kabupatenTujuan" name="kabupatenTujuan" onchange="getKecamatanTujuan(this.value)" required>
							</select>
						</div>
						
						<div class="mb-3">
							<label for="" class="">Pilih Kecamatan</label>
							<select class="form-control" id="kecamatanTujuan" name="kecamatanTujuan" required>
							</select>
						</div>

						<div class="mb-3">
							<label for="" class="">Alamat Lengkap</label>
							<textarea type="text" id="address" class="form-control" name="address" placeholder="Masukan Alamat Lengkap" required></textarea>
						</div>

						<div class="mb-3">
							<label for="" class="">Pilih Ekspedisi</label>
							<select name="ekspedisi" id="ekspedisi" class="form-control" onchange="cekOngkir(this.value)" required>

								<option value="">Pilih Ekspedisi</option>
								<option value="pos">Pos Indonesia</option>
								<option value="tiki">TIKI</option>
								<option value="jne">JNE</option>
								<option value="jnt">JNT</option>
								<option value="wahana">Wahana</option>
								<option value="lion">Lion</option>
								<option value="indah">Indah</option>
								<option value="ide">IDexpress</option>
							</select>
						</div>

						<div class="mb-3">
							<label for="" class="">Pilih Ongkos Kirim</label>
							<select class="form-control" id="ongkir" name="ongkir" onchange="totalOngkir(this.value)" required>
							</select>
						</div>

						<div class="mb-3">
						<label for="" class="">Catatan</label>

							<textarea type="text" id="notes" class="form-control" placeholder="Catatan" name="notes" required></textarea>
						</div>

						<div class="mb-3" style="text-align: left;">
							<label for="address" class="form-label">
								<input type="checkbox" value="1" id="preorder" class="" name="preorder"> Pre Order
							</label>
						</div>


						<ul class="mb-3">
							<li id="totalProduk"><span>Total Harga Produk:</span>0</li>
							<li id="totalOngkir"><span>Biaya Ongkos Kirim:</span>0</li>

							<li id="totalProdukOngkir"><span>Total:</span>0</li>
						</ul>

						<div class="text-left mt-4">
							<button class="btn btn-primary" type="submit">Checkout</button>
						</div>
				</div>
				<!-- /.cart-subtotal -->

				</form>
			</div>
			<!-- /.col-xl-3 -->
		</div>
	</div>
</section>

<?= including('modules/landing/views/footer'); ?>
<script>
	getProvinsiTujuan();

	function getProvinsiTujuan() {
		$.ajax({
			url: "<?php echo routeTo('landing/getProvinsi') ?>",
			method: "GET",
			success: function(response) {
				$('#provinsiTujuan').html(response);
			},
			error: function(xhr, status, error) {
				console.error(`Error: ${error}`);
			}
		});
	}

	function getKabupatenTujuan(idProvinsi) {
		$.ajax({
			url: "<?php echo routeTo('landing/getKabupaten') ?>" + "?id_provinsi=" + idProvinsi,
			method: "GET",
			success: function(response) {
				$('#kabupatenTujuan').html(response);
			},
			error: function(xhr, status, error) {
				console.error(`Error: ${error}`);
			}
		});
	}
	
	function getKecamatanTujuan(idKab) {
		$.ajax({
			url: "<?php echo routeTo('landing/getKecamatan') ?>" + "?id_kab=" + idKab,
			method: "GET",
			success: function(response) {
				$('#kecamatanTujuan').html(response);
			},
			error: function(xhr, status, error) {
				console.error(`Error: ${error}`);
			}
		});
	}

	// Fungsi untuk mengecek ongkos kirim
	function cekOngkir() {

		const kecamatanTujuan = $('#kecamatanTujuan').val();
		const ekspedisi = $('#ekspedisi').val();
		const rows = document.querySelectorAll('.cart-table tbody tr');
		let quantity = 0;
		rows.forEach(row => {
			// Dapatkan input kuantitas
			const quantityInput = row.querySelector('input[type="number"]');
			// Periksa apakah kuantitas input ada dan valid
			const newQuantity = parseInt(quantityInput.value);
			quantity += newQuantity;
		});



		$.ajax({
			url: "<?php echo routeTo('landing/getOngkir') ?>",
			method: "POST",
			data: {
				_token: document.querySelector('[name=_token]').value,
				kecamatan: kecamatanTujuan,
				weight: quantity * 1000,
				courier: ekspedisi
			},
			success: function(response) {
				$('#ongkir').html(response);
			},
			error: function(xhr, status, error) {
				console.error(`Error: ${error}`);
			}

		});

	}
</script>

<script>
	// Panggil fungsi untuk menampilkan data cart saat halaman dimuat
	displayCart();
	updateCart();

	// Fungsi untuk mendapatkan data cart dari localStorage
	function getCartData() {
		const cartData = localStorage.getItem('cart');
		if (cartData) {
			return JSON.parse(cartData);
		}
		return [];
	}

	// Fungsi untuk menampilkan data cart dalam tabel
	function displayCart() {
		// Dapatkan data cart dari localStorage
		const cart = getCartData();

		// Temukan elemen tabel cart
		const cartTableBody = document.querySelector('.cart-table tbody');

		// Bersihkan isi tabel sebelumnya
		cartTableBody.innerHTML = '';

		// Loop melalui setiap item di cart dan buat baris tabel
		cart.forEach(item => {
			const tr = document.createElement('tr');

			// Tambahkan atribut data-product-id ke elemen tr
			tr.setAttribute('data-product-id', item.productId);

			// Kolom untuk tombol hapus
			const deleteTd = document.createElement('td');
			const deleteLink = document.createElement('a');
			deleteLink.href = 'javascript:void(0);';
			deleteLink.textContent = 'X';
			deleteLink.onclick = () => {
				// Tampilkan alert konfirmasi
				const isConfirmed = confirm("Apakah Anda yakin ingin menghapus item ini?");
				// Jika pengguna memilih "OK" pada alert
				if (isConfirmed) {
					// Panggil fungsi removeFromCart dengan itemId dari item
					removeFromCart(item.productId);
					// Segarkan (refresh) halaman untuk memperbarui tampilan
					location.reload();
				}
			};
			deleteTd.appendChild(deleteLink);
			tr.appendChild(deleteTd);

			// Kolom untuk nama produk
			const nameTd = document.createElement('td');
			const nameDiv = document.createElement('div');
			nameDiv.className = 'product-title';
			const nameLink = document.createElement('a');
			nameLink.href = '#';
			nameLink.textContent = item.productName;
			nameDiv.appendChild(nameLink);
			nameTd.appendChild(nameDiv);
			tr.appendChild(nameTd);

			// Kolom untuk kuantitas
            const quantityTd = document.createElement('td');
            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.value = item.quantity;
            quantityInput.min = 0; // Tetapkan nilai minimum

            // Tambahkan event listener untuk memastikan nilai tidak kurang dari 0
            quantityInput.addEventListener('input', function() {
                if (quantityInput.value < 0) {
                    quantityInput.value = 0; // Kembalikan nilai ke 0 jika kurang dari 0
                }
            });

            quantityTd.appendChild(quantityInput);
            tr.appendChild(quantityTd);


			// Kolom untuk harga per item
			const priceTd = document.createElement('td');
			const priceDiv = document.createElement('div');
			priceDiv.className = 'price-box';
			const priceSpan = document.createElement('span');
			priceSpan.className = 'price';

			// Gunakan `toLocaleString()` untuk memformat harga sesuai dengan standar Indonesia
			// const formattedPrice = item.productPrice.toLocaleString('id-ID', {
			const formattedPrice = item.final_price.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR',
				minimumFractionDigits: 0,
			});

			// Set textContent dengan format yang sudah diperoleh
			priceSpan.textContent = `${item.quantity} x ${item.final_price}`;
			priceDiv.appendChild(priceSpan);
			priceTd.appendChild(priceDiv);
			tr.appendChild(priceTd);

			// Kolom untuk total harga
			const totalPriceTd = document.createElement('td');
			const totalPriceDiv = document.createElement('div');
			totalPriceDiv.className = 'total-price-box';
			const totalPriceSpan = document.createElement('span');
			totalPriceSpan.className = 'price';
			const totalPrice = item.quantity * item.final_price;
			const formattedTotalPrice = totalPrice.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR',
				minimumFractionDigits: 0,
			});

			totalPriceSpan.textContent = `${formattedTotalPrice}`;
			totalPriceDiv.appendChild(totalPriceSpan);
			totalPriceTd.appendChild(totalPriceDiv);
			tr.appendChild(totalPriceTd);

			// Tambahkan baris ke tabel
			cartTableBody.appendChild(tr);
		});
	}
	// Menambahkan event listener untuk elemen select dengan ID "ongkir"
	document.getElementById('ongkir').addEventListener('change', function() {
		totalOngkir(this.value);
	});

	// Mendapatkan biaya ongkir
	function totalOngkir(value) {
		// Pisahkan ongkos kirim dan biaya yang diterima dari nilai yang dipilih
		const [service, biaya] = value.split('-');

		// Ubah biaya ongkos kirim menjadi angka dan format dalam format rupiah
		const rupiahOngkir = parseInt(biaya).toLocaleString('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0,
		});

		// Dapatkan elemen yang akan menampilkan total ongkos kirim
		const totalOngkirElement = document.querySelector('#totalOngkir');

		// Perbarui elemen total ongkos kirim
		totalOngkirElement.innerHTML = `<span>Biaya Ongkos Kirim:</span> ${rupiahOngkir}`;
		totalProdukOngkir();
	}

	function updateCart() {
		// Dapatkan data keranjang dari localStorage
		let cart = JSON.parse(localStorage.getItem('cart')) || [];

		// Dapatkan semua baris dalam tabel cart
		const rows = document.querySelectorAll('.cart-table tbody tr');
		let totalHargaProduk = 0;

		// Iterasi melalui setiap baris dalam tabel
		rows.forEach(row => {
			// Dapatkan input kuantitas
			const quantityInput = row.querySelector('input[type="number"]');
			// Dapatkan ID produk
			const productId = row.getAttribute('data-product-id'); // Asumsikan setiap baris memiliki atribut data-product-id

			// Periksa apakah kuantitas input ada dan valid
			if (quantityInput) {
				const newQuantity = parseInt(quantityInput.value);

				// Validasi kuantitas
				if (!isNaN(newQuantity) && newQuantity >= 0) {

					// Dapatkan harga per item
					const itemPrice = row.querySelector('.price-box .price');
					const itemPriceText = itemPrice.textContent;
					// Pisahkan kuantitas dan harga dari string
					const [quantityText, priceText] = itemPriceText.split(' x ');
					const priceValue = priceText.replace(/[^0-9]/g, '');
					const price = parseFloat(priceValue);

					// Validasi harga per item
					if (!isNaN(price)) {
						// Hitung total baru
						const newTotal = newQuantity * price;

						// Perbarui kolom harga
						const formattedPrice = newQuantity + ' x Rp. ' + price.toLocaleString('id-ID');
						const priceColumn = row.querySelector('.price-box .price');
						priceColumn.textContent = formattedPrice;

						// Perbarui kolom total
						const formattedTotal = 'Rp. ' + newTotal.toLocaleString('id-ID');
						const totalPriceColumn = row.querySelector('.total-price-box .price');
						totalPriceColumn.textContent = formattedTotal;

						// Tambahkan total harga ke total keseluruhan
						totalHargaProduk += newTotal;
						const itemIndex = cart.findIndex(item => item.productId === productId);
						if (itemIndex !== -1) {
							// Periksa apakah kuantitas berubah sebelum memanggil cekDiscountQuantity
							if (cart[itemIndex].quantity !== newQuantity) {
								cart[itemIndex].quantity = newQuantity;
								// Panggil fungsi cekDiscount hanya ketika kuantitas berubah
								cekDiscountQuantity(productId, newQuantity);
							}
						}

						
						// Panggil fungsi cekDiscount untuk mengecek diskon berdasarkan kuantitas baru
					} else {
						console.error('Invalid item price');
					}
				} else {
					console.error('Invalid quantity');
				}
			} else {
				console.error('Quantity input not found');
			}
		});

		// Format total harga produk
		const rupiahHargaProduk = 'Rp. ' + totalHargaProduk.toLocaleString('id-ID');

		// Perbarui total harga produk di halaman
		const totalProduk = document.querySelector('#totalProduk');
		totalProduk.innerHTML = `<span>Total Harga Produk:</span> ${rupiahHargaProduk}`;

		// Simpan data keranjang kembali ke localStorage
		localStorage.setItem('cart', JSON.stringify(cart));
	}

	function cekDiscountQuantity(productId, newQuantity) {
		const user_id = <?php echo json_encode(isset(auth()->id) && auth()->id ? auth()->id : null); ?>;
		const token = document.querySelector('[name=_token]').value;

		$.ajax({
			url: "<?php echo routeTo('landing/cekDiscountQuantityProduk') ?>",
			method: "POST",
			data: {
				_token: token,
				user_id: user_id,
				quantity: newQuantity,
				productId: productId
			},
			success: function(response) {
				// Mengambil data dari localStorage
				let cartData = JSON.parse(localStorage.getItem('cart')) || [];

				// Iterasi setiap produk dalam respons
				let cartProduct = cartData.find(item => item.productId == response.data.id_product);
				if (cartProduct) {
					cartProduct.final_price = response.data.final_price;
				}
				// Menyimpan kembali data yang sudah diperbarui ke dalam localStorage
				localStorage.setItem('cart', JSON.stringify(cartData));
				displayCart();
				updateCart();
			},
			error: function(xhr, status, error) {
				console.error(`Error: ${error}`);
			}
		});
	}


	// Tambahkan event listener pada tombol "Update Cart" untuk memanggil fungsi `updateCart()`
	document.getElementById('update-cart-btn').addEventListener('click', updateCart);

	function totalProdukOngkir() {
		// Ambil elemen total harga produk dan total ongkos kirim
		const bProdukElement = document.querySelector('#totalProduk');
		const bOngkirElement = document.querySelector('#totalOngkir');

		// Ambil teks dari elemen tersebut
		const bProdukText = bProdukElement.textContent;
		const bOngkirText = bOngkirElement.textContent;

		// Ekstrak angka dari teks menggunakan regex
		const produkValue = parseFloat(bProdukText.replace(/[^0-9,-]/g, '').replace(',', ''));
		const ongkirValue = parseFloat(bOngkirText.replace(/[^0-9,-]/g, '').replace(',', ''));

		// Jumlahkan total harga produk dan total ongkos kirim
		const totalSeluruh = produkValue + ongkirValue;

		// Konversi hasil penjumlahan ke format rupiah
		const totalSeluruhFormatted = totalSeluruh.toLocaleString('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0,
		});

		// Perbarui elemen totalProdukOngkir
		const totalProdukOngkirElement = document.querySelector('#totalProdukOngkir');
		totalProdukOngkirElement.innerHTML = `<span>Total :</span> ${totalSeluruhFormatted}`;
	}

	// Fungsi untuk memeriksa apakah keranjang kosong
	function isCartEmpty() {
		// Ambil data keranjang dari localStorage
		const cartData = localStorage.getItem('cart');

		// Periksa apakah data keranjang ada dan tidak kosong
		if (cartData) {
			const cart = JSON.parse(cartData);
			return cart.length === 0; // Kembalikan true jika keranjang kosong
		}

		// Jika tidak ada data keranjang, anggap keranjang kosong
		return true;
	}

	// Fungsi untuk mengatur status tombol checkout
	function updateCheckoutButtonStatus() {
		// Ambil elemen tombol checkout
		const checkoutButton = document.querySelector('button[type="submit"]');

		// Periksa apakah keranjang kosong
		const cartEmpty = isCartEmpty();

		// Atur atribut disabled pada tombol checkout
		checkoutButton.disabled = cartEmpty;
	}

	// Panggil fungsi untuk mengatur status tombol checkout saat halaman dimuat
	document.addEventListener('DOMContentLoaded', updateCheckoutButtonStatus);

	// Panggil fungsi untuk mengatur status tombol checkout saat keranjang diperbarui
	document.addEventListener('cartUpdated', updateCheckoutButtonStatus);


	function hapusCart() {
		localStorage.clear();
	}

	function isAuthenticated() {
		const authToken = '<?= isset(auth()->id) ?>'
		return authToken != '';
	}

	// Fungsi untuk mengarahkan pengguna ke halaman login
	function redirectToLogin() {
		const loginUrl = '<?= routeTo('landing/login') ?>';
		window.location.href = loginUrl;
	}

	// Tambahkan event listener untuk menyimpan data produk ke form ketika tombol submit ditekan
	const form = document.querySelector('form');
	form.addEventListener('submit', function(event) {
		if (!isAuthenticated()) {
			event.preventDefault(); // Cegah pengiriman form
			alert('Anda harus login untuk melakukan transaksi');
			redirectToLogin();
		} else {
			storeCartDataInForm();
			hapusCart();
		}
	});
</script>

<script>
	function storeCartDataInForm() {
		// Dapatkan data cart dari localStorage
		const cart = getCartData();

		// Temukan form yang ingin Anda tambahkan data produk
		const form = document.querySelector('form');

		// Buat input tersembunyi untuk menyimpan data produk
		const productsInput = document.createElement('input');
		productsInput.type = 'hidden';
		productsInput.name = 'cartData'; // Nama yang digunakan untuk mengirimkan data ke server

		// Format data produk menjadi JSON string
		const cartDataString = JSON.stringify(cart);
		productsInput.value = cartDataString;

		// Tambahkan input ke form
		form.appendChild(productsInput);

		// Dapatkan nilai dari #totalProdukOngkir, #totalOngkir, dan #totalProduk
		const totalProdukOngkirElement = document.querySelector('#totalProdukOngkir');
		const totalOngkirElement = document.querySelector('#totalOngkir');
		const totalProdukElement = document.querySelector('#totalProduk');

		// Fungsi untuk menghapus teks dan mengambil hanya nilai numerik
		function extractNumericValue(text) {
			return parseInt(text.replace(/[^0-9]/g, ''), 10);
		}

		// Ambil nilai numerik dari setiap elemen
		const totalProdukOngkirValue = extractNumericValue(totalProdukOngkirElement.textContent);
		const totalOngkirValue = extractNumericValue(totalOngkirElement.textContent);
		const totalProdukValue = extractNumericValue(totalProdukElement.textContent);


		// Buat input tersembunyi untuk totalProdukOngkir
		const totalProdukOngkirInput = document.createElement('input');
		totalProdukOngkirInput.type = 'hidden';
		totalProdukOngkirInput.name = 'totalProdukOngkir';
		totalProdukOngkirInput.value = totalProdukOngkirValue;

		// Buat input tersembunyi untuk totalOngkir
		const totalOngkirInput = document.createElement('input');
		totalOngkirInput.type = 'hidden';
		totalOngkirInput.name = 'totalOngkir';
		totalOngkirInput.value = totalOngkirValue;

		// Buat input tersembunyi untuk totalProduk
		const totalProdukInput = document.createElement('input');
		totalProdukInput.type = 'hidden';
		totalProdukInput.name = 'totalProduk';
		totalProdukInput.value = totalProdukValue;

		// Tambahkan input tersembunyi ke form
		form.appendChild(totalProdukOngkirInput);
		form.appendChild(totalOngkirInput);
		form.appendChild(totalProdukInput);
	}
	
</script>