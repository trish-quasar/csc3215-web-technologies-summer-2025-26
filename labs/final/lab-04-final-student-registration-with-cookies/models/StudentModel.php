<?php
class StudentModel {

    public function saveCookie($student_name, $student_id) {
        setcookie("student_name", $student_name, time() + 3600, "/");
        setcookie("student_id", $student_id, time() + 3600, "/");
    }

    public function getCookie() {
        if (isset($_COOKIE["student_name"]) && isset($_COOKIE["student_id"])) {
            return [
                "student_name" => $_COOKIE["student_name"],
                "student_id" => $_COOKIE["student_id"]
            ];
        }

        return null;
    }

    public function deleteCookie() {
        setcookie("student_name", "", time() - 3600, "/");
        setcookie("student_id", "", time() - 3600, "/");

        unset($_COOKIE["student_name"]);
        unset($_COOKIE["student_id"]);
    }
}
?>
