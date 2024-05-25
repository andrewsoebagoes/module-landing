<!doctype html>
<html>

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php get_title() ?></title>

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="<?= env('APP_FAVICON', asset('theme/assets/images/favicon.ico')) ?>">


    <!-- Dependency Styles -->
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/fontawesome/css/fontawesome-all.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/owl.carousel/css/owl.carousel.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/owl.carousel/css/owl.theme.default.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/flaticon/css/flaticon.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/wow/css/animate.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/jquery-ui/css/jquery-ui.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/venobox/css/venobox.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/landing/dependencies/slick-carousel/css/slick.css') ?>" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= asset('assets/landing/assets/css/app.css') ?>" type="text/css">

    <style>
        @media screen and (max-width: 768px) {
            .top-cart a>span {
                position: absolute;
                top: 8px;
                right: -5px;
                font-size: 12px;
                color: #fff;
                background: #747474;
                height: 15px;
                width: 15px;
                border-radius: 50px;
                text-align: center;
                line-height: 15px;
            }
        }
        .logo-mobile {
            padding-top: 12px;
            text-align: center;
        }
        .logo {
            padding-top: 25px;
        }

    </style>




</head>

<body id="home-version-1" class="home-version-1" data-style="default">

    <div class="site-content">


        <!--=========================-->
        <!--=        Header         =-->
        <!--=========================-->



        <!-- Top Bar area start
	============================================= -->


        <header id="header" class="header-area">
            <div class="top-bar">
                <div class="container-fluid custom-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="top-bar-left">
                                <p><i class="far fa-flag"></i><a href="#"><?= env('APP_ADDRESS') ?></a></p>

                                <p><i class="far fa-envelope"></i><a href="#"><?= env('APP_EMAIL') ?></a></p>
                            </div>
                        </div>
                        <!-- Col -->
                        <div class="col-lg-6">
                            <div class="top-bar-right">
                                <div class="social">
                                    <ul>
                                        <li><a href="<?= env('APP_FACEBOOK') ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?= env('APP_INSTAGRAM') ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <?php if (auth()) : ?>
                                    <a href="<?= routeTo('landing/account') ?>" class="my-account">My Account</a>
                                <?php else : ?>
                                    <a href="<?= routeTo('landing/login') ?>" class="my-account">My Account</a>
                                <?php endif ?>
                            </div>
                            <!--top-bar-right end-->
                        </div>
                        <!-- Col end-->
                    </div>
                    <!--Row end-->
                </div>
                <!--container end-->
            </div>
            <!-- Main Menu
		============================================= -->
            <div class="container-fluid custom-container menu-rel-container">
                <div class="row">
                    <!-- Logo
				============================================= -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="logo">
                            <a href="<?= routeTo('landing/index') ?>">
                                <img src="<?= env('APP_LOGO', asset('assets/landing/media/images/logo.png')) ?>" alt="logo" width="220">

                            </a>
                        </div>
                    </div>
                    <!--Col end-->

                    <!-- Main menu
				============================================= -->

                    <div class="col-lg-12 col-xl-7 order-lg-6 order-xl-2 menu-container">
                        <div class="mainmenu style-two">
                            <ul id="navigation">

                                <li><a href="<?= routeTo('landing/index') ?>">Home</a></li>
                                <li><a href="<?= routeTo('landing/cart') ?>">View Cart</a></li>
                                <?php if (auth()) : ?>
                                    <li><a href="<?= routeTo('landing/logout') ?>">Logout</a></li>
                                <?php else : ?>
                                    <li><a href="<?= routeTo('landing/login') ?>">Login</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <!--Menu container end-->
                    <div class="col-lg-2 col-xl-2 order-lg-2 order-xl-3">
                        <div class="header-right-menu">
                            <ul>
                                <li class="top-cart"><a href="javascript:;"><i class="flaticon-bag"></i><span></span></a>
                                    <div class="cart-drop">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Col end-->
                </div>
                <!--Row end-->
            </div>
            <!--container end-->
        </header>
        <!--Header end-->

        <!--=========================-->
        <!--=        Mobile Header         =-->
        <!--=========================-->

        <header class="mobile-header">
            <div class="container-fluid custom-container">
                <div class="row">
                    <!-- Mobile menu Opener
					============================================= -->
                    <div class="col-4">
                        <div class="accordion-wrapper">
                            <a href="#" class="mobile-open"><i class="flaticon-menu-1"></i></a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="logo-mobile">
                            <a href="<?= routeTo('landing/index') ?>">
                            <img src="<?= env('APP_LOGO', asset('assets/landing/media/images/logo.png')) ?>" alt="logo" width="150">
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <ul>
                            <li class="top-cart"><a href="javascript:;"><i class="flaticon-bag"></i> <span></span></a>
                                <div class="cart-drop">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row end -->
            </div>
            <!-- /.container end -->
        </header>

        <div class="accordion-wrapper">

            <!-- Mobile Menu Navigation
				============================================= -->
            <div id="mobilemenu" class="accordion">
                <ul>
                    <li class="mob-logo"><a href="<?= routeTo('landing/index') ?>">
                            <img src="<?= env('APP_LOGO', asset('assets/landing/media/images/logo.png')) ?>" alt="">
                        </a></li>
                    <li><a href="#" class="closeme"><i class="flaticon-close"></i></a></li>
                    <li class="out-link"><a href="<?= routeTo('landing/index') ?>">Home</a></li>
                    <li class="out-link"><a href="<?= routeTo('landing/cart') ?>">View Cart</a></li>
                    <li class="out-link"><a href="<?= routeTo('landing/account') ?>">My Account</a></li>
                </ul>
                <div class="mobile-login">
                    <?php if (auth()) : ?>

                        <a href="<?= routeTo('landing/logout'); ?>">Log Out</a>
                    <?php else : ?>
                        <a href="<?= routeTo('landing/login'); ?>">Log in</a> |

                        <a href="<?= routeTo('landing/register'); ?>">Create Account</a>
                    <?php endif ?>
                </div>

            </div>
        </div>

        <!--=========================-->
        <!--=        Breadcrumb         =-->
        <!--=========================-->

        <section class="breadcrumb-area">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bc-inner">
                            <p><a href="<?= routeTo('landing/index') ?>">Landing |</a> <?php get_title() ?></p>
                        </div>
                    </div>
                    <!-- /.col-xl-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>