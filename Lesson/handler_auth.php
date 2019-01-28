<?php

include('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

// Проверка на пустоту
if (!empty($login) && !empty($pass)) {
    $query = "SELECT user_id FROM users WHERE login='$login' AND pass='$pass'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        echo 'Вы авторизованы';
    } else {
        header('Location: form_auth.php?error=2');
        exit;
    }
} else {
    header('Location: form_auth.php?error=1');
    exit;
}