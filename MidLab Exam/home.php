<?php
session_start();

if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
    <form action="" method="POST">
        <button type="submit" name="logout">LOGOUT</button>
    </form>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
    ?>
</body>
</html>
