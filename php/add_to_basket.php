<?php

session_start();

$product_id = (((isset($_REQUEST['product_id'])) && $_REQUEST['product_id'] !== "")?$_REQUEST['product_id']:false);

//Если товар был добавлен
if ($product_id !== false && $_SESSION['cart'][$product_id]['count'] < 10){
    
    //В сессию записывается id товара
    $_SESSION['cart'][$product_id]['product_id'] = $product_id;
    
    //Получение этого товара
    require_once '../models/product.php';
    $product = new Product($product_id);
    
    //В сессию записывается стоимость товара
    $_SESSION['cart'][$product_id]['cost'] = $product->cost;
    
    //Если добавлено больше 1 товара
    if ($_SESSION['cart'][$product_id]['count']){
        
        $count = $_SESSION['cart'][$product_id]['count'];
        $count = $count + 1;
        $product_cost = $count * $product->cost;
        
        
        //В сессию записывается кол-во товара и общая стоимость
        $_SESSION['cart'][$product_id]['all_cost'] = $product_cost;
        $_SESSION['cart'][$product_id]['count'] = $count;
        
        cookieCount('cart', 'count', "basket_count");
    //Если добавлен 1 товара
    } else {
        
        //В сессию записывается кол-во товара
        $_SESSION['cart'][$product_id]['count'] = 1;
        $_SESSION['cart'][$product_id]['all_cost'] = $product->cost;
        
        cookieCount('cart', 'count', "basket_count");
    }
}

function cookieCount($session, $count, $cookie_name){
    $cookie_counter = 0;
    foreach ($_SESSION[$session] as $session){
        $session_count = $session[$count];
        $cookie_counter += $session_count; 
    }
    setcookie($cookie_name, "$cookie_counter", time()+60*60*24*7, "/","", 0);
}