<?php

$applicant_id = $_GET["id"] ?? "";
$name = $_GET["name"] ?? "";
$email = $_GET["email"] ?? "";
$phone = $_GET["phone"] ?? "";
$gender = $_GET["gender"] ?? "";
$job_position = $_GET["job_position"] ?? "";
$qualification = $_GET["qualification"] ?? "";
$address = $_GET["address"] ?? "";
$file = $_GET["file"] ?? "";

$request_name = $_REQUEST["name"] ?? "";
$request_id = $_REQUEST["id"] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Successful</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .result-container {
            width: 620px;
            background-color: white;
            border: 1px solid #cccccc;
            padding: 30px;
            margin: auto;
        }

        h2 {
            margin-top: 0;
        }

        .result-row {
            margin-bottom: 12px;
        }

        .result-row strong {
            display: inline-block;
            width: 160px;
        }
    </style>
</head>

<body>

<div class="result-container">

<h2>APPLICATION SUCCESSFUL</h2>

<p class="result-row">
    <strong>Applicant ID:</strong>
    <?php echo htmlspecialchars($request_id); ?>
</p>

<p class="result-row">
    <strong>Name:</strong>
    <?php echo htmlspecialchars($request_name); ?>
</p>

<p class="result-row">
    <strong>Email:</strong>
    <?php echo htmlspecialchars($email); ?>
</p>

<p class="result-row">
    <strong>Phone:</strong>
    <?php echo htmlspecialchars($phone); ?>
</p>

<p class="result-row">
    <strong>Gender:</strong>
    <?php echo htmlspecialchars($gender); ?>
</p>

<p class="result-row">
    <strong>Job Position:</strong>
    <?php echo htmlspecialchars($job_position); ?>
</p>

<p class="result-row">
    <strong>Qualification:</strong>
    <?php echo htmlspecialchars($qualification); ?>
</p>

<p class="result-row">
    <strong>Address:</strong>
    <?php echo htmlspecialchars($address); ?>
</p>

<p class="result-row">
    <strong>Uploaded CV:</strong>
    <?php echo htmlspecialchars($file); ?>
</p>

<p>Application submitted successfully.</p>

<a href="index.php">Submit Another Application</a>

</div>

</body>
</html>
