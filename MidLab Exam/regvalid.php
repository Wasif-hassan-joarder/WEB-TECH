<?php
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
    
    if (isset($_POST['log_in'])) {
        header("Location: login.php");
        exit();
    }
} else {

    header("Location: reg.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
</head>
<body>
    <h2>Registration Successful</h2><br>
    <form action="" method="POST">
        <button type="submit" name="log_in">LOG IN</button>
    </form>
</body>
</html>
