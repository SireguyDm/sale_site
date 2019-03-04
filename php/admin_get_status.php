<?php 

$status_id = (((isset($_REQUEST['status_id'])) && $_REQUEST['status_id'] !== "")?$_REQUEST['status_id']:false);
$status_title = (((isset($_REQUEST['status_title'])) && $_REQUEST['status_title'] !== "")?$_REQUEST['status_title']:false);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);

require_once '../models/status.php';

if ($action !== false && $action === 'delete' && $status_id !== false){
    $status = Status::delete($status_id);
} elseif ($action !== false && $action === 'change' && $status_id !== false && $status_title !== false){
    $status = Status::update($status_id, $status_title);
} elseif ($action !== false && $action === 'add' && $status_id == 'add' && $status_title !== false){
    $status = Status::add($status_title);
}

$data = Status::getAll();

echo json_encode($data);