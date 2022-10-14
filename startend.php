<?php 
session_start();
include "db_conn.php";
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
h3{
  font-size: 50px;
  text-align: center;
  font-family: "Lucida Console", monospace;
  padding: 9%;
  color: #202020;
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
.buttons {
  display: block;
  width: 150px;
  margin: 0 auto;
  margin-top: 130px;
}
.button { 
    display: block;
    margin-bottom: 20px;
    text-decoration: none;
    cursor: pointer;
    font-size: 16px;
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
<br><br><br>
<form method="post" action="startend.php">
  <div class="buttons">
<button type="submit" name="start" value="Start election" class="button">Start Election</button><br><br>
<button type="submit" name="end" value="End election" class="button">End Election</button>
</div>
<?php
$s="SELECT * FROM admin";
$ss=mysqli_query($conn,$s);
$row=mysqli_fetch_array($ss);
$estatus=$row['election_status'];
echo '<h3 STYLE="text-align: center; font-size: 25px; color: green;">Current status: '.$estatus.' </h3>';
?>

<?php
include "db_conn.php";
if (isset($_POST['start'])) {

  $start1="INSERT INTO admin(election_status) VALUES('start')";
    $start2="UPDATE admin SET election_status='start' WHERE election_status='end'";
    $srslt2=mysqli_query($conn,$start2);
    echo '<script>alert("Election started successfully")</script>';
    echo'<script>window.location.href="startend.php";</script>';

  }
else if (isset($_POST['end'])) {
  $end="UPDATE admin SET election_status='end' WHERE election_status='start'";
  $erslt=mysqli_query($conn,$end);
  echo '<script>alert("Election ended successfully")</script>';
  echo'<script>window.location.href="startend.php";</script>';
}

?>
</form>
</body>
</html>
