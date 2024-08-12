
<?php
        include 'include/header.php';
        include 'config.php';
  ?> 
<div class="dashboard d-flex justify-content-between align-items-center pe-4">
                    <div class="h4">Add Subcategory</div>
                    <div class="dsbrdLite h6">Dashboard / Subcategory</div>
                </div>

             <?php 
                if (!empty($_REQUEST['edit'])) {

                    $edit_id = mysqli_real_escape_string($db, $_REQUEST['edit']);        // 7
                    $edit = $db->query("SELECT * FROM `product_subcategory` WHERE psc_id = '$edit_id'");
                    $edit_value = $edit->fetch_object();

                    $psc_name = $edit_value->psc_name;
                    $description = $edit_value->description;

                }else{
                    $psc_name = '';
                    $description = '';
                }
            ?>

 <div class="p-3 pt-4">
  <div class="row order">
    <div class="category row">
        <div class="add-category col-md-4">
            <div class="add-cate-head">
                <p class="heading1">Add Subcategory</p>
            </div>
        <div class="add-cate-head2">
            <form action="action/manage_subcatagory.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input" class="lb-1" style="color:#333333;">Select Category</label>


                    <select name="pc_id" id="" class="form-control form-select">
                        <option value="">Select</option>
                        <?php
                            $catagory = $db->query("SELECT * FROM product_category");
                            while($catagory_value = $catagory->fetch_object()){
                        ?>

                        <option  
                        <?php if(!empty($_REQUEST['edit'])){
                            if(!empty( $edit_value->pc_id ) ){
                                if($edit_value->pc_id === $catagory_value->pc_id){
                                    echo 'selected';
                                }
                            }
                        } ?>   value="<?=$catagory_value->pc_id;?>">
                            <?=$catagory_value->pc_name;?>
                        </option>


                        <?php } ?>
                    </select>
        </div>
            <div class="form-group">
                <label for="input" class="lb-1" style="color:#333333;">Sub-Category Name</label>
                <input type="text" id="input" name="psc_name" placeholder="Name" value="<?=$psc_name;?>" class=" form-control ms-3 mt-2  category-input-file-text">
            </div>
            <div class="form-group">
                <label for="file" class="lb-1" style="color:#333333;">Upload Image <span class="header-content22">1000 * 1000</span> </label>
                <input type="file" id="file" name="psc_image" accept="image/*" class=" form-control ms-3 mt-2  category-input-file-text">
            </div>
            <div>
                <label for="input" class="lb-1" style="color:#333333;">Description</label>
                <br>
                <textarea rows="#" cols="#" name="description" class="form-control  ms-3 mt-2  category-input-file-text category-text"><?=$description;?></textarea>
            </div> 
            <div> 
        <?php 
            if (!empty($_REQUEST['edit'])) {
            ?>
                <input type="hidden" name="psc_id" value="<?=$_REQUEST['edit'];?>">
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
          <p class="heading2">View Subcategory</p>
          </div>
          <div class="viewcategory-table">
              <table class="table table-bordered table-striped">
                  <tr>
                      <th>SL no</th>
                      <th>Action</th>
                      <th>Category Name</th>
                      <th>Sub-Category Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Date of Add</th>
                  </tr>
                  <?php

                //   $data = $db->query("SELECT * FROM `product_subcategory` LEFT JOIN `product_category` ON product_subcategory.pc_id = product_category.pc_id");

                   $data = $db->query("SELECT product_subcategory.*, product_category.pc_name as product_category_name FROM `product_subcategory` 
                   LEFT JOIN `product_category` ON product_subcategory.pc_id = product_category.pc_id");



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
                            <a href="action/manage_subcatagory.php?submit=delete&psc_id=<?=$value->psc_id;?>" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>

                            <a href="?edit=<?=$value->psc_id;?>" class="btn btn-success"> <i class="fa-solid fa-pen"></i>   </a>
                        </div>
                     </td>
                     <td><?=$value->product_category_name;?></td> 
                    <td><?=$value->psc_name;?></td>
                    <td>
                    <?php 
                                if (empty($value->psc_image)){
                                    echo 'N/A';
                                }else{
                           ?>    
                                <img src="image_storage/<?=$value->psc_image?>" class="img-fluid" width="55" alt=""> 
                               
                        <?php } ?>
                </td>
                <td><?=$value->description;?></td>   
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
     <?php
        include 'include/footer.php';
     ?>