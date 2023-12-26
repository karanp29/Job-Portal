<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="../assets/favicon.svg" rel="icon" type="image/x-icon" />

    <style>
        textarea {
            resize: none;
        }
    </style>
</head>

<body>


    <?php

    // $conn = mysqli_connect("localhost:3306", "root", "", "mca_hms") or die("connection die");
    include "dbconnection.php";
    global $conn;
    $result;
    $GLOBALS['id'] = null;
    $GLOBALS['job_title'] = null;
    $GLOBALS['job_position'] = null;
    $GLOBALS['job_desc'] = null;
    $GLOBALS['job_salary_start'] = null;
    $GLOBALS['job_salary_end'] = null;
    $GLOBALS['job_experience'] = null;
    $GLOBALS['job_cert'] = null;
    $GLOBALS['job_skills'] = null;
    $GLOBALS['job_qualify'] = null;


    $id = $_GET["id"];
    // echo "<script>console.log(".$id.")</script>";
    if ($result = $conn->query("select * from jobs where id = " . $id . "")) {
        //no of data to check tname exits or not
        // $row = mysqli_num_rows($result);
        while ($db = $result->fetch_assoc()) {
            echo "<script>console.log('inside while')</script>";
            $GLOBALS['job_title'] = $db['job_title'];
            $GLOBALS['job_position'] = $db['job_position'];
            $GLOBALS['job_desc'] = trim($db['job_desc']);
            $GLOBALS['job_salary_start'] = $db['job_salary_start'];
            $GLOBALS['job_salary_end'] = $db['job_salary_end'];
            $GLOBALS['job_experience'] = $db['job_experience'];
            $GLOBALS['job_cert'] = $db['job_cert'];
            $GLOBALS['job_skills'] = $db['job_skills'];
            $GLOBALS['job_qualify'] = $db['job_qualify'];
            $GLOBALS['job_openings'] = $db['job_openings'];
            $GLOBALS['job_location'] = $db['job_location'];
        }
    }
    // }
    ?>
    <div class="container">

        <div class="content">
            <div class="d-flex justify-content-center">
                <form method="post" class="border border-dark" style="padding:20px;">
                    <h3 class="text-center">Manage Job Posts</h3>

                    <div class="form-group mb-3">
                        <label for="tname">Title</label>
                        <input class="form-control" type="text" name="job_title" placeholder="Enter Job Title"
                            value="<?php echo $GLOBALS["job_title"] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tname">Position</label>
                        <input class="form-control" type="text" name="job_position" placeholder="Enter Job Position"
                            value="<?php echo $GLOBALS["job_position"] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tname">Description</label><br>
                        <textarea name="job_desc" id="job_desc" cols="50" rows="5">
                        <?php echo $GLOBALS["job_desc"] ?>
                        </textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tmatches">CTC Start</label>
                        <input class="form-control" type="number" name="job_salary_start" placeholder="Minimum Salary"
                            value="<?php echo $GLOBALS["job_salary_start"] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="twon">CTC End</label>
                        <input class="form-control" type="number" name="job_salary_end" placeholder="Maximum Salary"
                            value="<?php echo $GLOBALS["job_salary_end"] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="twon">Experience Required(In Years)</label>
                        <input class="form-control" type="number" name="job_experience" placeholder="Expreience if any"
                            value="<?php echo $GLOBALS["job_experience"] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tname">Certification</label>
                        <input class="form-control" type="text" name="job_cert" placeholder="Enter Cert"
                            value="<?php echo $GLOBALS["job_cert"] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tname">Skills</label>
                        <input class="form-control" type="text" name="job_skills" placeholder="Enter Skills"
                            value="<?php echo $GLOBALS["job_skills"] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tname">Qualify</label>
                        <input class="form-control" type="text" name="job_qualify" placeholder="Enter Qualification"
                            value="<?php echo $GLOBALS["job_qualify"] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tname">No of Openings</label>
                        <input class="form-control" type="text" name="job_openings" placeholder="Enter Job Openings"
                            value="<?php echo $GLOBALS["job_openings"] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tname">Location</label>
                        <input class="form-control" type="text" name="job_location" placeholder="Enter Location"
                            value="<?php echo $GLOBALS["job_location"] ?>">
                    </div>
                    <input type="submit" class="btn btn-outline-primary" name="action" value="Create"
                        formaction="createJobPosts.php" disabled>
                    <button type="submit" class="btn btn-outline-primary" name="action" value="Update"
                        formaction="<?php echo "createJobPostsGet.php?id=" . $GLOBALS['id'] ?>">Update</button>

                    <button type="submit" class="btn btn-outline-primary" name="action" value="ShowAll"
                        formaction="createJobPosts.php">Show All</button>
                    <!-- <button type="submit" class="btn btn-outline-primary" name="action" value="ShowTitle"
                        formaction="createJobPosts.php">Show By Title</button> -->
                    <button type="submit" class="btn btn-outline-primary" name="action" value="Delete"
                        formaction="<?php echo "createJobPostsGet.php?id=" . $GLOBALS['id'] ?>">
                        Delete</button>
                </form>
            </div>
        </div>

        <?php
        include "dbconnection.php";
        global $conn;
        if ($conn) {
            // echo "connection successfull";
            echo "";
        } else {
            echo "connection failed";
        }
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "ShowTitle") {
                //   getbyname($conn);
            } else if ($_REQUEST["action"] == "Create") {
                insert_data($conn);
            } else if ($_REQUEST["action"] == "Update") {
                update_data($conn);
            } else if ($_REQUEST["action"] == "ShowAll") {
                showall_data($conn);
            } else if ($_REQUEST["action"] == "Delete") {
                delete_data($conn);
            } else if ($_REQUEST["action"] == "showbyid") {
                // delete_data($conn);
            }
        }
        function insert_data($conn)
        {
            $job_title = $_REQUEST["job_title"];
            $job_position = $_REQUEST["job_position"];
            $job_desc = $_REQUEST["job_desc"];
            $job_salary_start = $_REQUEST["job_salary_start"];
            $job_salary_end = $_REQUEST["job_salary_end"];
            $job_experience = $_REQUEST["job_experience"];
            $job_cert = $_REQUEST["job_cert"];
            $job_skills = $_REQUEST["job_skills"];
            $job_qualify = $_REQUEST["job_qualify"];

            $ins_query = "insert into jobs (
                job_title,job_position,job_desc,job_salary_start,job_salary_end,job_experience,job_cert,job_skills,job_qualify
            ) values('" . $job_title . "','" . $job_position . "','" . $job_desc . "'," . $job_salary_start . "," . $job_salary_end . "," . $job_experience . ",'" . $job_cert . "','" . $job_skills . "','" . $job_qualify . "')";
            //echo "<br>inserting.........";
            echo $ins_query;
            if ($conn->query($ins_query))
                echo "<br>successfull insert";
            else
                echo "<br> something went wrong at insert";
        }

        function update_data($conn)
        {
            echo "<script>alert('updating')</script>";
            $id = $_REQUEST["id"];
            $job_title = $_REQUEST["job_title"];
            $job_position = $_REQUEST["job_position"];
            $job_desc = $_REQUEST["job_desc"];
            $job_salary_start = $_REQUEST["job_salary_start"];
            $job_salary_end = $_REQUEST["job_salary_end"];
            $job_experience = $_REQUEST["job_experience"];
            $job_cert = $_REQUEST["job_cert"];
            $job_skills = $_REQUEST["job_skills"];
            $job_qualify = $_REQUEST["job_qualify"];
            $job_openings = $_REQUEST["job_openings"];
            $job_location = $_REQUEST["job_location"];
            $update_query = "update jobs 
                    set job_title = '" . $job_title . "' 
                    ,job_position = '" . $job_position . "'
                    ,job_desc = '" . $job_desc . "'
                    ,job_salary_start = " . $job_salary_start . "
                    ,job_salary_end = " . $job_salary_end . "
                    ,job_experience = " . $job_experience . "
                    ,job_cert = '" . $job_cert . "'
                    ,job_skills = '" . $job_skills . "'
                    ,job_qualify = '" . $job_qualify . "'
                    ,job_openings = '" . $job_openings . "'
                    ,job_location = '" . $job_location . "'
                    where id = '" . $id . "'";

            if ($conn->query($update_query))
                echo "<br> updated succesfully";
            else
                echo "<br>wrong TeamName do not exist";

        }
        function delete_data($conn)
        {
            echo "<script>alert('deleting')</script>";
            $id = $_REQUEST["id"];
            if ($conn->query("delete from jobs where id = '" . $id . "'")) {
                echo "delete successfully";
            } else {
                echo "delete failed";
            }
        }
        function showall_data($conn)
        {
            echo "<hr> <h3>List to Teams</h3> <br>";
            if ($stmt = $conn->query("select * from jobs")) {

                echo "<table id='tbl-show-jobs' class='table table-bordered m-3 p-3'><thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Desc</th>
                    <th>CTC Start</th>
                    <th>CTC End</th>
                    <th>Expreience</th>
                    <th>Certification</th>
                    <th>Skills</th>
                    <th>Qualify</th>
                    <th>Openings</th>
                    <th>Location</th>
                    <th>Update</th>
                    
                    </thead><tbody>";
                while ($db = $stmt->fetch_assoc()) {
                    echo "<tr><td>" . $db["id"] . "</td>
                    <td>" . $db["job_title"] . "</td>
                    <td>" . $db["job_position"] . "</td>
                    <td>" . $db["job_desc"] . "</td>
                    <td>" . $db["job_salary_start"] . "</td>
                    <td>" . $db["job_salary_end"] . "</td>
                    <td>" . $db["job_experience"] . "</td>
                    <td>" . $db["job_cert"] . "</td>
                    <td>" . $db["job_skills"] . "</td>
                    <td>" . $db["job_qualify"] . "</td>  
                    <td>" . $db["job_openings"] . "</td>
                    <td>" . $db["job_location"] . "</td>  
                    <td> <form method='POST'>  <button type='submit' id='update-job-btn' class='btn btn-outline-primary' name='action' value='showbyid' data-id=" . $db["id"] . " formaction='createJobPostsGet.php'>Show Data</button></form></td>
                                        </tr>";
                }
                echo "</tbody></table>";

            }
        }
        ?>
    </div>
    </div>
    <script>
    </script>
</body>

</html>