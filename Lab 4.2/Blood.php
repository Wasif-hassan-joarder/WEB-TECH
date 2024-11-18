<?php
$blooodErr = $blood = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood = trim($_POST["blood"]); 
 
    if ($blood == "default") {
        $bloodErr = "Please select a valid option.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="blood">Choose an option:</label>
        <select id="blood" name="blood">
            <option value="default">Select...</option>
            <option value="Option1">A+</option>
            <option value="Option2">B+</option>
            <option value="Option3">AB+</option>
            <option value="Option4">O+</option>
            <option value="Option5">O-</option>
            <option value="Option6">AB-</option>
        </select>
        
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>