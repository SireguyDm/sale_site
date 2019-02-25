<?php

require_once '../models/category.php';

if (isset($_GET['category_id']) && $_GET['category_id'] != "" && $_GET['category_id'] !== 'sale') {
    $category = $_GET['category_id'];
    $category = new Category($category);
    if ($category->id === NULL) {
        header('Location: ../views/error.php');
    }
    
    require_once '../models/product.php';
    $products = Product::getAll($category->id);
    $title = $category->title;
    
} elseif ($_GET['category_id'] === 'sale'){
    
    require_once '../models/product.php';
    $products = Product::getAll('sale');
    $title = 'Все товары со скидкой';
    
} else {
    header('Location: ../views/error.php');
}

require_once '../views/catalog.php';