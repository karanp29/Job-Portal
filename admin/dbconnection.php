<?php

$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "mca_hms";

//connecting to host
$conn = mysqli_connect($hostname, $username, "",$database) or die("connection die");

if ($conn){
    // echo "<hr>host/database connection successfully";
}
else{
    echo "<hr>host/database connection failed";
}


?>
