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
    <?= htmlspecialchars($request_id) ?>
</p>

<p class="result-row">
    <strong>Name:</strong>
    <?= htmlspecialchars($request_name) ?>
</p>

<p class="result-row">
    <strong>Email:</strong>
    <?= htmlspecialchars($email) ?>
</p>

<p class="result-row">
    <strong>Phone:</strong>
    <?= htmlspecialchars($phone) ?>
</p>

<p class="result-row">
    <strong>Gender:</strong>
    <?= htmlspecialchars($gender) ?>
</p>

<p class="result-row">
    <strong>Job Position:</strong>
    <?= htmlspecialchars($job_position) ?>
</p>

<p class="result-row">
    <strong>Qualification:</strong>
    <?= htmlspecialchars($qualification) ?>
</p>

<p class="result-row">
    <strong>Address:</strong>
    <?= htmlspecialchars($address) ?>
</p>

<p class="result-row">
    <strong>Uploaded CV:</strong>
    <?= htmlspecialchars($file) ?>
</p>

<p>Application submitted successfully.</p>

<a href="index.php">Submit Another Application</a>

</div>

</body>
</html>
