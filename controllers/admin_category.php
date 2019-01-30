<?php 

$admin_title = 'Категории';

require_once '../models/category.php';
$categories = Category::getAll();

require_once ('../views/admin_category.php');