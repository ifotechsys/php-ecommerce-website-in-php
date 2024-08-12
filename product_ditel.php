<?php 
define('title', "Buy MyFitness Peanut Butter Chocolate Crunchy Peanut Butter 510 gms Online at Best Prices in India - JioMart.");
define('keywords', "Buy MyFitness Peanut Butter Chocolate Crunchy Peanut Butter 510 gms online. Shop from our wide range of items in Groceries at JioMart & avail great discounts. Order today! ✔ COD");
include 'include/basic.php';
include 'include/header.php';
if (empty($_REQUEST['slug'])) {
  echo '<script>window.location.replace("product.php")</script>';
  exit();
}
$slug = mysqli_real_escape_string($db, $_REQUEST['slug']);
$data = $db->query("SELECT * FROM `product` WHERE slug = '$slug'");
if ($data->num_rows == 0) {
      echo '<script>window.location.replace("product.php")</script>';
  exit();
}
$value = $data->fetch_object();

$pc_id = $value->pc_id;

$p_id = $value->p_id;


$category_data = $db->query("SELECT * FROM `product_category` WHERE pc_id = '$pc_id'");
$category_value = $category_data->fetch_object();


?>
<div class="main mt-4 mb-4 ms-5 me-5">
        <div class="container-fluid">
                <nav
                        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                        <ol class="breadcrumb myProduct_nav">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">All Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"><?=$value->product_name;?></a>
                                </li>
                        </ol>
                </nav>
                <div class="productManCnt">
                        <div class="row">
                                <div class="col-md-1">
                                        <div class="swiper-thumb">
                                                <div
                                                        class="swiper-thumb-button-prev d-md-flex justify-content-center rounded-pill">
                                                        <img src="images/product/product-svg/angle-top-dark-icon.svg"
                                                                alt=" swiper-thumb-button-prev">
                                                </div>
                                                <div class="swiper-thumb-wrapper overflow-y-auto">
                                                        <div class="swiper_thumbItem card">
                                                                <img src="admin_pannel/image_storage/<?=$value->product_image;?>"
                                                                        class="card-img-top"
                                                                        onclick="changeImage(this.src)"
                                                                        alt="peanut-butter">
                                                        </div>

                                                        <?php
                                                                $extra_image = $db->query("SELECT * FROM `product_extra_image` WHERE p_id = '$p_id'");
                                                                while($extra_image_value = $extra_image->fetch_object()){
                                                        ?>
                                                        <div class="swiper_thumbItem card">
                                                                <img src="admin_pannel/image_storage/<?=$extra_image_value->image;?>"
                                                                        class="card-img-top"
                                                                        onclick="changeImage(this.src)"
                                                                        alt="peanut-butter">
                                                        </div>
                                                <?php } ?>


                                                </div>
                                                <div class="swiper-thumb-button-prev d-md-flex justify-content-center rounded-pill"
                                                        style="transform: rotate(180deg);">
                                                        <img src="images/product/product-svg/angle-top-dark-icon.svg"
                                                                alt=" swiper-thumb-button-prev">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-5 ">
                                        <div class="tab-content">
                                                <div class="card myCardImage" id="peanut-butter1">
                                                        <img src="admin_pannel/image_storage/<?=$value->product_image;?>"
                                                                class="card-img-top" id="thumImage"
                                                                alt=" swiper-thumb-button-prev">
                                                </div>
                                        </div>
                                        <div class="addToCart d-grid mt-4">
                                                <button type="button" class="btn rounded-pill ">Add to
                                                        Cart</button>
                                        </div>
                                </div>
                                <div class="col-md-6 container">
                                        <div class="productBrand">
                                                <a href="#"><?=$category_value->pc_name;?></a>
                                        </div>
                                        <div class="pt-3 pb-3">
                                                <div class="productName">
                                                        <p> <?=$value->product_name;?></p>
                                                </div>
                                                <div class="productAction d-md-flex  justify-content-between">
                                                        <div class="d-md-flex">
                                                                <div><img src="images/product/product_ditel/svg/star-icon.svg"
                                                                                alt="star-icon"></div>
                                                                <div><img src="images/product/product_ditel/svg/star-icon.svg"
                                                                                alt="star-icon"></div>
                                                                <div><img src="images/product/product_ditel/svg/star-icon.svg"
                                                                                alt="star-icon"></div>
                                                                <div><img src="images/product/product_ditel/svg/star-icon.svg"
                                                                                alt="star-icon"></div>
                                                                <div><img src="images/product/product_ditel/svg/star-icon.svg"
                                                                                alt="star-icon"></div>
                                                        </div>
                                                        <div class="d-md-flex  justify-content-around">
                                                                <div class="wishlist-icon_d me-3"><img
                                                                                src="images/svg_images/wishlist-icon.svg"
                                                                                alt="wishlist-icon"></div>
                                                                <div class="shareIcon"><img
                                                                                src="images/product/product_ditel/svg/share-desktop-icon.svg"
                                                                                alt="share-desktop-icon"></div>
                                                        </div>
                                                </div>
                                <?php 
                                        $saling_price = $value->product_saling_price;
                                        $market_price = $value->product_marcket_price;
                                        $discount = $market_price - $saling_price;
                                        $discount = ($discount/$market_price) * 100;
                                        $discount = round($discount,2);
                                ?>



                                                <div class="productPrice">
                                                        <span class="h4">₹ <?php echo number_format($value->product_saling_price,2) ?></span>
                                                        <span class="myprd_Discount bg-body-secondary ms-2"><?=$discount;?>%
                                                                Off</span>
                                                </div>
                                                <div class="mrp">
                                                        <span>M.R.P</span>
                                                        <span class="prd_orgPrice"><del>₹ <?php echo number_format($value->product_marcket_price,2) ?></del></span>
                                                        <span class="allTaxes">(Incl. of all taxes)</span>
                                                </div>
                                        </div>
                                        <div class="offer2 pt-3 pb-2">
                                                <div class="offers"> Offers (2)</div>

                                                <div class="bank_Offers d-md-flex">
                                                        <div style="position: relative; top: 28px;" class="me-2">
                                                                <img src="images/product/product_ditel/svg/bank-offer-icon.svg"
                                                                        alt="bank-offer-icon">
                                                        </div>
                                                        <div style="width: 100%;">
                                                                <div class="bank_offer mt-3">BANK OFFERS</div>
                                                                <div class="contentText">
                                                                        <span class="new">Get upto Rs.75
                                                                                Cashback
                                                                                on your
                                                                                first ever Mobikwik
                                                                                Wallet
                                                                                transaction on JioMart .
                                                                                Min.Order Value
                                                                                of Rs
                                                                                499</span>
                                                                        <span class="newRight-icon"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#viewAll_BankOffer"
                                                                                aria-controls="offcanvasRight">
                                                                                <img src="images/product/product_ditel/svg/chevron-right-icon.svg"
                                                                                        alt="right-icon">
                                                                        </span>
                                                                </div>
                                                                <p class="twoOffers"> 2 Offer/s Available </p>
                                                        </div>
                                                        <div>

                                                        </div>
                                                </div>
                                                <div class="viewAll">
                                                        <button class="btn rounded-pill" data-bs-toggle="offcanvas"
                                                                data-bs-target="#viewAll_BankOffer"
                                                                aria-controls="offcanvasRight">View All</button>
                                                </div>
                                        </div>
                                        <div class="Deliver pt-3">
                                                <div class="deliverTo">Deliver to</div>
                                                <div class="d-md-flex justify-content-between pt-3 myDeliveryAdrs">
                                                        <p>
                                                                <span class="pin pe-3">400020</span>
                                                                <span class="adsName">Mumbai</span>
                                                        </p>
                                                        <div class="product-delivery-to-icon" data-bs-toggle="modal"
                                                                data-bs-target="#delivery-to-icon">
                                                                <i class="fa-solid fa-pen"></i>
                                                        </div>
                                                </div>
                                                <div class="d-md-flex">
                                                        <div class="stock">In Stock</div>
                                                        <div class="delivery_dt">Delivery Between 30th Mar to
                                                                31st Mar
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="Sold_by mt-4 mb-3 pt-3 pb-3">
                                                <div class="sold">Sold by</div>
                                                <div class="mt-2">
                                                        <a href="#" class="soldContent">TANVI FITNESS PRIVATE
                                                                LIMITED</a>
                                                </div>
                                        </div>
                                        <div class="Features">
                                                <div class="FeaturesItem_head"> Features & Details </div>
                                                <div class="FeaturesItem">
                                                        <?=$value->product_long_description?>
                                                </div>
                                        </div>
                                        <div class="Description pt-3 pb-3">
                                                <div class=" DescriptionCnt"> Description </div>
                                                <div class="DescriptionItem"></div>
                                                <div class="DescriptionDitel pt-2">
                                                        <button type="button" class="btn rounded-pill">More
                                                                Details</button>
                                                </div>
                                        </div>
                                        <div class="d-md-flex mt-3 mb-2">
                                                <div class="artid"> Article ID: <span>RVXCNCBPBK</span></div>
                                                <div><img src="images/product/product_ditel/svg/copy-desktop-icon.svg"
                                                                alt="copy-desktop-icon"></div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>


