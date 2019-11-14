<?php 

$product_id = (((isset($_REQUEST['product_id'])) && $_REQUEST['product_id'] !== "")?$_REQUEST['product_id']:false);
$title = (((isset($_REQUEST['title'])) && $_REQUEST['title'] !== "")?$_REQUEST['title']:false);
$zag = (((isset($_REQUEST['zag'])) && $_REQUEST['zag'] !== "")?$_REQUEST['zag']:null);
$cost = (((isset($_REQUEST['cost'])) && $_REQUEST['cost'] !== "")?$_REQUEST['cost']:false);
$old_cost = (((isset($_REQUEST['old_cost'])) && $_REQUEST['old_cost'] !== "")?$_REQUEST['old_cost']:null);
$p1 = (((isset($_REQUEST['p1'])) && $_REQUEST['p1'] !== "")?$_REQUEST['p1']:null);
$p2 = (((isset($_REQUEST['p2'])) && $_REQUEST['p2'] !== "")?$_REQUEST['p2']:null);
$img = (((isset($_REQUEST['img'])) && $_REQUEST['img'] !== "")?$_REQUEST['img']:null);
$color = (((isset($_REQUEST['color'])) && $_REQUEST['color'] !== "")?$_REQUEST['color']:null);
$size = (((isset($_REQUEST['size'])) && $_REQUEST['size'] !== "")?$_REQUEST['size']:null);
$material = (((isset($_REQUEST['material'])) && $_REQUEST['material'] !== "")?$_REQUEST['material']:null);
$country = (((isset($_REQUEST['country'])) && $_REQUEST['country'] !== "")?$_REQUEST['country']:null);
$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:false);
$brand_id = (((isset($_REQUEST['brand_id'])) && $_REQUEST['brand_id'] !== "")?$_REQUEST['brand_id']:false);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);
$product_count = (((isset($_REQUEST['product_count'])) && $_REQUEST['product_count'] !== "")?$_REQUEST['product_count']:false);

if ($product_id !== false){
    require_once '../models/product.php';
    require_once '../models/description.php';
    
    if ($action == 'change'){
        
//        $products = Product::update($product_id, $title, $cost, $old_cost, $img, $category_id, $brand_id, $product_count);
        $products = Product::update($product_id, $title, $cost, $old_cost, $img, $category_id, $brand_id, $product_count);
        
        $description_update = Description::update($product_id, $zag, $p1, $p2, $color, $size, $material, $country);
    }
    
    if ($action == 'delete'){
        
        $descriptions = Description::delete($product_id);
        $products = Product::delete($product_id);
    }
    
    $product_data = new Product($product_id);
    $description_data = new Description($product_id);
    
    $test = [
        $product_id, 
        $title, 
        $cost, 
        $old_cost, 
        $img, 
        $category_id, 
        $brand_id, 
        $product_count
    ];
    
    $data = ['product_data' => $product_data, 'description_data' => $description_data, 'test'=> $test];
    echo json_encode($data);
}






