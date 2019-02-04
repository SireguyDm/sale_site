<?php

$title = 'Корзина';
session_start();

if( !isset($_SESSION['cart']) ) { 
    $_SESSION['cart'] = array();
}

//var_dump($_SESSION['cart']);

$basket_products = [];
$product = '';

var_dump($_SESSION['cart']);
//var_dump($_SESSION['cart'][1]['basket_product_id']);
//$_SESSION['cart'][1]['basket_product_id'] = 1;
//$_SESSION['cart'][2]['basket_product_id'] = 2;
//$_SESSION['cart'][3]['basket_product_id'] = 3;
//unset($_SESSION['cart'][2]);

require_once '../models/product.php';
foreach ($_SESSION['cart'] as $product_id){
    $product = new Product($product_id['basket_product_id']);
    array_push($basket_products, $product);
}

if (count($basket_products) === 0){
    header('Location: ../views/error.php');
}

//var_dump($basket_products);

require_once '../views/basket.php';