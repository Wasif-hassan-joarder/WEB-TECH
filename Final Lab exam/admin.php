<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once('db.php');
$con = getConnection();
$authors = mysqli_query($con, "SELECT * FROM authors");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        mysqli_query($con, "DELETE FROM authors WHERE id='$id'");
        header("Location: admin.php");
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $author_name = $_POST['author_name'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        mysqli_query($con, "UPDATE authors SET author_name='$author_name', contact_no='$contact_no', username='$username', password='$password' WHERE id='$id'");
        header("Location: admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script>
        function ajaxSearch() {
            let search = document.getElementById('search').value;
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "ajax.php?search=" + search, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('results').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <a href="register_author.php">Register Author</a><br><br>

    <h3>Search Authors</h3>
    <input type="text" id="search" onkeyup="ajaxSearch()">
    <p id="results"></p>

    
    <h3>Actions For Edit Authors Information</h3>
    <form action="authors_update.php" method="get">
        <button type="submit">Update Authors</button>
    </form>
    <br><br>
    <hr>
    <br>
        <!-- Logout Button -->
        <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

        
    
</body>
</html>
