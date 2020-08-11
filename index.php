<?php
$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
session_start();

// if(isset($_SESSION['admin'])){
//   header("location: admin.php");
// }

if(!isset($_SESSION['email'])){
  // You must log in fisrt to view this page
  header("location: login.php");
}
else{
  // to save the form of index in db
  $sessemail = $_SESSION['email'];
  $ready = "SELECT * FROM `user` WHERE `email`= '$sessemail'";
  $runready = mysqli_query($db,$ready);
  $data = mysqli_fetch_assoc($runready);

  if(isset($_POST['apply'])){
     $sem = $_POST['sem'];
     $startdate = $_POST['startdate'];
     $enddate = $_POST['enddate'];
     $reason = $_POST['reason'];
     $id = $data['id'];
     $name = $data['username'];
     $enroll = $data['enrollment'];

     if(empty($sem)){
      echo '<script type="text/javascript">alert("semester filed cannot be empty")</script>';
     }

     $que = "INSERT INTO `chat`(`id`, `name`, `enrollment`, `sem`, `startdate`, `enddate`, `reason`) VALUES ('$id','$name','$enroll','$sem','$startdate','$enddate','$reason')";

     $run_que = mysqli_query($db,$que);
     if($run_que){
      echo '<script type="text/javascript">alert("request has been send to the admin")</script>';
      //header('location: index.php');
        }
      else{
          echo '<script type="text/javascript">alert("error")</script>';
        }
       // sleep(3);
       echo "<script> window.location='index.php'</script>";

  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Welcome Page</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

        <style>
        @media screen and (max-width: 900px) {

          form{
              width: 78%;
              padding-left: 0;
              padding-right: 0;
              font-size: 0.8rem;
          }
          .wrapper .header{
              z-index: 1;
              width: 100vw;
              display: flex;
              top: 0;
           }

          .wrapper .header .header-menu{
              width: 100vw;
              display: flex;
              justify-content: space-between;
              align-items: center;
              padding: 0 20px;
            }
          .wrapper .header .header-menu .title{
              color: #fff;
              font-size: 23px;
              text-transform: uppercase;
              font-weight: 90;
            }
            .leave{
              margin-left: 15%;
              width: 90%;
            }
        }

        </style>

      </head>

      <body style="background-color: #e6e6e6">

        <div class="wrapper">
            <div class="header">
                <div class="header-menu">
                    <div class="title" style="font-family:Grenze Gotisch;  text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black, 0 -1px black; ">WELCOME TO LEAVE MANAGEMENT SYSTEM</div>
                    <ul>
                     <li><a href="profile.php" id="edit" style="text-decoration: none;"><i  class="fa fa-user-circle"></i><small id="small" style="display:none; margin-top:-7px;">Profile</small></a></li>

                     <li><a href="logout.php" id='logbtn' style="text-decoration: none;"><i class="fas fa-power-off"></i><small id="log" style="display:none; margin-top:-7px;">Logout</small></a></li>
                    </ul>
                </div>
            </div>

          <form method="post">
            <div class="leave">
            <p style="color: black; font-size:23px">Semester</p> <select type="option" style="width:100px;" name="sem" required>
            	<option>select--</option>
            	<option>1st</option>
            	<option>2nd</option>
            	<option>3rd</option>
               <option>4th</option>
               <option>5th</option>
               <option>6th</option>
               <option>7th</option>
               <option>8th</option>
            </select>
            <br><br>
            <p style="color: black; font-size:25px">Start Date</p><input type="date" name="startdate" placeholder="start date" id="start" required><br><br>

    		<p style="color: black; font-size:25px">End date </p><input type="date" name="enddate" placeholder="end date" id="end" disabled required>
    		<br><br>
    		<p style="color: black; font-size:25px">Reason For Leave</p>
    		<textarea placeholder="Enter Your Valid Reason Here....." name="reason" required></textarea><br><br>
    		<!-- <button type="submit" name="apply" class="apply"> Apply</button>  -->
       <div class="apply"><button type="submit" name="apply" ><i class="fa fa-paper-plane" ></i></button></div>
        <br>
    	</div>
    </form>

        <script defer type="text/javascript">

        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        const edit=document.getElementById('edit');
        edit.addEventListener('mouseover',()=>{
          document.getElementById('small').style.display="block";
        });
        edit.addEventListener('mouseout',()=>{
          document.getElementById('small').style.display="none";
        });
        const logout=document.getElementById('logbtn');
        logout.addEventListener('mouseover',()=>{
          document.getElementById('log').style.display="block";
        })
        logout.addEventListener('mouseout',()=>{
          document.getElementById('log').style.display="none";
        })
        const start=document.getElementById('start');
        start.addEventListener('mouseover',()=>{
          const date=new Date();

        date.setDate(date.getDate()+3)
        const year=date.getFullYear();
        let month=date.getMonth()+1;
        let days=date.getDate();

        if(parseInt(month/10)==parseInt(0)){
          month='0'+month;
        }
        month.toString();
        if(parseInt(days/10)==parseInt(0)){
          days="0"+days;
        }
        days.toString();
        start.min=year+"-"+month+"-"+days;
        })

        start.addEventListener('input',()=>{
          document.getElementById('end').disabled=false;
          document.getElementById('end').min=start.value;
        })

        </script>

    </body>
</html>