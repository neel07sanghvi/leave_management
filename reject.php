<?php
$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
session_start();

if($_SESSION['admin']){

$id = $_POST['qid'];
$name = $_POST['name'];
$enroll = $_POST['enroll'];
$sem = $_POST['sem'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$reason = $_POST['reason'];
$suggestion = $_POST['suggestion'];
$uni_id = $_POST['uid'];
$response="Rejected";

$insert_leave="INSERT INTO `leave`(`id`, `sem`, `startdate`, `enddate`, `reason`, `suggestion`, `response`,`enrollment`) VALUES ('$id','$sem','$startdate','$enddate','$reason','$suggestion','$response','$enroll')";
$run_que = mysqli_query($db,$insert_leave);
$del_que = "DELETE FROM `chat` WHERE `uni_id`='$uni_id'";
$run_del_que = mysqli_query($db,$del_que);

}
?>