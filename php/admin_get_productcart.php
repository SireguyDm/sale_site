<?php 

$product_id = (((isset($_REQUEST['product_id'])) && $_REQUEST['product_id'] !== "")?$_REQUEST['product_id']:false);
$title = (((isset($_REQUEST['title'])) && $_REQUEST['title'] !== "")?$_REQUEST['title']:false);
$zag = (((isset($_REQUEST['zag'])) && $_REQUEST['zag'] !== "")?$_REQUEST['zag']:false);
$cost = (((isset($_REQUEST['cost'])) && $_REQUEST['cost'] !== "")?$_REQUEST['cost']:false);
$old_cost = (((isset($_REQUEST['old_cost'])) && $_REQUEST['old_cost'] !== "")?$_REQUEST['old_cost']:false);
$p1 = (((isset($_REQUEST['p1'])) && $_REQUEST['p1'] !== "")?$_REQUEST['p1']:false);
$p2 = (((isset($_REQUEST['p2'])) && $_REQUEST['p2'] !== "")?$_REQUEST['p2']:false);
$img = (((isset($_REQUEST['img'])) && $_REQUEST['img'] !== "")?$_REQUEST['img']:false);
$color = (((isset($_REQUEST['color'])) && $_REQUEST['color'] !== "")?$_REQUEST['color']:false);
$size = (((isset($_REQUEST['size'])) && $_REQUEST['size'] !== "")?$_REQUEST['size']:false);
$material = (((isset($_REQUEST['material'])) && $_REQUEST['material'] !== "")?$_REQUEST['material']:false);
$country = (((isset($_REQUEST['country'])) && $_REQUEST['country'] !== "")?$_REQUEST['country']:false);
$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:false);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);

if ($product_id !== false){
    require_once '../models/product.php';
    require_once '../models/description.php';
    
    if ($action == 'change'){
        
        $products = Product::update($product_id, $title, $cost, $old_cost, $img, $category_id);
        
        $description_update = Description::update($product_id, $zag, $p1, $p2, $color, $size, $material, $country);
    }
    
    if ($action == 'delete'){
        
        $descriptions = Description::delete($product_id);
        $products = Product::delete($product_id);
    }
    
    $product_data = new Product($product_id);
    $description_data = new Description($product_id);
    
    $data = ['product_data' => $product_data, 'description_data' => $description_data];
    echo json_encode($data);
}






