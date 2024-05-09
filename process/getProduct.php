<?php 

use Core\Database;

$db = new Database();

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

$discount = $db->exec('all');


foreach ($discount as $product){
       echo '<div class="col-sm-6 col-xl-3">
       <div class="sin-product style-two">
           <div class="pro-img">
               <img src="'.asset($product->image) .'" alt="">
           </div>
           <div class="mid-wrapper">
               <h5 class="pro-title"><a href="#">'. $product->product_name.'</a></h5>
               <div class="color-variation">
                   <ul>
                       <li><i class="fas fa-circle"></i></li>
                       <li><i class="fas fa-circle"></i></li>
                       <li><i class="fas fa-circle"></i></li>
                       <li><i class="fas fa-circle"></i></li>
                   </ul>
               </div>
               <p><span>Rp. '. number_format($product->price).'</span></p>
           </div>
           <div class="icon-wrapper">
               <div class="pro-icon">
                   <ul>
                       <li><a href="'.routeTo('landing/detail-product?product_id='.$product->id_product).'" ><i class="flaticon-eye"></i></a></li>
                   </ul>
               </div>
               <div class="add-to-cart">
                   <a href="javascript:;" id="addCart-'.$product->id_product.'">add to cart</a>

               </div>
           </div>
       </div>
       <!-- /.sin-product -->
   </div>';
}






?>