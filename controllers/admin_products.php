<?php 

$admin_title = 'Все товары';

require_once '../models/category.php';
require_once '../models/brand.php';

$categories = Category::getAll();

$brand_data = Brand::getAll();
$brands = $brand_data['brands'];

require_once ('../admin/admin_product.php');