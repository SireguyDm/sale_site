<?php 

$category_id = (((isset($_REQUEST['category_id'])) && $_REQUEST['category_id'] !== "")?$_REQUEST['category_id']:false);

require_once '../models/brand.php';

$brand_data = Brand::getAll($category_id, false);
$data = $brand_data['brands'];

echo json_encode($data);