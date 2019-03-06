<?php

$name = (((isset($_REQUEST['name'])) && $_REQUEST['name'] !== "")?$_REQUEST['name']:false);
$secondName = (((isset($_REQUEST['secondName'])) && $_REQUEST['secondName'] !== "")?$_REQUEST['secondName']:false);
$adress = (((isset($_REQUEST['adress'])) && $_REQUEST['adress'] !== "")?$_REQUEST['adress']:false);
$city = (((isset($_REQUEST['city'])) && $_REQUEST['city'] !== "")?$_REQUEST['city']:false);
$domofon = (((isset($_REQUEST['domofon'])) && $_REQUEST['domofon'] !== "")?$_REQUEST['domofon']:false);
$email = (((isset($_REQUEST['email'])) && $_REQUEST['email'] !== "")?$_REQUEST['email']:false);
$tel = (((isset($_REQUEST['tel'])) && $_REQUEST['tel'] !== "")?$_REQUEST['tel']:false);
$basket = (((isset($_REQUEST['basket'])) && $_REQUEST['basket'] !== "")?$_REQUEST['basket']:false);
$itog = (((isset($_REQUEST['itog'])) && $_REQUEST['itog'] !== "")?$_REQUEST['itog']:false);

if ($name != false && $adress != false && $adress != false && $tel != false){
    
    
    $data = 'Да';
    echo json_encode($data);
}

