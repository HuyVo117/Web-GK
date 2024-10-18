<?php
include('dbcon.php');
if (isset($_POST['add_students'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $image_path = $_POST['image_path'];

    if ($fname == "" || empty($fname)) {
        header('loaction:index.php?message= You must enter first name');
    } else {
        $query = "INSERT INTO `users`(`first_name`, `last_name`,`image_path`) VALUES('$fname', '$lname', '$image_path')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header('location:index.php?insert_msg=Data inserted successfully');
        }
    }
}
