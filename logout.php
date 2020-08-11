<?php
  $db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
  session_start();
  unset($_SESSION['email']);
  $_SESSION['admin']=0;
  // session_unset();
  session_destroy();
  header("location: login.php");

?>
