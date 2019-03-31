<?php

session_start();

require_once('../php/admin_role.php');
    
if ($_SESSION['name'] != null){
    $user_name = $_SESSION['name'];
} else {
    $user_name = 'Инкогнито';
}

//require_once '../models/order.php';
//$order_data = Order::getAll(false, false, 'false', false, false, false);
//$order = $order_data['orders'];
//$order_count = 0;
//foreach ($order as $item){
//    if ($item->status_id == 1){
//        $order_count += 1;
//    }
//}
//var_dump($order_count);


require_once '../templates/admin_header.php';