<?php include('header.php') ?>
<?php include('dbcon.php') ?>


<?php
if (isset($_GET['id'])) {


    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}


?>

<?php
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {

        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $image_path = $_POST['image_path'];

    $query = "UPDATE users SET first_name = '$fname', last_name = '$lname', image_path = '$image_path' WHERE id = '$idnew'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=Record Updated Successfully");
    }
}

?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">Email</label>
        <input type="text" class="form-control" name="f_name" value="<?php echo $row['first_name'] ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Password</label>
        <input type="text" class="form-control" name="l_name" value="<?php echo $row['last_name'] ?>">
    </div>
    <div class="form-group">
        <label for="image_path">Upload Images</label>
        <input type="file" class="form-control" name="image_path" value="<?php echo $row['image_path'] ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="Update">
</form>


<?php include('footer.php') ?>