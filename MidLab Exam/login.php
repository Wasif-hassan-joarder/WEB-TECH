<?php
session_start();
if(isset($_POST['submit'])){
    $_SESSION['Lemail'] = $_POST['email'];
    $_SESSION['Lpassword'] = $_POST['password'];
    header("Location: loginvalid.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <label for="email">EMAIL</label><br>
        <input type="email" name="email" ><br>
        <label for="password">PASSWORD</label><br>
        <input type="password" name="password" ><br><br>
        <button type="submit" name="submit">LOG IN</button><br>
        <p>Don't have an account?</p>
        <a href="reg.php">Register</a>
    </form>
</body>
</html>
