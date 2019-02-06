<?php

require_once '../models/product.php';

session_start();

$product_id = $_REQUEST['basket_product_id'];

$count = 1;

if ($product_id){
    $_SESSION['cart'][$product_id]['basket_product_id'] = $_REQUEST['basket_product_id'];
    
    $product = new Product($product_id);
    $product_cost = $product->cost;
    
    $_SESSION['cart'][$product_id]['const_cost'] = $product_cost;
    
    if ($_SESSION['cart'][$product_id]['count']){
        $count = $_SESSION['cart'][$product_id]['count'];
        $count = $count + 1;
        $product_cost = $count * $product_cost;
        $_SESSION['cart'][$product_id]['cost'] = $product_cost;
        $_SESSION['cart'][$product_id]['count'] = $count;
    } else {
        $_SESSION['cart'][$product_id]['count'] = $count;
        $_SESSION['cart'][$product_id]['cost'] = $product_cost;
    }
    
} else {
    $basket_count = $_REQUEST['basket_count'];
    $basket_id = $_REQUEST['basket_id'];
    $basket_summ = $_REQUEST['basket_summ'];

    if ($basket_count & $basket_id & $basket_summ){
        unset($_SESSION['cart'][$basket_id]['count']);
        unset($_SESSION['cart'][$basket_id]['cost']);
        $_SESSION['cart'][$basket_id]['count'] = $basket_count;
        $_SESSION['cart'][$basket_id]['cost'] = $basket_summ;
    }
}

if ($_REQUEST['delete_product']){
    $delete = $_REQUEST['delete_product'];
    unset($_SESSION['cart'][$delete]);
}

