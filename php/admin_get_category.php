<?php 

$category_title = (((isset($_REQUEST['category_title'])) && $_REQUEST['category_title'] !== "")?$_REQUEST['category_title']:false);

$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:false);

$status = (((isset($_REQUEST['status'])) && $_REQUEST['status'] !== "")?$_REQUEST['status']:false);

require_once '../models/category.php';

if ($category_title != false && $category_id != false){
    $category = Category::update($category_id, $category_title, $status);
}

$data = Category::getAll();

echo json_encode($data);