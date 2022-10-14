<html>
<head>
  <title>Nomination form</title>
  <style type="text/css">
  	body {
 font-family: sans-serif;
 background-color: #1690A7;
 color: black;
}
h1{
    padding-top: 30px;
    text-align: center;
    text-decoration: underline;
    color: white;
    font-size: 30px;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
    font-family: fantasy;
}
    
.bo {
    padding: 40px 20px;
    font-size: 15px;
   }
form {
  width: 500px;
  margin: 1% 33%;
  border: 2px solid #ccc;
  padding: 30px;
  background: #fff;
  border-radius: 15px;
}

input[type="text"]
{
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
input[type="password"]
{
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type="number"]
{
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
  -moz-appearance: textfield;
}
input[type="date"]
{
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
  -moz-appearance: textfield;
}input[type="submit"]
{
  background-color: #4CAF50;
  border: solid 1px;
  color: white;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  border-radius: 15px;
  padding: 10px 25px; 
}
label {
  font-family: serif;
  color: black;
  font-size: 18px;
  padding: 10px;
}

.button {
  background-color: #f4511e;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  margin-left: 120%; 
}
.button:hover {opacity: 1}
input[type="date"]::before {
  color: #999999;
  content: attr(placeholder);
}
input[type="date"] {
  color: #ffffff;
  font-family: sans-serif;
}
input[type="date"]:focus,
input[type="date"]:valid {
  color: #666666;
}
input[type="date"]:focus::before,
input[type="date"]:valid::before {
  content: "" !important;
}
.previous {
  background-color: #f1f1f1;
  color: #1690a7;
}
.round {
  border-radius: 50%;
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
<script type="text/javascript">
function phone()
{
var m=document.getElementById("mn").value;
var str=/^[0-9]{10}$/;
 if(str.test(m)==false)
   alert("Invalid mobile number");
}
function email()
{
var a=document.getElementById("ema").value;
var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
if(st.test(a)==false)
alert("Invalid email id");
}

</script>
</head>
<body>
  <a STYLE="text-decoration: none;display: inline-block;padding: 8px 16px;:hover {background-color: #ddd;color: #1690a7;}" href="index.php" class="previous round">&#8249;</a>
<h1 align = "center" > Nomination form </h1>
<form METHOD = "POST" action = "nominregcnct.php" onsubmit = "email()">
<table align="center">
<div class="bo">
<label>Roll No.: </label><input type = "text" name ="rollno" required/>
<label>First Name: </label><input type = "text" name ="fname" required/>
<label>Middle Name: </label><input type = "text" name ="mname">
<label>Last Name: </label> <input type = "text" name ="lname" required/>
<label>Mobile Number: </label><input type = "number" name ="phno" id ="mn" onChange = "phone()" required/>
<label>Gender:&nbsp;&nbsp;
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Others">Others
</label><br><br>
<label>Date Of Birth:</label><input type="date" name="dob" placeholder="DD/MM/YYY" required> 
<label>Email id:</label><input type= "text" name = "email" id="ema" onChange = "email()" placeholder ="examaple@mail.com" required/>
<label>UG / PG:</label>
 <select name = "pgug">
 	<option value="0">-Select-</option>
 	<option value="UG">UG</option>
 	<option value="PG">PG</option>
 </select>
 <label>Year of Study:</label>
 <select name = "yos">
 	<option value="0">-Select-</option>
 	<option value="1">1</option>
 	<option value="2">2</option>
 	<option value="3">3</option>
 </select>
<label>Course:
  <select name = "course">
<option value="0">-Select Stream-</option>
<option value="Bcom Computer Applications">Bcom Computer Applications</option>
<option value="Bcom Finance Management">Bcom Finance Management</option>
<option value="Bcom Marketing">Bcom Marketing</option>
<option value="Bachelor of Computer Applications(Aided)">Bachelor of Computer Applications(Aided)</option>
<option value="Bachelor of Computer Applications">Bachelor of Computer Applications</option>
<option value="BSc Physcis">BSc Physcis</option>
<option value="BSc Chemistry">BSc Chemistry</option>
<option value="BSc Mathematics">BSc Mathematics</option>
<option value="BSc Zoology">BSc Zoology</option>
<option value="BSc Botany">BSc Botany</option>
<option value="BSc Food Science ">BSc Food Science</option>
<option value="BSc Botany">BSc Botany</option>
<option value="M.Com Marketing">M.Com Marketing</option>
<option value="M.Com Taxation">M.Com Taxation</option>
<option value="MSc Zoology">MSc Zoology</option>
<option value="MSc Botany">MSc Botany</option>
<option value="MSc Physics">MSc Physics</option>
<option value="MSc Chemistry">MSc Chemistry</option>
<option value="MSc Microbiology">MSc Microbiology</option>
<option value="MSc Computer Science">MSc Computer Science</option>
<option value="MA English">MA English</option>

</select></label>
<label>Batch:
<select name="batch">
<option value="0">-Select your batch-</option>
<?php 
$conn=mysqli_connect("localhost","root","","cvote");
$s="SELECT * FROM batch";
$r= mysqli_query($conn, $s);
while($d = mysqli_fetch_array($r))
{
$beg=$d['batch'];
echo "<option>$beg</option>";
}
?>
 </select>
</label>
<label>Position:
  <select name = "position_name">
<option value="0">-Select position-</option>
<?php 
$conn=mysqli_connect("localhost","root","","cvote");
$s="SELECT * FROM positions";
$r= mysqli_query($conn, $s);
while($d = mysqli_fetch_array($r))
{
$position_name=$d['position_name'];
echo "<option>$position_name</option>";
}
?>
</select></label>
<label>Username: <input type = "text" name ="username"  required/></label>
<label>Password: <input type = "password" name ="password"  required/></label><br>
<input type="checkbox" name="checkbox" required> I have read and agree to the <a href="termsandconditions.pdf">Terms & Conditions</a> 
<tr><td><input type="submit" name="submit" value ="Register" class="button"></td></tr>
</div>
</table>
</form>
</body>
</html>