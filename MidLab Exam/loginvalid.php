<?php
session_start();

if (isset($_SESSION["Lemail"]) && isset($_SESSION["Lpassword"])) {
    if ($_SESSION["Lemail"] == $_SESSION['email'] && $_SESSION["Lpassword"] == $_SESSION['password']) {
        header("Location: home.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
