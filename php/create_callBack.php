<?php

$cb_tel = (((isset($_REQUEST['cb_tel'])) && $_REQUEST['cb_tel'] !== "")?$_REQUEST['cb_tel']:false);
$cb_name = (((isset($_REQUEST['cb_name'])) && $_REQUEST['cb_name'] !== "")?$_REQUEST['cb_name']:false);

date_default_timezone_set('Europe/Moscow');
$date = date("Y-m-d H-i-s");

require_once '../models/callBack.php';

if ($cb_tel !== false && $cb_name !== false){
    $call_back = CallBack::add($cb_name, $cb_tel, $date);
}