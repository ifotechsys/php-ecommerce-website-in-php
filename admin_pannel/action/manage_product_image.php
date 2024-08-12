<?php
    include '../config.php';
    
    if (empty($_POST['submit'])) {
        $submit = mysqli_real_escape_string($db, $_REQUEST['submit']);
     }else{
      $submit = mysqli_real_escape_string($db, $_POST['submit']);
     }

    switch ($submit) {
    case 'register':

    $p_id =  mysqli_real_escape_string($db, $_POST['p_id']);


    $db->query("INSERT INTO `product_extra_image`(`pei_id`,`p_id`) VALUES(NULL,'$p_id') ");

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
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


    if (in_array($extension,$allow)) {        

        $rand = rand(111, 999999);
        $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
        $upload_path = '../image_storage/'.$new_image;             
        $tmp_name = $_FILES['image']['tmp_name'];          
        move_uploaded_file($tmp_name, $upload_path);
        $db->query("UPDATE `product_extra_image` SET image = '$new_image' WHERE pei_id = '$new'");
        }else{
        echo 'Faild For Mismatch';
        }
       }else{
         echo 'Failed for not Found image';
      }
        header("Location:../product_image.php?success");

    break;

    case 'delete':
        $pei_id = mysqli_real_escape_string($db, $_REQUEST['pei_id']);      //TABLE ID
        $data = $db->query("SELECT * FROM `product_extra_image` WHERE pei_id = '$pei_id'");
        $value = $data->fetch_object();
        if (!empty($value->psc_image)){
        $upload_path = "../image_storage/".$value->psc_image;
            unlink($upload_path);      //DELETE METHOD
        }
        $db->query("DELETE FROM `product_extra_image` WHERE pei_id = '$pei_id'");

            header("Location:../product_image.php?success");  
            break;


        case 'update':

        $pei_id = mysqli_real_escape_string($db, $_POST['pei_id']);


        $db->query("UPDATE `product_extra_image` SET pei_id = '$pei_id' WHERE pei_id = '$pei_id'");

        // IMAGE UPDATE

        if (!empty($_FILES['image']['name'])){

        $old_image = $_FILES['image']['name'];  
        $devid = explode('.', $old_image);             
        $currrent_name = current($devid);              
        $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


        if (in_array($extension,$allow)) {

        // IMAGE DELETE CODE START

        $data = $db->query("SELECT * FROM  `product_extra_image` WHERE pei_id = '$pei_id'");
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
        $db->query("UPDATE `product_extra_image` SET image = '$new_image' WHERE pei_id = '$pei_id'");
        }else{
        echo 'Faild For Mismatch';
        }
        }else{
        echo 'Failed for not Found image';
        }
                header("Location:../product_image.php?success");

    break;


















    }

    ?>