<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $id = $_POST["id"] ?? "";

    $data = file_get_contents("students.json");
    $students = json_decode($data, true) ?: [];

    $students[] = [
        "name" => $name,
        "id" => $id
    ];

    file_put_contents("students.json", json_encode($students, JSON_PRETTY_PRINT));

    $message = "Student data saved successfully.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>

<h2>Student Form</h2>

<?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form action="index.php" method="POST">

    <label>Name:</label>
    <input type="text" name="name">
    <br><br>

    <label>Student ID:</label>
    <input type="text" name="id">
    <br><br>

    <input type="submit" value="Submit">

</form>

</body>
</html>
