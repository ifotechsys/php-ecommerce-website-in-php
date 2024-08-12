
<?php
        include 'include/header.php';
        include 'config.php';
  ?> 

    <div class="dashboard d-flex justify-content-between align-items-center pe-4">
                    <div class="h4">Add Slider</div>
                    <div class="dsbrdLite h6">Dashboard / Slider</div>
                </div>
                <div class="p-3 pt-4">
                    <div class="row order">

             <?php 
                if (!empty($_REQUEST['edit'])) {
                    $edit_id = mysqli_real_escape_string($db, $_REQUEST['edit']);        // 7
                    $edit = $db->query("SELECT * FROM `banner` WHERE b_id  = '$edit_id'");
                    $edit_value = $edit->fetch_object();

                    $tittle = $edit_value->tittle;
                    $description = $edit_value->description;
                }else{
                    $tittle = '';
                    $description = '';
                }
            ?>

    <div class="category row">
        <div class="add-category col-md-4">
            <div class="add-cate-head">
                <p class="heading1">Add Slider</p>
            </div>
            <div class="add-cate-head2">
                <form action="action/manage_dextop_banner.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="input" class="lb-1" style="color:#333333;">Title</label>
                      <input type="text" id="input" name="tittle" value="<?=$tittle;?>" placeholder="Name"  class=" form-control ms-3 mt-2  category-input-file-text">
                  </div>
                  <div class="form-group">
                      <label for="file" class="lb-1" style="color:#333333;">Upload Image <span class="header-content22">1000 * 1000</span> </label>
                      <input type="file" id="file" name="image" value="" accept="image/*"  class=" form-control ms-3 mt-2  category-input-file-text">
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
                            <input type="hidden" name="b_id" value="<?=$_REQUEST['edit'];?>">
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
          <p class="heading2">View Slider</p>
          </div>
          <div class="viewcategory-table">
              <table class="table table-bordered table-striped">
                  <tr>
                      <th>SL no</th>
                      <th>Action</th>
                      <th>Product name</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Date of Add</th>
                  </tr>

                    <?php

                        $data = $db->query("SELECT * FROM `banner`");      

                        if ($data->num_rows == 0) {
                            echo 'No Data Found';
                        }else {
                                $sl = 0;
        					while($value = $data->fetch_object()){
        						$sl++;
                     ?>
                <tr>
                    <td><?=$sl;?></td>
                    <td>
                        <div>
                            <a href="action/manage_dextop_banner.php?submit=delete&b_id=<?=$value->b_id;?>" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>
                            <a href="?edit=<?=$value->b_id;?>" class="btn btn-success"> <i class="fa-solid fa-pen"></i>   </a>
                        </div>
                     </td>
                    <td><?=$value->tittle;?></td>
                    <td><?=$value->description;?></td>
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
                                    <!-- QUESTION : - create at pare ame update kale sea sea create at jagare kamiti print heba -->
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