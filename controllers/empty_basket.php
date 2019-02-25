<?php

$title = 'Корзина';

require_once '../models/category.php';
$categories = Category::getAll();

require_once '../models/product.php';
$products = Product::getAll();

require_once '../views/empty_basket.php';