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
       
           $name =  mysqli_real_escape_string($db, $_POST['name']);
           $email =  mysqli_real_escape_string($db, $_POST['email']);
           $mobile_no =  mysqli_real_escape_string($db, $_POST['mobile_no']);
           $password =  md5($_POST['password']);
           $data = $db->query("SELECT * FROM `user` WHERE mobile_no = '$mobile_no' OR email = '$email'"); // Data check alareay exist or not
        

           if ($data->num_rows === 0) {

            $db->query("INSERT INTO `user` (`u_id`, `name`, `mobile_no`, `email`, `password`, `create_at`) VALUES (NULL, '$name','$mobile_no', '$email','$password',NOW())");


            $u_id = $db->insert_id;  // Find which numner  data inserted in database 
            $session = session_id();
            $db->query("UPDATE `cart` SET u_id = '$u_id' WHERE session_id = '$session'");


            $_SESSION['u_id'] = $u_id;

            $_SESSION['message'] = 'Register & Login Successfull';
            $_SESSION['values'] = 'success'; //  Using In Boostrap

            header("Location:  ../checkout.php");

           }else{

            $_SESSION['message'] = 'Your are already Registered';
            $_SESSION['values'] = 'warning'; //  Using In Boostrap

            header("Location:../sign_in.php");


           }




            break;

       case 'login':

   
           $email =  mysqli_real_escape_string($db, $_POST['email']);
           $password = md5($_POST['password']);

          $data = $db->query("SELECT * FROM `user` WHERE email = '$email' AND password = '$password'");

      if ($data->num_rows > 0) {

            $value = $data->fetch_object();

            $u_id = $value->u_id;

            $session = session_id();
            $db->query("UPDATE `cart` SET u_id = '$u_id' WHERE session_id = '$session'");

            //  echo session_id();

            $_SESSION['u_id'] = $u_id;


            $_SESSION['message'] = ' Login Successfull';
            $_SESSION['values'] = 'success'; //  Using In Boostrap

            header("Location:../checkout.php");




        } else {
            $_SESSION['message'] = ' Login Error , password not match';
            $_SESSION['values'] = 'warning'; //  Using In Boostrap

            header("Location:../sign_in.php");

        }

        break;


    case 'logout':
      
            print_r($_SESSION);
          //  //unset
            //distry

           unset( $_SESSION['u_id']);  //unsert example

           session_destroy();

           header("Location:../index.php");
            break;







    }

    ?>