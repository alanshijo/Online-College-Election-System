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
<title>Candidate</title>
<style>
* {
  box-sizing: border-box;
}


body {
  font-family: Arial, Helvetica, sans-serif;
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

</style>
</head>
<body>
<div class="navbar">
  <a href="candidate.php" class="left">Online Voting System</a>
  <a href="logout.php">Logout</a>
  <a href="viewrslts_cand.php">View Results</a>
  <a href="makevote_cand.php">Make a vote</a> 
   <a href="viewcand_cand.php">View candidates</a>
</div>
<h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
</body>
</html>