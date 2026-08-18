<?php
session_start();
require 'controllers/RegistrationController.php';

$controller = new RegistrationController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $action = $_POST["action"] ?? "register";

    if ($action == "clear_cookie") {
        $controller->clearCookie();
    } else {
        $controller->store();
    }

} else {
    $controller->index();
}
?>
