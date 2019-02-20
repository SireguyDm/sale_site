<?php 

require_once '../models/user.php';
$data = User::getAll();

echo json_encode($data);