<?php

$message = "";

if (isset($_GET["status"]) && $_GET["status"] == "success") {
    $message = "Registration successful. Student information saved in cookies for 1 hour.";
}

if (isset($_GET["status"]) && $_GET["status"] == "deleted") {
    $message = "Cookie deleted successfully.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<?php if ($message != "") { ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php } ?>

<?php

if (isset($_COOKIE["student_name"]) && isset($_COOKIE["student_id"])) {

    echo "<h3>Welcome Back!</h3>";
    echo "<p>Student Name: " . htmlspecialchars($_COOKIE["student_name"]) . "</p>";
    echo "<p>Student ID: " . htmlspecialchars($_COOKIE["student_id"]) . "</p>";

} else {

    echo "<p>No saved student information found.</p>";

}

?>

<form action="process.php" method="POST">

    <label>Student Name:</label>
    <input type="text" name="student_name">
    <br><br>

    <label>Student ID:</label>
    <input type="text" name="student_id">
    <br><br>

    <label>Email:</label>
    <input type="text" name="email">
    <br><br>

    <label>Department:</label>
    <select name="department">
        <option value="">Select Department</option>
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
        <option value="BBA">BBA</option>
        <option value="English">English</option>
    </select>
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password">
    <br><br>

    <input type="submit" value="Register">
    <button type="submit" formaction="clear_cookie.php" formnovalidate>Clear Cookie</button>

</form>

</body>
</html>
