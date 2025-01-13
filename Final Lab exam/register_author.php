<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once('db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author_name = $_POST['author_name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = getConnection();

    
    $sql = "INSERT INTO authors (author_name, contact_no, username, password) 
            VALUES ('$author_name', '$contact_no', '$username', '$password')";

if (mysqli_query($con, $sql)) {
    echo "<p style='color: green;'>Author registered successfully!</p>";
    
    echo "<form action='admin.php' method='get'>
            <button type='submit'>Back to Admin Page</button>
          </form>";
} else {
    echo "<p style='color: red;'>Error: " . mysqli_error($con) . "</p>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Author</title>
    <script>

        function validateForm() {
            let isValid = true;

        
            let authorName = document.getElementById('author_name').value;
            let contactNo = document.getElementById('contact_no').value;
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;

            document.getElementById('author_name_msg').innerHTML = "";
            document.getElementById('contact_no_msg').innerHTML = "";
            document.getElementById('username_msg').innerHTML = "";
            document.getElementById('password_msg').innerHTML = "";

            
            if (authorName === "") {
                document.getElementById('author_name_msg').innerHTML = "Author Name cannot be empty.";
                document.getElementById('author_name_msg').style.color = 'red';
                isValid = false;
            }

            if (contactNo === "") {
                document.getElementById('contact_no_msg').innerHTML = "Contact Number cannot be empty.";
                document.getElementById('contact_no_msg').style.color = 'red';
                isValid = false;
            }

            if (username === "") {
                document.getElementById('username_msg').innerHTML = "Username cannot be empty.";
                document.getElementById('username_msg').style.color = 'red';
                isValid = false;
            }

            if (password === "") {
                document.getElementById('password_msg').innerHTML = "Password cannot be empty.";
                document.getElementById('password_msg').style.color = 'red';
                isValid = false;
            }

            return isValid;
        }
    </script>
</head>
<body>
    <h2>Register Author</h2>

    
    <form method="POST" onsubmit="return validateForm()">
        
        Author Name: <input type="text" id="author_name" name="author_name">
        <span id="author_name_msg"></span><br><br>

        
        Contact Number: <input type="text" id="contact_no" name="contact_no">
        <span id="contact_no_msg"></span><br><br>

        
        Username: <input type="text" id="username" name="username">
        <span id="username_msg"></span><br><br>

        
        Password: <input type="password" id="password" name="password">
        <span id="password_msg"></span><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
