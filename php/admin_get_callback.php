<?php 

$call_id = (((isset($_REQUEST['call_id'])) && $_REQUEST['call_id'] !== "")?$_REQUEST['call_id']:false);

require_once '../models/callBack.php';
$data = CallBack::getAll();

if ($call_id != false ){
    if ($call_id === 'all'){
        foreach ($data as $call){
            $call_back = CallBack::delete($call->id);
        }
    } else {
        $call_back = CallBack::delete($call_id);
    }
}

echo json_encode($data);