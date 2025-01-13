<?php
function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'blog_system'); // Update credentials if necessary
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
?>
