<?php 
    
    $admin_title = 'Бренды';

    require_once '../models/category.php';
    $categories = Category::getAll();

    require_once('../admin/admin_brand.php');

?>