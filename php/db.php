<?php

require_once '../config.php';


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset('utf8');

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
