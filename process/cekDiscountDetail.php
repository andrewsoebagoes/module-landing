<?php

use Core\Database;

$db = new Database();

extract($_POST);


$db->query = "
SELECT
    products.id AS id_product,
    products.sku,
    products.price,
    products.description,
    inventory_items.name AS product_name,
    media.name AS image,
    discounts.discount_value,
    discount_user.discount_value AS user_discount_value,
    CASE
        WHEN discount_user.discount_value IS NOT NULL THEN products.price - discount_user.discount_value
        ELSE products.price - COALESCE(discounts.discount_value, 0)
    END AS final_price
FROM
    products
LEFT JOIN product_pics ON product_pics.product_id = products.id
LEFT JOIN media ON media.id = product_pics.media_id
LEFT JOIN inventory_items ON inventory_items.id = products.item_id
LEFT JOIN product_discount ON products.id = product_discount.product_id
LEFT JOIN discounts ON discounts.id = product_discount.discount_id
LEFT JOIN discount_applicables ON discount_applicables.user_id = $user_id
LEFT JOIN discounts AS discount_user ON discount_user.id = discount_applicables.discount_id
WHERE
    products.status = 'PUBLISH'
    AND products.sku > 0
    AND products.id = {$product_id}
    -- Tambahkan kondisi lainnya jika diperlukan
";


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
        <span class="price">Rp. ' . number_format($products[0]->final_price) . '</span>
        <div class="add-tocart-wrap">
            <div class="add-to-cart" style="width: 300;">
                <a href="javascript:;" id="addCart-' . $products[0]->id_product . '" class="btn btn-outline-warning" style="padding-top:15px;width:210px"><i class="fas fa-plus"></i> Tambah Ke Keranjang</a>
            </div>
        </div>
        <div class="mb-1 mt-2 font-weight-bold">Deskripsi :</div>
        ' . $products[0]->description . '
       
    </div>
</div>
';

