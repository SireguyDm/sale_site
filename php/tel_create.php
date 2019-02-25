<?php

require_once '../models/callBack.php';

$tel = (((isset($_REQUEST['tel'])) && $_REQUEST['tel'] !== "")?$_REQUEST['tel']:false);
$user_name = (((isset($_REQUEST['user_name'])) && $_REQUEST['user_name'] !== "")?$_REQUEST['user_name']:false);
$date = date("G:i / d.m.Y");

if ($tel != false && $user_name != false){
    $call_back = CallBack::add($user_name, $tel, $date);
}

header('Location: ../controllers/main_page.php');