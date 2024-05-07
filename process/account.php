<?php

use Core\Page;
use Core\Database;
use Core\Request;

// get data
$db = new Database();

$db->query = "SELECT * FROM invoices
                        WHERE user_id = " .auth()->id ."
                        ORDER BY invoices.id DESC 
                        ";
$data  = $db->exec('all');


// echo '<pre>';
// print_r($data);
// die();

Page::setTitle('Account');
return view('landing/views/account', compact('data'));

?>