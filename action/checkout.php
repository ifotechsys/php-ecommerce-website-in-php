<?php
    session_start();
    include '../admin_pannel/config.php';
    
    if (empty($_POST['submit'])) {
        $submit = $_REQUEST['submit'];
     }else{
        $submit = $_POST['submit'];
     }

    switch ($submit) {
        case 'submit':
       
           $name =  mysqli_real_escape_string($db, $_POST['full_name']);
           $email =  mysqli_real_escape_string($db, $_POST['email_id']);
           $mobile_no =  mysqli_real_escape_string($db, $_POST['mobile_no']);
           $pincode =  mysqli_real_escape_string($db, $_POST['pincode']);
           $address =  mysqli_real_escape_string($db, $_POST['address']);
           $total_amount =  mysqli_real_escape_string($db, $_POST['total_amount']);
           $delivery_fee =  mysqli_real_escape_string($db, $_POST['delivery_fee']);
           $u_id = $_SESSION['u_id'];
           $order_id = 'ORD'.rand(1111,99999);

            $db->query("INSERT INTO `order_details`(`od_id`, `u_id`, `name`, `mobile`, `email`, `address`, `city`, `state`, `pincode`, `payment_method`, `order_id`, `delivery_fee`, `total_amount`, `create_at`) VALUES (NULL, '$u_id', '$name','$mobile_no', '$email','$address','Bhubneswar','Odisha','$pincode','COD','$order_id','$delivery_fee','$total_amount',NOW())");


            $od_id = $db->insert_id;  // Find which numner  data inserted in database 


            $p_ids = $_REQUEST['p_id'];  // Array

            $i = 0;
            foreach($p_ids as $val){
                $p_id = $_POST['p_id'][$i];
                $ct_id = $_POST['ct_id'][$i];

                $db->query("INSERT INTO `order_data`(`ord_id`, `od_id`, `u_id`, `p_id`, `ct_id`, `status`, `delivery_details`, `create_at`) VALUES (NULL,'$od_id','$u_id','$p_id','$ct_id',0,'',NOW())");

                $db->query("UPDATE `cart` SET status = 1 WHERE ct_id = '$ct_id'");


                $i++;
            }



            $_SESSION['u_id'] = $u_id;

            $_SESSION['message'] = 'Order Placed Successfull';
            $_SESSION['values'] = 'success'; //  Using In Boostrap

            header("Location:../thankyou.php");

         



            break;

  



    }

    ?>