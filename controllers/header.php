<?php

session_set_cookie_params(180);
session_start();

//if( !isset($_SESSION['products_id']) ) { 
//    $_SESSION['products_id'] = array();
//}
//
//$product_id = $_COOKIE['product_id'];
//if($_SESSION['products_id'] === 0){
//    $_SESSION['products_id'] = $_COOKIE['product_id'];
//} else{
//    array_push($_SESSION['products_id'], $_COOKIE['product_id']);
//}
//
// 
//
//var_dump($_SESSION['products_id']);
//echo 'куки'.$_COOKIE["product_id"];

require_once '../templates/header.php';