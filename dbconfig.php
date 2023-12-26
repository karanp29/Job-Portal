<?php

$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "mca_hms";


//connecting to host
$conn = mysqli_connect($hostname, $username, "", "") or die("connection die");

if ($conn){
    echo "<hr>host connection successfully";
}
else{
    echo "<hr>host connection failed";
}
echo "<hr>";

$create_db = "CREATE DATABASE IF NOT EXISTS ". $database;
echo $create_db;
if ($conn->query($create_db)) {
    echo "<hr>".$database." created successfully or already exists";
} else {
    echo "<hr>Error creating ".$database.": " . $conn->error;
}
echo "<hr>";


if ($conn->query("use ".$database)) {
    echo "using database ".$database;
}
else{
    echo "something went wrong database doesnot exist/erorr";
}

$createTable = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL
)";
echo $createTable;
if ($conn->query($createTable) === TRUE) {
    echo "<hr>Table 'admin_users' created successfully or already exists";
} else {
    echo "<hr>Error creating table admin_users: " . $conn->error;
}
echo "<hr>";


$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL
)";
echo $createTable;
if ($conn->query($createTable) === TRUE) {
    echo "<hr>Table 'users' created successfully or already exists";
} else {
    echo "<hr>Error creating table users: " . $conn->error;
}
echo "<hr>";


$createTableJobDetails = "CREATE TABLE IF NOT EXISTS jobs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    job_title VARCHAR(255) NOT NULL,
    job_position VARCHAR(255) NOT NULL,
    job_desc VARCHAR(255) NOT NULL,
    job_salary_start decimal(10,2) NOT NULL,
    job_salary_end decimal(10,2) NOT NULL,
    job_experience int,
    job_cert VARCHAR(255),
    job_skills VARCHAR(255) NOT NULL,
    job_qualify VARCHAR(255),
    job_openings VARCHAR(255),
	job_location VARCHAR(255)
)";
echo $createTableJobDetails;
if ($conn->query($createTableJobDetails)) {
    echo "<hr>Table 'jobs' created successfully or already exists";
} else {
    echo "<hr>Error creating table jobs: " . $conn->error;
}
echo "<hr>";


$createTableapplied_jobs = "CREATE TABLE IF NOT EXISTS applied_jobs (
    applied_id INT PRIMARY KEY AUTO_INCREMENT,
    job_id INT,
    user_id INT,
    app_Status varchar(255),
    resume_path varchar(255)
)";
echo $createTableapplied_jobs;
if ($conn->query($createTableapplied_jobs)) {
    echo "<hr>Table createTableapplied_jobs created successfully or already exists";
} else {
    echo "<hr>Error creating table createTableapplied_jobs: " . $conn->error;
}
echo "<hr>";

// insert some values

// $ins_query = "insert into admin_users values(1,'admin','admin')";
// echo $ins_query;
// if ($conn->query($ins_query)) {
//     echo "<hr>record inserted";
// } else {
//     echo "<hr>record notinserted " . $conn->error;
// }
// echo "<hr>";
?>
