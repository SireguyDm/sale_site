<?php 

$brand_id = (((isset($_REQUEST['brand_id'])) && $_REQUEST['brand_id'] !== "")?$_REQUEST['brand_id']:false);
$brand_title = (((isset($_REQUEST['brand_title'])) && $_REQUEST['brand_title'] !== "")?$_REQUEST['brand_title']:false);
$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:4);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);
$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:1);

require_once '../models/brand.php';

if ($action !== false && $action === 'delete' && $brand_id !== false){
    $brands = Brand::delete($brand_id);
} elseif ($action !== false && $action === 'change' && $brand_id !== false && $brand_title !== false){
     $brands = Brand::update($brand_id, $category_id, $brand_title);
} elseif ($action !== false && $action === 'add' && $brand_id == 'add' && $brand_title !== false){
     $brands = Brand::add($brand_title, $category_id);
}

$brand_data = Brand::getAll(false, $page);
$brand_count = $brand_data['count'];

$page_count = ceil($brand_count / Brand::$limit_brand);

$data = [
    'brands' => $brand_data['brands'],
    'page_count' => $page_count,
    'active_page' => $page
];

echo json_encode($data);