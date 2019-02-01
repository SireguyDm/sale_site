<?php

session_start();

require_once('../php/admin_role.php');
    
if ($_SESSION['name'] != null){
    $user_name = $_SESSION['name'];
} else {
    $user_name = 'Инкогнито';
}

require_once '../templates/admin_header.php';