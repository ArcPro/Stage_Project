<?php 
require_once "config.php";
require_once "lib/database.php";
require_once "view/templates/header.php";

session_start();
// session_destroy();
if(isset($_SESSION["user_id"])) {
    header('Location: view/templates/dashboard.php');
} 
require_once "view/templates/login.php";

// $database = new Database();
// $query = "SELECT * FROM ma_table";
// $result = $database->executeQuery($query);