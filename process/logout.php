<?php

use Core\Session;

Session::destroy();
header('location:'.routeTo('landing/login'));
die();