<?php
$nameErr = $name = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]); 
    if (empty($name)) {
        $nameErr = "Name is required.";
    } elseif (str_word_count($name) < 2) {
        $nameErr = "Name must contain at least two words.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
 