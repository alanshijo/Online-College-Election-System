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
  text-align: center;
  color: black;
  text-decoration: underline;
  font-family: 'Righteous', cursive;
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
  color: white;
  font-size: 25;
  text-decoration: none;
  font-family: 'Brush Script MT', cursive;
  text-shadow: -1px 0 black, 0 2px black, 2px 0 black, 0 2px black;

}
.navbar a:hover {
  background-color: #ddd;
  color: black;
  border-radius: 5px;
}

table {
  border-collapse: collapse;
  width: 1500;
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
  padding: 9px 19px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 3px;
  font-size: 13px;
}
.approve{
  background: rgb(28, 184, 65);
  border: none;
  cursor: pointer;
  color: white;
  padding: 7px 16px;
  text-align: center;
  text-decoration: none;
  font-weight: bold;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  right: 30;
  position: absolute;
  margin-right: 130;
}
.reject{
  background: rgb(227, 35, 35, 1);
  border: none;
  color: white;
  padding: 7px 16px;
  text-align: center;
  cursor: pointer;
  text-decoration: none;
  font-weight: bold;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  right: 30;
  position: absolute;
  margin-right: 40;
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
  <a href="admin.php" class="left">Online Voting System</a>
  <a href="logout.php" class="right">Logout</a>
  <a href="viewrslts_admin.php">View Results</a>
  <a href="viewvoters.php">View Voters</a>
  <a href="viewcand.php">View Candidates</a>
  <a href="nominationreq.php">Nomination Requests</a>
  <a href="add_batch.php">Manage Batches</a>
  <a href="post.php">Manage Positions</a>
  <a href="startend.php">Start/End election</a> 
</div> 
<h2>New Requests</h2>
<form method="post" action="nominationreq.php">
  <input type="submit" name="approve" value="Approve" class="approve">
  <input type="submit" name="reject" value="Reject" class="reject">
  <br><br>
<?php
include "db_conn.php";
if (mysqli_connect())
{
$sql = "SELECT * FROM candidate WHERE status=''";
$result = mysqli_query($conn,$sql);
$rs=mysqli_num_rows($result);
if ($rs==0) {
  echo "<table cellpadding='30' align='center'>
<tr>
<th>Roll No.</th>
<th>Name</th>
<th>Gender</th>
<th>Mobile Number</th>
<th>Email id</th>
<th>UG/PG</th>
<th>Year of Study</th>
<th>Course</th>
<th>Candidate Position</th>
<th></th>
</tr></table>";
echo '<td><br><b><center><i>No new requests</i></center></b></td>';
}
else {
echo "<table cellpadding='30' align='center'>
<tr>
<th><input type='checkbox' id='checkAl'></th>
<th>Roll No.</th>
<th>Name</th>
<th>Gender</th>
<th>Mobile Number</th>
<th>Email id</th>
<th>UG/PG</th>
<th>Year of Study</th>
<th>Course</th>
<th>Candidate Position</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
$user=$row['username']; 
echo "<tr>";
echo "<td><input type='checkbox' name='user[]' value='$user'></td>";
echo "<td>" . $row['rollno'] . "</td>";
echo "<td>" . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['phno'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['pgug'] . "</td>";
echo "<td>" . $row['yos'] . "</td>";
echo "<td>" . $row['course'] . "</td>";
echo "<td>" . $row['candidate_position'] . "</td>";
echo "</tr>";
}
echo "</table>";
}}
else
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
session_start();
if (isset($_POST['approve'])) {

   if (isset($_POST['user'])) {
     foreach($_POST['user'] as $user){
      $query1="UPDATE candidate SET status='approved' WHERE username = '$user'";
      $query2="UPDATE login SET login_status='approved' WHERE username = '$user'";
      mysqli_query($conn,$query1);
      mysqli_query($conn,$query2);
     }
    header("location: nominationreq.php");
   }

 }
 else if (isset($_POST['reject'])) {

   if (isset($_POST['user'])) {
     foreach($_POST['user'] as $user){
      $query3="UPDATE candidate SET status='rejected' WHERE username = '$user'";
      $query4="UPDATE login SET login_status='rejected' WHERE username = '$user'";
      mysqli_query($conn,$query3);
      mysqli_query($conn,$query4);
     }
    header("location: nominationreq.php");
   }

 }
   
?>
</form>
</body>
</html>