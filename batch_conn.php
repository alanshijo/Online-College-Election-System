<html>
<body>
<?php
$beg = $_POST['beg'];
$end = $_POST['end'];
include "db_conn.php";
$sql1="SELECT * FROM batch WHERE batch='$beg - $end'";
        $result1 = mysqli_query($conn,$sql1);
        $rscheck1 = mysqli_num_rows($result1);
        if($rscheck1 == 0)
        {
        $sql="INSERT INTO batch(batch) VALUES('$beg - $end')";
        $result = mysqli_query($conn,$sql);
        echo'<script>alert("Batch Added successfully")</script>';
        echo'<script>window.location.href="add_batch.php";</script>';
        }
       else
       { 
       echo'<script>alert("Batch Already exists")</script>';
        echo'<script>window.location.href="add_batch.php";</script>';
}
    mysqli_close($conn);
?>
</body>
</html>