<?php

use Core\Request;
use Core\Session;
use Core\Database;
use Core\Page;


$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

if(Request::isMethod('post'))
{
    // login process here
    $db = new Database;
    $user = $db->single('users', [
        'username' => $_POST['username'],
        'password' => md5($_POST['password'])
    ]);

    if($user)
    {
        Session::set(['user_id'=>$user->id]);
        header('location:'.routeTo('landing/cart'));
        die();
    }
    else
    {
        set_flash_msg([
            'error'=>__('auth.message.login_fail'),
            'old'  => $_POST
        ]);
        header('location:'.routeTo('landing/login'));
        die();
    }

}

Page::setTitle('Login');


return view('landing/views/login', compact(
    'success_msg',
    'error_msg',
    'old'
));