<?php include("server.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title> Log In </title>
    <style>

     .background {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #26b8b6;
    /* animation-name: mymove;
    animation-duration: 7s;
    animation-iteration-count: 3; */
   }
   /* @keyframes mymove {
  0% {background: linear-gradient(deg, #ff6464 50%, #5ac8fa 10%);}
  25% {background:  linear-gradient(90deg, #ff6464 50%, #5ac8fa 10%);}
  50% {background:  linear-gradient(120deg, #ff6464 50%, #5ac8fa 10%);}
  75% {background:  linear-gradient(180deg, #ff6464 50%, #5ac8fa 10%);}
  100% {background:  linear-gradient(360deg, #ff6464 50%, #5ac8fa 10%);}
} */

      h2 {
    text-align: center;
    margin: 10px 0px 20px;
    color: black;
    font-size: large;
   }

     h6 {
    text-align: center;
    margin: 10px 0px 20px;
    color: black;
    font-size: large;
   }

   body img {
     width: 60%;
    }

    </style>
  </head>

  <body class="background" >

    <section class="login-page">
       <form action="login.php" method="post">
          <div class="box">
            <center>
            <img src="logo2.png" >
            </center>
               <div class="form-body">
                 <h2> <i class="fa fa-envelope" aria-hidden="true" style="color: red;"></i> Email Id</h2>
                  <input type="email" name="email" placeholder="Enter Email Id" autocomplete="off" required>
                  <h2><i class="fa fa-lock" aria-hidden="true" style="color: red;"></i> Password</h2>
                  <input type="password" name="passowrd" placeholder="Enter Password" required>
               </div>
               <div class="form-footer">
                 <button type="submit" name="login">Sign In</button>
               </div>
               <h6>Not yet a Member? <a href="signup.php"style="color:red;"> Sign Up</a></h6>
       </form>
    </section>

  </body>
</html>
