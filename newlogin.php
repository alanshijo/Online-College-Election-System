<html>
<head>
	<title>LOGIN</title>
	<style type="text/css">
      body {
     background: #c91515d9;
     display: flex;
     justify-content: center;
     align-items: center;
     height: 100vh;
     flex-direction: column;
}

*{
     font-family: sans-serif;
     box-sizing: border-box;
}

form {
     width: 500px;
     border: 2px solid #ccc;
     padding: 30px;
     background: #fff;
     border-radius: 15px;
}

h2 {
     text-align: center;
     margin-bottom: 40px;
     
     font-family: 'Georgia', serif
}

input {
     display: block;
     border: 2px solid #ccc;
     width: 95%;
     padding: 10px;
     margin: 10px auto;
     border-radius: 5px;
}
select {
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
}

label {
     color: black;
     font-family: 'Georgia', serif;
     font-size: 18px;
     padding: 10px;
}

.button {
     float: right;
     background: #4CAF50;
     padding: 10px 15px;
     color: #fff;
     border-radius: 5px;
     margin-right: 10px;
     border: none;
     cursor: pointer;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
     text-align: center;
     color: #fff;
}
a{
     font-size: 13px;
     margin-left: 11;
     font-family: serif;
     color: #0b79c7;

}
.previous {
  background-color: #f1f1f1;
  color: #d13737;
}
.round {
  border-radius: 50%;
}

     </style>
</head>
<body>
   <a STYLE="text-decoration: none;display: inline-block;padding: 8px 16px;margin-top:-90;margin-left:-1450;:hover {background-color: #ddd;color: #d13737;}" href="index.php" class="previous round">&#8249;</a><br><br><br><br>
     <form action="connection.php" method="post">
     	<h2>LOGIN</h2>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Username" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" required><br>

          <label>I'm </label>
          
          <select name="type" required>
               <option disabled selected hidden>-Select your usertype-</option>
               <option name="type" value="admin">Admin</option>
               <option name="type" value="voter">Voter</option>
               <option name="type" value="candidate">Candidate</option>
          </select><br><br>
          <b><a href="index.php">Don't have an account? Create one!</a></b>
          
     	<button type="submit" name="submit" class="button">Login</button>
     </form>
</body>
</html>