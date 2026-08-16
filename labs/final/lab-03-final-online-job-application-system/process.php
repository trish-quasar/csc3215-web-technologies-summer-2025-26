<?php
session_start();
require 'controllers/ApplicationController.php';

$controller = new ApplicationController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->store();
} else {
    header("Location: index.php");
    exit();
}
