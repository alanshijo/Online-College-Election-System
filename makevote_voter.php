<?php
require('db_conn.php');
session_start();
if (!(isset($_SESSION['username']))) {
    header("location:newlogin.php");
} else {
    $username = $_SESSION['username'];
    }
?>
<html>
<head>
<title>Voting</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #F8F8FF;
}
h3{
  font-size: 50px;
  text-align: center;
  font-family: "Lucida Console", monospace;
  padding: 9%;
  color: white;
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

select {
  display: block;
  border: 2px solid #ccc;
  width: 250;
  padding: 10px;
  border-radius: 5px;
}
 .button1 {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 3px;
  font-size: 16px; 
}
.button2 {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 3px;
  font-size: 16px; 
}
label {
  font-family: serif;
  color: black;
  font-size: 20px;
  padding: 450;
}
table {
  border-collapse: collapse;
  width: 600;
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
marquee{color: red;}
</style>
</head>
<body>

<div class="navbar">
  <a href="voter.php"  class="left">Online Voting System</a>
  <a href="logout.php">Logout</a>
  <a href="viewrslts_voter.php">View Results</a>
  <a href="makevote_voter.php">Make a vote</a>
  <a href="viewcand_voter.php">View candidates</a>
</div>
<marquee><h4><i>NB: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process cannot be undone so think wisely before casting your vote.</i></h4></marquee>
<form method="post" action="makevote_voter.php">
 <center>Choose position:</center><br>
    <center><SELECT name="position">
      <option disabled selected hidden>-Select the position-</option>
    <?php 
    include "db_conn.php";
    if (mysqli_connect())
    {
    $sql = "SELECT * FROM positions";
    $result = mysqli_query($conn,$sql);

    while ($row=mysqli_fetch_array($result)) {
      $positions=$row['position_name'];
      echo "<OPTION value='$positions'>$positions</OPTION>";
    }
  }
    ?>
    </SELECT></center><br>
    <center><input type="submit" name="Submit" value="See Candidates" class="button1" /></center>

    <?php
    session_start();
if (isset($_POST['Submit']))
{
  $positions= $_POST['position'];
  $q1 = "select * from candidate where candidate_position='$positions'";
  $res=mysqli_query($conn,$q1);
  $rty = mysqli_num_rows($res);
  if($rty==0){
      echo  "<table align='center'>
<CAPTION><h4>Candidates:</h4></CAPTION>
<tr>
<th>Sl. No.</th>
<th>Candidate name</th>
<th></th>
</tr></table>";
 echo '<td><br><center><i>No candidates to display</i></center></td>';
  }
    else
  {
    echo  "<table align='center'>
<CAPTION><h4>Candidates:</h4></CAPTION>
<tr>
<th>Sl. No.</th>
<th>Candidate name</th>
<th></th>
</tr>";
$no=1;
while ($row=mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>" . $no . "</td>";
echo "<td>" . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>";
$fn=$row['fname'];
echo "<td><input type='radio' name='vote' value='$fn'/></td>";
echo "</tr>"; $no++;
}
 echo "</table>";
 echo '<td><input type="hidden" name="pos" value="'.$positions.'"></td>';
 echo '<br>';
 echo '<td><center><input type="submit" name="vote_submit" class="button2"></center></td>';

}}
include 'db_conn.php';
if(isset($_POST['vote_submit'])) {
  $vote=$_POST['vote'];
//echo $vote;
$user_id=$_SESSION['username'];
$pos=$_POST['pos'];
//echo $user_id;
//echo $pos;
    $sql=mysqli_query($conn,"SELECT position,voter_id FROM votes where position='$pos' and voter_id='$user_id'");
    $q=mysqli_num_rows($sql);
if($q>0)
{
    echo "<center><h4 style='color:red'>You have already done your vote for this Position</h4></center>";

}
else
{

  $vote=$_POST['vote'];
  $username=$_SESSION['username'];
    $ins=mysqli_query($conn,"INSERT INTO votes VALUES ('$username','$pos')") or die($conn);
    mysqli_query($conn, "UPDATE candidate SET candidate_votes=candidate_votes+1 WHERE fname='$vote'");
    mysqli_close($conn);
 
echo "<center><h4 style='color:red'>Congrats, You have submitted your vote for canditate ".$vote."</h4></center>";

}

}


?> 
</form>
</body>
</html>