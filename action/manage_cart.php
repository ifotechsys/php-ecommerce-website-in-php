<?php
	session_start();
    include '../admin_pannel/config.php';
    
    if (empty($_POST['submit'])) {
        $submit = mysqli_real_escape_string($db, $_REQUEST['submit']);
     }else{
      $submit = mysqli_real_escape_string($db, $_POST['submit']);
     }

      switch ($submit) {
        case 'addtocart':

        	$p_id = mysqli_real_escape_string($db, $_REQUEST['p_id']);
        	$url = mysqli_real_escape_string($db, $_REQUEST['url']);
        	$session =  session_id();

        	$product = $db->query("SELECT * FROM `product` WHERE p_id = '$p_id'");
        	$product_value = $product->fetch_object();

        	$price = $product_value->product_saling_price;

        	if (empty($_REQUEST['qty'])) {
      			$qty = 1;
        	}else{
        		$qty = mysqli_real_escape_string($db, $_REQUEST['qty']);
        	}

        	if (empty($_SESSION['u_id'])) {
        		$u_id = 0;
        	}else{
        		$u_id = $_SESSION['u_id'];
        	}

        	$data = $db->query("SELECT * FROM `cart` WHERE session_id = '$session' AND p_id = '$p_id' AND status = 0");

        	if ($data->num_rows == 0) {
        
       

        	$db->query("INSERT INTO `cart` (`ct_id`, `p_id`, `u_id`, `session_id`, `price`, `qty`, `status`, `create_at`) VALUES (NULL, '$p_id','$u_id','$session','$price','$qty','0',NOW())");

 			}else{
 				$value = $data->fetch_object();

 				$ct_id = $value->ct_id;
 				$db_qty = $value->qty;

 				$new_qty = $db_qty + $qty;

 				$db->query("UPDATE `cart` SET qty = '$new_qty' WHERE ct_id = '$ct_id'");


 			}

        	$_SESSION['message'] = 'Product Added';
        	$_SESSION['value'] = 'success';

        	header("Location:$url");



		break;

   		default:


		break;

    }


    ?>