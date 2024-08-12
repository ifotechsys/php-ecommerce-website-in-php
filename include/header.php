<?php 
    session_start();
    include 'admin_pannel/config.php';
    // echo '<pre>';
    // print_r($_SERVER);
    //     echo '</pre>';

    if ($_SERVER['REQUEST_SCHEME'] === 'http') {
        $protocol = 'http://';
    }else{
        $protocol = 'https://';
    }

    global $url;

    $url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?=keywords;?>">
    <title><?=title;?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <link rel="shortcut icon" href="https://www.jiomart.com/assets/ds2web/jds-icons/favicon.svg" type="image/x-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://kit.fontawesome.com/221cbd1801.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .carousel-wrap {
            /* margin: 90px auto; */
            padding: 0 2%;
            width: 100%;
            position: relative;
        }

        /* fix blank or flashing items on carousel */
        .owl-carousel .item {
            position: relative;
            z-index: 100;
            -webkit-backface-visibility: hidden;
        }

        /* end fix */
        .owl-nav>div {
            margin-top: -26px;
            position: absolute;
            top: 50%;
            color: #cdcbcd;
        }

        .owl-nav i {
            font-size: 17px;
            padding: 10px 13.5px;
            border-radius: 50%;
            background-color: #f5f5f5d4;
        }

        .owl-nav .owl-prev {
            left: -50px;
        }

        .owl-nav .owl-next {
            right: -50px;
        }

        .owl-nav i:hover {
            color: #0078AD;
            border-color: #8fdafa;
        }
    </style>
</head>

