<?php 

$product_id = (((isset($_REQUEST['product_id'])) && $_REQUEST['product_id'] !== "")?$_REQUEST['product_id']:false);

if ($product_id != false){
    require_once '../models/product.php';
    require_once '../models/description.php';
    $product_data = new Product($product_id);
    $description_data = new Description($product_id);
}

echo json_encode($product_data);
echo json_encode($description_data);