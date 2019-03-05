<?php

$basket_id = (((isset($_REQUEST['product_id'])) && $_REQUEST['product_id'] !== "")?$_REQUEST['product_id']:false);
$basket_count = (((isset($_REQUEST['count'])) && $_REQUEST['count'] !== "")?$_REQUEST['count']:false);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);

session_start();

if( !isset($_SESSION['cart']) ) { 
    $_SESSION['cart'] = array();
}

if ($action === 'change'){
    $sess_cost = $_SESSION['cart'][$basket_id]['cost'];
    
    $_SESSION['cart'][$basket_id]['count'] = $basket_count;
    $_SESSION['cart'][$basket_id]['all_cost'] = $basket_count * $sess_cost;
}

if ($action === 'delete'){
    unset($_SESSION['cart'][$basket_id]);
}

require_once '../models/product.php';
require_once '../models/category.php';

$products_info = [];
foreach ($_SESSION['cart'] as $basket_product){
    
    $product = new Product($basket_product['product_id']);
    $category = new Category($product->category_id);
    
    $product_info = array(
        'count' => $basket_product['count'],
        'all_cost' => $basket_product['all_cost'],
        'category' => $category->title
    );
    
    array_push($product_info, $product);
    array_push($products_info, $product_info);
}

$data = $products_info;
echo json_encode($data);

//echo '<pre>';
//var_dump($basket_products);
//var_dump($product_info[0]);