<body>
    <!-- ---header--- -->
    <div class="header sticky-top">
        <!-- ---navigation_bar--- -->
        <nav class="navbar myNav">
            <div class="container-fluid">
                <div class="left_nav d-md-flex">
                    <div class="navbar-brand" href="#">
                        <i class="fa-solid fa-bars mySliderIcon" data-bs-toggle="offcanvas"
                            data-bs-target="#side-Navbar"></i>
                    </div>
                    <a href="index.php" class="navbar-brand h1 pt-3"> <img
                            src="https://www.jiomart.com/assets/ds2web/images/jiomart-logo.svg?v=24" alt="JioMart Logo">
                    </a>
                    <div class="myLocation mt-3">
                        <button class="btn text-white d-flex gap-2 nav-item myLocation_icon">
                            <img src="https://www.jiomart.com/assets/ds2web/jds-icons/location-icon.svg"
                                class="nav-link" alt="location">
                            <span>Deliver to <b><?=defivery_adress;?></b></span>
                        </button>
                    </div>
                </div>

                <div class="right-nav d-md-flex gap-2">

                    <!-- ---search bar--- -->
                    <div class="search_icon position-absolute"><img src="images/svg_images/search-icon.svg"
                            alt="search-icon"></div>

                    <form role="search" data-bs-toggle="modal" data-bs-target="#mySearch">
                        <input class="form-control mySearchbar ps-5 pe-5" placeholder="Search JioMart"
                            aria-label="Search">
                    </form>

                    <div class="list_icon position-absolute" data-bs-toggle="modal" data-bs-target="#mylist"><img
                            src="images/svg_images/list-icon.svg" alt="list-icon"></div>

                    <button class="cardIcon" aria-label="cart icon">
                        <a href="addtocart.php"><img
                                src="https://www.jiomart.com/assets/ds2web/jds-icons/cart-icon.svg" alt="myBag"></a>
                    </button>
                        <?php
                            if (!empty($_SESSION['u_id'])) {
                                $u_id = $_SESSION['u_id'];
                                $user_data = $db->query("SELECT * FROM `user` WHERE u_id = '$u_id'");
                                $user_value = $user_data->fetch_object();

                            
                        ?>
                    <button class="SinIn">
                        <a href=""><img
                                src="https://www.jiomart.com/assets/ds2web/jds-icons/user-icon.svg" alt="SinIn">
                            <span><?=$user_value->name?></span></a>
                    </button>

                        <a class="text-danger" href="action/account.php?submit=logout">Logout</a>
                        

                        <?php } else { ?>
                    <button class="SinIn">

                        <a href="sign_in.php"><img
                                src="https://www.jiomart.com/assets/ds2web/jds-icons/user-icon.svg" alt="SinIn">
                           </a>
                    </button>


                        <?php } ?>
                </div>
            </div>

            <!-- ---side-Navbar--- -->
            <div class="offcanvas offcanvas-start menuSlider" tabindex="-1" id="side-Navbar"
                aria-labelledby="side-NavbarLabel">
                <!-- ---nav_top_section--- -->
                <div class="offcanvas-header d-flex justify-content-between pb-4 MenuSlider-top">
                    <div class="offcanvas-title" id="side-NavbarLabel">
                        <i class="fa-solid fa-chevron-left" data-bs-dismiss="offcanvas"></i>
                        <b>Hello--!</b>
                    </div>
                    <a class="" href="acount.php">
                        <img src="https://www.jiomart.com/assets/ds2web/jds-icons/profile-icon.svg" alt="Go to profile">
                    </a>
                </div>

                <!-- ---nav_body_section--- -->
                <div class="offcanvas-body sliderNav ">
                    <div class="sliderNav_content sliderHeader  ps-4 pe-4">
                        <div class="home_&_shope">
                            <ul class="navbar-nav">
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="index.php" class="nav-link"><img
                                            src="images/svg_images/home-icon.svg" class="me-2" alt="home-icon">
                                        <span class="slideLink">Home</span></a>
                                </li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/category-icon.svg" class="me-2"
                                            alt="category-icon"><span class="slideLink">Shope by Category</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- ---slideMenu--- -->
                        <div class="My_Account">
                            <p class="h6">My Account</p>
                            <ul class="navbar-nav">
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/my-order-icon.svg" class="me-2" alt="my orders"><span
                                            class="slideLink">My
                                            Order</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/my-list-viewicon.svg" class="me-2"
                                            alt="my-list"><span class="slideLink">My
                                            List</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="wishlist.php" class="nav-link"><img
                                            src="images/svg_images/wishlist-icon.svg" class="me-2"
                                            alt="wishlist-icon"><span class="slideLink">Wishlist</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/wallet-icon.svg" class="me-2" alt="wallet-icon"><span
                                            class="slideLink">JioMart Wallet</span></a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offers_&_More">
                            <p class="h6">Offers & More</p>
                            <ul class="navbar-nav">
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/offer-store-icon.svg" class="me-2"
                                            alt="offer-store"><span class="slideLink">Offer
                                            Store</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/coupon-store.svg" class="me-2"
                                            alt="coupon-store"><span class="slideLink">Coupon Store</span></a>
                                </li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/gift-store-icon.svg" class="me-2"
                                            alt="gift-store"><span class="slideLink">Gift Store</span></a></li>
                            </ul>
                        </div>

                        <div class="Help_&_Support">
                            <p class="h6">Help & Support</p>
                            <ul class="navbar-nav">
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/faqs-icon.svg" class="me-2" alt="faqs-icon"><span
                                            class="slideLink">FAQs/Need Help</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/about-us-icon.svg" class="me-2"
                                            alt="about-us-icon"><span class="slideLink">About
                                            Us</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/contact-us-icon.svg" class="me-2"
                                            alt="Contact-Us-icon"><span class="slideLink">Contact
                                            Us</span></a></li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/guide-icon.svg" class="me-2" alt="guide-icon"><span
                                            class="slideLink">Guide</span></a>
                                </li>
                                <li class="nav-item border-bottom pb-2 fw-medium"><a href="#" class="nav-link"><img
                                            src="images/svg_images/caution-notice.svg" class="me-2"
                                            alt="caution-notice-icon"><span class="slideLink">Caution Notice</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sliderButtom">
                        <div class="mb-5">
                            <div class="modal-title mb-3 h5">Download the App</div>
                            <div>
                                <a href="#"><img src="images/svg_images/google-play-icon.svg"
                                        alt="google-play-icon"></a>
                                <a href="#"><img src="images/svg_images/ios_app_icon.svg" alt="ios_app_icon"></a>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-5">
                            Should you encounter any bugs, glitches, lack of functionality, delayed deliveries, billing
                            errors or other problems on the website, please email us on <a class="text-link"
                                href="mailto:cs@jiomart.com"><?=email;?></a>
                        </div>
                    </div>
                </div>

            </div>
        </nav>

        <!-- ---navMenu--- -->
        <div class="list-nav mynavMenu">
            <ul class="nav gap-2 mynavMenuItem">

                <li class="myNav-item nav-item"><a class="myNavLink nav-link text-white"
                        href="product.php">Groceries</a>
                    <div class="myDropdown list-nav ms-2">
                        <ul class="nav flex-column">
                            <?php 
                                $data = $db->query("SELECT * FROM `product_category`");
                                while($value = $data->fetch_object()){
                                    $pc_id = $value->pc_id; // 58 , 59
                            ?>
                            <li class="dropdownTitle nav-item"><a class="dropdownLinks nav-link text-secondary"
                                    href="product.php?category=<?=$pc_id;?>"><?=$value->pc_name;?></a>
                                <div class="myDropdownCnt">
                                    <ul class="nav flex-column">
                                        <?php
                                            $data2 = $db->query("SELECT * FROM `product_subcategory` WHERE pc_id = '$pc_id'");
                                            while ($value2 = $data2->fetch_object()) {
                                                // code...
                                           
                                        ?>
                                        <li class="nav-item dropdownCnt"><a
                                                class="nav-link text-secondary dropdownCnt_Link" href="product.php?subcategory=<?=$value2->psc_id;?>"><?=$value2->psc_name;?></a></li>
                                            <?php } ?>
                                       
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>


                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>

