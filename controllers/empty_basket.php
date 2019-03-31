<?php

$title = 'Корзина';

require_once '../models/category.php';
$categories = Category::getAll();

require_once '../models/product.php';
$data_products = Product::getAll();
$products = $data_products['products'];

require_once '../views/empty_basket.php';