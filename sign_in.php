
<?php 
define('title', "Buy MyFitness Peanut Butter Chocolate Crunchy Peanut Butter 510 gms Online at Best Prices in India - JioMart.");
define('keywords', "JioMart");
include 'include/basic.php';
include 'include/header.php';
?>


  <div class="container">
         <div class="main_div">
           <div class="col-md-6">
                <div>
                <img src="images/signIn/signin.webp" class="image168"  alt="signIn">
                </div>
           </div>
           <div class="col-md-6 second_section">
                <div style=" padding: 0 32px; height: 490px;">
                    <h1 class="signup_tittle">Sign In</h1>
                    <p class="signup_para mt-3">to access your Addresses, Orders & Wishlist.</p>
                <form action="action/account.php" method="POST" enctype="multipart/form-data">
                    <label class="signup_label mt-3">Email</label>
                    <input type="email" name="email" class="signup_input">
                    <label class="signup_label mt-4">Password</label>
                    <input type="password" name="password" class="signup_input">
                    <button type="submit" name="submit" value="login" class="signin_log">Login Button</button>
                    </form>
                    <a href="sign_up.php" class="An">Create An account</a>
                </div>
           </div>
         </div>
  </div>


  
<!-- -----srarch-Bar popup----- -->
<div class="modal mt-5" id="mySearch">
    <div class="modal-dialog modal-md">
        <div class="modal-content myModalContent">
            <div class="modal-body myModalBody">
                <div class="Discover_more mt-4">
                    <h2 class="fs-5">Discover More
                    </h2>
                    <div class="button">
                        <button type="button" class="btn searchButton"><a class="text-black"
                                href="#">Biscuits</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">sugar</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">oil</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">mustard
                                oil</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">atta</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">bharat
                                rice</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">surf
                                excel</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black"
                                href="#">chocolate</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">ghee</a></button>
                        <button type="button" class="btn searchButton"><a class="text-black" href="#">magie</a></button>
                    </div>
                </div>
                <div class="Popular_Categories mt-5">
                    <h6>Popular Categories</h6>
                    <div class="d-md-flex overflow-x-auto gap-4">
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                        <div class="categories">
                            <img src="images/beauty.webp" alt="categories">
                            <p>Beauty</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- -----srarch-Bar list-popup----- -->
<div class="modal" id="mylist">
    <div class="modal-dialog modal-md">
        <div class="modal-content listPopup_cnt">
            <div class="modal-header Shopping">
                <h2 class="h3">Shopping List</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="shopping-list-subtext modal-body myModelBody">
                <p class="subtext">Search multiple products by entering
                    your shopping list below.</p>
                <div class="wrapper">
                    <label class="field-label subtext" for="shopping-list">Enter
                        Item List</label>
                    <textarea id="rel_search_val" name="shopping-list" type="textarea" rows="1"
                        placeholder="e.g. Milk, Bread, Fruit" class="input-component custom-scrollbar"></textarea>
                </div>
                <p class="subtext">Add comma as separatror</p>
            </div>

            <div class="modal-footer myModelFooter">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 listPopup_btn listPopup_Close_btn">
                            <button class="btn Close_btn" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6 listPopup_btn">
                            <button class="btn btn-primary Submit_btn" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php'?>


    
</body>
</html>