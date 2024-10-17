<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'crud_operations');
define('PORT', 4306);  // Thêm cổng vào đây

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());  // Hiển thị chi tiết lỗi
} else {
    echo "Connected successfully";
}
