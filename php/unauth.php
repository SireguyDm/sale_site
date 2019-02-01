<?php

session_start();

$_SESSION = [];

session_destroy();

header('Location: ../controllers/admin_auth.php');die;