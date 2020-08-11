<?php

session_start();

// initialising variables
$username = $email = $password = $enrollment = $mobilenum =  "";

// connecting to database
$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
if(isset($_POST['signup'])){

// registration
$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$enrollment = $_POST['enrollment'];
$mobilenum = $_POST['mobilenum'];
$email = $_POST['email'];

// form validation
if(strlen($username) < 3){
  echo '<script type="text/javascript">alert("username must be of atleast 3 charaters")</script>';
}
elseif(strlen($username) > 40){
  echo '<script type="text/javascript">alert("username must be of atmost 40 charaters")</script>';
}
elseif(strlen($password) < 6){
  echo '<script type="text/javascript">alert("password must be of atleast 6 charaters")</script>';
}
elseif(strlen($password) > 20){
  echo '<script type="text/javascript">alert("password must be of atmost 20 charaters")</script>';
}
elseif($password != $confirmpassword){
  echo '<script type="text/javascript">alert("passwords should be same")</script>';
}
elseif(strlen($enrollment) != 12){
  echo '<script type="text/javascript">alert("enrollment number must be of 12 digits only")</script>';
}
elseif(strlen($mobilenum) != 10){
  echo '<script type="text/javascript">alert("mobile number must be of 10 digits only")</script>';
}
else{
// check for existing username
$user_check_query = "SELECT * FROM user WHERE `email`= '$email' LIMIT 1";
$user_check_query1 = "SELECT * FROM user WHERE `enrollment`= '$enrollment' LIMIT 1";

$results = mysqli_query($db,$user_check_query);
$results1 = mysqli_query($db,$user_check_query1);

if(mysqli_num_rows($results1)){
    echo '<script type="text/javascript">alert("enrollment number already exists")</script>';
}
elseif(mysqli_num_rows($results)){
    echo '<script type="text/javascript">alert("email id already exists")</script>';
}
else{
// register the user if no errors
  $password = md5($password); // this will encrypt password
  $query = "INSERT INTO `user`(`id`, `username`, `password`, `enrollment`, `mobilenum`, `email`) VALUES ('','$username','$password','$enrollment','$mobilenum','$email')";

  $run_query = mysqli_query($db,$query);
  if($run_query){
     header('location: login.php');
     }
     else {
       echo "error";
     }

  }
 }
}

// login
if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $password = mysqli_real_escape_string($db,$_POST['passowrd']);
  if($email=="admin@gmail.com" && $password=="admin"){
    $_SESSION['admin']=1;
    header('location: admin.php');
  }
  else{
  $password = md5($password);

  $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
  $run_sql = mysqli_query($db,$sql);

 if(mysqli_num_rows($run_sql) == 1){
   $_SESSION['email'] = $email;
   header('location: index.php');
 }
 else{
   echo '<script type="text/javascript">alert("incorrect email id or password")</script>';
  }
 }
}

 ?>
