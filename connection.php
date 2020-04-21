<?php
$host="localhost";
$user="root";
$password="";
$dbname="studentrecordmanagementsystem";

$conn=new mysqli($host,$user,$password,$dbname);
//connection check
if($conn->connect_error){
    echo "connection failed";
}
else{
    //echo "<script>console.log('Connection established')</script>";
}

?>