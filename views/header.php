<!doctype html>
<html>

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php get_title() ?></title>

    <!-- Fav Icon -->

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

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="<?= asset('assets/landing/assets/css/app.css') ?>" type="text/css">




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
                                <p><i class="far fa-flag"></i><a href="contact.html">Indonesia, Jakarta</a></p>

                                <p><i class="far fa-envelope"></i><a href="#">admin@mail.com</a></p>
                            </div>
                        </div>
                        <!-- Col -->
                        <div class="col-lg-6">
                            <div class="top-bar-right">
                                <div class="social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
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
                                <img src="<?= asset('assets/landing/media/images/logo.png') ?>" alt="">
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
                                <!-- <li class="top-search style-two"><a href="javascript:void(0)"><i class="flaticon-magnifying-glass"></i></a>
                                    <input type="text" class="search-input" placeholder="Search">
                                </li> -->
                                <!-- <li><a href="#"><i class="flaticon-like"></i></a></li> -->
                                <li class="top-cart"><a href="javascript:void(0)"><i class="flaticon-bag"></i><span>2</span></a>

                                    <div class="cart-drop">
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <img alt="" src="media/images/product/car1.jpg">
                                            </div>
                                            <div class="cart-title">
                                                <p><a href="">Aliquam Consequat</a></p>
                                            </div>
                                            <div class="cart-price">
                                                <p>1 x $500</p>
                                            </div>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>

                                        <div class="cart-bottom">

                                            <div class="cart-checkout">
                                                <a href="<?= routeTo('landing/cart'); ?>"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                            </div>

                                        </div>
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
                        <div class="logo">
                            <a href="<?= routeTo('landing/index') ?>">
                                <img src="<?= asset('assets/landing/media/images/logo.png') ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="top-cart">
                            <a href="javascript:void(0)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> (2)</a>
                            <div class="cart-drop">
                                <div class="single-cart">
                                    <div class="cart-title">
                                        <p><a href="">Aliquam Consequat</a></p>
                                    </div>
                                    <div class="cart-price">
                                        <p>1 x $500</p>
                                    </div>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>

                                <div class="cart-bottom">
                                    <div class="cart-checkout">
                                        <a href="<?= routeTo('landing/cart'); ?>"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
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
                            <img src="media/images/logo.png" alt="">
                        </a></li>
                    <li><a href="#" class="closeme"><i class="flaticon-close"></i></a></li>
                    <li>
                        <a href="<?= routeTo('landing/index') ?>" class="link">Home</a>

                    </li>
                    <li>
                        <?php if (auth()) : ?>
                            <a href="<?= routeTo('landing/logout') ?>" class="link">Logout</a>
                        <?php else : ?>
                            <a href="<?= routeTo('landing/login') ?>" class="link">Login</a>
                        <?php endif ?>
                    </li>


                </ul>
                <div class="mobile-login">
                    <a href="<?= routeTo('landing/login'); ?>">Log in</a> |
                    <a href="<?= routeTo('landing/register'); ?>">Create Account</a>
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