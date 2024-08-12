<?php
    include '../config.php';
    
    if (empty($_POST['submit'])) {
        $submit = mysqli_real_escape_string($db, $_REQUEST['submit']);
     }else{
      $submit = mysqli_real_escape_string($db, $_POST['submit']);
     }

      switch ($submit) {
        case 'register':

           $tittle =  mysqli_real_escape_string($db, $_POST['tittle']);
           $description =  mysqli_real_escape_string($db, $_POST['description']);


        $db->query("INSERT INTO `banner`(`b_id`,`tittle`,`description`) VALUES(NULL,'$tittle','$description') ");

        $new = $db->insert_id;      // 6

      // echo '<pre>';
      // print_r($_FILES);             //ERROR FINDER

      // die();


       // IMAGE SECTION START

      if (!empty($_FILES['image']['name'])){

         $old_image = $_FILES['image']['name'];  
         $devid = explode('.', $old_image);             
         $currrent_name = current($devid);              
         $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg'];         


      if (in_array($extension,$allow)) {        

            $rand = rand(111, 999999);
            $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
            $upload_path = '../image_storage/'.$new_image;             
            $tmp_name = $_FILES['image']['tmp_name'];          
            move_uploaded_file($tmp_name, $upload_path);
            $db->query("UPDATE `banner` SET image = '$new_image' WHERE b_id = '$new'");
          }else{
            echo 'Faild For Mismatch';
          }
       }else{
         echo 'Failed for not Found image';
      }
              header("Location:../dextop_banner.php?success");

			break;

    case 'delete':

         $b_id = mysqli_real_escape_string($db, $_REQUEST['b_id']);      //TABLE id 
         $data = $db->query("SELECT * FROM `banner` WHERE b_id = '$b_id'");
         $value = $data->fetch_object();

      if (!empty($value->image)){
         $upload_path = "../image_storage/".$value->image;
            unlink($upload_path);      //DELETE METHOD
      }
         $db->query("DELETE FROM `banner` WHERE b_id = '$b_id'");

           header("Location:../dextop_banner.php?success");  
           break;

     case 'update':

            $b_id = mysqli_real_escape_string($db, $_POST['b_id']);
            $tittle =  mysqli_real_escape_string($db, $_POST['tittle']);
            $description =  mysqli_real_escape_string($db, $_POST['description']);
   
   
         $db->query("UPDATE `banner` SET tittle = '$tittle', description =  '$description' WHERE b_id = '$b_id'");
   
         // IMAGE UPDATE
   
         if (!empty($_FILES['image']['name'])){
   
            $old_image = $_FILES['image']['name'];  
            $devid = explode('.', $old_image);             
            $currrent_name = current($devid);              
            $extension = end($devid);                      
            $allow = ['jpg', 'png', 'svg', 'jpeg'];         
   
   
         if (in_array($extension,$allow)) {
   
            // IMAGE DELETE CODE START
   
               $data = $db->query("SELECT * FROM  `banner` WHERE b_id = '$b_id'");
               $value = $data->fetch_object();
               if (!empty($value->image)){
                  $upload_path = "../image_storage/".$value->image;
                     unlink($upload_path);
               }
   
               // IMAGE DELETE CODE END
               
               $rand = rand(111, 999999);
               $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
               $upload_path = '../image_storage/'.$new_image;             
               $tmp_name = $_FILES['image']['tmp_name'];          
               move_uploaded_file($tmp_name, $upload_path);
               $db->query("UPDATE `banner` SET image = '$new_image' WHERE b_id = '$b_id'");
             }else{
               echo 'Faild For Mismatch';
             }
          }else{
            echo 'Failed for not Found image';
         }
                 header("Location:../dextop_banner.php?success");
   
               break;

    }

    ?>