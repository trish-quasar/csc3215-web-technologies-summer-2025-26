<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    setcookie("student_name", "", time() - 3600, "/");
    setcookie("student_id", "", time() - 3600, "/");

    header("Location: index.php?status=deleted");
    exit();
}

header("Location: index.php");
exit();

?>
