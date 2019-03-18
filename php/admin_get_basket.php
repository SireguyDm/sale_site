<?php

$order_id = (((isset($_REQUEST['order_id'])) && $_REQUEST['order_id'] !== "")?$_REQUEST['order_id']:false);
$status_id = (((isset($_REQUEST['status_id'])) && $_REQUEST['status_id'] !== "")?$_REQUEST['status_id']:false);

require_once '../models/product.php';
require_once '../models/order.php';
require_once '../models/basket.php';
require_once '../models/status.php';

if ($order_id !== false && $status_id !== false){
    $change_status = Order::update($order_id, $status_id, false, false, false, false, false, false, false);
}

$basket_products = Basket::getAllProducts();

//Отбираем активные заказы
$orders = [];
foreach ($basket_products as $product){
    
    $order_id = $product->order_id;
    
    $order = new Order($order_id);
    array_push($orders, $order);
}

//
$basket = [];
$basketByOrder = [];
foreach ($orders as $order){
    
    $productsByOrder = Basket::getAllByOrderId($order->id);
    array_push($basketByOrder, $order, $productsByOrder);
    $basket[] = $basketByOrder;
    $basketByOrder = [];
    
}

$basket = array_map(function($key) {
    return array(
        'info' => $key[0],
        'basket' => $key[1]
    );
}, $basket);

$all_status = Status::getAll();

$data = 
[
    'basket_info' => $basket,
    'status' => $all_status
];

echo json_encode($data);