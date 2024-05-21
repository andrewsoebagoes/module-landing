<?php

use Core\Page;
use Core\Database;
use Core\Request;
// get products

$db = new Database;

if (Request::isMethod('POST')) {

    extract($_POST);

    $cartData = json_decode($cartData);

    // echo '<pre>';
    // print_r($_POST);
    // print_r($cartData);
    // die();

    $kode_transaksi = "T". date('dmYHis');
    $provinsiTujuan = explode('-', $provinsiTujuan);
    $kabupatenTujuan = explode('-', $kabupatenTujuan);
    $kecamatanTujuan = explode('-', $kecamatanTujuan);

    $dataInvoices = [
        'code'              => $kode_transaksi,
        'user_id'           => auth()->id,
        'status'            => isset($preorder) ? 'Pre Order' :  'Waiting for Payment',
        'notes'             => '',
        'total_amount'      => $totalProdukOngkir,
        'payment_receive'   => 0,
        'payment_return'    => 0,
        'created_at'        => date('Y-m-d H:i:s'),
        'created_by'        => auth()->id,
    ];

    $data = $db->insert('invoices', $dataInvoices);
    $lastInvoiceId = $data->id;

    $dataShippings = [
        'invoice_id'    => $lastInvoiceId,
        'country'       => 'Indonesia',
        'province'      => $provinsiTujuan[1],
        'city'          => $kabupatenTujuan[1],
        'subdistrict'   => $kecamatanTujuan[1],
        'address'       => $address,
        'courier'       => $ekspedisi,
        'notes'         => $notes
    ];
    $shippings = $db->insert('shippings', $dataShippings);

    foreach ($cartData as $item) {
        $productId = $item->productId;
        $quantity = $item->quantity;

        // Dapatkan data produk dari database
        $db->query = "SELECT
        products.id AS id_product,
        products.item_id,
        products.price,
        products.sku,
        inventory_items.name AS product_name
        FROM products
        JOIN inventory_items ON inventory_items.id = products.item_id
        WHERE products.id = {$productId}";
        $product = $db->exec('single');


        // Hitung harga total barang
        $itemPrice = $item->final_price;
        $totalBarang = $itemPrice * $quantity;

        // Masukkan data ke dalam tabel invoice_items
        $invoice_items = $db->insert('invoice_items', [
            'invoice_id'            => $lastInvoiceId,
            'item_id'               => $productId,
            'item_type'             => 'products',
            'discount_id'           => 0,
            'item_snapshot'         => json_encode($product),
            'discount_snapshot'     => "[]",
            'quantity'              => $quantity,
            'item_price'            => $itemPrice,
            'discount_price'        => 0,
            'total_price'           => $totalBarang
        ]);

        
    }

    $db->insert('invoice_items', [
        'invoice_id'    => $lastInvoiceId,
        'quantity'      => 1,
        'item_type'     => 'shippings',
        'item_id'       => $shippings->id,
        'item_snapshot' => json_encode($dataShippings),
        'item_price'    => $totalOngkir,
        'discount_price' => 0,
        'total_price'   => $totalOngkir
    ]);


    // Set flash message
    set_flash_msg(['success' => "Transaksi berhasil dilakukan, Silahkan kirim bukti pembayaran"]);

    header('Location: /landing/detail-order?invoice_id='.$lastInvoiceId);

    die();
}
Page::setTitle('Cart');
return view('landing/views/cart', compact([]));
