<?php

require_once '../models/product.php';

if (isset($_GET['product_id']) && $_GET['product_id'] != "") {
    $product = $_GET['product_id'];
    $products = new Product($product);
    if ($products->id === NULL) {
        header('Location: ../views/error.php');
    }
} else {
    header('Location: ../views/error.php');
}

$admin_title = $products->title;

require_once '../models/description.php';
$descriptions = new Description($product);
if ($descriptions->id === null && $descriptions->product_id === null){
    $descriptions = Description::add('null', 'null', 'null', 'null', 'null', 'null', 'null', $products->id);
    $descriptions = new Description($product);
}

require_once '../models/category.php';
require_once '../models/brand.php';
$categories = Category::getAll();
$brand_data = Brand::getAll();
$brands = $brand_data['brands'];

require_once '../admin/admin_product_cart.php';