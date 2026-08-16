<?php
require_once __DIR__ . '/../models/ApplicationModel.php';

class ApplicationController {

    public function index() {
        $errors = $_SESSION["errors"] ?? [];
        $old = $_SESSION["old"] ?? [];

        unset($_SESSION["errors"], $_SESSION["old"]);

        $model = new ApplicationModel();
        $job_positions = $model->getJobPositions();

        require __DIR__ . '/../views/form.php';
    }

    public function store() {
        $errors = [];

        $applicant_id = $_POST["applicant_id"] ?? "";
        $name = $_POST["name"] ?? "";
        $email = $_POST["email"] ?? "";
        $phone = $_POST["phone"] ?? "";
        $password = $_POST["password"] ?? "";
        $gender = $_POST["gender"] ?? "";
        $job_position = $_POST["job_position"] ?? "";
        $qualification = $_POST["qualification"] ?? "";
        $address = $_POST["address"] ?? "";

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

        $new_file_name = "";

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

            $model = new ApplicationModel();
            $allowed_types = $model->getAllowedFileTypes();

            if (!in_array($file_type, $allowed_types)) {
                $errors[] = "Only PDF, DOC and DOCX files are allowed.";
            }

            if ($file_size > 2 * 1024 * 1024) {
                $errors[] = "File size must be less than 2 MB.";
            }
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["old"] = [
                "applicant_id" => $applicant_id,
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "gender" => $gender,
                "job_position" => $job_position,
                "qualification" => $qualification,
                "address" => $address
            ];

            header("Location: index.php");
            exit();
        }

        $new_file_name = time() . "_" . basename($file_name);
        $upload_path = __DIR__ . '/../uploads/' . $new_file_name;

        if (!move_uploaded_file($file_tmp, $upload_path)) {
            $_SESSION["errors"] = ["CV upload failed."];
            $_SESSION["old"] = [
                "applicant_id" => $applicant_id,
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "gender" => $gender,
                "job_position" => $job_position,
                "qualification" => $qualification,
                "address" => $address
            ];

            header("Location: index.php");
            exit();
        }

        header(
            "Location: result.php?id=" . urlencode($applicant_id) .
            "&name=" . urlencode($name) .
            "&email=" . urlencode($email) .
            "&phone=" . urlencode($phone) .
            "&gender=" . urlencode($gender) .
            "&job_position=" . urlencode($job_position) .
            "&qualification=" . urlencode($qualification) .
            "&address=" . urlencode($address) .
            "&file=" . urlencode($new_file_name)
        );
        exit();
    }

    public function result() {
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

        require __DIR__ . '/../views/result.php';
    }
}
