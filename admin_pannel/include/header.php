
<?php
    session_start();
    include 'config.php';
    if (empty($_SESSION['admin_id'])) {
    header("Location:index.php");
    exit();    //after use header location
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="dashboard.css">

</head>

<body>

    <div class="main">
        <div class="mainDash">
            <div id="sideMenu" class="side-menu">
                <div class="mobile-search">
                    <div class="nameLogo">
                        <img src="image/logo2.png" alt="logo_name">
                    </div>
                </div>

                <div class="menu-items list-nav accordion">
                    <div class="mb-4">
                        <div class="dashbordLogo_1 d-flex justify-content-center">
                            <img src="image/image1.png" alt="dashbordLogo">
                        </div>

                        <div class="d-flex justify-content-center mt-1 mb-1 dropdown yumctHead">
                            <div href="#" class="nav-link myYumcut" data-bs-toggle="dropdown" role="button"
                                aria-expanded="false">YUMCUT</div>
                            <ul class="dropdown-menu ">
                                <li class="dropdown-item">
                                    <a href="#" class="yumcutLink">Profile</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="#" class="yumcutLink">Setting</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="#" class="yumcutLink">Lock Screen</a>
                                </li>
                                <li class="logOut"></li>




                                <li class="dropdown-item ">
                                    <a href="action/account.php?submit=logout" class="yumcutLink">Logout</a>
                                </li>



                            </ul>
                        </div>

                        <div class="d-flex justify-content-center gap-2 online">
                            <span><i class="fa-regular fa-circle-dot"></i></span>
                            <span>Online</span>
                        </div>
                    </div>

                    <ul class="list-group accordion" id="sideNavDropdown">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link d-flex gap-4 myNavcnt">
                                <span><i class="fa-solid fa-house"></i></span>
                                <span>Dashbord</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="accordion-header" id="sectionOne" onclick="myFunction()" >
                                <div class="d-flex justify-content-between myNavcnt" data-bs-target="#collapseOne"
                                    data-bs-toggle="collapse">
                                    <span><i class="fa-solid fa-sitemap"></i></span>
                                    <span>Page Section</span>
                                    <span id="pls_mins"><i class="fa-solid fa-plus"></i></span>
                                </div>
                            </div>
                            <ul id="collapseOne" class="accordion-collapse collapse nav flex-column"
                                aria-labelledby="sectionOne" data-bs-parent="#sideNavDropdown">
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="dextop_banner.php">Add Dextop Banner</a>
                                </li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add Mobile Banner</a>
                                </li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add testimonials</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add location</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add Offer Banner</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add Video</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <div class="accordion-header" id="sectionOne">
                                <div class="d-flex justify-content-between myNavcnt" data-bs-target="#collapseTwo"
                                    data-bs-toggle="collapse">
                                    <span><i class="fa-solid fa-sitemap"></i></span>
                                    <span>Order Section</span>
                                    <span><i class="fa-solid fa-plus"></i></span>
                                </div>
                            </div>
                            <ul id="collapseTwo" class="accordion-collapse collapse nav flex-column"
                                aria-labelledby="sectionOne" data-bs-parent="#sideNavDropdown">
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">View Order</a>
                                </li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">View Complete Order</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <div class="accordion-header" id="sectionOne">
                                <div class="d-flex justify-content-between myNavcnt" data-bs-target="#collapseThree"
                                    data-bs-toggle="collapse">
                                    <span><i class="fa-solid fa-sitemap"></i></span>
                                    <span>Product Section</span>
                                    <span><i class="fa-solid fa-plus"></i></span>
                                </div>
                            </div>
                            <ul id="collapseThree" class="accordion-collapse collapse nav flex-column"
                                aria-labelledby="sectionOne" data-bs-parent="#sideNavDropdown">
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add Promo Code</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="catagory.php">Add Category</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="subcatagory.php">Add Subcategory</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="product.php">Add Product</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="product_image.php">Add Product Extra Image</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add unit</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add Price</a></li>
                                <li class="nav-item droupdownCnt"><a class="nav-link" href="#">Add offer</a></li>
                            </ul> 
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content">
                <div class="thardTop d-flex justify-content-between align-items-center sticky-top pe-3">
                    <div class="d-flex">
                        <div class="nav-bar">
                            <div id="menuToggle" class="toggle-menu active">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control searchBar" placeholder="Search...">
                        </div>
                    </div>
                    <div class="list-nav">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="">
                                <i class="fa-solid fa-bell myIcon"></i></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="">
                                <i class="fa-solid fa-crosshairs myIcon"></i></a>
                            </li>
                            <li class="nav-item dropdown navLogo">
                                <a class="navbar-brand nav-link" data-bs-toggle="dropdown" role="button"
                                    aria-expanded="false" href="">
                                    <img src="image/image1.png" alt="dashbordLogo">
                                </a>
                                <ul class="dropdown-menu ">
                                    <li class="dropdown-item">
                                        <a href="#" class="yumcutLink">Profile</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" class="yumcutLink">Setting</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" class="yumcutLink">Lock Screen</a>
                                    </li>
                                    <li class="logOut"></li>
                                    <li class="dropdown-item ">
                                        <a href="action/account.php?submit=logout" class="yumcutLink">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


