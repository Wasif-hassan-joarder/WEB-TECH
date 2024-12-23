<?php
session_start();
include('db.php'); 

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash(password: $_POST['password'], algo: PASSWORD_DEFAULT); // Hash the password for security
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

   
    $sql = "INSERT INTO users (name, email, password, phone, gender) VALUES ('$name', '$email', '$password', '$phone', '$gender')";

    if ($conn->query(query: $sql) === TRUE) {
       
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $_POST['password']; 
        $_SESSION['phone'] = $phone;
        $_SESSION['gender'] = $gender;

       
        header(header: "Location: login.php");
        exit(); 
    } else {
       
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
        <button type="submit" name="log_in"><a href="login.php">log in</a></button>
    </form>
</body>
</html>