<div class="boughTogether pb-5">
        <div class="container-fluid ps-5 pe-5 Bannre2_2 ">
                <p class=" h6 p-3 MaxSaving"> Similar Products </p>
                <div class="d-md-flex overflow-x-scroll">

                        <?php 
                                $similar = $db->query("SELECT * FROM `product` WHERE pc_id = '$pc_id' AND p_id != '$p_id'");
                                while($similar_value = $similar->fetch_object()){
                        ?>

                        <div class="card myProduct ">
                                <div class="wishlist">
                                        <span class="wishlist-icon">
                                                <img src="images/svg_images/wishlist-icon.svg" alt="wishlist-icon">
                                        </span>
                                </div>
                                <a href="#">
                                        <img src="admin_pannel/image_storage/<?=$similar_value->product_image;?>"
                                                class="card-img-top" style="width: 300px !important;" alt="gas-stove-product">
                                        <div class="card-body">
                                                <div class="card-text text-secondary mb-3"> <?=$similar_value->product_name?> </div>
                                                <div class="h6 text-black">₹ <?php echo number_format($similar_value->product_saling_price,2) ?></div>
                                                <div class="d-md-flex gap-2">
                                                        <span class="text-body-tertiary myPrice"><del> ₹ <?php echo number_format($similar_value->product_marcket_price,2) ?>
                                                                </del></span>
  <?php 
                                        $saling_price = $value->product_saling_price;
                                        $market_price = $value->product_marcket_price;
                                        $discount = $market_price - $saling_price;
                                        $discount = ($discount/$market_price) * 100;
                                        $discount = round($discount,2);
                                ?>


                                                        <span class="bg-body-secondary fw-medium myDiscount">
                                                                 <?=$discount;?>%
                                                                OFF </span>
                                                </div>
                                                <div class="addonButton d-grid">
                                                        <button class="btn btn-outline-secondary btn-block d-md-flex gap-5 ps-4 "
                                                                type="button">
                                                                <span>Add</span>
                                                                <span class="plus">+</span>
                                                        </button>
                                                </div>
                                        </div>
                                </a>
                        </div>
                <?php } ?>


                </div>
        </div>
