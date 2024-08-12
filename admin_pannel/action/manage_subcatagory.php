<?php
    include '../config.php';
    
    if (empty($_POST['submit'])) {
        $submit = mysqli_real_escape_string($db, $_REQUEST['submit']);
     }else{
      $submit = mysqli_real_escape_string($db, $_POST['submit']);
     }

    switch ($submit) {
    case 'register':

    $pc_id =  mysqli_real_escape_string($db, $_POST['pc_id']);
    $psc_name =  mysqli_real_escape_string($db, $_POST['psc_name']);
    $description =  mysqli_real_escape_string($db, $_POST['description']);


    $db->query("INSERT INTO `product_subcategory`(`psc_id`,`pc_id`,`psc_name`,`description`) VALUES(NULL,'$pc_id','$psc_name','$description') ");

    $new = $db->insert_id;      // 6

    // echo '<pre>';
    // print_r($_FILES);             //ERROR FINDER

    // die();


    // IMAGE SECTION START

    if (!empty($_FILES['psc_image']['name'])){

        $old_image = $_FILES['psc_image']['name'];  
        $devid = explode('.', $old_image);             
        $currrent_name = current($devid);              
        $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


    if (in_array($extension,$allow)) {        

        $rand = rand(111, 999999);
        $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
        $upload_path = '../image_storage/'.$new_image;             
        $tmp_name = $_FILES['psc_image']['tmp_name'];          
        move_uploaded_file($tmp_name, $upload_path);
        $db->query("UPDATE `product_subcategory` SET psc_image = '$new_image' WHERE psc_id = '$new'");
        }else{
        echo 'Faild For Mismatch';
        }
       }else{
         echo 'Failed for not Found image';
      }
        header("Location:../subcatagory.php?success");

    break;

    case 'delete':
        $psc_id = mysqli_real_escape_string($db, $_REQUEST['psc_id']);      //TABLE ID
        $data = $db->query("SELECT * FROM `product_subcategory` WHERE psc_id = '$psc_id'");
        $value = $data->fetch_object();
        if (!empty($value->psc_image)){
        $upload_path = "../image_storage/".$value->psc_image;
            unlink($upload_path);      //DELETE METHOD
        }
        $db->query("DELETE FROM `product_subcategory` WHERE psc_id = '$psc_id'");

            header("Location:../subcatagory.php?success");  
            break;


        case 'update':

        $psc_id = mysqli_real_escape_string($db, $_POST['psc_id']);
        $psc_name =  mysqli_real_escape_string($db, $_POST['psc_name']);
        $description =  mysqli_real_escape_string($db, $_POST['description']);


        $db->query("UPDATE `product_subcategory` SET psc_name = '$psc_name', description =  '$description' WHERE psc_id = '$psc_id'");

        // IMAGE UPDATE

        if (!empty($_FILES['psc_image']['name'])){

        $old_image = $_FILES['psc_image']['name'];  
        $devid = explode('.', $old_image);             
        $currrent_name = current($devid);              
        $extension = end($devid);                      
         $allow = ['jpg', 'png', 'svg', 'jpeg','webp'];         


        if (in_array($extension,$allow)) {

        // IMAGE DELETE CODE START

        $data = $db->query("SELECT * FROM  `product_subcategory` WHERE psc_id = '$psc_id'");
        $value = $data->fetch_object();
        if (!empty($value->psc_image)){
            $upload_path = "../image_storage/".$value->psc_image;
                unlink($upload_path);
        }

        // IMAGE DELETE CODE END
        
        $rand = rand(111, 999999);
        $new_image = $currrent_name.'_'.$rand.'.'.$extension;      
        $upload_path = '../image_storage/'.$new_image;             
        $tmp_name = $_FILES['psc_image']['tmp_name'];          
        move_uploaded_file($tmp_name, $upload_path);
        $db->query("UPDATE `product_subcategory` SET psc_image = '$new_image' WHERE psc_id = '$psc_id'");
        }else{
        echo 'Faild For Mismatch';
        }
        }else{
        echo 'Failed for not Found image';
        }
                header("Location:../subcatagory.php?success");

    break;


















    }

    ?>