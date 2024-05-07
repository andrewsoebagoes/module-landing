<?php

use Core\Page;
use Core\Database;
use Core\Request;
// get products

$db = new Database;
$db->query = "SELECT
    products.item_id AS id_product,
    products.price,
    products.sku,
    inventory_items.name AS product_name,
    (SELECT media.name FROM product_pics
     JOIN media ON media.id = product_pics.media_id
     WHERE product_pics.product_id = products.id
     ORDER BY media.name ASC
     LIMIT 1) AS image
FROM products
LEFT JOIN inventory_items ON inventory_items.id = products.item_id
WHERE products.status = 'Ada' AND products.sku > 0";


$products = $db->exec('all');

// echo '<pre>';
// print_r($products);
// die();

Page::setTitle('Home');

return view('landing/views/index', compact('products'));

?>