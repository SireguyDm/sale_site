<?php 

$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);
$add_count = (((isset($_REQUEST['add_count'])) && $_REQUEST['add_count'] !== "")?$_REQUEST['add_count']:1);
$cost_action = (((isset($_REQUEST['cost_action'])) && $_REQUEST['cost_action'] !== "")?$_REQUEST['cost_action']:false);
$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:false);
$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:1);
$search_text = (((isset($_REQUEST['search_text'])) && $_REQUEST['search_text'] !== "")?$_REQUEST['search_text']:false);
$product_id_arr = (((isset($_REQUEST['product_id_arr'])) && $_REQUEST['product_id_arr'] !== "")?$_REQUEST['product_id_arr']:false);
$brand = (((isset($_REQUEST['brand'])) && $_REQUEST['brand'] !== "")?$_REQUEST['brand']:false);

if ($cost_action !== false){
    $type = 'cost';
} else {
    $type = false;
}
require_once '../models/product.php';

//Добавление товара
if ($action == 'add'){
    $i = 1;
    while ($i <= $add_count){
        $products = Product::add('Новый товар', 'null', 'null', 'default', '4', '1');
        $i++;
    }
}

//Удаление товара
if ($action == 'delete'){
    require_once '../models/description.php';
    foreach($product_id_arr as $key){
        $delete_description = Description::delete($key);
        $delete_product = Product::delete($key);
    }
}

if ($search_text !== false && $search_text !== ''){
        
    $data_products = Product::getAll($category_id, $type, $cost_action, $brand, false);
    $product_arr = $data_products['products'];
    
    $products = [];
    
    foreach ($product_arr as $product){
        $target = $product->title;
        $target = mb_strtolower($target);
        preg_replace('/\s/', '', $target);
        
        if (strpos($target, $search_text) !== false){
            $products []= $product;
        }
        $products_count = count($products);
        $pages_count = 1;
    }
} else {
    
    $data_products = Product::getAll($category_id, $type, $cost_action, $brand, $page);
    $products = $data_products['products'];
    $products_count = $data_products['count'];

    $pages_count = ceil($products_count / Product::$limit_products);
    
}
$data = [
    'products' => $products,
    'count' => $pages_count,
    'active_page' => $page,
    'product_count' => $products_count,
    'product_id_arr' => $product_id_arr
];

echo json_encode($data);