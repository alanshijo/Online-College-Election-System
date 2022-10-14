<html>
 <body>
  <?php
$rollno=$_POST["rollno"];
$fname=$_POST["fname"];
$mname=$_POST["mname"];
$lname=$_POST["lname"];
$phno=$_POST["phno"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$pgug=$_POST["pgug"];
$yos=$_POST["yos"];
$course=$_POST["course"];
$batch=$_POST["batch"];
$username=$_POST["username"];
$password=$_POST["password"];
$type="voter";
$status="approved";
$conn=mysqli_connect("localhost","root","","cvote");
$sl1="SELECT * FROM candidate WHERE username='$username' or rollno='$rollno'";
$rsult1 = mysqli_query($conn, $sl1);
$resultcheck1=mysqli_num_rows($rsult1);
$sl2="SELECT * FROM voter WHERE username='$username' or rollno='$rollno'";
$rsult2 = mysqli_query($conn, $sl2);
$resultcheck2=mysqli_num_rows($rsult2);
if($resultcheck1 == 0 && $resultcheck2 == 0)
{
$sql= "INSERT INTO voter VALUES ('$rollno' , '$fname' , '$mname' , '$lname' , '$phno' , '$gender' , '$dob' , '$email' , '$pgug' , '$yos' , '$course' , '$batch' , '$username', '$status')";
$q=mysqli_query($conn,$sql);
if($q)
{
 $sq= "INSERT INTO login VALUES ('$username' , '$password' , '$type', '$status')";
 $qu=mysqli_query($conn,$sq);
 echo'<script> alert ("Registered successfully...Now please login");</script>';
 echo'<script>window.location.href="newlogin.php";</script>';   
}
else
{
     die("could not connect".mysqli_error($conn));
}
}
else
{
echo '<script> alert ("You already have an account...Please login");</script>';
echo'<script>window.location.href="newlogin.php";</script>';
}
mysqli_close($conn);
?>
</body>
</html>