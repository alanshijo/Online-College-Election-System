<?php 
session_start(); 
include "db_conn.php";
    $username=$_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
if (isset($_POST['submit'])) {
    
		$sql = "SELECT * FROM login WHERE username='$username' AND password='$password' AND type='$type'";
		$result = mysqli_query($conn, $sql);
		$rsltcheck = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
		if ($rsltcheck == 1) {
			
            if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'admin' && $row['login_status'] == 'approved') {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['type'] = $row['type'];
            	header("location: admin.php");
		        
            }
            else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'voter' && $row['login_status'] == 'approved') {
				$_SESSION['username'] = $row['username'];
            	$_SESSION['password'] = $row['password'];  
            	$_SESSION['type'] = $row['type'];         	
				header("location: voter.php");
		       
			}
			else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'candidate' && $row['login_status'] == 'approved') {
				$_SESSION['username'] = $row['username'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['type'] = $row['type'];  
				header("location: candidate.php");
		       
			}
			else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'admin' && $row['login_status'] == '') {
            	echo '<script> alert ("Your application is being pending.Please wait..");</script>';
	    	    echo'<script>window.location.href="newlogin.php";</script>';
		        
            }
            else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'voter' && $row['login_status'] == '') {
				echo '<script> alert ("Your application is being pending.Please wait..");</script>';
	    	    echo'<script>window.location.href="newlogin.php";</script>';
		       
			}
			else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'candidate' && $row['login_status'] == '') {
				echo '<script> alert ("Your application is being pending.Please wait..");</script>';
	    	    echo'<script>window.location.href="newlogin.php";</script>';
		       
			}
			else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'admin' && $row['login_status'] == 'rejected') {
            	echo '<script> alert ("Your application is rejected");</script>';
	    	    echo'<script>window.location.href="newlogin.php";</script>';
		        
            }
            else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'voter' && $row['login_status'] == 'rejected') {
				echo '<script> alert ("Your application is rejected");</script>';
	    	    echo'<script>window.location.href="newlogin.php";</script>';
		       
			}
			else if ($row['username'] == $username && $row['password'] == $password && $row['type'] == 'candidate' && $row['login_status'] == 'rejected') {
				echo '<script> alert ("Your application is rejected");</script>';
	    	    echo'<script>window.location.href="newlogin.php";</script>';
		       
			}		
	    }
	    else {
	    	 echo '<script> alert ("Entered Username or Password doesnot match");</script>';
	    	 echo'<script>window.location.href="newlogin.php";</script>';
		    }
	
}
?>