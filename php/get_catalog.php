<?php 

$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:1);
$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:1);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);
$type = (((isset($_REQUEST['type'])) && $_REQUEST['type'] !== "")?$_REQUEST['type']:false);
$brand = (((isset($_REQUEST['brand'])) && $_REQUEST['brand'] !== "")?$_REQUEST['brand']:false);
$active_page = (((isset($_REQUEST['active_page'])) && $_REQUEST['active_page'] !== "")?$_REQUEST['active_page']:false);

if ($category_id !== false){
    require_once '../models/product.php';
    $data_products = Product::getAll($category_id, $type, $action, $brand, $page);
    $products = $data_products['products'];
    $products_count = $data_products['count'];
    
    $page_count = ceil($products_count / Product::$limit_products);
    
    $data = [
        'catalog' => $products,
        'count' => $page_count,
        'active_page' => $page
    ];
        
    echo json_encode($data);
}