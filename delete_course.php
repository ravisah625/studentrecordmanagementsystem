<?php

include "connection.php";

$cid=$_GET['id'];
$del="DELETE FROM courses WHERE cid = $cid";
if(mysqli_query($conn,$del)){
    echo "<script>window.open('view_course.php','_self')</script>";

}
mysqli_close($conn);
?>