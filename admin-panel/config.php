<?php
// config.php me session start karne ke liye:
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pdo = new PDO('mysql:host=localhost;dbname=elearning','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function require_admin(){
  if(!isset($_SESSION['admin_id'])){
    header('Location: login.php'); exit;
  }
}

?>
