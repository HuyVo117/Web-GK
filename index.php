<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include('header.php') ?>
<?php include('dbcon.php') ?>
<div class="box1">
    <h2>Danh sách Admin</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm Admin</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Upload Images </th>
            <th>Cập nhập</th>
            <th>Xóa</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td> <?php echo $row['id']; ?></td>
                    <td> <?php echo $row['first_name']; ?></td>
                    <td> <?php echo $row['last_name']; ?></td>
                    <td>
                        <img src="upload/<?php echo $row['image_path']; ?>" alt="User Image" width="100" class="btn">
                    </td>

                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Cập Nhập</a></td>
                    <td><a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Xóa</a></td>

                </tr>
        <?php
            }
        }
        ?>




    </tbody>
</table>
<?php
if (isset($_GET['message'])) {
    echo "<h6>" . $_GET['message'] . "</h6>";
}
?>
<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6>" . $_GET['insert_msg'] . "</h6>";
}
?>
<?php
if (isset($_GET['update_msg'])) {
    echo "<h6>" . $_GET['update_msg'] . "</h6>";
}
?>
<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6>" . $_GET['delete_msg'] . "</h6>";
}
?>

<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">Email</label>
                        <input type="text" class="form-control" name="f_name">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Password</label>
                        <input type="text" class="form-control" name="l_name">
                    </div>
                    <div class="form-group">
                        <label for="image_path">Upload Images</label>
                        <input type="file" class="form-control" name="image_path">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="Add">
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Form mới để tải lên ảnh -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="uploadImageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadImageModalLabel">Upload Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="f_name">Email</label>
                        <input type="text" class="form-control" name="f_name">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Password</label>
                        <input type="text" class="form-control" name="l_name">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_user" value="Upload">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php') ?>