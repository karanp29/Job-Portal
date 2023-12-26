<?php
session_start();
include "dbconnection.php";
global $conn;

echo "<script>alert('1')</script>";
if (isset($_SESSION["logged-user"])) {
    echo "<script>alert('user logged in   ')</script>";
    header("Location: ./index.php");
} else {
}

echo "<script>console.log('2')</script>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<script>console.log('3')</script>";

    if ($_REQUEST["action"] == "Login") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($conn) {
        } else {
            echo "<hr>host/database connection failed";
        }

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password == $row["pwd"]) {
                $_SESSION["logged-user"] = True;
                $_SESSION["userid"] = $row["id"];
                header("Location: ./index.php");
                exit();
            } else {

            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
            Login Credentails Failed<button type="button" class="btn-close" data-bs-dismiss="alert" 
            aria-label="Close"></button>
            </div>';
        }
    }

}
?>