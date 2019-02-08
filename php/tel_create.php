<?php

require_once '../models/callBack.php';

$tel = $_REQUEST['tel'];
$user_name = $_REQUEST['user_name'];
$date_created = '';

var_dump($tel);
var_dump($user_name);

$call_back = CallBack::add($user_name, $tel, '2018-01-19');

header('Location: ../controllers/main_page.php');