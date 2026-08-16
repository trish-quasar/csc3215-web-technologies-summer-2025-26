<?php
session_start();
require 'controllers/ApplicationController.php';

$controller = new ApplicationController();
$controller->result();
