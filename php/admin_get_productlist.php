<?php 

require_once '../models/category.php';
$data = Product::getAll();

echo json_encode($data);