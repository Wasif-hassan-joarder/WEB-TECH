<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script>
        function validateLoginForm() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            let valid = true;

            if (username === "") {
                document.getElementById('username_msg').innerHTML = "Username is required.";
                document.getElementById('username_msg').style.color = 'red';
                valid = false;
            } else {
                document.getElementById('username_msg').innerHTML = "";
            }

            if (password === "") {
                document.getElementById('password_msg').innerHTML = "Password is required.";
                document.getElementById('password_msg').style.color = 'red';
                valid = false;
            } else {
                document.getElementById('password_msg').innerHTML = "";
            }

            return valid;
        }
    </script>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" onsubmit="return validateLoginForm()">
        Username: <input type="text" id="username" name="username"><br>
        <span id="username_msg"></span><br>
        Password: <input type="password" id="password" name="password"><br>
        <span id="password_msg"></span><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
