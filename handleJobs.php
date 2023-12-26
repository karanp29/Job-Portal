<?php
session_start();
include "dbconnection.php";
global $conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_REQUEST["jobid"];
    echo "<script>alert('2')</script>";

    $filename = $_FILES["pdfFile"]["name"];
    $tempfile = $_FILES["pdfFile"]["tmp_name"];
    $file_size = $_FILES['pdfFile']['size'];
    // echo $file_size;
    $file_type = $_FILES['pdfFile']['type'];
    // echo $file_type;
    $folder = "uploads/" . $filename; // Specify the directory where you want to save the uploaded files



    $ins = "    INSERT INTO `applied_jobs` ( `job_id`, `user_id`, `app_Status`, `resume_path`)
        VALUES (" . $job_id . ", " . $_SESSION["userid"] . ", 'Pending', '" . $filename . "');";

    $result = $conn->query($ins);
    if ($result) {
        echo "inserted success";
    }
    if ($file_type == "application/pdf") {
        if (move_uploaded_file($tempfile, $folder)) {
            echo "file moved  successfully";
            header("Location: ./index.php");
            exit();
        }
    }

}
?>