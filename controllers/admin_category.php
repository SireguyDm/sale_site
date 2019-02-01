<?php 

$admin_title = 'Категории';

require_once '../models/category.php';
$categories = Category::getAll();

require_once ('../admin/admin_category.php');