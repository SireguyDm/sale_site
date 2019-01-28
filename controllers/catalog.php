<?php

require_once '../models/category.php';

if (isset($_GET['category_id']) && $_GET['category_id'] != "") {
    $category = $_GET['category_id'];
    $category = new Category($category);
    if ($category->id === NULL) {
        header('Location: ../views/error.php');
    }
} else {
    header('Location: ../views/error.php');
}

$title = $category->title;

require_once '../models/product.php';
$products = Product::getAll($category->id);


require_once '../views/catalog.php';