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
<title> Admin </title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: "Arial", "Helvetica", sans-serif;
  margin: 0;
  background-color: #D3D3D3;
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

label {
  font-family: serif;
  color: black;
  font-size: 19px;
  padding: 20px;
}
input[type="text"]
{
  border: 2px solid #ccc;
  width: 10%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  cursor: pointer;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 3px;
  font-size: 16px;  
}
table {
  border-collapse: collapse;
  width: 700;
  border: 1px solid #282828;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #585858;
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
</style>
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
</div> <center><br><br><br>
<form action = "post_conn.php" method ="post"/>
<label>Position name :</label>
<input type="text" name="position_name" placeholder="Enter here" required/>
<br><br>
</div>
<div class="ad">
<input type="submit" name="submit" value="Add" class="button"/></center>
</form>
<?php
include "db_conn.php";
if (mysqli_connect())
{
$sql = "SELECT * FROM positions";
$result = mysqli_query($conn,$sql);
echo "<table cellpadding='20' align='center'>
<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
<tr>
<th>Sl. No.</th>
<th>Position name</th>
<th></th>
</tr>";
$inc=1;
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" .$inc."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="post.php?id=' . $row['position_name'] . '">Delete</a></td>';
echo "</tr>";
$inc++;
}
echo "</table>";
}
?>
<?php
 if (isset($_GET['id']))
 {
 $id = $_GET['id'];

 $result = mysqli_query($conn, "DELETE FROM positions WHERE position_name = '$id'");
 
 echo'<script>window.location.href="post.php";</script>';
 }  
 else 
?>
</div>
</body>
</html>
