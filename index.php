<?php
session_start();
include "dbconnection.php";
global $conn,$data;
$_GLOBAL["search"] = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ($_REQUEST["action"] == "search") {
    $_GLOBAL["search"] =  $_REQUEST["search"];
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Get Hired Easily!!!</title>
    <!-- favicon -->
    <link href="./assets/favicon.svg" rel="icon" type="image/x-icon" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .btn-outline-dark {
            background-color: #11235A;
            --bs-btn-color: #F0ECE5;
            --bs-btn-border-color: #212529;
            --bs-btn-hover-color: #11235A;
            --bs-btn-hover-bg: #fff;
            --bs-btn-hover-border-color: #212529;
            --bs-btn-focus-shadow-rgb: 33,37,41;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #212529;
            --bs-btn-active-border-color: #212529;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #212529;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #212529;
            --bs-gradient: none;
        }
    </style>
    </head>

<body>

    <!-- Login Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="loginHandle.php">
                        <div class="form-group">
                            <label for="username">Email address/Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter Email/Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <input type="submit" value="Login" name="action" class="btn btn-outline-primary float-end mt-2">
                        <a href="./signup.php" class="">Don't have a account?</a>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Job Apply Modal -->
    <div class="modal fade" id="apply_job" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fill Details Here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" method="post" action="handleJobs.php" enctype="multipart/form-data">
                        <div class="form-group" style="display:none">
                            <label for="fname">Job Id</label>
                            <input type="text" class="form-control" id="jodid" name="jobid">
                        </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="exp">Work Exprience</label>
                            <input type="number" class="form-control" id="exp" name="exp"
                                placeholder="Enter No of Years">
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" name="pdfFile" id="pdfFile" accept=".pdf">
                        </div>
                        <div class="form-group mt-2">
                            <label for="exp">Expected CTC</label>
                            <input type="number" class="form-control" id="exp" name="exp"
                                placeholder="Enter Salary Expected">
                        </div>
                        <input type="submit" value="Submit" name="action"
                            class="btn btn-outline-dark float-start mt-2">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php">Job Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3 active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="./admin/login.php">Create a Post</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link fw-bold px-3" data-bs-toggle="offcanvas" href="#offcanvasAbout" role="button"
                            aria-controls="offcanvasAbout">About</a>
                    </li> -->

                    <li class="nav-item">
                        <form class="d-flex" method="post" action="index.php">
                            <input class="form-control mx-2" type="text" placeholder="Search by skills, position"
                                aria-label="Search" style="border: 1px solid black" name="search" value="<?php echo $_GLOBAL["search"]?>"/>
                            <button class="btn btn-info mx-2" type="search" value="search" name="action"style="background: #17307c; color: white;"
                                formaction="index.php">Search</button>
                        </form>
                    </li>

                    <?php


                    if (isset($_SESSION["logged-user"])) {
                        //show button when logged in 
                        echo '<li class="nav-item">
                            <a class="btn btn-outline-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                aria-controls="offcanvasExample">
                                Jobs Applied
                            </a>
                        </li>';
                    } else {
                        echo '<li class="nav-item">
                            <button type="button" id="login-user-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                             Login
                            </button>
                        </li>';
                    }
                    ?>




                </ul>

            </div>
        </div>
    </nav>




    <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Account Details</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Applied Job Status
            </div>
            <div class="dropdown mt-3">
                <?php
                echo ' <table class="table">';
                echo '<thead>
                <th>Job Id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Resume</th>
                </thead> <tbody>';
                $sql = "SELECT * FROM applied_jobs, jobs 
                where user_id =" . $_SESSION["userid"] . " and applied_jobs.job_id = jobs.id";
                if ($stmt = $conn->query($sql)) {

                    while ($db = $stmt->fetch_assoc()) {

                        echo '<tr>
                            <td>' . $db["applied_id"] . '</td>
                            <td>' . $db["job_title"] . '</td>
                            <td>' . $db["app_Status"] . '</td>
                            <td><a target="_blank" href="uploads/' . $db["resume_path"] . '">' . $db["resume_path"] . '</a></td>
                        </tr>';

                    }
                }
                echo '</tbody>
                </table>';
                ?>
            </div>
        </div>
    </div>
    <!-- hero -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 py-2">
                <div class=" bg-light rounded">
                    <div class="row p-md-5">
                        <h3>Opening Available Here</h3>

                        <?php
                        $sql = "select * from jobs";
                        // echo "<script>alert('1')</script>";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($_REQUEST["action"] == "search") {
                            $data = $_REQUEST["search"];
                            // echo "<script>alert('2')</script>";
                            if(!$data == ""){
                                $sql = "select * from jobs where job_title like '%".$data."%' or 
                                job_desc like '%".$data."%' or  job_skills like '%".$data."%'";
                            }
                        }
                    }

                        if ($stmt = $conn->query($sql)) {

                            while ($db = $stmt->fetch_assoc()) {
                                echo '<div class="col-md-4 py-2">
                                <div class="card">
                                    <div class="card-body " style="height:150px">
                                        <h5 class="card-title text-decoration-underline">' . $db["job_title"] . '</h5>
                                        <p class="card-text h-10"><b> Job Description </b>: ' . $db["job_desc"] . '</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Position</b> : ' . $db["job_position"] . '</li>
                                        <li class="list-group-item"><b>Salary Range</b>: ₹' . $db["job_salary_start"] . ' - ₹' . $db["job_salary_end"] . '</li>
                                        <li class="list-group-item"><b>Skills</b> : ' . $db["job_skills"] . '</li>
                                        <li class="list-group-item"><b>Qualification</b> : ' . $db["job_qualify"] . '</li>
                                        <li class="list-group-item"><b>No of openings</b> : ' . $db["job_openings"] . '</li>
                                        <li class="list-group-item"><b>Location</b> : ' . $db["job_location"] . '</li>

                                        </ul>
                                    <div class="card-body">
                                        <a  class="card-link btn btn-outline-dark" data-job-id=' . $db["id"] . ' onclick="handleApplyJob(this)">Apply</a>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-12 py-2">
                <div class="bg-light rounded">
                    <div class="row p-md-5">
                        <h3>Urgent Hiring</h3>
                        <?php
                        if ($stmt = $conn->query("select * from jobs order by job_salary_end desc")) {

                            while ($db = $stmt->fetch_assoc()) {
                                echo ' <div class="col-12 py-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $db['job_title'] . '</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the cards content.</p>
                                        <a href="#" class="btn btn-outline-dark">Read More</a>
                                    </div>
                                    </div>
                                </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <button type="button" class="" id="liveToastBtn" style=""></button>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">New Job Alert!!!</strong>
                <small>1 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Need Urgent Team Leader - Finance
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')

        if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
        }

        let clickTrigger = setInterval(() => {
            toastTrigger.click();
        }, 35000);

        function handleApplyJob(e) {
            document.getElementById('jodid').value = e.dataset.jobId;
            //check login here
            if (!document.getElementById('login-user-btn')) {
                $('#apply_job').modal('show');
            } else {
                document.getElementById('login-user-btn').click();
            }

        }
    </script>
</body>


</html>