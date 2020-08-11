<?php include("server.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title>Sign Up</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .box{
            margin: 51px auto;
            justify-content: center;
            align-items: center;
            top: 60%;
            left: 40%;
            width: 450px;
            background-color: #FEFEFE;
            box-shadow: 3px 3px 5px 5px grey;
        }

        body{
           background: #26b8b6;
            background-repeat: no-repeat;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;

        }
        body img{
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
        }
        form{
            margin: 2rem;
            text-align: center;
            z-index: 100;
            width: 80%;
            display: grid;
            grid-template-columns: repeat(1,auto);
            row-gap: 1rem;
            justify-content: center;
            font-size: 1.3rem;
            color: black;
            background-color: transparent;
        }
        form label{
            text-align: center;
        }
        input[type=text], input[type=password], input[type=number],input[type=email]{
            box-shadow: 1px 0px 0px 1px black;
        }
        form input{
            padding: 0.8rem;
            text-align: center;
            border-radius: 5px;
            border: none;
            outline: none;
            border:1px solid black;
            border-radius: 10px;
        }

        form button{
            margin: 0 auto;
            width: 40%;
            padding: 1rem;
            border: none;
            outline: none;
            border-radius: 10px;
            background-color: red;
            color:#ffffff;
            border:none;
            cursor: pointer;
            transition:box-shadow .3s ease;
        }
        form button:hover{
            box-shadow: 0px 0px 10px grey;
        }

        h3{
          font-size: 20px;
          margin-left: 16%;
        }

        @media screen and (max-width: 900px) {
            form{
                width: 70%;
                padding-left: 0;
                padding-right: 0;
                font-size: 0.8rem;
            }

            form button{
                padding: 1rem 0;
                width: 50%;
            }
            .box{
            margin: 51px auto;
            justify-content: center;
            align-items: center;
            top: 60%;
            left: 40%;
            width: 300px;
            background-color: #FEFEFE;
            box-shadow: 3px 3px 5px 5px grey;
            }
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
           margin: 0;
    }

    </style>
</head>
<body>
   
  <div class="box">

    <form action="signup.php" method="post">


        <label for="username"><h4>Username </h4></label>
        <input type="text" name="username" placeholder="FisrtName LastName MiddleName" id="username"  autocomplete="off" required>

        <label for="password"><h4>Password </h4></label>
        <input type="password" name="password" placeholder="At least 6 characters" id="passowrd" required>

        <label for="password"><h4>Confirm Password </h4></label>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" id="confirmpassword" required>

        <label for="enrollment"><h4>Enrollment Number </h4></label>
        <input type="number" name="enrollment" placeholder="e.g 190470116065" id="enrollment"  autocomplete="off" required>

        <label for="mobilenum"><h4>Mobile Number </h4></label>
        <input type="number" name="mobilenum" placeholder="e.g 9510823023" id="mobilenum"  autocomplete="off" required>

        <label for="email"><h4>Email Id </h4></label>
        <input type="email" name="email" placeholder="e.g 19it.hit.shiroya@gmail.com" id="email"  autocomplete="off" required>

        <button type="submit" name="signup">Sign Up</button>
        <h3>Already a Member?<a href="login.php"> Sign In</a></h3>


    </form>
  </div>

</body>
</html>