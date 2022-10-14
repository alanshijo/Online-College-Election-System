<?php
error_reporting(1);
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "cvote";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>