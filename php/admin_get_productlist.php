<?php 

$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);
$add_count = (((isset($_REQUEST['add_count'])) && $_REQUEST['add_count'] !== "")?$_REQUEST['add_count']:1);
$sort = (((isset($_REQUEST['sort'])) && $_REQUEST['sort'] !== "")?$_REQUEST['sort']:false);
$category_id = (((isset($_REQUEST['view'])) && $_REQUEST['view'] !== "")?$_REQUEST['view']:false);
$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:1);
$search_text = (((isset($_REQUEST['search_text'])) && $_REQUEST['search_text'] !== "")?$_REQUEST['search_text']:false);
$product_id_arr = (((isset($_REQUEST['product_id_arr'])) && $_REQUEST['product_id_arr'] !== "")?$_REQUEST['product_id_arr']:false);

require_once '../models/product.php';

//Добавление товара
if ($action == 'add'){
    $i = 1;
    while ($i <= $add_count){
        $products = Product::add('Новый товар', 'null', 'null', 'default', '4');
        $i++;
    }
}

//Удаление товара
if ($action == 'delete'){
    foreach($product_id_arr as $key){
        $delete = Product::delete($key);
    }
}

if ($search_text !== false && $search_text !== ''){
        
    $data_products = Product::getAll($category_id, $sort, false);
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
    
    $data_products = Product::getAll($category_id, $sort, $page);
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