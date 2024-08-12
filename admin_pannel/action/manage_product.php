<?php
    include '../config.php';
    
    if (empty($_POST['submit'])) {
        $submit = mysqli_real_escape_string($db, $_REQUEST['submit']);
     }else{
      $submit = mysqli_real_escape_string($db, $_POST['submit']);
     }

    function slug($name){
        $product_name = trim($name); // remove all extra spaces
        $product_name = strtolower($product_name); // convert to lower case
        return str_replace(' ', '-', $product_name);
    }

        function sendResponse($status, $data){
            header("Content-Type: application/json");
            http_response_code($status);
            echo json_encode($data);
            exit();
        }

      switch ($submit) {
        case 'register':


           $pc_id =  mysqli_real_escape_string($db, $_POST['pc_id']);
           $psc_id =  mysqli_real_escape_string($db, $_POST['psc_id']);
           $product_name =  mysqli_real_escape_string($db, $_POST['product_name']);
           $product_saling_price =  mysqli_real_escape_string($db, $_POST['product_saling_price']);
           $product_marcket_price =  mysqli_real_escape_string($db, $_POST['product_marcket_price']);
           $product_long_description =  mysqli_real_escape_string($db, $_POST['product_long_description']);

          $slug = slug($product_name);


        $db->query("INSERT INTO `product`(`p_id`,`pc_id`,`psc_id`,`product_name`,`product_saling_price`,`product_marcket_price`,`product_long_description`,`slug`) 
        VALUES(NULL,'$pc_id','$psc_id','$product_name','$product_saling_price','$product_marcket_price','$product_long_description','$slug') ");

        $new = $db->insert_id;      // 6

  
      // echo '<pre>';
      // print_r($_FILES);             //ERROR FINDER

      // die();


       // IMAGE SECTION START

       if (!empty($_FILES['product_image']['name'])){

         $old_image = $_FILES['product_image']['name'];  
         $devid = explode('.', $old_image);             
         $currrent_name = current($devid);              
         $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


      if (in_array($extension,$allow)) {        

            $rand = rand(111, 999999);
            $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
            $upload_path = '../image_storage/'.$new_image;             
            $tmp_name = $_FILES['product_image']['tmp_name'];          
            move_uploaded_file($tmp_name, $upload_path);
            $db->query("UPDATE `product` SET product_image = '$new_image' WHERE p_id = '$new'");
          }else{
            echo 'Faild For Mismatch';
          }
       }else{
         echo 'Failed for not Found image';
      }
              header("Location:../product.php?success");

			break;

      case 'delete':
        $p_id = mysqli_real_escape_string($db, $_REQUEST['p_id']);      //TABLE ID
        $data = $db->query("SELECT * FROM `product` WHERE p_id = '$p_id'");
        $value = $data->fetch_object();

     if (!empty($value->product_image)){
        $upload_path = "../image_storage/".$value->product_image;
           unlink($upload_path);      //DELETE METHOD
     }
        $db->query("DELETE FROM `product` WHERE p_id = '$p_id'");

          header("Location:../product.php?success");  
          break;

          case 'update':

            $p_id = mysqli_real_escape_string($db, $_POST['p_id']);
            $product_name =  mysqli_real_escape_string($db, $_POST['product_name']);
            $product_saling_price =  mysqli_real_escape_string($db, $_POST['product_saling_price']);
            $product_marcket_price =  mysqli_real_escape_string($db, $_POST['product_marcket_price']);
            $product_long_description =  mysqli_real_escape_string($db, $_POST['product_long_description']);
              $slug = slug($product_name);

   
         $db->query("UPDATE `product` SET product_name = '$product_name', product_saling_price =  '$product_saling_price', product_marcket_price =  '$product_marcket_price', product_long_description =  '$product_long_description' , slug = '$slug' WHERE p_id = '$p_id'");
   
         // IMAGE UPDATE
   
         if (!empty($_FILES['product_image']['name'])){
   
            $old_image = $_FILES['product_image']['name'];  
            $devid = explode('.', $old_image);             
            $currrent_name = current($devid);              
            $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         
   
   
         if (in_array($extension,$allow)) {
   
            // IMAGE DELETE CODE START
   
               $data = $db->query("SELECT * FROM  `product` WHERE p_id = '$p_id'");
               $value = $data->fetch_object();
               if (!empty($value->product_image)){
                  $upload_path = "../image_storage/".$value->product_image;
                     unlink($upload_path);
               }
   
               // IMAGE DELETE CODE END
               
               $rand = rand(111, 999999);
               $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
               $upload_path = '../image_storage/'.$new_image;             
               $tmp_name = $_FILES['product_image']['tmp_name'];          
               move_uploaded_file($tmp_name, $upload_path);
               $db->query("UPDATE `product` SET product_image = '$new_image' WHERE p_id = '$p_id'");
             }else{
               echo 'Faild For Mismatch';
             }
          }else{
            echo 'Failed for not Found image';
         }
                 header("Location:../product.php?success");
   
         break;

         case 'GET':

                $data = $db->query("SELECT * FROM `product`");
                $products = [];
                while ($value = $data->fetch_assoc()) {
                    $products[] = $value;
                }


                sendResponse(200,$products);


             break;











          
    }

    ?>