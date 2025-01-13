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
        header("Location: authors_update.php"); 
        exit();
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $author_name = $_POST['author_name'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        mysqli_query($con, "UPDATE authors SET author_name='$author_name', contact_no='$contact_no', username='$username', password='$password' WHERE id='$id'");
        header("Location: authors_update.php"); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Authors</title>
</head>
<body>
    <h2>Update Authors</h2>
    <h3>Author List</h3>
    
    <?php while ($row = mysqli_fetch_assoc($authors)): ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="author_name">Author Name:</label>
            <input type="text" name="author_name" value="<?php echo $row['author_name']; ?>"><br><br>
            
            <label for="contact_no">Contact No:</label>
            <input type="text" name="contact_no" value="<?php echo $row['contact_no']; ?>"><br><br>

            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $row['username']; ?>"><br><br>

            <label for="password">Password:</label>
            <input type="text" name="password" value="<?php echo $row['password']; ?>"><br><br>

            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete">Delete</button>
        </form>
        <hr>
    <?php endwhile; ?>

    <br><br>
    <button type="submit" name="Back to Admin Dashboard"><a href="admin.php">Back to Admin Dashboard</a></button>
</body>
</html>
