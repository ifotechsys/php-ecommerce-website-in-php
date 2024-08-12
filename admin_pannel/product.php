
<?php
        include 'include/header.php';
        include 'config.php';
  ?> 

    <div class="dashboard d-flex justify-content-between align-items-center pe-4">
                    <div class="h4">Add Product</div>
                    <div class="dsbrdLite h6">Dashboard / Product</div>
                </div>
                <div class="p-3 pt-4">
                    <div class="row order">

                    
             <?php 
                if (!empty($_REQUEST['edit'])) {
                    $edit_id = mysqli_real_escape_string($db, $_REQUEST['edit']);        // 7
                    $edit = $db->query("SELECT * FROM `product` WHERE p_id = '$edit_id'");
                    $edit_value = $edit->fetch_object();

                    $product_name = $edit_value->product_name;
                    $product_saling_price = $edit_value->product_saling_price;
                    $product_marcket_price = $edit_value->product_marcket_price;
                    $product_long_description = $edit_value->product_long_description;
                }else{
                    $product_name = '';
                    $product_saling_price = '';
                    $product_marcket_price = '';
                    $product_long_description = '';
                }
            ?>


    <div class="category row">
        <div class="add-category col-md-12">
            <div class="add-cate-head">
                <p class="heading1">View Product</p>
            </div>
            <div class="add-cate-head2">
                <form action="action/manage_product.php" method="post" enctype="multipart/form-data">
        <div class="d-flex">
           <div class="form-group">
               <label for="input" class="lb-1" style="color:#333333; width: 185px;">Select Category</label>
               <select name="pc_id" class=" form-control ms-3 mt-2 category-input-file-text form-select"  style=" width: 380px; height: 38px; margin-left: 50px; ">
                      <option>Select</option>
                        <?php
                             $catagory = $db->query("SELECT * FROM product_category");
                             while($catagory_value = $catagory->fetch_object()){
                            ?>
                    <option 
                    <?php if(!empty($_REQUEST['edit'])){
                        if(!empty($edit_value->pc_id)){
                            if($edit_value->pc_id === $catagory_value->pc_id){
                                echo'selected';
                        }
                    }
                    } ?>  value="<?=$catagory_value->pc_id;?>">
                        <?=$catagory_value->pc_name;?>
                </option>
                    <?php } ?>
                </select>    
            </div>
<div class="form-group">
    <label for="input" class="lb-1" style="color:#333333; width: 185px;">Select Sub-category</label>
    <select name="psc_id" class=" form-control ms-3 mt-2 category-input-file-text form-select" style=" width: 380px; height: 38px;">
    <option>Select</option>
            <?php
                    $catagory = $db->query("SELECT * FROM product_subcategory");
                    while($catagory_value = $catagory->fetch_object()){
                ?>
                    <option 
                    <?php if(!empty($_REQUEST['edit'])){
                        if(!empty($edit_value->psc_id)){
                            if($edit_value->psc_id === $catagory_value->psc_id){
                                echo'selected';
                        }
                    }
                    } ?>  value="<?=$catagory_value->psc_id;?>">
                        <?=$catagory_value->psc_name;?>
                </option>
                    <?php } ?>
                </select>        
        </div>
    <div class="form-group">
    <label for="input" class="lb-1" style="color:#333333; width: 185px;">Product Name</label>
    <input type="text" id="input" name="product_name" placeholder="Name" value="<?=$product_name;?>" class=" form-control ms-3 mt-2  category-input-file-text" style=" width: 380px; height: 38px;">
