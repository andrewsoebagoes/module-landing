<?php 

use Core\Database;

$db = new Database();
extract($_POST);


$db->query = "SELECT products.id id_product, products.sku, products.price final_price, products.description, inventory_items.name AS product_name, discounts.discount_value, discount_user.discount_value AS user_discount_value,
CASE WHEN discount_user.discount_value 
IS NOT NULL THEN products.price - discount_user.discount_value 
ELSE products.price - COALESCE(discounts.discount_value,0)
END final_price,
(SELECT media.name FROM product_pics
     JOIN media ON media.id = product_pics.media_id
     WHERE product_pics.product_id = products.id
     ORDER BY media.name ASC
     LIMIT 1) AS image
FROM products 
LEFT JOIN product_discount ON products.id = product_discount.product_id 
LEFT JOIN inventory_items ON products.item_id = inventory_items.id 
LEFT JOIN discounts ON discounts.id = product_discount.discount_id 
LEFT JOIN discount_applicables ON discount_applicables.user_id = $user_id
LEFT JOIN discounts as discount_user ON discount_user.id = discount_applicables.discount_id
WHERE products.sku > 0
AND products.status = 'PUBLISH'";


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
               <p><span>Rp. '. number_format($product->final_price).'</span></p>
           </div>
           <div class="icon-wrapper">
               <div class="pro-icon">
                   <ul>
                       <li><a href="'.routeTo('landing/detail-product?product_id='.$product->id_product).'" ><i class="flaticon-eye"></i></a></li>
                   </ul>
               </div>
               <div class="add-to-cart">
                   <a href="#" id="addCart-'.$product->id_product.'">add to cart</a>

               </div>
           </div>
       </div>
       <!-- /.sin-product -->
   </div>';
}






?>