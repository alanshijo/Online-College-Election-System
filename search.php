<?php
session_start();
if (!(isset($_SESSION['username']))) {
    header("location:newlogin.php");
} else {
    $username = $_SESSION['username'];
    }
?>
<html>
<head>
    <title>Candidates</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: "Arial", "Helvetica", sans-serif;
  margin: 0;
  background-color: #D3D3D3;
}
h2{
  font-size: 36px;
  font-family: 'Righteous', cursive;
  text-align: center;
  color: black;
  text-decoration: underline;
}
.navbar {
  overflow: hidden;
  background-color: #333;
}


.navbar a {
  float: right;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 25px;
  text-decoration: none;
}

.navbar a.left {
  float: left;
}
.navbar a:hover {
  background-color: #ddd;
  color: black;
  border-radius: 5px;
}
.navbar h1 {
  float: left;

  color: white;
  font-size: 25;
  text-align: center;
  text-decoration: none;
  font-family: 'Brush Script MT', cursive;
  text-shadow: -1px 0 black, 0 2px black, 2px 0 black, 0 2px black;
}
table {
  border-collapse: collapse;
  width: 1400;
  border: 1px solid #282828;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #303030;
}

tr {background-color: #f2f2f2}

th {
  background-color: #282828;
  color: white;
}
td a {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 3px;
  font-size: 12px;
}
.delete{
  background: rgb(227, 35, 35, 1);
  border: none;
  color: white;
  padding: 7px 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  font-weight: bold;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  right: 30;
  position: absolute;
  margin-right: 40;
}
select {
  display: block;
  border: 2px solid #ccc;
  width: 250;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
  margin-left: 65;
}
.buttons {
  display: block;
  width: 100px;
  margin: 0 auto;
  margin-top: -47;
  margin-left: 330;
}
.button { 
    display: block;
    cursor: pointer;
    text-decoration: none;
    font-size: 12px;
    font-weight: bold;
    border:1px solid #25729a; 
    -webkit-border-radius: 3px; 
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-family:arial, helvetica, sans-serif; 
    padding: 10px 10px 10px 10px; 
    text-shadow: -1px -1px 0 rgba(0,0,0,0.3);
    text-align: center; 
    color: #FFFFFF; 
    background-color: #3093c7;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3093c7), color-stop(100%, #1c5a85));
    background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
    background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
    background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
    background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
    background-image: linear-gradient(top, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
}

.button:hover{
    border:1px solid #1c5675;
    background-color: #26759e;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#26759e), color-stop(100%, #133d5b));
    background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
    background-image: -moz-linear-gradient(top, #26759e, #133d5b);
    background-image: -ms-linear-gradient(top, #26759e, #133d5b);
    background-image: -o-linear-gradient(top, #26759e, #133d5b);
    background-image: linear-gradient(top, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#checkAl").click(function(){
      $("input[type='checkbox']").prop('checked',this.checked);
    });
  });

</script>
</head>
<body>
<div class="navbar">
  <a href="admin.php" class="left"><h1>Online Voting System</h1></a>
  <a href="logout.php" class="right">Logout</a>
  <a href="viewrslts_admin.php">View Results</a>
  <a href="viewvoters.php">View Voters</a>
  <a href="viewcand.php">View Candidates</a>
  <a href="nominationreq.php">Nomination Requests</a>
  <a href="add_batch.php">Manage Batches</a>
  <a href="post.php">Manage Positions</a>
  <a href="startend.php">Start/End election</a> 
</div> 
<h2>Candidate details</h2>
<form method="post" action="search.php">
  <select name="opts">
    <option disabled selected hidden>-View by Batch-</option>
  <?php 
    include "db_conn.php";
       $s="SELECT * FROM batch";
       $r= mysqli_query($conn,$s);
       while($d = mysqli_fetch_array($r))
         {
          $beg=$d['batch'];
          echo "<option>$beg</option>";
         }
  ?>
  </select>
  <div class="buttons">
  <input type="submit" name="search" value="Search" class="button">
  </div></form>
  <form method="post" action="viewcand.php">
  <input type="submit" name="delete" value="Delete" class="delete"><br><br>
<?php
session_start();
 if (isset($_POST['delete'])) {

   if (isset($_POST['user'])) {
     foreach($_POST['user'] as $user){
      $query1="DELETE FROM candidate where username='$user'";
      $query2="DELETE FROM login where username='$user'";
      mysqli_query($conn,$query1);
      mysqli_query($conn,$query2);
     }
    header("location: viewcand.php");
   }

 }   
?>
<?php
if (isset($_POST['search'])) {
  $batch=$_POST['opts'];
  $q1 = "select * from candidate where batch='$batch'";
  $res=mysqli_query($conn,$q1);
  echo "<table cellpadding='30' align='center' id='myTable'>
<tr>
<th><input type='checkbox' id='checkAl'></th>
<th>Roll No.</th>
<th>Name</th>
<th>Mobile Number</th>
<th>Gender</th>
<th>Date Of Birth</th>
<th>Email id</th>
<th>UG/PG</th>
<th>Batch</th>
<th>Year of Study</th>
<th>Department</th>
<th>Candidate Position</th>

</tr>";
while($row = mysqli_fetch_array($res))
{
$user=$row['username'];  
echo "<tr>";
echo "<td><input type='checkbox' name='user[]' value='$user'></td>";
echo "<td>" . $row['rollno'] . "</td>";
echo "<td>" . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>";
echo "<td>" . $row['phno'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['dob'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['pgug'] . "</td>";
echo "<td>" . $row['batch'] . "</td>";
echo "<td>" . $row['yos'] . "</td>";
echo "<td>" . $row['course'] . "</td>";
echo "<td>" . $row['candidate_position'] . "</td>";
echo "</tr>";
}
echo "</table>";
}


?>
</form>
</body>
</html>