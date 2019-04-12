<?php
$sort = (((isset($_REQUEST['sort'])) && $_REQUEST['sort'] !== "")?$_REQUEST['sort']:false);
$view_id = (((isset($_REQUEST['view_id'])) && $_REQUEST['view_id'] !== "")?$_REQUEST['view_id']:false);
$time = (((isset($_REQUEST['time'])) && $_REQUEST['time'] !== "")?$_REQUEST['time']:false);
$order_id = (((isset($_REQUEST['order_id'])) && $_REQUEST['order_id'] !== "")?$_REQUEST['order_id']:false);
$status_id = (((isset($_REQUEST['status_id'])) && $_REQUEST['status_id'] !== "")?$_REQUEST['status_id']:false);
$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:false);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);

require_once '../models/product.php';
require_once '../models/order.php';
require_once '../models/basket.php';
require_once '../models/status.php';

if ($order_id !== false && $status_id !== false){
    $change_status = Order::update($order_id, $status_id, false, false, false, false, false, false, false);
}

if ($action !== false && $action == 'delete'){
    $delete_basket_products = Basket::delete_all($order_id);
    $delete_order = Order::delete($order_id);
}

$basket_products = Basket::getAllProducts();
$id_array = [];
foreach ($basket_products as $product){
    $id_array[] = $product->order_id;
}
$id_array = implode(",", $id_array);
$today = date("Y-m-d");

$cookie_orders_data = Order::getAll(false, "$id_array", 'false', false, false, false);
$cookie_orders = $cookie_orders_data['orders'];
$cookie_cout = 0;
foreach ($cookie_orders as $order){
    if ($order->status_id == 1){
        $cookie_cout += 1;
    }
}
setcookie("orders_count", "$cookie_cout", time()+60*60*24*7, "/","", 0);

$orders_data= Order::getAll($sort, "$id_array", $view_id, $time, $page, $today);
$orders = $orders_data['orders'];

$orders_count = $orders_data['count'];
$pages_count = ceil($orders_count / Order::$limit_orders);

$page_info = [];
$page_info = [
    'pages_count' => $pages_count,
    'currect_page' => $page
];
    
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
    'status' => $all_status,
    'page' => $page_info
];

echo json_encode($data);