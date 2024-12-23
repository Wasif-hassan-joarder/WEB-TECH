<?php
session_start();
include('db.php'); 

if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header(header: "Location: login.php");
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
    <h2>Welcome, <?php echo htmlspecialchars(string: $_SESSION['name']); ?>!</h2>
    <form action="" method="POST">
        <button type="submit" name="logout">LOGOUT</button>
    </form>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header(header: "Location: login.php");
        exit();
    }

   
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Registered Users:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Gender</th></tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No registered users found.";
    }
    ?>

</body>
</html>

