<?php

session_start();

$product_id = $_REQUEST['basket_product_id'];

$count = 1;

if ($product_id){
    $_SESSION['cart'][$product_id]['basket_product_id'] = $_REQUEST['basket_product_id'];
    
    if ($_SESSION['cart'][$product_id]['count']){
        $count = $_SESSION['cart'][$product_id]['count'];
        $count = $count + 1;
        $_SESSION['cart'][$product_id]['count'] = $count;
    } else {
        $_SESSION['cart'][$product_id]['count'] = $count;
    }
    
} else {
    $basket_count = $_REQUEST['basket_count'];
    $basket_id = $_REQUEST['basket_id'];

    if ($basket_count & $basket_id){
        unset($_SESSION['cart'][$basket_id]['count']);
        $_SESSION['cart'][$basket_id]['count'] = $basket_count;
    }
}

$delete = $_REQUEST['delete_product'];
unset($_SESSION['cart'][$delete]);


