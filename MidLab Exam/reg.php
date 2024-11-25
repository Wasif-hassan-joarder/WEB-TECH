<?php
session_start();

if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['gender'] = $_POST['gender'];

    header("Location: regvalid.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="" method="POST">
        <label for="name">Name</label><br>
        <input type="text" name="name" required><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" required><br>
        <label for="phone">Phone</label><br>
        <input type="text" name="phone" required><br>
        <label for="gender">Gender</label><br>
        <input type="text" name="gender" required><br><br>
        <button type="submit" name="submit">Register</button><br>
    </form>
</body>
</html>
