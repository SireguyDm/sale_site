<?php

session_start();

require_once('../php/admin_role.php');
    
if ($_SESSION['name'] != null){
    $user_name = $_SESSION['name'];
} else {
    $user_name = 'Инкогнито';
}

if(isset($_COOKIE['orders_count']) ) { 
    $order_count = $_COOKIE['orders_count'];
}

require_once('../models/callBack.php');
$call_back_data = CallBack::getAll();
$cookie_callBack = $call_back_data['calls_back'];
$cookie_cb = count($cookie_callBack);
setcookie("cb_count", "$cookie_cb", time()+60*60*24*7, "/","", 0);

if(isset($_COOKIE['cb_count']) ) { 
    $cookie_cb_html = $_COOKIE['cb_count'];
}


require_once '../templates/admin_header.php';