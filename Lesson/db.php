<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';

$link = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($link, 'utf8');
