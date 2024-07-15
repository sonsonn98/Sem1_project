<?php
session_start();
require_once("app/config/db.php");
require_once("app/App.php");
require_once("app/controllers/BaseController.php");
$conn = DBConnection::getConnection();
$app = new App($conn);  

?>

