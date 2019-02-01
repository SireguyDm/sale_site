<?php

session_start();

require_once '../php/db.php';

$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];

global $mysqli;

$query = "SELECT * FROM `users` WHERE login = '$login' AND pass = '$pass'";
$result = $mysqli->query($query);
$user = $result->fetch_assoc();

if ($user['role'] === '1') {
    
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    header('Location: ../controllers/admin_main_page.php');die;
} else {
    header('Location: ../controllers/admin_auth.php');die;
}