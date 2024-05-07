<?php

use Core\Page;
use Core\Database;
use Core\Request;
// get products


// echo '<pre>';
// print_r($products);
// die();
Page::setTitle('Cart');
return view('landing/views/cart', compact([]));

?>