<?php

use Core\Page;
use Core\Database;
use Core\Request;
// get products

extract($_POST);
// print_r($_POST);

$db = new Database;
$db->query  = "SELECT
    products.id id_product,
    products.price,
    products.description,
    products.sku,
    inventory_items.name AS product_name,
    media.name image
    FROM products
    LEFT JOIN product_pics ON product_pics.product_id = products.id
    LEFT JOIN media ON media.id = product_pics.media_id
    LEFT JOIN inventory_items ON inventory_items.id = products.item_id
    WHERE products.status = 'PUBLISH'
    AND products.sku > 0
    AND products.id = {$product_id}";

$products = $db->exec('all');


echo '
<div class="col-lg-6 col-xl-6">
    <div class="quickview-slider">
        <div class="slider-for">
';

foreach ($products as $image) {
    echo '
            <div>
                <img src="' . asset($image->image) . '" alt="Thumb">
            </div>
    ';
}

echo '
        </div>

        <div class="slider-nav">
';

foreach ($products as $image) {
    echo '
            <div>
                <img src="' . asset($image->image) . '" alt="Thumb">
            </div>
    ';
}

echo '
        </div>
    </div>
</div>
<div class="col-lg-6 col-xl-6">
    <div class="product-details">
        <h5 class="pro-title" id="productName"><a href="#">' . $products[0]->product_name . '</a></h5>
        <span class="price">Rp. ' . number_format($products[0]->price) . '</span>
        <div class="add-tocart-wrap">
            <div class="add-to-cart" style="width: 300;">
                <a href="#" id="addCart-' . $products[0]->id_product . '" class="btn btn-outline-warning" style="padding-top:15px;width:210px"><i class="fas fa-plus"></i> Tambah Ke Keranjang</a>
            </div>
        </div>
        <p>Deskripsi :</p>
        <p>' . $products[0]->description . '</p>
        
    </div>
</div>
';
