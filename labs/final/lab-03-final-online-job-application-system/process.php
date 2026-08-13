<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $applicant_id = $_POST["applicant_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $gender = $_POST["gender"] ?? "";
    $job_position = $_POST["job_position"];
    $qualification = $_POST["qualification"];
    $address = $_POST["address"];

    if (empty($applicant_id)) {
        $errors[] = "Applicant ID is required.";
    }

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!ctype_digit($phone) || strlen($phone) != 11) {
        $errors[] = "Phone number must contain 11 digits.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must contain at least 6 characters.";
    }

    if (empty($gender)) {
        $errors[] = "Please select your gender.";
    }

    if (empty($job_position)) {
        $errors[] = "Please select a job position.";
    }

    if (empty($qualification)) {
        $errors[] = "Qualification is required.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] == UPLOAD_ERR_NO_FILE) {

        $errors[] = "Please upload your CV.";

    } elseif (
        $_FILES["cv"]["error"] == UPLOAD_ERR_INI_SIZE ||
        $_FILES["cv"]["error"] == UPLOAD_ERR_FORM_SIZE
    ) {

        $errors[] = "File size must be less than 2 MB.";

    } elseif ($_FILES["cv"]["error"] != UPLOAD_ERR_OK) {

        $errors[] = "CV upload failed.";

    } else {

        $file_name = $_FILES["cv"]["name"];
        $file_size = $_FILES["cv"]["size"];
        $file_tmp = $_FILES["cv"]["tmp_name"];
        $file_type = $_FILES["cv"]["type"];

        $allowed_types = [
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
        ];

        if (!in_array($file_type, $allowed_types)) {
            $errors[] = "Only PDF, DOC and DOCX files are allowed.";
        }

        if ($file_size > 2 * 1024 * 1024) {
            $errors[] = "File size must be less than 2 MB.";
        }
    }

    if (count($errors) == 0) {

        $upload_folder = "uploads/";

        $new_file_name = time() . "_" . basename($file_name);

        $file_path = $upload_folder . $new_file_name;

        move_uploaded_file($file_tmp, $file_path);

        header(
            "Location: result.php?id=" .
            urlencode($applicant_id) .
            "&name=" .
            urlencode($name) .
            "&email=" .
            urlencode($email) .
            "&phone=" .
            urlencode($phone) .
            "&gender=" .
            urlencode($gender) .
            "&job_position=" .
            urlencode($job_position) .
            "&qualification=" .
            urlencode($qualification) .
            "&address=" .
            urlencode($address) .
            "&file=" .
            urlencode($new_file_name)
        );

        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Result</title>

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

        h2, h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="result-container">

<h2>Application Result</h2>

<?php

if (count($errors) > 0) {

    echo "<h3>Application Failed!</h3>";

    foreach ($errors as $error) {

        echo "<p>$error</p>";

    }

    echo '<a href="index.php">Go Back</a>';

} else {

    echo "<p>Application submitted successfully.</p>";

}

?>

</div>

</body>
</html>
