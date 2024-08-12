<?php 
define('title', "Buy Grocery Online at Best Prices Pan India");
define('keywords', "Buy MyFitness Peanut Butter Chocolate Crunchy Peanut Butter 510 gms online. Shop from our wide range of items in Groceries at JioMart & avail great discounts. Order today! ✔ COD");
include 'include/basic.php';
include 'include/header.php';
?>

<div class="container">
    <h3 class="myCart">My Cart</h3>
    <div class="row">
<?php 
            if (!empty($_SESSION['u_id'])) {

                $u_id = $_SESSION['u_id'];

                $session = session_id(); // currect session
                $cart = $db->query("SELECT * FROM `cart` LEFT JOIN `product` ON cart.p_id = product.p_id WHERE u_id = '$u_id' AND cart.status = 0");
            }else{
                $session = session_id(); // currect session
                $cart = $db->query("SELECT * FROM `cart` LEFT JOIN `product` ON cart.p_id = product.p_id WHERE session_id = '$session' AND cart.status = 0");
}


                if($cart->num_rows == 0){
 ?>
 <div class="col-md-12">

    <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-cart-5521508-4610092.png" alt="">
</div>
<?php } else{ ?>

        <div class="col-md-8">
            <?php 

                while($cart_value = $cart->fetch_object()){

            ?>
                <div class="card w-100 mb-3 basketBody">
                    <div class="card-body">
                        <div class="d-flex justify-content-between basketHeader">
                            <h5 class="card-title"><?=$cart_value->product_name;?></h5>
                            <h5 class="card-title">₹ <?php echo number_format($cart_value->price * $cart_value->qty); ?></h5>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cart-product-img">
                                    <img src="admin_pannel/image_storage/<?=$cart_value->product_image?>" alt="peanut-butter">
                                </div>
                            </div>
                            <div class="col-md-10">
                       <!--          <div class="product-name ">
                                    <span>MyFitness Peanut Butter Chocolate Smooth
                                        Peanut
                                        Butter 1250 gms</span>
                                </div> -->
                                <div>
                                    <span class="price ">₹ <?=number_format($cart_value->price)?></span>
                                    <span class="mrp-price"><del>₹ <?=number_format($cart_value->product_marcket_price)?></del></span>
                                </div>
                                <div class="offertxt ">
                                    <span>You Save ₹ <?php echo  number_format($cart_value->product_marcket_price - $cart_value->price) ?></span>
                                </div>
                                <div>
                                    <span class="sold-by">Sold by:</span>
                                    <span class="soldbyName">Techzex Software</span>
                                </div>
                            </div>
                        </div>
                        <div class="gap-2 d-md-flex justify-content-md-end plassButton">
                            <button type="button" class="btn addButton">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <button type="button" class="btn addButton">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <!-- ----step progresh----- -->
            <div class="setupLink d-md-flex justify-content-between p-2">
                <div class="stepper-item d-md-flex position-relative align-items-center completed">
                    <div class="step-counter position-relative d-md-flex justify-content-center align-items-center">
                        1</div>
                    <div class="step-name stepRich">Your Cart</div>
                </div>
                <div class="stepper-item d-md-flex position-relative align-items-center active">
                    <div class="step-counter position-relative d-md-flex justify-content-center align-items-center">
                        2</div>
                    <div class="step-name">Order Review</div>
                </div>
                <div class="stepper-item d-md-flex position-relative align-items-center active">
                    <div class="step-counter position-relative d-md-flex justify-content-center align-items-center">
                        3</div>
                    <div class="step-name">Payment</div>
                </div>
            </div>
            <?php 

                if(empty($_SESSION['u_id'])){

            ?>

            <!-- ----apply coupon---- -->
            <div class="applyCoupon card">
                <div class="card-body">
                    <div class="card-title d-md-flex gap-3">
                        <div class="coupon">
                            <img src="images/svg_images/image.svg" width="28px" alt="cupon">
                        </div>
                        <div class="couponText me-4">
                            <h5 class="">Apply Coupen</h5>
                            <p class="bestOffer">Login to see best offers &
                                promotions</p>
                        </div>
                        <div class="couponRightIcon">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <a href="sign_in.php">
                        <div class="d-grid myLoginBtn">
                            <button type="button" class="btn rounded-pill">Login</button>
                        </div>
                    </a>
                </div>
            </div>
            <!-- -----payment ditels---- -->
        <?php } ?>
            <div class="paymentDitel card">
                <div class="card-body">
                    <h5 class="pmtHeader">Payment Details</h5>
            <?php 

            if (!empty($_SESSION['u_id'])) {

                $u_id = $_SESSION['u_id'];
                
                $session = session_id(); // currect session
                $cart = $db->query("SELECT * FROM `cart` LEFT JOIN `product` ON cart.p_id = product.p_id WHERE u_id = '$u_id' AND cart.status = 0");
            }else{


                $session = session_id(); // currect session
                $cart = $db->query("SELECT * FROM `cart` LEFT JOIN `product` ON cart.p_id = product.p_id WHERE session_id = '$session' AND cart.status = 0");

            }
                while($cart_value = $cart->fetch_object()){
                        global $total_mrp;
                        global $total_amount;
                        $total_mrp += $cart_value->product_marcket_price * $cart_value->qty;  

                        $total_amount += $cart_value->price * $cart_value->qty;

                }

            ?>

                    <p class="d-flex justify-content-between pmtDitel pmtDitel1">MRP Total
                        <span class="ttlMrp">₹ <?=$total_mrp;?></span>
                    </p>
                    <p class="d-flex justify-content-between pmtDitel pmtDitel1">Product
                        Discount<span class="pmtPrice prcWidth">₹ <?=$total_mrp - $total_amount?></span></p>
                    <p class="d-flex justify-content-between pmtDitel pmtDitel1">Delivery
                        Fee (JioMart)<span class="pmtPrice prcWidth">FREE</span></p>
                    <p class="d-flex justify-content-between pmtDitel1 total">Total<span
                            class="totalPrice prcWidth">₹ <?php echo number_format($total_amount); ?></span></p>
                    <p class="pmtDitel1 pmtPrice text-end prcWidth">You Saved ₹ <?=$total_mrp - $total_amount?></</p>
                </div>
            </div>
            <a href="checkout.php">
                <div class="d-grid mt-3 mb-3 orderPlace">
                    <button type="button" class="btn rounded-pill p-2">Place Order</button>
                </div>
            </a>
        </div>

    <?php } ?>

    </div>
</div>
<?php include 'include/footer.php'?>