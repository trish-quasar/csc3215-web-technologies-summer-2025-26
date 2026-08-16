<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = trim($_POST["student_name"] ?? "");
    $student_id = trim($_POST["student_id"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $department = $_POST["department"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";

    if (empty($student_name)) {
        $errors[] = "Student Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $student_name)) {
        $errors[] = "Student Name should contain only letters and spaces.";
    }

    if (empty($student_id)) {
        $errors[] = "Student ID is required.";
    } elseif (strlen($student_id) < 4) {
        $errors[] = "Student ID must contain at least 4 characters.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($department)) {
        $errors[] = "Please select your department.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must contain at least 6 characters.";
    }

    if (empty($confirm_password)) {
        $errors[] = "Confirm Password is required.";
    } elseif ($password != $confirm_password) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    if (count($errors) == 0) {

        setcookie("student_name", $student_name, time() + 3600, "/");
        setcookie("student_id", $student_id, time() + 3600, "/");

        header("Location: index.php?status=success");
        exit();
    }

} else {

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
</head>
<body>

<h2>Registration Result</h2>

<?php

if (count($errors) > 0) {

    echo "<h3>Registration Failed</h3>";

    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }

    echo '<a href="index.php">Go Back</a>';
}

?>

</body>
</html>
