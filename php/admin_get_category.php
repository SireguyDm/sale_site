<?php 

$category_title = (((isset($_REQUEST['category_title'])) && $_REQUEST['category_title'] !== "")?$_REQUEST['category_title']:false);

$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:false);

require_once '../models/category.php';
$data = Category::getAll();

if ($category_title != false && $category_id != false){
    $category = Category::update($category_id, $category_title);
}

echo json_encode($data);