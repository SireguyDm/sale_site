<?php 
    $admin_title = 'Заказы';

    require_once '../models/status.php';
    $statuses = Status::getAll();

    require_once('../admin/admin_main_page.php');
?>