</div> 
</div>
        <div class="d-flex">
        <div class="form-group">
                <label for="input" class="lb-1" style="color:#333333; width: 185px;">Saling Price</label>
                <input type="text" id="input" name="product_saling_price" placeholder="Price" value="<?=$product_saling_price;?>" class=" form-control ms-3 mt-2  category-input-file-text" style=" width: 380px; height: 38px;">
            </div>
            <div class="form-group">
                <label for="input" class="lb-1" style="color:#333333; width: 185px;">Market Price</label>
                <input type="text" id="input" name="product_marcket_price" value="<?=$product_marcket_price;?>" placeholder="Marcket Price" class=" form-control ms-3 mt-2  category-input-file-text" style=" width: 380px; height: 38px;">
            </div>
            <div class="form-group">
                <label for="input" class="lb-1" style="color:#333333; width: 185px;">Image</label>
                <input type="file" id="file" name="product_image" value="" accept="image/*"  class=" form-control ms-3 mt-2  category-input-file-text" style=" width: 380px; height: 38px;">
            </div>
        </div>
        <div>
                      <label for="input" class="lb-1" style="color:#333333;">Description</label>
                      <br>
                      <textarea rows="#" cols="#" name="product_long_description" class="form-control  ms-3 mt-2  category-input-file-text category-text"><?=$product_long_description;?></textarea>
                  </div> 
                  <div> 
                  <?php 
                        if (!empty($_REQUEST['edit'])) {
                    ?>
                            <input type="hidden" name="p_id" value="<?=$_REQUEST['edit'];?>">
                            <button type="submit" value="update" name="submit" class="btn lb-1 categorysubmit mb-3 ms-3">Update</button>
                            <?php
                     }else{
                            ?>
                            <button type="submit" value="register" name="submit" class="btn lb-1 categorysubmit mb-3 ms-3">Register</button>
                            <?php 
                            }
                        ?>

                  </div>
             </form>
          </div>
      </div>
    </div>
  </div>
</div>


        <div class="p-3 pt-4">
          <div class="row order">
            <div class="category row">
             <div class="add-category col-md-12">
                <div class="add-cate-head">
                  <p class="heading1">View Product</p>
            </div>
               <div class="add-cate-head2">
                 <div class="viewcategory-table">
                   <table class="table table-bordered table-striped">
                          <tr>
                              <th>SL no</th>
                              <th>Action</th>
                              <th>Category name</th>
                              <th>Sub Category name</th>
                              <th>Product</th>
                              <th>Image</th>
                              <th>S - Price</th>
                              <th>M - Price</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Date of Add</th>
                          </tr> 
                          <?php
                   $data = $db->query("SELECT product.*, product_category.pc_name as product_category_name , product_subcategory.psc_name as product_subcategory_name FROM `product` 
                      LEFT JOIN `product_category` ON product.pc_id = product_category.pc_id LEFT JOIN `product_subcategory` ON product.psc_id = product_subcategory.psc_id");
                            
                                //   $data = $db->query("SELECT * FROM `product`");      
                                    if ($data->num_rows == 0) {
                                         echo 'No Data Found';
                                    }else {
                                         $sl = 0;
                                         while($value = $data->fetch_object()){
                                         $sl++;

                                  $pc_id = $value->pc_id;


                                ?>
                               <tr>
                                <td><?=$sl;?></td>
                                <td>
                                    <div>
                                    <a href="action/manage_product.php?submit=delete&p_id=<?=$value->p_id;?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i></a>
                                        <a href="?edit=<?=$value->p_id;?>" class="btn btn-success"> <i class="fa-solid fa-pen"></i>   </a>
                                    </div>
                                </td>
                                <td><?=$value->product_category_name;?></td>
                                <td><?=$value->product_subcategory_name;?></td>
                                <td><?=$value->product_name;?></td>
                                <td>
                                    <?php 
                                            if (empty($value->product_image)){
                                                echo 'N/A';
                                            }else{
                                    ?>    
                                            <img src="image_storage/<?=$value->product_image?>" class="img-fluid" width="55" alt=""> 
                                        
                                        <?php } ?>
                                </td>
                                <td><?=$value->product_saling_price;?></td> 
                                <td><?=$value->product_marcket_price;?></td>   
                                <td><?=$value->product_long_description;?></td>
                                <td><i class="fa-solid fa-eye-slash ccc" style=" font-size: 30px; color: #337AB7; margin-left: 5px; margin-top: 10px;"></i></td>       
                                <td><?=$value->create_at;?></td>            
                            </tr>
                            <?php } } ?>
                        </table>
                      </div>
                    </div>
                 </div>
               </div>
             </div>
         </div>
 
   <?php
        include 'include/footer.php';
     ?>