<?php 

$i = 1;
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);
$add_count = (((isset($_REQUEST['add_count'])) && $_REQUEST['add_count'] !== "")?$_REQUEST['add_count']:1);

require_once '../models/product.php';

if ($action == 'add'){
    while ($i <= $add_count){
        $products = Product::add('Новый товар', 'null', 'null', 'default', '4');
        $i++;
    }
}

$data = Product::getAll();

echo json_encode($data);