<html>
<head>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("index_image.jpg");
  background-size: cover;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  padding: 20px;
}


.nav {
  background-color: transparent;
  color: white;
  border: 4px solid tomato;
  border-radius: 8px;
  float: right;
  display: block;
  margin: 15px;
  text-align: center;
  padding: 15px 30px;
  text-decoration: none;
}
 .navbar h1 {
  float: left;
  font-size: 30px;
  color: white;
  margin: 10px 30px;
 }

 h2 {
  text-align: center;
  font-family: 'Brush Script MT', cursive;
  padding: 10%;
  font-size: 400%;
  color: rgb(255, 52, 51);
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
 }
 .dropdown {
  float: right;
}

.dropdown .dropbtn {
  background-color: transparent;
  color: white;
  border: 4px solid tomato;
  border-radius: 8px;
  float: right;
  display: block;
  margin: 15px;
  text-align: center;
  padding: 15px 30px;
  text-decoration: none;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>

<div class="navbar">
  <h1 STYLE="font-family: cursive;">e-Voting</h1>
  <a href="newlogin.php" class="nav">LOGIN</a>
  <div class="dropdown">
  <button class="dropbtn" class="nav">REGISTER</button>
  <div class="dropdown-content">
      <a href="voterreg.php"> VOTER </a>
      <a href="nomination.php">  CANDIDATE </a>
    </div>
  </div> 
</div>
<h2>College Election Management System</h2>
</div>
</body>
</html>
