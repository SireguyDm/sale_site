<?php 

require_once '../models/category.php';
$data = Category::getAll();

echo json_encode($data);