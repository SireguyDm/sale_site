<?php 

require_once '../models/status.php';
$data = Status::getAll();

echo json_encode($data);