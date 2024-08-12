<?php
    session_start();
    include '../config.php';
    
    if (empty($_POST['submit'])) {
        $submit = $_REQUEST['submit'];
     }else{
        $submit = $_POST['submit'];
     }

    switch ($submit) {
       case 'login':

   
           $email =  mysqli_real_escape_string($db, $_POST['email']);
           $password = md5($_POST['password']);

          $data = $db->query("SELECT * FROM `admin` WHERE email = '$email' AND password = '$password'");

      if ($data->num_rows > 0) {

            $value = $data->fetch_object();

            $a_id = $value->a_id;
            $email = $value->email;
            $mobile = $value->mobile;


            //  echo session_id();

            $_SESSION['admin_id'] = $a_id;
            $_SESSION['email'] = $email;
            $_SESSION['mobile'] = $mobile;

            header("Location:../dashboard.php");

        } else {

            header("Location:../index.php");

        }

        break;


    case 'logout':
      
            print_r($_SESSION);
            //unset
            //distry

           unset( $_SESSION['email']);  //unsert example

           session_destroy();

           header("Location:../index.php");
            break;







    }

    ?>