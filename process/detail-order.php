<?php

use Core\Page;
use Core\Database;
use Core\Request;
use Core\Storage;

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

// get data
$invoice_id = $_GET['invoice_id'];
$db = new Database();
$db = new Database;
$db->query  = "SELECT
invoice_items.item_id,
invoice_items.item_type,
invoice_items.discount_id,
invoice_items.quantity,
invoice_items.discount_price,
invoice_items.item_price,
invoice_items.total_price,
inventory_items.id AS inventory_item_id,
inventory_items.name AS item_name,
users.name AS user_name,
invoices.id AS id_invoice,
invoices.code,
invoices.status,
invoices.user_id,
invoices.total_amount,
invoices.created_at,
invoices.created_by,
media.name AS image,
shippings.country,
shippings.province,
shippings.city,
shippings.courier,
shippings.address,
shippings.notes,
CASE
    WHEN invoice_items.item_type = 'products' THEN inventory_items.name
    WHEN invoice_items.item_type = 'shippings' THEN shippings.courier
    ELSE NULL
END AS name
FROM invoices
LEFT JOIN invoice_items ON invoices.id = invoice_items.invoice_id
LEFT JOIN products ON invoice_items.item_id = products.id AND invoice_items.item_type = 'products'
LEFT JOIN inventory_items ON products.item_id = inventory_items.id
LEFT JOIN shippings ON invoice_items.invoice_id = shippings.invoice_id AND invoice_items.item_type = 'shippings' 
LEFT JOIN invoice_media ON invoices.id = invoice_media.invoice_id
LEFT JOIN media ON invoice_media.media_id = media.id
LEFT JOIN users ON invoices.user_id = users.id
WHERE invoices.id = $invoice_id
";


$invoice = $db->exec('all');

if (Request::isMethod('POST')) {
    extract($_POST);
    // echo '<pre>';
    // print_r($invoice);
    // die();


    $file = $_FILES['media'];
    $name = $_FILES['media']['name'];

    $media = $db->insert('media', [
        'name' => Storage::upload($file),
        'original_name' => $name,
        'created_by'    => auth()->id
    ]);

    $db->insert('invoice_media', [
        'invoice_id' => $invoice_id,
        'media_id'   => $media->id,
        'status'    => 'Success'
    ]);

    // Set flash message
    set_flash_msg(['success' => "File berhasil diupload"]);

    header('Location:' . routeTo('landing/detail-order', ['invoice_id' => $invoice_id]));
    die();
}


// echo '<pre>';
// print_r($invoice);
// die();

Page::setTitle('Detail Order');
return view('landing/views/detail-order', compact('invoice', 'success_msg', 'error_msg'));
