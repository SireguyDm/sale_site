<?php

session_start();

if( !isset($_SESSION['cart']) ) { 
    $_SESSION['cart'] = array();
}

require_once '../models/product.php';

if (isset($_GET['product_id']) && $_GET['product_id'] != "") {
    $product = $_GET['product_id'];
    $products = new Product($product);
    if ($products->id === NULL) {
        header('Location: ../views/error.php');
    }
} else {
    header('Location: ../views/error.php');
}


$title = $products->title;

require_once '../models/description.php';
$descriptions = new Description($product);

require_once '../views/product.php';