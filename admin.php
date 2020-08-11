<?php

$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
session_start();

if(!($_SESSION['admin'])){
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  </head>
  <style>

  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
  }
  td, th {
    text-align: left;
    padding: 8px;
    border: 1px solid black;
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
      border: 2px solid grey;
    	font-size: 18px;
    	color: black;
      height: 40px;
  }
  .category{
    margin-left: 5%;
    margin-top: 7%;
    z-index: 400;
    color: black;
    display: flex;
    justify-content: flex-start;
  }

  .center{
   margin: auto;
    margin-top: 1rem;
  }

  .category li {
    cursor: pointer;
    padding: 0.5rem;
  }
  #center_table_1{
    display: none;
  }
  .active{
    background-color: rgba(0,0,0,0.3);
    border-bottom: 2px solid black;
  }

  @media screen and (max-width: 900px){
    .category{
      margin-top: 31%;
      margin-left: 0;
    }
  }

  </style>
  <body style="background-color: #e6e6e6;">

    <div class="wrapper">
        <div class="header">
            <div class="header-menu">
                 <div class="title">Leave Management</div>
                <ul>
                    <li><a href="logout.php" id='logbtn'><i class="fas fa-power-off"></i><small id="log" style="display:none; margin-top:-7px;">Logout</small></a></li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="category">
      <li id="one" class="active">Pending..</li>
      <li id="two">Approved</li>
    </ul>
    <table id="center_table" class="center"  style="background-color: #e6e6e6; border: 2px solid black">
  <tr >
    <th>No.</th>
    <th>Name</th>
    <th>Enrollment No.</th>
    <th>Sem</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Reason</th>
    <th>Feedback</th>
    <th>Approval</th>
  </tr>

</table>
<table id="center_table_1" class="center" style="border: 2px solid black;">
  <tr style="background-color: #dddddd; ">
    <th>No.</th>
    <th>Enrollment No.</th>
    <th>Sem</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Reason</th>
    <th>Approval</th>
    <th>Feedback</th>
  </tr>
