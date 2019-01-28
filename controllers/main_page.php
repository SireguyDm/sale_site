<?php

$title = 'Главная страница';

require_once '../models/category.php';
$categories = Category::getAll();

require_once '../models/product.php';
$products = Product::getAll();

require_once '../views/main_page.php';