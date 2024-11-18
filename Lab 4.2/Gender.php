<?php
$genderErr = $gender = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : []; // Check if options exist
 
    if (empty($gender)) {
        $genderErr = "At least one option must be selected.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Choose at least one:</label><br>
        <input type="checkbox" name="options" value="Male"> Male<br>
        <input type="checkbox" name="options" value="Female"> Female<br>
        <input type="checkbox" name="options" value="Other"> Other<br>

        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>