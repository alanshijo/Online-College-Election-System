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
    <title>Final Election Results</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: "Arial", "Helvetica", sans-serif;
  margin: 0;
  background-color: white;
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
  width: 800;
  border: 1px solid #282828;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #303030;
  width: 400;
}

tr {background-color: #f2f2f2}

th {
  background-color: white;
  color: black;
  text-decoration: bold;
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

</style>
</head>
<body>
<br><br><h2>Final Election Results</h2>
<?php
include "db_conn.php";
if (mysqli_connect())
{
$sql1 = "SELECT fname,mname,lname, A.candidate_position, candidate_votes FROM candidate A, (SELECT candidate_position, Max(candidate_votes) AS M FROM candidate WHERE candidate_position IN (SELECT DISTINCT( candidate_position ) FROM candidate) GROUP BY candidate_position) B WHERE  A.candidate_position = B.candidate_position AND A.candidate_votes = B.M AND status='approved' ORDER BY candidate_votes DESC";
$result1 = mysqli_query($conn,$sql1);	
 echo "<table cellpadding='30' align='center'>
<tr>
<th>Sl. No.</th>
<th>Name</th>
<th>Position</th>
<th>Total No. of Votes</th>
</tr>";$no=1;
while($row = mysqli_fetch_array($result1))
{
echo "<tr>";
echo "<td>" . $no . "</td>";
echo "<td>" . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>";
echo "<td>" . $row['candidate_position'] . "</td>";
echo "<td>" . $row['candidate_votes'] . "</td>";
echo "</tr>";$no++;
}
echo "</table>";
}
else
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
</body>
</html>