<?php
include('dbcon.php');
if (isset($_POST['add_students'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if ($fname == "" || empty($fname)) {
        header('loaction:index.php?message= You must enter first name');
    } else {
        $query = "INSERT INTO `students`(`first_name`, `last_name`,`age`) VALUES('$fname', '$lname', '$age')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Data inserted successfully');
        }
    }
}
