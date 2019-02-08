<?php

require_once '../models/category.php';
$category_id = $_REQUEST['category_id'];
$title = $_REQUEST['title'];

$category = new Category($category_id);
$category->update($category_id, $title);