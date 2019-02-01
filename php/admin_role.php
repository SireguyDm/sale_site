<?php

if ($_SESSION['role'] !== '1'){
    header('Location: ../controllers/admin_auth.php');die;
}