<?php
    include '../config.php';
    
    if (empty($_POST['submit'])) {
        $submit = mysqli_real_escape_string($db, $_REQUEST['submit']);
     }else{
      $submit = mysqli_real_escape_string($db, $_POST['submit']);
     }

      switch ($submit) {
        case 'register':

           $pc_name =  mysqli_real_escape_string($db, $_POST['pc_name']);
           $description =  mysqli_real_escape_string($db, $_POST['description']);


        $db->query("INSERT INTO `product_category`(`pc_id`,`pc_name`,`description`) VALUES(NULL,'$pc_name','$description') ");

        $new = $db->insert_id;      // 6

      // echo '<pre>';
      // print_r($_FILES);             //ERROR FINDER

      // die();


       // IMAGE SECTION START

      if (!empty($_FILES['pc_image']['name'])){

         $old_image = $_FILES['pc_image']['name'];  
         $devid = explode('.', $old_image);             
         $currrent_name = current($devid);              
         $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


      if (in_array($extension,$allow)) {        

            $rand = rand(111, 999999);
            $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
            $upload_path = '../image_storage/'.$new_image;             
            $tmp_name = $_FILES['pc_image']['tmp_name'];          
            move_uploaded_file($tmp_name, $upload_path);
            $db->query("UPDATE `product_category` SET pc_image = '$new_image' WHERE pc_id = '$new'");
          }else{
            echo 'Faild For Mismatch';
          }
       }else{
         echo 'Failed for not Found image';
      }
              header("Location:../catagory.php?success");

			break;

      case 'delete':


         $pc_id = mysqli_real_escape_string($db, $_REQUEST['pc_id']);      //TABLE ID
         $data = $db->query("SELECT * FROM `product_category` WHERE pc_id = '$pc_id'");
         
         $value = $data->fetch_object();
      if (!empty($value->pc_image)){
         $upload_path = "../image_storage/".$value->pc_image;
            unlink($upload_path);      //DELETE METHOD
      }
         $db->query("DELETE FROM `product_category` WHERE pc_id = '$pc_id'");

           header("Location:../catagory.php?success");  
           break;

      case 'update':

         $pc_id = mysqli_real_escape_string($db, $_POST['pc_id']);
         $pc_name =  mysqli_real_escape_string($db, $_POST['pc_name']);
         $description =  mysqli_real_escape_string($db, $_POST['description']);


      $db->query("UPDATE `product_category` SET pc_name = '$pc_name', description =  '$description' WHERE pc_id = '$pc_id'");

      // IMAGE UPDATE

      if (!empty($_FILES['pc_image']['name'])){

         $old_image = $_FILES['pc_image']['name'];  
         $devid = explode('.', $old_image);             
         $currrent_name = current($devid);              
         $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


      if (in_array($extension,$allow)) {

         // IMAGE DELETE CODE START

            $data = $db->query("SELECT * FROM  `product_category` WHERE pc_id = '$pc_id'");
            $value = $data->fetch_object();
            if (!empty($value->pc_image)){
               $upload_path = "../image_storage/".$value->pc_image;
                  unlink($upload_path);
            }

            // IMAGE DELETE CODE END
            
            $rand = rand(111, 999999);
            $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
            $upload_path = '../image_storage/'.$new_image;             
            $tmp_name = $_FILES['pc_image']['tmp_name'];          
            move_uploaded_file($tmp_name, $upload_path);
            $db->query("UPDATE `product_category` SET pc_image = '$new_image' WHERE pc_id = '$pc_id'");
          }else{
            echo 'Faild For Mismatch';
          }
       }else{
         echo 'Failed for not Found image';
      }
              header("Location:../catagory.php?success");

			break;

    }

    ?>