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
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  font-weight: bold;
  display: inline-block;
  border-radius: 3px;
  font-size: 16px;   
}
table {
  border-collapse: collapse;
  width: 420;
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
.alert {
  padding: 15px 20px;
  background-color: #82b9d4;
  color: #3d6c83;
  margin-left: 500;
  margin-right: 500;
  border-radius: 8px;
  margin-top: -300;
  font-weight: bold;
}

.closebtn {
  margin-left: 15px;
  color: #3d6c83;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script type="text/javascript">
function dismiss(){
    document.getElementById('dismiss').pDoc.parentNode.style.display='none';
};
</script>
</head>
<body>

<div class="header">
  
</div>

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
</div> <br><br><br>
<form action = "batch_conn.php" method ="post"/><center>
<label>Beginning Year</label>
<input type="text" name="beg" placeholder="FROM (Year)" required/>
<label> -&ensp;&ensp;&ensp; Ending Year</label>
<input type="text" name="end" placeholder="TO (Year)" required/>
<br><br>
</div>
<div class="ad">
<input type="submit" name="submit" value="Add" class="button"/></center>
</form>
<center><h3 style="font-family: 'Righteous', cursive; text-decoration: underline;">AVAILABLE BATCHES</h3></center>
<?php
include "db_conn.php";
if (mysqli_connect())
{
$sql = "SELECT * FROM batch";
$result = mysqli_query($conn,$sql);
echo "<table cellpadding='20' align='center'>

<tr>
<th>Sl. No.</th>
<th>Batch</th>
<th></th>
</tr>";
$inc=1;
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" .$inc."</td>";
echo "<td>" . $row['batch']."</td>";
echo '<td><a href="add_batch.php?id=' . $row['batch'] . '">Delete</a></td>';
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

 $result = mysqli_query($conn, "DELETE FROM batch WHERE batch = '$id'");
 header("Location: add_batch.php");
 }
 else
    
?>
</div>
</body>
</html>
