<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Acces Panel</title>
    <link href="../assets/favicon.svg" rel="icon" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION["logged-admin"])) {
        echo "<script>alert('alerdy logged in   ')</script>";
        header("Location: createJobPosts.php");
    } else {
        // not logged in
    }
    // if($_SESSION["logged"] == True){
//     // echo "<script>alert('2')</script>";
//     header("Location: createJobPosts.php");
// }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        include "dbconnection.php";
        include "customException.php";

        global $conn;
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($conn) {
            // echo "<script>alert('sdfds')</script>";
            // echo "<hr>host/database connection successfully";
        } else {
            echo "<hr>host/database connection failed";
        }

        try {
            $sql = "SELECT * FROM admin_users WHERE username='$username'";
            //execute query
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                // echo "<script>alert('2')</script>";
                $row = $result->fetch_assoc();
                if ($password == $row["pwd"]) {
                    $_SESSION["logged-admin"] = True;
                    $_SESSION["userid-admin"] = "";
                    header("Location: createJobPosts.php");
                    exit();
                } else {

                }
            } else {
                throw new customLoginError();

            }
        } catch (customLoginError $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
            '.$e->errorMessage().'<button type="button" class="btn-close" data-bs-dismiss="alert" 
            aria-label="Close"></button>
            </div>';
        }
    }

    // $conn->close();
    ?>
    <div class="container-fluid d-flex" style="height: 100vh;">

        <div class="col-3 m-auto  border border-dark p-5">
            <h2 class="text-center">ADMIN LOGIN</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Email address</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <input type="submit" value="Login" name="action" class="btn btn-primary mt-2">
            </form>
        </div>
    </div>
</body>

</html>
<?php
?>