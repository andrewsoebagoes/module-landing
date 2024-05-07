<?php

use Core\Page;
use Core\Database;
use Core\Request;
// get products

$id = $_GET['product_id'];

$db = new Database;
$db->query  = "SELECT
    products.item_id id_product,
    products.price,
    products.description,
    products.sku,
    inventory_items.name AS product_name,
    media.name image
    FROM products
    LEFT JOIN product_pics ON product_pics.product_id = products.id
    LEFT JOIN media ON media.id = product_pics.media_id
    LEFT JOIN inventory_items ON inventory_items.id = products.item_id
    WHERE products.status = 'Ada'
    AND products.sku > 0
    AND products.item_id = {$id}";

$products = $db->exec('all');

// echo '<pre>';
// print_r($products);
// die();

Page::setTitle('Detail Product');

return view('landing/views/detail-product', compact('products'));
