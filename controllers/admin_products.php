<?php 

$admin_title = 'Все товары';

require_once '../models/category.php';
$categories = Category::getAll();

require_once ('../admin/admin_product.php');