<?php

use Core\Request;
use Core\Session;
use Core\Database;
use Core\Page;

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

if (Request::isMethod('post')) {
    extract($_POST);

    $db = new Database;
    $dataUser = $db->insert('users', [
        'name'      => $name,
        'username'  => $username,
        'password'  => md5($password)
    ]);

    $db->insert('user_roles', [
        'user_id'   => $dataUser->id,
        'role_id'   => env('CUSTOMER_ROLE_ID')
    ]);

    set_flash_msg([
        'success' => "Akun berhasil dibuat, silahkan login",
    ]);
    header('location:' . routeTo('landing/login'));
    die();
}

Page::setTitle('Login');


return view('landing/views/register', compact(
    'success_msg',
    'error_msg',
    'old'
));