</table>
    <script>
    const logout=document.getElementById('logbtn');
    logout.addEventListener('mouseover',()=>{
      document.getElementById('log').style.display="block";
    })
    logout.addEventListener('mouseout',()=>{
      document.getElementById('log').style.display="none";
    })
    const one = document.getElementById('one');

    const two = document.getElementById('two');
    one.addEventListener('click',()=>{
      if(!one.classList.contains('active')){
        one.classList.add('active');
      }
      two.classList.remove('active');
      document.getElementById('center_table_1').style.display="none";
      document.getElementById('center_table').style.display="table";
    });
    two.addEventListener('click',()=>{
      if(!two.classList.contains('active')){
        two.classList.add('active');
      }
      one.classList.remove('active');
      document.getElementById('center_table_1').style.display="table";
      document.getElementById('center_table').style.display="none";
    });

    let count=parseInt(1);
    function displaychat(id,name,enroll,sem,start_date,end_date,reason,uid){
        const table = document.getElementById('center_table');
        console.log(table);
        const table_row = document.createElement('tr');
        let head = document.createElement('th');
        head.innerText=count+".";
        table_row.appendChild(head);
        head=document.createElement('th');
        head.innerText=name;
        table_row.appendChild(head);
        head=document.createElement('th');
        head.innerText=enroll;
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
        reason_text.rows="5";
        reason_text.innerText=reason;
        head.appendChild(reason_text);
        table_row.appendChild(head);
        head = document.createElement('th');
        const suggestion = document.createElement('textarea');
        suggestion.rows="5";
        suggestion.style.margin="5px";
        head.appendChild(suggestion);
        table_row.appendChild(head);
        head = document.createElement('th');
        const acceptbtn=document.createElement('button');
        acceptbtn.innerText="Accept";
        acceptbtn.style.padding="2px";
        acceptbtn.style.backgroundColor="green";
        acceptbtn.style.border="2px solid black";
        const rejectbtn=document.createElement('button');
        rejectbtn.innerText="Reject";
        rejectbtn.style.padding="2px";
        rejectbtn.style.backgroundColor="red";
        rejectbtn.style.border="2px solid black";
        head.appendChild(acceptbtn);
        head.appendChild(rejectbtn);
        table_row.appendChild(head);
        table.appendChild(table_row);
        count=parseInt(count)+parseInt(1);
        acceptbtn.addEventListener('click',(e)=>{
          const feedback=e.target.parentElement.parentElement.childNodes[parseInt(7)].firstChild.value;
          table.removeChild(e.target.parentElement.parentElement);
          console.log("feedback" + feedback);

          let cnt=parseInt(0);
          for(let i=parseInt(2);i<=table.childElementCount;i++){
            console.log(table.childNodes[i]);
            table.childNodes[i].firstChild.innerText=parseInt(cnt)+parseInt(1)+".";
            cnt=parseInt(cnt)+parseInt(1);
            count=cnt;
          }

            displayleave(id,sem,start_date,end_date,reason,feedback,"Accepted",enroll);
            $.ajax({
                    type: 'post',
                    url: "accept.php",
                    data: {'qid' : id, 'name': name,'enroll': enroll,'sem': sem,'startdate': start_date,'enddate': end_date,'reason': reason,'suggestion': feedback,'uid': uid }, 
                    success: function( data ) {
                    console.log(data);
                    }
                  });

        });
        rejectbtn.addEventListener('click',(e)=>{
          const feedback=e.target.parentElement.parentElement.childNodes[parseInt(7)].firstChild.value;
          table.removeChild(e.target.parentElement.parentElement);

          let cnt=parseInt(0);
          for(let i=parseInt(2);i<=table.childElementCount;i++){
            console.log(table.childNodes[i]);
            table.childNodes[i].firstChild.innerText=parseInt(cnt)+parseInt(1)+".";
            cnt=parseInt(cnt)+parseInt(1);
            count=cnt;
          }

            displayleave(id,sem,start_date,end_date,reason,feedback,"Rejected",enroll);
            $.ajax({
                    type: 'post',
                    url: "reject.php",
                    data: {'qid' : id, 'name': name,'enroll': enroll,'sem': sem,'startdate': start_date,'enddate': end_date,'reason': reason,'suggestion': feedback,'uid': uid }, 
                    success: function( data ) {
                    console.log(data);
                    }
                    });

        });

    }
    var count1=parseInt(1);
    function displayleave(id,sem,start_date,end_date,reason,suggestion,response,enroll){
        const table = document.getElementById('center_table_1');
        console.log(table);
        const table_row = document.createElement('tr');
        let head = document.createElement('th');
        head.innerText=count1+".";
        table_row.appendChild(head);
        head=document.createElement('th');
        head.innerText=enroll;
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
        count1=parseInt(count1)+parseInt(1);
    }
    </script>
  </body>

</html>

<?php

// display chat
function findchat($db){
    $chat_query = "SELECT * FROM `chat`";
    $run_chat_query = mysqli_query($db,$chat_query);
    while($row = mysqli_fetch_assoc($run_chat_query)){
        $id = $row['id'];
        $name = $row['name'];
        $enroll = $row['enrollment'];
        $sem=$row['sem'];
        $start_date=$row['startdate'];
        $end_date=$row['enddate'];
        $reason=$row['reason'];
        $unique_id=$row['uni_id'];
        echo '<script type="text/javascript" defer> displaychat("'.$id.'","'.$name.'","'.$enroll.'","'.$sem.'","'.$start_date.'","'.$end_date.'","'.$reason.'","'.$unique_id.'"); </script>';
    }
}
function findleave($db){

  $chat_query = "SELECT * FROM `leave`";
  $run_chat_query = mysqli_query($db,$chat_query);
  while($row = mysqli_fetch_assoc($run_chat_query)){
      $id = $row['id'];
      $sem=$row['sem'];
      $start_date=$row['startdate'];
      $end_date=$row['enddate'];
      $reason=$row['reason'];
      $suggestion=$row['suggestion'];
      $response=$row['response'];
      $enroll = $row['enrollment'];
      echo '<script type="text/javascript" defer> displayleave("'.$id.'","'.$sem.'","'.$start_date.'","'.$end_date.'","'.$reason.'","'.$suggestion.'","'.$response.'","'.$enroll.'"); </script>';
  }
}
findchat($db);
findleave($db);

?>