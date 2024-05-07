<?php

use Core\Database;
use Core\Response;

if($route == 'landing/login') return true;
if($route == 'landing/index') return true;
if($route == 'landing/cart') return true;
if($route == 'landing/register') return true;
if($route == 'landing/detail-product') return true;

$auth = auth();



if(empty($auth))
{
    header('location:'.routeTo('auth/login'));
    die;
}

return true;