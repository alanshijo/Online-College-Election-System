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
  color: black;
}

body {
  font-family: "Arial", "Helvetica", sans-serif;
  margin: 0;
  background-color: #F8F8FF;
}
h2{
  font-size: 36px;
  font-family: 'Righteous', cursive;
  text-align: center;
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
</style>
</head>
<body>

<div class="navbar">
  <a href="candidate.php" class="left">Online Voting System</a>
  <a href="logout.php" class="right">Logout</a>
  <a href="viewrslts_cand.php">View Results</a>
  <a href="makevote_cand.php">Make a vote</a>
  <a href="viewcand_cand.php">View candidates</a>
  
</div> 
<h2>Candidate details</h2>
<?php
include "db_conn.php";
if (mysqli_connect())
{
$sql = "SELECT * FROM candidate WHERE status='approved'";
$result = mysqli_query($conn,$sql);
echo "<table cellpadding='30' align='center'>
<tr>
<th>Roll No.</th>
<th>Name</th>
<th>Mobile Number</th>
<th>Gender</th>
<th>Date Of Birth</th>
<th>Email id</th>
<th>UG/PG</th>
<th>Year of Study</th>
<th>Department</th>
<th>Candidate Position</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['rollno'] . "</td>";
echo "<td>" . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['dob'] . "</td>";
echo "<td>" . $row['phno'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['pgug'] . "</td>";
echo "<td>" . $row['yos'] . "</td>";
echo "<td>" . $row['course'] . "</td>";
echo "<td>" . $row['candidate_position'] . "</td>";
echo "</tr>";
}
echo "</table>";
}
else
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
session_start();
 if (isset($_GET['id']))
 {
 $id = $_GET['id'];

 $result = mysqli_query($conn, "DELETE FROM candidate WHERE rollno = '$id'");
 
 header("Location: viewcand.php");
 }
 else
    
?>
</body>
</html>