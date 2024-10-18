<?php
include('dbcon.php');

if (isset($_POST['add_user'])) {
    $firstName = htmlspecialchars($_POST['f_name']);
    $lastName = htmlspecialchars($_POST['l_name']);
    $image = $_FILES['image_path']['name'];
    $image_path = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $image_path)) {
        $query = "INSERT INTO users (first_name, last_name, image_path) VALUES ('$firstName', '$lastName', '$image_path')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: index.php?upload_success=1");
        } else {
            echo "Failed to add user: " . mysqli_error($connection);
        }
    } else {
        echo "Failed to upload image";
    }
}
