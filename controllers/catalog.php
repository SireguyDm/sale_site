<?php

require_once '../models/category.php';

if (isset($_GET['category_id']) && $_GET['category_id'] != "" && $_GET['category_id'] !== 'sale') {
    $category = $_GET['category_id'];
    $category = new Category($category);
    if ($category->id === NULL) {
        header('Location: ../views/error.php');
    }
    
    require_once '../models/product.php';
    require_once '../models/brand.php';
    
    $brands_data = Brand::getAll($category->id);
    $brands_arr = $brands_data['brands'];
    $brands = [];
    foreach ($brands_arr as $brand){
        $data_products = Product::getAll($category->id, false, false, $brand->id, false);
        $products = $data_products['products'];
        
        if (count($products) > 0){
            $brands[] = $brand;
        }
    }
    $category_id = $category->id;
    
    $title = $category->title;
    
    
} elseif ($_GET['category_id'] === 'sale'){
    
    require_once '../models/product.php';
    require_once '../models/brand.php';
    
    $brands_data = Brand::getAll();
    $brands_arr = $brands_data['brands'];
    $brands = [];
    foreach ($brands_arr as $brand){
        $data_products = Product::getAll('sale', false, false, $brand->id, false);
        $products = $data_products['products'];
        
        if (count($products) > 0){
            $brands[] = $brand;
        }
    }
    
    $category_id = 'sale';
    
    $title = 'Все товары со скидкой';
    
} else {
    header('Location: ../views/error.php');
}

require_once '../views/catalog.php';