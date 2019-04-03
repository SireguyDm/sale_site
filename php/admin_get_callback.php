<?php 

$call_id = (((isset($_REQUEST['call_id'])) && $_REQUEST['call_id'] !== "")?$_REQUEST['call_id']:false);
$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:1);

require_once '../models/callBack.php';

$data_cb = CallBack::getAll($page);
$cb_count = $data_cb['count'];

$page_count = ceil($cb_count / CallBack::$limit_cb);

if ($call_id != false ){
    if ($call_id === 'all'){
        foreach ($data as $call){
            $call_back = CallBack::delete($call->id);
        }
    } else {
        $call_back = CallBack::delete($call_id);
    }
}

$data = [
    'call_back' => $data_cb['calls_back'],
    'active_page' => $page,
    'page_count' => $page_count
];

echo json_encode($data);