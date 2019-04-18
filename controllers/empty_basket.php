<?php

$title = 'Корзина';

require_once '../models/category.php';
$categories = Category::getAll();

require_once '../models/product.php';
$data_products = Product::getAll();
$products = $data_products['products'];

$sale_products = [];
foreach ($products as $product){
    if ($product->old_cost !== '0'){
        $sale_products[] = $product;
    }
}

if (count($sale_products) > 12){
    $randomProducts = [];
    while (count($randomProducts) < 12) {
    $randomKey = mt_rand(0, count($sale_products)-1);
    $randomProducts[$randomKey] = $sale_products[$randomKey];
    }
}

require_once '../views/empty_basket.php';