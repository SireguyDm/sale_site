<?php 

$call_id = (((isset($_REQUEST['call_id'])) && $_REQUEST['call_id'] !== "")?$_REQUEST['call_id']:false);

require_once '../models/callBack.php';
$data = CallBack::getAll();
if ($call_id != false){
    $call_back = CallBack::delete($call_id);
}

echo json_encode($data);