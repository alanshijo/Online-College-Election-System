<html>
<body>
<?php
$position_name = $_POST['position_name'];
include "db_conn.php";
$sql1="select * from positions where position_name='$position_name'";
        $result1 = mysqli_query($conn,$sql1);
        $rscheck1 = mysqli_num_rows($result1);
        if($rscheck1 == 0)
        {
        $sql="INSERT INTO positions(position_name) VALUES('$position_name')";
        $result = mysqli_query($conn,$sql);
        echo '<script>alert("Position added successfully")</script>';
        echo'<script>window.location.href="post.php";</script>';
        }
       else
       { 
       echo '<script>alert("Position already exists")</script>';
       echo'<script>window.location.href="post.php";</script>';

}
    mysqli_close($conn);
?>
</body>
</html>