<?php
require_once('db.php');
$con = getConnection();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM authors WHERE author_name LIKE '%$search%' OR username LIKE '%$search%'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Author Name: " . $row['author_name'] . " - Username: " . $row['username'] . "</p>";
        }
    } else {
        echo "<p>No authors found</p>";
    }
}
?>
