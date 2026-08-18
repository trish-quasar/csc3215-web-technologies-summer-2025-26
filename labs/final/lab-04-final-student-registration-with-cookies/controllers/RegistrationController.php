<?php
require 'models/StudentModel.php';

class RegistrationController {

    public function index() {
        $errors = $_SESSION["errors"] ?? [];
        $old = $_SESSION["old"] ?? [];
        $message = $_SESSION["message"] ?? "";

        unset($_SESSION["errors"], $_SESSION["old"], $_SESSION["message"]);

        $model = new StudentModel();
        $saved_student = $model->getCookie();

        require 'views/form.php';
    }

    public function store() {
        $errors = [];

        $student_name = trim($_POST["student_name"] ?? "");
        $student_id = trim($_POST["student_id"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $department = $_POST["department"] ?? "";
        $password = $_POST["password"] ?? "";
        $confirm_password = $_POST["confirm_password"] ?? "";

        if (empty($student_name)) {
            $errors["student_name"] = "Student Name is required.";
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $student_name)) {
            $errors["student_name"] = "Student Name should contain only letters and spaces.";
        }

        if (empty($student_id)) {
            $errors["student_id"] = "Student ID is required.";
        } elseif (strlen($student_id) < 4) {
            $errors["student_id"] = "Student ID must contain at least 4 characters.";
        }

        if (empty($email)) {
            $errors["email"] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Please enter a valid email address.";
        }

        if (empty($department)) {
            $errors["department"] = "Please select your department.";
        }

        if (empty($password)) {
            $errors["password"] = "Password is required.";
        } elseif (strlen($password) < 6) {
            $errors["password"] = "Password must contain at least 6 characters.";
        }

        if (empty($confirm_password)) {
            $errors["confirm_password"] = "Confirm Password is required.";
        } elseif ($password != $confirm_password) {
            $errors["confirm_password"] = "Password and Confirm Password do not match.";
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["old"] = [
                "student_name" => $student_name,
                "student_id" => $student_id,
                "email" => $email,
                "department" => $department
            ];

            header("Location: index.php");
            exit();
        }

        $model = new StudentModel();
        $model->saveCookie($student_name, $student_id);

        $_SESSION["message"] = "Registration successful. Student information saved for 1 hour.";

        header("Location: index.php");
        exit();
    }

    public function clearCookie() {
        $model = new StudentModel();
        $model->deleteCookie();

        $_SESSION["message"] = "Cookie deleted successfully.";

        header("Location: index.php");
        exit();
    }
}
?>