</div>


<div class="feedBack pb-5">
        <div class="container-fluid">
                <div class="row">
                        <div class="feedBackContent col-md-4">
                                <h2 class="h1 feedBackHeader">Ratings & Reviews</h2>
                                <div class="feedbackReview-rating d-flex">
                                        <div class="col-md-4">
                                                <div class="feedbackRating-font">
                                                        <span>3.7</span>
                                                </div>
                                                <div class="feedbackRating-star">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-regular fa-star-half-stroke"></i>
                                                        <i class="fa-solid fa-star text-success opacity-25"></i>
                                                </div>
                                                <span class="feedbackRating-count"><span>67</span>
                                                        ratings</span>
                                        </div>
                                        <div class="col-md-8">
                                                <div class="feedbackProgress-container">
                                                        <div class="feedbackRating-desc d-md-flex gap-2">
                                                                <div class="feedbackRating-text">5</div>
                                                                <div><i class="fa-solid fa-star text-success opacity-25"></i>
                                                                </div>
                                                                <div class="progress" style="width: 100%;">
                                                                        <div class="progress-bar  bg-warning"" style="
                                                                                width: 49%;"></div>
                                                                </div>
                                                                <div>
                                                                        <p>43%</p>
                                                                </div>
                                                        </div>
                                                        <div class="feedbackRating-desc d-md-flex gap-2">
                                                                <div class="feedbackRating-text">4</div>
                                                                <div><i class="fa-solid fa-star text-success opacity-25"></i>
                                                                </div>
                                                                <div class="progress" style="width: 100%;">
                                                                        <div class="progress-bar  bg-warning"" style="
                                                                                width: 22%;"></div>
                                                                </div>
                                                                <div>
                                                                        <p>22%</p>
                                                                </div>
                                                        </div>
                                                        <div class="feedbackRating-desc d-md-flex gap-2">
                                                                <div class="feedbackRating-text">3</div>
                                                                <div><i class="fa-solid fa-star text-success opacity-25"></i>
                                                                </div>
                                                                <div class="progress" style="width: 100%;">
                                                                        <div class="progress-bar  bg-warning"" style="
                                                                                width: 22%;"></div>
                                                                </div>
                                                                <div>
                                                                        <p>22%</p>
                                                                </div>
                                                        </div>
                                                        <div class="feedbackRating-desc d-md-flex gap-2">
                                                                <div class="feedbackRating-text">2</div>
                                                                <div><i class="fa-solid fa-star text-success opacity-25"></i>
                                                                </div>
                                                                <div class="progress" style="width: 100%;">
                                                                        <div class="progress-bar  bg-warning"" style="
                                                                                width: 10%;"></div>
                                                                </div>
                                                                <div>
                                                                        <p>10%</p>
                                                                </div>
                                                        </div>
                                                        <div class="feedbackRating-desc d-md-flex gap-2">
                                                                <div class="feedbackRating-text">1</div>
                                                                <div><i class="fa-solid fa-star text-success opacity-25"></i>
                                                                </div>
                                                                <div class="progress" style="width: 100%;">
                                                                        <div class="progress-bar  bg-warning"" style="
                                                                                width: 14%;"></div>
                                                                </div>
                                                                <div>
                                                                        <p>14%</p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<?php include 'include/footer.php' ?> 