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
    <title>Results</title>
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
  text-align: center;
  font-family: 'Righteous', cursive;
  text-decoration: underline;
}
.header {
  padding: 30px;
  text-align: center;
  background: #1abc9c;
  color: white
}


.header h1 {
  font-size: 55px;
  font-family: 'Brush Script MT', cursive;
  text-shadow: -1px 0 black, 0 2px black, 2px 0 black, 0 2px black;
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
  width: 900;
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
.button{
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 7px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  border-radius: 4px;
  right: 30;
  position: absolute;
  margin-top: 20px;
}
</style>
<iframe src="print.php" style="visibility:hidden; display: none;" name="frame"></iframe>
</head>
<body>

<div class="navbar">
  <a href="voter.php"  class="left">Online Voting System</a>
  <a href="logout.php">Logout</a>
  <a href="viewrslts_voter.php">View Results</a>
  <a href="makevote_voter.php">Make a vote</a>
  <a href="viewcand_voter.php">View candidates</a>
  
</div> 
<button type="submit" onclick="frames['frame'].print()" class="button"><b><font style="color: white;">Print</font></b></button>
<h2>Results</h2>

<?php
include "db_conn.php";
if (mysqli_connect())
{
$sql = "SELECT * FROM candidate WHERE status='approved' ORDER BY candidate_votes DESC";
$result = mysqli_query($conn,$sql);
$chck = mysqli_num_rows($result);
if ($chck==0) {
  echo "<table cellpadding='30' align='center'>
<tr>
<th>Sl. No.</th>
<th>Name</th>
<th>Position Name</th>
<th>Total No. of votes</th>
</tr></table>";
echo '<td><br><center><i>No results to display</i></center></td>';
}
else {
echo "<table cellpadding='30' align='center'>
<tr>
<th>Sl. No.</th>
<th>Name</th>
<th>Position Name</th>
<th>Total No. of votes</th>
</tr>";
$n=1;
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $n . "</td>";
echo "<td>" . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>";
echo "<td>" . $row['candidate_position'] . "</td>";
echo "<td>" . $row['candidate_votes'] . "</td>";
echo "</tr>";$n++;
}
echo "</table>";
echo "<br>";}
}
else
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
</body>
</html>