<?php 
define('title', "Buy Grocery Online at Best Prices Pan India");
define('keywords', "Hellow");
include 'include/basic.php';
include 'include/header.php';

    if (empty($_SESSION['u_id'])) {
        echo '<script>window.location.replace("sign_in.php")</script>';
        exit();
    }

?>
   <form action="action/checkout.php" method="POST" enctype="multipart/form-data"> 
<div class="container">
    <h5 class="mt-4 mb-4 ms-2 ordrReview">Order Review</h5>
    <div class="row">
        <div class="col-md-8">
            <div class="card deliveryDitel">
                <div class="card-body">
                    <div class="adrsSubtitle pb-3">Delivery Address</div>
                    <div class=" mt-3">
                        <div class="">
                 
                        <input type="text" placeholder="Full Name" name="full_name" class="form-control mt-2">
                        <br>
                        <input type="number" name="mobile_no" placeholder="Mobile No" class="form-control mt-2">
                        <br>
                        <input type="email" name="email_id" placeholder="Krushna@techzex.com" class="form-control mt-2">
                        <br>



                        <input type="text" name="pincode" placeholder="Pincode" class="form-control mt-2">
                       <br>
                        <!-- <input type="text" placeholder="Address" class="check_out_delivery_address"> -->
                        <textarea name="address" id="" placeholder="Address" class="form-control mt-2" ></textarea>
                        <br>
                    
                        </div>
                        <div class="adrsEdit"><i class="fa-solid fa-pen"></i></div>
                    </div>

                        
                    <!-- <div class="address">
                        <div>Gelapur , Kamadhenu Omfed ,</div>
                        <div>Jagatsinghapur 754102, Orissa</div>
                        <div>Phone: +91 - 7008438639</div>
                    </div> -->
                </div>
            </div>

                <?php 


                $u_id = $_SESSION['u_id'];

                $session = session_id(); // currect session
                $cart = $db->query("SELECT * FROM `cart` LEFT JOIN `product` ON cart.p_id = product.p_id WHERE u_id = '$u_id' AND cart.status = 0");



                while($cart_value = $cart->fetch_object()){

            ?>

            <input type="hidden" name="p_id[]" value="<?=$cart_value->p_id;?>">
            <input type="hidden" name="ct_id[]" value="<?=$cart_value->ct_id;?>">

            <div class="card mt-4 martBasket">
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
            </div>
            <?php } ?>

        </div>
        <div class="col-md-4">
            <div class="d-grid gap-3">
                <div id="multi-step-form-container">
                    <!-- Form Steps / Progress Bar -->
                    <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                        <!-- Step 1 -->
                        <li class="form-stepper-active text-center form-stepper-list step-1" step="1">
                            <a class="mx-2">
                                <span class="form-stepper-circle position-relative">
                                    <span>1</span>
                                </span>
                                <div class="label">My Cart</div>
                            </a>
                        </li>
                        <!-- Step 2 -->
                        <li class="form-stepper-unfinished text-center form-stepper-list step-2" step="2">
                            <a class="mx-2">
                                <span class="form-stepper-circle position-relative text-muted">
                                    <span class="stepTwoCircle">2</span>
                                </span>
                                <div class="label text-muted">Order Review</div>
                            </a>
                        </li>
                        <!-- Step 3 -->
                        <li class="form-stepper-unfinished text-center form-stepper-list step-3" step="3">
                            <a class="mx-2">
                                <span class="form-stepper-circle position-relative text-muted">
                                    <span>3</span>
                                </span>
                                <div class="label text-muted">Payment</div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- whatsapp order upadate -->
                <div class="card myOrderCard">
                    <div class="card-body d-md-flex">
                        <div class="d-flex align-items-center whatsappIcon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div class="enableText ms-3 align-self-center">
                            Enable order updates & important information on Whatsapp
                        </div>
                        <div class="d-flex align-items-center updateCheckbox">
                            <input type="checkbox">
                        </div>
                    </div>
                </div>

                <!-- payment detail -->
                <div class="card myPaymentCard">
                    <div class="card-body">
                        <p class="pmtDetail">Payment Details</p>

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

                $min_amount = 500;
                if ($total_amount < 500) {
                    $delivery_fee = 50;
                }else{
                    $delivery_fee = '00';
                }

                $new_total_amount = $total_amount+$delivery_fee;


            ?>




            <input type="hidden" name="delivery_fee" value="<?=$delivery_fee;?>">
            <input type="hidden" name="total_amount" value="<?=$total_amount;?>">


                        <ul class="pmtDitelBody">
                            <li class="d-flex justify-content-between FulOrderDitel">
                                <span class="orddtlText">MRP Total</span>
                                <span class="orddtlText">₹ <?=$total_mrp;?></span>
                            </li>
                            <li class="d-flex justify-content-between FulOrderDitel">
                                <span class="orddtlText">Product Discount</span>
                                <span class="prdDiscount">- 

                                    ₹ <?=$total_mrp - $total_amount?>
                                        
                            </span>
                            </li>
                            <li class="d-flex justify-content-between FulOrderDitel">
                                <span class="orddtlText">Delivery Fee (JioMart)</span>
                                <span class="dlvryFee"><?=$delivery_fee;?></span>
                            </li>
                            <li class="d-flex justify-content-between FulOrderDitel_1">
                                <span class="orddtlText">Total</span>
                                <span class="ordTotal">₹ <?php echo number_format($new_total_amount); ?></span>
                            </li>
                            <li class="text-end YouSave">You Saved ₹ <?=$total_mrp - $total_amount?></li>
                        </ul>
                    </div>
                </div>

                <!-- make payment -->
                <div>
                    <div class="d-grid makePayment">
                        <button class="btn btn-primary rounded-pill p-2" name="submit" value="submit" type="submit"> Make Payment </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


<?php include 'include/footer.php' ?>