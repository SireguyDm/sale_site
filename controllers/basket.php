<?php

$title = 'Корзина';
session_start();

if( !isset($_SESSION['cart']) ) { 
    $_SESSION['cart'] = array();
}

if (count($_SESSION['cart']) === 0){
    header('Location: ../controllers/empty_basket.php');
}

require_once '../views/basket.php';