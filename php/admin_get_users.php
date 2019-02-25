<?php 

$user_id = (((isset($_REQUEST['user_id'])) && $_REQUEST['user_id'] !== "")?$_REQUEST['user_id']:false);
$user_name = (((isset($_REQUEST['user_name'])) && $_REQUEST['user_name'] !== "")?$_REQUEST['user_name']:false);
$user_login = (((isset($_REQUEST['user_login'])) && $_REQUEST['user_login'] !== "")?$_REQUEST['user_login']:false);
$user_pass = (((isset($_REQUEST['user_pass'])) && $_REQUEST['user_pass'] !== "")?$_REQUEST['user_pass']:false);
$action = (((isset($_REQUEST['action'])) && $_REQUEST['action'] !== "")?$_REQUEST['action']:false);

require_once '../models/user.php';
$data = User::getAll();

if ($user_id !== false && ( $user_name !== false || $user_login !== false || $user_pass != false ) && $action == 'change'){
    $user = User::update($user_id, $user_name, $user_login, $user_pass, false);
} elseif ($user_id !== false && $action = 'delete'){
    $user = User::delete($user_id);
} elseif ($action !== false && $action === 'add' && $user_id_id == 'add' && $user_name !== false && $user_login !== false && $user_pass != false){
    $user = User::add($user_name, $user_login, $user_name, 1);
}

echo json_encode($data);