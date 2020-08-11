<?php

$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
session_start();

if(!($_SESSION['email'])){
  header("location: login.php");
}
else{
  // to save the form of index in db
  $sessemail = $_SESSION['email'];
  $ready = "SELECT * FROM `user` WHERE `email`= '$sessemail'";
  $runready = mysqli_query($db,$ready);
  $data = mysqli_fetch_assoc($runready);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="profile.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

  </head>
  <style>

  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
  }

  td, th {
    border: 1px solid black;
    text-align: center;
    padding: 8px;
    background-color: white;
  }
  button{
    border-radius: 5px;
    cursor: pointer;
    transition:box-shadow .3s ease;
    font-style: bold;
    font-weight: bold;
    font-family: serif;
    font-size: 17px;
    margin-left: 10px;
  }
  button:hover{
      box-shadow: 0px 0px 10px grey;
    }
    textarea{
      border: 2px solid black;
    	font-size: 18px;
    	color: black;
      height: 40px;
    }

    .center{
      margin-left: 2%;
      margin-top: 7%;
    }

    @media screen and (max-width:900px){
      .center{
        margin-top: 25%;
      }
    }

  </style>
  <body style="background-color: #e6e6e6;">
    <div class="wrapper">
            <div class="header">
                <div class="header-menu">
                    <div class="title" style="font-family:Grenze Gotisch;  text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black, 0 -1px black; ">Total Leaves</div>
                     <ul>
                      <li style="list-style-type:none"><a style="text-decoration:none;" href="index.php" id='backbtn'><i class="fa fa-arrow-left" aria-hidden="true"></i><small id="back" style="display:none; margin-top:-7px;">Back</small></a></li>
                     </ul>
                </div>
             </div>
    </div>

    <table id="center_table" class="center">
  <tr >
    <th>No.</th>
    <th>Sem</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Reason</th>
    <th>Approval</th>
    <th>Feedback</th>
  </tr>
</table>

    <script>
    const back=document.getElementById('backbtn');
    back.addEventListener('mouseover',()=>{
      document.getElementById('back').style.display="block";
    })
    back.addEventListener('mouseout',()=>{
      document.getElementById('back').style.display="none";
    })
    let count=parseInt(1);
    function displayleave(id,sem,start_date,end_date,reason,suggestion,response){
        const table = document.getElementById('center_table');
        console.log(table);
        const table_row = document.createElement('tr');
        let head = document.createElement('th');
        head.innerText=count+".";
        table_row.appendChild(head);
        head=document.createElement('th');
        head.innerText=sem;
        table_row.appendChild(head);
        head=document.createElement('th');
        head.innerText=start_date;
        table_row.appendChild(head);
        head=document.createElement('th');
        head.innerText=end_date;
        table_row.appendChild(head);
        head=document.createElement('th');
        const reason_text=document.createElement('textarea');
        reason_text.disabled=true;
        // reason_text.style.fontStyle="bold";
        reason_text.innerText=reason;
        head.appendChild(reason_text);
        table_row.appendChild(head);
        head=document.createElement('th');
        const admin_response = document.createElement('h3');
        admin_response.innerText=response.toUpperCase();
        admin_response.style.color="red";
        if(admin_response.innerText == 'ACCEPTED'){
          admin_response.style.color = "green";
        }
        const admin_suggestion = document.createElement('textarea');
        admin_suggestion.disabled=true;
        admin_suggestion.rows="5";
        admin_suggestion.innerText=suggestion;
        head.appendChild(admin_response);
        table_row.appendChild(head);
        head = document.createElement('th');
        head.appendChild(admin_suggestion);
        table_row.appendChild(head);
        table_row.style.backgroundColor="#dddddd";
        table.appendChild(table_row);
        count=parseInt(count)+parseInt(1);
    }
    </script>
  </body>
</html>
<?php
// display chat
function findleave($db,$id){

    $chat_query = "SELECT * FROM `leave` where `id`=$id";
    $run_chat_query = mysqli_query($db,$chat_query);
    while($row = mysqli_fetch_assoc($run_chat_query)){
        $id = $row['id'];
        $sem=$row['sem'];
        $start_date=$row['startdate'];
        $end_date=$row['enddate'];
        $reason=$row['reason'];
        $suggestion=$row['suggestion'];
        $response=$row['response'];
        echo '<script type="text/javascript" defer> displayleave("'.$id.'","'.$sem.'","'.$start_date.'","'.$end_date.'","'.$reason.'","'.$suggestion.'","'.$response.'"); </script>';
    }
}
findleave($db,$data['id']);

?>