<?php 
    
    $admin_title = 'Обратный звонок';

    require_once '../models/callBack.php';
    $call_back = CallBack::getAll();

    require_once('../admin/admin_callback.php');

?>