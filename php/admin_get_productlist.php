<?php 

require_once '../models/product.php';
$data = Product::getAll();

echo json_encode($data);