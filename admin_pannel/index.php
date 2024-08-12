<!DOCTYPE html>
<html lang="en">
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> Login Admin panel </title>
   <!-- <link rel="icon" type="imagw/x-icon" href="../image/favicon.png"> -->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body style="background-color: #F5F5F5;">
    

        <div>
            <div class="main-div">
                <span>
                    <img src="image/logo.png" class="logo" alt="">
                </span>
                <h6 class="Sign">Sign In</h6>
                
                <form action="action/account.php" method="post">

                    <input type="text" name="email" class="Username mt-3" placeholder="Username">
                    <input type="password" name="password" class="Username mt-3" placeholder="password">
                        <br>
                    <input type="checkbox" class="checkbox mt-3">
                    <span class="Remember">Remember me</span>
                    <br>
                    <button type="submit" name="submit" value="login" class="log">Log In</button>
                </form>
                
                <div style=" height: 50px; width: 100%; margin-top: 25px; display: flex;" class="col-sm-7">
                   <a href="#" class="forget"> 
                    <i class="fa fa-lock m-r-5"></i> Forgot your password?
                </a>
                <a href="#" class="forget-right float-end">Create an account</a>
                </div>
            </div>
            
        </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>