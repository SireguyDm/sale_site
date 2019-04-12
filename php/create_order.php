<?php

session_start();

$name = (((isset($_REQUEST['name'])) && $_REQUEST['name'] !== "")?$_REQUEST['name']:false);
$secondName = (((isset($_REQUEST['secondName'])) && $_REQUEST['secondName'] !== "")?$_REQUEST['secondName']:false);
$adress = (((isset($_REQUEST['adress'])) && $_REQUEST['adress'] !== "")?$_REQUEST['adress']:false);
$city = (((isset($_REQUEST['city'])) && $_REQUEST['city'] !== "")?$_REQUEST['city']:false);
$domofon = (((isset($_REQUEST['domofon'])) && $_REQUEST['domofon'] !== "")?$_REQUEST['domofon']:false);
$email = (((isset($_REQUEST['email'])) && $_REQUEST['email'] !== "")?$_REQUEST['email']:false);
$tel = (((isset($_REQUEST['tel'])) && $_REQUEST['tel'] !== "")?$_REQUEST['tel']:false);
$basket = (((isset($_REQUEST['basket'])) && $_REQUEST['basket'] !== "")?$_REQUEST['basket']:false);
$itog = (((isset($_REQUEST['itog'])) && $_REQUEST['itog'] !== "")?$_REQUEST['itog']:false);

date_default_timezone_set('Europe/Moscow');

if ($name != false && $adress != false && $adress != false && $tel != false){
    
    require_once '../models/order.php';
    
    $rand_text = '01234567890qwertyuiopasdfghjklzxcvbnm';
    $indificator = substr(str_shuffle($rand_text), 1, 10);
    
    $indificator_validation = Order::searchByIndificator($indificator);
    
    if ($indificator_validation === null){
        
        $new_order = Order::add(1, $name, $secondName, $tel, $email, $adress, $city, $domofon, $indificator, date("Y-m-d H-i-s"));
        $order_id = Order::searchByIndificator($indificator);
        
        require_once '../models/basket.php';
        foreach ($basket as $product){
            $basket = Basket::add($order_id, $product['id'], $product['count'], $product['p_summ'], $itog);
        }
        
        unset($_SESSION['cart']);
        setcookie("basket_count", "0", time()+60*60*24*7, "/","", 0);
        
        $data = 'complete';
        echo json_encode($data);
    }
    
    
    
}


