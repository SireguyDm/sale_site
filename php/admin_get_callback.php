<?php 

$call_id = (((isset($_REQUEST['call_id'])) && $_REQUEST['call_id'] !== "")?$_REQUEST['call_id']:false);
$page = (((isset($_REQUEST['page'])) && $_REQUEST['page'] !== "")?$_REQUEST['page']:1);

require_once '../models/callBack.php';

if ($call_id !== false ){
    if (gettype ($call_id) == 'array'){
        foreach ($call_id as $call){
            $call_back = CallBack::delete($call);
        }
    } else {
        $call_back = CallBack::delete($call_id);
    }
}

$data_cb = CallBack::getAll($page);
$cb_count = $data_cb['count'];

$page_count = ceil($cb_count / CallBack::$limit_cb);

$data = [
    'call_back' => $data_cb['calls_back'],
    'active_page' => $page,
    'page_count' => $page_count
];

echo json_encode($data);