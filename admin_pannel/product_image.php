
<?php
        include 'include/header.php';
        include 'config.php';
  ?> 
<div class="dashboard d-flex justify-content-between align-items-center pe-4">
                    <div class="h4">Add Extra Image</div>
                    <div class="dsbrdLite h6">Dashboard / Image</div>
                </div>

             <?php 
                if (!empty($_REQUEST['edit'])) {

                    $edit_id = mysqli_real_escape_string($db, $_REQUEST['edit']);        // 7
                    $edit = $db->query("SELECT * FROM `product_extra_image` WHERE pei_id = '$edit_id'");
                    $edit_value = $edit->fetch_object();

                    
                }else{
                   
                }
            ?>

 <div class="p-3 pt-4">
  <div class="row order">
    <div class="category row">
        <div class="add-category col-md-4">
            <div class="add-cate-head">
                <p class="heading1">Add Image</p>
            </div>
        <div class="add-cate-head2">
            <form action="action/manage_product_image.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input" class="lb-1" style="color:#333333;">Select Product</label>

                    <select name="p_id" id="" class="form-control form-select">
                        <option value="">Select</option>
                        <?php
                            $catagory = $db->query("SELECT * FROM product");
                            while($catagory_value = $catagory->fetch_object()){
                        ?>

                        <option  
                        <?php if(!empty($_REQUEST['edit'])){
                            if(!empty( $edit_value->p_id ) ){
                                if($edit_value->p_id === $catagory_value->p_id){
                                    echo 'selected';
                                }
                            }
                        } ?>   value="<?=$catagory_value->p_id;?>">
                            <?=$catagory_value->product_name;?>
                        </option>


                        <?php } ?>
                    </select>
        </div>
            <div class="form-group">
                <label for="file" class="lb-1" style="color:#333333;">Upload Image <span class="header-content22">1000 * 1000</span> </label>
                <input type="file" id="file" name="image" accept="image/*" class=" form-control ms-3 mt-2  category-input-file-text">
            </div>
            <div> 
        <?php 
            if (!empty($_REQUEST['edit'])) {
            ?>
                <input type="hidden" name="pei_id" value="<?=$_REQUEST['edit'];?>">
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
       <div class="col-md-8">
          <div class="view-category">
          <p class="heading2">View Product Image</p>
          </div>
          <div class="viewcategory-table">
              <table class="table table-bordered table-striped">
                  <tr>
                      <th>SL no</th>
                      <th>Action</th>
                      <th>Product Name</th>
                      <th>Image</th>
                      <th>Date of Add</th>
                  </tr>
                  <?php

                //   $data = $db->query("SELECT * FROM `product_subcategory` LEFT JOIN `product_category` ON product_subcategory.pc_id = product_category.pc_id");

                   $data = $db->query("SELECT product_extra_image.*, product.product_name as product_name FROM `product_extra_image` 
                   LEFT JOIN `product` ON product_extra_image.p_id = product.p_id");



                      //  $data = $db->query("SELECT * FROM `product_subcategory`");      
                        if ($data->num_rows == 0) {
                            echo 'No Data Found';
                        }else {
                                $sl = 0;
                            while($value = $data->fetch_object()){
                                $sl++;

                        //   $pc_id = $value->pc_id;

                        //   $data2 = $db->query("SELECT * FROM `product_category` WHERE pc_id = '$pc_id'");

                        //   $value2 = $data2->fetch_object();
                        ?>
                <tr>
                    <td><?=$sl;?></td>
                    <td>
                        <div>
                            <a href="action/manage_product_image.php?submit=delete&pei_id=<?=$value->pei_id;?>" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>

                            <a href="?edit=<?=$value->pei_id;?>" class="btn btn-success"> <i class="fa-solid fa-pen"></i>   </a>
                        </div>
                     </td>
                     <td><?=$value->product_name;?></td> 
                    <td>
                        <?php 
                                if (empty($value->image)){
                                    echo 'N/A';
                                }else{
                           ?>    
                                <img src="image_storage/<?=$value->image?>" class="img-fluid" width="55" alt=""> 
                               
                        <?php } ?>
                    </td>
                    <td><?=$value->create_at;?></td>



            </tr>
            <?php } } ?>
            </table>
          </div>
      </div>	
     </div>
       </div>
        </div>
     <?php
        include 'include/footer.php';
     ?>