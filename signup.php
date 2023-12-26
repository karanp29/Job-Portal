<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Acces Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
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

        if ($_REQUEST["action"] == "Signup") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if ($password != $cpassword) {

                echo '<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                Login Credentails Failed<button type="button" class="btn-close" data-bs-dismiss="alert" 
                aria-label="Close"></button>
                </div>';
                return;

            }
            if ($conn) {
            } else {
                echo "<hr>host/database connection failed";
            }


            $ins = "INSERT INTO USERS (USERNAME, PWD) VALUES ('" . $username . "','" . $password . "')";
            $result = $conn->query($ins);

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
    <div class="container">
        <h2>Create New Account</h2>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="username">Email address/ Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"
                    placeholder="Confirm Password">
            </div>
            <input type="submit" value="Signup" name="action" class="btn btn-outline-primary">
        </form>
    </div>
</body>

</html>
<?php
?>